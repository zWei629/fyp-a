<?php
session_start();
$id = $_SESSION['Id'];
$name = $_POST['nam'];
$from = $_POST['from'];
$sub = $_POST['sub'];
$mess = $_POST['mess'];
$to = "zhanwei0629@hotmail.com";
$head = 'From: ' . $name . "\r\n" .
	'Reply to: ' . $from . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
$mail = mail($to, $sub, $mess, $head);
if ($mail) {
	?>
	<script>
		alert("Sent Sucessfully");
		window.location.href = "index.php";
	</script>
<?php
} else {
	?>
	<script>
		 alert("Sent Sucessfully");
		 window.location.href = "contact.php";
	</script>
<?php
}
?>
