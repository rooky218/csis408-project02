<div class="custom-form">
  <form>
    <textarea class="form-control autoExpand"
    rows="1"
    id="user-message"
    name="user-message"></textarea>

    <button id="my-button-1" type="submit"
    class="btn btn-default" onsubmit="sendMessage">Submit</button>

  </form>
</div>
<script>
function sendMessage() {
    var jsmessage = getElementById("user-message").innerHTML;
    console.log("message: " + jsmessage);

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("convo-container").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","test3.php?<?php echo "room=1&message=";?>" + jsmessage, true);
    xmlhttp.send();
}
</script>

//link to DB
global $my_db;

//variable
if($user == 0){
  $user = $_SESSION["userIDInS"];
}
//build Query

$q =
  "SELECT DISTINCT SentFromID
  FROM Chatrooms
  WHERE RoomID = \"$roomID\"";


//Run Q
$r = @mysqli_query($my_db, $q);

//Process results
$i = 0;
if ($r){
  $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
  //$whoIsHere = whoInRoom($row["RoomID"]);
  //echo "roomid: " . $row["RoomID"];
  $i = 0;
