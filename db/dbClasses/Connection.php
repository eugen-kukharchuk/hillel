<?php
class Connection
{
    public static $dsn = 'mysql:host=localhost;dbname=mytest';
    public static $username = 'mysql';
    public static $passwd = 'mysql';
    public static $options = [];

    public static function getConnect ()
    {
        return new PDO(Connection::$dsn, Connection::$username, Connection::$passwd, Connection::$options);
    }

}