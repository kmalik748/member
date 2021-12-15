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
             js_console_log("=====================================");
	         js_console_log($sql);
             exit(); die();
	         return false;
         }
    }

	function allOrganizations(){
        return phpMysqliFetchAll("SELECT * FROM organizations");
    }

	function allRecipients(){
        return phpMysqliFetchAll("SELECT * FROM users");
    }

	function allCatagories(){
        return phpMysqliFetchAll("SELECT * FROM catagories");
    }

    function getloggedInUserId(){
	    session_start();
	    return isset($_SESSION["id"]) ? $_SESSION["id"] : null;
    }

    function insertAdminLog($message){
        $adminID = getloggedInUserId();
        return phpRunSingleQuery("INSERT INTO adminlogs (admin_id, message) VALUES ($adminID, '$message')");
    }

    function getOrgById($id){
        $output = phpMysqliFetchSingle("SELECT * FROM organizations WHERE id=$id");
        return $output["name"];
    }

    function currentPath(){
	    return __DIR__;
    }

    function uploadFile($name, $uploadFileDir, $userID, $fileType1){


    }
?>