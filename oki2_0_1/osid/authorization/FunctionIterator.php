<?php 
 
/**
 * FunctionIterator is the iterator for a collection of Functions.
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
interface FunctionIterator
{
    /**
     * Return true if there is an additional  Function ; false otherwise.
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
    public function hasNextFunction (); 

    /**
     * Return the next Function.
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
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function nextFunction (); 
}

?>