function postFlyer() {
    console.log("Attempting to post...");
    var poster = document.getElementById("posterTextbox").value;
    var headline = document.getElementById("headlineTextbox").value;
    var flyer = document.getElementById("flyerTextbox").value;
    var button = document.getElementById("submitButton");
    
    if (flyer != "") {
        button.disabled = true;
        if (poster == "") {
            poster = "anonymous";
        }
        if (headline == "") {
            headline = "Post";
        }
        
        if (flyer.length > 200) {
            flyer = flyer.substr(0, 200);
        }
        if (poster.length > 20) {
            poster = poster.substr(0, 20);
        }
        if (headline.length > 50) {
            headline = headline.substr(0, 50);
        }
        
        //alert("poster=" + escape(poster) + "&headline=" + escape(headline) + "&flyer=" + escape(flyer));
        
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                console.log("Posted! Refreshing the page...");
                window.location = "./"
            }
            else {
                document.getElementById("submitButton").disabled = false;
            }
        }
        var url = "ajax/post_flyer.php";
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("poster=" + escape(poster) + "&headline=" + escape(headline) + "&flyer=" + escape(flyer));
    } else {
        alert("Your flyer needs some content!");
    }
}

function removeFlyer(id) {
    console.log("Attempting to remove...");
    var flyerToRemove = document.getElementById("flyer" + id.toString());
    
    if (confirm("Do you promise that you are not being a huge jerk by removing this flyer? It cannot be recovered once it is removed!\n(Removing something that is not yours unless it is offensive or does not belong here constitutes \"being a huge jerk\")")) {
        
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                console.log("Removed!");
                document.getElementById("flyersContainer").removeChild(flyerToRemove);
                //window.location = "./"
            }
        }
        var url = "ajax/remove_flyer.php";
        xmlhttp.open("POST", url, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("id=" + escape(id));
    } else {
        return;
    }
}
