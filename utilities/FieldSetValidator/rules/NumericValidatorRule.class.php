<?php

require_once("ValidatorRule.interface.php");

/**
 * the NumericValidatorRule checks a given value to make sure it's numeric
 *
 * @version $Id: NumericValidatorRule.class.php,v 1.1 2003/06/22 23:06:56 gabeschine Exp $
 * @copyright 2003 
 * @package harmoni.utilities.FieldSetValidator
 **/
 
class NumericValidatorRule
	extends ValidatorRuleInterface 
{
	/**
	 * checks a given value to make sure it's numeric
	 * @param mixed $val the value to check
	 * @access public
	 * @return boolean true if the value is numeric, false if it is not
	 **/
	function check( & $val ) {
		return is_numeric($val);
	}
}

?>