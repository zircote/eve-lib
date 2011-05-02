<?php

require_once 'EveLib/Ccp/Api.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * EveLib_Ccp_Api test case.
 */
class EveLib_Ccp_ApiTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var EveLib_Ccp_Api
	 */
	private $EveLib_Ccp_Api;
	private $credentials;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {	
		$frontendOptions = array(
		   'lifetime' => 0, 
		   'automatic_serialization' => true
		);
		 
		$backendOptions = array(
		    'cache_dir' => '/tmp/' // Directory where to put the cache files
		);
		require_once 'Zend/Cache.php';
		EveLib_Ccp_Api::$cache = Zend_Cache::factory('Core',
                             'File',
                             $frontendOptions,
                             $backendOptions);
		$this->responseHeader =
			"HTTP/1.1 200 OK"        . "\r\n" .
			"Content-type: text/xml" . "\r\n" .
			"\r\n";

		/** Log **/
		$logger = new Zend_Log();
		require_once 'Zend/Log/Writer/Mock.php';
		$writer = new Zend_Log_Writer_Mock();
		 
		$logger->addWriter($writer);
		EveLib_Ccp_Api::$log = $logger;
		$this->sharedFixture = $this->getFixtures( TEST_FIXTURES_PATH );
		require_once 'Zend/Http/Client/Adapter/Test.php';
		$this->EveLib_Ccp_Api = new EveLib_Ccp_Api();
		$this->credentials = array (
			'apiKey' => TEST_API_KEY_S,
			'userID' => TEST_USERID_S,
			'characterID' => TEST_CHARACTERID_S
		);
		$this->EveLib_Ccp_Api->setAdapter(new Zend_Http_Client_Adapter_Test );
		parent::setUp ();
	}
	
	protected function getFixtures($path){
		$dir = new DirectoryIterator($path);
		$files = array();
		$dirs = array();
		foreach ($dir as $item) {
			if($item->isDir() && !$item->isDot() ){
				$l = $path . DIRECTORY_SEPARATOR . $item->getFilename();
				$dirs[$item->getFilename()] = $this->getFixtures($l);
				
			} elseif(!$item->isDot()){
				array_push($files, $path . DIRECTORY_SEPARATOR . $item->getFilename());
				$_filename =  $path . DIRECTORY_SEPARATOR . $item->getFilename();
				$files[str_replace('.xml','',basename($_filename))] = $_filename;
			}
		}
		if(count($files)){
			return $files;
		} elseif(count($dirs)){
			return $dirs;
		}
		
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		$this->EveLib_Ccp_Api = null;
		parent::tearDown ();
	}
	
	/**
	 * Tests EveLib_Ccp_Api->__call()
	 * @group AccountStatus
	 */
	public function testAccountStatus() {
        $migration = $this->sharedFixture['account']['AccountStatus'];
		$this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
		$this->EveLib_Ccp_Api->setCredentials($this->credentials);
		$data = $this->EveLib_Ccp_Api->AccountStatus();
	}
	
    /**
     * Test accountCharacters
     *
     * @group Account
     */
    public function testAccountCharacters()
    {
        $migration = $this->sharedFixture['account']['AccountCharacters'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->AccountCharacters();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charAccountBalance
     *
     * @group Char
     */
    public function testCharAccountBalance()
    {
        $migration = $this->sharedFixture['char']['CharAccountBalance'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharAccountBalance();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charAssetList
     *
     * @group Char
     */
    public function testCharAssetList()
    {
        $migration = $this->sharedFixture['char']['CharAssetList'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharAssetList();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charCalendarEventAttendees
     *
     * @group Char
     */
    public function testCharCalendarEventAttendees()
    {
        $migration = $this->sharedFixture['char']['CharCalendarEventAttendees'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharCalendarEventAttendees('1234,12345');
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charCharacterSheet
     *
     * @group Char
     */
    public function testCharCharacterSheet()
    {
        $migration = $this->sharedFixture['char']['CharCharacterSheet'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharCharacterSheet();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charContactList
     *
     * @group Char
     */
    public function testCharContactList()
    {
        $migration = $this->sharedFixture['char']['CharContactList'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharContactList();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charContactNotifications
     *
     * @group Char
     */
    public function testCharContactNotifications()
    {
        $migration = $this->sharedFixture['char']['CharContactNotifications'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharContactNotifications();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charFacWarStats
     *
     * @group Char
     */
    public function testCharFacWarStats()
    {
        $migration = $this->sharedFixture['char']['CharFacWarStats'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharFacWarStats();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charIndustryJobs
     *
     * @group Char
     */
    public function testCharIndustryJobs()
    {
        $migration = $this->sharedFixture['char']['CharIndustryJobs'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharIndustryJobs();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charKilllog
     *
     * @group Char
     */
    public function testCharKilllog()
    {
        $migration = $this->sharedFixture['char']['CharKilllog'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharKilllog();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charMailBodies
     *
     * @group Char
     */
    public function testCharMailBodies()
    {
        $migration = $this->sharedFixture['char']['CharMailBodies'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharMailBodies('8765432');
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charMailingLists
     *
     * @group Char
     */
    public function testCharMailingLists()
    {
        $migration = $this->sharedFixture['char']['CharMailingLists'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharMailingLists();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charMailMessages
     *
     * @group Char
     */
    public function testCharMailMessages()
    {
        $migration = $this->sharedFixture['char']['CharMailMessages'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharMailMessages();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charMarketOrders
     *
     * @group Char
     */
    public function testCharMarketOrders()
    {
        $migration = $this->sharedFixture['char']['CharMarketOrders'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharMarketOrders();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charMedals
     *
     * @group Char
     */
    public function testCharMedals()
    {
        $migration = $this->sharedFixture['char']['CharMedals'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharMedals();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charNotifications
     *
     * @group Char
     */
    public function testCharNotifications()
    {
        $migration = $this->sharedFixture['char']['CharNotifications'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharNotifications();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charNotificationTexts
     *
     * @group Char
     */
    public function testCharNotificationTexts()
    {
        $migration = $this->sharedFixture['char']['CharNotificationTexts'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharNotificationTexts('098765432');
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
//		print_r($data);
    }

    /**
     * Test charResearch
     *
     * @group Char
     */
    public function testCharResearch()
    {
        $migration = $this->sharedFixture['char']['CharResearch'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharResearch();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charSkillInQueue
     *
     * @group Char
     */
    public function testCharSkillInQueue()
    {
        $migration = $this->sharedFixture['char']['CharSkillInQueue'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharSkillInQueue();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charSkillInTraining
     *
     * @group Char
     */
    public function testCharSkillInTraining()
    {
        $migration = $this->sharedFixture['char']['CharSkillInTraining'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharSkillInTraining();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charStandings
     *
     * @group Char
     */
    public function testCharStandings()
    {
        $migration = $this->sharedFixture['char']['CharStandings'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharStandings();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charUpcomingCalendarEvents
     *
     * @group Char
     */
    public function testCharUpcomingCalendarEvents()
    {
        $migration = $this->sharedFixture['char']['CharUpcomingCalendarEvents'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharUpcomingCalendarEvents();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charWalletJournal
     *
     * @group Char
     */
    public function testCharWalletJournal()
    {
        $migration = $this->sharedFixture['char']['CharWalletJournal'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharWalletJournal();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test charWalletTransactions
     *
     * @group Char
     */
    public function testCharWalletTransactions()
    {
        $migration = $this->sharedFixture['char']['CharWalletTransactions'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CharWalletTransactions();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpAccountBalance
     *
     * @group Corp
     */
    public function testCorpAccountBalance()
    {
        $migration = $this->sharedFixture['corp']['CorpAccountBalance'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpAccountBalance();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpAssetList
     *
     * @group Corp
     */
    public function testCorpAssetList()
    {
        $migration = $this->sharedFixture['corp']['CorpAssetList'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpAssetList();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpContactList
     *
     * @group Corp
     */
    public function testCorpContactList()
    {
        $migration = $this->sharedFixture['corp']['CorpContactList'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpContactList();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpContainerLog
     *
     * @group Corp
     */
    public function testCorpContainerLog()
    {
        $migration = $this->sharedFixture['corp']['CorpContainerLog'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpContainerLog();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpCorporationSheet
     *
     * @group Corp
     */
    public function testCorpCorporationSheet()
    {
        $migration = $this->sharedFixture['corp']['CorpCorporationSheet'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpCorporationSheet();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpFacWarStats
     *
     * @group Corp
     */
    public function testCorpFacWarStats()
    {
        $migration = $this->sharedFixture['corp']['CorpFacWarStats'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpFacWarStats();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpIndustryJobs
     *
     * @group Corp
     */
    public function testCorpIndustryJobs()
    {
        $migration = $this->sharedFixture['corp']['CorpIndustryJobs'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpIndustryJobs();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpKilllog
     *
     * @group Corp
     */
    public function testCorpKilllog()
    {
        $migration = $this->sharedFixture['corp']['CorpKilllog'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpKilllog();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpMarketOrders
     *
     * @group Corp
     */
    public function testCorpMarketOrders()
    {
        $migration = $this->sharedFixture['corp']['CorpMarketOrders'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpMarketOrders();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpMedals
     *
     * @group Corp
     */
    public function testCorpMedals()
    {
        $migration = $this->sharedFixture['corp']['CorpMedals'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpMedals();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpMemberMedals
     *
     * @group Corp
     */
    public function testCorpMemberMedals()
    {
        $migration = $this->sharedFixture['corp']['CorpMemberMedals'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpMemberMedals();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpMemberSecurity
     *
     * @group Corp
     */
    public function testCorpMemberSecurity()
    {
        $migration = $this->sharedFixture['corp']['CorpMemberSecurity'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpMemberSecurity();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpMemberSecurityLog
     *
     * @group Corp
     */
    public function testCorpMemberSecurityLog()
    {
        $migration = $this->sharedFixture['corp']['CorpMemberSecurityLog'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpMemberSecurityLog();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpMemberTracking
     *
     * @group Corp
     */
    public function testCorpMemberTracking()
    {
        $migration = $this->sharedFixture['corp']['CorpMemberTracking'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpMemberTracking();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpShareholders
     *
     * @group Corp
     */
    public function testCorpShareholders()
    {
        $migration = $this->sharedFixture['corp']['CorpShareholders'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpShareholders();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpStandings
     *
     * @group Corp
     */
    public function testCorpStandings()
    {
        $migration = $this->sharedFixture['corp']['CorpStandings'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpStandings();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpStarbaseDetail
     *
     * @group Corp
     */
    public function testCorpStarbaseDetail()
    {
        $migration = $this->sharedFixture['corp']['CorpStarbaseDetail'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpStarbaseDetail('123456');
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpStarbaseList
     *
     * @group Corp
     */
    public function testCorpStarbaseList()
    {
        $migration = $this->sharedFixture['corp']['CorpStarbaseList'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpStarbaseList();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpTitles
     *
     * @group Corp
     */
    public function testCorpTitles()
    {
        $migration = $this->sharedFixture['corp']['CorpTitles'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpTitles();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpWalletJournal
     *
     * @group Corp
     */
    public function testCorpWalletJournal()
    {
        $migration = $this->sharedFixture['corp']['CorpWalletJournal'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpWalletJournal();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test corpWalletTransactions
     *
     * @group Corp
     */
    public function testCorpWalletTransactions()
    {
        $migration = $this->sharedFixture['corp']['CorpWalletTransactions'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->CorpWalletTransactions();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveAllianceList
     *
     * @group Eve
     */
    public function testEveAllianceList()
    {
        $migration = $this->sharedFixture['eve']['EveAllianceList'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveAllianceList();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveCertificateTree
     *
     * @group Eve
     */
    public function testEveCertificateTree()
    {
        $migration = $this->sharedFixture['eve']['EveCertificateTree'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveCertificateTree();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveCharacterID
     *
     * @group Eve
     */
    public function testEveCharacterID()
    {
        $migration = $this->sharedFixture['eve']['EveCharacterID'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveCharacterID('12345,123456');
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveCharacterInfo
     *
     * @group Eve
     */
    public function testEveCharacterInfo()
    {
        $migration = $this->sharedFixture['eve']['EveCharacterInfo'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveCharacterInfo();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveCharacterInfoFull
     *
     * @group Eve
     */
    public function testEveCharacterInfoFull()
    {
        $migration = $this->sharedFixture['eve']['EveCharacterInfoFull'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveCharacterInfo('12345,123456');
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveCharacterInfoLimited
     *
     * @group Eve
     */
    public function testEveCharacterInfoLimited()
    {
        $migration = $this->sharedFixture['eve']['EveCharacterInfoLimited'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveCharacterInfo();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveCharacterName
     *
     * @group Eve
     */
    public function testEveCharacterName()
    {
        $migration = $this->sharedFixture['eve']['EveCharacterName'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveCharacterName('12345,123456');
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveConquerableStationList
     *
     * @group Eve
     */
    public function testEveConquerableStationList()
    {
        $migration = $this->sharedFixture['eve']['EveConquerableStationList'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveConquerableStationList();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveErrorList
     *
     * @group Eve
     */
    public function testEveErrorList()
    {
        $migration = $this->sharedFixture['eve']['EveErrorList'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveErrorList();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveFacWarStats
     *
     * @group Eve
     */
    public function testEveFacWarStats()
    {
        $migration = $this->sharedFixture['eve']['EveFacWarStats'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveFacWarStats();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveFacWarTopStats
     *
     * @group Eve
     */
    public function testEveFacWarTopStats()
    {
        $migration = $this->sharedFixture['eve']['EveFacWarTopStats'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveFacWarTopStats();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveRefTypes
     *
     * @group Eve
     */
    public function testEveRefTypes()
    {
        $migration = $this->sharedFixture['eve']['EveRefTypes'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveRefTypes();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test eveSkillTree
     *
     * @group Eve
     */
    public function testEveSkillTree()
    {
        $migration = $this->sharedFixture['eve']['EveSkillTree'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->EveSkillTree();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test mapFacWarSystems
     *
     * @group Map
     */
    public function testMapFacWarSystems()
    {
        $migration = $this->sharedFixture['map']['MapFacWarSystems'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->MapFacWarSystems();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test mapJumps
     *
     * @group Map
     */
    public function testMapJumps()
    {
        $migration = $this->sharedFixture['map']['MapJumps'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->MapJumps();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test mapKills
     *
     * @group Map
     */
    public function testMapKills()
    {
        $migration = $this->sharedFixture['map']['MapKills'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->MapKills();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test mapSovereignty
     *
     * @group Map
     */
    public function testMapSovereignty()
    {
        $migration = $this->sharedFixture['map']['MapSovereignty'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->MapSovereignty();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

    /**
     * Test serverStatus
     *
     * @group Server
     */
    public function testServerStatus()
    {
        $migration = $this->sharedFixture['server']['ServerStatus'];
        $this->EveLib_Ccp_Api->getAdapter()->setResponse($this->responseHeader . file_get_contents($migration));
        $this->EveLib_Ccp_Api->setCredentials($this->credentials);
        $data = $this->EveLib_Ccp_Api->ServerStatus();
        $this->assertArrayHasKey('cachedUntil', $data['eveapi']);
        //print_r($data);
    }

	
}
