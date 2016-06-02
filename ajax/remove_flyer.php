<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
require "$root/includes/connect.php";

if (isset($_POST['id'])){
    $flyerId = $_POST['id'];
    $flyerId = mysqli_real_escape_string($dbconn, $flyerId);
    $flyerId = strip_tags($flyerId);
    
    $insert_sql = "DELETE FROM classifieds_postings WHERE id=$flyerId";
    
    mysqli_query($dbconn, $insert_sql) or die('Query failed: ' . mysqli_error($dbconn));
    
} else {
    echo "Something went wrong, so the flyer didn't get deleted.";
}
?>
