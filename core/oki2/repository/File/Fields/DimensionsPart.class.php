<?
/**
 * @package harmoni.osid_v2.repository
 * 
 * @copyright Copyright &copy;2005, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * @version $Id: DimensionsPart.class.php,v 1.4 2005/10/14 20:41:16 cws-midd Exp $
 */
 
require_once(dirname(__FILE__)."/../getid3.getimagesize.php");

/**
 * The DimensionsPart attempts to extract height, width, and mime type info from
 * a file, in an array similar to that returned from GetImageSize() method. 
 * If the file is not an image and/or such information can not be determined, 
 * this part has a boolean value of false. 
 *
 * @package harmoni.osid_v2.repository
 * 
 * @copyright Copyright &copy;2005, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License
 *
 * @version $Id: DimensionsPart.class.php,v 1.4 2005/10/14 20:41:16 cws-midd Exp $
 */
class DimensionsPart 
	extends Part
{

	var $_recordId;
	var $_partStructure;
	var $_dimensions;
	
	function DimensionsPart( &$partStructure, &$recordId, &$configuration, &$record ) {
		$this->_recordId =& $recordId;
		$this->_partStructure =& $partStructure;
		$this->_configuration =& $configuration;
		$this->_record =& $record;
		
		// Set our dimensions to NULL, so that we can know if it has not been checked
		// for yet. If we search for info, but don't have any, or the dimensions is
		// an empty string, it will have value FALSE instead of NULL
		$this->_dimensions = NULL;
	}
	
	/**
	 * Get the unique Id for this Part.
	 *	
	 * @return object Id
	 * 
	 * @throws object RepositoryException An exception with one of
	 *		   the following messages defined in
	 *		   org.osid.repository.RepositoryException may be thrown: {@link
	 *		   org.osid.repository.RepositoryException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.repository.RepositoryException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.repository.RepositoryException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.repository.RepositoryException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getId() {
		$idManager =& Services::getService("Id");
		$partStructureId =& $this->_partStructure->getId();
		return $idManager->getId($this->_recordId->getIdString()
					."-".$partStructureId->getIdString());
	}

	/**
	 * Create a Part.  Records are composed of Parts. Parts can also contain
	 * other Parts.	 Each Record is associated with a specific RecordStructure
	 * and each Part is associated with a specific PartStructure.
	 * 
	 * @param object Id $partStructureId
	 * @param object mixed $value (original type: java.io.Serializable)
	 *	
	 * @return object Part
	 * 
	 * @throws object RepositoryException An exception with one of
	 *		   the following messages defined in
	 *		   org.osid.repository.RepositoryException may be thrown: {@link
	 *		   org.osid.repository.RepositoryException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.repository.RepositoryException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.repository.RepositoryException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.repository.RepositoryException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.repository.RepositoryException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.repository.RepositoryException#UNKNOWN_ID UNKNOWN_ID}
	 * 
	 * @access public
	 */
	function &createPart(& $partStructuretId, & $value) {
		throwError(
			new Error(UNIMPLEMENTED, "HarmoniPart", true));
	}

	/**
	 * Delete a Part and all its Parts.
	 * 
	 * @param object Id $partId
	 * 
	 * @throws object RepositoryException An exception with one of
	 *		   the following messages defined in
	 *		   org.osid.repository.RepositoryException may be thrown: {@link
	 *		   org.osid.repository.RepositoryException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.repository.RepositoryException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.repository.RepositoryException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.repository.RepositoryException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.repository.RepositoryException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.repository.RepositoryException#UNKNOWN_ID UNKNOWN_ID}
	 * 
	 * @access public
	 */
	function deletePart(& $partId) {
		throwError(
			new Error(RepositoryException::UNIMPLEMENTED(), "HarmoniPart", true));
	}

	/**
	 * Get all the Parts in this Part.	Iterators return a set, one at a time.
	 *	
	 * @return object PartIterator
	 * 
	 * @throws object RepositoryException An exception with one of
	 *		   the following messages defined in
	 *		   org.osid.repository.RepositoryException may be thrown: {@link
	 *		   org.osid.repository.RepositoryException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.repository.RepositoryException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.repository.RepositoryException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.repository.RepositoryException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getParts() {
		throwError(
			new Error(RepositoryException::UNIMPLEMENTED(), "HarmoniPart", true));
	}

	/**
	 * Get the value for this Part.
	 *	
	 * @return object mixed (original type: java.io.Serializable)
	 * 
	 * @throws object RepositoryException An exception with one of
	 *		   the following messages defined in
	 *		   org.osid.repository.RepositoryException may be thrown: {@link
	 *		   org.osid.repository.RepositoryException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.repository.RepositoryException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.repository.RepositoryException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.repository.RepositoryException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function getValue() {
		// If we don't have the dimensions, fetch the mime type and data and try to
		// populate the dimensions if appropriate.
		if ($this->_dimensions === NULL) {
			$dbHandler =& Services::getService("DatabaseManager");
			
			$query =& new SelectQuery;
			$query->addTable("dr_file");
			$query->addColumn("width");
			$query->addColumn("height");
			$query->addColumn("(height IS NOT NULL AND width IS NOT NULL)",
				"dimensions_exist");
			$query->addWhere("id = '".$this->_recordId->getIdString()."'");
			
			$result =& $dbHandler->query($query, 
				$this->_configuration->getProperty("database_index"));
			
			if ($result->getNumberOfRows() == 0) {
				$this->_dimensions = FALSE;
			} else if ($result->field("dimensions_exist") == false) {
				// Get the MIME type
				$idManager =& Services::getService("Id");
				$mimeTypeParts =& $this->_record->getPartsByPartStructure(
					$idManager->getId("MIME_TYPE"));
				$mimeTypePart =& $mimeTypeParts->next();
				$mimeType = $mimeTypePart->getValue();
				
				// Only try to get dimensions from image files
				if (ereg("^image.*$", $mimeType)) {					
					$dataParts =& $this->_record->getPartsByPartStructure(
						$idManager->getId("FILE_DATA"));
					$dataPart =& $dataParts->next();
					$this->_dimensions = 
						GetDataImageSize($dataPart->getValue());
					if (isset($this->_dimensions[2]))
						unset($this->_dimensions[2]);
					$this->updateValue($this->_dimensions);
				} else
					$this->_dimensions = FALSE;
			} else {
				$this->_width = $result->field("width");
				$this->_height = $result->field("height");
				$this->_dimensions = array($this->_width, $this->_height);
			}
			$result->free();
		}
		
		return $this->_dimensions;
	}

	/**
	 * Update the value for this Part.
	 * 
	 * @param object mixed $value (original type: java.io.Serializable)
	 * 
	 * @throws object RepositoryException An exception with one of
	 *		   the following messages defined in
	 *		   org.osid.repository.RepositoryException may be thrown: {@link
	 *		   org.osid.repository.RepositoryException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.repository.RepositoryException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.repository.RepositoryException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.repository.RepositoryException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.repository.RepositoryException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}
	 * 
	 * @access public
	 */
	function updateValue($value) {
		if (is_array($value)) {
			$this->_dimensions = $value;
			
			$dbHandler =& Services::getService("DatabaseManager");

			$query =& new SelectQuery;
			$query->addTable("dr_file");
			$query->addColumn("COUNT(*)", "count");
			$query->addWhere("id = '".$this->_recordId->getIdString()."'");
			
			$result =& $dbHandler->query($query, 
				$this->_configuration->getProperty("database_index"));
			
			if ($result->field("count") > 0) {
				$query =& new UpdateQuery;
				$query->setTable("dr_file");
				$query->setColumns(array("width", "height"));
				$query->setValues(array("'".$this->_dimensions[0]."'",
					"'".$this->_dimensions[1]."'"));
				$query->addWhere("id = '".$this->_recordId->getIdString()."'");
			} else {
				$query =& new InsertQuery;
				$query->setTable("dr_file");
				$query->setColumns(array("id", "width", "height"));
				$query->setValues(array("'".$this->_recordId->getIdString()."'",
					"'".$this->_dimensions[0]."'",
					"'".$this->_dimensions[1]."'"));
				$query->addWhere("id = '".$this->_recordId->getIdString()."'");
			}
			$result->free();
			
			$dbHandler->query($query, 
				$this->_configuration->getProperty("database_index"));
		}
	}

	/**
	 * Get the PartStructure associated with this Part.
	 *	
	 * @return object PartStructure
	 * 
	 * @throws object RepositoryException An exception with one of
	 *		   the following messages defined in
	 *		   org.osid.repository.RepositoryException may be thrown: {@link
	 *		   org.osid.repository.RepositoryException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.repository.RepositoryException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.repository.RepositoryException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.repository.RepositoryException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getPartStructure() {
		return $this->_partStructure;
	}
}
