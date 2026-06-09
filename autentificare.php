
<?php

require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    header('Location: login.php?error=Completeaza+email+si+parola');
    exit;
}

$user = findUserByEmail($email);

if (!$user || !password_verify($password, $user['password'])) {
    header('Location: login.php?error=Email+sau+parola+incorecta');
    exit;
}

$_SESSION['user'] = [
    'id'    => $user['id'],
    'name'  => $user['name'],
    'email' => $user['email']
];

header('Location: dashboard.php');
exit;
