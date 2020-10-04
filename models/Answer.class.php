<?php


class Answer
{
    private $_answer_id;
    private $_subject;
    private $_question_id;
    private $_user_id;
    private $_creation_date;

    public function __construct($answer_id, $subject, $question_id, $user_id, $creation_date)
    {
        $this->_answer_id = $answer_id;
        $this->_subject = $subject;
        $this->_question_id = $question_id;
        $this->_user_id = $user_id;
        $this->_creation_date = $creation_date;
    }

    public function html_answer_id(){
        return htmlspecialchars($this->_answer_id);
    }

    public function html_subject(){
        return htmlspecialchars($this->_subject);
    }

    public function html_question_id(){
        return htmlspecialchars($this->_question_id);
    }

    public function html_user_id(){
        return htmlspecialchars($this->_user_id);
    }

    public function html_creation_date(){
        return htmlspecialchars($this->_creation_date);
    }

}