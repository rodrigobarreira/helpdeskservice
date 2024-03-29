<?php
/* SVN FILE: $Id: test_manager.php 5 2006-05-28 10:33:04Z phpnut $ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP Test Suite <https://trac.cakephp.org/wiki/Developement/TestSuite>
 * Copyright (c) 2006, Larry E. Masters Shorewood, IL. 60431
 * Author(s): Larry E. Masters aka PhpNut <phpnut@gmail.com>
 *
 * Portions modifiied from WACT Test Suite
 * Author(s): Harry Fuecks
 *            Jon Ramsey
 *            Jason E. Sweat
 *            Franco Ponticelli
 *            Lorenzo Alberton
 *
 *  Licensed under The Open Group Test Suite License
 *  Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @author       Larry E. Masters aka PhpNut <phpnut@gmail.com>
 * @copyright    Copyright (c) 2006, Larry E. Masters Shorewood, IL. 60431
 * @link         http://www.phpnut.com/projects/
 * @package      tests
 * @subpackage   tests.lib
 * @since        CakePHP Test Suite v 1.0.0.0
 * @version      $Revision: 5 $
 * @modifiedby   $LastChangedBy: phpnut $
 * @lastmodified $Date: 2006-05-28 05:33:04 -0500 (Sun, 28 May 2006) $
 * @license      http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
/**
 * Short description for class.
 *
 * @package    tests
 * @subpackage tests.lib
 * @since      CakePHP Test Suite v 1.0.0.0
 */
class TestManager {
	var $_testExtension = '.test.php';
	var $_groupExtension = '.group.php';
	var $usersAppTest = false;

	function TestManager() {
		$this->_installSimpleTest();
		if (isset($_GET['app'])) {
			$this->usersAppTest = true;
		}
	}

	function _installSimpleTest() {
		vendor('simpletest'.DS.'unit_tester', 'simpletest'.DS.'web_tester', 'simpletest'.DS.'mock_objects');
		require_once(LIB_TESTS.'cake_web_test_case.php');
	}

	function setOutputFromIni($iniFile) {
		if (! file_exists($iniFile)) {
			trigger_error("Missing configuration file {$iniFile}", E_USER_ERROR);
		}
		$config = parse_ini_file($iniFile, TRUE);
		foreach ($config['output'] as $key => $value) {
			define($key, $value);
		}
	}

	function runAllTests(&$reporter) {
		$manager =& new TestManager();

		if(!empty($manager->usersAppTest)) {
			$testCasePath = APP_TEST_CASES . DIRECTORY_SEPARATOR;
		} else {
			$testCasePath = CORE_TEST_CASES . DIRECTORY_SEPARATOR;
		}
		$testCases =& $manager->_getTestFileList($testCasePath);
		$test =& new GroupTest('All Core Tests');

		if (isset($_GET['app'])) {
			$test =& new GroupTest('All App Tests');
		} else {
			$test =& new GroupTest('All Core Tests');
		}

		foreach ($testCases as $testCase) {
			$test->addTestFile($testCase);
		}
		$test->run($reporter);
	}

	function runTestCase($testCaseFile, &$reporter) {
		$manager =& new TestManager();

		if(!empty($manager->usersAppTest)) {
			$testCaseFileWithPath = APP_TEST_CASES . DIRECTORY_SEPARATOR . $testCaseFile;
		} else {
			$testCaseFileWithPath = CORE_TEST_CASES . DIRECTORY_SEPARATOR . $testCaseFile;
		}
		if (! file_exists($testCaseFileWithPath)) {
			trigger_error("Test case {$testCaseFile} cannot be found", E_USER_ERROR);
		}
		$test =& new GroupTest("Individual test case: " . $testCaseFile);
		$test->addTestFile($testCaseFileWithPath);
		$test->run($reporter);
	}

	function runGroupTest($groupTestName, $groupTestDirectory, &$reporter) {
		$manager =& new TestManager();
		$filePath = $groupTestDirectory . DIRECTORY_SEPARATOR .
		strtolower($groupTestName) . $manager->_groupExtension;

		if (! file_exists($filePath)) {
			trigger_error("Group test {$groupTestName} cannot be found at {$filePath}", E_USER_ERROR);
		}

		require_once $filePath;
		$test =& new GroupTest($groupTestName . ' group test');

		foreach ($manager->_getGroupTestClassNames($filePath) as $groupTest) {
			$test->addTestCase(new $groupTest());
		}
		$test->run($reporter);
	}

	function addTestCasesFromDirectory(&$groupTest, $directory = '.') {
		$manager =& new TestManager();
		$testCases =& $manager->_getTestFileList($directory);
		foreach ($testCases as $testCase) {
			$groupTest->addTestFile($testCase);
		}
	}

