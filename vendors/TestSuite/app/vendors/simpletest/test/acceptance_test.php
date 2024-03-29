<?php
// $Id: acceptance_test.php 4 2006-04-25 02:08:26Z phpnut $
require_once(dirname(__FILE__) . '/../compatibility.php');
require_once(dirname(__FILE__) . '/../browser.php');
require_once(dirname(__FILE__) . '/../web_tester.php');
require_once(dirname(__FILE__) . '/../unit_tester.php');

class TestOfLiveBrowser extends UnitTestCase {

	function testGet() {
		$browser = &new SimpleBrowser();
		$browser->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
		$this->assertTrue($browser->get('http://www.lastcraft.com/test/network_confirm.php'));
		$this->assertPattern('/target for the SimpleTest/', $browser->getContent());
		$this->assertPattern('/Request method.*?<dd>GET<\/dd>/', $browser->getContent());
		$this->assertEqual($browser->getTitle(), 'Simple test target file');
		$this->assertEqual($browser->getResponseCode(), 200);
		$this->assertEqual($browser->getMimeType(), 'text/html');
	}

	function testPost() {
		$browser = &new SimpleBrowser();
		$browser->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
		$this->assertTrue($browser->post('http://www.lastcraft.com/test/network_confirm.php'));
		$this->assertPattern('/target for the SimpleTest/', $browser->getContent());
		$this->assertPattern('/Request method.*?<dd>POST<\/dd>/', $browser->getContent());
	}

	function testAbsoluteLinkFollowing() {
		$browser = &new SimpleBrowser();
		$browser->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
		$browser->get('http://www.lastcraft.com/test/link_confirm.php');
		$this->assertTrue($browser->clickLink('Absolute'));
		$this->assertPattern('/target for the SimpleTest/', $browser->getContent());
	}

	function testRelativeLinkFollowing() {
		$browser = &new SimpleBrowser();
		$browser->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
		$browser->get('http://www.lastcraft.com/test/link_confirm.php');
		$this->assertTrue($browser->clickLink('Relative'));
		$this->assertPattern('/target for the SimpleTest/', $browser->getContent());
	}

	function testUnifiedClickLinkClicking() {
		$browser = &new SimpleBrowser();
		$browser->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
		$browser->get('http://www.lastcraft.com/test/link_confirm.php');
		$this->assertTrue($browser->click('Relative'));
		$this->assertPattern('/target for the SimpleTest/', $browser->getContent());
	}

	function testIdLinkFollowing() {
		$browser = &new SimpleBrowser();
		$browser->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
		$browser->get('http://www.lastcraft.com/test/link_confirm.php');
		$this->assertTrue($browser->clickLinkById(1));
		$this->assertPattern('/target for the SimpleTest/', $browser->getContent());
	}

	function testCookieReading() {
		$browser = &new SimpleBrowser();
		$browser->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
		$browser->get('http://www.lastcraft.com/test/set_cookies.php');
		$this->assertEqual($browser->getCurrentCookieValue('session_cookie'), 'A');
		$this->assertEqual($browser->getCurrentCookieValue('short_cookie'), 'B');
		$this->assertEqual($browser->getCurrentCookieValue('day_cookie'), 'C');
	}

	function testSimpleSubmit() {
		$browser = &new SimpleBrowser();
		$browser->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
		$browser->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($browser->clickSubmit('Go!'));
		$this->assertPattern('/Request method.*?<dd>POST<\/dd>/', $browser->getContent());
		$this->assertPattern('/go=\[Go!\]/', $browser->getContent());
	}

	function testUnifiedClickCanSubmit() {
		$browser = &new SimpleBrowser();
		$browser->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
		$browser->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($browser->click('Go!'));
		$this->assertPattern('/go=\[Go!\]/', $browser->getContent());
	}
}

class TestOfLiveFetching extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testGet() {
		$this->assertTrue($this->get('http://www.lastcraft.com/test/network_confirm.php'));
		$this->assertEqual($this->getUrl(), 'http://www.lastcraft.com/test/network_confirm.php');
		$this->assertText('target for the SimpleTest');
		$this->assertPattern('/Request method.*?<dd>GET<\/dd>/');
		$this->assertTitle('Simple test target file');
		$this->assertTitle(new PatternExpectation('/target file/'));
		$this->assertResponse(200);
		$this->assertMime('text/html');
		$this->assertHeader('connection', 'close');
		$this->assertHeader('connection', new PatternExpectation('/los/'));
	}

	function testSlowGet() {
		$this->assertTrue($this->get('http://www.lastcraft.com/test/slow_page.php'));
	}

	function testTimedOutGet() {
		$this->setConnectionTimeout(1);
		$this->ignoreErrors();
		$this->assertFalse($this->get('http://www.lastcraft.com/test/slow_page.php'));
	}

	function testPost() {
		$this->assertTrue($this->post('http://www.lastcraft.com/test/network_confirm.php'));
		$this->assertText('target for the SimpleTest');
		$this->assertPattern('/Request method.*?<dd>POST<\/dd>/');
	}

	function testGetWithData() {
		$this->get('http://www.lastcraft.com/test/network_confirm.php', array("a" => "aaa"));
		$this->assertPattern('/Request method.*?<dd>GET<\/dd>/');
		$this->assertText('a=[aaa]');
	}

	function testPostWithData() {
		$this->post('http://www.lastcraft.com/test/network_confirm.php', array("a" => "aaa"));
		$this->assertPattern('/Request method.*?<dd>POST<\/dd>/');
		$this->assertText('a=[aaa]');
	}

	function testRelativeGet() {
		$this->get('http://www.lastcraft.com/test/link_confirm.php');
		$this->assertTrue($this->get('network_confirm.php'));
		$this->assertText('target for the SimpleTest');
	}

	function testRelativePost() {
		$this->post('http://www.lastcraft.com/test/link_confirm.php');
		$this->assertTrue($this->post('network_confirm.php'));
		$this->assertText('target for the SimpleTest');
	}

	function testAbsoluteLinkFollowing() {
		$this->get('http://www.lastcraft.com/test/link_confirm.php');
		$this->assertLink('Absolute');
		$this->assertTrue($this->clickLink('Absolute'));
		$this->assertText('target for the SimpleTest');
	}

	function testRelativeLinkFollowing() {
		$this->get('http://www.lastcraft.com/test/link_confirm.php');
		$this->assertTrue($this->clickLink('Relative'));
		$this->assertText('target for the SimpleTest');
	}

	function testLinkIdFollowing() {
		$this->get('http://www.lastcraft.com/test/link_confirm.php');
		$this->assertLinkById(1);
		$this->assertTrue($this->clickLinkById(1));
		$this->assertText('target for the SimpleTest');
	}

	function testAbsoluteUrlBehavesAbsolutely() {
		$this->get('http://www.lastcraft.com/test/link_confirm.php');
		$this->get('http://www.lastcraft.com');
		$this->assertText('No guarantee of quality is given or even intended');
	}
}

