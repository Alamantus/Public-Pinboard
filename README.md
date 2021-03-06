# Public Pinboard
A digital community cork bulletin board that anyone can add to or remove from.

# Installation
Just upload the whole thing to your web server as is. If you put it in a subdirectory that is not root, update the `PINBOARD_DIRECTORY` variable in the `config.php` file to point to where you uploaded it with a leading and trailing slash (i.e. `'/pinboard/'`).

Change any other settings you want in the `config.php` file to suit your needs. They're all pretty clearly labeled and/or commented.

Once that's all set up, just set the server permissions (chmod) of the whole `posts/` directory to 700 to prevent people from seeing the files created there. If you don't care if people see the `.post` files that are created and any removed posts, then I guess you don't have to set those permissions!

# Usage
Once it's set up how you want it, all you need to do is start posting stuff! Posted flyers display from newest to oldest, with admin messages displayed first in reverse-alphabetical order. Admin messages do not have a "Remove" button, but all other flyers can be removed by anyone at any time.

New flyers are created in the `posts/` directory, and if a flyer is too old, it will be removed automatically. If you have the `actually_delete_removed_flyers` setting to the default value of `false`, then all removed flyers can be found in the `posts/removed/` directory on your server. If you get a lot of traffic, you might want to think about cleaning this folder out every now and again. If `actually_delete_removed_flyers` is set to `true`, however, then the files will be deleted from your server and not be retrievable.

To add an admin message, create a post then edit it on your server to something else that starts with an underscore (`_`). To change an admin message, just edit the JSON file on the server. Be sure to escape (`\"`) any double quotes (`"`) you use in your message so it doesn't interfere with the JSON formatting!

# Disclaimer
This project has no security and was not created with security in mind. It's a public board that anyone can tamper with. If you need more security, you'll have to build it yourself.

# License
<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Public Pinboard</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="https://github.com/Alamantus" property="cc:attributionName" rel="cc:attributionURL">Robbie Antenesse</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.
