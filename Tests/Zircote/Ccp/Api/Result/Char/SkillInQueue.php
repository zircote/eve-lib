<?php 


class Tests_Zircote_Ccp_Api_Result_Char_SkillinQueue
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2009-03-18 13:19:43</currentTime>
  <result>
    <rowset name="skillqueue" key="queuePosition" 
    columns="queuePosition,typeID,level,startSP,endSP,startTime,endTime">
      <row queuePosition="1" typeID="11441" level="3" startSP="7072" endSP="40000" startTime="2009-03-18 02:01:06" endTime="2009-03-18 15:19:21" />
      <row queuePosition="2" typeID="20533" level="4" startSP="112000" endSP="633542" startTime="2009-03-18 15:19:21" endTime="2009-03-30 03:16:14" />
    </rowset>
  </result>
  <cachedUntil>2009-03-18 13:34:43</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api/Result/Char/SkillinQueue.php';
 		$out = new Zircote_Ccp_Api_Result_Char_SkillinQueue($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('skillqueue', $out->result['result']);
		foreach (explode(',','queuePosition,typeID,level,startSP,endSP,startTime,endTime') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['skillqueue']['1']);
			$this->assertArrayHasKey($row, $out->result['result']['skillqueue']['2']);
		}
 		$api = $out = null;
 	}
}