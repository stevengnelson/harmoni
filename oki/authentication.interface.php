<?php
/**
 * @package osid.authentication
 */

/**
 * @ignore
 */
require_once(OKI."/osid.interface.php");

	/**
	 * The AuthenticationManager identifies the authentication Types supported by the implementation, authenticates the user using a particular authentication Type, determines if the user is authenticated for a particular authentication Type, destroys the user's authentication, and returns the id of the Agent that represents the user. <p>SID Version: 1.0 rc6 <p>Licensed under the {@link SidLicense MIT O.K.I&#46; SID Definition License}.
	 * @package osid.authentication
	 */
class AuthenticationManager // :: API interface
	extends OsidManager
{

	/**
	 * Get the authentication Types that are supported by the implementation.
	 * @return object osid.shared.TypeIterator
	 * @throws osid.shared.SharedException An exception with one of the following messages defined in osid.shared.SharedException:   {@link SharedException#OPERATION_FAILED OPERATION_FAILED}, {@link SharedException#PERMISSION_DENIED PERMISSION_DENIED}, {@link SharedException#CONFIGURATION_ERROR CONFIGURATION_ERROR}, {@link SharedException#UNIMPLEMENTED UNIMPLEMENTED}
	 */
	function &getAuthenticationTypes() { /* :: interface :: */ }
	// :: full java declaration :: osid.shared.TypeIterator getAuthenticationTypes()

	/**
	 * Invoke the authentication process of the specified Type to identify the user.  It may be necessary to call isUserAuthenticated to check the status of authentication.  The standard authentication technique of limiting the time an user's authentication is valid requires explicit queries of the authentication status. It is likely that checking the status of authentication will occur more frequently than invoking the mechanism to authenticate the user.  Separation of the authentication process from checking the status of the authentication process is made explicit by having the authenticateUser and isUserAuthenticated methods.
	 * @param object authenticationType
	 * @throws osid.shared.SharedException An exception with one of the following messages defined in osid.shared.SharedException:   {@link SharedException#OPERATION_FAILED OPERATION_FAILED}, {@link SharedException#PERMISSION_DENIED PERMISSION_DENIED}, {@link SharedException#CONFIGURATION_ERROR CONFIGURATION_ERROR}, {@link SharedException#UNIMPLEMENTED UNIMPLEMENTED}, {@link SharedException#NULL_ARGUMENT NULL_ARGUMENT}, {@link SharedException#UNKNOWN_TYPE UNKNOWN_TYPE}
	 */
	function authenticateUser(& $authenticationType) { /* :: interface :: */ }
	// :: full java declaration :: void authenticateUser(osid.shared.Type authenticationType)

	/**
	 * Check the current authentication status of the user. If the method returns true, the user is authenticated.  If the method returns false, the user is not authenticated.  This can indicate that the user could not be authenticated or that the user's authentication has timed out.  The intent is to use the method authenticateUser to invoke the authentication process.  The standard authentication technique of limiting the time an user's authentication is valid requires explicit queries of the authentication status. It is likely that checking the status of authentication will occur more frequently than invoking the mechanism to authenticate the user.  Separation of the authentication process from checking the status of the authentication process is made explicit by having the authenticateUser and isUserAuthenticated methods.
	 * @param object authenticationType
	 * @return object boolean
	 * @throws osid.shared.SharedException An exception with one of the following messages defined in osid.shared.SharedException:   {@link SharedException#OPERATION_FAILED OPERATION_FAILED}, {@link SharedException#PERMISSION_DENIED PERMISSION_DENIED}, {@link SharedException#CONFIGURATION_ERROR CONFIGURATION_ERROR}, {@link SharedException#UNIMPLEMENTED UNIMPLEMENTED}, {@link SharedException#NULL_ARGUMENT NULL_ARGUMENT}, {@link SharedException#UNKNOWN_TYPE UNKNOWN_TYPE}
	 */
	function isUserAuthenticated(& $authenticationType) { /* :: interface :: */ }
	// :: full java declaration :: boolean isUserAuthenticated(osid.shared.Type authenticationType)

	/**
	 * Get the Unique Id of the Agent that represents the user for the specified AuthenticationType.  Agents are managed in the Shared OSID.
	 * @param object authenticationType
	 * @return object osid.shared.Id
	 * @throws osid.shared.SharedException An exception with one of the following messages defined in osid.shared.SharedException:   {@link SharedException#OPERATION_FAILED OPERATION_FAILED}, {@link SharedException#PERMISSION_DENIED PERMISSION_DENIED}, {@link SharedException#CONFIGURATION_ERROR CONFIGURATION_ERROR}, {@link SharedException#UNIMPLEMENTED UNIMPLEMENTED}, {@link SharedException#NULL_ARGUMENT NULL_ARGUMENT}, {@link SharedException#UNKNOWN_TYPE UNKNOWN_TYPE}
	 */
	function &getUserId(& $authenticationType) { /* :: interface :: */ }
	// :: full java declaration :: osid.shared.Id getUserId(osid.shared.Type authenticationType)

	/**
	 * Destroy authentication for all authentication types.
	 * @throws osid.shared.SharedException An exception with one of the following messages defined in osid.shared.SharedException:   {@link SharedException#OPERATION_FAILED OPERATION_FAILED}, {@link SharedException#PERMISSION_DENIED PERMISSION_DENIED}, {@link SharedException#CONFIGURATION_ERROR CONFIGURATION_ERROR}, {@link SharedException#UNIMPLEMENTED UNIMPLEMENTED}
	 */
	function destroyAuthentication() { /* :: interface :: */ }
	// :: full java declaration :: void destroyAuthentication()

	/**
	 * Destroy authentication for the specified authentication type.
	 * @param object authenticationType
	 * @throws osid.shared.SharedException An exception with one of the following messages defined in osid.shared.SharedException:   {@link SharedException#OPERATION_FAILED OPERATION_FAILED}, {@link SharedException#PERMISSION_DENIED PERMISSION_DENIED}, {@link SharedException#CONFIGURATION_ERROR CONFIGURATION_ERROR}, {@link SharedException#UNIMPLEMENTED UNIMPLEMENTED}, {@link SharedException#NULL_ARGUMENT NULL_ARGUMENT}, {@link SharedException#UNKNOWN_TYPE UNKNOWN_TYPE}
	 */
	function destroyAuthenticationForType(& $authenticationType) { /* :: interface :: */ }
	// :: full java declaration :: void destroyAuthenticationForType(osid.shared.Type authenticationType)
}


	/**
	 * All methods of all interfaces of the Open Service Interface Definition (OSID) throw a subclass of osid.OsidException. This requires the caller of an osid package method handle the OsidException. Since the application using an OsidManager can not determine where the implementation will ultimately execute, it must assume a worst case scenario and protect itself.. <p>SID Version: 1.0 rc6 <p>Licensed under the {@link SidLicense MIT O.K.I&#46; SID Definition License}.
	 * @package osid.authentication
	 */
