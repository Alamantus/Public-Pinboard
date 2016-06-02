<?php
require('../config.php');
require('helpers.php');

session_start();

$error_message = "";

if (!isset($_SESSION['remove_time']) || time() - $_SESSION['remove_time'] > $SETTINGS['remove_flood_limit']) {
    if (isset($_POST['id'])){
        $flyer_id = $_POST['id'];
        $flyer_name = Clean_Text($flyer_id) . '.post';
        $path = ROOT_PATH . PINBOARD_DIRECTORY . POST_DIRECTORY;
        $flyer = $path . $flyer_name;
        
        if ($SETTINGS['actually_delete_removed_flyers']) {
            if (unlink($flyer)) {
                echo $MESSAGES['deleted_successfully'];
            } else {
                echo "Error: " . $MESSAGES['error_delete_failed'];
            }
        } else {
            if (rename($flyer, $path . "removed/" . $flyer_name)) {
                $_SESSION['remove_time'] = time();
                echo $MESSAGES['removed_successfully'];
            } else {
                echo "Error: " . $MESSAGES['error_remove_failed'];
            }
        }
        
    } else {
        echo "Error: " . $MESSAGES['error_remove_not_specified'];
    }
} else {
    echo "Error: " . $MESSAGES['wait_remove_flood_limit'] . "\n" . (time() - $_SESSION['remove_time']) . " seconds have passed.";
}
?>
