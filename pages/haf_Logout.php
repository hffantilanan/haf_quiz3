<?php
session_start();
session_destroy();
header("location:haf_login.php");
?>