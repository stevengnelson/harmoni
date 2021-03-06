<?php
/**
 * @package harmoni.dbc.mysql
 * 
 * @copyright Copyright &copy; 2005, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: MySQLInsertQueryResult.class.php,v 1.6 2007/09/05 21:39:00 adamfranco Exp $
 */
 
require_once(HARMONI."DBHandler/InsertQueryResult.interface.php");

/**
 * The InsertQueryResult interface provides the functionality common to all INSERT query results.
 *
 * For example, you can get the primary key for the last insertion, get number of inserted rows, etc.
 *
 * @package harmoni.dbc.mysql
 * 
 * @copyright Copyright &copy; 2005, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: MySQLInsertQueryResult.class.php,v 1.6 2007/09/05 21:39:00 adamfranco Exp $
 */

class MySQLInsertQueryResult 
	implements InsertQueryResultInterface  
{


	/**
	 * The link identifier for the database connection.
	 * The link identifier for the database connection.
	 * @param integer $_linkId The link identifier for the database connection.
	 * @access private
	 */
	var $_linkId;
	
	/**
	 * Gets the last auto increment value that was generated by the INSERT query.
	 * Gets the last auto increment value that was generated by the INSERT query.
	 * @access private
	 * @var integer $_lastAutoIncrementValue The last auto increment value that was generated by the INSERT query.
	 */
	var $_lastAutoIncrementValue;

	/**
	 * Stores the number of rows processed by the query.
	 * Stores the number of rows processed by the query.
	 * @var integer $_numberOfRows The number of rows processed by the query.
	 * @access private
	 */
	var $_numberOfRows;


	/**
	 * Creates a new MySQLINSERTQueryResult object.
	 * Creates a new MySQLINSERTQueryResult object.
	 * @access public
	 * @param integer $linkId The link identifier for the database connection.
	 * @return object MySQLINSERTQueryResult A new MySQLINSERTQueryResult object.
	 */
	function MySQLInsertQueryResult($linkId) {
		// ** parameter validation
		$resourceRule = ResourceValidatorRule::getRule();
		ArgumentValidator::validate($linkId, $resourceRule, true);
		// ** end of parameter validation

		$this->_linkId = $linkId;
		
		$this->_numberOfRows = mysql_affected_rows($this->_linkId);

		// in MySQL, when inserting several rows with one INSERT query,
		// mysql_insert_id() returns the id of the first row.
		// Thus, we need to add the number of inserted rows - 1 to get the actual
		// last id.
		$this->_lastAutoIncrementValue = mysql_insert_id($this->_linkId) + $this->getNumberOfRows() - 1;
	}
		

	/**
	 * Gets the last auto increment value that was generated by the INSERT query.
	 * Gets the last auto increment value that was generated by the INSERT query.
	 * @access public
	 * @return integer The last auto increment value that was generated by the INSERT query.
	 */ 
	function getLastAutoIncrementValue() {
		return $this->_lastAutoIncrementValue;
	}
	

	/**
	 * Returns the number of rows that the query processed.
	 * Returns the number of rows that the query processed. For a SELECT query,
	 * this would be the total number of rows selected. For a DELETE, UPDATE, or
	 * INSERT query, this would be the number of rows that were affected.
	 * @return integer Number of rows that were processed by the query.
	 * @access public
	 */ 
	function getNumberOfRows() {
		return $this->_numberOfRows;
	}


}

?>