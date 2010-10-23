<?php 


class Tests_Zircote_Ccp_Api_Result_Corp_CalendarEventAttendees 
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF

EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testCalendarEventAttendees(){
 		$this->markTestIncomplete();
 		require_once 'Zircote/Ccp/Api/Result/Corp/CalendarEventAttendees.php';
 		$api = new Zircote_Ccp_Api_Result_Corp_CalendarEventAttendees($this->sharedFixture);
// 		print_r($out->result);
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
// 		print_r($out->result);
 	}
}