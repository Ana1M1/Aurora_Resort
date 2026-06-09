<?php
 
session_start();
 
define('USERS_FILE', __DIR__ . '/user.json');
 
// Citeste toti userii din JSON
function getUsers() {
    if (!file_exists(USERS_FILE)) {
        file_put_contents(USERS_FILE, '[]');
    }
    $json = file_get_contents(USERS_FILE);
    return json_decode($json, true) ?? [];
}
 
// Salveaza lista de useri in JSON
function saveUsers(array $users) {
    file_put_contents(USERS_FILE, json_encode($users, JSON_PRETTY_PRINT));
}
 
// Cauta un user dupa email
function findUserByEmail(string $email) {
    foreach (getUsers() as $user) {
        if ($user['email'] === $email) {
            return $user;
        }
    }
    return null;
}
 
// Verifica daca userul este logat
function isLoggedIn(): bool {
    return isset($_SESSION['user']);
}
 
// Returneaza datele userului logat
function getLoggedUser() {
    return $_SESSION['user'] ?? null;
}
 
// Redirectioneaza daca nu e logat
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php?error=Trebuie+sa+fii+autentificat');
        exit;
    }
}