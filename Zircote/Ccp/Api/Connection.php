<?php


class Zircote_Ccp_Api_Connection {
	
	private $_curl;
	
	protected $_uri;
	
	public function __construct(array $options){
		$uri = "{$options['protocol']}://{$options['host']}:{$options['port']}";
		$this->setUri($uri); 
	}
	
	public function get_curl($url){
		$this->_curl = curl_init($url);
		curl_setopt($this->_curl, CURLOPT_POST, true);
		curl_setopt($this->_curl, CURLOPT_HEADER, false);
		curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->_curl, CURLOPT_FOLLOWLOCATION, false);
		return $this->_curl;
	}
	
	public function setUri($uri){
		require_once 'Zend/Uri.php';
		if(!Zend_Uri::check($uri)){
			require_once 'Zircote/Ccp/Api/Exception.php';
			throw new Zircote_Ccp_Api_Exception("URI provided is inValid [{$url}]", 500);
		}
		$this->_uri = $uri;
		return $this;
	}
	
	public function get_uri(){
		return $this->_uri;
	}
	
	public function handle(Zircote_Ccp_Api_Command_Abstract $command){
		$options = $command->_getRequest();
		$this->get_curl($this->get_uri() . $command->path);
		if(is_array($options) && count($options)){
			$params = null;
			foreach ($options as $key => $value) {
				$params .= "{$key}=".url_encode($value) . "&";
			}
			$params = rtrim($params, '&');
			curl_setopt($this->_curl, CURLOPT_POSTFIELDS, $params);
		}
		return $command->_parseResponse(curl_exec($this->_curl));
	}
}