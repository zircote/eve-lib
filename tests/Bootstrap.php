<?php
/**
 * @license Copyright 2010 Robert Allen
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
error_reporting(E_ALL | E_STRICT);
$EveLibRoot = realpath(dirname(__DIR__));
$EveLibCoreLibrary = "$EveLibRoot/library";
$EveLibCoreTests = "$EveLibRoot/tests";
$path = array($EveLibCoreLibrary, $EveLibCoreTests, get_include_path());
set_include_path(implode(PATH_SEPARATOR, $path));
include __DIR__ . '/_autoload.php';
$testConfig = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'TestConfiguration.php';
if (file_exists($testConfig)) {
    require_once $testConfig;
} else {
    require_once $testConfig . '.default';
}
unset($EveLibRoot, $EveLibCoreLibrary, $EveLibCoreTests, $path);
