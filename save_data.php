<?php
 
require_once 'functions.php';
 
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: sign_up.php');
    exit;
}
 
$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$phone    = trim($_POST['phone'] ?? '');
$password = $_POST['password'] ?? '';
 
// Validari simple
if (!$name || !$email || !$password) {
    header('Location: sign_up.php?error=Completeaza+toate+campurile+obligatorii');
    exit;
}
 
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: sign_up.php?error=Email+invalid');
    exit;
}
 
if (strlen($password) < 6) {
    header('Location: sign_up.php?error=Parola+trebuie+sa+aiba+cel+putin+6+caractere');
    exit;
}
 
// Verifica daca emailul exista deja
if (findUserByEmail($email)) {
    header('Location: sign_up.php?error=Acest+email+este+deja+inregistrat');
    exit;
}
 
// Creeaza userul nou
$newUser = [
    'id'       => uniqid(),
    'name'     => $name,
    'email'    => $email,
    'phone'    => $phone,
    'password' => password_hash($password, PASSWORD_DEFAULT),
    'created'  => date('Y-m-d H:i:s')
];
 
$users = getUsers();
$users[] = $newUser;
saveUsers($users);
 
// Logheaza automat dupa inregistrare
$_SESSION['user'] = [
    'id'    => $newUser['id'],
    'name'  => $newUser['name'],
    'email' => $newUser['email']
];
 
header('Location: dashboard.php?welcome=1');
exit;
 