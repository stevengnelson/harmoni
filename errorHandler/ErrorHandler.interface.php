<?php

/**
 * An interface for an ErrorHandler. The ErrorHandler captures and stores errors for later
 * printout and halts execution on fatal errors.
 *
 * @version $Id: ErrorHandler.interface.php,v 1.1 2003/06/24 20:53:28 gabeschine Exp $
 * @package harmoni.errorhandler
 * @copyright 2003 
 **/

class ErrorHandlerInterface{
    
    /**
     * Adds an Error object to the queue.
     * Adds an Error object to the queue. If the error passed is fatal, then all the 
     * errors in the queue are outputed and the execution of the script is halted.
     *
     * @param object Error An error object to be added to the queue.
     * @access public
     */
    function addError(& $error){ die ("Method <b>".__FUNCTION__."()</b> declared in interface<b> ".__CLASS__."</b> has not been overloaded in a child class."); }

	/**
	 * Create a new Error object based on input and add it to the queue.
	 * Create a new Error object based on input and add it to the queue.
	 * Same as addError(new Error($description,$type,$isFatal))
	 * if isFatal is true then all the errors in the queue should be 
	 * outputed and execution of the script halted. 
	 *
	 * @param string $description Description of the error.
	 * @param string $type Type of the error.
	 * @param boolean $isFatal The scipt should be halted if this is True.
	 * @return object Error Reference to the error object that was created.
	 * @access public
	 */
    function addNewError($description,$type = "",$isFatal){ die ("Method <b>".__FUNCTION__."()</b> declared in interface<b> ".__CLASS__."</b> has not been overloaded in a child class."); }

    /**
     * Ouput the errors.
     * Ouput the errors.
     * @return string A string describing all the errors.
     * @access public
     */
    function outputErrors(){ die ("Method <b>".__FUNCTION__."()</b> declared in interface<b> ".__CLASS__."</b> has not been overloaded in a child class."); }

    /**
     * Gets the total number of errors that have occured so far.
     * Gets the total number of errors that have occured so far.
     * @return integer The number of errors that are currently in the queue.
     * @access public
     */
    function getNumberOfErrors(){ die ("Method <b>".__FUNCTION__."()</b> declared in interface<b> ".__CLASS__."</b> has not been overloaded in a child class."); }

}


?>