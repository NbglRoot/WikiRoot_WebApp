<main class="container mt-5 mb-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card bg-dark border text-white text-start">
                <h4 class="card-title mt-3 text-center">Articulos <br> Recientes </h4>
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
                <div class="card-body overflow-scroll text-white justify-content-between d-flex flex-column">
                    <div class="main__content">
                        <div class="catd__title__image d-flex justify-content-center gap-5 align-items-center">
                            <img
                                class="img-fluid rounded-3"
                                width="42px"
                                height="42px"
                                src="../../../public/media/favicon/wikirooticon.png"
                                alt="icon of wikiroot">
                            <h3 class="card-title mb-0 text-center text-white titleHero"><i class="fa fa-archive" aria-hidden="true"></i> WikiRoot</h3>
                        </div>
                        <hr>
                        <p class="card-text about__us"> <b>WikiRoot</b> es una plataforma <i>colaborativa</i> de código abierto inspirada en <b>Wikipedia</b>
                            y los principios de <b>Tim Berners-Lee</b> sobre el acceso libre al conocimiento. Mi misión es crear un espacio donde los usuarios puedan compartir y editar artículos sobre diversos temas, fomentando así la difusión del conocimiento de manera colectiva.
                            Al igual que las raíces de un árbol que se entrelazan para formar una red robusta,
                            <b>WikiRoot</b> conecta personas y saberes para crear una base de conocimiento en constante crecimiento.
                            <br>
                            <br>
                            <br>
                            La esencia de WikiRoot radica en su naturaleza colaborativa, donde el conocimiento se construye de manera conjunta y en constante evolución. Los usuarios pueden generar nuevos artículos sobre diversos temas y, al mismo tiempo, otros miembros de la comunidad pueden editarlos para añadir detalles
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