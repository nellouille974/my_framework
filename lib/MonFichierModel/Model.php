<?php
/**
*   Fichier Model
*
*  PHP Version 5.4
*
* @category Nothing
* @package  Nothing
* @author   larivi_n_o <nelly.lariviere@epitech.eu>
* @license  http://opensource.org/licenses/gpl-license.php GNU Public License
* @link     http://localhost:8080/rendu/
*/
namespace lib\MonFichierModel;
use \PDO;
/**
 *   Class Model
 *
 * @category Nothing
 * @package  Nothing
 * @author   larivi_n <nelly.lariviere@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
abstract class Model
{
    private $_db_name="framework";
    private $_host="localhost";
    private $_port="";
    private $_socket="/home/larivi_n/.mysql/mysql.sock";
    private $_login="root";
    private $_password="";
    static protected $pdo;
    /**
     * [__construct description]
     */
    public function __construct()
    {
        try
        {
            self::$pdo = new PDO("mysql:host=" . $this->_host . ";dbname=".$this->_db_name . ";unix_socket=".$this->_socket, $this->_login, $this->_password);
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * [findOne description]
     * @param  [type] $where  [description]
     * @param  [type] $params [description]
     * @return [type]         [description]
     */
    public function findOne($where, $params = [])
    {
        $user = explode('\\', get_class($this));
        $user = $user[sizeof($user) - 1];
        $user = strtolower($user);
        $req = "SELECT * FROM " . $user . " WHERE " . $where;
        $var = self::$pdo->prepare($req);
        foreach ($params as $key => $value) {
            $var->bindParam($key+1, $value);
        }
        $test = $var->execute();
        return $var->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * [getDb_Name description]
     * @return [type] [description]
     */
    public function getDbName()
    {
        return $this->_db_name;
    }
    /**
     * [setDbName description]
     * @param [type] $nouveauDb_Name [description]
     * @return  [type] [description]
     */
    public function setDbName($nouveauDb_Name)
    {
        $this->_db_name = $nouveauDb_Name;
    }
    /**
     * [getHost description]
     * @return [type] [description]
     */
    public function getHost()
    {
        return $this->_host;
    }
    /**
     * [setHost description]
     * @param [type] $nouveauHost [description]
     * @return  [type] [description]
     */
    public function setHost($nouveauHost)
    {
        $this->_host = $nouveauHost;
    }
    /**
     * [getPort description]
     * @return [type] [description]
     */
    public function getPort()
    {
        return $this->_port;
    }
    /**
     * [setPort description]
     * @param [type] $nouveauPort [description]
     * @return  [type] [description]
     */
    public function setPort($nouveauPort)
    {
        $this->_host = $nouveauPort;
    }
    /**
     * [getSocket description]
     * @return [type] [description]
     */
    public function getSocket()
    {
        return $this->_socket;
    }
    /**
     * [setSocket description]
     * @param [type] $nouveauSocket [description]
     * @return  [type] [description]
     */
    public function setSocket($nouveauSocket)
    {
        $this->_socket = $nouveauSocket;
    }
    /**
     * [getLogin description]
     * @return [type] [description]
     */
    public function getLogin()
    {
        return $this->_login;
    }
    /**
     * [setLogin description]
     * @param [type] $nouveauLogin [description]
     * @return  [type] [description]
     */
    public function setLogin($nouveauLogin)
    {
        $this->_login = $nouveauLogin;
    }
    /**
     * [getPassword description]
     * @return [type] [description]
     */
    public function getPassword()
    {
        return $this->_password;
    }
    /**
     * [setPassword description]
     * @param [type] $nouveauPassword [description]
     * @return  [type] [description]
     */
    public function setPassword($nouveauPassword)
    {
        $this->_password = $nouveauPassword;
    }

}