<?php

if (!session_id()) {
    session_start();
    unset($_SESSION['useremail']);
    unset($_SESSION['user_id']);
    header('Location:./login');
}
