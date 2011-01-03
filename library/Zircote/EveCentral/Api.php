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
class Zircote_EveCentral_Api {
	
	const SERVER_DEFAULT_PORT = '80';
	const SERVER_DEFAULT_HOST = 'api.eve-central.com';
	const SERVER_DEFAULT_PROTOCOL = 'http';
	const CACHE_KEY = 'eve_central_api';
	
	/**
	 * 
	 * Enter description here ...
	 * @var Zend_Cache
	 */
	protected $cacheManager;
	protected static $_commands = array (
		'evemon' => 'Zircote_EveCentral_Api_Command_EveMon',
		'quicklook' => 'Zircote_EveCentral_Api_Command_QuickLook',
		'marketstat' => 'Zircote_EveCentral_Api_Command_MarketStat',
		'uploadsuggest' => 'Zircote_EveCentral_Api_Command_UploadSuggest'
	);
	
	protected $_options = array(
		'Connection' => array (
			'host' => self::SERVER_DEFAULT_HOST,
			'port' => self::SERVER_DEFAULT_PORT,
			'protocol' => self::SERVER_DEFAULT_PROTOCOL
		),
		'Cache' => array (
		    'backend' => array(
		        'name' => 'File',
		        'options' => array(
		            'cache_dir' => '/tmp'
		        )
		    )
		)
	);
	
	protected $_cache;
	protected $_connection;
	
	public function __construct(array $options = array()){
    	$options = array_change_key_case($options, CASE_LOWER);
        $options = array_merge($this->_options, $options);
        
        $this->setOptions($options);
	}
	
    /**
     * Set options array
     * 
     * @param array $options Options (see $_options description)
     * @return Zircote_Ccp_Api
     */
    public function setOptions(array $options) {
        foreach($options as $name => $value) {
            if (method_exists($this, "set$name")) {
                call_user_func(array($this, "set$name"), $value);
            } else {
                $this->setOption($name, $value);
            }
        }
        return $this;
    }

    public function setOption($name, $value) {
    	$lowerName = '_' . strtolower($name);

        if (!property_exists($this, $lowerName)) {
        	require_once 'Zircote/EveCentral/Api/Exception.php';
            throw new Zircote_EveCentral_Api_Exception("'[$lowerName]' is not a valid property/option.");
        }
        $this->$lowerName = $value;
        return $this;
    }
    
    public function setConnection($options){
 		require_once 'Zircote/EveCentral/Api/Connection.php';
    	$this->_connection = new Zircote_EveCentral_Api_Connection($options);
    	return $this;
    }
    
    public function getConnection(){
    	return $this->_connection;
    }
    
    /**
     * 
     * Enter description here ...
     * @return Zend_Cache_Core
     */
    public function getCache(){
    	return $this->cacheManager->getCache(self::CACHE_KEY);
    }
    
    public function setCache(array $options){
    	$frontend = array(
			'frontend' => array(
		        'name' => 'Core',
		        'options' => array(
    				'cache_id_prefix' => 'eve_api',
		            'lifetime' => null,
		            'automatic_serialization' => true
		        )
		    )
	    );
    	$options = array_merge($frontend, $options);
    	require_once 'Zend/Cache/Manager.php';
    	$this->cacheManager = new Zend_Cache_Manager;
    	if(!$this->cacheManager->hasCache(self::CACHE_KEY)){
			$this->cacheManager->setCacheTemplate(self::CACHE_KEY, $options);
    	}
		return $this;
    }
    
    /**
     * 
     * @throws Zircote_EveCentral_Api_Exception
     * @param string $name      Command name 
     * @param array  $arguments Command arguments
     * @return Zircote_EveCentral_Api_Command_Abstract
     */
    public function getCommand($name, $args) {
    	if(!$this->getScope()){
        	require_once 'Zircote/EveCentral/Api/Exception.php';
            throw new Zircote_EveCentral_Api_Exception("Unable to determine a scope for execution.");
    	}
		$lowerName = strtolower($name);
        if (!isset(self::$_commands[$lowerName])) {
        	require_once 'Zircote/EveCentral/Api/Exception.php';
            throw new Zircote_EveCentral_Api_Exception("Command '$name' not found");
        }
        $classParent = 'Zircote_EveCentral_Api_Command_';
        if (strpos(self::$_commands[$lowerName],$classParent ) === 0) {
        	require_once $file_path ='Zircote/EveCentral/Api/Command/'. 
        		substr(self::$_commands[$lowerName], strlen($classParent)) . '.php';
        }
        return new self::$_commands[$this->getScope()][$lowerName]($this, $name, $args);
    }
    
    public function __call($name, $args) {
        $command = $this->getCommand($name, $args);
        $command->write();
        return $command->read();
    }
}