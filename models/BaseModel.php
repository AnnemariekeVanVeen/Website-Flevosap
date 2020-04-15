<?php
/***
 * @authors Annemarieke van Veen and Katja Liotto
 * @copyright All rights reserved.
 */

/***
 * Class BaseModel; connects with DB
 */
abstract class BaseModel
{
    private $config;
    protected $conn;

    // information of the DB and login
    public function construct()
    {
        $this->config = [

            'hostname' => 'localhost',
            'user' => 'annemarieke',
            'passwd' => 'Calente2007!',
            'dbname' => 'annemarieke_flevosap'
        ];
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $dsn = 'mysql:host=localhost;dbname=' . $this->config['dbname'];
        $this->conn = new PDO($dsn, $this->config['user'], $this->config['passwd'], $options);
    }
}
