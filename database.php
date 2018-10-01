<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


class Database
{
    private static $dbName ='blog';
    private static $dbHost = 'localhost';
    private static $dbUser = 'root';
    private static $dbPassword = 'rootpass';
    
    private static $cont = null;
    
    private function __construct() {
        die('Init function is not allowed.');
    }
    
    public static function connect() 
    {
        if ( null == self::$cont )
        {
            try 
            {
                self::$cont = new PDO( "'"."msql:host=".{self::$dbHost}.";"."dbname=".{self::$dbName.}"'", self::$dbUser, self::$dbPassword);
                //self::$cont = new PDO('mysql:host=83.168.227.23; dbname=db1164707_AndersR', 'u1164707_AndersR', 'n4jR8R}[|F');
                //self::$cont->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //self::$cont->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                //self::$cont->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } 
            catch (PDOException $ex) 
            {
                die($ex->getMessage());
            }
        }
        return self::$cont;
    }
    
    public static function disconnect()
    {
        self::$cont = null;
    }
            
}

