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
//phpinfo();

require_once dirname(__FILE__) . "/../lib/MonFichierCore/Core.php";

if (isset($_GET['page']) && $_GET['page'] != "") {
	MonFichierCore\Core::run();

} else {
	phpinfo();
}

?>
