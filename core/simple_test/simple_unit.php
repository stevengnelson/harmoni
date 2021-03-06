<?php
    // $Id: simple_unit.php,v 1.6 2007/10/10 22:58:41 adamfranco Exp $
    
    if (!defined("SIMPLE_TEST")) {
        define("SIMPLE_TEST", "./");
    }
    require_once(SIMPLE_TEST . 'simple_test.php');
    
    /**
     *    Standard unit test class for day to day testing
     *    of PHP code XP style. Adds some useful standard
     *    assertions.
     */
    class UnitTestCase extends TestCase {
        
        /**
         *    Creates an empty test case. Should be subclassed
         *    with test methods for a functional test case.
         *    @param $label            Name of test case. Will use
         *                             the class name if none specified.
         *    @access public
         */
        function UnitTestCase($label = "") {
            if ($label == "") {
                $label = get_class($this);
            }
            $this->TestCase($label);
        }
        
        /**
         *    Will be true on false and vice versa.
         *    @param $boolean        Supposedly false value.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertFalse($boolean, $message = "False assertion") {
            $this->assertTrue(!$boolean, $message);
        }
        
        /**
         *    Will be true if the value is null.
         *    @param $value          Supposedly null value.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertNull($value, $message = "") {
            if ($message == "") {
                $message = "[" . $this->_renderVariable($value) . "] should be null";
            }
            $this->assertTrue(!isset($value), $message);
        }
        
        /**
         *    Will be true if the value is set.
         *    @param $value          Supposedly set value.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertNotNull($value, $message = "") {
            if ($message == "") {
                $message = "[" . $this->_renderVariable($value) . "] should be not be null";
            }
            $this->assertTrue(isset($value), $message);
        }
        
        /**
         *    Type and class test. Will pass if class
         *    matches the type name or is a subclass or
         *    is not an object, but the type is corect.
         *    @param $object        Object to test.
         *    @param $type          Type name as string.
         *    @access public
         */
        function assertIsA($object, $type, $message = "") {
            if ($message == "") {
                $message = "[" . $this->_renderVariable($object) . "] should be type [$type]";
            }
            if (is_object($object)) {
                $this->assertTrue(($object instanceof $type), $message);
            } else {
                $this->assertTrue(gettype($object) == $type, $message);
            }
        }
        
        /**
         *    Will trigger a pass if the two parameters have
         *    the same value only. Otherwise a fail.
         *    @param $first          Value to compare.
         *    @param $second         Value to compare.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertEqual($first, $second, $message = "") {
            if ($message == "") {
                $message =
                        "[" . $this->_renderVariable($first) .
                        "] should be equal to [" .
                        $this->_renderVariable($second) . "]";
            }
            $this->assertTrue(($first == $second) && ($second == $first), $message);
        }
        
        /**
         *    Will trigger a pass if the two parameters have
         *    a different value. Otherwise a fail.
         *    @param $first          Value to compare.
         *    @param $second         Value to compare.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertNotEqual($first, $second, $message = "") {
            if ($message == "") {
                $message =
                        "[" . $this->_renderVariable($first) .
                        "] should not be equal to [" .
                        $this->_renderVariable($second) . "]";
            }
            $this->assertTrue($first != $second, $message);
        }
        
        /**
         *    Will trigger a pass if the two parameters have
         *    the same value and same type. Otherwise a fail.
         *    @param $first          Value to compare.
         *    @param $second         Value to compare.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertIdentical($first, $second, $message = "") {
            if ($message == "") {
                $message =
                        "[" . $this->_renderVariable($first) .
                        "] should be identical to [" .
                        $this->_renderVariable($second) . "]";
            }
            $this->assertTrue($first === $second, $message);
        }
        
        /**
         *    Will trigger a pass if the two parameters have
         *    the different value or different type.
         *    @param $first          Value to compare.
         *    @param $second         Value to compare.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertNotIdentical($first, $second, $message = "") {
            if ($message == "") {
                $message =
                        "[" . $this->_renderVariable($first) .
                        "] should not be identical to [" .
                        $this->_renderVariable($second) . "]";
            }
            $this->assertTrue($first !== $second, $message);
        }
        
        /**
         *    Will trigger a pass if both parameters refer
         *    to the same object. Fail otherwise.
         *    @param $first          Object reference to check.
         *    @param $second         Hopefully the same object.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertReference($first, $second, $message = "") {
            if ($message == "") {
                $message =
                        "[" . $this->_renderVariable($first) .
                        "] and [" . $this->_renderVariable($second) .
                        "] should reference the same object";
            }
            $temp = $first;
            $first = uniqid("test");
            $is_ref = ($first === $second);
            $first = $temp;
            $this->assertTrue($is_ref, $message);
        }
        
         /**
         *    Will trigger a pass if both parameters do not refer
         *    to the same object. Fail otherwise.
         *    @param $first          Object reference to check.
         *    @param $second         Hopefully the same object.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertNotReference($first, $second, $message = "") {
            if ($message == "") {
                $message =
                        "[" . $this->_renderVariable($first) .
                        "] and [" . $this->_renderVariable($second) .
                        "] should not reference the same object";
            }
            $temp = $first;
            $first = uniqid("test");
            $is_ref = ($first === $second);
            $first = $temp;
            $this->assertFalse($is_ref, $message);
        }
        
        /**
         *    Will trigger a pass if both parameters refer
         *    to different objects. Fail otherwise.
         *    @param $first          Object reference to check.
         *    @param $second         Hopefully not the same object.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertCopy($first, $second, $message = "") {
            if ($message == "") {
                $message =
                        "[" . $this->_renderVariable($first) .
                        "] and [" . $this->_renderVariable($second) .
                        "] should not be the same object";
            }
            $temp = $first;
            $first = uniqid("test");
            $is_ref = ($first === $second);
            $first = $temp;
            $this->assertFalse($is_ref, $message);
        }
        
        /**
         *    Will trigger a pass if the Perl regex pattern
         *    is found in the subject. Fail otherwise.
         *    @param $pattern        Perl regex to look for including
         *                           the regex delimiters.
         *    @param $subject        String to search in.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertWantedPattern($pattern, $subject, $message = "") {
            if ($message == "") {
                $message = "Expecting [$pattern] in [$subject]";
            }
            $this->assertTrue((boolean)preg_match($pattern, $subject), $message);
        }
        
        /**
         *    Will trigger a pass if the perl regex pattern
         *    is not present in subject. Fail if found.
         *    @param $pattern        Perl regex to look for including
         *                           the regex delimiters.
         *    @param $subject        String to search in.
         *    @param $message        Message to display.
         *    @access public
         */
        function assertNoUnwantedPattern($pattern, $subject, $message = "") {
            if ($message == "") {
                $message = "Not expecting [$pattern] in [$subject]";
            }
            $this->assertTrue(!preg_match($pattern, $subject), $message);
        }
        
        /**
         *    Renders a variable in a shorter for than print_r().
         *    @param $var        Variable to render as a string.
         *    @access protected
         */
        function _renderVariable($var) {
            if (!isset($var)) {
                return "NULL";
            } elseif (is_bool($var)) {
                return "Boolean: " . ($var ? "true" : "false");
            } elseif (is_string($var)) {
                return "String: $var";
            } elseif (is_integer($var)) {
                return "Integer: $var";
            } elseif (is_float($var)) {
                return "Float: $var";
            } elseif (is_array($var)) {
                return "Array: " . count($var) . " items";
            } elseif (is_resource($var)) {
                return "Resource: $var";
            } elseif (is_object($var)) {
                return "Object: of " . get_class($var);
            }
            return "Unknown";
        }
    }
?>