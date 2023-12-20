<?php
include('./config.php');

function get_categories_menu_data(){
    global $mysqli;
    $query = $mysqli->query("SELECT * FROM  term_meta");
    while ($data[] = $query->fetch_assoc()) {}

    $data = buildNestedArray($data);
    return $data;
}

function buildNestedArray($terms, $parentId = 0) {
    $nestedArray = array();

    foreach ($terms as $term) {
        if ($term && @$term['parent_term'] == $parentId) {
            $children = buildNestedArray($terms, $term['term_id']);
            if (!empty($children)) {
                $term['children'] = $children;
            }
            $nestedArray[] = $term;
        }
    }

    return $nestedArray;
}

function buildMenu($terms){
    $html = '';
    foreach ($terms as $term) {
        $hc = !empty(@$term['children']);
        if(!$term){
            continue;
        }
        if($hc){
            
            $html .= '
            <li class="menu-has-children">
            <a href="#">'.$term['term_name'].' <i class="fa-solid fa-chevron-down"></i></a>
            ';
        }else{
            $html .= '
            <li>
            <a href="#">'.$term['term_name'].'</a>
            ';

        }

        if ($term && $hc) {
            $html .= '<ul class="sub-menu">';
            // echo "<pre>";
            // print_r(@$term['children']);
            $html .= buildMenu(@$term['children'] ?? []);
            $html .= '</ul>';
        }else{
            $html .= '</li>';
        }
    }

    return $html;
}

function showMenu() {
    $data = get_categories_menu_data();
    $html = buildMenu($data);

    return "<ul class='main-menu'>".$html.'</ul>';
}

function group_menu_categories($data = [], $result = []) {

    foreach($data as $k => $term){
        $parentTermId = $term['parent_term'];
        $result[$parentTermId]['children'][] = $term;
    
        // if(empty($r['parent_term'])){
        //     // parent
        //     $result[$r['term_id']] = $r;
        // }else{
        //     if(isset($result[$k])){
        //         $result[$k]['children'] = $r;
        //     }
        //     // if($k == $r['parent_term']){
        //     //     $result[$k]['children'] = $r;
        //     // }
        //     // // child
        //     // foreach($result as $k2 => $r2){
        //     //     if($r['term_id'] == $k2){
        //     //     }
        //     // }
        // }
    }

    
    return $result;
    
    // group_menu_categories($data = []);
}

    

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
