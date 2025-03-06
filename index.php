<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
}

if (isset($_GET['loginFailed'])) { ?>
    <div class="alert alert-primary d-flex position-absolute bottom-0 start-0 end-0 m-5 align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </svg>
        <div>
            <b>Error</b> al introducir sus credenciales para iniciar sesión. Vuelva a intentarlo.
        </div>
    </div>
<?php
}

require 'components/header.php';
include 'components/popups.php';
require 'components/footer.php';
?>

<!doctype html>
<html lang="es-ES">

<head>
    <title>WikiRoot</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- favicon -->
    <link rel="shortcut icon" href="/public/media/favicon/wikirooticon.png" type="image/x-icon">

    <!-- css links -->
    <link rel="stylesheet" href="assets/css/mainStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>

<body>
    <div class="background-body p-5">
        <?php
        if (isset($_GET['articles'])) {
            require_once 'components/pages/articlesPage.php';
        } elseif (isset($_GET['register'])) {
            require_once 'components/pages/registerPage.php';
        } elseif (isset($_GET['user'])) {
            if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] === false) { ?>
                <div class="alert alert-primary d-flex position-absolute bottom-0 start-0 end-0 m-5 align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <div>
                        <b>Error</b>: Debe iniciar sesión para acceder a esta función.
                    </div>
                </div>
        <?php
            } else {
                require_once 'components/pages/profile.php';
            }
        } else {
            require_once 'components/pages/heroLandingPage.php';
        } ?>
    </div>

    <!-- Page scripts + Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>

    <script src="assets/js/main.js"></script>

    <!-- Bootstrap and Popper JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <!-- Font Awesome for Icons JavaScript -->
    <script src="https://kit.fontawesome.com/259098186a.js" crossorigin="anonymous"></script>


</body>

</html>