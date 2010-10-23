<?php

require_once 'Zircote/Ccp/Api/Result/Abstract.php';

class Zircote_Ccp_Api_Result_Char_MailBodies extends Zircote_Ccp_Api_Result_Abstract {
	

	
	public function parse(SimpleXMLElement $sXml){
		$result = array();
		switch ($sXml->getName()) {
			case 'rowset':
				$result = $this->rowset($sXml);
			break;
			
			case 'message':
				$result = $this->row($sXml);
			break;
			
			case 'row':
				$result = $this->row($sXml);
			break;
			
			case 'error':
				$result = $this->error($sXml);
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
				if(count($attr = $this->attr($sXml))){
					foreach ($attr as $key => $value) {
						$result[$sXml->getName()][$key] = $value;
					}
				}
			break;
		}
		return $result;
	}
}