<?php
require 'src/php/db_conn.php';
$query = $conn->prepare("SELECT * FROM articles");
$query->execute();
$result = $query->get_result();

if (isset($_SESSION['user_logged_in'])) { ?>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark navbar__preferences">
      <div class="container-fluid">
        <a
          class="navbar-brand"
          href="index.php">
          <img
            src="public/media/favicon/wikirooticon.png"
            alt="icono de wikiroot"
            class="img-fluid rounded"
            id="wikirootIcon"
            width="42px"
            height="42px" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarID"
          aria-controls="navbarID"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse align-items-center justify-content-between navbar-collapse"
          id="navbarID">
          <form action="components/articles/articlesPage.php" method="GET" class="m-2">
            <div class="input-group gap-2">
              <input
                type="text"
                list="searchArticle"
                name="searchBar"
                autocomplete="off"
                class="form-control rounded-1"
                placeholder="Buscar en WikiRoot"
                aria-label="Buscar en WikiRoot" />
              <datalist id="searchArticle">
                <?php
                while ($article = mysqli_fetch_assoc($result)) { ?>
                  <option value="<?php echo $article['article_title']; ?>">
                    <a href="articlesPage.php?post=<?php echo $article['article_title']; ?>"><?php $article['article_title']; ?></a>
                  </option>
                <?php
                } ?>
              </datalist>
              <button
                class="btn btn-primary rounded-1"
                type="submit"
                id="button-addon1">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          <div
            class="d-flex gap-3 justify-content-center mt-3 mb-3 mt-md-0 mb-md-0">
            <div class="navbar-nav">
              <div class="dropdown dropstart open">
                <button
                  class="btn btn-secondary dropdown-toggle d-flex align-items-center gap-2"
                  type="button"
                  id="userOptions"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false">
                  <i class="fa fa-home" aria-hidden="true"></i>
                  <?php echo $_SESSION['userName'];
                  echo " | ";
                  echo $_SESSION['userRole'];
                  ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="userOptions">
                  <?php
                  if (strtolower($_SESSION['userRole']) == "admin") { ?>
                    <a class="dropdown-item" href="components/admin_profile/administratorDDBB.php?userManagement">Gestionar Usuarios</a>
                    <a class="dropdown-item" href="components/admin_profile/administratorDDBB.php?articlesManagement">Gestionar Articulos</a>
                  <?php } ?>
                  <a class="dropdown-item" href="components/articles/articlesPage.php?createNewArticle">Crear Articulo</a>
                  <a class="dropdown-item" href="components/users_profiles/userProfile.php">Perfil</a>
                  <?php
                  if (!isset($_GET['contact'])) { ?>
                    <hr>
                    <a class="nav-link active btn btn-primary rounded-3" href="index.php?contact">
                      Contacta con Nosotros
                    </a>
                  <?php } ?>
                  <hr>
                  <a href="index.php?logout" class="dropdown-item">Cerrar Sesión</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
<?php
} else { ?>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark navbar__preferences">
      <div class="container-fluid">
        <a
          class="navbar-brand"
          href="index.php">
          <img
            src="public/media/favicon/wikirooticon.png"
            alt="icono de wikiroot"
            class="img-fluid rounded"
            width="42px"
            height="42px" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarID"
          aria-controls="navbarID"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse align-items-center justify-content-between navbar-collapse"
          id="navbarID">
          <form action="components/articles/articlesPage.php" method="GET" class="m-2">
            <div class="input-group gap-2">
              <input
                type="text"
                list="searchArticle"
                name="searchBar"
                autocomplete="off"
                class="form-control rounded-1"
                placeholder="Buscar en WikiRoot"
                aria-label="Buscar en WikiRoot" />
              <datalist id="searchArticle">
                <?php
                while ($article = mysqli_fetch_assoc($result)) { ?>
                  <option value="<?php echo $article['article_title']; ?>">
                    <a href="articlesPage.php?post=<?php echo $article['article_title']; ?>"><?php $article['article_title']; ?></a>
                  </option>
                <?php
                } ?>
              </datalist>
              <button
                class="btn btn-primary rounded-1"
                type="submit"
                id="button-addon1">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </form>
          <div
            class="d-flex gap-3 justify-content-center mt-3 mb-3 mt-md-0 mb-md-0">
            <div class="navbar-nav">
              <?php
              if (isset($_GET['register']) || isset($_GET['contact'])) {
                echo "";
              } else { ?>
                <a
                  class="nav-link active btn btn-primary p-1 rounded-3 d-flex align-items-center gap-2"
                  aria-current="page"
                  data-bs-toggle="modal"
                  data-bs-target="#login"
                  href="#">
                  <i class="fa fa-sign-in" aria-hidden="true"></i>
                  Iniciar Sesion</a>
              <?php } ?>
            </div>
            <div class="navbar-nav">
              <?php
              if (isset($_GET['register'])) { ?>
                <a href="index.php" style=" font-size: 1.5rem;" class="link-info"> <i class="fa fa-home" aria-hidden="true"></i> </a>
              <?php
              } else { ?>
                <a
                  class="nav-link active btn btn-primary p-1 rounded-3 d-flex align-items-center gap-2"
                  aria-current="page"
                  href="index.php?register">
                  <i class="fa fa-address-card" aria-hidden="true"></i>
                  Registrarse</a>
              <?php } ?>
            </div>
            <div class="navbar-nav">
              <?php
              if (!isset($_GET['contact'])) { ?>
                <a class="nav-link active btn btn-primary p-1 rounded-3 d-flex align-items-center gap-2" href="index.php?contact">
                  Contacta con Nosotros
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <?php
      if (isset($_GET['register'])) {
        echo "";
      } else { ?>
        <!-- modal inicio sesion -->
        <div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel"> Iniciar Sesion</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="src/php/view/users_forms.php" method="post">
                  <div class="mb-3">
                    <label for="userEmail" class="form-label">Correo Electronico: </label>
                    <input required type="email" name="userEmail" class="form-control" id="userEmail" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="userPassword" class="form-label">Contraseña: </label>
                    <input required type="password" name="userPassword" class="form-control" id="userPassword" aria-describedby="passwordHelp">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="loginSubmit">Iniciar Sesion</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        <?php } ?>
    </nav>
  </header>
<?php } ?>