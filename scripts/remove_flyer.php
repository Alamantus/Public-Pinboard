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
            echo $MESSAGES['deleted_successfully'];
        } else {
            echo $MESSAGES['error_delete_failed'];
        }
    } else {
        if (rename($flyer, $path . "removed/" . $flyer_name)) {
            echo $MESSAGES['removed_successfully'];
        } else {
            echo $MESSAGES['error_remove_failed'];
        }
    }
    
} else {
    echo $MESSAGES['error_remove_not_specified'];
}
?>
