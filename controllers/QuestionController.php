<?php


class QuestionController
{
    private $_db;
    public function __construct($db)
    {
        $this->_db = $db;
    }

    public function run(){

        $notification = '';
        $alert = '';
        $duplicated = FALSE;
        $modifier_question = FALSE;

        if (!empty($_POST['answerQuestion'])){
            if (empty($_SESSION['authentifie'])){
                header("Location: index.php?action=login");
                die();
            }
            $this->_db->insert_answer($_POST['answer'],$_POST['noQuestion'],$_SESSION['utilisateur_id']);
        }

        if (!empty($_SESSION['authentifie']) && $_SESSION['authentifie'] == 'admin')
            $echoadmin = true;
        else
            $echoadmin = false;

        if (!empty($_POST['deleteQuestion'])){
            foreach ($_POST['deleteQuestion'] as $no => $value) {
                $question = $this->_db->select_question($no);
                $question_answers = $this->_db->select_answers($question->html_question_id());
                for ($i = 0; $i < count($question_answers); $i++) {
                    $this->_db->remove_answer_vote($question_answers[$i]->html_answer_id());
                }
                $this->_db->delete_answers($no);
                $this->_db->delete_question($no);
            }
            header("Location: index.php?action=accueil&delete=1");
            die();
        }

        if (isset($_POST['update_question'])){
            $modifier_question = TRUE;
        }

        if (isset($_POST['nouveau_sujet'])){
            $notification = 'Question mise à jour';
            $alert = 'alert alert-success';
            $this->_db->update_question($_POST['noQuestion'], $_POST['new_question']);
        }

        if (isset($_POST['BonneReponse'])){
            $this->_db->valid_question($_POST['noQuestion'], $_POST['noAnswer']);
            $right_answer = $this->_db->select_answer($_POST['noAnswer']);
            $notification = 'Question mise a jour';
            $alert = 'alert alert-success';
        } else if (isset($_POST['MauvaiseReponse'])){
            $this->_db->unvalid_question($_POST['noQuestion']);
            $notification = 'Question mise a jour';
            $alert = 'alert alert-success';
        } else if (isset($_POST['MauvaiseReponseProfil'])){
            $this->_db->unvalid_question($_POST['noQuestion']);
            $notification = 'Question mise a jour';
            $alert = 'alert alert-success';
            header('Location: index.php?action=profil');
            die;
        }

        #BOUTON DOUBLON
        if (!empty($_POST['duplicateQuestion'])){
            foreach ($_POST['duplicateQuestion'] as $no => $value) {
                $question = $this->_db->select_question($no);
                $statut = $question->html_duplicated();
                if ($statut)
                    $this->_db->update_duplicated(0, $no);
                else
                    $this->_db->update_duplicated(1, $no);

            }
            header("Location: index.php?action=question&no=$no");
            die();
        }

        if (!empty($_POST['vote_positif']) || !empty($_POST["vote_negatif"])){
            if (empty($_SESSION['authentifie'])){
                header("Location: index.php?action=login");
                die();
            }

            if (isset($_POST['vote_positif'])){
                if ($this->_db->insert_vote($_SESSION['utilisateur_id'], $_POST['noAnswer'], $_POST['vote_positif'])){
                    $notification = 'Vote enregistré.';
                    $alert = 'alert alert-success';
                } else if ($this->_db->select_vote($_SESSION['utilisateur_id'], $_POST['noAnswer']) != 1){
                    $this->_db->remove_vote($_SESSION['utilisateur_id'], $_POST['noAnswer']);
                    $this->_db->insert_vote($_SESSION['utilisateur_id'], $_POST['noAnswer'], $_POST['vote_positif']);
                    $notification = 'Vote modifié.';
                    $alert = 'alert alert-success';
                } else {
                    $this->_db->remove_vote($_SESSION['utilisateur_id'], $_POST['noAnswer']);
                    $notification = 'Vote supprimé.';
                    $alert = 'alert alert-danger';
                }

            } else if (isset($_POST['vote_negatif'])){
                if ($this->_db->insert_vote($_SESSION['utilisateur_id'], $_POST['noAnswer'], $_POST['vote_negatif'])){
                    $notification = 'vote enregistré';
                    $alert = 'alert alert-success';
                } else if ($this->_db->select_vote($_SESSION['utilisateur_id'], $_POST['noAnswer']) != -1){
                    $this->_db->remove_vote($_SESSION['utilisateur_id'], $_POST['noAnswer']);
                    $this->_db->insert_vote($_SESSION['utilisateur_id'], $_POST['noAnswer'], $_POST['vote_negatif']);
                    $notification = 'Vote modifié.';
                    $alert = 'alert alert-success';
                } else {
                    $this->_db->remove_vote($_SESSION['utilisateur_id'], $_POST['noAnswer']);
                    $notification = 'Vote supprimé.';
                    $alert = 'alert alert-danger';
                }
            }
        }

        if (!empty($_GET['no'])){
            $question = $this->_db->select_question($_GET['no']);
            $question_user = $this->_db->select_users($question->html_user_id());
            $question_answers = $this->_db->select_answers($question->html_question_id());
            $answer_user = array();
            $votes_positifs = array();
            $votes_negatifs = array();
            for ($i = 0; $i < count($question_answers); $i++){
                $answer_user[] = $this->_db->select_users($question_answers[$i]->html_user_id());
                $votes_positifs[] = $this->_db->select_votes_positif($question_answers[$i]->html_answer_id());
                $votes_negatifs[] = $this->_db->select_votes_negatif($question_answers[$i]->html_answer_id());
            }
            $notification = 'Question mise a jour';
            $alert = 'alert alert-success';
            $duplicated = $question->html_duplicated();
        }

        if (!empty($_POST['showQuestion'])){
            foreach($_POST['showQuestion'] as $no => $action){
                $question = $this->_db->select_question($no);
                $question_user = $this->_db->select_users($question->html_user_id());
                //var_dump($question_user);
                $question_answers = $this->_db->select_answers($question->html_question_id());
                $answer_user = array();
                $votes_positifs = array();
                $votes_negatifs = array();
                for ($i = 0; $i < count($question_answers); $i++){
                    $answer_user[] = $this->_db->select_users($question_answers[$i]->html_user_id());
                    $votes_positifs[] = $this->_db->select_votes_positif($question_answers[$i]->html_answer_id());
                    $votes_negatifs[] = $this->_db->select_votes_negatif($question_answers[$i]->html_answer_id());
                }
            }
        }
        require_once (CHEMIN_VUES.'question.php');
    }

}