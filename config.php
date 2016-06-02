<?php
// The server's root path to your files. Don't change this unless you know what you're doing.
define('ROOT_PATH', realpath($_SERVER["DOCUMENT_ROOT"]));

// Where the files for Public Pinboard are within your current file root.
// If it lives in a subdirectory, add the folder name with the leading slash and a trailing slash, for example '/pinboard/'.
define('PINBOARD_DIRECTORY', '/');

// The directory where the posts will be saved. I personally wouldn't change it because it already makes sense, but you can do what you want.
define('POST_DIRECTORY', 'posts/');

const SETTINGS = array(
        'board_name' => 'Public Pinboard',

        'board_lead' => 'Use this board to post public flyer!',

        'link_text' => 'Click Here to post a flyer',

        'post_heading' => 'Put Up a Flyer',

        'post_instructions' => '<p>The space for each flyer is limited, so keep it short and sweet, but be sure to let people know how to contact you! HTML is not allowed, so get creative with your words!</p>
                                <p>Only the "Your Flyer" field is required, but if you leave the "Your Name/Identity" and "Headline" fields blank, they will automatically be listed as "anonymous" and "Post", respectively.</p>',

        'post_warning' => '<strong>NOTE:</strong> Flyers live for 7 days before they are permanently and irreversibly deleted. You cannot edit your flyer after it has been posted, and anyone can remove it. With any luck, nobody but you will remove it, but just be sure to check back to make sure your flyer is still there if nobody has contacted you.',

        'post_life_in_days' => 14,

        'max_name_length' => 20,

        'max_headline_length' => 50,

        'max_flyer_length' => 200,

        'actually_delete_removed_flyers' => false   // If set to false, removed flyers are instead moved to the "removed" directory in the posts folder.
);
?>