class TestOfLivePageLinkingWithMinimalLinks extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testClickToExplicitelyNamedSelfReturns() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/a_page.php');
		$this->assertEqual($this->getUrl(), 'http://www.lastcraft.com/test/front_controller_style/a_page.php');
		$this->assertTitle('Simple test page with links');
		$this->clickLink('Self');
		$this->assertTitle('Simple test page with links');
	}

	function testClickToMissingPageReturnsToSamePage() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/a_page.php');
		$this->clickLink('No page');
		$this->assertTitle('Simple test page with links');
		$this->assertText('[action=no_page]');
	}

	function testClickToBareActionReturnsToSamePage() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/a_page.php');
		$this->clickLink('Bare action');
		$this->assertTitle('Simple test page with links');
		$this->assertText('[action=]');
	}

	function testClickToSingleQuestionMarkReturnsToSamePage() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/a_page.php');
		$this->clickLink('Empty query');
		$this->assertTitle('Simple test page with links');
	}

	function testClickToEmptyStringReturnsToSamePage() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/a_page.php');
		$this->clickLink('Empty link');
		$this->assertTitle('Simple test page with links');
	}

	function testClickToSingleDotGoesToCurrentDirectory() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/a_page.php');
		$this->clickLink('Current directory');
		$this->assertTitle('Simple test front controller');
	}

	function testClickBackADirectoryLevel() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/');
		$this->clickLink('Down one');
		$this->assertText('Index of /test');
	}
}

class TestOfLiveFrontControllerEmulation extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testJumpToNamedPage() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/');
		$this->assertText('Simple test front controller');
		$this->clickLink('Index');
		$this->assertResponse(200);
		$this->assertText('[action=index]');
	}

	function testJumpToUnnamedPage() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/');
		$this->clickLink('No page');
		$this->assertResponse(200);
		$this->assertText('Simple test front controller');
		$this->assertText('[action=no_page]');
	}

	function testJumpToUnnamedPageWithBareParameter() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/');
		$this->clickLink('Bare action');
		$this->assertResponse(200);
		$this->assertText('Simple test front controller');
		$this->assertText('[action=]');
	}

	function testJumpToUnnamedPageWithEmptyQuery() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/');
		$this->clickLink('Empty query');
		$this->assertResponse(200);
		$this->assertPattern('/Simple test front controller/');
		$this->assertPattern('/raw get data.*?\[\].*?get data/si');
	}

	function testJumpToUnnamedPageWithEmptyLink() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/');
		$this->clickLink('Empty link');
		$this->assertResponse(200);
		$this->assertPattern('/Simple test front controller/');
		$this->assertPattern('/raw get data.*?\[\].*?get data/si');
	}

	function testJumpBackADirectoryLevel() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/');
		$this->clickLink('Down one');
		$this->assertText('Index of /test');
	}

	function testSubmitToNamedPage() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/');
		$this->assertText('Simple test front controller');
		$this->clickSubmit('Index');
		$this->assertResponse(200);
		$this->assertText('[action=Index]');
	}

	function testSubmitToSameDirectory() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/index.php');
		$this->clickSubmit('Same directory');
		$this->assertResponse(200);
		$this->assertText('[action=Same+directory]');
	}

	function testSubmitToEmptyAction() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/index.php');
		$this->clickSubmit('Empty action');
		$this->assertResponse(200);
		$this->assertText('[action=Empty+action]');
	}

	function testSubmitToNoAction() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/index.php');
		$this->clickSubmit('No action');
		$this->assertResponse(200);
		$this->assertText('[action=No+action]');
	}

	function testSubmitBackADirectoryLevel() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/');
		$this->clickSubmit('Down one');
		$this->assertText('Index of /test');
	}

	function testSubmitToNamedPageWithMixedPostAndGet() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/?a=A');
		$this->assertText('Simple test front controller');
		$this->clickSubmit('Index post');
		$this->assertText('action=[Index post]');
		$this->assertNoText('[a=A]');
	}

	function testSubmitToSameDirectoryMixedPostAndGet() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/index.php?a=A');
		$this->clickSubmit('Same directory post');
		$this->assertText('action=[Same directory post]');
		$this->assertNoText('[a=A]');
	}

	function testSubmitToEmptyActionMixedPostAndGet() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/index.php?a=A');
		$this->clickSubmit('Empty action post');
		$this->assertText('action=[Empty action post]');
		$this->assertText('[a=A]');
	}

	function testSubmitToNoActionMixedPostAndGet() {
		$this->get('http://www.lastcraft.com/test/front_controller_style/index.php?a=A');
		$this->clickSubmit('No action post');
		$this->assertText('action=[No action post]');
		$this->assertText('[a=A]');
	}
}

class TestOfLiveHeaders extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testConfirmingHeaderExistence() {
		$this->get('http://www.lastcraft.com/');
		$this->assertHeader('content-type');
		$this->assertHeader('content-type', 'text/html');
		$this->assertHeaderPattern('content-type', '/HTML/i');
		$this->assertNoHeader('WWW-Authenticate');
	}
}
 
class TestOfLiveRedirects extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testNoRedirects() {
		$this->setMaximumRedirects(0);
		$this->get('http://www.lastcraft.com/test/redirect.php');
		$this->assertTitle('Redirection test');
	}

	function testRedirects() {
		$this->setMaximumRedirects(1);
		$this->get('http://www.lastcraft.com/test/redirect.php');
		$this->assertTitle('Simple test target file');
	}

	function testRedirectLosesGetData() {
		$this->get('http://www.lastcraft.com/test/redirect.php', array('a' => 'aaa'));
		$this->assertNoText('a=[aaa]');
	}

	function testRedirectKeepsExtraRequestDataOfItsOwn() {
		$this->get('http://www.lastcraft.com/test/redirect.php');
		$this->assertText('r=[rrr]');
	}

	function testRedirectLosesPostData() {
		$this->post('http://www.lastcraft.com/test/redirect.php', array('a' => 'aaa'));
		$this->assertTitle('Simple test target file');
		$this->assertNoText('a=[aaa]');
	}

	function testRedirectWithBaseUrlChange() {
		$this->get('http://www.lastcraft.com/test/base_change_redirect.php');
		$this->assertTitle('Simple test target file in folder');
		$this->get('http://www.lastcraft.com/test/path/base_change_redirect.php');
		$this->assertTitle('Simple test target file');
	}

	function testRedirectWithDoubleBaseUrlChange() {
		$this->get('http://www.lastcraft.com/test/double_base_change_redirect.php');
		$this->assertTitle('Simple test target file');
	}
}

