<?php
if (isset($_GET['success']) == 'loginSuccess') { ?>
    <div
        class="alert alert-primary m-3 shadow position-absolute alert-dismissible fade show"
        role="alert">
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Close"></button>
        Has iniciado sesión como: <strong> <?php echo $_SESSION['userName'] ?> </strong>
    </div>
<?php
}
