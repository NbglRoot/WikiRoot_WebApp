<main class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Crear cuenta nueva.</h3>
                </div>
                <div class="card-body">
                    <form action="src/php/view/users_forms.php" method="POST">
                        <div class="d-flex justify-content-evenly">
                            <div class="mb-3">
                                <label for="userName" class="form-label">Nombre: </label>
                                <input required type="text" class="form-control" id="userName" name="newUserName" required>
                            </div>
                            <div class="mb-3">
                                <label for="userLastname" class="form-label">Apellidos: </label>
                                <input required type="text" class="form-control" id="userLastname" name="newUserLastname" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-evenly">
                            <div class="mb-3">
                                <label for="userEmail" class="form-label">Email</label>
                                <input required type="email" class="form-control" id="userEmail" name="newUserEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña: </label>
                                <input required type="password" class="form-control" id="password" name="newUserPassword" required>
                            </div>
                        </div>
                        <div class="mb-3 text-center">
                            <label class="form-label">Genero</label>
                            <div class="d-flex gap-3 justify-content-center">
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="gender" id="hombre" value="hombre">
                                    <label class="form-check-label" for="hombre">
                                        Hombre
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="gender" id="mujer" value="mujer">
                                    <label class="form-check-label" for="mujer">
                                        Mujer
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input required class="form-check-input" type="radio" name="gender" id="otro" value="otro">
                                    <label class="form-check-label" for="otro">
                                        Otro
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <input type="submit" name="registerNewUser" value="Registrar" class="btn btn-primary">
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>