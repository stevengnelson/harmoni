<?php

/**
 * A group test template using the SimpleTest unit testing package.
 * Just add the UnitTestCase files below using addTestFile().
 *
 * @version $Id: test.php,v 1.1 2003/08/14 19:26:31 gabeschine Exp $
 * @copyright 2003 
 **/

    if (!defined('HARMONI')) {
        require_once("../../harmoni.inc.php");
    }

    if (!defined('SIMPLE_TEST')) {
        define('SIMPLE_TEST', HARMONI.'simple_test/');
    }
       
	require_once(HARMONI."errorHandler/ErrorHandler.class.php");

	if (!Services::serviceAvailable("ErrorHandler")) {
	   	Services::registerService("ErrorHandler","ErrorHandler");
		Services::startService("ErrorHandler");
	}

    require_once(SIMPLE_TEST . 'simple_unit.php');
    require_once(SIMPLE_TEST . 'dobo_simple_html_test.php');
	
    $test =& new GroupTest('Utilities tests');
    $test->addTestFile(HARMONI.'utilities/tests/QueueTestCase.class.php');
    $test->addTestFile(HARMONI.'utilities/tests/ArgumentValidatorTestCase.class.php');
    $test->addTestFile(HARMONI.'utilities/tests/ArgumentRendererTestCase.class.php');
    $test->addTestFile(HARMONI.'utilities/FieldSetValidator/tests/test.php');
    $test->attachObserver(new DoboTestHtmlDisplay());
    $test->run();

?>