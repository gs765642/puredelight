<?php
include('./config.php');
global $mysqli;
if (isset($_GET['cats'])) {

    $term = $_GET['cats'];
    $query = "SELECT * FROM products WHERE term_slug='$term'";
} else {
}
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>