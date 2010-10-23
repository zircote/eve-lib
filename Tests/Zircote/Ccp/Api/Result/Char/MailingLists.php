<?php 


class Tests_Zircote_Ccp_Api_Result_Char_MailingLists
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-12-02 06:29:32</currentTime>
  <result>
    <rowset name="mailingLists" key="listID" columns="listID,displayName">
      <row listID="128250439" displayName="EVETycoonMail" />
      <row listID="128783669" displayName="EveMarketScanner" />
      <row listID="141157801" displayName="Exploration Wormholes" />
    </rowset>
  </result>
  <cachedUntil>2009-12-02 12:29:32</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api/Result/Char/MailingLists.php';
 		$out = new Zircote_Ccp_Api_Result_Char_MailingLists($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('mailingLists', $out->result['result']);
		foreach (explode(',','listID,displayName') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['mailingLists']['128250439']);
			$this->assertArrayHasKey($row, $out->result['result']['mailingLists']['128783669']);
			$this->assertArrayHasKey($row, $out->result['result']['mailingLists']['141157801']);
		}
 		$api = $out = null;
 	}
}