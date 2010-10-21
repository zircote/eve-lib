<?php

require_once 'Zircote/Ccp/Api/Result/Abstract.php';

class Zircote_Ccp_Api_Result_Corp_MemberSecurity extends Zircote_Ccp_Api_Result_Abstract {
	
	public function parse(SimpleXMLElement $sXml){
		$result = array();
		switch ($sXml->getName()) {
			case 'rowset':
				$result = $this->rowset($sXml);
			break;
			
			case 'row':
				$result = $this->row($sXml);
			break;
			
			case 'error':
				$result = $this->error($sXml);
			break;
			
			case 'member':
				$result = $this->member($sXml);
			break;
			
			default:
				$result[$sXml->getName()] = array();
				if($sXml->count()){
					foreach ($sXml as $xml) {
						$rs = $this->parse($xml);
						$result[$sXml->getName()] = array_merge($result[$sXml->getName()], $rs);
					}
				} else {
					$result[$sXml->getName()] = (string) $sXml;
				}
			break;
		}
		return $result;
	}
	
	public function member($sXml){
		$result = array();
		$attr = $this->attr($sXml);
		$result[$attr['name']] = $attr;
		if($sXml->count()){
			foreach ($sXml as $xml) {
				$rs = $this->parse($xml);
				foreach ($rs as $key => $value) {
					$result[$attr['name']][$key] = $value;
				}
			}
		}
		return $result;
	}
}