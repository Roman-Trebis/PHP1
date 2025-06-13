<?php
    if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
        if ($_SESSION['logged_user']['role'] === 'admin') {
            echo "<a class=\"secondary-button\" href=\"" . HOST . "profile-edit/" . $user->id . "\">Редактировать</a>";
        } else if ($_SESSION['logged_user']['role'] === 'user') {

            if ($_SESSION['logged_user']['id'] === $user->id) {
                echo "<a class=\"secondary-button\" href=\"" . HOST . "profile-edit\">Редактировать</a>";
            }
        }
    }
