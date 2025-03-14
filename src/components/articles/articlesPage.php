<?php
session_start();
ob_start();
if (isset($_GET['searchBar'])) {
    $searchedPost = 'articlesPage.php?post=' . $_GET['searchBar'];
    header("Location: $searchedPost");
    exit();
}

require 'header.php';
require '../../php/controller/articlesController.php';
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
        if (isset($_GET['showAllArticles'])) {
            require '../pages/showAllArticles.php';
        }
        if (isset($_GET['createNewArticle']) && isset($_SESSION['user_logged_in'])) {
            require '../pages/createNewArticle.php';
        }
        if (isset($_GET['post'])) {
            $title = $_GET['post'];
            $query = $conn->prepare("SELECT * FROM articles WHERE article_title = ?");
            $query->bind_param("s", $title);
            $query->execute();
            $result = $query->get_result();
            $articleInfo = mysqli_fetch_assoc($result);
            if (!$articleInfo) {
                header('Location: articlesPage.php?notfound');
                exit(); // Add exit to prevent further execution
            }
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
                <?php
                if (isset($_SESSION['user_logged_in'])) { ?>
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <a class="text-center btn btn-primary" href="articlesPage.php?editArticle=<?php echo $articleInfo['id'] ?>">Editar Articulo</a>
                        </div>
                    </div>
                <?php
                } ?>

                <div class="row <?php if (isset($_SESSION['user_logged_in'])) {
                                    echo 'mt-4';
                                } ?> justify-content-center">
                    <div class="col-md-10">
                        <p class="bg-light p-3 rounded-3"><?php echo $articleInfo['article_summary']; ?></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p class="bg-light p-3 rounded-3 h-100"><?php echo $articleInfo['article_desc']; ?></p>
                    </div>
                    <div class="col-md-4 mt-3 text-center">
                        <img class="img-fluid" src="../../../public/media/articles_thumbnails/<?php echo $articleInfo['article_thumbnail']; ?>" alt="Portada de <?php echo $articleInfo['article_title']; ?> ">
                        <p class="bg-light m-1 text-center w-auto p-1"><?php echo $articleInfo['article_thumbnailSize']; ?> bytes</p>
                    </div>
                </div>
                <div class="row mt-4 justify-content-center">
                    <div class="col-md-8">
                        <h2 class="bg-light p-2 m-3 text-center">Galeria de Imagenes</h2>
                    </div>
                </div>
                <div class="row mt-4 justify-content-center">
                    <div class="col-md-12 align-items-center justify-content-evenly d-flex flex-row gap-5 flex-wrap">
                        <div id="carousel_gallery" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php
                                $slide = 0;
                                $gallery->data_seek(0);
                                while ($row = mysqli_fetch_assoc($gallery)) {
                                ?>
                                    <li
                                        class="<?php echo ($slide == 0) ? 'active' : ''; ?>"
                                        data-bs-target="#carousel_gallery"
                                        data-bs-slide-to="<?php echo $slide; ?>"
                                        aria-label="Slide<?php echo $slide ?>"></li>
                                <?php
                                    $slide++;
                                } ?>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                <?php
                                $slideImg = 0;
                                $gallery->data_seek(0);
                                while ($imgs = mysqli_fetch_assoc($gallery)) { ?>
                                    <div class="carousel-item <?php echo ($slideImg === 0) ? 'active' : ''; ?> ?> ">
                                        <img class="img-fluid" src="../../../public/media/articles_gallery/<?php echo $imgs['img'] ?>" alt="<?php echo $slideImg; ?>">
                                    </div>
                                <?php
                                    $slideImg++;
                                } ?>
                                <button
                                    class="carousel-control-prev"
                                    type="button"
                                    data-bs-target="#carousel_gallery"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button
                                    class="carousel-control-next"
                                    type="button"
                                    data-bs-target="#carousel_gallery"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        <?php
        }
        if (isset($_GET['notfound'])) {
            require '../pages/articleNotFound.php';
        }
        if (isset($_GET['editArticle'])) {
            require '../pages/editArticle.php';
        } ?>

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