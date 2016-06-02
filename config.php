<?php
// The server's root path to your files. Don't change this unless you know what you're doing.
define('ROOT_PATH', realpath($_SERVER["DOCUMENT_ROOT"]));

// Where the files for Public Pinboard are within your current file root.
// If it lives in a subdirectory, add the folder name with the leading slash and a trailing slash, for example '/pinboard/'.
define('PINBOARD_DIRECTORY', '/');

// The directory where the posts will be saved. I personally wouldn't change it because it already makes sense, but you can do what you want.
define('POST_DIRECTORY', 'posts/');

// The directory where the scripts are. I personally wouldn't change it, but you can do what you want.
define('SCRIPTS_DIRECTORY', 'scripts/');

// How many days a post will display for before it is removed from the board.
define('POST_LIFE_IN_DAYS', 14);

// Interface Text
define('BOARD_NAME', 'Public Pinboard');
define('BOARD_LEAD', 'Use this board to post public flyer!');
define('LINK_TEXT', 'Post a flyer here');
define('POST_HEADING', 'Put Up a Flyer');
define('POST_INSTRUCTIONS', '
    <p>The space for each flyer is limited, so keep it short and sweet, but be sure to let people know how to contact you! HTML is not allowed, so get creative with your words!</p>
    <p>Only the "Your Flyer" field is required, but if you leave the "Your Name/Identity" and "Headline" fields blank, they will automatically be listed as "anonymous" and "Post", respectively.</p>
');
define('POST_WARNING', '<strong>NOTE:</strong> Flyers live for 7 days before they are permanently and irreversibly deleted. You cannot edit your flyer after it has been posted, and anyone can remove it. With any luck, nobody but you will remove it, but just be sure to check back to make sure your flyer is still there if nobody has contacted you.');
?>