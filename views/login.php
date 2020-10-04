<section class="container">
    <h2>Login</h2>
    <p>Bienvenue sur la page de login.</p>
    <div class="<?php echo $alert?>"><?php echo $notification; ?></div>
    <div class="d-inline bg bg-dark">
        <form action="?action=login" class="form-signin" method="post">
            
                <label for="login" class=sr-only>Identifiant</label>
                <input type="text" class="form-control" name="login" aria-describedby="loginHelp" placeholder="Enter pseudo ou email">
                <small id="loginHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                <label for="password" class="sr-only">Mot de passe</label>
                <input type="password" class="form-control" name="password" placeholder="Mot de passe">

            <button type="submit" class="btn btn-primary btn-block mt-4">Se connecter</button>
        </form>
    </div>
</section>