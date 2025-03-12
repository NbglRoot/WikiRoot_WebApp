<?php
require 'db_conn.php';

if (isset($_POST['createNewArticle'])) {
    function checkIfExists($conn)
    {
        $exists = $_POST['newArticleTitle'];
        $query = $conn->prepare("SELECT * FROM articles WHERE article_title = ?");
        $query->bind_param("s", $exists);
        $query->execute();
        $result = $query->get_result();
        if (mysqli_fetch_assoc($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    if (!checkIfExists($conn)) {
        $imgFolderTargetThumbnail = "../../../public/media/articles_thumbnails/";
        $targetFile = $imgFolderTargetThumbnail . basename($_FILES['newArticleThumbnail']['name']);
        $title = $_POST['newArticleTitle'];
        $summary = $_POST['newArticleSummary'];
        $desc = $_POST['newArticleInfo'];
        $thumbnailSize = $_FILES['newArticleThumbnail']['size'];
        $thumbnailName = $_FILES['newArticleThumbnail']['name'];

        // query insert ddbb
        $query = $conn->prepare("INSERT INTO articles (article_title, article_summary, article_desc, article_thumbnail, article_thumbnailSize) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("ssssi", $title, $summary, $desc, $thumbnailName, $thumbnailSize);
        try {
            $query->execute();
        } catch (\Throwable $th) {
            header("Location: ../../../components/articles/articlesPage.php?showAllArticles&error=aleadyExists");
        } finally {
            header("Location: ../../../components/articles/articlesPage.php?showAllArticles");
        }

        // upload image to folder
        move_uploaded_file($_FILES['newArticleThumbnail']['tmp_name'], $targetFile);

        foreach ($_FILES['newArticleImagesGallery']['name'] as $file) {
            // query insert ddbb
            $query = $conn->prepare("INSERT INTO img_gallery (belongs_to, img) VALUES (?, ?)");
            $query->bind_param("ss", $title, $file);
            $query->execute();
        }


        function reArrayFiles(&$file_post)
        {

            $file_ary = array();
            $file_count = count($file_post['name']);
            $file_keys = array_keys($file_post);

            for ($i = 0; $i < $file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $file_post[$key][$i];
                }
            }

            return $file_ary;
        }

        $imgFolderTargetGallery = "../../../public/media/articles_gallery/";
        $img_desc = reArrayFiles($_FILES['newArticleImagesGallery']);
        foreach ($img_desc as $file) {
            // upload image to folder
            move_uploaded_file($file['tmp_name'], $imgFolderTargetGallery . $file['name']);
        }

        $query->close();
    } else {
        header("Location: ../../../components/articles/articlesPage.php?showAllArticles&error=aleadyExists");
    }
}

if (isset($_POST['editExisitingArticle'])) {
    $query = $conn->prepare("UPDATE articles SET article_title=?, article_summary=?, article_desc=? WHERE id=?");
    $query->bind_param("sssi", $_POST['editArticleTitle'], $_POST['editArticleSummary'], $_POST['editArticleInfo'], $_GET['articleId']);
    $query->execute();

    header("Location: ../../../components/articles/articlesPage.php?post=" . $_POST['editArticleTitle']);
}


if (isset($_GET['showAllArticles'])) {
    $query = $conn->prepare("SELECT * FROM articles");
    $query->execute();
    $result = $query->get_result();
}
