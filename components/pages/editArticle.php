<?php

require '../../src/php/db_conn.php';

if (isset($_GET['editArticle'])) {
    $article_id = $_GET['editArticle'];
    $query = $conn->prepare("SELECT * FROM articles WHERE id = ?");
    $query->bind_param("i", $article_id);
    $query->execute();
    $result = $query->get_result();
    $info = mysqli_fetch_assoc($result);

?>
    <main class="container mt-5 mb-5">
        <form action="../../src/php/controller/articlesController.php?articleId=<?php echo $article_id; ?>" enctype="multipart/form-data" method="POST" class="creationOfArticles form-check">
            <div class="row align-items-center">
                <div class="col-md-4 p-3">
                    <div class="input-group-text">
                        <input class="form-control d-none" value="<?php echo $info['article_title']; ?>" required disabled type="text" name="currentTitle" id="currentTitle" placeholder="titulo de articulo...">
                        <label class="p-2 bg-light rounded-2" for="editArticleTitle">Titulo: </label>
                        <input class="form-control" value="<?php echo $info['article_title']; ?>" required type="text" name="editArticleTitle" id="editArticleTitle" placeholder="titulo de articulo...">
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12 p-3">
                    <label class="p-2 bg-light rounded-2 mb-1" for="editArticleSummary">Resumen: </label>
                    <textarea style="resize: none;" class="form-control" required rows="5" name="editArticleSummary" id="editArticleSummary" placeholder="resumen del articulo..."><?php echo $info['article_summary']; ?>
                    </textarea>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-9 p-3">
                    <label class="p-2 bg-light rounded-2 mb-1" for="editArticleInfo">Información de Articulo: </label>
                    <textarea style="resize: none;" class="form-control" required rows="20" name="editArticleInfo" id="editArticleInfo" placeholder="Toda información del articulo..."><?php echo $info['article_desc']; ?>
                    </textarea>
                </div>
                <div class="col-md-3">
                    <label class="bg-light p-2 rounded-2 mb-1">Imagen de Portada (No se puede Editar): </label>
                </div>
            </div>
            <div class="row mt-3 justify-content-center">
                <div class="col-md-12">
                    <h1 class="bg-light p-2 text-center"> <i class="fa fa-image" aria-hidden="true"></i> </h1>
                </div>
                <div class="col-md-5 mt-5">
                    <label class="bg-light p-2 rounded-2 mb-1">Imagenes para la galeria (No se puede editar) </label>
                </div>
            </div>

            <div class="text-end m-3">
                <button
                    name="editExisitingArticle"
                    type="submit"
                    class="btn btn-primary">
                    Editar Articulo
                    <i class="fa fa-edit" aria-hidden="true"></i>
                </button>
            </div>
        </form>
    </main>
<?php

}
