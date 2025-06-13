<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title><?php echo $pageTitle; ?></title>
	<meta name="keywords" />
	<meta name="description" />
	<link rel="stylesheet" href="<?php echo HOST ?>static/css/main.css" />
	<link rel="stylesheet" href="<?php echo HOST ?>static/css/custom.css" />
</head>

<?php if (isset($pageClass) && $pageClass === 'authorization-page') : ?>
<body class="authorization-page">
<?php else : ?>
	<body class="sticky-footer body-with-panel <?php echo isset($pageClass) ? $pageClass : ''; ?>">
<?php endif; ?>
