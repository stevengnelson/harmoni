<?php

require_once(HARMONI."GUIManager/StyleProperty.class.php");
require_once(HARMONI."GUIManager/StyleComponents/DirectionSC.class.php");

/**
 * The DirectionSP represents the 'direction' StyleProperty.
 * 
 * A StyleProperty (SP) is one of the tree building pieces of CSS styles. It stores 
 * information about a single CSS style property by storing one or more 
 * <code>StyleComponents</code>.
 * 
 * The other two CSS styles building pieces are <code>StyleComponents</code> and
 * <code>StyleCollections</code>. 
 
 * @version $Id: DirectionSP.class.php,v 1.1 2004/07/19 23:59:51 dobomode Exp $
 * @package harmoni.gui.sps
 * @author Middlebury College, ETS
 * @copyright 2004 Middlebury College, ETS
 * @access public
 **/

class DirectionSP extends StyleProperty {

	/**
	 * The constructor.
	 * @access public
	 * @param string value The value of the direction property.
	 **/
	function DirectionSP($value) {
		$this->StyleProperty("direction", "Direction", "This property specifies the text direction.");
		$this->addSC(new DirectionSC($value));
	}

}

?>