	function &getTestCaseList($directory = '.') {
		$manager =& new TestManager();
		$return = $manager->_getTestCaseList($directory);
		return $return;
	}

	function &_getTestCaseList($directory = '.') {
		$fileList =& $this->_getTestFileList($directory);
		$testCases = array();
		foreach ($fileList as $testCaseFile) {
			$testCases[$testCaseFile] = str_replace($directory . DS, '', $testCaseFile);
		}
		return $testCases;
	}

	function &_getTestFileList($directory = '.') {
		$return = $this->_getRecursiveFileList($directory, array(&$this, '_isTestCaseFile'));
		return $return;
	}

	function &getGroupTestList($directory = '.') {
		$manager =& new TestManager();
		$return = $manager->_getTestGroupList($directory);
		return $return;
	}

	function &_getTestGroupFileList($directory = '.') {
		$return = $this->_getRecursiveFileList($directory, array(&$this, '_isTestGroupFile'));
		return $return;
	}

	function &_getTestGroupList($directory = '.') {
		$fileList =& $this->_getTestGroupFileList($directory);
		$groupTests = array();

		foreach ($fileList as $groupTestFile) {
			$groupTests[$groupTestFile] = str_replace($this->_groupExtension, '', basename($groupTestFile));
		}
		sort($groupTests);
		return $groupTests;
	}

	function &_getGroupTestClassNames($groupTestFile) {
		$file = implode("\n", file($groupTestFile));
		preg_match("~lass\s+?(.*)\s+?extends GroupTest~", $file, $matches);
		if (! empty($matches)) {
			unset($matches[0]);
			return $matches;
		} else {
			return array();
		}
	}

	function &_getRecursiveFileList($directory = '.', $fileTestFunction) {
		$dh = opendir($directory);
		if (! is_resource($dh)) {
			trigger_error("Couldn't open {$directory}", E_USER_ERROR);
		}

		$fileList = array();
		while ($file = readdir($dh)) {
			$filePath = $directory . DIRECTORY_SEPARATOR . $file;
			if (0 === strpos($file, '.')) {
				continue;
			}

			if (is_dir($filePath)) {
				$fileList = array_merge($fileList, $this->_getRecursiveFileList($filePath, $fileTestFunction));
			}
			if ($fileTestFunction[0]->$fileTestFunction[1]($file)) {
				$fileList[] = $filePath;
			}
		}
		closedir($dh);
		return $fileList;
	}

	function _isTestCaseFile($file) {
		return $this->_hasExpectedExtension($file, $this->_testExtension);
	}

	function _isTestGroupFile($file) {
		return $this->_hasExpectedExtension($file, $this->_groupExtension);
	}

	function _hasExpectedExtension($file, $extension) {
		return $extension == strtolower(substr($file, (0 - strlen($extension))));
	}
}
/**
 * Short description for class.
 *
 * @package    tests
 * @subpackage tests.lib
 * @since      CakePHP Test Suite v 1.0.0.0
 */
class CliTestManager extends TestManager {

	function &getGroupTestList($directory = '.') {
		$manager =& new CliTestManager();
		$groupTests =& $manager->_getTestGroupList($directory);
		$buffer = "Available Group Test:\n";

		foreach ($groupTests as $groupTest) {
			$buffer .= "  " . $groupTest . "\n";
		}
		return $buffer . "\n";
	}

	function &getTestCaseList($directory = '.') {
		$manager =& new CliTestManager();
		$testCases =& $manager->_getTestCaseList($directory);
		$buffer = "Available Test Cases:\n";

		foreach ($testCases as $testCaseFile => $testCase) {
			$buffer .= "  " . $testCaseFile . "\n";
		}
		return $buffer . "\n";
	}
}
/**
 * Short description for class.
 *
 * @package    tests
 * @subpackage tests.lib
 * @since      CakePHP Test Suite v 1.0.0.0
 */
class TextTestManager extends TestManager {
	var $_url;

	function TextTestManager() {
		$this->_url = $_SERVER['PHP_SELF'];
	}

	function getBaseURL() {
		return $this->_url;
	}

	function &getGroupTestList($directory = '.') {
		$manager =& new TextTestManager();
		$groupTests =& $manager->_getTestGroupList($directory);

		if (1 > count($groupTests)) {
			return "No test groups set up!\n";
		}
		$buffer = "Available test groups:\n";
		$buffer .=  $manager->getBaseURL() . "?group=all All tests<\n";

		foreach ($groupTests as $groupTest) {
			$buffer .= "<li><a href='" . $manager->getBaseURL() . "?group={$groupTest}'>" . $groupTest . "&output=txt"."</a></li>\n";
		}
		return $buffer . "</ul>\n";
	}

