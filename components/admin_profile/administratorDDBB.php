<?php
session_start();
if (strtolower($_SESSION['userRole']) !== 'admin') {
    header("Location: ../../index.php");
}
require '../../src/php/controller/adminConfig.php';
require 'headerAdmin.php';
require '../footer.php';


// ADMIN DDBB | users table
$adminEmail = $_SESSION['userEmail'];
$query = $conn->prepare("SELECT * FROM users WHERE email != ?");
$query->bind_param("s", $adminEmail);
$query->execute();
$result = $query->get_result();

?>

<!doctype html>
<html lang="es-ES">

<head>
    <title>WikiRoot - Admin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- favicon -->
    <link rel="shortcut icon" href="../../public/media/favicon/wikirooticon.png" type="image/x-icon">

    <!-- css links -->
    <link rel="stylesheet" href="../../assets/css/mainStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">

    <!-- main script -->
    <!-- Page scripts -->
    <script defer src="../../assets/js/main.js"></script>
</head>

<body>
    <div class="bg-dark solid-backgroud position-absolute bottom-0 top-0 start-0 end-0 p-5 h-100 overflow-scroll">
        <main class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="filter_control d-flex justify-content-between gap-5 mb-3 align-items-center">
                        <div class="input-group w-auto align-items-center gap-3">
                            <label class="text-white p-2 border rounded-3" for="usersTextInputFilter"><i class="fa fa-search" style="font-size: 1.2rem;" aria-hidden="true"></i></label>
                            <input class="p-2 rounded-3 usersTextInputFilter" type="text" name="usersTextInputFilter" id="usersTextInputFilter">
                        </div>
                    </div>
                    <table class="table mt-1 table-dark table-striped table-bordered table-responsive table-hover align-middle text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Estado</th>
                                <th>Rol</th>
                                <th>Opciones de Admin</th>
                        </thead>
                        <tbody id="adminTableBody" class="table-group-divider">

                            <?php
                            while ($users = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td> <?php echo $users['id'] ?> </td>
                                    <td> <?php echo $users['firstName'] ?> </td>
                                    <td> <?php echo $users['lastName'] ?> </td>
                                    <td> <?php echo $users['email'] ?> </td>
                                    <td> <?php
                                            if ($users['ban_status'] == 'not_banned') {
                                                echo 'No Baneado';
                                            } else {
                                                echo 'Baneado';
                                            }
                                            ?> </td>
                                    <td>
                                        <form id="adminRoleAdministration" action="../../src/php/controller/adminConfig.php?idRoleChange=<?php echo $users['id']; ?>" class="m-0" method="post">
                                            <select name="roleEdited" class="usersRole_adminControl p-1">
                                                <option> <?php if ($users['role'] == 1) {
                                                                echo 'Editor';
                                                            } else {
                                                                echo 'Admin';
                                                            } ?> </option>
                                                <option> <?php if ($users['role'] == 2) {
                                                                echo 'Editor';
                                                            } else {
                                                                echo 'Admin';
                                                            } ?> </option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="d-flex gap-3 align-items-center justify-content-center">
                                        <form class="m-0" action="../../src/php/controller/adminConfig.php?idUserBan=<?php echo $users['id']; ?>&userStatus=<?php echo $users['ban_status'] ?>" method="post">
                                            <button name="banUser" class="btn btn-info userBanButton" type="submit">
                                                <?php
                                                if ($users['ban_status'] == 'not_banned') {
                                                    echo '<i class="fa fa-ban" aria-hidden="true"></i>';
                                                } else {
                                                    echo '<i class="fa fa-check" aria-hidden="true"></i>';
                                                }
                                                ?>


                                            </button>
                                        </form>
                                        <form class="m-0" action="../../src/php/controller/adminConfig.php?idUserDelete=<?php echo $users['id']; ?>" method="post">
                                            <button name="deleteUser" class="btn btn-danger deleteUser" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Bootstrap, Popper and JQuery JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>

    <!-- Font Awesome for Icons JavaScript -->
    <script src="https://kit.fontawesome.com/259098186a.js" crossorigin="anonymous"></script>
</body>

</html>