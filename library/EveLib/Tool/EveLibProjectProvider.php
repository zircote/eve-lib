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
/*
 * zircote@flame:~$ zf enable config.provider EveLib_Tool_EveLibProvider
 * Provider/Manifest 'EveLib_Tool_EveLibProvider' was enabled for usage with Zend Tool.
 */
require_once 'Zend/Tool/Project/Provider/Abstract.php';
require_once 'Zend/Tool/Framework/Provider/Pretendable.php';

class EveLib_Tool_EveLibProjectProvider extends Zend_Tool_Project_Provider_Abstract 
	implements Zend_Tool_Framework_Provider_Pretendable {


    /**
     * @param string $line
     * @param array $decoratorOptions
     */
    protected function _print($line, array $decoratorOptions = array())
    {
        $this->_registry->getResponse()->appendContent("[EveLib] " . $line, $decoratorOptions);
    }
}
