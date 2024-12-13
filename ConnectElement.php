<?php

session_start();

$Key = $_GET['Key'] ?? null;

if (isset($Key)) {
    $_SESSION['Key'] = $Key;
    exit(header('Location: index.php'));
}