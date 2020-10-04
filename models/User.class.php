<?php


class User
{
    private $_user_id;
    private $_pseudo;
    private $_first_name;
    private $_last_name;
    private $_email;
    private $_admin;
    private $_disabled;
    private $_password;

    /**
     * User constructor.
     * @param $_user_id
     * @param $_pseudo
     * @param $_first_name
     * @param $_last_name
     * @param $_email
     * @param $_admin
     * @param $_disabled
     * @param $_password
     */
    public function __construct($_user_id, $_pseudo, $_first_name, $_last_name, $_email, $_admin, $_disabled, $_password)
    {
        $this->_user_id = $_user_id;
        $this->_pseudo = $_pseudo;
        $this->_first_name = $_first_name;
        $this->_last_name = $_last_name;
        $this->_email = $_email;
        $this->_admin = $_admin;
        $this->_disabled = $_disabled;
        $this->_password = $_password;
    }


    public function html_user_id()
    {
        return htmlspecialchars($this->_user_id);
    }
    public function html_pseudo()
    {
        return htmlspecialchars($this->_pseudo);
    }

    public function html_disabled()
    {
        return htmlspecialchars($this->_disabled);
    }
    public function html_password()
    {
        return htmlspecialchars($this->_password);
    }
    public function html_admin()
    {
        return htmlspecialchars($this->_admin);
    }
    /**
     * @return mixed
     */
    public function html_first_name()
    {
        return htmlspecialchars($this->_first_name);
    }

    /**
     * @return mixed
     */
    public function html_last_name()
    {
        return htmlspecialchars($this->_last_name);
    }

    /**
     * @return mixed
     */
    public function html_email()
    {
        return htmlspecialchars($this->_email);
    }


}