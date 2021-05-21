<?php
/**
 * Kontejner na globalni proměnné aplikace
 * @author Petr Svoboda
 */
namespace App\Web;

use PDO;

abstract class AppContext {
############ CESTY KE SLOŽKÁM #############################
    public static function getPublicDirectory() {
        return 'public/common/';  // relativní cesta vzhledem ke kořenovému adresáři skriptu
    }

    public static function getAppPublicDirectory() {
        return 'public/web/';  // relativní cesta vzhledem ke kořenovému adresáři skriptu
    }

    public static function getScriptsDirectory() {
        return "App/Web/";  // relativní cesta vzhledem ke kořenovému adresáři skriptu
    }    
############# DATABÁZE #############    
    const DEFAULT_DB_NICK = 'grafia';
    const PRODUCTION_MACHINE_HOST_NAME = 'xxxxx';
    
    /**
     * Informuje, zda skript běží na produkčním stroji.
     * @return boolean
     */
    private static function isRunningOnProductionMachine() {
        if (strpos(strtolower(gethostname()), self::PRODUCTION_MACHINE_HOST_NAME)===0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * @var Framework_Database_HandlerSqlInterface 
     */
    private static $db = array();

    /**
     * Metoda vrací objekt pro přístup k databázi. Metoda se podle označení databáze (nick) zadaném jako prametr rozhoduje, 
     * který objekt pro přístup k databázi vytvoří. Ke každé databázi vytváří jednu instanci objektu.
     * @param string $nick Označení databáze používané v tomto projektu. Jedná se o označení používané v rámci aplikace, nikoli o skutečný název 
     * databáze v databázovém stroji.
     * @return \PDO
     * @throws UnexpectedValueException
     */
    public static function getDb($nick = self::DEFAULT_DB_NICK) {
        switch ($nick) {
            case 'grafia':
                if(!isset(self::$db['grafia'])) {
                    if (self::isRunningOnProductionMachine()) {
                        assert(TRUE, 'Není implementováno vytvoření dbh na produkčním stroji.');
                    } else {
//                        $dsn = 'mysql:host=' . "localhost" . ';dbname=' . "grafiacz" ; 
                        $dsn = 'mysql:host=' . "localhost" . ';dbname=' . "wwwgrafia" ; 
                        $dbh = new PDO($dsn, "root", "spravce", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
                    }
                    self::$db['grafia'] = $dbh;
                } else {
                    $dbh = self::$db['grafia'];
                }

                break;

            default:
                throw new UnexpectedValueException('Neznámy název databáze '.$nick.'.');
        }
        return $dbh;
    }
    
    /**
     * Vrací defaulní označení (nick) databáze. Jedná se o označení používané v rámci aplikace, nikoli o skutečný název 
     * databáze v databázovém stroji.
     * @return string
     */
    public static function getDefaultDatabaseNick() {
        return self::DEFAULT_DB_NICK;
    }
}