<?php

class EveLib_Ccp_Api_Parser {
	
	public function __construct($xml){
		$this->xml = simplexml_load_string($xml);
	}
}