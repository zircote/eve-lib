<?php

interface Zircote_Ccp_Api_Command_Interface {
    public function __construct(Zircote_Ccp_Api $api, $name, $arguments);
	public function write();
	public function read();
}