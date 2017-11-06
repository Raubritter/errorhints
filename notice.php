<?php

class notice extends phperror{
	public function __construct(string $message = "", int $code = 0, \Throwable $previous = null) {
		parent::__construct($message, $code, $previous);
	}
	public function checkerrortype(){
		switch($this->description)
		{
			case "use of undefined constant":
				$this->use_of_undefined_constant();
				break;
			case "undefined index":
				$this->undefined_index();
				break;

		}
	}
	private function use_of_undefined_constant($constant) {
		$this->explanation = $constant." wurde nie als Konstante definiert";
		$this->solution[] = "Statt ".$constant." '".$constant."' schreiben. So wird die Stelle im Array angegeben";
	}
	private function undefined_index($index){
		$this->explanation = $index." wurde möglicherweise nie ein Wert zugewiesen";
		$this->solution[] = "isset um ".$index;
		$this->solution[] = "ignorieren und möglicherweise die Anzeige von notice- Fehlermeldungen ausstellen";
	}
}