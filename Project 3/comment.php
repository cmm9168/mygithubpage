<?php 
    $page='Comment';
    include('assets/inc/header.php'); 
    include('assets/inc/nav.php');

<?php
$sql_host = "localhost";
$sql_username = "cmm9168";
$sql_password = "CoolBlue";
$sql_database = "cmm9168";
mysql_connect("$sql_host", "$sql_username", "$sql_password")or die("cannot connect to server");
mysql_select_db("$sql_database")or die("cannot select DB");
 
function show_reviews() {
    $get_entries = mysql_query("SELECT name, DATE_FORMAT( timedate, '%M %d, %Y at %h:%i %p' ) as timedate, message FROM reviews ORDER BY id DESC");
    while($rows = mysql_fetch_array($get_entries)) {
		echo '<strong>Posted by '.$rows['name'].' on '.$rows['timedate' ].'</strong><br>
        '.$rows['message'].'<br><br>';
    }
}
 
function add_entry() {
    $name = mysql_real_escape_string($_POST['name']);
    $email = mysql_real_escape_string($_POST['email']);
    $message = mysql_real_escape_string($_POST['message']);
    
    include('header.php'); 
    include('nav.php');

    echo '<div id="main"><div id="content">';

    if($name=="") {
        echo '<div>The name field is empty. Please fill out your name.';
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div>The email could not be validated. Please provide a real email address.';
    }
    elseif($message=="") {
        echo '<div>The comment field is empty. Please fill out a comment.';
    	
    }
    
    
    else {
        $insertSQL = mysql_query("INSERT INTO reviews (timedate, name, email, message) VALUES (NOW(), '$name', '$email', '$message')");
        if($insertSQL) {
            echo '<div>The comment was successfully uploaded. Thank you! :)';
        }
        else {
            echo '<div>An error occured while uploading the entry to database. Please try again later.';
        }
    }
        echo '<br><br><a href="http://nova.it.rit.edu/~cmm9168/comment.php?">Click here to go back to the Comment page</a></div>';
        include('footer.php');

}
 
 
if(isset($_GET['add']) and $_GET['add'] == "entry") {
    add_entry();
}
else {
    echo '
    <h1>Reviews</h1>
	<div id="reviews">
	<h2>Add a new comment</h2>
    <form action="assets/inc/guestbook.php?add=entry" method="post">
    Name:<br>
    <input type="text" name="name"><br><br>
    Email:<br>
    <input type="text" name="email"><br><br>
    Comment:<br>
    <textarea name="message" style="width:300px;height:250px;"></textarea><br><br>
    <input type="submit" value="Enter Review">
    </form>
	</div>
    <h2>Reviews Entries</h2>
	<div id="entries">';
    show_reviews();
    
}
 
echo '
</div>';
?>