<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_CorporationSheet 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
	$this->sharedFixture = <<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2010-02-26 05:34:14</currentTime>
  <result>
    <corporationID>150212025</corporationID>
    <corporationName>Banana Republic</corporationName>
    <ticker>BR</ticker>
    <ceoID>150208955</ceoID>
    <ceoName>Mark Roled</ceoName>
    <stationID>60003469</stationID>
    <stationName>Jita IV - Caldari Business Tribunal Information Center</stationName>
    <description>Garth's testing corp of awesome sauce, win sauce as it were. In this
                 corp...&lt;br&gt;&lt;br&gt;IT HAPPENS ALL OVER</description>
    <url>some url</url>
    <allianceID>150430947</allianceID>
    <allianceName>The Dead Rabbits</allianceName>
    <taxRate>93.7</taxRate>
    <memberCount>3</memberCount>
    <memberLimit>6300</memberLimit>
    <shares>1</shares>
    <rowset name="divisions" key="accountKey" columns="accountKey,description">
      <row accountKey="1000" description="Division 1"/>
      <row accountKey="1001" description="Division 2"/>
      <row accountKey="1002" description="Division 3"/>
      <row accountKey="1003" description="Division 4"/>
      <row accountKey="1004" description="Division 5"/>
      <row accountKey="1005" description="Division 6"/>
      <row accountKey="1006" description="Division 7"/>
    </rowset>
 
    <rowset name="walletDivisions" key="accountKey" columns="accountKey,description">
      <row accountKey="1000" description="Wallet Division 1"/>
      <row accountKey="1001" description="Wallet Division 2"/>
      <row accountKey="1002" description="Wallet Division 3"/>
      <row accountKey="1003" description="Wallet Division 4"/>
      <row accountKey="1004" description="Wallet Division 5"/>
      <row accountKey="1005" description="Wallet Division 6"/>
      <row accountKey="1006" description="Wallet Division 7"/>
    </rowset>
    <logo>
      <graphicID>0</graphicID>
      <shape1>448</shape1>
      <shape2>0</shape2>
      <shape3>418</shape3>
      <color1>681</color1>
      <color2>676</color2>
      <color3>0</color3>
    </logo>
  </result>
  <cachedUntil>2010-02-26 11:34:14</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testCorporationSheet(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/CorporationSheet.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_CorporationSheet($this->sharedFixture);
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('corporationID', $out->result['result']);
		foreach (explode(',','accountKey,description') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['divisions']['1000']);
			$this->assertArrayHasKey($row, $out->result['result']['walletDivisions']['1000']);
		}
 	}
}