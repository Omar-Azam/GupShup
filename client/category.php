<?php
include('./common/db_connect.php');
$sql = "SELECT * FROM category;";
$result = $conn->query($sql);
if (isset($result)) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $category = $row['name'];
            $id = $row['id'];
            if (isset($_SESSION['category_id']) && $_SESSION['category_id'] == $id) {
                // $category_id = $_SESSION['category_id'];
                unset($_SESSION['category_id']);
                echo "<option value='$id' selected>";
            } else {
                echo "<option value='$id'>";
            }

            echo ucfirst($category);
            echo "</option>";

            // echo "<option value='$id'" . (isset($_SESSION['category_id'])) ? ($_SESSION['category_id'] == $id ? "selected" : "") : "" . ">";
            // echo ucfirst($category);
            // echo "</option>";
        }
    }
}
