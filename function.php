<?php
include('./config.php');


function sign_up_user()
{
    global $mysqli;

    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : "";
    $pass = isset($_POST['password']) ? md5($_POST['password']) : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $username = str_replace(' ', '_', $full_name) . rand(1, 1000);
    $sql = "INSERT INTO signup (full_name, user_name, email, password) VALUES (?, ?, ?, ?)";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss", $full_name, $username, $email, $pass);
    if ($stmt->execute()) {
        echo "Account Has Been Created";
    } else {
    }
    $stmt->close();
}
if (isset($_POST['action']) && $_POST['action'] == "new_sign_up") {
    sign_up_user();
}

function login_user()
{
    global $mysqli;
    $userInput = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM signup WHERE email = ? AND password = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ss", $userInput, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows >= 1) {
        echo "Logged in";
    } else {
        $msg = 1;
    }

    $stmt->close();
}
if (isset($_POST['action']) && $_POST['action'] == "user_login") {
    login_user();
}
