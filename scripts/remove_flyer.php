<?php
require('../config.php');
require('helpers.php');

if (isset($_POST['id'])){
    $flyer_id = $_POST['id'];
    $flyer_name = Clean_Text($flyer_id) . '.post';
    $path = ROOT_PATH . PINBOARD_DIRECTORY . POST_DIRECTORY;
    $flyer = $path . $flyer_name;
    
    if ($SETTINGS['actually_delete_removed_flyers']) {
        if (unlink($flyer)) {
            echo "Deleted successfully.";
        } else {
            echo "Could not delete.";
        }
    } else {
        if (rename($flyer, $path . "removed/" . $flyer_name)) {
            echo "Removed successfully.";
        } else {
            echo "Could not remove.";
        }
    }
    
} else {
    echo "Something's missing, so the flyer didn't get deleted.";
}
?>
