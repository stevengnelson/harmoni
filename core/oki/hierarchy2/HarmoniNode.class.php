<?

require_once(OKI."/hierarchy.interface.php");
require_once(HARMONI."oki/hierarchy2/HierarchyCache.class.php");
require_once(HARMONI."oki/hierarchy2/HarmoniNodeIterator.class.php");
require_once(HARMONI."oki/hierarchy2/tree/Tree.class.php");

/**
 * A Node is a Hierarchy's representation of an external object that is one of
 * a number of similar objects to be organized. Nodes must be connected to a
 * Hierarchy.
 * 
 * 
 * <p></p>
 *
 * @package harmoni.osid.hierarchy2
 * @author Adam Franco
 * @copyright 2004 Middlebury College
 * @access public
 * @version $Id: HarmoniNode.class.php,v 1.2 2004/05/12 22:31:42 dobomode Exp $
 *
 * @todo Replace JavaDoc with PHPDoc
 */

class HarmoniNode extends Node {


	/**
	 * The Id of this node.
	 * @attribute private object _id
	 */
	var $_id;
	
	
	/**
	 * The type of this node.
	 * @attribute private object _type
	 */
	var $_type;
	
	
	/**
	 * The description for this node.
	 * @var string $_description
	 */
	var $_description;
	

	/**
	 * The display name for this node.
	 * @var string $_displayName
	 */
	var $_displayName;
	

	/**
	 * The TreeNode object corresponding to this Node.
	 * @attribute private object _tn
	 */
	var $_tn;
	
	
	/**
	 * This is the HierarchyCache object. Must be the same
	 * one that all other nodes in the Hierarchy are using.
	 * @attribute private object _cache
	 */
	var $_cache;
	
	
	/**
	 * Constructor.
	 *
	 * @param ref object id The Id of this Node.
	 * @param ref object type The Type of the new Node.
	 * @param string displayName The displayName of the Node.
	 * @param string description The description of the Node.
	 * @param ref object cache This is the HierarchyCache object. Must be the same
	 * one that all other nodes in the Hierarchy are using.
	 */
	function HarmoniNode(& $id, & $type, $displayName, $description, & $cache) {
 		ArgumentValidator::validate($id, new ExtendsValidatorRule("Id"));
		ArgumentValidator::validate($type, new ExtendsValidatorRule("Type"));
 		ArgumentValidator::validate($displayName, new StringValidatorRule);
 		ArgumentValidator::validate($description, new StringValidatorRule);
		ArgumentValidator::validate($cache, new ExtendsValidatorRule("HierarchyCache"));
		
		// set the private variables
		$this->_id = $id;
		$this->_type =& $type;
		$this->_displayName = $displayName;
		$this->_description = $description;
		$this->_tn =& new TreeNode($id->getIdString());
		$this->_cache = $cache;
	}