class AuthenticationException // :: normal class
	extends OsidException
{

	/**
	 * Unknown or unsupported Type
	 */
	// :: defined globally :: define("UNKNOWN_TYPE","Unknown Type ");

	/**
	 * Operation failed
	 */
	// :: defined globally :: define("OPERATION_FAILED","Operation failed ");

	/**
	 * Null argument
	 */
	// :: defined globally :: define("NULL_ARGUMENT","Null argument ");

	/**
	 * Permission denied
	 */
	// :: defined globally :: define("PERMISSION_DENIED","Permission denied ");

	/**
	 * Configuration error
	 */
	// :: defined globally :: define("CONFIGURATION_ERROR","Configuration error ");

	/**
	 * Unimplemented method
	 */
	// :: defined globally :: define("UNIMPLEMENTED","Unimplemented method ");
}

// :: post-declaration code ::
/**
 * string: Unknown Type 
 * @name UNKNOWN_TYPE
 */
define("UNKNOWN_TYPE", "Unknown Type ");

/**
 * string: Operation failed 
 * @name OPERATION_FAILED
 */
define("OPERATION_FAILED", "Operation failed ");

/**
 * string: Null argument 
 * @name NULL_ARGUMENT
 */
define("NULL_ARGUMENT", "Null argument ");

/**
 * string: Permission denied 
 * @name PERMISSION_DENIED
 */
define("PERMISSION_DENIED", "Permission denied ");

/**
 * string: Configuration error 
 * @name CONFIGURATION_ERROR
 */
define("CONFIGURATION_ERROR", "Configuration error ");

/**
 * string: Unimplemented method 
 * @name UNIMPLEMENTED
 */
define("UNIMPLEMENTED", "Unimplemented method ");

?>
