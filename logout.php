<?php
session_start();
$_SESSION['login']=="";

session_unset();
$_SESSION['action']="You Have Logged Out Successfully.";


?>
<script type="text/javascript">
	document.location="index.php";
</script>