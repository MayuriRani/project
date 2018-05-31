<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
</head>
<body>

<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDfdpa4i8BeV--_ej27F8f7BGvzBD8pjlo",
    authDomain: "buddyreview-f8734.firebaseapp.com",
    databaseURL: "https://buddyreview-f8734.firebaseio.com",
    projectId: "buddyreview-f8734",
    storageBucket: "",
    messagingSenderId: "55152557528"
  };
  firebase.initializeApp(config);
</script>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook

      //getFriends() ;
      testAPI();
      //startThis1();
      startThis();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }
  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1818934168400657',
      cookie     : true,  // enable cookies to allow the server to access
                          // the session
      xfbml      : true,  // parse social plugins on this page
      version    : 'v3.0' // use graph api version 3.0
    });
    // Now that we've initialized the JavaScript SDK, we call
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  };
  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.

  function testAPI() {

    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }

  function startThis() {
    var getUser = fbUser(function(model){
        console.log(model);
      document.write('<h2>Ask your Facebook Friends for trusted reviews!</h2>');
      var x;
      for(x in model.data){
        document.write('<img src="https://graph.facebook.com/'+ model.data[x].id+'/picture?type=large" alt="Profile Picture" width="60" height="60"><br/>');
      document.write(model.data[x].name+'<br/><br/>');

      }
    });
};
function fbUser(callback){
  var apiStr;
  apiStr= '/'+ 'me' + '/friends';
        FB.api(
  apiStr,
  'GET',
  {},
  function(response) {
      callback(response);
  }
);
}

   function startThis1() {
    var getUser = fbUser1(function(model1){
        console.log(model1);
      document.write(model1.data.url);
    });
};
function fbUser1(callback){
  var apiStr;
  apiStr= '/'+ 'me' + '/picture';
        FB.api(
  apiStr,
  'GET',
  {"redirect":"false"},
  function(response) {
      // Insert your code here
    callback(response);
  }
);
}


   </script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

<fb:login-button scope="public_profile,email,user_friends" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>



<?php

$dbconn=pg_connect("host=ec2-54-235-193-34.compute-1.amazonaws.com port=5432 dbname=d9qk8ga2mhi11j user=moznmkpahvxvhm password=63ebd5c1ddf8a56db3f1e328179e76393140bd117fe9df7388a45e5892c0de1a");
$result=pg_query($dbconn,"TABLE friends");
$x=pg_fetch_all($result);
echo $x['id'];
/*$host="ec2-54-235-193-34.compute-1.amazonaws.com";
$user="moznmkpahvxvhm";
$password="63ebd5c1ddf8a56db3f1e328179e76393140bd117fe9df7388a45e5892c0de1a";
$dbname="d9qk8ga2mhi11j";
$port="5432";

try{
  $dsn= "pgsql:host=" . $host . ";port=" . $port .";dbname=" .$dbname .";user=" . $user . ";password=" . $password;

  $pdo=new PDO($dsn,$user,$password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
  echo 'connection falied' .$e->getMessage();
}*/

 ?>

<?php
$sql= 'SELECT * FROM friends';
$stmt=$pdo->prepare($sql);
$stmt->execute();
$rowCount=$stmt->rowCount();
$details->stmt->fetch();

echo $details ;
echo "This is index page";
?>

</body>
</html>
