<?php
require_once 'EveLib/Ccp/Api/Response.php';
require_once 'PHPUnit/Framework/TestCase.php';
/**
 * EveLib_Ccp_Api_Response test case.
 */
class EveLib_Ccp_Api_ResponseTest extends PHPUnit_Framework_TestCase
{
    protected $fixPath;
    /**
     * @var EveLib_Ccp_Api_Response
     */
    private $EveLib_Ccp_Api_Response;
    /**
     * Prepares the environment before running a test.
     */
    protected function setUp ()
    {
        $this->sharedFixture = $this->getFixtures(TEST_FIXTURES_PATH);
        parent::setUp();
    }
    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown ()
    {
        parent::tearDown();
    }
    protected function getFixtures ($path)
    {
        $dir = new DirectoryIterator($path);
        $files = array();
        $dirs = array();
        foreach ($dir as $item) {
            if ($item->isDir() && ! $item->isDot()) {
                $l = $path . DIRECTORY_SEPARATOR . $item->getFilename();
                $dirs[$item->getFilename()] = $this->getFixtures($l);
            } elseif (! $item->isDot()) {
                array_push($files,
                $path . DIRECTORY_SEPARATOR . $item->getFilename());
                $_filename = $path . DIRECTORY_SEPARATOR . $item->getFilename();
                $files[str_replace('.xml', '', basename($_filename))] = $_filename;
            }
        }
        if (count($files)) {
            return $files;
        } elseif (count($dirs)) {
            return $dirs;
        }
    }
    /**
     * Test AccountCharacters
     *
     * @group Account
     */
    public function testAccountCharactersToString ()
    {
        $migration = $this->sharedFixture['account']['AccountCharacters'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        $string = (string) $res;
    }
    /**
     * Test AccountCharacters
     *
     * @group Account
     */
    public function testAccountCharacters ()
    {
        $migration = $this->sharedFixture['account']['AccountCharacters'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test AccountStatus
     *
     * @group Account
     */
    public function testAccountStatus ()
    {
        $migration = $this->sharedFixture['account']['AccountStatus'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharAccountBalance
     *
     * @group Char
     */
    public function testCharAccountBalance ()
    {
        $migration = $this->sharedFixture['char']['CharAccountBalance'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharAssetList
     *
     * @group Char
     */
    public function testCharAssetList ()
    {
        $migration = $this->sharedFixture['char']['CharAssetList'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharCalendarEventAttendees
     *
     * @group Char
     */
    public function testCharCalendarEventAttendees ()
    {
        $migration = $this->sharedFixture['char']['CharCalendarEventAttendees'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharCharacterSheet
     *
     * @group Char
     */
    public function testCharCharacterSheet ()
    {
        $migration = $this->sharedFixture['char']['CharCharacterSheet'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharContactList
     *
     * @group Char
     */
    public function testCharContactList ()
    {
        $migration = $this->sharedFixture['char']['CharContactList'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharContactNotifications
     *
     * @group Char
     */
    public function testCharContactNotifications ()
    {
        $migration = $this->sharedFixture['char']['CharContactNotifications'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharFacWarStats
     *
     * @group Char
     */
    public function testCharFacWarStats ()
    {
        $migration = $this->sharedFixture['char']['CharFacWarStats'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharIndustryJobs
     *
     * @group Char
     */
    public function testCharIndustryJobs ()
    {
        $migration = $this->sharedFixture['char']['CharIndustryJobs'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharKilllog
     *
     * @group Char
     */
    public function testCharKilllog ()
    {
        $migration = $this->sharedFixture['char']['CharKilllog'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharMailBodies
     *
     * @group Char
     */
    public function testCharMailBodies ()
    {
        $migration = $this->sharedFixture['char']['CharMailBodies'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharMailingLists
     *
     * @group Char
     */
    public function testCharMailingLists ()
    {
        $migration = $this->sharedFixture['char']['CharMailingLists'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharMailMessages
     *
     * @group Char
     */
    public function testCharMailMessages ()
    {
        $migration = $this->sharedFixture['char']['CharMailMessages'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharMarketOrders
     *
     * @group Char
     */
    public function testCharMarketOrders ()
    {
        $migration = $this->sharedFixture['char']['CharMarketOrders'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharMedals
     *
     * @group Char
     */
    public function testCharMedals ()
    {
        $migration = $this->sharedFixture['char']['CharMedals'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharNotifications
     *
     * @group Char
     */
    public function testCharNotifications ()
    {
        $migration = $this->sharedFixture['char']['CharNotifications'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharNotificationTexts
     *
     * @group Char
     */
    public function testCharNotificationTexts ()
    {
        $migration = $this->sharedFixture['char']['CharNotificationTexts'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']['result']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharResearch
     *
     * @group Char
     */
    public function testCharResearch ()
    {
        $migration = $this->sharedFixture['char']['CharResearch'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharSkillInQueue
     *
     * @group Char
     */
    public function testCharSkillInQueue ()
    {
        $migration = $this->sharedFixture['char']['CharSkillInQueue'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharSkillInTraining
     *
     * @group Char
     */
    public function testCharSkillInTraining ()
    {
        $migration = $this->sharedFixture['char']['CharSkillInTraining'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharStandings
     *
     * @group Char
     */
    public function testCharStandings ()
    {
        $migration = $this->sharedFixture['char']['CharStandings'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharUpcomingCalendarEvents
     *
     * @group Char
     */
    public function testCharUpcomingCalendarEvents ()
    {
        $migration = $this->sharedFixture['char']['CharUpcomingCalendarEvents'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharWalletJournal
     *
     * @group Char
     */
    public function testCharWalletJournal ()
    {
        $migration = $this->sharedFixture['char']['CharWalletJournal'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CharWalletTransactions
     *
     * @group Char
     */
    public function testCharWalletTransactions ()
    {
        $migration = $this->sharedFixture['char']['CharWalletTransactions'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpAccountBalance
     *
     * @group Corp
     */
    public function testCorpAccountBalance ()
    {
        $migration = $this->sharedFixture['corp']['CorpAccountBalance'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpAssetList
     *
     * @group Corp
     */
    public function testCorpAssetList ()
    {
        $migration = $this->sharedFixture['corp']['CorpAssetList'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpContactList
     *
     * @group Corp
     */
    public function testCorpContactList ()
    {
        $migration = $this->sharedFixture['corp']['CorpContactList'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpContainerLog
     *
     * @group Corp
     */
    public function testCorpContainerLog ()
    {
        $migration = $this->sharedFixture['corp']['CorpContainerLog'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpCorporationSheet
     *
     * @group Corp
     */
    public function testCorpCorporationSheet ()
    {
        $migration = $this->sharedFixture['corp']['CorpCorporationSheet'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpFacWarStats
     *
     * @group Corp
     */
    public function testCorpFacWarStats ()
    {
        $migration = $this->sharedFixture['corp']['CorpFacWarStats'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpIndustryJobs
     *
     * @group Corp
     */
    public function testCorpIndustryJobs ()
    {
        $migration = $this->sharedFixture['corp']['CorpIndustryJobs'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpKilllog
     *
     * @group Corp
     */
    public function testCorpKilllog ()
    {
        $migration = $this->sharedFixture['corp']['CorpKilllog'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpMarketOrders
     *
     * @group Corp
     */
    public function testCorpMarketOrders ()
    {
        $migration = $this->sharedFixture['corp']['CorpMarketOrders'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpMedals
     *
     * @group Corp
     */
    public function testCorpMedals ()
    {
        $migration = $this->sharedFixture['corp']['CorpMedals'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpMemberMedals
     *
     * @group Corp
     */
    public function testCorpMemberMedals ()
    {
        $migration = $this->sharedFixture['corp']['CorpMemberMedals'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpMemberSecurity
     *
     * @group Corp
     */
    public function testCorpMemberSecurity ()
    {
        $migration = $this->sharedFixture['corp']['CorpMemberSecurity'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
    /**
     * Test CorpMemberSecurityLog
     *
     * @group Corp
     */
    public function testCorpMemberSecurityLog ()
    {
        $migration = $this->sharedFixture['corp']['CorpMemberSecurityLog'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'changeTime,characterID,issuerID,roleLocationType') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['roleHistory']['2008-08-07 17:57:00']);
        }
    }
    /**
     * Test CorpMemberTracking
     *
     * @group Corp
     */
    public function testCorpMemberTracking ()
    {
        $migration = $this->sharedFixture['corp']['CorpMemberTracking'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'characterID,name,startDateTime,baseID,base,title,logonDateTime,logoffDateTime,locationID,location,shipTypeID,shipType,roles,grantableRoles') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['members']['150336922']);
        }
    }
    /**
     * Test CorpShareholders
     *
     * @group Corp
     */
    public function testCorpShareholders ()
    {
        $migration = $this->sharedFixture['corp']['CorpShareholders'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'shareholderID,shareholderName,shareholderCorporationID,shareholderCorporationName,shares') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['characters']['126891489']);
        }
        foreach (explode(',', 'shareholderID,shareholderName,shares') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['corporations']['126891489']);
        }
    }
    /**
     * Test CorpStandings
     *
     * @group Corp
     */
    public function testCorpStandings ()
    {
        $migration = $this->sharedFixture['corp']['CorpStandings'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',', 'fromID,fromName,standing') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['corporationNPCStandings']['standingsFrom']['agents']['fromID']);
        }
        foreach (explode(',', 'fromID,fromName,standing') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['corporationNPCStandings']['standingsFrom']['factions']['fromID']);
        }
        foreach (explode(',', 'fromID,fromName,standing') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['corporationNPCStandings']['standingsFrom']['NPCCorporations']['fromID']);
        }
    }
    /**
     * Test CorpStarbaseDetail
     *
     * @group CorpTEST
     */
    public function testCorpStarbaseDetail ()
    {
        $migration = $this->sharedFixture['corp']['CorpStarbaseDetail'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'useStandingsFrom,onStandingDrop,onStatusDrop,onAggression,onCorporationWar') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['combatSettings']);
        }
        foreach (explode(',', 'typeID,quantity') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['fuel']['16275']);
        }
    }
    /**
     * Test CorpStarbaseList
     *
     * @group Corp
     */
    public function testCorpStarbaseList ()
    {
        $migration = $this->sharedFixture['corp']['CorpStarbaseList'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'itemID,typeID,locationID,moonID,state,stateTimestamp,onlineTimestamp') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['starbases']['150354725']);
        }
    }
    /**
     * Test CorpTitles
     *
     * @group Corp
     */
    public function testCorpTitles ()
    {
        $migration = $this->sharedFixture['corp']['CorpTitles'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',', 'titleID,titleName') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['titles']['1']);
            ;
        }
        foreach (explode(',', 'roleID,roleName,roleDescription') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['titles']['1']['rolesAtHQ']['8192']);
            ;
        }
    }
    /**
     * Test CorpWalletJournal
     *
     * @group Corp
     */
    public function testCorpWalletJournal ()
    {
        $migration = $this->sharedFixture['corp']['CorpWalletJournal'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'date,refID,refTypeID,ownerName1,ownerID1,ownerName2,ownerID2,argName1,' .
         'argID1,amount,balance,reason,taxReceiverID,taxAmount') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['transactions']['1578932679']);
            ;
        }
    }
    /**
     * Test CorpWalletTransactions
     *
     * @group Corp
     */
    public function testCorpWalletTransactions ()
    {
        $migration = $this->sharedFixture['corp']['CorpWalletTransactions'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'transactionDateTime,transactionID,quantity,typeName,typeID,price,clientID,clientName,stationID,stationName,transactionType,transactionFor') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['transactions']['1309776438']);
            ;
        }
    }
    /**
     * Test EveAllianceList
     *
     * @group EveTEST
     */
    public function testEveAllianceList ()
    {
        $migration = $this->sharedFixture['eve']['EveAllianceList'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2007-12-02 20:37:55',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2007-12-02 19:37:55',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'name,shortName,allianceID,executorCorpID,memberCount,startDate') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['alliances']['150382481']);
            ;
        }
    }
    /**
     * Test EveCertificateTree
     *
     * @group Eve
     */
    public function testEveCertificateTree ()
    {
        $migration = $this->sharedFixture['eve']['EveCertificateTree'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2008-11-13 21:21:45',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2008-11-13 20:21:45',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',', 'categoryID,categoryName') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['categories']['3']);
            ;
        }
        foreach (explode(',', 'classID,className') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['categories']['3']['classes']['2']);
            ;
        }
    }
    /**
     * Test EveCharacterID
     *
     * @group Eve
     */
    public function testEveCharacterID ()
    {
        $migration = $this->sharedFixture['eve']['EveCharacterID'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2009-11-18 17:05:31',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2009-10-18 17:05:31',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',', 'name,characterID') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['characters']['797400947']);
            ;
        }
    }
    /**
     * Test EveCharacterInfo
     *
     * @group Eve
     */
    public function testEveCharacterInfo ()
    {
        $migration = $this->sharedFixture['eve']['EveCharacterInfo'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2010-10-05 20:41:58',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2010-10-05 19:45:21',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'characterID,characterName,race,bloodline,' .
         'corporationID,corporation,corporationDate,allianceID,alliance,alliancenDate,securityStatus') as $testItem) {
            $this->assertArrayHasKey($testItem, $array['eveapi']['result']);
            ;
        }
    }
    /**
     * Test EveCharacterInfoFull
     *
     * @group Eve
     */
    public function testEveCharacterInfoFull ()
    {
        $migration = $this->sharedFixture['eve']['EveCharacterInfoFull'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2010-10-05 20:41:58',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2010-10-05 19:41:58',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'characterID,characterName,race,bloodline,skillPoints,shipName,shipTypeID,shipTypeName,' .
         'corporationID,corporation,corporationDate,allianceID,alliance,alliancenDate,securityStatus,lastKnownLocation') as $testItem) {
            $this->assertArrayHasKey($testItem, $array['eveapi']['result']);
            ;
        }
    }
    /**
     * Test EveCharacterInfoLimited
     *
     * @group Eve
     */
    public function testEveCharacterInfoLimited ()
    {
        $migration = $this->sharedFixture['eve']['EveCharacterInfoLimited'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2010-10-05 20:41:58',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2010-10-05 19:41:58',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'characterID,characterName,race,bloodline,skillPoints,shipName,shipTypeID,shipTypeName,' .
         'corporationID,corporation,corporationDate,allianceID,alliance,alliancenDate,securityStatus') as $testItem) {
            $this->assertArrayHasKey($testItem, $array['eveapi']['result']);
            ;
        }
    }
    /**
     * Test EveCharacterName
     *
     * @group Eve
     */
    public function testEveCharacterName ()
    {
        $migration = $this->sharedFixture['eve']['EveCharacterName'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2011-04-02 15:00:07',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2011-03-02 15:00:07',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',', 'name,characterID') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['characters']['797400947']);
            ;
        }
    }
    /**
     * Test EveConquerableStationList
     *
     * @group Eve
     */
    public function testEveConquerableStationList ()
    {
        $migration = $this->sharedFixture['eve']['EveConquerableStationList'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2007-12-02 20:55:38',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2007-12-02 19:55:38',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'stationID,stationName,stationTypeID,solarSystemID,corporationID,corporationName') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['outposts']['60014862']);
            ;
        }
    }
    /**
     * Test EveErrorList
     *
     * @group Eve
     */
    public function testEveErrorList ()
    {
        $migration = $this->sharedFixture['eve']['EveErrorList'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2011-04-07 12:53:13',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2011-04-07 11:53:13',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',', 'errorCode,errorText') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['errors']['512']);
            ;
        }
    }
    /**
     * Test EveFacWarStats
     *
     * @group Eve
     */
    public function testEveFacWarStats ()
    {
        $migration = $this->sharedFixture['eve']['EveFacWarStats'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2009-10-25 13:37:03',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2009-10-25 12:37:01',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        foreach (explode(',',
        'killsYesterday,killsLastWeek,killsTotal,victoryPointsYesterday,victoryPointsLastWeek,victoryPointsTotal') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['totals']);
            ;
        }
        foreach (explode(',',
        'factionID,factionName,pilots,systemsControlled,killsYesterday,killsLastWeek,killsTotal,victoryPointsYesterday,victoryPointsLastWeek,victoryPointsTotal') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['factions']['500001']);
            ;
        }
        foreach (explode(',', 'factionID,factionName,againstID,againstName') as $testItem) {
            $this->assertArrayHasKey($testItem,
            $array['eveapi']['result']['factionWars']['500001']);
            ;
        }
    }
    /**
     * Test EveFacWarTopStats
     *
     * @group Eve
     */
    public function testEveFacWarTopStats ()
    {
        $migration = $this->sharedFixture['eve']['EveFacWarTopStats'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2008-12-29 17:31:48',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2008-12-29 16:31:48',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        /* characters */
        /* KillsYesterday */
        $this->assertArrayHasKey('characters', $array['eveapi']['result']);
        $this->assertArrayHasKey('KillsYesterday',
        $array['eveapi']['result']['characters']);
        $this->assertArrayHasKey('1007512845',
        $array['eveapi']['result']['characters']['KillsYesterday']);
        $this->assertArrayHasKey('characterID',
        $array['eveapi']['result']['characters']['KillsYesterday']['1007512845']);
        $this->assertArrayHasKey('characterName',
        $array['eveapi']['result']['characters']['KillsYesterday']['1007512845']);
        $this->assertEquals('1007512845',
        $array['eveapi']['result']['characters']['KillsYesterday']['1007512845']['characterID']);
        $this->assertEquals('StonedBoy',
        $array['eveapi']['result']['characters']['KillsYesterday']['1007512845']['characterName']);
        $this->assertEquals('14',
        $array['eveapi']['result']['characters']['KillsYesterday']['1007512845']['kills']);
        /* KillsLastWeek */
        $this->assertArrayHasKey('KillsLastWeek',
        $array['eveapi']['result']['characters']);
        $this->assertArrayHasKey('187452523',
        $array['eveapi']['result']['characters']['KillsLastWeek']);
        $this->assertArrayHasKey('characterID',
        $array['eveapi']['result']['characters']['KillsLastWeek']['187452523']);
        $this->assertArrayHasKey('characterName',
        $array['eveapi']['result']['characters']['KillsLastWeek']['187452523']);
        $this->assertEquals('187452523',
        $array['eveapi']['result']['characters']['KillsLastWeek']['187452523']['characterID']);
        $this->assertEquals('Tigrana Blanque',
        $array['eveapi']['result']['characters']['KillsLastWeek']['187452523']['characterName']);
        $this->assertEquals('52',
        $array['eveapi']['result']['characters']['KillsLastWeek']['187452523']['kills']);
        /* KillsTotal */
        $this->assertArrayHasKey('KillsTotal',
        $array['eveapi']['result']['characters']);
        $this->assertArrayHasKey('673662188',
        $array['eveapi']['result']['characters']['KillsTotal']);
        $this->assertArrayHasKey('characterID',
        $array['eveapi']['result']['characters']['KillsTotal']['673662188']);
        $this->assertArrayHasKey('characterName',
        $array['eveapi']['result']['characters']['KillsTotal']['673662188']);
        $this->assertEquals('673662188',
        $array['eveapi']['result']['characters']['KillsTotal']['673662188']['characterID']);
        $this->assertEquals('Val Erian',
        $array['eveapi']['result']['characters']['KillsTotal']['673662188']['characterName']);
        $this->assertEquals('451',
        $array['eveapi']['result']['characters']['KillsTotal']['673662188']['kills']);
        /* KillsYesterday */
        $this->assertArrayHasKey('corporations', $array['eveapi']['result']);
        $this->assertArrayHasKey('KillsYesterday',
        $array['eveapi']['result']['corporations']);
        $this->assertArrayHasKey('1007512845',
        $array['eveapi']['result']['corporations']['KillsYesterday']);
        $this->assertArrayHasKey('corporationID',
        $array['eveapi']['result']['corporations']['KillsYesterday']['1007512845']);
        $this->assertArrayHasKey('corporationName',
        $array['eveapi']['result']['corporations']['KillsYesterday']['1007512845']);
        $this->assertEquals('1007512845',
        $array['eveapi']['result']['corporations']['KillsYesterday']['1007512845']['corporationID']);
        $this->assertEquals('StonedBoy',
        $array['eveapi']['result']['corporations']['KillsYesterday']['1007512845']['corporationName']);
        $this->assertEquals('14',
        $array['eveapi']['result']['corporations']['KillsYesterday']['1007512845']['kills']);
    }
    /**
     * Test EveRefTypes
     *
     * @group Eve
     */
    public function testEveRefTypes ()
    {
        $migration = $this->sharedFixture['eve']['EveRefTypes'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2011-04-07 13:34:49',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2011-04-06 13:34:49',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        $this->assertArrayHasKey('refTypes', $array['eveapi']['result']);
        $this->assertArrayHasKey('0', $array['eveapi']['result']['refTypes']);
        $this->assertArrayHasKey('refTypeID',
        $array['eveapi']['result']['refTypes']['0']);
        $this->assertArrayHasKey('refTypeName',
        $array['eveapi']['result']['refTypes']['0']);
        $this->assertEquals('0',
        $array['eveapi']['result']['refTypes']['0']['refTypeID']);
        $this->assertEquals('Undefined',
        $array['eveapi']['result']['refTypes']['0']['refTypeName']);
        $this->assertEquals('17',
        $array['eveapi']['result']['refTypes']['17']['refTypeID']);
        $this->assertEquals('Bounty Prize',
        $array['eveapi']['result']['refTypes']['17']['refTypeName']);
    }
    /**
     * Test EveSkillTree
     *
     * @group Eve
     */
    public function testEveSkillTree ()
    {
        $migration = $this->sharedFixture['eve']['EveSkillTree'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2007-12-23 21:51:40',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2010-12-21 14:33:30',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        $this->assertArrayHasKey('skillGroups', $array['eveapi']['result']);
        $this->assertArrayHasKey('266',
        $array['eveapi']['result']['skillGroups']);
        $this->assertArrayHasKey('groupID',
        $array['eveapi']['result']['skillGroups']['266']);
        $this->assertArrayHasKey('groupName',
        $array['eveapi']['result']['skillGroups']['266']);
        $this->assertArrayHasKey('skills',
        $array['eveapi']['result']['skillGroups']['266']);
    }
    /**
     * Test MapFacWarSystems
     *
     * @group Map
     */
    public function testMapFacWarSystems ()
    {
        $migration = $this->sharedFixture['map']['MapFacWarSystems'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2008-06-30 07:50:05',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2008-06-30 06:50:05',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        $this->assertArrayHasKey('solarSystems', $array['eveapi']['result']);
        $this->assertArrayHasKey('30002056',
        $array['eveapi']['result']['solarSystems']);
        $this->assertArrayHasKey('solarSystemID',
        $array['eveapi']['result']['solarSystems']['30002056']);
        $this->assertArrayHasKey('solarSystemName',
        $array['eveapi']['result']['solarSystems']['30002056']);
        $this->assertArrayHasKey('occupyingFactionID',
        $array['eveapi']['result']['solarSystems']['30002056']);
        $this->assertArrayHasKey('occupyingFactionName',
        $array['eveapi']['result']['solarSystems']['30002056']);
        $this->assertArrayHasKey('contested',
        $array['eveapi']['result']['solarSystems']['30002056']);
        $this->assertEquals('30002056',
        $array['eveapi']['result']['solarSystems']['30002056']['solarSystemID']);
        $this->assertEquals('Resbroko',
        $array['eveapi']['result']['solarSystems']['30002056']['solarSystemName']);
        $this->assertEquals('0',
        $array['eveapi']['result']['solarSystems']['30002056']['occupyingFactionID']);
        $this->assertEquals('Minmatar Republic',
        $array['eveapi']['result']['solarSystems']['30002056']['occupyingFactionName']);
        $this->assertEquals('True',
        $array['eveapi']['result']['solarSystems']['30002056']['contested']);
    }
    /**
     * Test MapJumps
     *
     * @group Map
     */
    public function testMapJumps ()
    {
        $migration = $this->sharedFixture['map']['MapJumps'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertEquals('2007-12-12 12:50:38',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2007-12-12 11:50:38',
        $array['eveapi']['currentTime']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        $this->assertArrayHasKey('dataTime', $array['eveapi']['result']);
        $this->assertEquals('2007-12-12 11:50:38',
        $array['eveapi']['result']['dataTime']);
        $this->assertArrayHasKey('solarSystems', $array['eveapi']['result']);
        $this->assertArrayHasKey('solarSystemID',
        $array['eveapi']['result']['solarSystems']['30001984']);
        $this->assertArrayHasKey('shipJumps',
        $array['eveapi']['result']['solarSystems']['30001984']);
    }
    /**
     * Test MapKills
     *
     * @group Map
     */
    public function testMapKills ()
    {
        $migration = $this->sharedFixture['map']['MapKills'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        $this->assertArrayHasKey('solarSystems', $array['eveapi']['result']);
        $this->assertArrayHasKey('30001343',
        $array['eveapi']['result']['solarSystems']);
        $this->assertArrayHasKey('solarSystemID',
        $array['eveapi']['result']['solarSystems']['30001343']);
        $this->assertArrayHasKey('shipKills',
        $array['eveapi']['result']['solarSystems']['30001343']);
        $this->assertArrayHasKey('factionKills',
        $array['eveapi']['result']['solarSystems']['30001343']);
        $this->assertArrayHasKey('podKills',
        $array['eveapi']['result']['solarSystems']['30001343']);
        $this->assertEquals('30001343',
        $array['eveapi']['result']['solarSystems']['30001343']['solarSystemID']);
        $this->assertEquals('0',
        $array['eveapi']['result']['solarSystems']['30001343']['shipKills']);
        $this->assertEquals('17',
        $array['eveapi']['result']['solarSystems']['30001343']['factionKills']);
        $this->assertEquals('0',
        $array['eveapi']['result']['solarSystems']['30001343']['podKills']);
    }
    /**
     * Test MapSovereignty
     *
     * @group Map
     */
    public function testMapSovereignty ()
    {
        $migration = $this->sharedFixture['map']['MapSovereignty'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('currentTime', $array['eveapi']);
        $this->assertArrayHasKey('dataTime', $array['eveapi']['result']);
        $this->assertArrayHasKey('result', $array['eveapi']);
        $this->assertEquals('2009-12-23 05:38:47',
        $array['eveapi']['currentTime']);
        $this->assertEquals('2009-12-23 06:38:47',
        $array['eveapi']['cachedUntil']);
        $this->assertEquals('2009-12-23 05:16:38',
        $array['eveapi']['result']['dataTime']);
        $this->assertArrayHasKey('solarSystems', $array['eveapi']['result']);
        $this->assertArrayHasKey('30023410',
        $array['eveapi']['result']['solarSystems']);
        $this->assertArrayHasKey('solarSystemID',
        $array['eveapi']['result']['solarSystems']['30023410']);
        $this->assertArrayHasKey('allianceID',
        $array['eveapi']['result']['solarSystems']['30023410']);
        $this->assertArrayHasKey('factionID',
        $array['eveapi']['result']['solarSystems']['30023410']);
        $this->assertArrayHasKey('solarSystemName',
        $array['eveapi']['result']['solarSystems']['30023410']);
        $this->assertArrayHasKey('corporationID',
        $array['eveapi']['result']['solarSystems']['30023410']);
        $this->assertEquals('30023410',
        $array['eveapi']['result']['solarSystems']['30023410']['solarSystemID']);
        $this->assertEquals('0',
        $array['eveapi']['result']['solarSystems']['30023410']['allianceID']);
        $this->assertEquals('500002',
        $array['eveapi']['result']['solarSystems']['30023410']['factionID']);
        $this->assertEquals('Embod',
        $array['eveapi']['result']['solarSystems']['30023410']['solarSystemName']);
        $this->assertEquals('0',
        $array['eveapi']['result']['solarSystems']['30023410']['corporationID']);
    }
    /**
     * Test ServerStatus
     *
     * @group Server
     */
    public function testServerStatus ()
    {
        $migration = $this->sharedFixture['server']['ServerStatus'];
        $res = new EveLib_Ccp_Api_Response(file_get_contents($migration));
        $array = $res->getResult();
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertArrayHasKey('cachedUntil', $array['eveapi']);
        $this->assertEquals('2008-11-24 20:14:29',
        $array['eveapi']['currentTime']);
        $this->assertEquals('2008-11-24 20:17:29',
        $array['eveapi']['cachedUntil']);
        $this->assertArrayHasKey('serverOpen', $array['eveapi']['result']);
        $this->assertArrayHasKey('onlinePlayers', $array['eveapi']['result']);
        $this->assertEquals('True', $array['eveapi']['result']['serverOpen']);
        $this->assertEquals('38102',
        $array['eveapi']['result']['onlinePlayers']);
        $this->assertArrayHasKey('result', $array['eveapi']);
    }
}

