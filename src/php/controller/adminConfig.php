<?php
require_once __DIR__ . '/../db_conn.php';

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
    header("Location: ../../components/admin_profile/administratorDDBB.php?userManagement");
    die();
}

// ADMIN users DELETE USER 
if (isset($_GET['idUserDelete']) && isset($_POST['deleteUser'])) {
    $id = $_GET['idUserDelete'];
    $query = $conn->prepare("DELETE FROM users WHERE id =?");
    $query->bind_param('i', $id);
    $query->execute();
    header("Location: ../../components/admin_profile/administratorDDBB.php?userManagement");
    die();
}

// ADMIN users BAN USER
if (isset($_GET['idUserBan']) && isset($_GET['userStatus']) && isset($_POST['banUser'])) {
    $userId = $_GET['idUserBan'];
    $userCurrentStatus = $_GET['userStatus'];
    $query = $conn->prepare("UPDATE users SET ban_status = ? WHERE id = ?");
    if ($userCurrentStatus == 'banned') {
        $newRole = 'not_banned';
        $query->bind_param('si', $newRole, $userId);
    } else {
        $newRole = 'banned';
        $query->bind_param('si', $newRole, $userId);
    }
    $query->execute();
    header("Location: ../../components/admin_profile/administratorDDBB.php?userManagement");
    die();
}

// ADMIN articles DELETE
if (isset($_GET['idArticleDelete'])) {
    $id = $_GET['idArticleDelete'];
    $query = $conn->prepare("DELETE FROM articles WHERE id =?");
    $query->bind_param('i', $id);
    $query->execute();
    header("Location: ../../components/admin_profile/administratorDDBB.php?articlesManagement");
}
