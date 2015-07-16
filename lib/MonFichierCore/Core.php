<?php
/**
*   Fichier Monfichiercore
*
*  PHP Version 5.4
*
* @category Nothing
* @package  Nothing
* @author   larivi_n_o <nelly.lariviere@epitech.eu>
* @license  http://opensource.org/licenses/gpl-license.php GNU Public License
* @link     http://localhost:8080/rendu/
*/
namespace MonFichierCore;
/**
 *   Class Core
 *
 * @category Nothing
 * @package  Nothing
 * @author   larivi_n <nelly.lariviere@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
class Core
{
    /**
     * [run description]
     * @return [type] [description]
     */
    public static function run()
    {
        
        Core::registerAutoload();
        $array = explode('/', $_GET['page']);
        $var = "indexAction";
        if (isset($array[1])) {
            $var = $array[1] . "Action";
        }
        //include_once '../app/controllers/' . ucfirst($_GET['page']). 'Controller.php' ;
        $action = 'app\controllers\\' . ucfirst($array[0]). 'Controller';
        $result = new $action();
        $result->$var();

    }
    /**
     * [autoload description]
     * @param  [type] $class [description]
     * @return [type]        [description]
     */
    public static function autoload($class)
    {
        //On remonte d'un cran et on remplace les \ utilisé pour l'appel de la classe dans son namespace par des slashes 
        $class = str_replace('\\', '/', $class);
        include dirname(__FILE__) . '/../../' . $class .".php";
     
    }
    /**
     * [registerAutoload description]
     * @return [type] [description]
     */
    public static function registerAutoload()
    {
        spl_autoload_register(array('MonFichierCore\Core','autoload'));
        
    }
 
    
    
}

?>