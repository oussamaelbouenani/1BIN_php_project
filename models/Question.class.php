<?php


class Question
{
    private $_question_id;
    private $_title;
    private $_subject;
    private $_user_id;
    private $_category;
    private $_solved;
    private $_duplicated;
    private $_creation_date;
    private $_right_answer;

    public function __construct($question_id, $title, $subject, $user_id, $category, $solved, $duplicated, $creation_date,$right_answer)
    {
        $this->_question_id = $question_id;
        $this->_title = $title;
        $this->_subject = $subject;
        $this->_user_id = $user_id;
        $this->_category = $category;
        $this->_solved = $solved;
        $this->_duplicated = $duplicated;
        $this->_creation_date = $creation_date;
        $this->_right_answer = $right_answer;

    }

    public function html_question_id(){
        return htmlspecialchars($this->_question_id);
    }

    public function html_title(){
        return htmlspecialchars($this->_title);
    }

    public function html_subject(){
        return htmlspecialchars($this->_subject);
    }

    public function html_user_id(){
        return htmlspecialchars($this->_user_id);
    }
    public function html_category(){
        return htmlspecialchars($this->_category);
    }
    public function html_status(){
        return htmlspecialchars($this->_solved);
    }
    public function html_duplicated(){
        return htmlspecialchars($this->_duplicated);
    }
    public function html_creation_date(){
        return htmlspecialchars($this->_creation_date);
    }

}