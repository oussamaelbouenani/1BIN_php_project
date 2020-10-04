<?php
/**
 * Created by PhpStorm.
 * User: SaiyajiN
 * Date: 19/03/2019
 * Time: 15:19
 */

class SigninController{
    private $_db;
    public function __construct($db)
    {
        $this->_db = $db;

    }

    public function run(){

        $notification = '';
        $alert = '';
        $check = false;
        $success = false;
        if (!empty($_POST['form_signin'])){

            if (!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['last_name'])&& !empty($_POST['first_name'])){
                $check = $this->_db->is_present($_POST['pseudo'], $_POST['email']);
                if ($check){
                    $notification = 'Pseudo ou email déjà utilisé';
                    $alert = 'alert alert-danger';
                }else{
                    if ($_POST['password1'] != $_POST['password2']){
                        $notification = 'Les mots de passes ne sont pas identiques';
                        $alert = 'alert alert-danger';
                    }else{
                        $this->_db->insert_user($_POST['pseudo'],$_POST['email'],$_POST['password1'],$_POST['last_name'],$_POST['first_name']);
                        $notification = 'Vous avez bien été inscrit';
                        $alert = 'alert alert-success';
                        header("Location: index.php?action=login");
                        die();
                    }

                }
            }else{
                $notification = 'Vos données sont incomplètes';
                $alert = 'alert alert-danger';
            }
        }
        require_once (CHEMIN_VUES.'signin.php');
    }

}