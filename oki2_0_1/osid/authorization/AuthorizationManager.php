<?php 
 
include_once(dirname(__FILE__)."/../OsidManager.php");
/**
 * AuthorizationManager allows an application to create Authorizations, get
 * Authorizations given selection criterias, ask questions of Authorization
 * such as what agentId can do a Function in a Qualifier context, etc.
 * 
 * <p>
 * The primary objects in Authorization are Authorization, Function, agentId,
 * and Qualifier. There are also Function and Qualifier types that are
 * understood by the implementation.
 * </p>
 * 
 * <p>
 * Ids in Authorization are externally defined and their uniqueness is enforced
 * by the implementation.
 * </p>
 * 
 * <p>
 * There are two methods to create Authorizations. One method uses agentId,
 * Function, and Qualifier.  The other adds effective date and expiration
 * date.  For the method without the dates, the effective date is today and
 * there is no expiration date.
 * </p>
 * 
 * <p>
 * All implementations of OsidManager (manager) provide methods for accessing
 * and manipulating the various objects defined in the OSID package. A manager
 * defines an implementation of an OSID. All other OSID objects come either
 * directly or indirectly from the manager. New instances of the OSID objects
 * are created either directly or indirectly by the manager.  Because the OSID
 * objects are defined using interfaces, create methods must be used instead
 * of the new operator to create instances of the OSID objects. Create methods
 * are used both to instantiate and persist OSID objects.  Using the
 * OsidManager class to define an OSID's implementation allows the application
 * to change OSID implementations by changing the OsidManager package name
 * used to load an implementation. Applications developed using managers
 * permit OSID implementation substitution without changing the application
 * source code. As with all managers, use the OsidLoader to load an
 * implementation of this interface.
 * </p>
 * 
 * <p></p>
 * 
 * <p>
 * OSID Version: 2.0
 * </p>
 * 
 * <p>
 * Licensed under the {@link org.osid.SidImplementationLicenseMIT MIT
 * O.K.I&#46; OSID Definition License}.
 * </p>
 * 
 * @package org.osid.authorization
 */
