<?php
session_start();
unset($_SESSION['session']);
header("location:index.php");
