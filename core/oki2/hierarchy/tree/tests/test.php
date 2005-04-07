<?php

/**
 * A group test template using the SimpleTest unit testing package.
 * Just add the UnitTestCase files below using addTestFile().
 *
 * @package harmoni.osid_v2.hierarchy.tree.tests
 * 
 * @copyright Copyright &copy; 2005, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: test.php,v 1.3 2005/04/07 16:33:29 adamfranco Exp $
 */

	define("LOAD_HIERARCHY", false);

	if (!defined('HARMONI')) {
		require_once("../../../../../harmoni.inc.php");
	}

	if (!defined('SIMPLE_TEST')) {
		define('SIMPLE_TEST', HARMONI.'simple_test/');
	}

	require_once(SIMPLE_TEST . 'simple_unit.php');
	require_once(SIMPLE_TEST . 'dobo_simple_html_test.php');
	
	$test =& new GroupTest('Tree tests');
	$test->addTestFile(HARMONI.'oki/hierarchy2/tree/tests/TreeTestCase.class.php');
	$test->addTestFile(HARMONI.'oki/hierarchy2/tree/tests/TreeNodeTestCase.class.php');
	$test->attachObserver(new DoboTestHtmlDisplay());
	$test->run();

	
?>