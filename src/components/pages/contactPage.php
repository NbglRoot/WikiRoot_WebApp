<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <form class="d-none">
            </form>
            <form action="src/php/phpmailer.php" method="post">
                <div class="input-group-text m-2 gap-2">
                    <label for="userEmail">Email: </label>
                    <input type="email" required class="form-control" id="userEmail" name="userEmail" placeholder="----@ejemplo.xxx"
                        value="<?php if (isset($_SESSION['user_logged_in'])) {
                                    echo $_SESSION['userEmail'];
                                } else {
                                    echo "";
                                } ?>">
                </div>
                <div class="input-group-text m-2 gap-2">
                    <label for="userInsertedSubject">Asunto: </label>
                    <input type="text" required class="form-control" id="userInsertedSubject" name="userInsertedSubject" placeholder="asunto...">
                </div>
                <div class="input-group-text m-2 gap-2">
                    <label class="h-auto" for="userInsertedMessage">Mensaje: </label>
                    <textarea class="form-control" style="resize: none;" required name="userInsertedMessage" id="userInsertedMessage" rows="9"></textarea>
                </div>
                <div class="text-end">
                    <button
                        type="submit"
                        name="submit"
                        class="btn btn-primary">
                        Enviar
                    </button>

                </div>
            </form>
        </div>
    </div>
</main>