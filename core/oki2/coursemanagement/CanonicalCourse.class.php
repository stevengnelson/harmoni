<?php

require_once(OKI2."/osid/coursemanagement/CanonicalCourse.php");
require_once(HARMONI."oki2/coursemanagement/CanonicalCourseIterator.class.php");

/**
 * CanonicalCourse contains general information about a course.	 This is in
 * contrast to the CourseOffering which contains information about a concrete
 * offering of this course in a specific term and with identified people and
 * roles.  The CourseSection is the third and most specific course-related
 * object.	The section includes information about the location of the class
 * as well as the roster of students.  CanonicalCourses can contain other
 * CanonicalCourses and may be organized hierarchically, in schools,
 * departments, for majors, and so on.	For each CanonicalCourse, there are
 * zero or more offerings and for each offering, zero or more sections.	 All
 * three levels have separate data for Title, Number, Description, and Id.
 * This information can be the same or different as implementations choose and
 * applications require.
 * 
 * <p>
 * OSID Version: 2.0
 * </p>
 *
 * @package harmoni.osid_v2.coursemanagement
 * 
 * @copyright Copyright &copy; 2005, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: CanonicalCourse.class.php,v 1.13 2006/06/30 19:08:44 sporktim Exp $
 */
class HarmoniCanonicalCourse
	extends CanonicalCourse
{
	
	
	/**
	 * @variable object $_node the node in the hierarchy.
	 * @access private
	 * @variable object $_id the unique id for the canonical course.
	 * @access private
	 * @variable object $_table the canonical course table.
	 * @access private
	 **/
	var $_node;
	var $_id;
	var $_table;
	
	/**
	 * The constructor.
	 * 
	 * @param object Id $id
	 * @param object Node $node
	 * 
	 * @access public
	 * @return void
	 */
	function HarmoniCanonicalCourse($id, $node)
	{
		$this->_id = $id;
		$this->_node = $node;
		$this->_table = 'cm_offer';
		
	}
	

	/**
	 * Get the title for this CanonicalCourse.
	 *	
	 * @return string
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function getTitle () { 
	
		
			return $this->_getField('title');
	}

	/**
	 * Update the title for this CanonicalCourse.
	 * 
	 * @param string $title
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}
	 * 
	 * @access public
	 */
	function updateTitle ( $title ) { 

		$this->_setField('title',$title);
		
	}

	/**
	 * Get the number for this CanonicalCourse.
	 *	
	 * @return string
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function getNumber () {
		
		
		
		
		return $this->_getField('number');
	}

	/**
	 * Update the number for this CanonicalCourse.
	 * 
	 * @param string $number
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}
	 * 
	 * @access public
	 */
	function updateNumber ( $number ) { 
	
		
	$this->_setField('number',$number);
	
		
		
	}

	/**
	 * Get the description for this CanonicalCourse.  Returns null if no description exists
	 *	
	 * @return string
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function getDescription () { 
		return $this->_node->getDescription();
	}

	/**
	 * Update the description for this CanonicalCourse.
	 * 
	 * @param string $description
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}
	 * 
	 * @access public
	 */
	function updateDescription ( $description ) { 
		$this->_node->updateDescription($description);
	}
	
	/**
	 * Get the display name for this CanonicalCourse.
	 *	
	 * @return string
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function getDisplayName () {  
		return $this->_node->getDisplayName();
	} 
	
	/**
	 * Update the display name for this CanonicalCourse.
	 * 
	 * @param string $displayName
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}
	 * 
	 * @access public
	 */
	function updateDisplayName ( $displayName ) { 
		$this->_node->updateDisplayName($displayName);
	} 

	/**
	 * Get the unique Id for this CanonicalCourse.
	 *	
	 * @return object Id
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	 
	 
	function &getId () { 
		return $this->_id;
	}

	/**
	 * Get the Course Type for this CanonicalCourse.  This Type is meaningful
	 * to the implementation and applications and are not specified by the
	 * OSID.
	 *	
	 * @return object Type
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getCourseType () { 
		return $this->_getType('can');
	}

	/**
	 * Create a new CanonicalCourse.  The display name defaults to the title, but this can be changed later.
	 * 
	 * @param string $title
	 * @param string $number
	 * @param string $description
	 * @param object Type $courseType
	 * @param object Type $courseStatusType
	 * @param float $credits
	 *	
	 * @return object CanonicalCourse
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNKNOWN_TYPE
	 *		   UNKNOWN_TYPE}
	 * 
	 * @access public
	 */
	function &createCanonicalCourse ( $title, $number, $description, &$courseType, &$courseStatusType, $credits ) { 
	
		
		$idManager =& Services::getService("IdManager");
		$id=$idManager->createId();


		$type = new Type("CourseManagement","edu.middlebury", "CanonicalCourse");
		$node=$this->_hierarchy->createNode($id,$this->_id,$type,$title,$description);

		$dbManager=& Services::getService("DBHandler");
		$query=& new InsertQuery;

		$query->setTable('cm_can');

		$query->setColumns(array('id','number','credits','equivalent','fk_cm_can_type','title','fk_cm_can_stat_type'));

		$values[]="'".addslashes($id->getIdString())."'";
		$values[]="'".addslashes($number)."'";
		$values[]="'".addslashes($credits)."'";
		$values[]="'".addslashes($id->getIdString())."'";
		$values[]="'".$this->_typeToIndex('can',$courseType)."'";
		$values[]="'".addslashes($title)."'";
		$values[]="'".$this->_typeToIndex('can_stat',$courseStatusType)."'";
		$query->addRowOfValues($values);



		$dbManager->query($query);

		$ret =& new HarmoniCanonicalCourse($id, $node);
		return $ret;
	}

	/**
	 * Get all CanonicalCourses.
	 *	
	 * @return object CanonicalCourseIterator
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getCanonicalCourses () { 
		$cm = Services::getService("CourseManagement");
		return $cm->getCanonicalCourses ();
		
	}

	/**
	 * Get all CanonicalCourses of the specified Type.
	 * 
	 * @param object Type $courseType
	 *	
	 * @return object CanonicalCourseIterator
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNKNOWN_TYPE
	 *		   UNKNOWN_TYPE}
	 * 
	 * @access public
	 */
	function &getCanonicalCoursesByType ( &$courseType ) { 
		$cm = Services::getService("CourseManagement");
		return $cm->getCanonicalCoursesByType ($courseType);
	} 

	/**
	 * Create a new CourseOffering.  The default display name is the title of the course.
	 * 
	 * @param string $title
	 * @param string $number
	 * @param string $description
	 * @param object Id $termId
	 * @param object Type $offeringType
	 * @param object Type $offeringStatusType
	 * @param object Type $courseGradeType
	 *	
	 * @return object CourseOffering
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNKNOWN_TYPE
	 *		   UNKNOWN_TYPE}
	 * 
	 * @access public
	 */
	function &createCourseOffering ( $title, $number, $description, &$termId, &$offeringType, &$offeringStatusType, &$courseGradeType ) { 
		
		$idManager =& Services::getService("IdManager");
		$id=$idManager->createId();


		$type = new Type("CourseManagement","edu.middlebury", "CourseOffering");
		$node=$this->_hierarchy->createNode($id,$this->_id,$type,$title,$description);

		$dbManager=& Services::getService("DBHandler");
		$query=& new InsertQuery;

		$query->setTable('cm_offer');

		$query->setColumns(array('id','fk_cm_grade_type','fk_cm_term',
								'fk_cm_can_offer_type','fk_cm_offer_type','title','number'));

		$values[]="'".addslashes($id->getIdString())."'";
		$values[]="'".$this->_typeToIndex('grade',$courseGradeType)."'";
		$values[]="'".addslashes($termId->getIdString())."'";
		$values[]="'".$this->_typeToIndex('offer_stat',$offeringStatusType)."'";
		$values[]="'".$this->_typeToIndex('offer',$offeringType)."'";
		$values[]="'".addslashes($title)."'";
		$values[]="'".addslashes($number)."'";
		
		$query->addRowOfValues($values);

		$dbManager->query($query);

		$ret =& new HarmoniCourseOffering($id, $node);
		return $ret;

		
	} 
	
	/**
	 * Delete a CourseOffering.
	 * 
	 * @param object Id $courseOfferingId
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNKNOWN_ID
	 *		   UNKNOWN_ID}
	 * 
	 * @access public
	 */
	function deleteCourseOffering ( &$courseOfferingId ) { 
		$this->_hierarchy->deleteNode($canonicalCourseId);



		$dbHandler =& Services::getService("DBHandler");
		$query=& new DeleteQuery;


		$query->setTable('cm_can');

		$query->addWhere("id=".addslashes($canonicalCourseId->getIdString()));
		$dbHandler->query($query);
	} 

	/**
	 * Get all CourseOfferings that belong to this CanonicalCourse.
	 *	
	 * @return object CourseOfferingIterator
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getCourseOfferings () { 
		
/*
		$dbHandler =& Services::getService("DBHandler");
		$query=& new SelectQuery;


		$query->addTable('cm_offer');
		$query->addColumn('id');
		$res=& $dbHandler->query($query);

		$array = array();
		$idManager= & Services::getService("IdManager");
		$cm= & Services::getService("CourseManagement");
		while($res->hasMoreRows()){

			$row = $res->getCurrentRow();
			$res->advanceRow();
			$id =& $idManager->getId($row['id']);
			$array[] =& $cm->getCourseOffering($id);
			
		}
		$ret =& new  HarmoniCourseOfferingIterator($array);
		return $ret;*/
		
		$nodeIterator = $this->_node->getChildren();
		
		$array = array();
		$idManager= & Services::getService("IdManager");
		$cm= & Services::getService("CourseManagement");
		$typeIndex=$cm->_typeToIndex('offer',$sectionType);
		
		while($nodeIterator->hasNextNode()){
			$childNode = $nodeIterator->nextNode();
			$nodeType = $childNode->getType();
			if($nodeType->getKeyWord()!="CourseOffering"){
				continue;	
			}	
			$courseOffering = $cm->getCourseOffering($childNode->getId());			
			$array[] =& $courseOffering;
		}
		$ret =& new  HarmoniCourseOfferingIterator($array);
		return $ret;
	} 

	/**
	 * Get all CourseOfferings of the specified Type that belong to this CanonicalCourse.
	 * 
	 * @param object Type $offeringType
	 *	
	 * @return object CourseOfferingIterator
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNKNOWN_TYPE
	 *		   UNKNOWN_TYPE}
	 * 
	 * @access public
	 */
	function &getCourseOfferingsByType ( &$offeringType ) { 
	/*	$cm= & Services::getService("CourseManagement");
		$typeIndex=$cm->_typeToIndex('offer',$offeringType);

		$dbHandler =& Services::getService("DBHandler");
		$query=& new SelectQuery;


		$query->addTable('cm_offer');
		$query->addColumn('id');
		$query->addWhere("fk_cm_offer_type='".addslashes($typeIndex)."'");
		$res=& $dbHandler->query($query);

		$array = array();
		$idManager= & Services::getService("IdManager");

		while($res->hasMoreRows()){

			$row = $res->getCurrentRow();
			$res->advanceRow();
			$id =& $idManager->getId($row['id']);
			$array[] =& $cm->getCourseOffering($id);
			
		}
		$ret =& new  HarmoniCourseOfferingIterator($array);
		return $ret;*/
		$nodeIterator = $this->_node->getChildren();
		
		$array = array();
		$idManager= & Services::getService("IdManager");
		$cm= & Services::getService("CourseManagement");
		$typeIndex=$cm->_typeToIndex('offer',$sectionType);
		
		while($nodeIterator->hasNextNode()){
			$childNode = $nodeIterator->nextNode();
			$nodeType = $childNode->getType();
			if($nodeType->getKeyWord()!="CourseOffering"){
				continue;	
			}	
			$courseOffering = $cm->getCourseOffering($childNode->getId());
			if($typeIndex == $courseOffering->_getField('fk_cm_offer_type')){
				$array[] =& $courseOffering;
			}
		}
		$ret =& new  HarmoniCourseOfferingIterator($array);
		return $ret;

	} 

	/**
	 * Add an equivalent course which are for mapping courses across
	 * departments, schools, or institutions as well as for providing new
	 * courses that map to previous ones.  This can be used for
	 * cross-listening.	 Note that if course A is equivalent to course B it
	 * does not necessarily follow that course B is equivalent to course A.
	 * Course A could cover a superset of the mateiral in course B.
	 * 
	 * @param object Id $canonicalCourseId
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#ALREADY_ADDED
	 *		   ALREADY_ADDED}
	 * 
	 * @access public
	 */
	function addEquivalentCourse ( &$canonicalCourseId ) {
		//Courses are equivalent if they have the same id in the equivalent field
		//The id chosen is the lowest of the ids
		//getField()
		

		$cm =& Services::getService("CourseManagement");
		
		$course =& $cm->getCanononicalCourse($canonicalCourseId);
		$courseEquivalent =& $course->_getField('equivalent');
		$thisEquivalent =& $this->_getField('equivalent');
		$comp = strcasecmp($courseEquivalent,$thisEquivalent);
		if($comp==0){
			return;	
		} elseif ($comp > 0){
			$min = $thisEquivalent;
			$courseIterator =& $course->getEquivalentCourses();
			
		}else{
			$min = $courseEquivalent;
			$courseIterator =& $this->getEquivalentCourses();
			
		}
		while($courseIterator->hasNextCanonicalCourse()){
			$course = $courseIterator->nextCanonicalCourse();
			$course->_setField('equivalent', $min);
		}
	
	} 

	/**
	 * Assures that the course passed in as a parameter is no longer 
	 * equivalent to any other courses.  It does not matter which course 
	 * calls the function.  In fact, it may make the most sense for courses to
	 * call the function on themselves.
	 * 
	 * @param object Id $canonicalCourseId
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNKNOWN_ID
	 *		   UNKNOWN_ID}
	 * 
	 * @access public
	 */
	function removeEquivalentCourse ( &$canonicalCourseId ) { 
		$dbHandler =& Services::getService("DBHandler");
		$cm =& Services::getService("CourseManagement");
		
		$course =& $cm->getCanononicalCourse($canonicalCourseId);		
		$courseEquivalent =& $course->_getField('equivalent');
		$idString=$canonicalCourseId->getIdString();
		if($courseEquivalent!=$idString){
			$course->_setField('equivalent',$idString);
			return;
		}
		
		while($courseIterator->hasNextCanonicalCourse()){
			$course = $courseIterator->nextCanonicalCourse();
			$course->_setField('equivalent', $min);
		}
		
		/*
		$thisEquivalent =& $this->_getField('equivalent');
		$comp = strcasecmp($courseEquivalent,$thisEquivalent);
		if($comp==0){
			return;	
		} elseif ($comp > 0){
			$min = $thisEquivalent;
			$max = $courseEquivalent;
		}else{
			$min = $courseEquivalent;
			$max = $thisEquivalent;
			
		}*/
		
		
		$query=& new SelectQuery;
		$query->addTable($this->_table);
		$query->addColumn('id');
		$query->addWhere("equivalent = '".$max."'");
		$res=& $dbHandler->query($query);
		while($res->hasMoreRows()){
			$row = $res->getCurrentRow();
			$res->advanceRow();
			$course = $cm->getCanonicalCourse($row['id']);
			$course->_setField('equivalent', $min);
		}
		
	} 

	/**
	 * Get all equivalent courses for this CanonicalCourse.
	 *	
	 * @return object CanonicalCourseIterator
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getEquivalentCourses () { 
		
		$dbHandler =& Services::getService("DBHandler");
		$cm =& Services::getService("CourseManagement");
		$query=& new SelectQuery;
		$query->addTable($this->_table);
		$query->addColumn('id');
		$query->addWhere("equivalent ='".$this->_getField('equivalent')."'");
		$res=& $dbHandler->query($query);
		$array=array();
		while($res->hasMoreRows()){
			$row = $res->getCurrentRow();
			$res->advanceRow();
			$array[] = $cm->getCanonicalCourse($row['id']);
		}
		return new HarmoniCanonicalCourseIterator($array);
	} 

	/**
	 * Add a Topic for this CanonicalCourse.
	 * 
	 * @param string $topic
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#ALREADY_ADDED
	 *		   ALREADY_ADDED}
	 * 
	 * @access public
	 */
	function addTopic ( $topic ) { 
		throwError(new Error(CourseManagementExeption::UNIMPLEMENTED(), "CanonicalCourse", true)); 
	} 

	/**
	 * Remove a Topic for this CanonicalCourse.
	 * 
	 * @param string $topic
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}
	 * 
	 * @access public
	 */
	function removeTopic ( $topic ) { 
		throwError(new Error(CourseManagementExeption::UNIMPLEMENTED(), "CanonicalCourse", true)); 
	} 

	/**
	 * Get all Topics for this CanonicalCourse.
	 *	
	 * @return object StringIterator
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getTopics () { 
		throwError(new Error(CourseManagementExeption::UNIMPLEMENTED(), "CanonicalCourse", true)); 
	} 

	/**
	 * Get the credits for this CanonicalCourse.
	 *	
	 * @return float
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function getCredits () { 
		
		return $this->_getField('credits');
	} 

	/**
	 * Update the credits for this CanonicalCourse.
	 * 
	 * @param float $credits
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}
	 * 
	 * @access public
	 */
	function updateCredits ( $credits ) { 
		$this->_setField('credits',$credits);
	
	} 

	/**
	 * Get the Status for this CanonicalCourse.
	 *	
	 * @return object Type
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getStatus () { 
		return $this->_getType('can_stat');
		
	
	} 

	/**
	 * Update the Status for this CanonicalCourse.
	 * 
	 * @param object Type $statusType
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#NULL_ARGUMENT
	 *		   NULL_ARGUMENT}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNKNOWN_TYPE
	 *		   UNKNOWN_TYPE}
	 * 
	 * @access public
	 */
	function updateStatus ( &$statusType ) { 

		$index =& $this->_typeToIndex('can_stat',$statusType);
		$this->_setField('title',$index);
	} 
	
	/**
	 * Get all the Property Types for  CanonicalCourse.
	 *	
	 * @return object TypeIterator
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getPropertyTypes () { 
		throwError(new Error(CourseManagementExeption::UNIMPLEMENTED(), "CanonicalCourse", true)); 
	} 

	/**
	 * Get the Properties associated with this CanonicalCourse.
	 *	
	 * @return object PropertiesIterator
	 * 
	 * @throws object CourseManagementException An exception
	 *		   with one of the following messages defined in
	 *		   org.osid.coursemanagement.CourseManagementException may be
	 *		   thrown:	{@link
	 *		   org.osid.coursemanagement.CourseManagementException#OPERATION_FAILED
	 *		   OPERATION_FAILED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#PERMISSION_DENIED
	 *		   PERMISSION_DENIED}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#CONFIGURATION_ERROR
	 *		   CONFIGURATION_ERROR}, {@link
	 *		   org.osid.coursemanagement.CourseManagementException#UNIMPLEMENTED
	 *		   UNIMPLEMENTED}
	 * 
	 * @access public
	 */
	function &getProperties () { 
		throwError(new Error(CourseManagementExeption::UNIMPLEMENTED(), "CanonicalCourse", true)); 
	} 
	
	
	
	
	function _typeToIndex($typename, &$type)
	{	
		$cm=Services::getService("CourseManagement");
		return $cm->_typeToIndex($typename, $type);
	}
	
	function &_getTypes($typename)
	{	
		$cm=Services::getService("CourseManagement");
		return $cm->_getTypes($typename);
	}
	
	function _getField($key)
	{
		$cm=Services::getService("CourseManagement");
		return $cm->_getField($this->_id,$this->_table,$key);
	}
	
	
	function &_getType($typename){
		$cm=Services::getService("CourseManagement");
		return $cm->_getType($this->_id,$this->_table,$typename);
	}
	
	function _setField($key, $value)
	{
		$cm=Services::getService("CourseManagement");
		return $cm->_setField($this->_id,$this->_table,$key, $value);		
	}
	
	
	
	
	
	
}

?>