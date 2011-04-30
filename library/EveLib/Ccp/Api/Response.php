<?php

class EveLib_Ccp_Api_Response {
	/**
	 * 
	 * @var array
	 */
	public $result;
	/**
	 * 
	 * @var SimpleXMLElement
	 */
	public $xml;
	public function __construct($data) {
		$this->xml = simplexml_load_string ( $data );
		$this->result = $this->process ( $this->xml );
	}
	
	public function getResult() {
		return $this->result;
	}
	
	public function process(SimpleXMLElement $xml) {
		$result = array ();
		$name = $xml->getName ();
		if ($name == 'rowset') {
			$data = $this->rowSet ( $xml );
			foreach ( $data as $rK => $rV ) {
				$result [$rK] = $rV;
			}
		} else {
			$result [$name] = array ();
			foreach ( $xml->attributes () as $key => $value ) {
				$result [$name] [( string ) $key] = ( string ) $value;
			}
			if ($xml->count () > 0) {
				foreach ( $xml->children () as $child ) {
					foreach ( $this->process ( $child ) as $cK => $cV ) {
						$result [$name] [$cK] = $cV;
					}
				}
			} else {
				$result [$name] = ( string ) $xml;
				foreach ( $xml->attributes () as $key => $att ) {
					$result [$name] [( string ) $key] = ( string ) $att;
				}
			}
		}
		return $result;
	}
	
	public function rowSet(SimpleXMLElement $xml) {
		$i = 0;
		$result = array ();
		foreach ( $xml->attributes () as $key => $value ) {
			$meta [$key] = ( string ) $value;
		}
		foreach ( $xml->row as $row ) {
			$data = $this->row ( $row );
			if (array_key_exists ( 'key', $meta )) {
				$_key = $data [$meta ['key']];
			} else {
				$_key = $i ++;
			}
			$result [$meta ['name']] [$_key] = $data;
		}
		return $result;
	}
	
	public function row(SimpleXMLElement $xml) {
		$result = array ();
		foreach ( $xml->attributes () as $key => $value ) {
			$result [( string ) $key] = ( string ) $value;
		}
		foreach ( $xml->children () as $child ) {
			$data = $this->process ( $child );
			$result = array_merge ( $result, $data );
		}
		return $result;
	}
}