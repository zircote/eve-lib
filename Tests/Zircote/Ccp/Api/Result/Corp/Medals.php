<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_Medals 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2008-12-06 23:20:41</currentTime>
  <result>
    <rowset name="medals" key="medalID" columns="medalID,title,description,creatorID,created" >
    	<row medalID="a" title="d" description="f" creatorID="g" created="h" /> 
    </rowset>
  </result>
  <cachedUntil>2008-12-07 22:20:41</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testMedals(){
 		require_once 'Zircote/Ccp/Api/Result/Corp/Medals.php';
 		$out = new Zircote_Ccp_Api_Result_Corp_Medals($this->sharedFixture);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('medals', $out->result['result']);
		foreach (explode(',','medalID,title,description,creatorID,created') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['medals']['a']);
		}
// 		print_r($out->result);
 	}
}