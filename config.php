<?php
// The server's root path to your files. Don't change this unless you know what you're doing.
define('ROOT_PATH', realpath($_SERVER["DOCUMENT_ROOT"]));

// Where the files for Public Pinboard are within your current file root.
// If it lives in a subdirectory, add the folder name with the leading slash and a trailing slash, for example '/pinboard/'.
define('PINBOARD_DIRECTORY', '/');

// The directory where the posts will be saved. I personally wouldn't change it because it already makes sense, but you can do what you want.
define('POST_DIRECTORY', 'posts/');

$SETTINGS = array(
        'board_name' => 'Public Pinboard',

        'board_lead' => 'Use this board to post public flyer!',

        'link_text' => 'Click Here to post a flyer',

        'post_heading' => 'Put Up a Flyer',

        'post_instructions' => '<p>The space for each flyer is limited, so keep it short and sweet, but be sure to let people know how to contact you! HTML is not allowed, so get creative with your words!</p>
                                <p>Only the "Your Flyer" field is required, but if you leave the "Your Name/Identity" and "Headline" fields blank, they will automatically be listed as "anonymous" and "Post", respectively.</p>',

        'post_warning' => '<strong>NOTE:</strong> Flyers live for 14 days before they are permanently and irreversibly deleted. You cannot edit your flyer after it has been posted, and anyone can remove it. With any luck, nobody but you will remove it, but just be sure to check back to make sure your flyer is still there if nobody has contacted you.',

        'default_poster_name' => 'anonymous',

        'default_post_headline' => 'Post',

        'post_life_in_days' => 14,

        'max_name_length' => 20,

        'max_headline_length' => 50,

        'max_flyer_length' => 200,

        'actually_delete_removed_flyers' => false,   // If set to false, removed flyers are instead moved to the "removed" directory in the posts folder.

        'post_flood_limit' => 30,   // Number of seconds a user must wait between posting flyers.

        'remove_flood_limit' => 15    // Number of seconds a user must wait between removing flyers.
);

$MESSAGES = array(
    'error_post_creation_failed' => "Something went wrong. Please go back and try again.",

    'error_post_missing_content' => "Something's missing, so the flyer didn't get posted. Please go back and try again.",

    'removed_successfully' => "Removed successfully.",

    'error_remove_failed' => "Could not remove.",

    'deleted_successfully' => "Deleted successfully.",

    'error_delete_failed' => "Could not delete.",

    'error_remove_not_specified' => "Something's missing, so the flyer didn't get deleted.",

    'wait_post_flood_limit' => "You must wait " . $SETTINGS['post_flood_limit'] . " seconds before trying to posting another flyer.",

    'wait_remove_flood_limit' => "You must wait " . $SETTINGS['remove_flood_limit'] . " seconds before trying to remove another flyer.",

    'error_return_link_text' => "Go back"
);
?>