class TestOfLiveCookies extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testCookieSettingAndAssertions() {
		$this->setCookie('a', 'Test cookie a');
		$this->setCookie('b', 'Test cookie b', 'www.lastcraft.com');
		$this->setCookie('c', 'Test cookie c', 'www.lastcraft.com', 'test');
		$this->get('http://www.lastcraft.com/test/network_confirm.php');
		$this->assertText('Test cookie a');
		$this->assertText('Test cookie b');
		$this->assertText('Test cookie c');
		$this->assertCookie('a');
		$this->assertCookie('b', 'Test cookie b');
		$this->assertTrue($this->getCookie('c') == 'Test cookie c');
	}

	function testNoCookieSetWhenCookiesDisabled() {
		$this->setCookie('a', 'Test cookie a');
		$this->ignoreCookies();
		$this->get('http://www.lastcraft.com/test/network_confirm.php');
		$this->assertNoText('Test cookie a');
	}

	function testCookieReading() {
		$this->get('http://www.lastcraft.com/test/set_cookies.php');
		$this->assertCookie('session_cookie', 'A');
		$this->assertCookie('short_cookie', 'B');
		$this->assertCookie('day_cookie', 'C');
	}
	 
	function testNoCookieReadingWhenCookiesDisabled() {
		$this->ignoreCookies();
		$this->get('http://www.lastcraft.com/test/set_cookies.php');
		$this->assertNoCookie('session_cookie');
		$this->assertNoCookie('short_cookie');
		$this->assertNoCookie('day_cookie');
	}
	 
	function testCookiePatternAssertions() {
		$this->get('http://www.lastcraft.com/test/set_cookies.php');
		$this->assertCookie('session_cookie', new PatternExpectation('/a/i'));
	}

	function testTemporaryCookieExpiry() {
		$this->get('http://www.lastcraft.com/test/set_cookies.php');
		$this->restart();
		$this->assertNoCookie('session_cookie');
		$this->assertCookie('day_cookie', 'C');
	}

	function testTimedCookieExpiryWith100SecondMargin() {
		$this->get('http://www.lastcraft.com/test/set_cookies.php');
		$this->ageCookies(3600);
		$this->restart(time() + 100);
		$this->assertNoCookie('session_cookie');
		$this->assertNoCookie('hour_cookie');
		$this->assertCookie('day_cookie', 'C');
	}

	function testNoClockOverDriftBy100Seconds() {
		$this->get('http://www.lastcraft.com/test/set_cookies.php');
		$this->restart(time() + 200);
		$this->assertNoCookie(
                    'short_cookie',
                    '%s -> Please check your computer clock setting if you are not using NTP');
	}

	function testNoClockUnderDriftBy100Seconds() {
		$this->get('http://www.lastcraft.com/test/set_cookies.php');
		$this->restart(time() + 0);
		$this->assertCookie(
                    'short_cookie',
                    'B',
                    '%s -> Please check your computer clock setting if you are not using NTP');
	}

	function testCookiePath() {
		$this->get('http://www.lastcraft.com/test/set_cookies.php');
		$this->assertNoCookie('path_cookie', 'D');
		$this->get('./path/show_cookies.php');
		$this->assertPattern('/path_cookie/');
		$this->assertCookie('path_cookie', 'D');
	}
}

