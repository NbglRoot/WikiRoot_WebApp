<?php
session_start();

require 'header.php';
require '../../src/php/controller/articlesController.php';
include '../popups.php';
require '../footer.php';
?>

<!doctype html>
<html lang="es-ES">

<head>
    <title>WikiRoot</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- favicon -->
    <link rel="shortcut icon" href="../..//public/media/favicon/wikirooticon.png" type="image/x-icon">

    <!-- css links -->
    <link rel="stylesheet" href="../../assets/css/mainStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous">
</head>

<body>
    <div class="solid-backgroud overflow-scroll position-absolute top-0 bottom-0 start-0 end-0 bg-dark p-5">
        <?php
        if (isset($_GET['showAllArticles'])) { ?>
            <main class="container mt-5 mb-5">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-4">
                        <div class="card bg-dark border text-white text-start">
                            <h4 class="card-title pt-3 text-center">Articulos</h4>
                            <hr>
                            <div class="card-body card__articles bg-dark text-white rounded-3">
                                <div class="list-group">
                                    <?php
                                    while ($rowArticle = mysqli_fetch_assoc($result)) { ?>
                                        <a href="articlesPage.php?post=<?php echo $rowArticle['article_title']; ?>" class="list-group-item card-text bg-dark text-white border mb-3 list-group-item-action" aria-current="true">
                                            <?php echo $rowArticle['article_title']; ?>
                                        </a>
                                    <?php
                                    } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 mt-3 mt-md-0">
                        <div class="card bg-dark border card__aboutUs text-start">
                            <div class="card-body text-white justify-content-between d-flex flex-column">
                                <div class="main__content">
                                    <div class="catd__title__image d-flex justify-content-center gap-5 align-items-center">
                                        <img
                                            class="img-fluid rounded-3"
                                            width="42px"
                                            height="42px"
                                            src="../../public/media/favicon/wikirooticon.png"
                                            alt="icon of wikiroot">
                                        <h3 class="card-title mb-0 text-center text-white titleHero"><i class="fa fa-archive" aria-hidden="true"></i> WikiRoot</h3>
                                    </div>
                                    <hr>
                                    <p class="card-text about__us"> <b>WikiRoot</b> es una plataforma <i>colaborativa</i> de código abierto inspirada en <b>Wikipedia</b>
                                        y los principios de <b>Tim Berners-Lee</b> sobre el acceso libre al conocimiento. Mi misión es crear un espacio donde los usuarios puedan compartir y editar artículos sobre diversos temas, fomentando así la difusión del conocimiento de manera colectiva.
                                        Al igual que las raíces de un árbol que se entrelazan para formar una red robusta,
                                        <b>WikiRoot</b> conecta personas y saberes para crear una base de conocimiento en constante crecimiento.
                                    </p>
                                </div>
                                <div class="card-text d-flex flex-wrap justify-content-between">
                                    <p>
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        <b>Autor</b>: Naim Babanaceur García de Lara.
                                    </p>
                                    <div class="dropdown dropup open">
                                        <button
                                            class="btn btn-secondary dropdown-toggle"
                                            type="button"
                                            id="authorDrop"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">

                                            Ver Mas
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="authorDrop">
                                            <button class="dropdown-item">
                                                <a target="_blank" class="link-dark d-flex gap-2 align-items-center" href="https://www.github.com/nbglroot/">
                                                    <i class="fa-brands fa-github"></i>GitHub
                                                </a>
                                            </button>

                                            <button class="dropdown-item">
                                                <a target="_blank" class="link-dark d-flex gap-2 align-items-center" href="https://www.linkedin.com/in/naimbgdl/">
                                                    <i class="fa fa-linkedin" aria-hidden="true"></i> Linked-In
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        <?php
        }
        if (isset($_GET['createNewArticle'])) { ?>
            <main class="container mt-5 mb-5">
                <form action="../../src\php\controller\articlesController.php" enctype="multipart/form-data" method="POST" class="creationOfArticles form-check">
                    <div class="row align-items-center">
                        <div class="col-md-4 p-3">
                            <div class="input-group-text">
                                <label class="p-2 bg-light rounded-2" for="newArticleTitle">Titulo: </label>
                                <input class="form-control" required type="text" name="newArticleTitle" id="newArticleTitle" placeholder="titulo de articulo...">
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-12 p-3">
                            <label class="p-2 bg-light rounded-2 mb-1" for="newArticleSummary">Resumen: </label>
                            <textarea style="resize: none;" class="form-control" required rows="5" name="newArticleSummary" id="newArticleSummary" placeholder="resumen del articulo..."></textarea>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-8 p-3">
                            <label class="p-2 bg-light rounded-2 mb-1" for="newArticleInfo">Información de Articulo: </label>
                            <textarea style="resize: none;" class="form-control" required rows="20" name="newArticleInfo" id="newArticleInfo" placeholder="Toda información del articulo..."></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="bg-light p-2 rounded-2 mb-1" for="newArticleThumbnail">Imagen de Portada: </label>
                            <input class="form-control" required accept="image/png, image/jpeg" type="file" name="newArticleThumbnail" id="newArticleThumbnail">
                        </div>
                    </div>
                    <div class="row mt-3 justify-content-center">
                        <div class="col-md-12">
                            <h1 class="bg-light p-2 text-center"> <i class="fa fa-image" aria-hidden="true"></i> Galeria de Imagenes</h1>
                        </div>
                        <div class="col-md-4 mt-5">
                            <label class="bg-light p-2 rounded-2 mb-1" for="newArticleImagesGallery">Imagenes para la galeria: </label>
                            <input class="form-control" multiple="multiple" required accept="image/png, image/jpeg" type="file" name="newArticleImagesGallery[]" id="newArticleImagesGallery">
                        </div>
                    </div>

                    <div class="text-end m-3">
                        <button
                            name="createNewArticle"
                            type="submit"
                            class="btn btn-primary">
                            Crear Articulo
                            <i class="fa fa-edit" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </main>
        <?php
        }
        if (isset($_GET['post'])) {
            $title = $_GET['post'];
            $query = $conn->prepare("SELECT * FROM articles WHERE article_title = ?");
            $query->bind_param("s", $title);
            $query->execute();
            $result = $query->get_result();
            $articleInfo = mysqli_fetch_assoc($result);
            $queryG = $conn->prepare("SELECT * FROM img_gallery WHERE belongs_to = ?");
            $queryG->bind_param("s", $title);
            $queryG->execute();
            $gallery = $queryG->get_result();
        ?>
            <main class="container mt-5 mb-5">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <h1 class="bg-light p-3 rounded-3 text-center mb-4"><?php echo $articleInfo['article_title']; ?></h1>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <p class="bg-light p-3 rounded-3"><?php echo $articleInfo['article_summary']; ?></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p class="bg-light p-3 rounded-3 h-100"><?php echo $articleInfo['article_desc']; ?></p>
                    </div>
                    <div class="col-md-4">
                        <img class="img-fluid" src="../../public/media/articles_thumbnails/<?php echo $articleInfo['article_thumbnail']; ?>" alt="Portada de <?php echo $articleInfo['article_title']; ?> ">
                        <p class="bg-light m-1 text-center w-auto p-1"><?php echo $articleInfo['article_thumbnailSize']; ?> bytes</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <h2 class="bg-light p-2 m-3 text-center">Galeria de Imagenes</h2>
                        </div>
                    </div>
                    <div class="row mt-4 justify-content-center">
                        <div class="col-md-12 align-items-center justify-content-evenly d-flex flex-row gap-5 flex-wrap">
                            <?php
                            while ($imgs = mysqli_fetch_assoc($gallery)) { ?>
                                <img width="300px" style="object-fit: contain;" height="auto" class="img-fluid p-2 bg-light shadow" src="../../public/media/articles_gallery/<?php echo $imgs['img'] ?>" alt="<?php echo $imgs['img'] ?>">
                            <?php
                            } ?>

                        </div>
                    </div>
                </div>

            </main>
        <?php
        }
        ?>
    </div>

    <!-- Page scripts + Jquery -->
    <script src=" https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>

    <script src="../../assets/js/main.js"></script>

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