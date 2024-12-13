<?php
class Database
{
    private static $dbHost="localhost";
    private static $dbName="arfahane_dbburger";
    private static $dbUser="arfahane_N";
    private static $dbUserPassword="regRUB-db1!";
    
    private static $connection=null;
    //connection à la base de donnée
    public static function connect()
    {
        try
        {
            self::$connection=new PDO('mysql:host=', self::$dbHost,';dbName', self::$dbName, self::$dbUser, self::$dbUserPassword);
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        } 
        return self::$connection;
    }
    public static function disconnect()
    {
        self::$connection=null;
    }
    
}
Database::connect();

?>