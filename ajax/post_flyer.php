<?php
if (isset($_POST['flyer'])){
    $flyer = $_POST['flyer'];
    $flyer = strip_tags($flyer);
    $flyer = str_replace('&', '&amp;', $flyer);
    $flyer = str_replace('<', '&lt;', $flyer);
    $flyer = str_replace('>', '&gt;', $flyer);
    $flyer = str_replace('"', '&quot;', $flyer);
    $flyer = str_replace("'", '&apos;', $flyer);
    
    $poster = $_POST['poster'];
    $poster = strip_tags($poster);
    $poster = str_replace('&', '&amp;', $poster);
    $poster = str_replace('<', '&lt;', $poster);
    $poster = str_replace('>', '&gt;', $poster);
    $poster = str_replace('"', '&quot;', $poster);
    $poster = str_replace("'", '&apos;', $poster);
    
    $headline = $_POST['headline'];
    $headline = strip_tags($headline);
    $headline = str_replace('&', '&amp;', $headline);
    $headline = str_replace('<', '&lt;', $headline);
    $headline = str_replace('>', '&gt;', $headline);
    $headline = str_replace('"', '&quot;', $headline);
    $headline = str_replace("'", '&apos;', $headline);
    
    $time = time();
    
    //echo "$headline, $flyer, $poster";
    $post_json = '{"headline":"'.$headline.'", "flyer":"'.$flyer.'", "poster":"'.$poster.'", "time":'.$time.'}';

    file_put_contents("posts/" . $time . ".json", $post_json);
}
else {
    echo "Something's missing, so the flyer didn't get posted.";
}
?>
