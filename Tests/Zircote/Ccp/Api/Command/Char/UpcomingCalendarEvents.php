<?php 


class Tests_Zircote_Ccp_Api_Command_Char_UpcomingCalendarEvents
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
 <eveapi version="2">
   <currentTime>2010-09-20 13:55:44</currentTime>
   <result>
     <rowset name="upcomingEvents" key="eventID" columns="eventID,ownerID,ownerName,eventDate,eventTitle,duration,importance,response,eventText">
       <row eventID="70485" ownerID="1" ownerName="" eventDate="2010-09-25 20:00:00" eventTitle="Mass Testing on Singularity" duration="120" importance="0" response="Undecided" eventText="Our next mass test on the Singularity test server will be on Saturday, September 25, 2010 at 20:00 UTC and will last approximately 1.5 hours. We are looking for approximately 350 or more players to assist with testing. More information about the testing can be found in <a href="http://www.eveonline.com/ingameboard.asp?a=topic&amp;threadID=1267555&amp;page=1&quot;>this thread</a>." />
     </rowset>
   </result>
   <cachedUntil>2010-09-20 14:10:44</cachedUntil>
 </eveapi>
EOF;
	}
 	
 	/**
 	 * @param Zircote_Ccp_Api $api
 	 */
 	public function testAccountStatus(){
 		$this->markTestSkipped();
 		require_once 'Zircote/Ccp/Api.php';
 		require_once 'Zircote/Ccp/Api/Result/Char/UpcomingCalendarEvents';
 		$api = new Zircote_Ccp_Api(Tests_AllTests::$tests_config);
 		$out = $api->setScope('Char')
 			->UpcomingCalendarEvents();
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('upcomingEvents', $out->result['result']);
 		$api = $out = null;
 	}
}