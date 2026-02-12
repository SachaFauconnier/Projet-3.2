<?php 
    /** 
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun. 
     * Et un formulaire pour ajouter un article. 
     */
?>
<link rel="stylesheet" href="/PHP-blog-emilie-forteroche-main/public/css/style.css">
<h2>Edition des articles</h2>

<div class="adminArticle">
    <div class="filtres">
        <div><a href="index.php?action=admin&sort=title&order=<?= $nextOrder ?>">Titre</a></div>
        <div><a href="index.php?action=admin&sort=date&order=<?= $nextOrder ?>">Date</a></div>
        <div><a href="index.php?action=admin&sort=views&order=<?= $nextOrder ?>">Vues</a></div>
        <div><a href="index.php?action=admin&sort=comments&order=<?= $nextOrder ?>">Commentaires</a></div>
    </div>
        <?php foreach ($articles as $article) { ?>
            <div class="articleLine">
                <div class="title"><?= $article->getTitle() ?></div>
                <div class ="date">Date de publication <?= $article->getDateCreation()->format('d/m/Y') ?></div>
                <div class="content"><?= $article->getContent(200) ?></div>
                <div class ="vue">Nombre de vues : <?= $article->getViews() ?></div>
                <div class ="Nbcommentaire" >Nombre de commentaires :<?= $nbComments[$article->getId()] ?? 0 ?></div>
                <div><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a></div>
                <div><a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?> >Supprimer</a></div>
            </div>
        <?php } ?>
</div>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>