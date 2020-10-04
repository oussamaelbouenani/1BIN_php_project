<?php


class accueilController
{
    private $_db;
    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function run(){

        # Notification qui sera affichée dans la vue
        if (!empty($_GET['logout'])){
            $notification = 'Vous vous êtes bien déconnecté !';
            $alert = 'alert alert-success';
        }elseif (!empty($_GET['login'])) {    
            $notification = 'Vous vous êtes bien connecté !';
            $alert = 'alert alert-success';
        }elseif (!empty($_GET['submitQuestion'])) {
            $notification = 'Votre question a bien été postée !';
            $alert = 'alert alert-success';
        }elseif (!empty($_GET['delete'])) {
            $notification = 'La question a bien été supprimée !';
            $alert = 'alert alert-success';
        }
        else{
            $notification='';
            $alert = 'alert';
        }
        # Mot clé de recherche
        $html_motcle='';

        if (!empty($_SESSION['authentifie']) && $_SESSION['authentifie']=='admin')
            $echoadmin = true;
        else
            $echoadmin = false;
        
        $tabCategories = $this->_db->select_category();




        # Recherche si un mot clé est entré dans le formulaire form_recherche

        if (!empty($_POST['formQuestion'])&&(!empty($_POST['keyword'])||(!empty($_POST['category'])))){
            $tabquestions=$this->_db->select_questions($_POST['keyword'],$_POST['category']);
            foreach ($tabquestions as $i => $value) {
                $tabCategories2[] = $this->_db->select_categories($tabquestions[$i]->html_category());
                $tabUsers[] = $this->_db->select_users($tabquestions[$i]->html_user_id());
            }
            $html_motcle=htmlspecialchars($_POST['keyword']); # Protection faille XSS pour l'affichage
        } else {
            # Sélection de tous les questions sous forme de tableau
            $tabquestions = $this->_db->select_questions('',0);
            foreach ($tabquestions as $i => $value) {
                $tabCategories2[] = $this->_db->select_categories($tabquestions[$i]->html_category());
                $tabUsers[] = $this->_db->select_users($tabquestions[$i]->html_user_id());
            }
        }

        require_once (CHEMIN_VUES.'accueil.php');
    }
}