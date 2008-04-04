<?php
/**
 * @since 4/3/08
 * @package harmoni.Harmoni_Db
 * 
 * @copyright Copyright &copy; 2007, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: Mysql.php,v 1.1.2.4 2008/04/04 15:43:08 adamfranco Exp $
 */ 

require_once 'Zend/Db/Adapter/Pdo/Mysql.php';

/**
 * Class for connecting to MySQL databases and performing common operations.
 * 
 * @since 4/3/08
 * @package harmoni.Harmoni_Db
 * 
 * @copyright Copyright &copy; 2007, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: Mysql.php,v 1.1.2.4 2008/04/04 15:43:08 adamfranco Exp $
 */
class Harmoni_Db_Adapter_Pdo_Mysql
	extends Zend_Db_Adapter_Pdo_Mysql
{
	
	/**
	 * Creates and returns a new Zend_Db_Select object for this adapter.
	 * 
	 * @return Harmoni_Db_Select
	 * @access public
	 * @since 4/3/08
	 */
    public function select() {
        return new Harmoni_Db_Select($this);
    }
    
    /**
     * Updates table rows with specified data based on a WHERE clause.
     *
     * @param  mixed        $table The table to update.
     * @param  array        $bind  Column-value pairs.
     * @param  mixed        $where UPDATE WHERE clause(s).
     * @return int          The number of affected rows.
     */
    public function update($table = null, array $bind = null, $where = '') {
    	if (is_null($table) && is_null($bind) && !strlen($where))
    		return new Harmoni_Db_Update($this);
    	else
    		return parent::update($table, $bind, $where);
    }
    
    /**
     * Deletes table rows based on a WHERE clause.
     *
     * @param  mixed        $table The table to update.
     * @param  array        $bind  Column-value pairs.
     * @param  mixed        $where UPDATE WHERE clause(s).
     * @return int          The number of affected rows.
     */
	public function delete($table = null, $where = '') {
    	if (is_null($table) && !strlen($where))
    		return new Harmoni_Db_Delete($this);
    	else
    		return parent::delete($table, $where);
    }
    
    /**
     * Inserts a table row with specified data.
     *
     * @param mixed $table The table to insert data into.
     * @param array $bind Column-value pairs.
     * @return int The number of affected rows.
     */
    public function insert($table = null, array $bind = null) {
    	if (is_null($table) && is_null($bind))
    		return new Harmoni_Db_Insert($this);
    	else
    		return parent::insert($table, $bind);
    }
    
    /**
     * @var int $numPrepared; A counter for the number of statements prepared 
     * @access private
     * @since 4/4/08
     */
    private $numPrepared;
    
    /**
     * Prepares an SQL statement.
     *
     * @param string $sql The SQL statement with placeholders.
     * @param array $bind An array of data to bind to the placeholders.
     * @return PDOStatement
     */
    public function prepare($sql) {
		$this->_connect();
        $stmt = new Harmoni_Db_Statement_Pdo($this, $sql);
        $stmt->setFetchMode($this->_fetchMode);
        
        $this->numPrepared++;
        return $stmt;
    }
    
    /**
     * @var int $numExecuted; A counter for the number of statements executed 
     * @access private
     * @since 4/4/08
     */
    private $numExecuted;
    
    /**
     * Increment the execution counter. This should only be called by statements.
     * 
     * @return void
     * @access public
     * @since 4/4/08
     */
    public function incrementExecCounter () {
    	$this->numExecuted++;
    }

	/**
	 * Answer a statistics string.
	 *
	 * @return string
	 * @access public
	 * @since 4/4/08
	 */
	public function getStats () {
		return "Statements Prepared: ".$this->numPrepared
			." <br/>\nStatement Executions: ".$this->numExecuted;
	}
}

?>