<?php
/**
 * @since 4/4/08
 * @package harmoni.Harmoni_Db
 * 
 * @copyright Copyright &copy; 2007, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: Pdo.php,v 1.1.2.1 2008/04/04 15:43:08 adamfranco Exp $
 */ 

/**
 *  Abstract class to emulate a PDOStatement for native database adapters.
 * 
 * @since 4/4/08
 * @package <##>
 * 
 * @copyright Copyright &copy; 2007, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: Pdo.php,v 1.1.2.1 2008/04/04 15:43:08 adamfranco Exp $
 */
class Harmoni_Db_Statement_Pdo
	extends Zend_Db_Statement_Pdo
{
	
	/**
	 * Executes a prepared statement.
	 *
	 * @param array $params OPTIONAL Values to bind to parameter placeholders.
	 * @return bool
	 * @throws Zend_Db_Statement_Exception
	 */
	public function _execute(array $params = null) {
		$this->_adapter->incrementExecCounter();
		return parent::_execute($params);
	}
}

?>