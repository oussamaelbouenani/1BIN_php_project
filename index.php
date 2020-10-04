<?php
# Activer le mécanisme des sessions
session_start();

# Prise du temps actuel au début du script
$time_start = microtime(true);

# Définition des variables globales du script
define('CHEMIN_MODELS','models/');
define('CHEMIN_VUES','views/');
define('CHEMIN_CONTROLEURS','controllers/');
define('EMAIL','oussama.elbouenani@student.vinci.be');
define('EMAIL2','bruno.loverius@student.vinci.be');
define('DATEDUJOUR',date("j/m/Y"));
define('SESSION_ID',session_id());

# Automatisation de l'inclusion des classes de la couche modèle
function chargerClasse($classe) {
    require_once('models/' . $classe . '.class.php');
}
spl_autoload_register('chargerClasse');

# Connexion à la db;
require_once(CHEMIN_MODELS . 'Db.php');
$db=Db::getInstance();

# Pour le header : admin, membre ou login selon que la variable de session 'authentifie' existe ou pas
$navadmin = '
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=accueil"><span class="glyphicon glyphicon-home"></span> Accueil</a>
</li>
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=newQuestion"><span class="glyphicon glyphicon-pencil"></span> Poser une question</a>
</li>
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=profil"><span class="glyphicon glyphicon-user"></span> Mon Profil</a>
</li>
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=admin"><span class="glyphicon glyphicon-list"></span> Les Membres</a>
</li>
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=logout"><span class="glyphicon glyphicon-log-in"></span> Se Déconnecter</a>
</li>
';
$navmembre = '
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=accueil"><span class="glyphicon glyphicon-home"></span> Accueil</a>
</li>
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=newQuestion"><span class="glyphicon glyphicon-pencil"></span> Poser une question</a>
</li>
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=profil"><span class="glyphicon glyphicon-user"></span> Mon Profil</a>
</li>
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=logout"><span class="<?php echo $classnavregister?>"></span> Se Déconnecter</a>
</li>
';
$navanonymous = '
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=accueil"><span class="glyphicon glyphicon-home"></span> Accueil</a>
</li>
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=newQuestion"><span class="glyphicon glyphicon-pencil"></span> Poser une question</a>
</li>
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=login"><span class="glyphicon glyphicon-user"></span> Se connecter</a>
</li>
<li class="nav-item p-2">
    <a class="nav-link" href="index.php?action=signin"><span class="glyphicon glyphicon-floppy-disk"></span> S\'enregistrer</a>
</li>
';

# Ecriture du header de toutes pages HTML
require_once(CHEMIN_VUES . 'header.php');

# S'il n'y a pas de variable GET 'action' dans l'URL, elle est créée ici à la valeur 'accueil'
if (empty($_GET['action'])) {
    $_GET['action'] = 'accueil';
}
# Switch case sur l'action demandée par la variable GET 'action' précisée dans l'URL
# index.php?action=...
switch ($_GET['action']) {
    case 'admin': # action=admin
        require_once(CHEMIN_CONTROLEURS . 'AdminController.php');
        $controller = new AdminController($db);
        break;
    case 'login':
        require_once(CHEMIN_CONTROLEURS . 'LoginController.php');
        $controller = new LoginController($db);
        break;
    case 'profil':
        require_once(CHEMIN_CONTROLEURS . 'ProfilController.php');
        $controller = new ProfilController($db);
        break;
    case 'logout':
        require_once(CHEMIN_CONTROLEURS . 'LogoutController.php');
        $controller = new LogoutController();
        break;
    case 'question': # action=contact
        require_once(CHEMIN_CONTROLEURS . 'QuestionController.php');
        $controller = new QuestionController($db);
        break;
    case 'signin':
        require_once(CHEMIN_CONTROLEURS.'SigninController.php');
        $controller = new SigninController($db);
        break;
    case 'newQuestion':
        require_once(CHEMIN_CONTROLEURS . 'NewQuestionController.php');
        $controller = new NewQuestionController($db);
        break;
    default: # Par défaut, le contrôleur de l'accueil est sélectionné
        require_once(CHEMIN_CONTROLEURS . 'AccueilController.php');
        $controller = new AccueilController($db);
        break;
}
# Exécution du contrôleur défini dans le switch précédent
$controller->run();
$time_end = microtime(true);
$time = round(($time_end - $time_start)*1000,3);

# Ecrire ici le footer de toutes pages HTML
require_once(CHEMIN_VUES . 'footer.php');