class TestOfLiveForms extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testSimpleSubmit() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertPattern('/Request method.*?<dd>POST<\/dd>/');
		$this->assertText('go=[Go!]');
	}

	function testDefaultFormValues() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertFieldByName('a', '');
		$this->assertFieldByName('b', 'Default text');
		$this->assertFieldByName('c', '');
		$this->assertFieldByName('d', 'd1');
		$this->assertFieldByName('e', false);
		$this->assertFieldByName('f', 'on');
		$this->assertFieldByName('g', 'g3');
		$this->assertFieldByName('h', 2);
		$this->assertFieldByName('go', 'Go!');
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertText('go=[Go!]');
		$this->assertText('a=[]');
		$this->assertText('b=[Default text]');
		$this->assertText('c=[]');
		$this->assertText('d=[d1]');
		$this->assertNoText('e=[');
		$this->assertText('f=[on]');
		$this->assertText('g=[g3]');
	}

	function testFormSubmissionByButtonLabel() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->setFieldByName('a', 'aaa');
		$this->setFieldByName('b', 'bbb');
		$this->setFieldByName('c', 'ccc');
		$this->setFieldByName('d', 'D2');
		$this->setFieldByName('e', 'on');
		$this->setFieldByName('f', false);
		$this->setFieldByName('g', 'g2');
		$this->setFieldByName('h', 1);
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertText('a=[aaa]');
		$this->assertText('b=[bbb]');
		$this->assertText('c=[ccc]');
		$this->assertText('d=[d2]');
		$this->assertText('e=[on]');
		$this->assertNoText('f=[');
		$this->assertText('g=[g2]');
	}

	function testAdditionalFormValues() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($this->clickSubmit('Go!', array('add' => 'A')));
		$this->assertText('go=[Go!]');
		$this->assertText('add=[A]');
	}

	function testFormSubmissionByName() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->setFieldByName('a', 'A');
		$this->assertTrue($this->clickSubmitByName('go'));
		$this->assertText('a=[A]');
	}

	function testFormSubmissionByNameAndAdditionalParameters() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($this->clickSubmitByName('go', array('add' => 'A')));
		$this->assertText('go=[Go!]');
		$this->assertText('add=[A]');
	}

	function testFormSubmissionBySubmitButtonLabeledSubmit() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($this->clickSubmitByName('test'));
		$this->assertText('test=[Submit]');
	}

	function testFormSubmissionWithIds() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertFieldById(1, '');
		$this->assertFieldById(2, 'Default text');
		$this->assertFieldById(3, '');
		$this->assertFieldById(4, 'd1');
		$this->assertFieldById(5, false);
		$this->assertFieldById(6, 'on');
		$this->assertFieldById(8, 'g3');
		$this->assertFieldById(11, 2);
		$this->setFieldById(1, 'aaa');
		$this->setFieldById(2, 'bbb');
		$this->setFieldById(3, 'ccc');
		$this->setFieldById(4, 'D2');
		$this->setFieldById(5, 'on');
		$this->setFieldById(6, false);
		$this->setFieldById(8, 'g2');
		$this->setFieldById(11, 'H1');
		$this->assertTrue($this->clickSubmitById(99));
		$this->assertText('a=[aaa]');
		$this->assertText('b=[bbb]');
		$this->assertText('c=[ccc]');
		$this->assertText('d=[d2]');
		$this->assertText('e=[on]');
		$this->assertNoText('f=[');
		$this->assertText('g=[g2]');
		$this->assertText('h=[1]');
		$this->assertText('go=[Go!]');
	}

	function testFormSubmissionWithLabels() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertField('Text A', '');
		$this->assertField('Text B', 'Default text');
		$this->assertField('Text area C', '');
		$this->assertField('Selection D', 'd1');
		$this->assertField('Checkbox E', false);
		$this->assertField('Checkbox F', 'on');
		$this->assertField('3', 'g3');
		$this->assertField('Selection H', 2);
		$this->setField('Text A', 'aaa');
		$this->setField('Text B', 'bbb');
		$this->setField('Text area C', 'ccc');
		$this->setField('Selection D', 'D2');
		$this->setField('Checkbox E', 'on');
		$this->setField('Checkbox F', false);
		$this->setField('2', 'g2');
		$this->setField('Selection H', 'H1');
		$this->clickSubmit('Go!');
		$this->assertText('a=[aaa]');
		$this->assertText('b=[bbb]');
		$this->assertText('c=[ccc]');
		$this->assertText('d=[d2]');
		$this->assertText('e=[on]');
		$this->assertNoText('f=[');
		$this->assertText('g=[g2]');
		$this->assertText('h=[1]');
		$this->assertText('go=[Go!]');
	}

	function testSettingCheckboxWithBooleanTrueSetsUnderlyingValue() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->setField('Checkbox E', true);
		$this->assertField('Checkbox E', 'on');
		$this->clickSubmit('Go!');
		$this->assertText('e=[on]');
	}

	function testFormSubmissionWithMixedPostAndGet() {
		$this->get('http://www.lastcraft.com/test/form_with_mixed_post_and_get.html');
		$this->setField('Text A', 'Hello');
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertText('a=[Hello]');
		$this->assertText('x=[X]');
		$this->assertText('y=[Y]');
	}

	function testFormSubmissionWithMixedPostAndEncodedGet() {
		$this->get('http://www.lastcraft.com/test/form_with_mixed_post_and_get.html');
		$this->setField('Text B', 'Hello');
		$this->assertTrue($this->clickSubmit('Go encoded!'));
		$this->assertText('b=[Hello]');
		$this->assertText('x=[X]');
		$this->assertText('y=[Y]');
	}

	function testFormSubmissionWithoutAction() {
		$this->get('http://www.lastcraft.com/test/form_without_action.php?test=test');
		$this->assertText('_GET : [test]');
		$this->assertTrue($this->clickSubmit('Submit Post With Empty Action'));
		$this->assertText('_GET : [test]');
		$this->assertText('_POST : [test]');
	}

	function testImageSubmissionByLabel() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($this->clickImage('Image go!', 10, 12));
		$this->assertText('go_x=[10]');
		$this->assertText('go_y=[12]');
	}

	function testImageSubmissionByLabelWithAdditionalParameters() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($this->clickImage('Image go!', 10, 12, array('add' => 'A')));
		$this->assertText('add=[A]');
	}

	function testImageSubmissionByName() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($this->clickImageByName('go', 10, 12));
		$this->assertText('go_x=[10]');
		$this->assertText('go_y=[12]');
	}

	function testImageSubmissionById() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($this->clickImageById(97, 10, 12));
		$this->assertText('go_x=[10]');
		$this->assertText('go_y=[12]');
	}

	function testButtonSubmissionByLabel() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($this->clickSubmit('Button go!', 10, 12));
		$this->assertPattern('/go=\[ButtonGo\]/s');
	}

	function testNamelessSubmitSendsNoValue() {
		$this->get('http://www.lastcraft.com/test/form_with_unnamed_submit.html');
		$this->click('Go!');
		$this->assertNoText('Go!');
		$this->assertNoText('submit');
	}

	function testNamelessImageSendsXAndYValues() {
		$this->get('http://www.lastcraft.com/test/form_with_unnamed_submit.html');
		$this->clickImage('Image go!', 4, 5);
		$this->assertNoText('ImageGo');
		$this->assertText('x=[4]');
		$this->assertText('y=[5]');
	}

	function testNamelessButtonSendsNoValue() {
		$this->get('http://www.lastcraft.com/test/form_with_unnamed_submit.html');
		$this->click('Button Go!');
		$this->assertNoText('ButtonGo');
	}

	function testSelfSubmit() {
		$this->get('http://www.lastcraft.com/test/self_form.php');
		$this->assertNoText('[Submitted]');
		$this->assertNoText('[Wrong form]');
		$this->assertTrue($this->clickSubmit());
		$this->assertText('[Submitted]');
		$this->assertNoText('[Wrong form]');
		$this->assertTitle('Test of form self submission');
	}

	function testSelfSubmitWithParameters() {
		$this->get('http://www.lastcraft.com/test/self_form.php');
		$this->setFieldByName('visible', 'Resent');
		$this->assertTrue($this->clickSubmit());
		$this->assertText('[Resent]');
	}

	function testSettingOfBlankOption() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->assertTrue($this->setFieldByName('d', ''));
		$this->clickSubmit('Go!');
		$this->assertText('d=[]');
	}

	function testAssertingFieldValueWithPattern() {
		$this->get('http://www.lastcraft.com/test/form.html');
		$this->setField('c', 'A very long string');
		$this->assertField('c', new PatternExpectation('/very long/'));
	}

	function testSendingMultipartFormDataEncodedForm() {
		$this->get('http://www.lastcraft.com/test/form_data_encoded_form.html');
		$this->assertField('Text A', '');
		$this->assertField('Text B', 'Default text');
		$this->assertField('Text area C', '');
		$this->assertField('Selection D', 'd1');
		$this->assertField('Checkbox E', false);
		$this->assertField('Checkbox F', 'on');
		$this->assertField('3', 'g3');
		$this->assertField('Selection H', 2);
		$this->setField('Text A', 'aaa');
		$this->setField('Text B', 'bbb');
		$this->setField('Text area C', 'ccc');
		$this->setField('Selection D', 'D2');
		$this->setField('Checkbox E', 'on');
		$this->setField('Checkbox F', false);
		$this->setField('2', 'g2');
		$this->setField('Selection H', 'H1');
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertText('a=[aaa]');
		$this->assertText('b=[bbb]');
		$this->assertText('c=[ccc]');
		$this->assertText('d=[d2]');
		$this->assertText('e=[on]');
		$this->assertNoText('f=[');
		$this->assertText('g=[g2]');
		$this->assertText('h=[1]');
		$this->assertText('go=[Go!]');
	}

	function testSettingVariousBlanksInFields() {
		$this->get('http://www.lastcraft.com/test/form_with_false_defaults.html');
		$this->assertField('Text A', '');
		$this->setField('Text A', '0');
		$this->assertField('Text A', '0');
		$this->assertField('Text area B', '');
		$this->setField('Text area B', '0');
		$this->assertField('Text area B', '0');
		$this->assertField('Text area C', "                ");
		$this->assertField('Selection D', '');
		$this->setField('Selection D', 'D2');
		$this->assertField('Selection D', 'D2');
		$this->setField('Selection D', 'D3');
		$this->assertField('Selection D', '0');
		$this->setField('Selection D', 'D4');
		$this->assertField('Selection D', '?');
		$this->assertField('Checkbox E', '');
		$this->assertField('Checkbox F', 'on');
		$this->assertField('Checkbox G', '0');
		$this->assertField('Checkbox H', '?');
		$this->assertFieldByName('i', 'on');
		$this->setFieldByName('i', '');
		$this->assertFieldByName('i', '');
		$this->setFieldByName('i', '0');
		$this->assertFieldByName('i', '0');
		$this->setFieldByName('i', '?');
		$this->assertFieldByName('i', '?');
	}

	function testSubmissionOfBlankFields() {
		$this->get('http://www.lastcraft.com/test/form_with_false_defaults.html');
		$this->setField('Text A', '');
		$this->setField('Text area B', '');
		$this->setFieldByName('i', '');
		$this->click('Go!');
		$this->assertText('a=[]');
		$this->assertText('b=[]');
		$this->assertPattern('/c=\[                \]/');
		$this->assertText('d=[]');
		$this->assertText('e=[]');
		$this->assertText('i=[]');
	}

	function testSubmissionOfEmptyValues() {
		$this->get('http://www.lastcraft.com/test/form_with_false_defaults.html');
		$this->setField('Selection D', 'D2');
		$this->click('Go!');
		$this->assertText('a=[]');
		$this->assertText('b=[]');
		$this->assertText('d=[D2]');
		$this->assertText('f=[on]');
		$this->assertText('i=[on]');
	}

	function testSubmissionOfZeroes() {
		$this->get('http://www.lastcraft.com/test/form_with_false_defaults.html');
		$this->setField('Text A', '0');
		$this->setField('Text area B', '0');
		$this->setField('Selection D', 'D3');
		$this->setFieldByName('i', '0');
		$this->click('Go!');
		$this->assertText('a=[0]');
		$this->assertText('b=[0]');
		$this->assertText('d=[0]');
		$this->assertText('g=[0]');
		$this->assertText('i=[0]');
	}

	function testSubmissionOfQuestionMarks() {
		$this->get('http://www.lastcraft.com/test/form_with_false_defaults.html');
		$this->setField('Text A', '?');
		$this->setField('Text area B', '?');
		$this->setField('Selection D', 'D4');
		$this->setFieldByName('i', '?');
		$this->click('Go!');
		$this->assertText('a=[?]');
		$this->assertText('b=[?]');
		$this->assertText('d=[?]');
		$this->assertText('h=[?]');
		$this->assertText('i=[?]');
	}

	function testSubmissionOfHtmlEncodedValues() {
		$this->get('http://www.lastcraft.com/test/form_with_tricky_defaults.html');
		$this->assertField('Text A', '&\'"<>');
		$this->assertField('Text B', '"');
		$this->assertField('Text area C', '&\'"<>');
		$this->assertField('Selection D', "'");
		$this->assertField('Checkbox E', '&\'"<>');
		$this->assertField('Checkbox F', false);
		$this->assertFieldByname('i', "'");
		$this->click('Go!');
		$this->assertText('a=[&\'"<>, "]');
		$this->assertText('c=[&\'"<>]');
		$this->assertText("d=[']");
		$this->assertText('e=[&\'"<>]');
		$this->assertText("i=[']");
	}
}

