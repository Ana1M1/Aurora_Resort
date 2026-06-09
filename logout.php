<?php
 
require_once 'functions.php';
 
$_SESSION = [];
session_destroy();
 
header('Location: index.php?logout=1');
exit;