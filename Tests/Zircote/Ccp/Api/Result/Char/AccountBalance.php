<?php 


class Tests_Zircote_Ccp_Api_Result_Char_AccountBalance
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
<eveapi version="2">
  <currentTime>2007-12-16 11:55:31</currentTime>
  <result>
    <rowset name="accounts" key="accountID" columns="accountID,accountKey,balance">
      <row accountID="4807144" accountKey="1000" balance="209127823.31" />
    </rowset>
  </result>
  <cachedUntil>2007-12-16 12:10:31</cachedUntil>
</eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		require_once 'Zircote/Ccp/Api/Result/Char/AccountBalance.php';
 		$out = new Zircote_Ccp_Api_Result_Char_AccountBalance($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('accounts', $out->result['result']);
		foreach (explode(',','accountID,accountKey,balance') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['accounts']['4807144']);
		}
 		$api = $out = null;
 	}
}