<?php
require_once 'EveLib/Ccp/Api.php';
require_once 'PHPUnit/Framework/TestCase.php';
/**
 * EveLib_Ccp_Api test case.
 */
class EveLib_Ccp_LiveTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     * Enter description here ...
     * @var EveLib_Ccp_Api
     */
    protected $EveLib_Ccp_Api;
    protected function setUp ()
    {
        require_once 'Zend/Log.php';
        require_once 'Zend/Log/Writer/Stream.php';
        $writer = new Zend_Log_Writer_Stream('php://output');
        EveLib_Ccp_Api::$log = new Zend_Log($writer);
        $frontendOptions = array('lifetime' => 0,
        'automatic_serialization' => true);
        $backendOptions = array('cache_dir' => '/tmp/');
        require_once 'Zend/Cache.php';
        EveLib_Ccp_Api::$cache = Zend_Cache::factory('Core', 'File',
        $frontendOptions, $backendOptions);
        $this->EveLib_Ccp_Api = new EveLib_Ccp_Api();
        $this->EveLib_Ccp_Api->setCredentials(
        array('apiKey' => TEST_API_KEY, 'userID' => TEST_USERID,
        'characterID' => TEST_CHARACTERID));
    }
    /**
     * @group live
     * Enter description here ...
     */
    public function testLive ()
    {
        $data = $this->EveLib_Ccp_Api->serverStatus();
         //        print_r($data);
    }
    /**
     * @group live
     * Enter description here ...
     */
    public function testLiveCharacters ()
    {
        $data = $this->EveLib_Ccp_Api->accountCharacters();
        $this->EveLib_Ccp_Api->getResult()->getXml();
    }
    /**
     * @group live
     * Enter description here ...
     */
    //    public function testLiveCorpAssetList() {
    //        $data = $this->EveLib_Ccp_Api->corpAssetList();
    //        echo $this->EveLib_Ccp_Api->getResult()->getXml();
    //    }
    /**
     * @group live
     * Enter description here ...
     */
    public function testLiveCorpKilllog ()
    {
        $data = $this->EveLib_Ccp_Api->corpKilllog();
        $this->EveLib_Ccp_Api->getResult()->getXml(true);
         //        print_r($data);
    }
    /**
     * @group live
     * Enter description here ...
     */
    public function testLiveCorpCorporationSheet ()
    {
        $data = $this->EveLib_Ccp_Api->corpCorporationSheet();
         //        print_r($data);
    }
}