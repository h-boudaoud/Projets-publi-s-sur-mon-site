<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <title> CV Housni BOUDAOUD </title>
    <link rel="shortcut icon" href="http://www.cv-boudaoud.biz.ht/img/cv-hboudaoud.jpg" type="image/x-icon"/>
    <meta name="author" lang="fr" content="Housni BOUDAOUD">
    <meta name="robots" content="Housni, BOUDAOUD, hboudaoud, cv-boudaoud, cv-hboudaoud"/>


    <!-- CSS pour tout type d'écrans == plutôt adapté aux smartphones ==  -->
    <link rel="stylesheet" type="text/css" media="all" href="http://www.cv-boudaoud.biz.ht/css/index1.css">
    <link rel="stylesheet" type="text/css" media="all" href="http://www.cv-boudaoud.biz.ht/css/font.css">
    <style>
        code {
            color: #ffffff;
            background-color: rgb(60, 13, 72);
            padding: 0.5vw 2vw;
        }
    </style>
</head>
<body>
<div class="cv page">
    <header>
        <h1>Titre du projet</h1>
    </header>

    <section class="corps" style="min-height:70%;">
        <!- Contenu du projet ou de son index-->
        <p>
            Contenue du projet "Projets-publiés-sur-mon-site" à renseigner ici
        <ul>
            <li> un déscriptif du projet</li>
            <li> des liens vers les documents</li>
            <li> ou le code source de l'index</li>
        </ul>


        </p>
    </section>

    <footer>
        <div class="Compteur">
            <?php
            // dossier courant
            $foldersArry = explode('_', getcwd());
            array_shift($foldersArry);
            $page = implode("_", $foldersArry);
            /****************************************************/
            /*                                                  */
            /*                    Compteur                      */
            /*                                                  */
            /****************************************************/
            include('../code-source/php/compteur/index.php');
            ?>
        </div>
    </footer>
</div>
</body>


