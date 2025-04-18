<?php
if (!session_id()) {
    session_start();
    unset($_SESSION['adminemail']);
    unset($_SESSION['admin_id']);
    header('Location:/puredelight/login');
}