	/**
	 * Get the unique Id for this Node.
	 *
	 * @return object osid.shared.Id A unique Id that is usually set by a create
	 *		   method's implementation
	 *
	 * @throws HierarchyException if there is a general failure.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function & getId() {
		return $this->_id;
	}

	/**
	 * Get the display name for this Node.
	 *
	 * @return String the display name
	 *
	 * @throws HierarchyException if there is a general failure.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function getDisplayName() {
		return $this->_displayName;
	}

	/**
	 * Get the description for this
	 *
	 * @return String the description
	 *
	 * @throws HierarchyException if there is a general failure.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function getDescription() {
		return $this->_description;
	}

	/**
	 * Get the Type for this Node.
	 *
	 * @return object osid.shared.Type
	 *
	 * @throws HierarchyException if there is a general failure.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function & getType() {
		return $this->_type;
	}

	/**
	 * Get the parents of this Node.  To get other ancestors use the Hierarchy
	 * traverse method.
	 *
	 * @return NodeIterator  Iterators return a set, one at a time.  The
	 *		   Iterator's hasNext method returns true if there are additional
	 *		   objects available; false otherwise.  The Iterator's next method
	 *		   returns the next object.  The order of the objects returned by
	 *		   the Iterator is not guaranteed.
	 *
	 * @throws HierarchyException if there is a general failure.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function & getParents() {
		$result =& new HarmoniNodeIterator($this->_parents);
		return $result;
	}

	/**
	 * Get the children of this Node.  To get other descendants use the
	 * Hierarchy traverse method.
	 *
	 * @return NodeIterator  Iterators return a set, one at a time.  The
	 *		   Iterator's hasNext method returns true if there are additional
	 *		   objects available; false otherwise.  The Iterator's next method
	 *		   returns the next object.  The order of the objects returned by
	 *		   the Iterator is not guaranteed.
	 *
	 * @throws HierarchyException if there is a general failure.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function & getChildren() {
		$idValue = $this->_id->getIdString();
	
		// see if the children have been cached, if yes just return them
		if ($this->_cache->_cachedChildren->nodeExists($idValue)) {
			$node =& $this->_cache->_cachedChildren->getNode($idValue);
			$result =& new HarmoniNodeIterator($node->getChildren());
		}
		// if children have not been cached, then do it!!
		else {
			$this->_cache->cacheChildren($this);
			$node =& $this->_cache->_cachedChildren->getNode($idValue);
			$result =& new HarmoniNodeIterator($node->getChildren());
		}

		return $result;
	}


	/**
	 * Update the description of this Node. The description of the new Node;
	 * description cannot be null, but may be empty.
	 *
	 * @throws HierarchyException if there is a general failure.	 Throws an
	 *		   exception with the message osid.OsidException.NULL_ARGUMENT if
	 *		   displayName is null.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function updateDescription($description) {
		// ** parameter validation
		$stringRule =& new StringValidatorRule();
		ArgumentValidator::validate($description, $stringRule, true);
		// ** end of parameter validation
		
		if ($this->_description == $description)
		    return; // nothing to update

		// update the object
		$this->_description = $description;

		// update the database
		$dbHandler =& Services::requireService("DBHandler");
		$db = $this->_cache->_sharedDB.".";
		
		$query =& new UpdateQuery();
		$query->setTable($db."node");
		$id =& $this->getId();
		$idValue = $id->getIdString();
		$where = "{$db}node.node_id = '{$idValue}'";
		$query->setWhere($where);
		$query->setColumns(array("{$db}node.node_description"));
		$query->setValues(array("'$description'"));
		
		$queryResult =& $dbHandler->query($query, $this->_cache->_dbIndex);
		if ($queryResult->getNumberOfRows() == 0)
			throwError(new Error("The node with Id: ".$idValue." does not exist in the database.","Hierarchy",true));
		if ($queryResult->getNumberOfRows() > 1)
			throwError(new Error("Multiple nodes with Id: ".$idValue." exist in the database. Note: their descriptions have been updated." ,"Hierarchy",true));
	}

	/**
	 * Update the name of this Node. Node name changes are permitted since the
	 * Hierarchy's integrity is based on the Node's unique Id. name The
	 * displayName of the new Node; displayName cannot be null, but may be
	 * empty.
	 *
	 * @throws HierarchyException if there is a general failure.	 Throws an
	 *		   exception with the message osid.OsidException.NULL_ARGUMENT if
	 *		   displayName is null.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function updateDisplayName($displayName) {
		// ** parameter validation
		$stringRule =& new StringValidatorRule();
		ArgumentValidator::validate($displayName, $stringRule, true);
		// ** end of parameter validation
		
		if ($this->_displayName == $displayName)
		    return; // nothing to update
		
		// update the object
		$this->_displayName = $displayName;

		// update the database
		$dbHandler =& Services::requireService("DBHandler");
		$db = $this->_cache->_sharedDB.".";
		
		$query =& new UpdateQuery();
		$query->setTable($db."node");
		$id =& $this->getId();
		$idValue = $id->getIdString();
		$where = "{$db}node.node_id = '{$idValue}'";
		$query->setWhere($where);
		$query->setColumns(array("{$db}node.node_display_name"));
		$query->setValues(array("'$displayName'"));
		
		$queryResult =& $dbHandler->query($query, $this->_cache->_dbIndex);
		if ($queryResult->getNumberOfRows() == 0)
			throwError(new Error("The node with Id: ".$idValue." does not exist in the database.","Hierarchy",true));
		if ($queryResult->getNumberOfRows() > 1)
			throwError(new Error("Multiple nodes with Id: ".$idValue." exist in the database. Note: their display names have been updated." ,"Hierarchy",true));
	}

	/**
	 * Return true if this Node is a leaf; false otherwise.  A Node is a leaf
	 * if it has no children.
	 *
	 * @return boolean
	 *
	 * @throws HierarchyException if there is a general failure.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function isLeaf() {
		// *********************************************
		// STUF HEREE !!!!@!#!!!
		// *********************************************
	}

	/**
	 * Return true if this Node is a root; false otherwise.  A Node is a root
	 * if it has no parents.
	 *
	 * @return boolean
	 *
	 * @throws HierarchyException if there is a general failure.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function isRoot() {
		// *********************************************
		// STUF HEREE !!!!@!#!!!
		// *********************************************
	}

	/**
	 * Link a parent to this Node.
	 *
	 * @param object osid.shared.Id parentId
	 *
	 * @throws HierarchyException if there is a general failure.	 Throws an
	 *		   exception with the message HierarchyException.UNKNOWN_NODE if
	 *		   there is no Node mathching parentId.  Throws an exception with
	 *		   the message HierarchyException.SINGLE_PARENT_HIERARCHY if the
	 *		   Hierarchy was created with allowsMultipleParents false and an
	 *		   attempt is made to add a Parent.  Throws and exception with the
	 *		   message HierarchyException.ALREADY_ADDED if the parent was
	 *		   already added.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function addParent(& $nodeId) {
		// *********************************************
		// STUF HEREE !!!!@!#!!!
		// *********************************************
	}

	/**
	 * Unlink a parent from this Node.
	 *
	 * @param object osid.shared.Id parentId
	 *
	 * @throws HierarchyException if there is a general failure.	 Throws an
	 *		   exception with the message HierarchyException.UNKNOWN_NODE if
	 *		   there is no Node mathching parentId.  Throws an exception with
	 *		   the message HierarchyException.SINGLE_PARENT_HIERARCHY if the
	 *		   Hierarchy was created with allowsMultipleParents false.  Throws
	 *		   an exception with the message
	 *		   HierarchyException.INCONSISTENT_STATE if the disconnection
	 *		   causes a state inconsistency.
	 *
	 * @todo Replace JavaDoc with PHPDoc
	 */
	function removeParent(& $parentId) {
		// *********************************************
		// STUF HEREE !!!!@!#!!!
		// *********************************************
	}

	/**
	 * Changes the parent of this Node by adding a new parent and removing the old parent.
	 * @param object oldParentId
	 * @param object newParentId
	 * @throws osid.hierarchy.HierarchyException An exception with one of the following messages defined in osid.hierarchy.HierarchyException may be thrown:  {@link HierarchyException#OPERATION_FAILED OPERATION_FAILED}, {@link HierarchyException#PERMISSION_DENIED PERMISSION_DENIED}, {@link HierarchyException#CONFIGURATION_ERROR CONFIGURATION_ERROR}, {@link HierarchyException#UNIMPLEMENTED UNIMPLEMENTED}, {@link HierarchyException#NULL_ARGUMENT NULL_ARGUMENT}, {@link HierarchyException#NODE_TYPE_NOT_FOUND NODE_TYPE_NOT_FOUND}, {@link HierarchyException#ATTEMPTED_RECURSION ATTEMPTED_RECURSION}
	 * @package harmoni.osid.hierarchy
	 */
	function changeParent(& $oldParentId, & $newParentId) { 
		// *********************************************
		// STUF HEREE !!!!@!#!!!
		// *********************************************
	}

}