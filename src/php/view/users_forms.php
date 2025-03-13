<style>
    html {
        color-scheme: light dark;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    body {
        width: 100vw;
        height: 100vh;
        display: grid;
        place-content: center;
        overflow: hidden;
    }

    .title__error {
        padding: 12px 32px;
        background-color: #252525;
        color: #fff;
        border-radius: 16px;
    }

    .link__return {
        color: #fff;
        text-decoration: none;
        padding: 12px 32px;
        background-color: #000;
        width: fit-content;
        margin: 1rem auto;
        border-radius: 16px;
        text-align: center;
    }
</style>

<?php
require '../controller/usersController.php';
require '../model/usersModel.php';
require_once __DIR__ . '/../db_conn.php';

// login form
if (isset($_POST['loginSubmit'])) {
    loginUser($conn, $_POST['userEmail'], $_POST['userPassword']);
}

// Register form
if (isset($_POST['registerNewUser'])) {
    if (!accountExists($conn, $_POST['newUserEmail'])) {
        createNewUser($conn, $_POST['newUserName'], $_POST['newUserLastname'], $_POST['newUserEmail'], $_POST['newUserPassword'], $_POST['gender']);
?>
        <h1 class="title__error">Cuenta creada con exito.</h1>
        <a class="link__return" href="../../../index.php">Volver al Inicio</a>
    <?php
    } else { ?>
        <h1 class="title__error"> Esta cuenta ya esta creada.</h1>
        <a class="link__return" href="../../../index.php">Volver al Inicio</a>
<?php
    }
} ?>