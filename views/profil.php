<section class="container">
    <h2>Mon profil (<?php echo $_SESSION['pseudo']?>)</h2>
        <table class="table table-dark rounded">
            <thead>
            <th class="text-center" style="text-align: center; background-color: #0c5460">Mes données</th>
            </thead>
            <tbody>
            <tr>
                <form action="?action=profil" method="post">
                    <td>Pseudo</td>
                    <td><?php echo $utilisateur->html_pseudo() ?></td>
                    <td><input class="text-dark" type="text" name="pseudo_update" placeholder="Pseudo"></td>
                    <td><input class="btn btn-light" type="submit" name="form_update" value="modifier">
                </form>
            </tr>
            <tr>
                <form action="?action=profil" method="post">
                    <td>Prénom</td>
                    <td><?php echo $utilisateur->html_first_name() ?></td>
                    <td><input class="text-dark" type="text" name="first_name_update" placeholder="Prénom"></td>
                    <td><input class="btn btn-light" type="submit" name="form_update" value="modifier2"></td>
                </form>
            </tr>
            <tr>
                <form action="?action=profil" method="post">
                    <td>Nom</td>
                    <td><?php echo $utilisateur->html_last_name() ?></td>
                    <td><input class="text-dark" type="text" name="name_update" placeholder="Nom"></td>
                    <td><input class="btn btn-light" type="submit" name="form_update" value="modifier3"></td>
                </form>
            </tr>
            <tr>
                <form action="?action=profil" method="post">
                    <td>Email</td>
                    <td><?php echo $utilisateur->html_email() ?></td>
                    <td><input class="text-dark" type="text" name="email_update" placeholder="Adresse mail"></td>
                    <td><input class="btn btn-light" type="submit" name="form_update" value="modifier4"></td>
                </form>
            </tr>
            <tr>
                <form action="?action=profil" method="post">
                    <td>Mot de passe</td>
                    <td>*****</td>
                    <td><input class="text-dark" type="password" name="password_update" placeholder="Mot de passe"></td>
                    <td><input class="btn btn-light" type="submit" name="form_update" value="modifier5"></td>
                </form>
            </tr>
            </tbody>
        </table>

    <form action="?action=question" method="post">
        <table class="table table-dark rounded">
            <thead>
            <th class="text-center" style="text-align: center; background-color: #0c5460">Mes questions</th>
            <tr>
                <th>Categorie</th>
                <th>Sujet</th>
                <th>Statut</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($tabquestions as $i=>$value){ ?>
                <tr>
                    <td><?php echo $tabcategories[$i]->html_name(); ?></td>
                    <td><?php echo $tabquestions[$i]->html_title() ?></td>
                    <td><?php if ($tabquestions[$i]->html_status() == 1) echo 'Resolu'; else echo 'Ouvert';?></td>
                    <form action="index.php?action=question" method="post">
                        <td><button class="btn btn-light" type="submit" name="showQuestion[<?php echo $tabquestions[$i]->html_question_id() ?>]"><span class="glyphicon glyphicon-search"></span> Voir la question</button></td>
                        <td><?php if ($tabquestions[$i]->html_status() == 1) echo '<button class="btn btn-outline-info" type="submit" name="MauvaiseReponseProfil"><span class="glyphicon glyphicon-eye-open"></span> Remettre ouvert</button>' ;?></td>
                        <input type="hidden" name="noQuestion" value="<?php echo $tabquestions[$i]->html_question_id()?>">
                        <input type="hidden" name="showQuestion[<?php echo $tabquestions[$i]->html_question_id() ?>]">
                    </form>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </form>
</section>