class TestOfLiveMultiValueWidgets extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testDefaultFormValueSubmission() {
		$this->get('http://www.lastcraft.com/test/multiple_widget_form.html');
		$this->assertFieldByName('a', array('a2', 'a3'));
		$this->assertFieldByName('b', array('b2', 'b3'));
		$this->assertFieldByName('c[]', array('c2', 'c3'));
		$this->assertFieldByName('d', array('2', '3'));
		$this->assertFieldByName('e', array('2', '3'));
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertText('a=[a2, a3]');
		$this->assertText('b=[b2, b3]');
		$this->assertText('c=[c2, c3]');
		$this->assertText('d=[2, 3]');
		$this->assertText('e=[2, 3]');
	}

	function testSubmittingMultipleValues() {
		$this->get('http://www.lastcraft.com/test/multiple_widget_form.html');
		$this->setFieldByName('a', array('a1', 'a4'));
		$this->assertFieldByName('a', array('a1', 'a4'));
		$this->assertFieldByName('a', array('a4', 'a1'));
		$this->setFieldByName('b', array('b1', 'b4'));
		$this->assertFieldByName('b', array('b1', 'b4'));
		$this->setFieldByName('c[]', array('c1', 'c4'));
		$this->assertField('c[]', array('c1', 'c4'));
		$this->setFieldByName('d', array('1', '4'));
		$this->assertField('d', array('1', '4'));
		$this->setFieldByName('e', array('e1', 'e4'));
		$this->assertField('e', array('1', '4'));
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertText('a=[a1, a4]');
		$this->assertText('b=[b1, b4]');
		$this->assertText('c=[c1, c4]');
		$this->assertText('d=[1, 4]');
		$this->assertText('e=[1, 4]');
	}

	function testSettingByOptionValue() {
		$this->get('http://www.lastcraft.com/test/multiple_widget_form.html');
		$this->setFieldByName('d', array('1', '4'));
		$this->assertField('d', array('1', '4'));
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertText('d=[1, 4]');
	}

	function testSubmittingMultipleValuesByLabel() {
		$this->get('http://www.lastcraft.com/test/multiple_widget_form.html');
		$this->setField('Multiple selection A', array('a1', 'a4'));
		$this->assertField('Multiple selection A', array('a1', 'a4'));
		$this->assertField('Multiple selection A', array('a4', 'a1'));
		$this->setField('multiple selection C', array('c1', 'c4'));
		$this->assertField('multiple selection C', array('c1', 'c4'));
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertText('a=[a1, a4]');
		$this->assertText('c=[c1, c4]');
	}

	function testSavantStyleHiddenFieldDefaults() {
		$this->get('http://www.lastcraft.com/test/savant_style_form.html');
		$this->assertFieldByName('a', array('a0'));
		$this->assertFieldByName('b', array('b0'));
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertText('a=[a0]');
		$this->assertText('b=[b0]');
	}

	function testSavantStyleHiddenDefaultsAreOverridden() {
		$this->get('http://www.lastcraft.com/test/savant_style_form.html');
		$this->assertTrue($this->setFieldByName('a', array('a1')));
		$this->assertTrue($this->setFieldByName('b', 'b1'));
		$this->assertTrue($this->clickSubmit('Go!'));
		$this->assertText('a=[a1]');
		$this->assertText('b=[b1]');
	}

	function testSavantStyleFormSettingById() {
		$this->get('http://www.lastcraft.com/test/savant_style_form.html');
		$this->assertFieldById(1, array('a0'));
		$this->assertFieldById(4, array('b0'));
		$this->assertTrue($this->setFieldById(2, 'a1'));
		$this->assertTrue($this->setFieldById(5, 'b1'));
		$this->assertTrue($this->clickSubmitById(99));
		$this->assertText('a=[a1]');
		$this->assertText('b=[b1]');
	}
}

