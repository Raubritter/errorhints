<?php

include_once("phperror.php");

class warning extends phperror{
	
	public function __construct($description) {
		parent::__construct($description);
	}
	public function checkerrortype() {
		switch($this->description)
		{
			case "array_pop(): The argument should be an array":
				$this->array_pop_argument_should_be_an_array();
				break;
			case "cannot modify header information header already sent":
				$this->cannot_modify_header_information_header_already_sent();
				break;
			case "cannot use scalar value as an array":
				$this->cannot_use_scalar_value_as_an_array();
				break;
			case "cannot use string offset as an array":
				$this->cannot_use_string_offset_as_an_array();
				break;
			case "Division by zero":
				$this->division_by_zero();
				break;
			case "fclose argument no valid stream":
				$this->fclose_argument_no_valid_stream($stream);
				break;
			case "fopen failed to open stream":
				$this->fopen_failed_to_open_stream($stream);
				break;
			case "fwrite argument to valid stream":
				$this->fwrite_argument_no_valid_stream($stream);
				break;
			case "illegal string offset":
				//TODO: string auslesen
				$this->illegal_string_offset($string);
				break;
			case "include failed opening for inclusion":
				$this->include_failed_opening_for_inclusion($user);
				break;
			case "mysql connect access denied":
				$this->mysql_connect_access_denied($user);
				break;
			case "wrong parameter count for explode":
				$this->wrong_parameter_count_for_explode($length);
				break;
			case "zip read expects parameter to be resource":
				$this->zip_read_expects_parameter_to_be_resource($resource);
				break;
		}
	}
	private function fclose_argument_no_valid_stream($stream) {
		$this->explanation = $stream." ist vom Typ" .gettype($stream)." statt vom Typ stream";
		$this->solution[] = "";
	}
	private function fwrite_argument_no_valid_stream($stream){
		$this->explanation = $stream." ist vom Typ" .gettype($stream)." statt vom Typ stream";
		$this->solution[] = "";
	}
	private function cannot_use_scalar_value_as_array($scalarvalue){
		$this->explanation = "Auf".$scalarvalue." kann nicht zugegriffen werden, da es kein Array ist";
		$this->solution[] = "Vor den Zugriff ein ".$scalarvalue."=array();";
	}
	private function cannot_use_string_offset_as_array($scalarvalue){
		$this->explanation = "Auf".$scalarvalue." kann nicht zugegriffen werden, da es kein Array ist";
		$this->solution[] = "Vor den Zugriff ein ".$scalarvalue."=array();";
	}
	private function division_by_zero(){
		$this->explanation = "durch Null kann nicht geteilt werden";
		$this->solution[] = "If abfrage, ob Variable = 0";
	}
	private function zip_read_expects_parameter_to_be_resource($resource){
		$this->explanation = "der erste Parameter ist ein ".gettype($resource)." statt einer Resource";
		$this->solution[] = "Zip open gibt eine Fehlermeldung zurück";
	}
	private function wrong_parameter_count_for_explode(){
		$this->explanation = "Explode darf nur 2-3 Parameter enthalten";
		$this->solution[] = "";
	}
	private function array_pop_argument_should_be_an_array($argument){
		$this->explanation = "Das Argument ist ein ".gettype($argument)." und kein array";
		$this->solution[] = "";
	}
	private function fopen_failed_to_open_stream($stream){
		$this->explanation = "Der Stream kann nicht geöffnet werden";
		$this->solution[] = "Falsche Pfadangaben";
	}
	private function mysql_connect_access_denied($user){
		$this->explanation = "Die Verbindung zum Mysql-Server ist fehlgeschlagen";
		$this->solution[] = "Falscher Benutzername/Passwort";
		$this->solution[] = "PDO benutzen";
	}
	private function include_failed_opening_for_inclusion($user){
		$this->explanation = "Die Datei wurde nicht gefunden";
		$this->solution[] = "Pfadangaben überprüfen";
	}
	private function illegal_string_offset($string){
		$this->explanation = "Auf diesen String offset kann nicht zugegriffen werden";
		$this->solution[] = "Nicht darauf zugreifen";
	}
	private function cannot_modify_header_information_header_already_sent($user){
		$this->explanation = "Die Datei wurde schon abgearbeitet (TODO)";
		$this->solution[] = "?> entfernen";
		$this->solution[] = "Leerzeichen vor <?php";
	}
}