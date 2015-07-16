<?php
/**
*   Fichier IndexController
*
*  PHP Version 5.4
*
* @category Nothing
* @package  Nothing
* @author   larivi_n_o <nelly.lariviere@epitech.eu>
* @license  http://opensource.org/licenses/gpl-license.php GNU Public License
* @link     http://localhost:8080/rendu/
*/
namespace app\controllers;
use \lib\Controller\Controller;
use \app\models\UserTable;
/**
 *   Class IndexController
 *
 * @category Nothing
 * @package  Nothing
 * @author   larivi_n <nelly.lariviere@epitech.eu>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://localhost:8080/rendu/
 */
class IndexController extends Controller
{
    /**
     * [indexAction description]
     * @return [type] [description]
     */
    public function indexAction()
    {
        //die(__function__);
        //$this->render('ControllerName:ViewFilename', ['boulou'=>'testou']);
        $u = new UserTable ;
        $user = $u->findOne('login = ?', array('nellouille'));
        $this->render('Index:index', $user);
    }

}

