<?php
require '../../php/db_conn.php';
$query = $conn->prepare("SELECT * FROM articles");
$query->execute();
$result = $query->get_result();

if (isset($_SESSION['user_logged_in'])) { ?>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark navbar__preferences">
      <div class="container-fluid">
        <a
          class="navbar-brand"
          href="../../../index.php">
          <img
            src="../../../public/media/favicon/wikirooticon.png"
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
          <form action="../articles/articlesPage.php" method="GET" class="m-2">
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
                    <a class="dropdown-item" href="administratorDDBB.php?userManagement">Gestionar Usuarios</a>
                    <a class="dropdown-item" href="administratorDDBB.php?articlesManagement">Gestionar Articulos</a>
                  <?php } ?>
                  <a class="dropdown-item" href="../articles/articlesPage.php?createNewArticle">Crear Articulo</a>
                  <a class="dropdown-item" href="../users_profiles/userProfile.php">Perfil</a>
                  <?php
                  if (!isset($_GET['contact'])) { ?>
                    <hr>
                    <a class="dropdown-item" href="../../../index.php?contact">
                      Contacta con Nosotros
                    </a>
                  <?php } ?>
                  <hr>
                  <a href="../../index.php?logout" class="dropdown-item">Cerrar Sesión</a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
<?php
}
