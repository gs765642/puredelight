<?php

function sign_up_user()
{
    global $mysqli;
    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : "";
    $pass = isset($_POST['password']) ? md5($_POST['password']) : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $username = str_replace(' ', '_', $full_name) . rand(1, 1000);
    $sql = "INSERT INTO users (full_name, user_name, email, password) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssss", $full_name, $username, $email, $pass);
    $res = [];
    if ($stmt->execute()) {
        $res['status'] = true;
        $res['message'] = "Account Has Been Created Click Login To Proceed";

    } else {
        $res['status'] = false;
        $res['message'] = "Unable to Create a Account";
    }
    
    echo json_encode($res);
    $stmt->close();
}
if (isset($_POST['action']) && $_POST['action'] == "new_sign_up") {
    sign_up_user();
}

function login_user()
{
    global $mysqli;
    $email = $_POST['login_email'];
    $password = md5($_POST['login_password']);
    $response = [];
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $mysqli->query($sql);
    if ($result->num_rows >= 1) {

        $_SESSION['useremail'] = $email;
        $_SESSION['user_id'] = mysqli_fetch_assoc($result)['user_id'];
        $response['status'] = true;
        $response['message'] = "Logged In";

        if (isset($_POST['remember'])) {

            setcookie('useremail', $email, time() + (365 * 24 * 60), "/");
            setcookie('userpass', $password, time() + (365 * 24 * 60), "/");
        }
    } else {
        $response['status'] = false;
        $response['message'] = "Email Or Password Incorrect";
    }

    $result->free();
    echo json_encode($response);
}
if (isset($_POST['action']) && $_POST['action'] == "user_login") {
    login_user();
}
function logout_user()
{
    session_start();
    $response = [];
    if (session_destroy()) {
        $response['status'] = true;
        $response['error'] = "logout Succes";
    } else {
        $response['status'] = false;
        $response['error'] = "Unable To Logout";
    }
    echo json_encode($response);
}
if (isset($_POST['action']) && $_POST['action'] == "logout_user") {
    logout_user();
}


function login_admin()
{
    global $mysqli;
    $email = $_POST['admin_email'];
    $password = md5($_POST['admin_password']);
    $response = [];
    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $result = $mysqli->query($sql);
    if ($result->num_rows >= 1) {

        $_SESSION['adminemail'] = $email;
        $_SESSION['admin_id'] = mysqli_fetch_assoc($result)['user_id'];
        $response['status'] = true;
        $response['message'] = "Logged In";
    } else {
        $response['status'] = false;
        $response['message'] = "Email Or Password Incorrect";
    }

    $result->free();
    echo json_encode($response);
}
if (isset($_POST['action']) && $_POST['action'] == "admin_login") {
    login_admin();
}
