<?php

class deprecated extends phperror{
	public function __construct(string $message = "", int $code = 0, \Throwable $previous = null) {
		parent::__construct($message, $code, $previous);
	}
	public function checkerrortype(){
		switch($this->description)
		{
			case "assigning the return value of new":
				$this->assigning_the_return_value_of_new();
				break;
			case "function is deprecated":
				$this->function_is_deprecated();
				break;
		}
	}
	private function assigning_the_return_value_of_new() {
		$this->explanation ="Zeiger sind seit PHP5.3 veraltet";
		$this->solution[] = "Statt =& nur = schreiben";
	}
	private function function_is_deprecated($function){
		$this->explanation = "die Aktuelle PHP-Version unterstützt die Funktion ".$function." nicht mehr";
		switch($function){
			case call_user_method:
				$this->solution[] = "(use call_user_func() instead)";
				break;
			case call_user_method_array:
				$this->solution[] = "(use call_user_func_array() instead)";
				break;
			case define_syslog_variables:
				$this->solution[] = "(funktion entfernt)";
				break;
			case dl:
				$this->solution[] = "(wird in multithreaded WebServern nicht unterstützt)";
				break;
			case ereg:
				$this->solution[] = "(use preg_match() instead)";
				break;
			case ereg_replace:
				$this->solution[] = "(use preg_replace() instead)";
				break;
			case eregi:
				$this->solution[] = "(use preg_match() with the 'i' modifier instead)";
				break;
			case eregi_replace:
				$this->solution[] = "(use preg_replace() with the 'i' modifier instead)";
				break;
			case mcrypt_generic_end:
				$this->solution[] = "(use mcrypt_generic_deinit() ) ";
				break;
			case set_magic_quotes_runtime:
			case magic_quotes_runtime:
				$this->solution[] = "(todo)";
				break;
			case session_register:
				$this->solution[] = "(use the $_SESSION superglobal instead)";
				break;
			case session_unregister:
				$this->solution[] = "(use the $_SESSION superglobal instead)";
				break;
			case session_is_registered:
				$this->solution[] = "(use the $_SESSION superglobal instead)";
				break;
			case set_socket_blocking:
				$this->solution[] = "(use stream_set_blocking() instead)";
				break;
			case split:
				$this->solution[] = "(use preg_split() instead)";
				break;
			case spliti:
				$this->solution[] = "(use preg_split() with the 'i' modifier instead)";
				break;
			case sql_regcase: 
				$this->solution[] = "(nicht auf diese Funktion verlassen)";
				break;
			case mysql_db_query:
				$this->solution[] = "(use mysql_select_db() and mysql_query() instead)";
				break;
			case mysql_escape_string:
				$this->solution[] = "(use mysql_real_escape_string() instead)";
				break;
			case mysql_list_dbs:
				$this->solution[] = "(mysqli oder pdo benutzen)";
				break;
			case mcrypt_cbc:
			case mcrypt_cfb:
			case mcrypt_ecb:
			case mcrypt_ofb:
				$this->solution[] = "stattdessen mcrypt_generic benutzen";
				break;
		}
	}
}