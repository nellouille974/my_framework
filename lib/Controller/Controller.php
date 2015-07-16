<?php
/**
*   Fichier Controller
*
*  PHP Version 5.4
*
* @category Nothing
* @package  Nothing
* @author   larivi_n_o <nelly.lariviere@epitech.eu>
* @license  http://opensource.org/licenses/gpl-license.php GNU Public License
* @link     http://localhost:8080/rendu/
*/
namespace lib\Controller;
/**
 *   Class Controller
 *
 * @category Nothing
 * @package  Nothing
 * @author   larivi_n <nelly.lariviere@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
abstract class Controller
{
    /**
     * [render description]
     * @param  [type] $view   [description]
     * @param  [type] $params [description]
     * @return [type]         [description]
     */
    public function render($view, $params = [])
    {
        $view = explode(":", $view);
        if (file_exists(dirname(__FILE__) . '/../../app/views/' . $view[0] . '/' . $view[1] . '.html')) {
            ob_start();
            include dirname(__FILE__) . '/../../app/views/' . $view[0] . '/' . $view[1] . '.html';
            $c = ob_get_clean();
        
            foreach ($params as $k => $v) {
                $c = preg_replace("/\{\{\s*$k\s*\}\}/", $v, $c);
            }
    
            ob_end_flush();
            echo $c ;
        }
    }

}
