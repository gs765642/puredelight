<?php
include('./config.php');
global $mysqli;
if (isset($_GET['cats'])) {

    $term = $_GET['cats'];
    $query = "SELECT * FROM products WHERE term_slug='$term'";
}else{

}
// echo $term;
$result = $mysqli->query($query);
?>
<pre style="width:400px;overflow:auto">

<?php
print_r(mysqli_fetch_all($result));
?>
</pre>

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