class TestOfFileUploads extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testSingleFileUpload() {
		$this->get('http://www.lastcraft.com/test/upload_form.html');
		$this->assertTrue($this->setField('Content:',
		dirname(__FILE__) . '/support/upload_sample.txt'));
		$this->assertField('Content:', dirname(__FILE__) . '/support/upload_sample.txt');
		$this->click('Go!');
		$this->assertText('Sample for testing file upload');
	}

	function testMultipleFileUpload() {
		$this->get('http://www.lastcraft.com/test/upload_form.html');
		$this->assertTrue($this->setField('Content:',
		dirname(__FILE__) . '/support/upload_sample.txt'));
		$this->assertTrue($this->setField('Supplemental:',
		dirname(__FILE__) . '/support/supplementary_upload_sample.txt'));
		$this->assertField('Supplemental:',
		dirname(__FILE__) . '/support/supplementary_upload_sample.txt');
		$this->click('Go!');
		$this->assertText('Sample for testing file upload');
		$this->assertText('Some more text content');
	}

	function testBinaryFileUpload() {
		$this->get('http://www.lastcraft.com/test/upload_form.html');
		$this->assertTrue($this->setField('Content:',
		dirname(__FILE__) . '/support/latin1_sample'));
		$this->click('Go!');
		$this->assertText(
		implode('', file(dirname(__FILE__) . '/support/latin1_sample')));
	}
}

class TestOfLiveHistoryNavigation extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testRetry() {
		$this->get('http://www.lastcraft.com/test/cookie_based_counter.php');
		$this->assertPattern('/count: 1/i');
		$this->retry();
		$this->assertPattern('/count: 2/i');
		$this->retry();
		$this->assertPattern('/count: 3/i');
	}

	function testOfBackButton() {
		$this->get('http://www.lastcraft.com/test/1.html');
		$this->clickLink('2');
		$this->assertTitle('2');
		$this->assertTrue($this->back());
		$this->assertTitle('1');
		$this->assertTrue($this->forward());
		$this->assertTitle('2');
		$this->assertFalse($this->forward());
	}

	function testGetRetryResubmitsData() {
		$this->assertTrue($this->get(
                    'http://www.lastcraft.com/test/network_confirm.php?a=aaa'));
		$this->assertPattern('/Request method.*?<dd>GET<\/dd>/');
		$this->assertText('a=[aaa]');
		$this->retry();
		$this->assertPattern('/Request method.*?<dd>GET<\/dd>/');
		$this->assertText('a=[aaa]');
	}

	function testGetRetryResubmitsExtraData() {
		$this->assertTrue($this->get(
                    'http://www.lastcraft.com/test/network_confirm.php',
		array('a' => 'aaa')));
		$this->assertPattern('/Request method.*?<dd>GET<\/dd>/');
		$this->assertText('a=[aaa]');
		$this->retry();
		$this->assertPattern('/Request method.*?<dd>GET<\/dd>/');
		$this->assertText('a=[aaa]');
	}

	function testPostRetryResubmitsData() {
		$this->assertTrue($this->post(
                    'http://www.lastcraft.com/test/network_confirm.php',
		array('a' => 'aaa')));
		$this->assertPattern('/Request method.*?<dd>POST<\/dd>/');
		$this->assertText('a=[aaa]');
		$this->retry();
		$this->assertPattern('/Request method.*?<dd>POST<\/dd>/');
		$this->assertText('a=[aaa]');
	}

	function testGetRetryResubmitsRepeatedData() {
		$this->assertTrue($this->get(
                    'http://www.lastcraft.com/test/network_confirm.php?a=1&a=2'));
		$this->assertPattern('/Request method.*?<dd>GET<\/dd>/');
		$this->assertText('a=[1, 2]');
		$this->retry();
		$this->assertPattern('/Request method.*?<dd>GET<\/dd>/');
		$this->assertText('a=[1, 2]');
	}
}

