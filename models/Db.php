<?php
class Db
{
    private static $instance = null;
    private $_db;

    private function __construct()
    {
        try {
            $this->_db = new PDO('mysql:host=localhost;dbname=classnotfound;charset=utf8', 'root', 'root');
            $this->_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }
        catch (PDOException $e) {
            die('Erreur de connexion à la base de données : '.$e->getMessage());
        }
    }

    # Pattern Singleton
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Db();
        }
        return self::$instance;
    }

    # Fonction qui exécute un SELECT dans la table des livres
    # et qui renvoie un tableau d'objet(s) de la classe Livre
    public function select_questions($keyword='',$category='') {
        # Définition du query et préparation
        # Si un mot clé a été défini ainsi qu'une categorie
        if ($keyword != '') {
            #echo "1er if";
            $keyword = str_replace("%", "\%", $keyword);
            if (!empty($category)){
                $query = "SELECT * 
                        FROM questions 
                        WHERE (title LIKE :keyword OR subject LIKE :keyword) 
                        AND category_id LIKE :category COLLATE utf8_bin ORDER BY creation_date DESC ";

            }else{
                $query = "SELECT * 
                        FROM questions WHERE title LIKE :keyword OR subject LIKE :keyword
                        COLLATE utf8_bin ORDER BY creation_date DESC ";
            }

            $ps = $this->_db->prepare($query);
            # Le bindValue se charge de quoter proprement les valeurs des variables sql
            $ps->bindValue(':keyword',"%$keyword%");
            $ps->bindValue(':category',"%$category%");
        }elseif (!empty($category)){
            $query = "SELECT * FROM questions WHERE category_id LIKE :category COLLATE utf8_bin ORDER BY creation_date DESC ";
            $ps = $this->_db->prepare($query);
            # Le bindValue se charge de quoter proprement les valeurs des variables sql
            $ps->bindValue(':category',"%$category%");
        }

        else {
            #echo "else";
            $query = 'SELECT * FROM questions ORDER BY creation_date DESC';
            $ps = $this->_db->prepare($query);
        }

        # Exécution du prepared statement
        $ps->execute();

        $tableau = array();
        # Parcours de l'ensemble des résultats
        # Construction d'un tableau d'objet(s) de la classe Livre
        # Si le tableau est vide, on ne rentre pas dans le while
        while ($row = $ps->fetch()) {
            $tableau[] = new Question($row->question_id,$row->title,$row->subject,$row->user_id,$row->category_id,$row->solved,$row->duplicated,$row->creation_date,$row->right_answer);
        }

        # Pour debug : affichage du tableau à renvoyer
        # var_dump($tableau);
        return $tableau;
    }

    /*Select a question according to its id*/
    public function select_question($question_id) {
        $query = 'SELECT * FROM questions WHERE question_id=:question_id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':question_id',$question_id);
        $ps->execute();
        $row = $ps->fetch();
        return new Question($row->question_id,$row->title,$row->subject,$row->user_id,$row->category_id,$row->solved,$row->duplicated,$row->creation_date,$row->right_answer);
    }

    /*Select all the questions frome a specific user*/
    public function select_my_questions($user_id){
        $tabquestions = array();
        $query = 'SELECT * FROM questions WHERE :user_id = user_id ORDER BY creation_date DESC';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':user_id',$user_id);
        $ps->execute();

        while ($row = $ps->fetch()) {
            $tabquestions[] = new Question($row->question_id,$row->title,$row->subject,$row->user_id,$row->category_id,$row->solved,$row->duplicated,$row->creation_date,$row->right_answer);
        }
        return $tabquestions;

    }

    /*Add a question in the DB*/
    public function insert_question($title,$subject, $user_id, $category) {
        # Solution d'INSERT avec prepared statement
        $creation_date = microtime(true);
        $query = 'INSERT INTO `questions`(`question_id`, `title`, `subject`, `user_id`, `solved`,`duplicated`, `category_id`, `creation_date`, `right_answer`) 
        VALUES (DEFAULT, :title, :subject, :user_id, DEFAULT , DEFAULT , :category, now(), DEFAULT)';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':title',$title);
        $ps->bindValue(':subject',$subject);
        $ps->bindValue(':user_id',$user_id);
        $ps->bindValue(':category',$category);
        return $ps->execute();
    }

    /*Remove a question from the DB thanks to its id*/
    public function delete_question($question_id) {
        # Solution de DELETE avec prepared statement
        $query = 'DELETE FROM questions WHERE question_id=:question_id LIMIT 1';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':question_id',$question_id);
        return $ps->execute();
    }

    /*Modifie à question in the DB*/
    public function update_question($question_id, $subject){
        $query = 'UPDATE questions set subject = :subject WHERE question_id = :question_id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':subject', $subject);
        $ps->bindValue(':question_id', $question_id);
        return $ps->execute();
    }

    /*Remove an answer from the DB thanks to its id*/
    public function delete_answers($question_id) {
        # Solution de DELETE avec prepared statement
        $query = 'DELETE FROM answers WHERE question_id=:question_id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':question_id',$question_id);
        return $ps->execute();
    }

    /*Select all the categories and return them in a tab*/
    public function select_category(){
        $query = 'SELECT * FROM categories';
        $ps = $this->_db->prepare($query);
        $ps->execute();
        $tableau = array();

        while($row = $ps->fetch()){
            $tableau[] = new Category($row->category_id,$row->name);
        }
        return $tableau;
    }

    /*Select a category thanks to its id*/
    public function select_categories($no){
        $query = 'SELECT * FROM categories WHERE category_id = :no';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':no',$no);
        $ps->execute();
        $row = $ps->fetch();
        return new Category($row->category_id, $row->name);
    }

    /*Verrifie if the nickname or email is already used*/
    public function is_present($pseudo, $email){
        $query = 'SELECT * FROM users WHERE pseudo = :pseudo OR email = :email';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':pseudo', $pseudo);
        $ps->bindValue(':email', $email);
        $ps->execute();
        $row = $ps->fetch();
        return $row;
    }

    /*Select a user thanks to its id*/
    public function select_users($no){
        $query = 'SELECT * FROM users WHERE user_id = :no';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':no',$no);
        $ps->execute();
        $row = $ps->fetch();
        return new User($row->user_id,$row->pseudo, $row->first_name,$row->last_name,$row->email,$row->admin,$row->disabled,$row->password);
    }
    /*Select all the users*/
    public function select_all_users(){
        $tableau = array();
        $query = 'SELECT * FROM users  ORDER BY admin DESC';
        $ps = $this->_db->prepare($query);
        $ps->execute();
        while($row = $ps->fetch()){
            $tableau[] = new User($row->user_id,$row->pseudo, $row->first_name,$row->last_name,$row->email,$row->admin,$row->disabled,$row->password);
        }
        return $tableau;
    }
    /*Select a user thanks to its login and during login*/
    public function select_user($login){
        $query = 'SELECT * FROM users WHERE :login = email OR :login = pseudo';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':login',$login);
        $ps->execute();
        $row = $ps->fetch();
        return new User($row->user_id,$row->pseudo, $row->first_name,$row->last_name,$row->email,$row->admin,$row->disabled,$row->password);
    }

    /*Add a user in the DB*/
    public function insert_user($pseudo,$email,$password,$last_name,$first_name){
        $password_hash =  password_hash($password,PASSWORD_BCRYPT);
        $query = 'INSERT INTO users
                VALUES (DEFAULT, :pseudo, :first_name, :last_name, :email, 0, 0,:password_hash)';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':pseudo',$pseudo);
        $ps->bindValue(':first_name',$first_name);
        $ps->bindValue(':last_name',$last_name);
        $ps->bindValue(':email',$email);
        $ps->bindValue(':password_hash',$password_hash);
        return $ps->execute();
    }

    /*Conects a user*/
    public function authentify_user($login, $password){
        $query = 'SELECT password FROM users WHERE :login = email OR :login = pseudo';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':login',$login);
        $ps->execute();
        if ($ps->rowCount()==0){
            return false;
        }
        $hash = $ps->fetch()->password;
        return password_verify($password,$hash);

    }

    /*Updates user's chosen information*/
    public function update_user($user_id, $champ, $value){
        //$ps->bindValue(':champ', $champ);
        if ($champ == 'password'){
            $password_hash = password_hash($value,PASSWORD_BCRYPT);
            $query = 'UPDATE users set '.$champ.' = :password_hash WHERE user_id = :user_id';
            $ps = $this->_db->prepare($query);
            $ps->bindValue(':user_id', $user_id);
            $ps->bindValue(':password_hash', $password_hash);
        } else {
            $query = 'UPDATE users set '.$champ.' = :value WHERE user_id = :user_id';
            $ps = $this->_db->prepare($query);
            $ps->bindValue(':user_id', $user_id);
            $ps->bindValue(':value', $value);
        }
        return $ps->execute();
    }

    /*Change a user's status (admin/member or member/admin)*/
    public function update_admin($value,$user){
        $query = 'UPDATE users SET admin = :value WHERE user_id = :user';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':value',$value);
        $ps->bindValue(':user',$user);
        return $ps->execute();
    }

    /*Deactivate an account or reactivates it*/
    public function update_disabled($value,$user){
        $query = 'UPDATE users SET disabled = :value WHERE user_id = :user';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':value',$value);
        $ps->bindValue(':user',$user);
        return $ps->execute();
    }
    /*Makes an answer duplicate or not*/
    public function update_duplicated($value, $question_id){
        $query = 'UPDATE questions SET duplicated = :value WHERE question_id = :question_id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':value',$value);
        $ps->bindValue(':question_id',$question_id);
        return $ps->execute();
    }

    /*get the answers of a question.*/
    public function select_answers($no_question){
        $query = 'SELECT * FROM answers WHERE question_id = :no_question';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':no_question', $no_question);
        $ps->execute();
        $tableau = array();
        while($row = $ps->fetch()){
            $tableau[] = new Answer($row->answer_id, $row->subject, $row->question_id, $row->user_id, $row->creation_date);
        }
        return $tableau;

    }

    /*Adds an answer to the DB*/
    public function insert_answer($subject,$question_id,$user_id){
        //$now = microtime(true);
        $query = 'INSERT INTO answers VALUES (DEFAULT,:subject, :question_id, :user_id, NOW())';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':subject',$subject);
        $ps->bindValue(':question_id',$question_id);
        $ps->bindValue(':user_id',$user_id);
        //$ps->bindValue(':now',$now);
        return $ps->execute();
    }

    /*get the answers of a question.*/
    public function select_answer($no_answer){
        $query = 'SELECT * FROM answers WHERE answer_id = :no_answer';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':no_answer', $no_answer);
        $ps->execute();
        $row = $ps->fetch();
        return new Answer($row->answer_id,$row->subject, $row->question_id,$row->user_id,$row->creation_date);

    }

    /*Adds a vote in the DB. one vote for one question and one user.*/
    public function insert_vote($author, $answer, $value_vote){
        $query = 'INSERT INTO votes VALUES (:author,:answer, :user_id, :answer_id, :value_vote)';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':author',$author);
        $ps->bindValue(':answer',$answer);
        $ps->bindValue(':user_id',$author);
        $ps->bindValue(':answer_id',$answer);
        $ps->bindValue(':value_vote', $value_vote);
        try {
            $ps->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /*Select all positive votes from an answer thanks to the answer id.*/
    public function select_votes_positif($answer_id){
        $query = 'SELECT COUNT(*) AS total FROM votes WHERE answer_id = :answer_id AND value_vote > 0';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':answer_id', $answer_id);
        $ps->execute();
        $vote = $ps->fetch();
        return $vote->total;
    }

    /*Select all negative votes from an answer thanks to the answer id.*/
    public function select_votes_negatif($answer_id){
        $query = 'SELECT COUNT(*) AS total FROM votes WHERE answer_id = :answer_id AND value_vote < 0';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':answer_id', $answer_id);
        $ps->execute();
        $vote = $ps->fetch();
        return $vote->total;
    }

    /*Removes a vote thanks to primary key*/
    public function remove_vote($author, $answer){
        $query = 'DELETE FROM votes WHERE author = :author and answer = :answer';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':author',$author);
        $ps->bindValue(':answer',$answer);
        return $ps->execute();
    }

    /*Remove all votes from an answer thanks to the answer id*/
    public function remove_answer_vote($answer){
        $query = 'DELETE FROM votes WHERE answer = :answer';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':answer',$answer);
        return $ps->execute();
    }

    /*Select a vote to make sure it exist or not*/
    public function select_vote($author, $answer){
        $query = 'SELECT value_vote FROM votes WHERE author = :author and answer = :answer';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':author', $author);
        $ps->bindValue(':answer', $answer);
        $ps->execute();
        $vote = $ps->fetch();
        return $vote->value_vote;
    }

    /*Marks a question as solved*/
    public function valid_question($numQuestion, $answerID){
        $query = 'UPDATE `questions` SET `solved`= 1,`right_answer`= :answerID WHERE `question_id` = :numQuestion';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':numQuestion', $numQuestion);
        $ps->bindValue(':answerID', $answerID);
        return $ps->execute();
    }

    /*Marks a question as unsolved*/
    public function unvalid_question($numQuestion){
        $query = 'UPDATE `questions` SET `solved`= 0,`right_answer`= null WHERE `question_id` = :numQuestion';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':numQuestion', $numQuestion);
        return $ps->execute();
    }

    /*
    public function update_livre($no,$titre,$auteur) {
        $query = 'UPDATE livres SET titre=:titre,auteur=:auteur WHERE no=:no';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':titre',$titre);
        $ps->bindValue(':auteur',$auteur);
        $ps->bindValue(':no',$no);
        return $ps->execute();
    }
    */
}