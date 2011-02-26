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
class EveLib_Ccp_Api {
	
	/**
	 * 
	 * cache key namespace designation
	 * @var string
	 */
	const CACHE_KEY = 'eve_lib';
	
	/**
	 * 
	 * Zend_Cache_Manager 
	 * @link http://framework.zend.com/manual/en/zend.cache.cache.manager.html
	 * @var Zend_Cache_Manager
	 */
	protected $cacheManager;
	
	/**
	 * 
	 * Designation of the standard API commands; this provides short name keys mapping 
	 * to classnames
	 * @var array
	 */
	protected static $_commands = array (
		'account' => array (
			'accountstatus' => 'EveLib_Ccp_Api_Command_Account_AccountStatus',
			'characters' => 'EveLib_Ccp_Api_Command_Account_Characters'
		),
		'char' => array (
			'accountbalance' => 'EveLib_Ccp_Api_Command_Char_AccountBalance',
			'assetlist' => 'EveLib_Ccp_Api_Command_Char_AssetList',
			'calendareventattendees' => 'EveLib_Ccp_Api_Command_Char_CalendarEventAttendees',
			'charactersheet' => 'EveLib_Ccp_Api_Command_Char_CharacterSheet',
			'contactlist' => 'EveLib_Ccp_Api_Command_Char_ContactList',
			'contactnotifications' => 'EveLib_Ccp_Api_Command_Char_ContactNotifications',
			'facwarstats' => 'EveLib_Ccp_Api_Command_Char_FacWarStats',
			'industryjobs' => 'EveLib_Ccp_Api_Command_Char_IndustryJobs',
			'killlog' => 'EveLib_Ccp_Api_Command_Char_Killlog',
			'mailbodies' => 'EveLib_Ccp_Api_Command_Char_MailBodies',
			'mailinglists' => 'EveLib_Ccp_Api_Command_Char_MailingLists',
			'mailmessages' => 'EveLib_Ccp_Api_Command_Char_MailMessages',
			'marketorders' => 'EveLib_Ccp_Api_Command_Char_MarketOrders',
			'medals' => 'EveLib_Ccp_Api_Command_Char_Medals',
			'notifications' => 'EveLib_Ccp_Api_Command_Char_Notifications',
			'research' => 'EveLib_Ccp_Api_Command_Char_Research',
			'skillinqueue' => 'EveLib_Ccp_Api_Command_Char_SkillInQueue',
			'skillintraining' => 'EveLib_Ccp_Api_Command_Char_SkillInTraining',
			'standings' => 'EveLib_Ccp_Api_Command_Char_Standings',
			'upcomingcalendarevents' => 'EveLib_Ccp_Api_Command_Char_UpcomingCalendarEvents',
			'walletjournal' => 'EveLib_Ccp_Api_Command_Char_WalletJournal',
			'wallettransactions' => 'EveLib_Ccp_Api_Command_Char_WalletTransactions'
		),
		'corp' => array (
			'accountbalance' => 'EveLib_Ccp_Api_Command_Corp_AccountBalance',
			'assetlist' => 'EveLib_Ccp_Api_Command_Corp_AssetList',
			'calendareventattendees' => 'EveLib_Ccp_Api_Command_Corp_CalendarEventAttendees',
			'contactlist' => 'EveLib_Ccp_Api_Command_Corp_ContactList',
			'containerlog' => 'EveLib_Ccp_Api_Command_Corp_ContainerLog',
			'corporationsheet' => 'EveLib_Ccp_Api_Command_Corp_CorporationSheet',
			'facwarstats' => 'EveLib_Ccp_Api_Command_Corp_FacWarStats',
			'industryjobs' => 'EveLib_Ccp_Api_Command_Corp_IndustryJobs',
			'killlog' => 'EveLib_Ccp_Api_Command_Corp_Killlog',
			'marketorders' => 'EveLib_Ccp_Api_Command_Corp_MarketOrders',
			'medals' => 'EveLib_Ccp_Api_Command_Corp_Medals',
			'membermedals' => 'EveLib_Ccp_Api_Command_Corp_MemberMedals',
			'membersecurity' => 'EveLib_Ccp_Api_Command_Corp_MemberSecurity',
			'membersecuritylog' => 'EveLib_Ccp_Api_Command_Corp_MemberSecurityLog',
			'membertracking' => 'EveLib_Ccp_Api_Command_Corp_MemberTracking',
			'outpostlist' => 'EveLib_Ccp_Api_Command_Corp_OutpostList',
			'outpostservicedetail' => 'EveLib_Ccp_Api_Command_Corp_OutpostServiceDetail',
			'shareholders' => 'EveLib_Ccp_Api_Command_Corp_Shareholders',
			'standings' => 'EveLib_Ccp_Api_Command_Corp_Standings',
			'starbasedetail' => 'EveLib_Ccp_Api_Command_Corp_StarbaseDetail',
			'starbaselist' => 'EveLib_Ccp_Api_Command_Corp_StarbaseList',
			'titles' => 'EveLib_Ccp_Api_Command_Corp_Titles',
			'walletjournal' => 'EveLib_Ccp_Api_Command_Corp_WalletJournal',
			'wallettransactions' => 'EveLib_Ccp_Api_Command_Corp_WalletTransactions'
		),
		'eve' => array (
			'alliancelist' => 'EveLib_Ccp_Api_Command_Eve_AllianceList',
			'certificatetree' => 'EveLib_Ccp_Api_Command_Eve_CertificateTree',
			'characterinfo' => 'EveLib_Ccp_Api_Command_Eve_CharacterInfo',
			'charactername' => 'EveLib_Ccp_Api_Command_Eve_CharacterName',
			'characterid' => 'EveLib_Ccp_Api_Command_Eve_CharacterID',
			'conquerablestationlist' => 'EveLib_Ccp_Api_Command_Eve_ConquerableStationList',
			'errorlist' => 'EveLib_Ccp_Api_Command_Eve_ErrorList',
			'facwarstats' => 'EveLib_Ccp_Api_Command_Eve_FacWarStats',
			'facwartopstats' => 'EveLib_Ccp_Api_Command_Eve_FacWarTopStats',
			'reftypes' => 'EveLib_Ccp_Api_Command_Eve_RefTypes',
			'skilltree' => 'EveLib_Ccp_Api_Command_Eve_SkillTree'
		),
		'map' => array (
			'facwarsystems' => 'EveLib_Ccp_Api_Command_Map_FacWarSystems',
			'jumps' => 'EveLib_Ccp_Api_Command_Map_Jumps',
			'kills' => 'EveLib_Ccp_Api_Command_Map_Kills',
			'sovereignty' => 'EveLib_Ccp_Api_Command_Map_Sovereignty',
			'sovereigntystatus' => 'EveLib_Ccp_Api_Command_Map_SovereigntyStatus'
		),
		'misc' => array (
			'image' => 'EveLib_Ccp_Api_Command_Misc_Image',
		),
		'server' => array (
			'serverstatus' => 'EveLib_Ccp_Api_Command_Server_ServerStatus',
		)
	);
	
