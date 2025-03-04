<?php
require 'db_conn.php';

// ADMIN users FILTERS
if (isset($_GET['roleAssignated'])) {
    $filter = $_GET['roleAssignated'];
    $query = $conn->prepare("UPDATE users SET role = ? WHERE id= ?");
    $query->bind_param("is", $filter);
    $query->execute();
    $result = $query->get_result();
}

// ADMIN users CHANGE ROLE
if (isset($_GET['idRoleChange']) && isset($_POST['roleEdited'])) {
    session_start();
    $id = $_GET['idRoleChange'];
    $userRole = $_POST['roleEdited'];
    if ($userRole == 'Editor') {
        $role = 1;
    }
    if ($userRole == 'Admin') {
        $role = 2;
    }
    $query = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
    $query->bind_param('ii', $role, $id);
    $query->execute();
    header("Location: ../../../components/admin_profile/administratorDDBB.php");
    die();
}

if (isset($_GET['idUserDelete']) && isset($_POST['deleteUser'])) {
    $id = $_GET['idUserDelete'];
    $query = $conn->prepare("DELETE FROM users WHERE id =?");
    $query->bind_param('i', $id);
    $query->execute();
    header("Location:../../../components/admin_profile/administratorDDBB.php");
    die();
}