	function &getTestCaseList($directory = '.') {
		$manager =& new TextTestManager();
		$testCases =& $manager->_getTestCaseList($directory);

		if (1 > count($testCases)) {
			return "No test cases set up!";
		}
		$buffer = "Available test cases:\n";

		foreach ($testCases as $testCaseFile => $testCase) {
			$buffer .= $_SERVER['SERVER_NAME']. $manager->getBaseURL()."?case=" . $testCase . "&output=txt"."\n";
		}
		return $buffer . "\n";
	}
}
/**
 * Short description for class.
 *
 * @package    tests
 * @subpackage tests.lib
 * @since      CakePHP Test Suite v 1.0.0.0
 */
class HtmlTestManager extends TestManager {
	var $_url;

	function HtmlTestManager() {
		$this->_url = $_SERVER['PHP_SELF'];
	}

	function getBaseURL() {
		return $this->_url;
	}

	function &getGroupTestList($directory = '.') {
		$userApp = '';
		if (isset($_GET['app'])) {
			$userApp = '&amp;app=true';
		}
		$manager =& new HtmlTestManager();
		$groupTests =& $manager->_getTestGroupList($directory);

		if (1 > count($groupTests)) {
			return "<p>No test groups set up!</p>";
		}
		if (isset($_GET['app'])){
			$buffer = "<p>Available App Test Groups:</p>\n<ul>";
		} else {
			$buffer = "<p>Available Core Test Groups:</p>\n<ul>";
		}
		$buffer .= !class_exists('CakeDummyTestClass')
		?   "<li><a href='/tests/?group=all$userApp'>All tests</a></li>\n"
		: "<li><a href='" . $manager->getBaseURL() . "?group=all$userApp'>All tests</a></li>\n";

		foreach ($groupTests as $groupTest) {
			$buffer .= !class_exists('CakeDummyTestClass')
			?   "<li><a href='/tests/groups/?group={$groupTest}" . "{$userApp}'>" . $groupTest . "</a></li>\n"
			: "<li><a href='" . $manager->getBaseURL() . "?group={$groupTest}" . "{$userApp}'>" . $groupTest . "</a></li>\n";
		}
		$buffer  .=  "</ul>\n";
		return $buffer;
	}

	function &getTestCaseList($directory = '.') {
		$userApp = '';
		if (isset($_GET['app'])) {
			$userApp = '&amp;app=true';
		}
		$manager =& new HtmlTestManager();
		$testCases =& $manager->_getTestCaseList($directory);

		if (1 > count($testCases)) {
			return "<p>No test cases set up!</p>";
		}
		if (isset($_GET['app'])) {
			$buffer = "<p>Available App Test Cases:</p>\n<ul>";
		} else {
			$buffer = "<p>Available Core Test Cases:</p>\n<ul>";
		}
		foreach ($testCases as $testCaseFile => $testCase) {
			$buffer .= !class_exists('CakeDummyTestClass')
			?   "<li><a href='cases?case=" . urlencode($testCase) . $userApp ."'>" . $testCase . "</a></li>\n"
			: "<li><a href='" . $manager->getBaseURL() . "?case=" . urlencode($testCase) . $userApp ."'>" . $testCase . "</a></li>\n";
		}
		$buffer  .=  "</ul>\n";
		return $buffer;
	}
}
/**
 * Short description for class.
 *
 * @package    tests
 * @subpackage tests.lib
 * @since      CakePHP Test Suite v 1.0.0.0
 */
class XmlTestManager extends HtmlTestManager {

	function XmlTestManager() {
		parent::HtmlTestManager();
	}

	function &getGroupTestList($directory = '.') {
		$userApp = '';
		if (isset($_GET['app'])) {
			$userApp = '&amp;app=true';
		}
		$manager =& new XmlTestManager();
		$groupTests =& $manager->_getTestGroupList($directory);
		$rss = & $manager->_getRssWriter();

		if (1 > count($groupTests)) {
			$rss->writeRss($output);
			return $output;
		}
		$properties["title"]="All Tests";
		$properties["description"]="All Tests";
		$properties["link"]='http://'.$_SERVER['SERVER_NAME'].
		$manager->getBaseURL()."?group=all&amp;output=xml".$userApp;
		$rss->additem($properties);

		foreach ($groupTests as $groupTest) {
			$properties["title"]=$groupTest;
			$properties["description"]=$groupTest;
			$properties["link"]='http://'.$_SERVER['SERVER_NAME']. $manager->getBaseURL(). "?group={$groupTest}&amp;output=xml.$userApp";
			$rss->additem($properties);
		}
		$rss->writeRss($output);
		return $output;
	}