interface AuthorizationManager
    extends OsidManager
{
    /**
     * Creates a new Authorization for an Agent performing a Function with a
     * Qualifier.
     * 
     * @param object Id $agentId
     * @param object Id $functionId
     * @param object Id $qualifierId
     * @param int $effectiveDate
     * @param int $expirationDate
     *  
     * @return object Authorization
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}, {@link
     *         org.osid.authorization.AuthorizationException#EFFECTIVE_PRECEDE_EXPIRATION}
     * 
     * @access public
     */
    public function createDatedAuthorization ( Id $agentId, Id $functionId, Id $qualifierId, $effectiveDate, $expirationDate ); 

    /**
     * Creates a new Authorization for a Agent performing a Function with a
     * Qualifier. Uses current date/time as the effectiveDate and doesn't set
     * an expiration date.
     * 
     * @param object Id $agentId
     * @param object Id $functionId
     * @param object Id $qualifierId
     *  
     * @return object Authorization
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function createAuthorization ( Id $agentId, Id $functionId, Id $qualifierId ); 

    /**
     * Ids in Authorization are externally defined and their uniqueness is
     * enforced by the implementation.
     * 
     * @param object Id $functionId
     * @param string $displayName
     * @param string $description
     * @param object Type $functionType
     * @param object Id $qualifierHierarchyId
     *  
     * @return object Function
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function createFunction ( Id $functionId, $displayName, $description, Type $functionType, Id $qualifierHierarchyId ); 

    /**
     * Creates a new Qualifier in the Authorization Service that has no parent.
     * This is different from making a new instance of a Qualifier object
     * locally as the Qualifier will be inserted into the Authorization
     * Service.
     * 
     * @param object Id $qualifierId
     * @param string $displayName
     * @param string $description
     * @param object Type $qualifierType
     * @param object Id $qualifierHierarchyId
     *  
     * @return object Qualifier
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_TYPE
     *         UNKNOWN_TYPE}
     * 
     * @access public
     */
    public function createRootQualifier ( Id $qualifierId, $displayName, $description, Type $qualifierType, Id $qualifierHierarchyId ); 

    /**
     * Ids in Authorization are externally defined and their uniqueness is
     * enforced by the implementation. Creates a new Qualifier in the
     * Authorization Service. This is different than making a new instance of
     * a Qualifier object locally as the Qualifier will be inserted into the
     * Authorization Service.
     * 
     * @param object Id $qualifierId
     * @param string $displayName
     * @param string $description
     * @param object Type $qualifierType
     * @param object Id $parentId
     *  
     * @return object Qualifier
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_TYPE
     *         UNKNOWN_TYPE}
     * 
     * @access public
     */
    public function createQualifier ( Id $qualifierId, $displayName, $description, Type $qualifierType, Id $parentId ); 

    /**
     * Deletes an existing Authorization.
     * 
     * @param object Authorization $authorization
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function deleteAuthorization ( Authorization $authorization ); 

    /**
     * Delete a Function by Id.
     * 
     * @param object Id $functionId
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function deleteFunction ( Id $functionId ); 

    /**
     * Delete a Qualifier by Id.  The last root Qualifier cannot be deleted.
     * 
     * @param object Id $qualifierId
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}, {@link
     *         org.osid.authorization.AuthorizationException#CANNOT_DELETE_LAST_ROOT_QUALIFIER
     *         CANNOT_DELETE_LAST_ROOT_QUALIFIER}
     * 
     * @access public
     */
    public function deleteQualifier ( Id $qualifierId ); 

    /**
     * Given an agentId, functionId, and qualifierId returns true if the Agent
     * is authorized now to perform the Function with the Qualifier.
     * 
     * @param object Id $agentId
     * @param object Id $functionId
     * @param object Id $qualifierId
     *  
     * @return boolean
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function isAuthorized ( Id $agentId, Id $functionId, Id $qualifierId ); 

    /**
     * Given a functionId and qualifierId returns true if the user is
     * authorized now to perform the Function with the Qualifier.
     * 
     * @param object Id $functionId
     * @param object Id $qualifierId
     *  
     * @return boolean
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function isUserAuthorized ( Id $functionId, Id $qualifierId ); 

    /**
     * Get all the FunctionTypes supported by the Authorization implementation.
     *  
     * @return object TypeIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function getFunctionTypes (); 

    /**
     * Get all the Functions of the specified Type.
     * 
     * @param object Type $functionType
     *  
     * @return object FunctionIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_TYPE
     *         UNKNOWN_TYPE}
     * 
     * @access public
     */
    public function getFunctions ( Type $functionType ); 

    /**
     * 
     * 
     * @param object Id $functionId
     *  
     * @return object Function
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function getFunction ( Id $functionId ); 

    /**
     * Return true if the agentId exists in the Authorization Service; false
     * otherwise.  This is not asking if there are any Authorizations that
     * reference this agentId.  This is not asking if the agentId is known to
     * the Agent OSID.
     * 
     * @param object Id $agentId
     *  
     * @return boolean
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function agentExists ( Id $agentId ); 

    /**
     * Get all the QualifierTypes supported by the Authorization
     * implementation.
     *  
     * @return object TypeIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function getQualifierTypes (); 

    /**
     * Given a hierarchyId, returns the Qualifiers at the root of the specified
     * Hierarchy.
     * 
     * @param object Id $qualifierHierarchyId
     *  
     * @return object QualifierIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_TYPE
     *         UNKNOWN_TYPE}
     * 
     * @access public
     */
    public function getRootQualifiers ( Id $qualifierHierarchyId ); 

    /**
     * Given an existing qualifierId returns the Ids of its child Qualifiers.
     * 
     * @param object Id $qualifierId
     *  
     * @return object QualifierIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function getQualifierChildren ( Id $qualifierId ); 

    /**
     * Given an existing qualifierId returns the Ids of all descendants
     * including its child Qualifiers.
     * 
     * @param object Id $qualifierId
     *  
     * @return object QualifierIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function getQualifierDescendants ( Id $qualifierId ); 

    /**
     * 
     * 
     * @param object Id $qualifierId
     *  
     * @return object Qualifier
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function getQualifier ( Id $qualifierId ); 

    /**
     * Given a functionId and a qualifierId returns the Ids of all Agents
     * allowed to do the Function with the Qualifier.  A null qualifierId is
     * treated as a wildcard.
     * 
     * @param object Id $functionId
     * @param object Id $qualifierId
     *  
     * @return object IdIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function getWhoCanDo ( Id $functionId = null, Id $qualifierId = null ); 

    /**
     * Given a functionId and qualifierId (one must be non-null) returns the
     * matching user Authorizations.  Explicit Authorizations can be
     * modified..  Any null argument will be treated as a wildcard.
     * 
     * @param object Id $functionId
     * @param object Id $qualifierId
     * @param boolean $isActiveNowOnly
     *  
     * @return object AuthorizationIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function getExplicitUserAZs ( Id $functionId = null, Id $qualifierId = null, $isActiveNowOnly = true ); 

    /**
     * Given a FunctionType and qualifierId returns the matching user
     * Authorizations. The Authorizations must be for Functions within the
     * given FunctionType. Explicit Authorizations can be modified.  Any null
     * argument will be treated as a wildcard.
     * 
     * @param object Type $functionType
     * @param object Id $qualifierId
     * @param boolean $isActiveNowOnly
     *  
     * @return object AuthorizationIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_TYPE
     *         UNKNOWN_TYPE}
     * 
     * @access public
     */
    public function getExplicitUserAZsByFuncType ( Type $functionType = null, Id $qualifierId = null, $isActiveNowOnly = true ); 

    /**
     * Given an implicit returns the matching explicit user Authorizations.
     * Explicit Authorizations can be modified.  A null argument will be
     * treated as a wildcard.
     * 
     * @param object Authorization $implicitAuthorization
     *  
     * @return object AuthorizationIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_TYPE
     *         UNKNOWN_TYPE}
     * 
     * @access public
     */
    public function getExplicitUserAZsForImplicitAZ ( Authorization $implicitAuthorization ); 

    /**
     * Given a functionId and a qualifierId returns all Authorizations that
     * would allow the user to do the Function with the Qualifier. This method
     * differs from the simple form of getAuthorizations in that this method
     * looks for any Authorization that permits doing the Function with the
     * Qualifier even if the Authorization's Qualifier happens to be a parent
     * of this Qualifier argument.
     * 
     * @param object Id $functionId
     * @param object Id $qualifierId
     * @param boolean $isActiveNowOnly
     *  
     * @return object AuthorizationIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function getAllUserAZs ( Id $functionId, Id $qualifierId, $isActiveNowOnly ); 

    /**
     * Given a FunctionType and a qualifierId returns all Authorizations that
     * would allow the user to do Functions in the FunctionType with the
     * Qualifier. This method differs from getAuthorizations in that this
     * method looks for any Authorization that permits doing the Function with
     * the Qualifier even if the Authorization's Qualifier happens to be a
     * parent of the Qualifier argument.
     * 
     * @param object Type $functionType
     * @param object Id $qualifierId
     * @param boolean $isActiveNowOnly
     *  
     * @return object AuthorizationIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_TYPE
     *         UNKNOWN_TYPE}
     * 
     * @access public
     */
    public function getAllUserAZsByFuncType ( Type $functionType, Id $qualifierId, $isActiveNowOnly ); 

    /**
     * Given a agentId, a functionId, and a qualifierId (at least one of these
     * must be non-null) returns the matching Authorizations.  Explicit
     * Authorizations can be modified.  Any null argument will be treated as a
     * wildcard.
     * 
     * @param object Id $agentId
     * @param object Id $functionId
     * @param object Id $qualifierId
     * @param boolean $isActiveNowOnly
     *  
     * @return object AuthorizationIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function getExplicitAZs ( Id $agentId = null, Id $functionId = null, Id $qualifierId = null, $isActiveNowOnly = true ); 

    /**
     * Given a agentId, a FunctionType, and a qualifierId (either agentId or
     * qualifierId must be non-null) returns the matching Authorizations. The
     * Authorizations must be for Functions within the given FunctionType.
     * Explicit Authorizations can be modified.  Any null argument will be
     * treated as a wildcard.
     * 
     * @param object Id $agentId
     * @param object Type $functionType
     * @param object Id $qualifierId
     * @param boolean $isActiveNowOnly
     *  
     * @return object AuthorizationIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_TYPE
     *         UNKNOWN_TYPE}
     * 
     * @access public
     */
    public function getExplicitAZsByFuncType ( Id $agentId = null, Type $functionType = null, Id $qualifierId = null, $isActiveNowOnly = true ); 

    /**
     * Given a functionId and a qualifierId returns all Authorizations that
     * would allow agents to do the Function with the Qualifier. This method
     * differs from the simple form of getAuthorizations in that this method
     * looks for any Authorization that permits doing the Function with the
     * Qualifier even if the Authorization's Qualifier happens to be a parent
     * of this Qualifier argument.
     * 
     * @param object Id $agentId
     * @param object Id $functionId
     * @param object Id $qualifierId
     * @param boolean $isActiveNowOnly
     *  
     * @return object AuthorizationIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}
     * 
     * @access public
     */
    public function getAllAZs ( Id $agentId = null, Id $functionId = null, Id $qualifierId = null, $isActiveNowOnly = true ); 

    /**
     * Given a FunctionType and a qualifierId returns all Authorizations that
     * would allow Agents to do Functions in the FunctionType with the
     * Qualifier. This method differs from getAuthorizations in that this
     * method looks for any Authorization that permits doing the Function with
     * the Qualifier even if the Authorization's Qualifier happens to be a
     * parent of the Qualifier argument.
     * 
     * @param object Id $agentId
     * @param object Type $functionType
     * @param object Id $qualifierId
     * @param boolean $isActiveNowOnly
     *  
     * @return object AuthorizationIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}, {@link
     *         org.osid.authorization.AuthorizationException#NULL_ARGUMENT
     *         NULL_ARGUMENT}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_ID
     *         UNKNOWN_ID}, {@link
     *         org.osid.authorization.AuthorizationException#UNKNOWN_TYPE
     *         UNKNOWN_TYPE}
     * 
     * @access public
     */
    public function getAllAZsByFuncType ( Id $agentId, Type $functionType, Id $qualifierId, $isActiveNowOnly ); 

    /**
     * Returns the Qualifier Hierarchies supported by the Authorization
     * implementation.  Qualifier Hierarchies are referenced by Id and may be
     * known and managed through the Hierarchy OSID.
     *  
     * @return object IdIterator
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function getQualifierHierarchies (); 

    /**
     * This method indicates whether this implementation supports
     * AuthorizationManager methods: createFunction, deleteFunction. Function
     * methods: updateDescription, updateDisplayName.
     *  
     * @return boolean
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function supportsDesign (); 

    /**
     * This method indicates whether this implementation supports
     * AuthorizationManager methods: createAuthorization,
     * createDatedAuthorization, createQualifier, createRootQualifier,
     * deleteAuthorization, deleteQualifier, getFunctionTypes, getQualifier,
     * getQualifierChildren, getQualifierDescendents, getQualifierHierarchies,
     * getQualifierTypes, getRootQualifiers, getWhoCanDo. Function methods:
     * getDescription, getDisplayName, getFunctionType, getId,
     * getQualifierHierarchy. Qualifier methods: addParent, changeParent,
     * getChildren, getDescription, getDisplayName, isParent, getId,
     * getParents, getQualifierType, isChildOf, isDescendentOf, removeParent,
     * updateDescription, updateDisplayName.
     *  
     * @return boolean
     * 
     * @throws object AuthorizationException An exception with
     *         one of the following messages defined in
     *         org.osid.authorization.AuthorizationException may be thrown:
     *         {@link
     *         org.osid.authorization.AuthorizationException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.authorization.AuthorizationException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.authorization.AuthorizationException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.authorization.AuthorizationException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function supportsMaintenance (); 
}

?>