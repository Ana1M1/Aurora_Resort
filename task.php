<?php
 
require_once 'functions.php';
requireLogin();
 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: dashboard.php');
    exit;
}
 
// Rezervarea e confirmata — in viitor poti salva in JSON
// Redirectioneaza cu mesaj de confirmare
header('Location: dashboard.php?confirmed=1');
exit;