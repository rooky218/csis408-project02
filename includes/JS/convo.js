
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


// DO NOT DELETE
//sets width of text area box
function setMyBox(){
    var mywindow = $( window ).width();
    var minus_send_width = mywindow - (10 + 10 + 10 + 70);
    console.log("my width is: " + mywindow);
    console.log("my new is: " + minus_send_width);
    var mybox = document.getElementById("user-message").style;
    console.log("my box 1 is: " + mybox.width);
    mybox.width = minus_send_width + "px";
    console.log("my box 2 is: " + mybox.width);
}

window.addEventListener("resize", function(){
    var mywindow = $( window ).width();
    var minus_send_width = mywindow - (10 + 10 + 10 + 70);
    console.log("my width is: " + mywindow);
    console.log("my new is: " + minus_send_width);
    var mybox = document.getElementById("user-message").style;
    console.log("my box 1 is: " + mybox.width);
    mybox.width = minus_send_width + "px";
    console.log("my box 2 is: " + mybox.width);
});

//sets height of text area box as user types
window.addEventListener("", function(){


});


// Applied globally on all textareas with the "autoExpand" class
$(document)
    .one('focus.autoExpand', 'textarea.autoExpand', function(){
        var savedValue = this.value;
        this.value = '';
        this.baseScrollHeight = this.scrollHeight;
        this.value = savedValue;
    })
    .on('input.autoExpand', 'textarea.autoExpand', function(){
        var minRows = this.getAttribute('data-min-rows')|0, rows;
        this.rows = minRows;
        rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 16);
        this.rows = minRows + rows;
    });
