<?php

/**
 * 
 * 
 * @author zircote
 *
 */
class Zircote_Ccp_Api_Result_Abstract {
	
	public $xml;
	
	public $result = array();
	
	public function __construct($xml){
		if($xml){
			$this->loadXml($xml);
		}
	}
	
	public function loadXml($xml){
		$this->xml = $xml;
		$result = array();
		$xml = simplexml_load_string($xml);
		$key_name = $xml->getName();
		if($xml->count()){
			foreach ($xml as $value) {
				if($value->getName() == 'result'){
					$result[$key_name] = array_merge($result[$key_name],$this->__basic($value));
				} else {
					$result[$key_name][$value->getName()] = (string) $value;
				}
			}
		}
		$this->result = $result['eveapi'];
	}
	
	public function __get($name){
		if(property_exists($this, $name)){
			return $this->$name;
		}
	}
	
	public function __basic($xml){
		$result = array($key = $xml->getName() => array());
		foreach ($xml->children() as $value) {
			if($value->count() == 1){
				$result[$key][$value->getName()] = (string) $value;
			} 
			elseif($value->count() && $value->getName() == 'rowset'){
				$result[$key] = array_merge($result[$key],$this->__rowSet($value));
			} elseif($value->count() > 1){
				foreach ($value->children() as $_value) {
					$result[$key][$value->getName()][$_value->getName()] = (string) $_value;
				}
			} 
		};
		return $result;
	}
	
	public function __element($xml){
		return array($xml->getName() => (string) $xml);
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
			$i = 0;
			$r_key = array_key_exists('key',$result[$set_key]['meta'] ) ?
			$result[$set_key]['meta']['key']:
			$result[$set_key]['meta'];
			foreach ($xml->children() as $_row) {
				$row = $this->__row($_row);
				$r_key = array_key_exists('key',$result[$set_key]['meta'] ) ?
				$row[$result[$set_key]['meta']['key']]:
				++$i;
				$result[$set_key][$set_key][$r_key] = $row;
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
		if($xml->count() > 1){
			foreach ($xml->rowset as $rowset) {
				$rs = $this->__rowSet($rowset);
				$result = array_merge($result, $rs);
			}
		} elseif($xml->count() > 1){
			$rs = $this->__basic($xml);
			$result = array_merge($result, $rs);
		}
		return $result;
	}
	
	public function __wakeup(){
		$this->loadXml($this->xml);
	}
}