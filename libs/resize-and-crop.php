<?php

function resize_and_crop($source_image_path, $thumbnail_image_path, $result_width, $result_height)
{
    if (!file_exists($source_image_path)) {
        return false;
    }

    $image_info = getimagesize($source_image_path);
    if (!$image_info) {
        return false;
    }

    list($source_width, $source_height, $source_type) = $image_info;

    switch ($source_type) {
        case IMAGETYPE_GIF:
            $source_gdim = imagecreatefromgif($source_image_path);
            break;
        case IMAGETYPE_JPEG:
            $source_gdim = imagecreatefromjpeg($source_image_path);
            break;
        case IMAGETYPE_PNG:
            $source_gdim = imagecreatefrompng($source_image_path);
            break;
        default:
            return false;
    }

    if (!$source_gdim) {
        return false;
    }

    $source_aspect_ratio = $source_width / $source_height;
    $desired_aspect_ratio = $result_width / $result_height;

    if ($source_aspect_ratio > $desired_aspect_ratio) {
        $temp_height = $result_height;
        $temp_width = (int) ($result_height * $source_aspect_ratio);
    } else {
        $temp_width = $result_width;
        $temp_height = (int) ($result_width / $source_aspect_ratio);
    }

    $temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
    if (!$temp_gdim) {
        imagedestroy($source_gdim);
        return false;
    }

    if (!imagecopyresampled(
        $temp_gdim,
        $source_gdim,
        0,
        0,
        0,
        0,
        $temp_width,
        $temp_height,
        $source_width,
        $source_height
    )) {
        imagedestroy($temp_gdim);
        imagedestroy($source_gdim);
        return false;
    }

    $x0 = (int) round(($temp_width - $result_width) / 2);
    $y0 = (int) round(($temp_height - $result_height) / 2);
    
    $desired_gdim = imagecreatetruecolor($result_width, $result_height);
    if (!$desired_gdim) {
        imagedestroy($temp_gdim);
        imagedestroy($source_gdim);
        return false;
    }

    if (!imagecopy(
        $desired_gdim,
        $temp_gdim,
        0,
        0,
        $x0,
        $y0,
        $result_width,
        $result_height
    )) {
        imagedestroy($desired_gdim);
        imagedestroy($temp_gdim);
        imagedestroy($source_gdim);
        return false;
    }

    $result = imagejpeg($desired_gdim, $thumbnail_image_path, 90);
    
    imagedestroy($desired_gdim);
    imagedestroy($temp_gdim);
    imagedestroy($source_gdim);
    
    return $result;
}
