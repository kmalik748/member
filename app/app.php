<?php

require 'db.php';

error_reporting(0);

	function js_alert($msg){
		echo '
			<script>alert("'.$msg.'");</script>;
		';
	}

	function js_console_log($msg){
		echo '
			<script>console.log("'.$msg.'");</script>;
		';
	}

	function js_redirect($url){
		echo '
			<script>window.location.replace("'.$url.'");</script>
		';
//		header('Location: '.$url);
	}

	function phpMysqliFetchAll($sql){
        $output = array();
        $res = mysqli_query($GLOBALS["con"], $sql);
        if(mysqli_num_rows($res)){
            $output = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
        return $output;
    }
	function phpMysqliFetchSingle($sql){
        $output = array();
        if(mysqli_query($GLOBALS["con"], $sql)){
            $res = mysqli_query($GLOBALS["con"], $sql);
            if(mysqli_num_rows($res)){
                $output = mysqli_fetch_array($res, MYSQLI_ASSOC);
            }
            return $output;
        }
        else{
            js_console_log(mysqli_error($GLOBALS["con"]));
        }
    }

    function phpRunSingleQuery($sql){
//	     return mysqli_query($GLOBALS["con"], $sql) ? true : mysqli_error($GLOBALS["con"]);
	     if(mysqli_query($GLOBALS["con"], $sql)){
	         return true;
         }else{
	         js_console_log(mysqli_error($GLOBALS["con"]));
	         return false;
         }
    }

	function allOrganizations(){
        return phpMysqliFetchAll("SELECT * FROM organizations");
    }
?>