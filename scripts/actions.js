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
