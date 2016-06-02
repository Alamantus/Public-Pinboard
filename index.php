<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Community Bulletin Board</title>
</head>

<body>
<div class="container">
    <div class="jumbotron">
        <h2>Public Classifieds Bulletin Board</h2>
        <p class="lead">Need help for the jam? Want to help someone with the jam? <a href="#flyerForm">Post a flyer here</a>!</p>
        <div class="spacer"></div>
		<div id="flyersContainer" class="row">	<!--Buttons and Twitter Div-->
            <?php
            $posts = scandir("posts", SCANDIR_SORT_DESCENDING);
            
            for ($i = 0; $i < count($posts); $i++) {
                $post = file_get_contents($posts[$i]);
                $content = json_decode($post);
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
                            <?php if (intval($content['time']) > 0) { ?>
                                <br>
                                <button type="button" class="btn btn-link small" onclick="removeFlyer(<?php echo $content['time']; ?>)">Remove Flyer</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>	<!-- column -->
            <?php
            }
            ?>
	    </div>	<!--Buttons and Twitter Div-->
        <div class="spacer"></div>
    </div>	<!--Jumbotron-->

    <div class="row marketing">
		<div class="page-header well">
			<a name="flyerForm"></a><h1>Put Up a Flyer</h1>
            <div class="well well-sm half-width">
            <p>The space for each flyer is limited, so keep it short and sweet, but be sure to let people know how to contact you! HTML is not allowed, so get creative with your words!</p>
            <p>Only the "Your Flyer" field is required, but if you leave the "Your Name/Identity" and "Headline" fields blank, they will automatically be listed as "anonymous" and "Post", respectively.</p>
            </div>
            <form id="flyerPostForm">
                <label>Your Name/Identity <small>(20 characters max)</small><br />
                <input type="text" id="posterTextbox" name="posterName" maxlength="20" size="20" style="padding:4px;" /></label><br />
                <label>Headline <small>(50 characters max)</small><br />
                <input type="text" id="headlineTextbox" name="headline" maxlength="50" size="25" style="padding:4px;" /></label><br />
                <label><strong style="color: red;">*</strong> Your Flyer <small>(200 characters max, no formatting)</small><br />
                <textarea id="flyerTextbox" name="flyerContent" maxlength="200" style="padding:4px;min-width: 250px; max-width:350px;height:100px;"></textarea></label><br />
                <p class="small half-width"><strong>NOTE:</strong> Flyers live for 7 days before they are permanently and irreversibly deleted. You cannot edit your flyer after it has been posted, and anyone can remove it. With any luck, nobody but you will remove it, but just be sure to check back to make sure your flyer is still there if nobody has contacted you.</p>
                <button type="button" style="padding:4px" id="submitButton" onclick="postFlyer()" class="pointer">Post Flyer</button>
            </form>
		</div>	
    </div>	<!-- row -->
    
    <script src="ajax/actions.js"></script>