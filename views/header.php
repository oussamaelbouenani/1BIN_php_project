<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>ClassNotFound</title>
    <link rel="stylesheet" href="<?php echo CHEMIN_VUES ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo CHEMIN_VUES ?>css/style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<header class="container-fluid header">
    <div><!--
        <h1>
            <br>
            <div>ClassNotFound : Le Forum de l'informatique</div>
            <small class="text-muted padding">Trouvez toutes vos réponses dans les méandres de ce site..</small>
            <br>
        </h1>-->
        <img src="views/images/banniere.png" class="img-fluid" alt="Responsive image">
        <nav class="navbar navbar-expand-lg navbar-dark  bg-dark rounded-bottom">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav col-8">
                <?php
                if(empty($_SESSION['authentifie']))
                    echo $navanonymous;
                else{
                    if ($_SESSION['authentifie']=='admin')
                        echo $navadmin;
                    else
                        echo $navmembre;
                }
                ?>
                </ul>
            </div>
        </nav>
    </div>
</header>