class TestOfLiveAuthentication extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testChallengeFromProtectedPage() {
		$this->get('http://www.lastcraft.com/test/protected/');
		$this->assertResponse(401);
		$this->assertAuthentication('Basic');
		$this->assertRealm('SimpleTest basic authentication');
		$this->assertRealm(new PatternExpectation('/simpletest/i'));
		$this->authenticate('test', 'secret');
		$this->assertResponse(200);
		$this->retry();
		$this->assertResponse(200);
	}

	function testTrailingSlashImpliedWithinRealm() {
		$this->get('http://www.lastcraft.com/test/protected/');
		$this->authenticate('test', 'secret');
		$this->assertResponse(200);
		$this->get('http://www.lastcraft.com/test/protected');
		$this->assertResponse(200);
	}

	function testTrailingSlashImpliedSettingRealm() {
		$this->get('http://www.lastcraft.com/test/protected');
		$this->authenticate('test', 'secret');
		$this->assertResponse(200);
		$this->get('http://www.lastcraft.com/test/protected/');
		$this->assertResponse(200);
	}

	function testEncodedAuthenticationFetchesPage() {
		$this->get('http://test:secret@www.lastcraft.com/test/protected/');
		$this->assertResponse(200);
	}

	function testEncodedAuthenticationFetchesPageAfterTrailingSlashRedirect() {
		$this->get('http://test:secret@www.lastcraft.com/test/protected');
		$this->assertResponse(200);
	}

	function testRealmExtendsToWholeDirectory() {
		$this->get('http://www.lastcraft.com/test/protected/1.html');
		$this->authenticate('test', 'secret');
		$this->clickLink('2');
		$this->assertResponse(200);
		$this->clickLink('3');
		$this->assertResponse(200);
	}

	function testRedirectKeepsAuthentication() {
		$this->get('http://www.lastcraft.com/test/protected/local_redirect.php');
		$this->authenticate('test', 'secret');
		$this->assertTitle('Simple test target file');
	}

	function testRedirectKeepsEncodedAuthentication() {
		$this->get('http://test:secret@www.lastcraft.com/test/protected/local_redirect.php');
		$this->assertResponse(200);
		$this->assertTitle('Simple test target file');
	}

	function testSessionRestartLosesAuthentication() {
		$this->get('http://www.lastcraft.com/test/protected/');
		$this->authenticate('test', 'secret');
		$this->assertResponse(200);
		$this->restart();
		$this->get('http://www.lastcraft.com/test/protected/');
		$this->assertResponse(401);
	}
}

class TestOfLoadingFrames extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testNoFramesContentWhenFramesDisabled() {
		$this->ignoreFrames();
		$this->get('http://www.lastcraft.com/test/one_page_frameset.html');
		$this->assertTitle('Frameset for testing of SimpleTest');
		$this->assertText('This content is for no frames only');
	}

	function testPatternMatchCanReadTheOnlyFrame() {
		$this->get('http://www.lastcraft.com/test/one_page_frameset.html');
		$this->assertText('A target for the SimpleTest test suite');
		$this->assertNoText('This content is for no frames only');
	}

	function testMessyFramesetResponsesByName() {
		$this->assertTrue($this->get(
                    'http://www.lastcraft.com/test/messy_frameset.html'));
		$this->assertTitle('Frameset for testing of SimpleTest');

		$this->assertTrue($this->setFrameFocus('Front controller'));
		$this->assertResponse(200);
		$this->assertText('Simple test front controller');

		$this->assertTrue($this->setFrameFocus('One'));
		$this->assertResponse(200);
		$this->assertLink('2');

		$this->assertTrue($this->setFrameFocus('Frame links'));
		$this->assertResponse(200);
		$this->assertLink('Set one to 2');

		$this->assertTrue($this->setFrameFocus('Counter'));
		$this->assertResponse(200);
		$this->assertText('Count: 1');

		$this->assertTrue($this->setFrameFocus('Redirected'));
		$this->assertResponse(200);
		$this->assertText('r=rrr');

		$this->assertTrue($this->setFrameFocus('Protected'));
		$this->assertResponse(401);

		$this->assertTrue($this->setFrameFocus('Protected redirect'));
		$this->assertResponse(401);

		$this->assertTrue($this->setFrameFocusByIndex(1));
		$this->assertResponse(200);
		$this->assertText('Simple test front controller');

		$this->assertTrue($this->setFrameFocusByIndex(2));
		$this->assertResponse(200);
		$this->assertLink('2');

		$this->assertTrue($this->setFrameFocusByIndex(3));
		$this->assertResponse(200);
		$this->assertLink('Set one to 2');

		$this->assertTrue($this->setFrameFocusByIndex(4));
		$this->assertResponse(200);
		$this->assertText('Count: 1');

		$this->assertTrue($this->setFrameFocusByIndex(5));
		$this->assertResponse(200);
		$this->assertText('r=rrr');

		$this->assertTrue($this->setFrameFocusByIndex(6));
		$this->assertResponse(401);

		$this->assertTrue($this->setFrameFocusByIndex(7));
	}

	function testReloadingFramesetPage() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->assertText('Count: 1');
		$this->retry();
		$this->assertText('Count: 2');
		$this->retry();
		$this->assertText('Count: 3');
	}

	function testReloadingSingleFrameWithCookieCounter() {
		$this->get('http://www.lastcraft.com/test/counting_frameset.html');
		$this->setFrameFocus('a');
		$this->assertText('Count: 1');
		$this->setFrameFocus('b');
		$this->assertText('Count: 2');

		$this->setFrameFocus('a');
		$this->retry();
		$this->assertText('Count: 3');
		$this->retry();
		$this->assertText('Count: 4');
		$this->setFrameFocus('b');
		$this->assertText('Count: 2');
	}

	function testReloadingFrameWhenUnfocusedReloadsWholeFrameset() {
		$this->get('http://www.lastcraft.com/test/counting_frameset.html');
		$this->setFrameFocus('a');
		$this->assertText('Count: 1');
		$this->setFrameFocus('b');
		$this->assertText('Count: 2');

		$this->clearFrameFocus('a');
		$this->retry();

		$this->assertTitle('Frameset for testing of SimpleTest');
		$this->setFrameFocus('a');
		$this->assertText('Count: 3');
		$this->setFrameFocus('b');
		$this->assertText('Count: 4');
	}

	function testClickingNormalLinkReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickLink('2');
		$this->assertLink('3');
		$this->assertText('Simple test front controller');
	}

	function testJumpToNamedPageReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->assertPattern('/Simple test front controller/');
		$this->clickLink('Index');
		$this->assertResponse(200);
		$this->assertText('[action=index]');
		$this->assertText('Count: 1');
	}

	function testJumpToUnnamedPageReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickLink('No page');
		$this->assertResponse(200);
		$this->assertText('Simple test front controller');
		$this->assertText('[action=no_page]');
		$this->assertText('Count: 1');
	}

	function testJumpToUnnamedPageWithBareParameterReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickLink('Bare action');
		$this->assertResponse(200);
		$this->assertText('Simple test front controller');
		$this->assertText('[action=]');
		$this->assertText('Count: 1');
	}

	function testJumpToUnnamedPageWithEmptyQueryReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickLink('Empty query');
		$this->assertResponse(200);
		$this->assertPattern('/Simple test front controller/');
		$this->assertPattern('/raw get data.*?\[\].*?get data/si');
		$this->assertPattern('/Count: 1/');
	}

	function testJumpToUnnamedPageWithEmptyLinkReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickLink('Empty link');
		$this->assertResponse(200);
		$this->assertPattern('/Simple test front controller/');
		$this->assertPattern('/raw get data.*?\[\].*?get data/si');
		$this->assertPattern('/Count: 1/');
	}

	function testJumpBackADirectoryLevelReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickLink('Down one');
		$this->assertPattern('/index of \/test/i');
		$this->assertPattern('/Count: 1/');
	}

	function testSubmitToNamedPageReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->assertPattern('/Simple test front controller/');
		$this->clickSubmit('Index');
		$this->assertResponse(200);
		$this->assertText('[action=Index]');
		$this->assertText('Count: 1');
	}

	function testSubmitToSameDirectoryReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickSubmit('Same directory');
		$this->assertResponse(200);
		$this->assertText('[action=Same+directory]');
		$this->assertText('Count: 1');
	}

	function testSubmitToEmptyActionReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickSubmit('Empty action');
		$this->assertResponse(200);
		$this->assertText('[action=Empty+action]');
		$this->assertText('Count: 1');
	}

	function testSubmitToNoActionReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickSubmit('No action');
		$this->assertResponse(200);
		$this->assertText('[action=No+action]');
		$this->assertText('Count: 1');
	}

	function testSubmitBackADirectoryLevelReplacesJustThatFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickSubmit('Down one');
		$this->assertPattern('/index of \/test/i');
		$this->assertPattern('/Count: 1/');
	}

	function testTopLinkExitsFrameset() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->clickLink('Exit the frameset');
		$this->assertTitle('Simple test target file');
	}

	function testLinkInOnePageCanLoadAnother() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->assertNoLink('3');
		$this->clickLink('Set one to 2');
		$this->assertLink('3');
		$this->assertNoLink('2');
		$this->assertTitle('Frameset for testing of SimpleTest');
	}
}

