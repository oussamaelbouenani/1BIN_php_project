<section class="container">
    <h2>Zone d'Administration</h2>
    <p>Bienvenue <?php echo $html_pseudo; ?></p>
    <div id="notification" class="<?php echo $alert?>"><?php echo $notification; ?></div>
    <form action="?action=admin" method="post">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                <th class="text-center" style="text-align: center; background-color: #0c5460">Les Membres</th>
                <tr>
                    <th scope="col">Pseudo</th>
                    <th scope="col">Email</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Rôle</th>
                    <th scope="col">Statut</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($tabusers); $i++) { ?>
                <tr>
                    <td><span class="html"><?php echo $tabusers[$i]->html_pseudo() ?></span></td>
                    <td><?php echo $tabusers[$i]->html_email() ?></td>
                    <td><?php echo $tabusers[$i]->html_last_name() ?></td>
                    <td><?php echo $tabusers[$i]->html_first_name() ?></td>
                    <td><input type="submit" class="<?php
                        if ($tabusers[$i]->html_admin() == 1)echo "btn btn-warning";
                        else echo "btn btn-info"; ?>" name="admin[<?php echo $tabusers[$i]->html_user_id() ?>]" value="<?php
                        if ($tabusers[$i]->html_admin() == 1)echo "Admin";
                        else echo "Membre"; ?>">
                    </td>
                    <td><input type="submit" class="<?php
                        if ($tabusers[$i]->html_disabled() == 1)echo "btn btn-light";
                        else echo "btn btn-info"; ?>" name="disabled[<?php echo $tabusers[$i]->html_user_id() ?>]" value="<?php
                        if ($tabusers[$i]->html_disabled() == 1)echo "Désactivé";
                        else echo "Actif"; ?>">
                    </td>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
</section>
