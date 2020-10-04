<section class="container">
    <h2 class="titre">Bienvenue sur le forum ClassNotFound</h2>
    <div class="form-group">
        <form action="index.php?action=accueil" method="post">
            <p>Rechercher : <input type="text" name="keyword" value="<?php echo $html_motcle ?>"/>
                <button type="submit" class="btn btn-secondary" name="formQuestion"><span class="glyphicon glyphicon-search"></span> Rechercher</button></p>
           <select class="form-control" name="category">
                <option value="0">Categorie</option>
                <?php
                foreach ($tabCategories as $i => $value){?>
                    <option value="<?php echo ($i+1) ?>"><?php echo $tabCategories[$i]->html_name()?></option>
                <?php } ?>
            </select>
        </form>
    </div>
    <div id="notification" class="<?php echo $alert?>"><?php echo $notification; ?></div>

    <form action="?action=question" method="post">
        <div class="table-responsive">
            <table class="table table-dark rounded-right">
                <caption>Liste des questions</caption>
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Sujet</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Date Création</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($tabquestions); $i++) { ?>
                    <tr
                        <?php
                        if($tabquestions[$i]->html_status()==1){
                        ?>class="table-success"<?php ;
                        } elseif ($tabquestions[$i]->html_duplicated()==1){
                        ?>class="table-info"<?php ;
                        }elseif ($tabquestions[$i]->html_status()==0){
                        ?>class="table-danger unsolved"<?php ;
                    }
                    ?>
                    >
                        <th scope="row"><?php echo /*$tabquestions[$i]->html_question_id()*/ $i + 1; ?></th>
                        <td><?php echo $tabCategories2[$i]->html_name(); ?></td>
                        <td><?php echo $tabquestions[$i]->html_title() ?></td>
                        <td><?php if($tabquestions[$i]->html_status()==1){echo 'Résolu';} else if($tabquestions[$i]->html_duplicated()==1){echo 'Doublon';} else{echo 'Ouvert';} ?></td>
                        <td><?php echo $tabUsers[$i]->html_pseudo() ?></td>
                        <td><?php echo $tabquestions[$i]->html_creation_date() ?></td>
                        <td><button class="btn btn-light" name="showQuestion[<?php echo $tabquestions[$i]->html_question_id() ?>]"><span class="glyphicon glyphicon-search"></span> Voir la question</button>
                        <?php if ($echoadmin){
                            echo '<td><button class="btn btn-danger" type="submit" name="deleteQuestion['.$tabquestions[$i]->html_question_id().']"><span class="glyphicon glyphicon-remove"></span> Supprimer la quesiton</button>';
                        } ?>
                        <input type="hidden" name="noCategory" value="<?php echo $tabquestions[$i]->html_category() ?>"></td>
                    </tr>

                    </a>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
</section>