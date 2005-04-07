<?php
/**
 * @package harmoni.dbc.postgre
 * 
 * @copyright Copyright &copy; 2005, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: PostGreInsertQueryResult.class.php,v 1.5 2005/04/07 16:33:25 adamfranco Exp $
 */
 
require_once(HARMONI."DBHandler/InsertQueryResult.interface.php");

/**
 * The InsertQueryResult interface provides the functionality common to all INSERT query results.
 * For example, you can get the primary key for the last insertion, get number of inserted rows, etc.
 *
 * @package harmoni.dbc.postgre
 * 
 * @copyright Copyright &copy; 2005, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: PostGreInsertQueryResult.class.php,v 1.5 2005/04/07 16:33:25 adamfranco Exp $
 */
class PostGreInsertQueryResult 
	extends InsertQueryResultInterface  
{


	/**
	 * The resource id for this query.
	 * @var integer __resourceId 
	 * @access private
	 */
	var $_resourceId;

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
	 * Creates a new PostGreINSERTQueryResult object.
	 * @access public
	 * @param integer $resourceId The resource id for this query.
	 * @param integer $lastId The last id that was inserted
	 * @return object A new PostGreINSERTQueryResult object.
	 */
	function PostGreInsertQueryResult($resourceId, $lastId) {
		// ** parameter validation
		$resourceRule =& ResourceValidatorRule::getRule();
		$integerRule =& OptionalRule::getRule(IntegerValidatorRule::getRule());
		ArgumentValidator::validate($resourceId, $resourceRule, true);
		ArgumentValidator::validate($lastId, $integerRule, true);
		// ** end of parameter validation

		$this->_resourceId = $resourceId;
		
		$this->_numberOfRows = pg_affected_rows($this->_resourceId);
		$this->_lastAutoIncrementValue = $lastId;
	}
		

	/**
	 * Gets the last auto increment value that was generated by the INSERT query.
	 * This is not a 100% reliable method. If somebody inserted something after
	 * the insert query but before the InsertQueryResult object was created, then
	 * this method could return an invalid value.
	 * @access public
	 * @return integer The last auto increment value that was generated by the INSERT query.
	 */ 
	function getLastAutoIncrementValue() {
		if (is_null($this->_lastAutoIncrementValue)) {
			$str = "Cannot get last autoincrement value, because the autoincrement ";
			$str .= "column has not been set with setAutoIncrementColumn().";
			throwError(new Error($str, "DBHandler", true));
		}
	
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