<?php

/**
 * This file will include all of the OSID class definitions in the org/osid/
 * subdirectory.
 * You may fine it more useful to include_once any given interface directly
 * from classes extending it.
 *
 * @package org
 * 
 * @version $Id: include_all.php,v 1.1 2008/02/06 15:45:08 adamfranco Exp $
 * @since $Date: 2008/02/06 15:45:08 $
 * @copyright 2004 Middlebury College
 * @author Adam Franco <afranco AT middlebury DOT edu>
 */



$osidDir = realpath(dirname(__FILE__)."/osid");

includePHPFiles ($osidDir);

/**
 * Recursively include_once all php files in the target directory.
 * 
 * @param string $dir The target directory
 * @return void
 * @access public
 * @since 1/7/05
 */
function includePHPFiles ( $dir ) {
	if ($handle = opendir($dir)) {

		while (false !== ($fileName = readdir($handle))) {
			$file = realpath($dir."/".$fileName);
			
			// If the child is a directory, recuse into it
			if (is_dir($file) && $fileName != "." && $fileName != "..") {
				includePHPFiles($file);
			}
			
			// If it is a php file, include it.
			else if (preg_match("/\.php$/", $file)) {
				include_once($file);
			}
			
			// Otherwise, just ignore the file.
		}
		
		closedir($handle);
		
	} else {
		die ("Could not open $dir");
	}
}
?>