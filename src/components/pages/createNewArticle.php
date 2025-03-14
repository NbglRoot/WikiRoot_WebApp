<main class="container mt-5 mb-5">
    <form action="../../php/controller/articlesController.php" enctype="multipart/form-data" method="POST" class="creationOfArticles form-check">
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