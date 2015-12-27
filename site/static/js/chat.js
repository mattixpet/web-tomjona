// simple javascript chatbox
// i wrote it :D

//ugly globals!!
var phpURL = 'static/php/chatbox.php';

$('document').ready(function(){
  displayChat();
  $("#chatsend").click(updateChat);
  $("#chatmsg").keypress(updateOnEnter);
  $("#chatname").keypress(updateOnEnter);
});

// get everything from our logs database and display
function displayChat() {
  var chat = $("#chatcontent");
  chat.empty();
  $.get(phpURL, function(data) {
    data = JSON.parse(data);
    // never show more than 50 messages ago
    var datalen = data.length;
    if (datalen > 50) {
      var start = datalen - 50;
    } else {
      var start = 0;
    }
    for (var i = start; i < datalen; i++) {
      var row = data[i];
      var newP = $("<p></p>");
      newP.appendTo(chat);
      newP.text(row['name'] + ': ' + row['message']); // this is the html escaping...!!! (jquery's text)
    }
    // scroll to bottom of chat, thanks http://stackoverflow.com/questions/270612/scroll-to-bottom-of-div
    chat.scrollTop(chat[0].scrollHeight);
  });
};

function updateChat() {
  var msg = {};
  msg['name'] = $("#chatname").val();
  msg['message'] = $("#chatmsg").val();
  msg['date'] = Math.floor(Date.now()/1000); // get seconds since 1970 unix time
  console.log(msg);
  // validation LOL
  if (msg['name'].length === 0) msg['name'] = 'anonymouse'+Math.floor(Math.random()*10000); // "unique" anon default name!
  if (msg['message'].length === 0) return;
  // end LOL
  $.post(phpURL, msg, function(data) {
    displayChat();
    // put name back and clear message box
    $("#chatname").val(msg['name']);
    $("#chatmsg").val('');
  });
};

// update chat also on enter, not just mouse click on "send"
function updateOnEnter(e){
    var enterKey = 13;
    if (e.which == enterKey){
        updateChat();
        // now clear the message box!
        $("#chatmsg").val('');
    }
};