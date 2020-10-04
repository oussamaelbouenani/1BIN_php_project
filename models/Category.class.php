<?php


class Category
{
    private $_category_id;
    private $_name;

    /**
     * Category constructor.
     * @param $_category_id
     * @param $_name
     */
    public function __construct($_category_id, $_name)
    {
        $this->_category_id = $_category_id;
        $this->_name = $_name;
    }


    public function html_category_id(){
        return htmlspecialchars($this->_category_id);
    }
    public function html_name(){
        return htmlspecialchars($this->_name);
    }


}