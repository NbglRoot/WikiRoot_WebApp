<?php
// alert login succesfully
if (isset($_GET['success']) == 'loginSuccess') { ?>
    <div
        class="alert alert-primary m-3 shadow position-absolute alert-dismissible fade show"
        role="alert">
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
        <i class="fa fa-info" aria-hidden="true"></i>
        Has iniciado sesión como: <strong> <?php echo $_SESSION['userName'] ?> </strong>
    </div>
<?php
}
// alert user is banned
if (isset($_GET['userIsBanned']) == 'active') { ?>
    <div
        class="alert alert-primary m-3 shadow position-absolute alert-dismissible fade show"
        role="alert">
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
        <i class="fa fa-exclamation" aria-hidden="true"></i>
        Esta cuenta esta suspendida <strong>suspendida</strong>.
    </div>
<?php
}

if (isset($_GET['wrongPassword'])) { ?>
    <div
        class="alert alert-primary m-3 shadow position-absolute alert-dismissible fade show"
        role="alert">
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
        <i class="fa fa-exclamation" aria-hidden="true"></i>
        <strong>Error</strong> al Introducir su actual <strong>contraseña</strong>.
    </div>
<?php
}

if (isset($_GET['samePassword'])) { ?>
    <div
        class="alert alert-primary m-3 shadow position-absolute alert-dismissible fade show"
        role="alert">
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
        <i class="fa fa-exclamation" aria-hidden="true"></i>
        <strong>Error</strong> se debe introducir una <strong>contraseña</strong> nueva.
    </div>
<?php
}

if (isset($_GET['emptyFields'])) { ?>
    <div
        class="alert alert-primary m-3 shadow position-absolute alert-dismissible fade show"
        role="alert">
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
        <i class="fa fa-exclamation" aria-hidden="true"></i>
        <strong>Error</strong>: No se puede tener campos <strong>vacios</strong>.
    </div>
<?php
}
