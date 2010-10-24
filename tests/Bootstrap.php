<?php


error_reporting( E_ALL | E_STRICT );

$zircRoot        = realpath(dirname(__DIR__));
$zircCoreLibrary = "$zircRoot/library";
$zircCoreTests   = "$zircRoot/tests";

$path = array(
	$zircCoreLibrary,
	$zircCoreTests,
	get_include_path(),
);
set_include_path(implode(PATH_SEPARATOR, $path));

include __DIR__ . '/_autoload.php';

if (is_readable($zircCoreTests . DIRECTORY_SEPARATOR . 'TestConfiguration.php')) {
	require_once $zircCoreTests . DIRECTORY_SEPARATOR . 'TestConfiguration.php';
} else {
	require_once $zircCoreTests . DIRECTORY_SEPARATOR . 'TestConfiguration.php.default';
}

if (defined('TESTS_GENERATE_REPORT') && TESTS_GENERATE_REPORT === true &&
version_compare(PHPUnit_Runner_Version::id(), '3.1.6', '>=')) {

	PHPUnit_Util_Filter::addDirectoryToWhitelist($zircCoreLibrary);


	foreach (array('.php', '.phtml', '.csv', '.inc') as $suffix) {
		PHPUnit_Util_Filter::addDirectoryToFilter($zircCoreTests, $suffix);
	}
	PHPUnit_Util_Filter::addDirectoryToFilter(PEAR_INSTALL_DIR);
	PHPUnit_Util_Filter::addDirectoryToFilter(PHP_LIBDIR);
}

unset($zircRoot, $zircCoreLibrary, $zircCoreTests, $path);
