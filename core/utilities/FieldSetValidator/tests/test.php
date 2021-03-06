<?php

/**
 * A group test template using the SimpleTest unit testing package.
 * Just add the UnitTestCase files below using addTestFile().
 *
 * @package harmoni.utilities.fieldsetvalidator.tests
 * 
 * @copyright Copyright &copy; 2005, Middlebury College
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License (GPL)
 *
 * @version $Id: test.php,v 1.3 2007/09/04 20:25:56 adamfranco Exp $
 **/

    if (!defined('HARMONI')) {
        require_once("../../../harmoni.inc.php");
    }

    if (!defined('SIMPLE_TEST')) {
        define('SIMPLE_TEST', HARMONI.'simple_test/');
    }
    
    require_once(SIMPLE_TEST . 'simple_unit.php');
    require_once(SIMPLE_TEST . 'dobo_simple_html_test.php');

    $test = new GroupTest('FieldSetValidator tests');
    $test->addTestFile(HARMONI.'utilities/FieldSetValidator/tests/FieldSetValidatorTestCase.class.php');
    $test->attachObserver(new DoboTestHtmlDisplay());
    $test->run();

?>