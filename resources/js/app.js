require('./bootstrap');
const path  = require("path");
const { timeouts } = require('retry');

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

timeout = function(time) {
    return new Promise(resolve => setTimeout(resolve, time));
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
    setTimeout(function(){
        $('.selectpicker').selectpicker(["reload"]);
        console.log("after timeout");
    }, 1.0*50);
}

showButtons = function (url, id) {
    var element = document.getElementById(id);
    if(element.childNodes.length) {
        element.style.visibility="visible";
        return;
    }
    var xhttp = new XMLHttpRequest();
    xhttp.open('GET', url, true);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            element.innerHTML =
                this.responseText;
        }
    }
    xhttp.open("GET", url, true);
    xhttp.send();
}

hideButtons =function (id) {
    document.getElementById(id).style.visibility="hidden";
}



