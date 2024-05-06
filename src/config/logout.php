<?php
include 'databases.php';
session_destroy();
header("Location: ../pages/login.php");
exit;
