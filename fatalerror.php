<?php

include_once("phperror.php");

class fatalerror extends phperror{
	
	public function __construct($description) {
		parent::__construct($description);
	}
	public function checkerrortype($message) {
		if (preg_match('/Cannot use [] for reading/',$message))
		{
			$this->cannot_use_bracket_for_reading();
		}
		else if (preg_match('/Class (.*) not found/',$message))
		{
			preg_match('/Class (.*) not found in/',$message,$class);
			$this->class_not_found($class[1]);
		}
		else if (preg_match('/Interface (.*) not found/',$message))
		{
			preg_match('/Interface (.*) not found in/',$message,$interface);
			$this->interface_not_found($interface[1]);
		}
		else if (preg_match('/Call to undefined method/',$message))
		{
			preg_match('/Call to undefined method (.*)\(\) in/',$message,$method);
			$this->call_to_undefined_method($method[1]);
		}
		else if (preg_match('/Call to undefined function/',$message))
		{
			preg_match('/Call to undefined function (.*)\(\) in/',$message,$function);
			$this->call_to_undefined_function($function[1]);
		}
		else if (preg_match('/Cannot implement/i',$message))
		{
			preg_match('/Cannot implement (.*) not an interface/i',$message,$interface);
			$this->cannot_implement_not_an_interface($interface[1]);
		}
		else if (preg_match('/Namespace declaration has to be the very first statement/',$message))
		{
			$this->namespace_declaration_has_to_be_first_statement();
		}
		else if (preg_match('/Uncaught exception (.*) with message/',$message))
		{
			$this->uncaught_exception_with_message();
		}
		else if (preg_match('/Can\'t use function return value/',$message))
		{
			$this->cant_use_function_return_value();
		}
		else if (preg_match('/failed to open stream: Permission denied/i',$message))
		{
			$this->failed_to_open_stream_permission_denied();
		}
		else if (preg_match('/Can\'t inherit abstract function/',$message))
		{
			$this->cant_inherit_abstract_function();
		}
		else if (preg_match('/Object of class (.*) could not be converted to string/',$message))
		{
			$this->object_of_class_could_not_be_converted_to_string();
		}
		else if (preg_match('\'continue\' operator accepts only positive numbers/i',$message))
		{
			$this->continue_operator_accepts_only_positive_numbers();
		}
		else if (preg_match('/Maximum execution time (.*) exceeded/',$message))
		{
			$this->maximum_execution_time_exceeded();
		}
		else if (preg_match('/Allowed memory size (.*) exhausted/',$message))
		{
			$this->allowed_memory_size_exhausted();
		}
		else if (preg_match('/Cannot redeclare class/',$message))
		{
			$this->cannot_redeclare_class();
		}
		else if (preg_match('/Cannot redeclare (.*)\(\)/',$message))
		{
			$this->cannot_redeclare_function();
		}
	}
	private function cannot_use_bracket_for_reading() {
		$this->explanation = "Die Klammer[] ist leer";
		$this->solution[] = "Ein ] entfernen";
		$this->solution[] = "[] mit true befüllen";
	}
	private function class_not_found($classname){
		$this->explanation = "Eine Klasse mit der Schreibweise ".$classname." kann nicht gefunden werden";
		$this->solution[] = "Nach Klasse mit ähnlicher Schreibweise suchen";
		$this->solution[] = "Includes überprüfen";
	}
	private function interface_not_found($interfacename){
		$this->explanation = "Ein Interface mit der Schreibweise ".$interfacename." kann nicht gefunden werden";
		$this->solution[] = "Nach Interface mit ähnlicher Schreibweise suchen";
		$this->solution[] = "Includes überprüfen";
	}
	private function call_to_undefined_method($methodname){
		$this->explanation = "Eine Methode mit der Schreibweise ".$methodname." kann nicht gefunden werden";
		$this->solution[] = "Nach Methode mit ähnlicher Schreibweise suchen";
		$this->solution[] = "Includes überprüfen";
	}
	private function call_to_undefined_function($functionname){
		$this->explanation = "Eine Funktion mit der Schreibweise ".$functionname." kann nicht gefunden werden";
		$this->solution[] = "Nach Funktion mit ähnlicher Schreibweise suchen";
		$this->solution[] = "Includes überprüfen";
	}
	private function cannot_implement_not_an_interface($interfacename){
		$this->explanation = "Ein Interface mit dieser Schreibweise kann nicht gefunden werden";
		$this->solution[] = "Nach Interface mit ähnlicher Schreibweise suchen";
		$this->solution[] = "Interface vor Klassennamen";
	}
	private function namespace_declaration_has_to_be_first_statement(){
		$this->explanation = "Namespace wird zu spät definiert";
		$this->solution[] = "Positionen verschieben";
	}
	private function uncaught_exception_with_message($exception){
		$this->explanation = "Die Fehlermeldung".$exception." wird nirgendwo abgefangen";
		$this->solution[] = "try{..}catch(Exception $e){} um den Aufruf";
	}
	private function cant_use_function_return_value(){
		$this->explanation = "Veraltetes Problem";
		$this->solution[] = "Auf Version 5.3 updaten";
	}
	private function failed_to_open_stream_permission_denied(){
		$this->explanation = "Fehlende Zugriffsrechte";
		$this->solution[] = "Rechte anpassen";
	}
	private function cant_inherit_abstract_function(){
		$this->explanation = "Abstrakte Funktionen werden (anders als in Java) weitergegeben.";
		$this->solution[] = "abstract entfernen";
	}
	private function object_of_class_could_not_be_converted_to_string(){
		$this->explanation = "Die Klasse kann nicht als String dargestellt werden";
		$this->solution[] = "eventuell \$newvar = classname->xyz()";
	}
	private function continue_operator_accepts_only_positive_numbers($number){
		$this->explanation = $number." ist negativ";
		$this->solution[] = "ein abs(".$number.")";
		$this->solution[] = "nummer anpassen";
	}
	private function maximum_execution_time_exceeded(){
		$this->explanation = "Maximale ausführungszeit überschritten";
		$this->solution[] = "Mögliche endlosschleife entfernen";
		$this->solution[] = "Ausführungszeit verlängern";
	}
	private function allowed_memory_size_exhausted(){
		$this->explanation = "Maximale Speichergröße überschritten";
		$this->solution[] = "Mögliche endlosschleife entfernen";
		$this->solution[] = "Memorysize vergrößern";
	}
	private function cannot_redeclare_class(){
		$this->explanation = "Der Klassenname existiert bereits";
		$this->solution[] = "Umbenennen";
	}
	private function cannot_redeclare_function(){
		$this->explanation = "Der Methoden / Funktionenname existiert bereits";
		$this->solution[] = "Umbenennen";
	}
}