	/**
	 * 
	 * Character API details for requests
	 * @var array
	 */
	public $_api;
	
	/**
	 * 
	 * API Endpoint connection handler
	 * @var EveLib_Ccp_Api_Connection
	 */
	protected $_connection;
	
	protected $_dsn;
	
	/**
	 * 
	 * The endpoint type the request will be called against
	 * @var string (Account|Char|Corp|Eve|Map|Misc|Server)
	 */
	protected $_scope;
	
	protected $_options;
	
	public function __construct($dsn){
		$this->setDsn($dsn);
	}
	
	public function setDsn($dsn){
		$this->_dsn = $dsn;
		$this->_fromDsn($this->_dsn);
		return $this;
	}
	
	public function getDsn(){
		return $this->_dsn;
	}
	
	protected function _fromDsn($dsn){
		$options = array();
		foreach (parse_url($dsn) as $key => $value) {
			switch ($key) {
				case 'scheme':
					$options['Connection']['protocol'] = $value;
				break;
				case 'host':
					$options['Connection']['host'] = $value;
				break;
				case 'port':
					$options['Connection']['port'] = $value;
				break;
				case 'user':
					$options['Api']['userID'] = $value;
				break;
				case 'pass':
					$options['Api']['apiKey'] = $value;
				break;
				case 'path':
					$options['Api']['characterID'] = str_replace('/', '', $value);
				break;
				case 'query':
					parse_str($value, $options);
				break;
			}
		}
		$this->_options = $options;
		$this->setOptions($options);
	}
	
    /**
     * Set options array
     * 
     * @param array $options Options (see $_options description)
     * @return EveLib_Ccp_Api
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

    /**
     * 
     * Enter description here ...
     * @param string $name
     * @param string $value
     * @return EveLib_Ccp_Api
     */
    public function setOption($name, $value) {
    	$lowerName = '_' . strtolower($name);
        if (!property_exists($this, $lowerName)) {
        	require_once 'EveLib/Ccp/Api/Exception.php';
            throw new EveLib_Ccp_Api_Exception("'{$name}' is not a valid Option.");
        }
        $this->$lowerName = $value;
        return $this;
    }
    
