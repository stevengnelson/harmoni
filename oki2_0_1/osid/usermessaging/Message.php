<?php 
 
/**
 * Messages contain read-only attributes.  Note that the message attributes
 * don't contain delivery time.
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
 * @package org.osid.usermessaging
 */
interface Message
{
    /**
     * Get the content of this Message.
     *  
     * @return object mixed (original type: java.io.Serializable)
     * 
     * @throws object UsermessagingException An exception with
     *         one of the following messages defined in
     *         org.osid.usermessaging.UsermessagingException may be thrown:
     *         {@link
     *         org.osid.usermessaging.UsermessagingException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.usermessaging.UsermessagingException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.usermessaging.UsermessagingException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.usermessaging.UsermessagingException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function getContent (); 

    /**
     * Get the MessageType of this Message.
     *  
     * @return object Type
     * 
     * @throws object UsermessagingException An exception with
     *         one of the following messages defined in
     *         org.osid.usermessaging.UsermessagingException may be thrown:
     *         {@link
     *         org.osid.usermessaging.UsermessagingException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.usermessaging.UsermessagingException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.usermessaging.UsermessagingException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.usermessaging.UsermessagingException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function getMessageType (); 

    /**
     * Get the DeliveryType of this Message.
     *  
     * @return object Type
     * 
     * @throws object UsermessagingException An exception with
     *         one of the following messages defined in
     *         org.osid.usermessaging.UsermessagingException may be thrown:
     *         {@link
     *         org.osid.usermessaging.UsermessagingException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.usermessaging.UsermessagingException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.usermessaging.UsermessagingException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.usermessaging.UsermessagingException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function getDeliveryType (); 

    /**
     * Get the time the Message was sent.
     *  
     * @return int
     * 
     * @throws object UsermessagingException An exception with
     *         one of the following messages defined in
     *         org.osid.usermessaging.UsermessagingException may be thrown:
     *         {@link
     *         org.osid.usermessaging.UsermessagingException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.usermessaging.UsermessagingException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.usermessaging.UsermessagingException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.usermessaging.UsermessagingException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function getMessageTimestamp (); 

    /**
     * Get the Topic of the Message. Note that the Topic is not necessarily the
     * subject of the Message.  The subject can be embedded in the Content.
     * The intent is that the Topic is the same Topic used in CourseManagement
     * to refer to an area of interest.
     *  
     * @return string
     * 
     * @throws object UsermessagingException An exception with
     *         one of the following messages defined in
     *         org.osid.usermessaging.UsermessagingException may be thrown:
     *         {@link
     *         org.osid.usermessaging.UsermessagingException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.usermessaging.UsermessagingException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.usermessaging.UsermessagingException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.usermessaging.UsermessagingException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function getTopic (); 

    /**
     * Get the agentId that sent the Message.
     *  
     * @return object Id
     * 
     * @throws object UsermessagingException An exception with
     *         one of the following messages defined in
     *         org.osid.usermessaging.UsermessagingException may be thrown:
     *         {@link
     *         org.osid.usermessaging.UsermessagingException#OPERATION_FAILED
     *         OPERATION_FAILED}, {@link
     *         org.osid.usermessaging.UsermessagingException#PERMISSION_DENIED
     *         PERMISSION_DENIED}, {@link
     *         org.osid.usermessaging.UsermessagingException#CONFIGURATION_ERROR
     *         CONFIGURATION_ERROR}, {@link
     *         org.osid.usermessaging.UsermessagingException#UNIMPLEMENTED
     *         UNIMPLEMENTED}
     * 
     * @access public
     */
    public function getSender (); 
}

?>