
function updateScroll(){
    var element = document.getElementById("convo-container");
    element.scrollTop = element.scrollHeight;
}

//keep page scrolled to bottom
var scrolled = false;
function updateScroll(){
    if(!scrolled){
        var element = document.getElementById("convo-container");
        element.scrollTop = element.scrollHeight;
    }
}

$("#convo-container").on('scroll', function(){
    scrolled=true;
});
