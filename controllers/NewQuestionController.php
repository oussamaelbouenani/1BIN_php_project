<?php


class NewQuestionController
{
    private $_db;

    public function __construct($_db)
    {
        $this->_db = $_db;
    }

    public function run(){

        if (empty($_SESSION['authentifie'])){
            header("Location: index.php?action=login&newQuestion=1");
            die();
        }

        if (!empty($_GET['login'])){
            $notification = 'Vous vous êtes bien connecté !';
            $alert = 'alert alert-success';
        }
        else{
            $notification='';
            $alert = 'alert';
        }

        if(!empty($_POST)){
            $this->_db->insert_question($_POST['title'],$_POST['subject'], $_SESSION['utilisateur_id'], $_POST['category']);
            header("Location: index.php?action=accueil&submitQuestion=1");
            die();
        }

        require_once (CHEMIN_VUES.'newQuestion.php');
    }


}