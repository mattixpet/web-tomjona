// egh... make sure the chat box moves below the main content if width < ~1234 px
$('document').ready(function(){
  fixChat();
  $(window).resize(fixChat);
});

// fix chat alignment depending on viewport width/mobile
function fixChat() {
  var width = $(window).width();
  var MAGICNUMBER = 16; // egh! scrollbar/window width nonsense, it's ugly anyway, so why not make it more ugly
  if (width < 1234 - MAGICNUMBER) {
    $("#chat").insertAfter($("main"));
  } else {
    $("#chat").insertBefore($("main"));
  }
};