<?php
require('../config.php');
require('helpers.php');

if (isset($_POST['flyer'])){
    $flyer = $_POST['flyer'];
    $flyer = Clean_Text($flyer);
    
    $poster = $_POST['poster'];
    $poster = Clean_Text($poster);
    
    $headline = $_POST['headline'];
    $headline = Clean_Text($headline);
    
    $time = time();
    
    //echo "$headline, $flyer, $poster";
    $post_json = '{"headline":"'.$headline.'", "flyer":"'.$flyer.'", "poster":"'.$poster.'", "time":'.$time.'}';

    if (file_put_contents(ROOT_PATH . PINBOARD_DIRECTORY . POST_DIRECTORY . $time . '.post', $post_json)) {
        header('Location: ' . PINBOARD_DIRECTORY);
    } else {
        echo "Something went wrong. Please go back and try again.";
    }

}
else {
    echo "Something's missing, so the flyer didn't get posted. Please go back and try again.";
}
?>
