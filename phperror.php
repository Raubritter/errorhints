<?php

class phperror {
	protected $description;
	protected $explanation;
	protected $solution;
	
	public function __construct($description) {
		$this->description = $description;
	}
	public function getexplanation(){
		return $this->explanation;
	}
	public function getsolution(){
		return $this->solution;
	}
	public function getdescription(){
		return $this->description;
	}
	
}