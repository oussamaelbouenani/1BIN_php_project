<section class="container" xmlns="http://www.w3.org/1999/html">
    <h2>Register</h2>
    <p>Bienvenue sur la page d'inscription.</p>
    <div id="notification" class="<?php echo $alert?>"><?php echo $notification; ?></div>
    <form method="post" action="?action=signin">
        <fieldset>
            <legend>Vos données du compte :</legend> <!-- Titre du fieldset -->
            <div class="form-group">
                <label for="pseudo">Quel est votre pseudo ?</label>
                <input type="text" class="form-control" name="pseudo" placeholder="Dark666">
            </div>
            <div class="form-group">
                <label for="email">Quel est votre adresse email ?</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="password1">Choisissez un mot de passe</label>
                <input type="password" class="form-control" name="password1" placeholder="Choisisez un mot de passe complexe">
            </div>
            <div class="form-group">
                <label for="">Confirmez votre mot de passe ?</label>
                <input type="password" class="form-control" name="password2" placeholder="Entrez a nouveau votre mot de passe">
            </div>
        </fieldset>
        <fieldset>
            <legend>Vos coordonnées :</legend> <!-- Titre du fieldset -->
            <div class="form-group">
                <label for="lastName">Quel est votre nom ?</label>
                <input type="text" class="form-control" name="last_name" placeholder="Votre nom de famille">
            </div>
            <div class="form-group">
                <label for="firstName">Quel est votre prénom ?</label>
                <input type="text" class="form-control" name="first_name" placeholder="votre prénom">
            </div>
        </fieldset>
        <input type="submit" name="form_signin" class="btn btn-primary" value="S'inscrire">
    </form>
</section>