<?php


class ProfilController
{
    private $_db;
    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function run(){


        $notification='';
        if (isset($_GET['pseudo']) && $_GET['pseudo'] == 666){
            $notification = 'Pseudo ou email déjà utilisé';
            $alert = 'alert alert-danger';
        }
        $utilisateur = $this->_db->select_user($_SESSION['pseudo']);
        $tabquestions = $this->_db->select_my_questions($utilisateur->html_user_id());
        foreach ($tabquestions as $i => $value) {
            $tabcategories[] = $this->_db->select_categories($tabquestions[$i]->html_category());
        }

        if(!empty($_POST['form_update'])){
            if (isset($_POST['pseudo_update'])){
                $check = $this->_db->is_present($_POST['pseudo_update'], '');
                if ($check) {
                    $notification = 'Pseudo ou email déjà utilisé';
                    $alert = 'alert alert-danger';
                    header('location: index.php?action=profil&pseudo=666');
                    die();
                }
                $this->_db->update_user($_SESSION['utilisateur_id'], 'pseudo', $_POST['pseudo_update']);
                $_SESSION['pseudo'] = $_POST['pseudo_update'];
                header('location: index.php?action=profil');
                die();
            }
            if (isset($_POST['first_name_update'])) {
                $this->_db->update_user($_SESSION['utilisateur_id'], 'first_name', $_POST['first_name_update']);
                header('location: index.php?action=profil');
                die();
            }
            if (isset($_POST['name_update'])) {
                $this->_db->update_user($_SESSION['utilisateur_id'], 'last_name', $_POST['name_update']);
                header('location: index.php?action=profil');
                die();
            }
            if (isset($_POST['email_update'])){
                $check = $this->_db->is_present('', $_POST['email_update']);
                if ($check) {
                    $notification = 'Pseudo ou email déjà utilisé';
                    $alert = 'alert alert-danger';
                    header('location: index.php?action=profil&pseudo=666');
                    die();
                }
                $this->_db->update_user($_SESSION['utilisateur_id'], 'email', $_POST['email_update']);
                header('location: index.php?action=profil');
                die();
            }
            if (isset($_POST['password_update'])) {
                $this->_db->update_user($_SESSION['utilisateur_id'], 'password', $_POST['password_update']);
                header('location: index.php?action=profil');
                die();
            }
        }

        require_once (CHEMIN_VUES.'profil.php');
    }

}