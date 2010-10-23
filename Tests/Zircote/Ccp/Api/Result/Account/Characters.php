<?php 


class Tests_Zircote_Ccp_Api_Result_Account_Characters 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="1">
  <currentTime>2007-12-12 11:48:50</currentTime>
  <result>
    <rowset name="characters" key="characterID" columns="name,characterID,corporationName,corporationID">
      <row name="Mary" characterID="150267069"
           corporationName="Starbase Anchoring Corp" corporationID="150279367" />
      <row name="Marcus" characterID="150302299"
           corporationName="Marcus Corp" corporationID="150333466" />
      <row name="Dieinafire" characterID="150340823"
           corporationName="Center for Advanced Studies" corporationID="1000169" />
    </rowset>
  </result>
  <cachedUntil>2007-12-12 12:48:50</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAllianceList(){
 		require_once 'Zircote/Ccp/Api/Result/Account/Characters.php';
 		$out = new Zircote_Ccp_Api_Result_Account_Characters($this->sharedFixture);
// 		print_r($out->result);
 		
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('result', $out->result);
		$this->assertArrayHasKey('characters', $out->result['result']);
		foreach (explode(',', 'name,characterID,corporationName,corporationID') as $item){
			$this->assertArrayHasKey($item, $out->result['result']['characters']['150267069']);
		}
 		$api = $out = null;
 	}
}