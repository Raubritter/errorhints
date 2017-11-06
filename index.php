<?php

	include("deprecated.php");
	include("notice.php");
	include("warning.php");
	include("fatalerror.php");
	
	register_shutdown_function(function() {
		$error = error_get_last();

		if($error['type'] == E_ERROR) 
		{
			$fatalerror = new fatalerror($error['message']);
			$fatalerror->checkerrortype($error['message']);
			echo $fatalerror->getexplanation()."<br/>";
			echo $fatalerror->getsolution()[0];
		}
	});
	set_error_handler(function ($errno, $errstr, $errfile, $errline) {
		//echo $errstr;
		if($errno == E_WARNING) {
			$warning = new warning($errstr);
			$warning->checkerrortype();
			echo $warning->getexplanation()."<br/>";
			echo $warning->getsolution()[0];
		}
		if($errno == E_NOTICE) {
			$notice = new notice($errstr);
			$notice->checkerrortype();
			echo $notice->getexplanation()."<br/>";
			echo $notice->getsolution()[0];
		}
		if($errno == E_DEPRECATED) {
			$deprecated = new deprecated($errstr);
			$deprecated->checkerrortype();
			echo $deprecated->getexplanation()."<br/>";
			echo $deprecated->getsolution()[0];
		}
	});
	//include("tests/warning/array_pop_argument_should_be_an_array.php");
	//include("tests/warning/cannot_modify_header_information_header_already_sent.php");
	include("tests/warning/cannot_use_scalar_value_as_an_array.php");
	include("tests/warning/cannot_use_string_offset_as_an_array.php");
	//include("tests/warning/division_by_zero.php");
	//include("tests/warning/fclose_argument_no_valid_stream.php");
	//include("tests/warning/fopen_failed_to_open_stream.php");
	//include("tests/warning/fwrite_argument_no_valid_stream.php");
	//include("tests/warning/include_failed_opening_for_inclusion.php");
	//include("tests/warning/mysql_connect_access_denied.php");
	//include("tests/warning/wrong_parameter_count_for_explode.php");
	//include("tests/warning/zip_read_expects_parameter_to_be_resource.php");
	
	//include("tests/deprecated/assigning_the_return_value_of_new.php");
	//include("tests/deprecated/function_is_deprecated.php");
	
	//include("tests/notice/undefined_index.php");
	//include("tests/notice/use_of_undefined_constant.php");
	
//	include("tests/fatalerror/allowed_memory_size_exhausted.php");
//	include("tests/fatalerror/call_to_undefined_function.php");
//	include("tests/fatalerror/call_to_undefined_method.php");
//	include("tests/fatalerror/cannot_implement_not_an_interface.php");
//	include("tests/fatalerror/cannot_redeclare_class.php");
//	include("tests/fatalerror/cannot_redeclare_function.php");
//	include("tests/fatalerror/cannot_use_bracket_for_reading.php");
//	include("tests/fatalerror/cant_inherit_abstract_function.php");
//	include("tests/fatalerror/cant_use_function_return_value.php");
//	include("tests/fatalerror/class_not_found.php");
//	include("tests/fatalerror/continue_operator_accepts_only_positive_numbers.php");
//	include("tests/fatalerror/failed_to_open_stream_permission_denied.php");
//	include("tests/fatalerror/interface_not_found.php");
//	include("tests/fatalerror/maximum_execution_time_exceeded.php");
//	include("tests/fatalerror/namespace_declaration_has_to_be_first_statement.php");
//	include("tests/fatalerror/object_of_class_could_not_be_converted_to_string.php");
//	include("tests/fatalerror/uncaught_exception_with_message.php");