    /**
     * 
     * Connection option/config method.
     * @param array $options
     * @return EveLib_Ccp_Api
     */
    public function setConnection($options){
 		require_once 'EveLib/Ccp/Api/Connection.php';
    	$this->_connection = new EveLib_Ccp_Api_Connection($options);
    	return $this;
    }
    
    /**
     * returns the API request connection
     * @return EveLib_Ccp_Api_Connection
     */
    public function getConnection(){
    	return $this->_connection;
    }
    
    /**
     * 
     * Defines the character API configuration values for the API request
     * @param array $options
     * @return EveLib_Ccp_Api
     */
    public function setApi(array $options){
    	$this->_api = $options;
    	return $this;
    }
    
    /**
     * 
     * returns the API config values
     * @return @array
     */
    public function getApi(){
    	return $this->_api;
    }
    
    public function get_options(){
    	return $this->_options;
    }
    /**
     * 
     * returns the Zend_Cache_Core for direct access to read/write the cache.
     * @return Zend_Cache_Core
     */
    public function getCache(){
    	return $this->cacheManager->getCache(self::CACHE_KEY);
    }
    
    /**
     * 
     * Establishes the cache, the frontend is set in stone due to the reliance of a Core frontend
     * @param array $options
     * @return EveLib_Ccp_Api
     */
    public function setCache($backend = null){
    	if($backend === null){
			$backend = array (
			    'backend' => array(
			        'name' => 'File',
			        'options' => array(
			            'cache_dir' => '/tmp'
			        )
			    )
			);
    	}
    	$frontend = array(
			'frontend' => array(
		        'name' => 'Core',
		        'options' => array(
    				'cache_id_prefix' => 'EveLib' . str_replace(array('-','.'),'_',$this->_options['Connection']['host']),
		            'lifetime' => null,
		            'automatic_serialization' => true
		        )
		    )
	    );
    	$options = array_merge($frontend, $backend);
    	require_once 'Zend/Cache/Manager.php';
    	$this->cacheManager = new Zend_Cache_Manager;
    	if(!$this->cacheManager->hasCache(self::CACHE_KEY)){
			$this->cacheManager->setCacheTemplate(self::CACHE_KEY, $options);
    	}
		return $this;
    }
    
    /**
     * 
     * returns the commands key/class pair array.
     * @return array
     */
    public function getCommands(){
    	return self::$_commands;
    }
    
    /**
     * 
     * Method to set the request scope
     * @param mixed $options
     * @return EveLib_Ccp_Api
     */
    public function setScope($scope){
    	$scope = strtolower($scope);
    	if(in_array($scope, array('eve','char','map','corp','server','account','misc'))){
    		$this->_scope = $scope;
    	} else {
        	require_once 'EveLib/Ccp/Api/Exception.php';
            throw new EveLib_Ccp_Api_Exception("'{$scope['scope']}' is not a valid Api scope.");
    	}
    	return $this;
    }

    /**
     * 
     * returns the current scope
     * @return string
     */
    public function getScope(){
    	return $this->_scope;
    }
    
    /**
     * Create and Execute the command request.
     * 
     * @throws EveLib_Ccp_Api_Exception
     * @param string $name      Command name 
     * @param array  $arguments Command arguments
     * @return EveLib_Ccp_Api_Command_Abstract
     */
    public function getCommand($name, $args) {
    	$this->setCache();
    	if(!$this->getScope()){
        	require_once 'EveLib/Ccp/Api/Exception.php';
            throw new EveLib_Ccp_Api_Exception("Unable to determine a scope for execution.");
    	}
		$lowerName = strtolower($name);
        if (!isset(self::$_commands[$this->getScope()][$lowerName])) {
        	require_once 'EveLib/Ccp/Api/Exception.php';
            throw new EveLib_Ccp_Api_Exception("Command '$name' not found");
        }
        $classParent = 'EveLib_Ccp_Api_Command_' . ucfirst($this->getScope()) . '_';
        if (strpos(self::$_commands[$this->getScope()][$lowerName],$classParent ) === 0) {
        	require_once $file_path ='EveLib/Ccp/Api/Command/' . ucfirst($this->getScope()) .'/'. 
        		substr(self::$_commands[$this->getScope()][$lowerName], strlen($classParent)) . '.php';
        }
        return new self::$_commands[$this->getScope()][$lowerName]($this, $name, $args);
    }
    
    /**
     * 
     * command request overload
     * 
     * @param string $name
     * @param mixed $args
     * @return mixed
     */
    public function __call($name, $args) {
        $command = $this->getCommand($name, $args);
        $command->write();
        return $command->read();
    }
}