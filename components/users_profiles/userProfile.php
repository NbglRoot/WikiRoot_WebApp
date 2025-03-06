<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] != true) {
    header("Location:../../index.php");
}


require 'header.php';
require '../popups.php';
require '../footer.php';
?>

<!doctype html>
<html lang="es-ES">

<head>
    <title>WikiRoot</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- favicon -->
    <link rel="shortcut icon" href="../../public/media/favicon/wikirooticon.png" type="image/x-icon">

    <!-- css links -->
    <link rel="stylesheet" href="../../assets/css/mainStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>

<body>
    <div class="bg-dark solid-backgroud position-absolute bottom-0 top-0 start-0 end-0 pt-5">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Información de Cuenta</h5>
                            <h6 class="card-subtitle mb-2 text-muted ">Información Publica General</h6>
                            <hr>
                            <form action="../../src/php/controller/profileConfig.php?updateGeneralInfo" id="generalInfo" method="post" class="form-check-inline m-3 gap-3 d-flex flex-wrap justify-content-evenly align-items-center">
                                <div class="input-group gap-2 align-items-center m-2 w-auto">
                                    <label for="userCurrentName">Nombre: </label>
                                    <input disabled="true" type="text" size="25" name="userCurrentName" id="userCurrentName" class="p-1 shadow form-control" value="<?php echo $_SESSION['userName'] ?>">
                                </div>
                                <div class="input-group gap-2 align-items-center m-2 w-auto">
                                    <label for="userCurrentLastName">Apellidos: </label>
                                    <input disabled="true" type="text" size="25" name="userCurrentLastName" id="userCurrentLastName" class="p-1 shadow form-control" value="<?php echo $_SESSION['userLastName'] ?>">
                                </div>
                                <div class="input-group gap-2 align-items-center m-2 w-auto">
                                    <label for="userCurrentEmail">Email: </label>
                                    <input disabled="true" type="email" size="25" name="userCurrentEmail" id="userCurrentEmail" class="p-1 shadow form-control" value="<?php echo $_SESSION['userEmail'] ?>">
                                </div>
                                <div class="input-group gap-2 align-items-center m-2 w-auto">
                                    <label for="userRol">Rol: </label>
                                    <input disabled="true" readonly type="text" size="5" name="userRol" id="userRol" class="p-1 shadow form-control" value="<?php echo $_SESSION['userRole'] ?>">
                                </div>
                                <button type="button" class="btn btn-danger d-block confirmUserEdit">Editar</button>
                                <button type="submit" class="btn btn-primary d-none applyUserEdit">Editar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Seguridad de Cuenta</h5>
                            <h6 class="card-subtitle mb-2 text-muted ">Información Privada de Seguridad</h6>
                            <hr>
                            <form action="../../src/php/controller/profileConfig.php?updatePrivateInfo" method="post" id="privateInfo" class="form-check-inline m-3 d-flex align-items-center justify-content-between">
                                <div class="gap-2 align-items-center m-2 w-auto">
                                    <label for="userCurrentPassword">Contraseña Actual: </label>
                                    <input disabled="true" size="25" name="userCurrentPassword" id="userCurrentPassword" class="p-1 shadow form-control" type="password" value="">
                                </div>
                                <div class="gap-2 align-items-center m-2 w-auto">
                                    <label for="userNewPassword">Contraseña Nueva: </label>
                                    <input disabled="true" size="25" name="userNewPassword" id="userNewPassword" class="p-1 shadow form-control" type="password" value="">
                                </div>
                                <button type="button" class="btn btn-danger d-block confirmUserEditPrivateInfo">Editar</button>
                                <button type="submit" class="btn btn-primary d-none applyUserEditPrivateInfo">Editar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <!-- Page scripts -->
    <script src="../../assets/js/main.js"></script>
</body>

</html>