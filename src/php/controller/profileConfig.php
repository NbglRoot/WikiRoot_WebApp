<?php
require 'db_conn.php';
session_start();

if (isset($_GET['updateGeneralInfo'])) {
    $userId = $_SESSION['userUniqueId'];
    $userNewFirstName = $_POST['userCurrentName'];
    $userNewLastName = $_POST['userCurrentLastName'];
    $userNewEmail = $_POST['userCurrentEmail'];
    if ($userNewFirstName != '' && $userNewLastName != '' && $userNewEmail != '') {
        $query = $conn->prepare("UPDATE users SET firstName = ?, lastName = ?, email = ? WHERE id = ?");
        $query->bind_param('sssi', $userNewFirstName, $userNewLastName, $userNewEmail, $userId);
        $query->execute();
        session_destroy();
        header("Location:../../../index.php");
    } else {
        header("Location:../../../components/users_profiles/userProfile.php?emptyFields");
    }
}

if (isset($_GET['updatePrivateInfo'])) {
    $userId = $_SESSION['userUniqueId'];
    $userCurrentPassword = $_POST['userCurrentPassword'];
    $userNewPassword = password_hash($_POST['userNewPassword'], PASSWORD_DEFAULT);
    if (!password_verify($userCurrentPassword, $userNewPassword)) {
        if ($userNewPassword != '' && password_verify($userCurrentPassword, $_SESSION['userPass'])) {
            $query = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $query->bind_param('si', $userNewPassword, $userId);
            $query->execute();
            session_destroy();
            header("Location:../../../index.php");
        } else {
            header("Location:../../../components/users_profiles/userProfile.php?wrongPassword");
        }
    } else {
        header("Location:../../../components/users_profiles/userProfile.php?samePassword");
    }
}

if (isset($_GET['deleteMyAccount'])) {
    $userEmail = $_SESSION['userEmail'];
    $query = $conn->prepare("DELETE FROM users WHERE email =?");
    $query->bind_param('s', $userEmail);
    $query->execute();
    session_destroy();
    header("Location:../../../index.php");
}
