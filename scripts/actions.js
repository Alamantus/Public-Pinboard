function postFlyer() {
    console.log("Attempting to post...");
    var poster = document.getElementById("posterTextbox").value;
    var headline = document.getElementById("headlineTextbox").value;
    var flyer = document.getElementById("flyerTextbox").value;
    var button = document.getElementById("submitButton");
    var form = document.getElementById("flyerPostForm");
    
    if (flyer != "") {
        button.disabled = true;

        if (flyer.length > 200) {
            flyer = flyer.substr(0, 200);
        }
        if (poster.length > 20) {
            poster = poster.substr(0, 20);
        }
        if (headline.length > 50) {
            headline = headline.substr(0, 50);
        }

        document.getElementById("posterTextbox").value = poster;
        document.getElementById("headlineTextbox").value = headline;
        document.getElementById("flyerTextbox").value = flyer;

        form.submit();
    } else {
        alert("Your flyer needs some content!");
    }
}

function removeFlyer(id) {
    console.log("Attempting to remove...");
    var flyerToRemove = document.getElementById("flyer" + id.toString());
    
    if (confirm("Do you promise that you are not being a huge jerk by removing this flyer? It cannot be recovered once it is removed!\n(Removing something that is not yours unless it is offensive or does not belong here constitutes \"being a huge jerk\")")) {
        var contentToSend = "id=" + escape(id);
        $.post("scripts/remove_flyer.php", contentToSend, function( data ) {
            console.log( data );
            document.getElementById("flyersContainer").removeChild(flyerToRemove);
        });
    } else {
        return;
    }
}
