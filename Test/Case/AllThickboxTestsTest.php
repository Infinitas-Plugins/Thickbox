<?php
App::uses('AllTestsBase', 'Test/Lib');

class AllThickboxTestsTest extends AllTestsBase {

/**
 * Suite define the tests for this suite
 *
 * @return void
 */
	public static function suite() {
		$suite = new CakeTestSuite('All Thickbox test');

		$path = CakePlugin::path('Thickbox') . 'Test' . DS . 'Case' . DS;
		$suite->addTestDirectoryRecursive($path);

		return $suite;
	}
}
