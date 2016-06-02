<?php
require('config.php');
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Community Bulletin Board</title>

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
            <?php echo $SETTINGS['board_lead']; ?><br>
            <a href="#flyerForm"><?php echo $SETTINGS['link_text']; ?></a>
        </p>
        <div class="spacer"></div>
		<div id="flyersContainer" class="row">	<!--Buttons and Twitter Div-->
            <?php
            // This trick removes the dot and other unwanted directories from scandir. Found at http://php.net/manual/en/function.scandir.php#107215
            $path = ROOT_PATH . PINBOARD_DIRECTORY . POST_DIRECTORY;
            $posts = array_diff(scandir($path, SCANDIR_SORT_DESCENDING), array('..', '.', 'removed'));
            $must_be_newer_than = time() - ($SETTINGS['post_life_in_days'] * 24 * 60 * 60);
            
            for ($i = 1; $i <= count($posts); $i++) {
                $post = file_get_contents($path . $posts[$i]);
                $content = json_decode($post, true);

                // If the post is younger than the life specified in config.php or is an admin "_" post, display it.
                if ($content['time'] > $must_be_newer_than || (strpos($posts[$i], '_') !== false)) {
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6" id="flyer<?php echo $content['time']; ?>">
                    <div class="panel panel-default feature">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center"><?php echo $content['headline']; ?></h3>
                        </div>
                        <div class="panel-body word-wrap">
                            <?php echo $content['flyer']; ?>
                        </div>
                        <div class="panel-footer small">
                            Posted <?php echo date('F jS, Y', $content['time']); ?> by <?php echo $content['poster']; ?>
                            <?php
                                // Admin messages have leading '_', so the "remove" option is not included.
                                if (strpos($posts[$i], '_') === false) { ?>
                                <br>
                                <button type="button" class="btn btn-link small" onclick="removeFlyer(<?php echo $content['time']; ?>)">Remove Flyer</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>	<!-- column -->
            <?php
                } else {
                    if ($posts[$i]) {
                        // Otherwise, if it's too old, remove it.
                        if ($SETTINGS['actually_delete_removed_flyers']) {
                            unlink($path . $posts[$i]);
                        } else {
                            rename($path . $posts[$i], $path . "removed/" . $posts[$i]);
                        }
                    }
                }
            }
            ?>
	    </div>	<!--Buttons and Twitter Div-->
        <div class="spacer"></div>
    </div>	<!--Jumbotron-->

    <div class="row marketing">
		<div class="page-header well">
			<a name="flyerForm"></a><h1><?php echo $SETTINGS['post_heading']; ?></h1>
            <div class="well well-sm half-width">
                <?php echo $SETTINGS['post_instructions']; ?>
            </div>
            <form id="flyerPostForm" method="post" action="<?php echo PINBOARD_DIRECTORY; ?>scripts/post_flyer.php">
                <label>Your Name/Identity <small>(<?php echo $SETTINGS['max_name_length']; ?> characters max)</small><br />
                <input type="text" id="posterTextbox" name="poster" maxlength="<?php echo $SETTINGS['max_name_length']; ?>" size="20" style="padding:4px;" /></label><br />
                <label>Headline <small>(<?php echo $SETTINGS['max_headline_length']; ?> characters max)</small><br />
                <input type="text" id="headlineTextbox" name="headline" maxlength="<?php echo $SETTINGS['max_headline_length']; ?>" size="25" style="padding:4px;" /></label><br />
                <label><strong style="color: red;">*</strong> Your Flyer <small>(<?php echo $SETTINGS['max_flyer_length']; ?> characters max, no formatting)</small><br />
                <textarea id="flyerTextbox" name="flyer" maxlength="<?php echo $SETTINGS['max_flyer_length']; ?>" style="padding:4px;min-width: 250px; max-width:350px;height:100px;"></textarea></label><br />
                <p class="small half-width"><?php echo $SETTINGS['post_warning']; ?></p>
                <button type="button" style="padding:4px" id="submitButton" onclick="postFlyer();" class="pointer">Post Flyer</button>
            </form>
		</div>	
    </div>	<!-- row -->
    

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