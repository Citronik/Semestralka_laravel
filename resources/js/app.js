require('./bootstrap');

var about = new Vue({
    el: '#page',
    data: {
        nazov: 'About us',
        image: '/img/Aboutus.png',
    },
    methods: {

    }
})

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
