<?php
require_once __DIR__ . '/../db_conn.php';
// Log-In
function loginUser($conn, $email, $password)
{
    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();
    $userInfo = mysqli_fetch_assoc($result);
    if ($userInfo['ban_status'] == 'banned') {
        header("Location:../../../index.php?userIsBanned=active");
    } else {
        if (mysqli_num_rows($result) > 0 && password_verify($password, $userInfo['password'])) {
            session_start();
            $_SESSION['user_logged_in'] = true;
            $_SESSION['userName'] = $userInfo['firstName'];
            $_SESSION['userLastName'] = $userInfo['lastName'];
            $_SESSION['userEmail'] = $userInfo['email'];
            $_SESSION['userRole'] = $userInfo['role'];
            $_SESSION['userUniqueId'] = $userInfo['id'];
            $_SESSION['userPass'] = $userInfo['password'];
            if ($userInfo['role'] == 1) {
                $_SESSION['userRole'] = "Editor";
            }
            if ($userInfo['role'] == 2) {
                $_SESSION['userRole'] = "Admin";
            }
            header("Location: ../../../index.php?success=loginSuccess");
            die();
        } else {
            header("Location: ../../../index.php?loginFailed");
            die();
        }
    }
}

// account check if exixts
function accountExists($conn, $email)
{
    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    while (mysqli_fetch_assoc($result) > 0) {
        return true;
    }
}

// Register new user
function createNewUser($conn, $firstName, $lastName, $userEmail, $password, $gender)
{
    $query = $conn->prepare("INSERT INTO users (firstName, lastName, email, password, gender) VALUES (?, ?, ?, ?, ?)");
    $protectedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query->bind_param("sssss", $firstName, $lastName, $userEmail, $protectedPassword, $gender);
    $query->execute();
    $query->close();
}
