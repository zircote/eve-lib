<?php 
/**
 * @license Copyright 2010 Robert Allen
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 * http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

class EveLib_Ccp_Api_Result_Char_UpcomingCalendarEventsTest
	extends PHPUnit_Framework_TestCase {
		
	public function setup(){
		$this->sharedFixture =<<<EOF
<?xml version='1.0' encoding='UTF-8'?>
 <eveapi version="2">
   <currentTime>2010-09-20 13:55:44</currentTime>
   <result>
     <rowset name="upcomingEvents" key="eventID" columns="eventID,ownerID,ownerName,eventDate,eventTitle,duration,importance,response,eventText">
       <row eventID="70485" ownerID="1" ownerName="" eventDate="2010-09-25 20:00:00" 
       eventTitle="Mass Testing on Singularity" duration="120" importance="0" response="Undecided" 
       eventText="Our next mass test on the Singularity test server will be on Saturday, September 25, 2010 at 20:00 UTC ." />
     </rowset>
   </result>
   <cachedUntil>2010-09-20 14:10:44</cachedUntil>
 </eveapi>
EOF;
	}
 	
 	/**
 	 * @group EveLib_Ccp_Api_Result_Char
 	 */
 	public function testAccountStatus(){
 		//include_once 'EveLib/Ccp/Api.php';
 		//include_once 'EveLib/Ccp/Api/Result/Char/UpcomingCalendarEvents.php';
 		$out = new EveLib_Ccp_Api_Result_Char_UpcomingCalendarEvents($this->sharedFixture);
// 		print_r($out->result); 
		$this->assertArrayHasKey('cachedUntil', $out->result);
		$this->assertArrayHasKey('currentTime', $out->result);
		$this->assertArrayHasKey('upcomingEvents', $out->result['result']);
		foreach (explode(',','eventID,ownerID,ownerName,eventDate,eventTitle,duration,importance,response,eventText') as $row) {
			$this->assertArrayHasKey($row, $out->result['result']['upcomingEvents']['70485']);
		}
 		$api = $out = null;
 	}
}