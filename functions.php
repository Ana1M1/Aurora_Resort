<?php

session_start();

define('USERS_FILE', __DIR__ . '/user.json');


function getUsers()
{
    if (!file_exists(USERS_FILE)) {
        file_put_contents(USERS_FILE, '[]');
    }
    $json = file_get_contents(USERS_FILE);
    return json_decode($json, true) ?? [];
}

function saveUsers(array $users)
{
    file_put_contents(USERS_FILE, json_encode($users, JSON_PRETTY_PRINT));
}

function findUserByEmail(string $email)
{
    foreach (getUsers() as $user) {
        if ($user['email'] === $email) {
            return $user;
        }
    }
    return null;
}

function isLoggedIn(): bool
{
    return isset($_SESSION['user']);
}

function getLoggedUser()
{
    return $_SESSION['user'] ?? null;
}

function requireLogin()
{
    if (!isLoggedIn()) {
        header('Location: login.php?error=Trebuie+sa+fii+autentificat');
        exit;
    }
}
