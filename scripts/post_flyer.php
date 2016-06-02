<?php
require('../config.php');
require('helpers.php');

session_start();

$error_message = "";

if (!isset($_SESSION['remove_time']) || time() - $_SESSION['posted_time'] > $SETTINGS['post_flood_limit']) {
    if (isset($_POST['flyer']) && $_POST['flyer']){
        $flyer = $_POST['flyer'];
        $flyer = Clean_Text($flyer);
        
        $poster = $_POST['poster'];
        $poster = Clean_Text($poster);
        
        $headline = $_POST['headline'];
        $headline = Clean_Text($headline);

        if ($poster == "") {
            $poster = $SETTINGS['default_poster_name'];
        }
        if ($headline == "") {
            $headline = $SETTINGS['default_post_headline'];
        }
        
        $time = time();
        
        //echo "$headline, $flyer, $poster";
        $post_json = '{"headline":"'.$headline.'", "flyer":"'.$flyer.'", "poster":"'.$poster.'", "time":'.$time.'}';

        if (file_put_contents(ROOT_PATH . PINBOARD_DIRECTORY . POST_DIRECTORY . $time . '.post', $post_json)) {
            $_SESSION['posted_time'] = time();
            header('Location: ' . PINBOARD_DIRECTORY);
        } else {
            $error_message = $MESSAGES['error_post_creation_failed'];
        }

    }
    else {
        $error_message = $MESSAGES['error_post_missing_content'];
    }
} else {
    $error_message = $MESSAGES['wait_post_flood_limit'];
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Error | <?php echo $SETTINGS['board_name']; ?></title>

    <!-- Bootstrap stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Pinboard Stylesheet -->
    <link rel="stylesheet" href="<?php echo PINBOARD_DIRECTORY; ?>styles/main.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="container">
    <div class="jumbotron">
        <h2><?php echo $SETTINGS['board_name']; ?></h2>
        <p class="lead">
            <?php echo $error_message; ?><br>
            <?php echo (time() - $_SESSION['posted_time']) . " seconds have passed."; ?><br><br>
            <a href="<?php echo PINBOARD_DIRECTORY; ?>"><?php echo $MESSAGES['error_return_link_text']; ?></a>
        </p>
    

    <div class="footer">
        <p>Built with <a href="http://getbootstrap.com/" target="_blank" title="Bootstrap Website">Twitter Bootstrap</a> by <a href="https://github.com/Alamantus" target="_blank">Robbie Antenesse</a></p>
    </div>

</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<!-- AJAX actions -->
<script src="<?php echo PINBOARD_DIRECTORY; ?>scripts/actions.js"></script>
</body>
</html>
