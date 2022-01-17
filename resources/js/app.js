require('./bootstrap');

checkDivForLogged = function() {
    var user;
    if (AuthUser != ""){
        user = "anonym";
    }else {
        user = "logged";
    }
    var elements = document.querySelectorAll("." + user);
    for(var i=0; i<elements.length; i++){
        elements[i].style.display = "none";
    }
}

var lastUrl;

loadDoc = function(url) {
    if(lastUrl && url === lastUrl) {
        return;
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("page").innerHTML =
                this.responseText;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
    lastUrl = url;
}

