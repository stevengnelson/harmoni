<?

require_once(OKI."dr.interface.php");

/**
 * The HarmoniAssetInterface provides all of the methods of
 * the DR OSID plus several that are meant to enhance usage in PHP, such
 * as the collecting of changes for later committing and the exposure of
 * the hierarchical nature of DRs used in Harmoni
 *
 * @package harmoni.osid_v1.dr
 * 
 * @copyright Copyright &copy; 2005, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: HarmoniAsset.interface.php,v 1.5 2005/01/19 22:28:05 adamfranco Exp $
 */

class HarmoniAssetInterface
	extends Asset 
{  // begin Asset

	/**
	 * Saves this object to persistable storage.
	 * @access protected
	 */
	function save () {
		die ("Method <b>".__FUNCTION__."()</b> declared in interface <b> ".__CLASS__."</b> has not been overloaded in a child class.");
	}
	 
	/**
	 * Loads this object from persistable storage.
	 * @access protected
	 */
	function load () {
		die ("Method <b>".__FUNCTION__."()</b> declared in interface <b> ".__CLASS__."</b> has not been overloaded in a child class.");
	}	

}  // end Asset

?>