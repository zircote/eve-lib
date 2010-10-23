<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_Shareholders 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-09-02 17:45:01</currentTime>
  <result>
    <rowset name="characters" key="shareholderID" columns="shareholderID,shareholderName,shareholderCorporationID,shareholderCorporationName,shares">
      <row shareholderID="126891489" shareholderName="Dragonaire" shareholderCorporationID="632257314" shareholderCorporationName="Corax." shares="1" />
    </rowset>
    <rowset name="corporations" key="shareholderID" columns="shareholderID,shareholderName,shares" >
    	<row shareholderID="5432132121" shareholderName="Dragonaire" shares="1" />
   </rowset>
  </result>
  <cachedUntil>2008-09-02 18:45:01</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testShareholders(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/Shareholders.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_Shareholders($this->sharedFixture);
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('characters', $out->result['result']);
		$this->assertArrayHasKey('corporations', $out->result['result']);
		foreach (explode(',','shareholderID,shareholderName,shareholderCorporationID,'.
			'shareholderCorporationName,shares') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['characters']['126891489']);
		}
		foreach (explode(',','shareholderID,shareholderName,shares') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['corporations']['5432132121']);
		}
		
// 		print_r($out->result);
 	}
}