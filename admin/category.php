<?php

include('./config.php');
global $mysqli;
$sql = "SELECT * FROM taxonomy";
$result = $mysqli->query($sql);
?>
<?php include('./header.php'); ?>
<main class="main">
    <section class="category-warpper">
        <div class="container">
            <form id="add_new_category" method="post">
                <input type="text" name="term_name" placeholder="Term Name">
                <input type="text" name="term_slug" placeholder="Term Slug">
                <textarea type="" name="term_description" placeholder="Term Description"></textarea>
                <select name="parent_term" id="">
                    <option value="0">None</option>
                    <?php
                    if ($result) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['term_id'] . '">' . $row['term_name'] . '</option>';
                        }
                        $result->free();
                    }
                    ?>
                </select>
                <input type="submit" name="add_term" id="">
            </form>
        </div>
    </section>
</main>
<?php include('./footer.php') ?>