class TestOfFrameAuthentication extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testUnauthenticatedFrameSendsChallenge() {
		$this->get('http://www.lastcraft.com/test/protected/');
		$this->setFrameFocus('Protected');
		$this->assertAuthentication('Basic');
		$this->assertRealm('SimpleTest basic authentication');
		$this->assertResponse(401);
	}

	function testCanReadFrameFromAlreadyAuthenticatedRealm() {
		$this->get('http://www.lastcraft.com/test/protected/');
		$this->authenticate('test', 'secret');
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->setFrameFocus('Protected');
		$this->assertResponse(200);
		$this->assertText('A target for the SimpleTest test suite');
	}

	function testCanAuthenticateFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->setFrameFocus('Protected');
		$this->authenticate('test', 'secret');
		$this->assertResponse(200);
		$this->assertText('A target for the SimpleTest test suite');
		$this->clearFrameFocus();
		$this->assertText('Count: 1');
	}

	function testCanAuthenticateRedirectedFrame() {
		$this->get('http://www.lastcraft.com/test/messy_frameset.html');
		$this->setFrameFocus('Protected redirect');
		$this->assertResponse(401);
		$this->authenticate('test', 'secret');
		$this->assertResponse(200);
		$this->assertText('A target for the SimpleTest test suite');
		$this->clearFrameFocus();
		$this->assertText('Count: 1');
	}
}

class TestOfNestedFrames extends WebTestCase {
	function setUp() {
		$this->addHeader('User-Agent: SimpleTest ' . SimpleTest::getVersion());
	}

	function testCanNavigateToSpecificContent() {
		$this->get('http://www.lastcraft.com/test/nested_frameset.html');
		$this->assertTitle('Nested frameset for testing of SimpleTest');

		$this->assertPattern('/This is frame A/');
		$this->assertPattern('/This is frame B/');
		$this->assertPattern('/Simple test front controller/');
		$this->assertLink('2');
		$this->assertLink('Set one to 2');
		$this->assertPattern('/Count: 1/');
		$this->assertPattern('/r=rrr/');

		$this->setFrameFocus('pair');
		$this->assertPattern('/This is frame A/');
		$this->assertPattern('/This is frame B/');
		$this->assertNoPattern('/Simple test front controller/');
		$this->assertNoLink('2');

		$this->setFrameFocus('aaa');
		$this->assertPattern('/This is frame A/');
		$this->assertNoPattern('/This is frame B/');

		$this->clearFrameFocus();
		$this->assertResponse(200);
		$this->setFrameFocus('messy');
		$this->assertResponse(200);
		$this->setFrameFocus('Front controller');
		$this->assertResponse(200);
		$this->assertPattern('/Simple test front controller/');
		$this->assertNoLink('2');
	}

	function testReloadingFramesetPage() {
		$this->get('http://www.lastcraft.com/test/nested_frameset.html');
		$this->assertPattern('/Count: 1/');
		$this->retry();
		$this->assertPattern('/Count: 2/');
		$this->retry();
		$this->assertPattern('/Count: 3/');
	}

	function testRetryingNestedPageOnlyRetriesThatSet() {
		$this->get('http://www.lastcraft.com/test/nested_frameset.html');
		$this->assertPattern('/Count: 1/');
		$this->setFrameFocus('messy');
		$this->retry();
		$this->assertPattern('/Count: 2/');
		$this->setFrameFocus('Counter');
		$this->retry();
		$this->assertPattern('/Count: 3/');

		$this->clearFrameFocus();
		$this->setFrameFocus('messy');
		$this->setFrameFocus('Front controller');
		$this->retry();

		$this->clearFrameFocus();
		$this->assertPattern('/Count: 3/');
	}

	function testAuthenticatingNestedPage() {
		$this->get('http://www.lastcraft.com/test/nested_frameset.html');
		$this->setFrameFocus('messy');
		$this->setFrameFocus('Protected');
		$this->assertAuthentication('Basic');
		$this->assertRealm('SimpleTest basic authentication');
		$this->assertResponse(401);

		$this->authenticate('test', 'secret');
		$this->assertResponse(200);
		$this->assertPattern('/A target for the SimpleTest test suite/');
	}
}
?>