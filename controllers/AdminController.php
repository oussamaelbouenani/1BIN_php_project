<?php


class AdminController
{
    private $_db;
    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function run(){
        # Si un petit fûté écrit ?action=admin sans passer par l'action login
        if (empty($_SESSION['authentifie'])||$_SESSION['authentifie']!='admin') {
            header("Location: index.php?action=login"); # redirection HTTP vers l'action login
            die();
        }

        # Arrivé ici l'authentification est valide... continuons...
        # Variable HTML pour la vue
        $html_pseudo = htmlspecialchars($_SESSION['pseudo']);
        $notification = '';
        $alert = '';
        $tabusers = '';

        if (!empty($_POST['admin'])){
          foreach($_POST['admin'] as $no => $action) {
            $user = $this->_db->select_users($no);
            if ($_SESSION['pseudo'] == $user->html_pseudo()){
              $notification = 'Vous ne pouvez pas modifer votre propre statut !';
              $alert = 'alert alert-danger';
            }else{
              $statut = $user->html_admin();
              if ($statut)
                $this->_db->update_admin(0, $no);
              else
                $this->_db->update_admin(1, $no);
              $notification = 'Rôle mis a jour pour '.$user->html_pseudo();
              $alert = 'alert alert-success';
            }
          }
        }
        if (!empty($_POST['disabled'])){
            foreach($_POST['disabled'] as $no => $action) {
                $user = $this->_db->select_users($no);
                if ($_SESSION['pseudo'] == $user->html_pseudo()){
                  $notification = 'Vous ne pouvez pas modifer votre propre statut !';
                  $alert = 'alert alert-danger';
                }else{
                  $statut = $user->html_disabled();
                  if ($statut)
                    $this->_db->update_disabled(0, $no);
                  else
                    $this->_db->update_disabled(1, $no);
                  $notification = 'Statut mis a jour pour '.$user->html_pseudo();
                    $alert = 'alert alert-success';
                }
            }
        }

        # Sélection de tous les utilisateurs
        $tabusers=$this->_db->select_all_users();

        # Ecrire ici la vue
        require_once(CHEMIN_VUES . 'admin.php');
    }

    /*
       if (!empty($_POST['form_delete'])) {
           # ----------------------------------------------------------------------------------
           # Effacer une question dont le numéro est l'indice dans le tableau $_POST['form_delete']
           # ----------------------------------------------------------------------------------
           # var_dump($_POST['form_delete'];
           foreach ($_POST['form_delete'] as $no => $action) {
               $this->_db->delete_question($no);
           }
           $notification = 'La question '.$no.' a bien été effacée';
       }
   */

}