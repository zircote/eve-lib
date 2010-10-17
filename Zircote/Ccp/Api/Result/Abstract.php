<?php
/*
 
   <result>
    <rowset name="alliances" key="allianceID" columns="name,shortName,allianceID,executorCorpID,memberCount,startDate">
      <row name="Starbase Anchoring Alliance" shortName="MATT" allianceID="150382481"
           executorCorpID="150279367" memberCount="4" startDate="2007-09-18 11:04:00">
        <rowset name="memberCorporations" key="corporationID" columns="corporationID,startDate">
          <row corporationID="150279367" startDate="2007-09-18 11:04:00" />
          <row corporationID="150333466" startDate="2007-09-19 11:04:00" />
        </rowset>
      </row>
      <row name="The Dead Rabbits" shortName="TL.DR" allianceID="150430947"
           executorCorpID="150212025" memberCount="3" startDate="2007-11-12 16:00:00">
        <rowset name="memberCorporations" key="corporationID" columns="corporationID,startDate">
          <row corporationID="150212025" startDate="2007-11-12 16:00:00" />
        </rowset>
      </row>
    </rowset>
 
 */

class Zircote_Ccp_Api_Result_Abstract {
	
	public $xml;
	
	public $result = array();
	
	public function __construct($xml){
		$this->loadXml($xml);
	}
	
	public function loadXml($xml){
		$this->xml = $xml;
		$result = array();
		$xml = simplexml_load_string($xml);
		if($xml->count()){
			foreach ($xml as $value) {
				if($value->getName() == 'result'){
					$__result = $this->__result($value);
				} else {
					$result[$value->getName()] = (string) $value;
				}
			}
		}
		$result = array_merge($result, $__result);
		$this->result = $result;
	}
	
	public function __get($name){
		if(property_exists($this, $name)){
			return $this->$name;
		}
	}
	
	public function __result($xml){
		$row = $rowset = $result = array();
		if($xml->count()){
			foreach ($xml as $value) {
				if($value->getName() == 'row'){
					$row = $this->__row($value);
				} elseif($value->getName() == 'rowset'){
					$rowset = $this->__rowSet($value);
				} else {
					$result[$value->getName()] = (string) $value;
				}
			}
		}
		$result = array_merge($result, $rowset);
		return $result;
	}
	
	public function __rowSet(SimpleXMLElement $xml){
		$data = array('meta' => null);
		foreach ($xml->attributes() as $key => $value) {
			$data['meta'][(string)$key] = (string)$value;
		}
		$data['meta']['columns'] = explode(',', $data['meta']['columns']);
		$set_key = $data['meta']['name'];
		$result[$set_key] = array('meta' => $data['meta'], $set_key => null);
		if($xml->row->count()){
			foreach ($xml->row as $_row) {
				$row = $this->__row($_row);
				$result[$set_key][$set_key][$row[$result[$set_key]['meta']['key']]] = $row;
			}
		}
		unset($result[$set_key]['meta']);
		return $result[$set_key];
	}
	
	public function __row($xml){
		$meta = array();
		$result = array();
		$rs = array();
		foreach ($xml->attributes() as $key => $value) {
			$result[(string)$key] = (string)$value;
		}
		if($xml->rowset){
			foreach ($xml->rowset as $rowset) {
				$rs = $this->__rowSet($rowset);
			}
			$result = array_merge($result, $rs);
		}
		return $result;
	}
	
	public function __wakeup(){
		$this->loadXml($this->xml);
	}
}