<?php

require_once(HARMONI."/oki/shared/HarmoniIterator.class.php");
require_once(HARMONI."/themeHandler/Theme.interface.php");

/**
 * The abstract Theme class provides some fleshed out methods for easier
 * implimentation of themes.
 *
 * @package harmoni.themes
 * @version $Id: Theme.abstract.php,v 1.1 2004/03/03 22:00:53 adamfranco Exp $
 * @copyright 2004 
 **/

class Theme
	extends ThemeInterface {
	
	/**
	 * @access private
	 * @var string $_displayName The Display Name of this this Theme.
	 **/
	var $_displayName;
	
	/**
	 * @access private
	 * @var string $_description The description of this this Theme.
	 **/
	var $_description;
	
	/**
	 * @access private
	 * @var string $_pageTitle The title to output.
	 **/
	var $_pageTitle;
	
	/**
	 * @access private
	 * @var string $_headContent The string to print in the <head> section.
	 **/
	var $_headContent;
	
	/**
	 * @access private
	 * @var string $_headStyles The CSS styles to put between <style> tags 
	 * 		in the <head> section.
	 **/
	var $_headStyles;
	
	/**
	 * @access private
	 * @var string $_javaScript The javascript functions to put between <script> tags 
	 * 		in the <head> section.
	 **/
	var $_javaScript;
	
	/**
	 * @access private
	 * @var array $_settings An array of the Setting objects for this theme.
	 *		Note: Each element also has its own settings. These settings are for
	 *		non-element-specific settings.
	 **/
	var $_settings;
	
	
	// Sample Constructor
// 	function Theme () {
// 		// Set the Display Name:
// 		$this->_displayName = "Pretty Bubble Theme";
// 		
// 		// Set the Descripiton:
// 		$this->_description = "A pretty theme with bubbles.";
// 		
// 		// Initialise the other private variables:
// 		$this->_pageTitle = "";
// 		$this->_headContent = "";
// 		$this->_headStyles = "";
// 		$this->_javaScript = "";
// 		$this->_settings = array();
// 		$this->_menus = array();
// 		$this->_menuItems = array();
// 		$this->_menuHeadings = array();
// 		$this->_headings = array();
// 		$this->_footers = array();
// 		$this->_textBlocks = array();
// 	
// 		// Set up any Setting objects for this theme and add them to the settings
// 		// array.
// 		$this->_settings[] =& new PrettyBubble_BubbleSizeSetting;
// 		
// 		// Set up our widgets:
// 		// In this example there are two types of menus and one type of everything else.
// 		$this->_menus[] = new PrettyBubbleMenu1;
// 		$this->_menus[] = new PrettyBubbleMenu2;
// 		$this->_menuItems[] = new PrettyBubbleMenuItem1;
// 		$this->_menuItems[] = new PrettyBubbleMenuItem2;
// 		$this->_menuHeadings[] = new PrettyBubbleMenuHeading1;
// 		$this->_menuHeadings[] = new PrettyBubbleMenuHeading2;
// 		$this->_headings[] = new PrettyBubbleHeading1;
// 		$this->_footers[] = new PrettyBubbleFooter1;
// 		$this->_textBlocks[] = new PrettyBubbleTextBlock1;
// 	}

	// Constructor put here to prevent instantiation of this abstract class.
	function Theme () {
		die ("Can not instantiate abstract class <b> ".__CLASS__."</b>. Extend with a non-abstract child class and instantiate that instead."); 
	}

	/**
	 * Returns the DisplayName of this theme.
	 * @access public
	 * @return string The display name.
	 **/
	function getDisplayName () {
		return $this->_displayName;
	}
	
	/**
	 * Returns the Description of this theme.
	 * @access public
	 * @return string The Description name.
	 **/
	function getDescription () {
		return $this->_description;
	}
	
	/**
	 * Returns the ID of this theme.
	 * @access public
	 * @return object Id The ID of this theme.
	 **/
	function & getId () {
		$sharedManager =& Services::getService("Shared");
		return $sharedManager->getId(get_class($this));
	}

	/**
	 * Sets the page title to $title.
	 * @param string $title The page title.
	 * @access public
	 * @return void
	 **/
	function setPageTitle ( $title ) {
		ArgumentValidator::validate($title, new StringValidatorRule);
		
		$this->_pageTitle = $title;
	}
	
	/**
	 * Adds $contentString to the <pre><head>...</head></pre> (head) section of the page.
	 * @param string $content The content to add to the head section.
	 * @access public
	 * @return void
	 **/
	function addHeadContent ( $contentString ) {
		ArgumentValidator::validate($contentString, new StringValidatorRule);
		
		$this->_headContent .= "\n".$contentString;
	}
	
	/**
	 * Adds $styleString to the <pre><style>....</style></pre> (style) section of the head section of the page.
	 * @param string $styleString The style to add to the style section.
	 * @access public
	 * @return void
	 **/
	function addHeadStyle ( $styleString ) {
		ArgumentValidator::validate($styleString, new StringValidatorRule);
		
		$this->_headStyles .= "\n".$styleString;
	}
	
	/**
	 * Adds $javascriptString to the <pre><script ...>....</script></pre> (script) section of the head section of the page.
	 * @param string $javascriptString The javascript to add to the script section.
	 * @access public
	 * @return void
	 **/
	function addHeadJavascript ( $javascriptString ) {
		ArgumentValidator::validate($javascriptString, new StringValidatorRule);
		
		$this->_headJavascript .= "\n".$javascriptString;
	}
	
	/**
	 * Returns a HarmoniIterator object with this theme's ThemeSetting objects.
	 * @access public
	 * @see {@link ThemeInterface::setSettings}
	 * @return object HarmoniIterator An iterator of ThemeSetting objects
	 **/
	function & getSettings () {
		return new HarmoniIterator($this->_settings);
	}
	
	/**
	 * Returns if this theme supports changing settings or if its static.
	 * @access public
	 * @return boolean TRUE if this theme supports settings, FALSE otherwise.
	 **/
	function hasSettings () {
		if (count($this->_settings))
			return TRUE;
		else
			return FALSE;
	}
	
	/**
	 * Takes a {@link Layout} object and outputs a full HTML page with the layout's contents in the body section.
	 * @param ref object $layoutObj The {@link Layout} object.
	 * @access public
	 * @return void
	 **/
	function printPage (& $layoutObj) {
		die ("Method <b>".__FUNCTION__."()</b> declared in interface<b> ".__CLASS__."</b> has not been overloaded in a child class."); 
		
//		// Sample implimentation:
// 		print "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>";
// 		print "\n<html>";
// 		print "\n\t<head>";
// 
// 		print "\n\t\t<title>".$this->_pageTitle."</title>";
// 
// 		print "\n\t\t<style type='text/css'>";
// 		print $this->_getAllStyles();
// 		print "\n\t\t</style>";
// 		
// 		print "\n\t\t<script type='text/JavaScript'>";
// 		print $this->_headJavascript;
// 		print "\n\t\t</script>";
// 		
// 		print "\n\t</head>";
// 		print "\n\t<body>";
// 		
// 		$layout->output($this);
// 		
// 		print "\n\t</body>";
// 		print "\n</html>";
	}
	
	/**
	 * Combine the CSS styles for the theme and its widgets into a single string.
	 * @access protected
	 * @return string All of the CSS styles.
	 */
	function _getAllStyles() {
		$allStyles = $this->_headStyle;
		
		$allWidgets =& $this->_getAllWidgets();
		while ($allWidgets->hasNext()) {
			$widget =& $allWidgets->next();
			$allStyles .= $widget->getStyles();
		}
	}
	
	/**
	 * Returns an iterator of all widgets of all indices and classes.
	 * @access protected
	 * @return object HarmoniIterator All the widgets.
	 */
	function _getAllWidgets() {
		$allWidgets =& array_merge($this->_menus, 
									$this->_menuItems,
									$this->_menuHeadings,
									$this->_headings,
									$this->_footers,
									$this->_textBlocks);
		return new HarmoniIterator($allWidgets);
	}
	
/******************************************************************************
 * 	ThemeWidget access methods
 ******************************************************************************/

	/**
	 * Returns a ThemeWidget object with of the MenuThemeWidget class.
	 * @access public
	 * @param integer $index Which MenuThemeWidget to get. MenuThemeWidgets are 
	 *		indexed analogus to the HTML <h1>, <h2>, <h3>, etc headings where the
	 *		lower the index, the more "prominent" the look of the widget. Indices
	 *		start at 1 and go as high (in sequence; 1, 2, 3, etc) as the theme 
	 *		developer desires.
	 * @return object MenuThemeWidget A MenuThemeWidget object. If the requested
	 *		index is higher than the Theme supports, the MenuThemeWidget of the highest 
	 *		index availible is returned.
	 **/
	function & getMenu ( $index = 1 ) {
		if (count($this->_menus) >= $index)
			return $this->_menus[$index-1];
		else
			return $this->_menus[count($this->_menus)-1];
	}
	
	/**
	 * Returns an iterator of all ThemeWidget objects.
	 * @access public
	 * @return object ThemeWidgetIterator An iterator of all MenuThemeWidgets.
	 **/
	function & getMenus () {
		return new HarmoniIterator($this->_menus);
	}
	
	/**
	 * Returns a ThemeWidget object with of the MenuItemThemeWidget class.
	 * @access public
	 * @param integer $index Which MenuItemThemeWidget to get. MenuItemThemeWidgets are 
	 *		indexed analogus to the HTML <h1>, <h2>, <h3>, etc headings where the
	 *		lower the index, the more "prominent" the look of the widget. Indices
	 *		start at one and go as high (in sequence; 1, 2, 3, etc) as the theme 
	 *		developer desires.
	 * @return object MenuItemThemeWidget A MenuItemThemeWidget object. If the requested
	 *		index is higher than the Theme supports, the MenuItemThemeWidget of the highest 
	 *		index availible is returned.
	 **/
	function & getMenuItem ( $index = 1 ) {
		if (count($this->_menuItems) >= $index)
			return $this->_menuItems[$index-1];
		else
			return $this->_menuItems[count($this->_menuItems)-1];
	}
	
	/**
	 * Returns an iterator of all ThemeWidget objects.
	 * @access public
	 * @return object ThemeWidgetIterator An iterator of all MenuItemThemeWidgets.
	 **/
	function & getMenuItems () {
		return new HarmoniIterator($this->_menuItems);
	}
	
	/**
	 * Returns a ThemeWidget object with of the MenuHeadingThemeWidget class.
	 * @access public
	 * @param integer $index Which MenuHeadingThemeWidget to get. MenuHeadingThemeWidgets are 
	 *		indexed analogus to the HTML <h1>, <h2>, <h3>, etc headings where the
	 *		lower the index, the more "prominent" the look of the widget. Indices
	 *		start at one and go as high (in sequence; 1, 2, 3, etc) as the theme 
	 *		developer desires.
	 * @return object MenuHeadingThemeWidget A MenuHeadingThemeWidget object. If the requested
	 *		index is higher than the Theme supports, the MenuHeadingThemeWidget of the highest 
	 *		index availible is returned.
	 **/
	function & getMenuHeading ( $index = 1 ) {
		if (count($this->_menuHeadings) >= $index)
			return $this->_menuHeadings[$index-1];
		else
			return $this->_menuHeadings[count($this->_menuHeadings)-1];
	}
	
	/**
	 * Returns an iterator of all ThemeWidget objects.
	 * @access public
	 * @return object ThemeWidgetIterator An iterator of all MenuHeadingThemeWidgets.
	 **/
	function & getMenuHeadings () {
		return new HarmoniIterator($this->_menuHeadings);
	}
	
	/**
	 * Returns a ThemeWidget object with of the HeadingThemeWidget class.
	 * @access public
	 * @param integer $index Which HeadingThemeWidget to get. HeadingThemeWidgets are 
	 *		indexed analogus to the HTML <h1>, <h2>, <h3>, etc headings where the
	 *		lower the index, the more "prominent" the look of the widget. Indices
	 *		start at one and go as high (in sequence; 1, 2, 3, etc) as the theme 
	 *		developer desires.
	 * @return object HeadingThemeWidget A HeadingThemeWidget object. If the requested
	 *		index is higher than the Theme supports, the HeadingThemeWidget of the highest 
	 *		index availible is returned.
	 **/
	function & getHeading ( $index = 1 ) {
		if (count($this->_headings) >= $index)
			return $this->_headings[$index-1];
		else
			return $this->_headings[count($this->_headings)-1];
	}
	
	/**
	 * Returns an iterator of all ThemeWidget objects.
	 * @access public
	 * @return object ThemeWidgetIterator An iterator of all HeadingThemeWidgets.
	 **/
	function & getHeadings () {
		return new HarmoniIterator($this->_headings);
	}
	
	/**
	 * Returns a ThemeWidget object with of the FooterThemeWidget class.
	 * @access public
	 * @param integer $index Which FooterThemeWidget to get. FooterThemeWidgets are 
	 *		indexed analogus to the HTML <h1>, <h2>, <h3>, etc headings where the
	 *		lower the index, the more "prominent" the look of the widget. Indices
	 *		start at one and go as high (in sequence; 1, 2, 3, etc) as the theme 
	 *		developer desires.
	 * @return object FooterThemeWidget A FooterThemeWidget object. If the requested
	 *		index is higher than the Theme supports, the FooterThemeWidget of the highest 
	 *		index availible is returned.
	 **/
	function & getFooter ( $index = 1 ) {
		if (count($this->_footers) >= $index)
			return $this->_footers[$index-1];
		else
			return $this->_footers[count($this->_footers)-1];
	}
	
	/**
	 * Returns an iterator of all ThemeWidget objects.
	 * @access public
	 * @return object ThemeWidgetIterator An iterator of all FooterThemeWidgets.
	 **/
	function & getFooters () {
		return new HarmoniIterator($this->_footers);
	}
	
	/**
	 * Returns a ThemeWidget object with of the TextBlockThemeWidget class.
	 * @access public
	 * @param integer $index Which TextBlockThemeWidget to get. TextBlockThemeWidgets are 
	 *		indexed analogus to the HTML <h1>, <h2>, <h3>, etc headings where the
	 *		lower the index, the more "prominent" the look of the widget. Indices
	 *		start at one and go as high (in sequence; 1, 2, 3, etc) as the theme 
	 *		developer desires.
	 * @return object TextBlockThemeWidget A TextBlockThemeWidget object. If the requested
	 *		index is higher than the Theme supports, the TextBlockThemeWidget of the highest 
	 *		index availible is returned.
	 **/
	function & getTextBlock ( $index = 1 ) {
		if (count($this->_textBlocks) >= $index)
			return $this->_textBlocks[$index-1];
		else
			return $this->_textBlocks[count($this->_textBlocks)-1];
	}
	
	/**
	 * Returns an iterator of all ThemeWidget objects.
	 * @access public
	 * @return object ThemeWidgetIterator An iterator of all TextBlockThemeWidgets.
	 **/
	function & getTextBlocks () {
		return new HarmoniIterator($this->_textBlocks);
	}
}

?>