	function &getTestCaseList($directory = '.') {
		$userApp = '';
		if (isset($_GET['app'])) {
			$userApp = '&amp;app=true';
		}
		$manager =& new XmlTestManager();
		$testCases =& $manager->_getTestCaseList($directory);
		$rss = & $manager->_getRssWriter();

		if (1 > count($testCases)) {
			$rss->writeRss($output);
			return $output;
		}

		foreach ($testCases as $testCaseFile => $testCase) {
			$properties["title"]=$testCase;
			$properties["description"]=$testCase;
			$properties["link"]='http://'.$_SERVER['SERVER_NAME']. $manager->getBaseURL()."?case=" . urlencode($testCase) . "&amp;output=xml" . $userApp;
			// Comment this out for performance?
			$properties["dc:date"]=gmdate("Y-m-d\TH:i:sO",filemtime($testCaseFile));
			$rss->additem($properties);
		}
		$rss->writeRss($output);
		return $output;
	}

	function &_getRssWriter() {

		$cakeUrl = 'http://'.$_SERVER['SERVER_NAME'].str_replace('index.php','',$_SERVER['PHP_SELF']);
		require_once TESTS . 'lib'.DIRECTORY_SEPARATOR.'xml_writer_class.php';
		require_once TESTS . 'lib'.DIRECTORY_SEPARATOR.'rss_writer_class.php';
		$rssWriterObject =& new rss_writer_class();
		$rssWriterObject->specification="1.0";
		$rssWriterObject->about=$cakeUrl."index.php?output=xml";
		$rssWriterObject->stylesheet=$cakeUrl."rss2html.xsl";
		$rssWriterObject->rssnamespaces["dc"]="http://purl.org/dc/elements/1.1/";
		// Channel Properties
		$properties=array();
		$properties["title"]="CakePHP Test Suite :: Unit Test Cases";
		$properties["description"]="CakePHP Unit Test Cases";
		$properties["link"]="http://www.cakephp.org/";
		$properties["dc:date"]=gmdate("Y-m-d\TH:i:sO");
		$rssWriterObject->addchannel($properties);

		$properties=array();
		$properties["url"]="http://www.cakephp.org//img/cake.logo.png";
		$properties["link"]="http://www.cakephp.org/";
		$properties["title"]="CakePHP Logo";
		$properties["description"]="CakePHP Test Suite :: CakePHP :: Rapid Development Framework";
		$rssWriterObject->addimage($properties);

		return $rssWriterObject;
	}
}
/**
 * Short description for class.
 *
 * @package    tests
 * @subpackage tests.lib
 * @since      CakePHP Test Suite v 1.0.0.0
 */
class RemoteTestManager extends TestManager {

	function RemoteTestManager() {
		parent::TestManager();
	}

	function _installSimpleTest() {
		parent::_installSimpleTest();
		vendor('simpletest'.DS.'remote');
	}

	function runAllTests(&$reporter, $url = FALSE) {
		$groups = RemoteTestManager::getGroupTestList($url);
		$T =& new RemoteTestCase($groups['All Tests']);
		$T->run($reporter);
	}

	function runTestCase($caseFile,& $reporter, $url = FALSE) {
		$cases = RemoteTestManager::getTestCaseList($url);
		$T =& new RemoteTestCase($cases[$caseFile]);
		$T->run($reporter);
	}

	function runGroupTest($groupName, &$reporter, $url = FALSE) {
		$groups = RemoteTestManager::getGroupTestList($url);
		$T =& new RemoteTestCase($groups[$groupName]);
		$T->run($reporter);
	}

	function & getGroupTestList($url = FALSE) {
		if (!$url) {
			$url = REMOTE_TEST_HTTP_PATH;
		}

		$url .= '?output=xml';
		$manager =& new RemoteTestManager();
		$rss = & $manager->_getRssReader($url);
		$groupList = array();

		foreach ($rss->getItems() as $item) {
			$groupList[$item['title']] = $item['link'];
		}
		return $groupList;
	}

	function &getTestCaseList($url = FALSE) {
		if (!$url) {
			$url = REMOTE_TEST_HTTP_PATH;
		}
		$url .= '?show=cases&amp;output=xml';
		$manager =& new RemoteTestManager();
		$rss = & $manager->_getRssReader($url);
		$caseList = array();

		foreach ($rss->getItems() as $item) {
			$caseList[$item['title']] = $item['link'];
		}
		return $caseList;
	}

	function &_getRssReader($url) {
		require_once "XML/RSS.php";
		$rssReader =& new XML_RSS($url);
		$status = $rssReader->parse();
		if (PEAR::isError($status) ) {
			trigger_error($status->getMessage(),E_USER_WARNING);
		}
		return $rssReader;
	}
}
?>