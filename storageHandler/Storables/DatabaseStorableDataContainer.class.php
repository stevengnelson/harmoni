<?php

require_once(HARMONI . "utilities/DataContainer.abstract.php");

/**
 * The DatabaseStorableDataContainer stores several arguments that will be passed
 * to the constructor of a DatabaseStorable object.
 * 
 * @package harmoni.storageHandler.storables
 * @version $Id: DatabaseStorableDataContainer.class.php,v 1.1 2003/07/03 01:34:14 dobomode Exp $
 * @copyright 2003
 */

class DatabaseStorableDataContainer extends DataContainer {

    /**
     * Constructor -- sets up the allowed fields for this kind of {@link DataContainer}
     * 
     * @see {@link DatabaseStorable}
     * @see {@link DataContainer}
     * @access public
     */
    function DatabaseStorableDataContainer()
    { 
        // initialize the data container
        $this -> init(); 
		
        // add the fields we want to allow
		$stringValidatorRule =& new StringValidatorRule();
		$this -> add("dbIndex", new IntegerValidatorRule());
		$this -> add("dbName", $stringValidatorRule);
		$this -> add("dbTable", $stringValidatorRule);
		$this -> add("pathColumn", $stringValidatorRule);
		$this -> add("nameColumn", $stringValidatorRule);
		$this -> add("sizeColumn", $stringValidatorRule);
		$this -> add("dataColumn", $stringValidatorRule);
    } 
} 

?>