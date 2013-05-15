<?php
/**
 * Projekt: logger
 * created: f.scholz
*/
 
class log {
    	private $lName = null;
    	private $handle = null;

    	public function __construct($logName = null) {
    		if ($logName) $this->lName = $logName;
    		else $this->lName = "Log";
    		$this->logOpen();
    	}

    	function __destruct() {
    	       fclose($this->handle);
    	}

    	private function logOpen(){
    		$today = date('Y-m-d');
    		$this->handle = fopen($this->lName . '_' . $today . '.log', 'a') or exit("Can't open " . $this->lName . "_" . $today);
      	}

      	public function logWrite($message){
    		$time = date('d.m.Y @ H:i:s -');
    		fwrite($this->handle, $time . " " . $message . "\n");
      	}

      	public function logClear(){
    		ftruncate($this->handle, 0);
    	}
}
