<?php

require_once(HARMONI."GUIManager/StyleComponent.class.php");

/**
 * The ColorSC represents CSS color values. For efficiency reasons, constant 
 * color name values, i.e. "Blue", are not supported because there are just 
 * too many of them (nearly 200). The allowed formats are:
 * <ul style="font-family: monospace;">
 * 		<li> #RGB            - "#A48" (R,G,B are 0-F hexadecimal digits)</li>
 * 		<li> #RRGGBB         - "#AA4488" (R,G,B are 0-F hexadecimal digits)</li>
 * 		<li> rgb(R,G,B)      - "rgb(100, 20, 230)" (R,G,B are 0-255 decimals)</li>
 * 		<li> rgb(R%,G%,B%)   - "rgb(0%, 20.25%, 100%)" (R%,G%,B% are floating-point 0-100 percentages)</li>
 * </ul>
 * <br><br>
 * The <code>StyleComponent</code> (SC) is the most basic of the three building pieces
 * of CSS styles. It combines a CSS property value with a ValidatorRule to ensure that
 * the value follows a certain format.<br><br>
 * @version $Id: ColorSC.class.php,v 1.3 2004/08/09 02:58:36 dobomode Exp $
 * @package harmoni.gui.scs
 * @author Middlebury College, ETS
 * @copyright 2004 Middlebury College, ETS
 * @access public
 **/

class ColorSC extends StyleComponent {

	/**
	 * The constructor.
	 * @param string value The value to assign to this SC.
	 * @access public
	 **/
	function ColorSC($value) {
		$errDescription = "Could not validate the color StyleComponent value \"$value\". ";
		$errDescription .= "Allowed formats are: #RGB, #RRGGBB, rgb(R,G,B), and rgb(R%,G%,B%).";
		
		$rule =& new CSSColorValidatorRule();
		
		$displayName = "Color";
		$description = "Specifies the color using one of the following formats
		(R stands for Red, G stands for Green, and B stands for Blue):
		#RGB, #RRGGBB (R,G,B are 0-F hexadecimal digits), rgb(R,G,B) (R,G,B are
		0-255 decimals), rgb(R%,G%,B%) (R%,G%,B% are floating-point 0-100 percentages).";
		
		$this->StyleComponent($value, $rule, null, null, $errDescription, $displayName, $description);
	}
}

class CSSColorValidatorRule extends ValidatorRuleInterface {

	function check(& $val) {
		$regs = array();
		// check for #RGB and #RRGGBB format
		if (ereg("^#[0-9a-fA-F]{3}([0-9a-fA-F]{3})?$", $val))
			return true;
		// check for rgb(R,G,B) format
		if (ereg("^rgb\(([0-9]{0,3}),\ *([0-9]{0,3}),\ *([0-9]{0,3})\)$", $val, $regs)) {
			if (($regs[1] >= 0) && ($regs[1] <= 255) &&
				($regs[2] >= 0) && ($regs[2] <= 255) &&
				($regs[3] >= 0) && ($regs[3] <= 255))
				return true;
			else
				return false;
		}
		// check for rgb(R%,G%,B%) format
		if (ereg("^rgb\(([0-9]{0,3}(\.[0-9]+)?)%,\ *([0-9]{0,3}(\.[0-9]+)?)%,\ *([0-9]{0,3}(\.[0-9]+)?)%\)$",
		    $val, $regs)) {
			if (($regs[1] >= 0) && ($regs[1] <= 100) &&
				($regs[3] >= 0) && ($regs[3] <= 100) &&
				($regs[5] >= 0) && ($regs[5] <= 100))
				return true;
			else
				return false;
		}
		
		return false;
	}
}
?>