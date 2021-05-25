<?php
session_start();
session_destroy();
header("Location: ../../frontend/landing/index.php");
?>