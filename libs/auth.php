<?php


function getCurrentUserId()
{
    return $_SESSION['login']->id;
}

function isUserLoggedIn()
{
    if (isset($_SESSION['login']) && !empty($_SESSION['login']))
        return true;
    return false;
}

function register($name, $email, $password)
{
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);
    global $pdo;
    $query = "insert into users (name,email,password) values (:name,:email,:password)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([":name" => $name, ":email" => $email, ":password" => $passwordHash]);
    return $stmt->rowCount();
}

function signIn($email, $password)
{
    global $pdo;
    $query = "select * from users where email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute([":email" => $email]);
    $user = $stmt->fetchObject();
    if (Password_Verify($password, $user->password)) {
        $_SESSION['login'] = $user;
        return;
    }
    return "email or password is not correct";
}

function logOut()
{
    unset($_SESSION['login']);
}
