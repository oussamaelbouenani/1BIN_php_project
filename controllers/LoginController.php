<?php
class LoginController{

    private $_db;

    public function __construct($db) {
        $this->_db = $db;
    }

    public function run(){
        # Si un distrait écrit ?action=login en étant déjà authentifié
        if (!empty($_SESSION['authentifie'])) {
            header("Location: index.php?action=accueil"); # redirection HTTP vers l'action login
            die();
        }

        # Variables HTML dans la vue

        # L'utilisateur s'est-il bien authentifié ?
        if (empty($_POST)) {
            if (!empty($_GET['newQuestion'])){
                $notification = 'Authentifiez-vous pour poser une question !';
                $alert = 'alert alert-danger';
            }elseif(!empty($_GET['suspend'])){
                if ($_GET['suspend']==-1){
                    $notification = '<h4 class="alert-heading">Attention!</h4>
                    <p>Votre compte à été suspendu.</p>
                    <hr>
                    <p class="mb-0">Pour plus de renseignements veuillez contacter un <a href="mailto:<?php echo EMAIL ?>" class="link">admin</a> .</p>';
                    $alert = 'alert alert-danger';
                }
                
            }
            else {
                # L'utilisateur doit remplir le formulaire
                $notification = 'Authentifiez-vous';
                $alert = 'alert alert-info';
            }
        } else {

            $check = $this->_db->authentify_user($_POST['login'], $_POST['password']);
            # L'authentification n'est pas correcte
            if (!$check){
                $notification='Vos données d\'authentification ne sont pas correctes.';
                $alert = 'alert alert-danger';
            }
            else {
                # L'utilisateur est bien authentifié
                # Une variable de session $_SESSION['authenticated'] est créée

                $utilisateur = $this->_db->select_user($_POST['login']);
                
                /*S'il est suspendu il ne peut pas se connecter*/
                if($utilisateur->html_disabled()==1){
                    header("Location: index.php?action=login&suspend=-1");
                    die();
                }
                
                $_SESSION['utilisateur_id']=$utilisateur->html_user_id();
                $pseudo = $utilisateur->html_pseudo();
                if ($utilisateur->html_admin() == 1){
                    $_SESSION['authentifie'] = 'admin';
                }else{
                    $_SESSION['authentifie'] = 'membre';
                }
                $_SESSION['pseudo'] = $pseudo;
                # Redirection HTTP pour demander la page d'accueil
                header("Location: index.php?action=accueil&login=1");
                die();
            }
        }

        # Ecrire ici la vue
        require_once(CHEMIN_VUES . 'login.php');
    }

}
?>