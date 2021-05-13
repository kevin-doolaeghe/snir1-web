<?php

class MyPDO extends PDO
{
    public function __construct($dsn, $user, $password)
    {
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        parent::__construct($dsn, $user, $password,$options);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               
    }

    public function prepare($sql, $options=NULL)
    {
        $statement = parent::prepare($sql);
        if(strpos(strtoupper($sql), 'SELECT') === 0) //requête "SELECT"
        {
            $statement->setFetchMode(PDO::FETCH_ASSOC);
        }
        return $statement;
    }
}
?>
