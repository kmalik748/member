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
	         return false;
         }
    }

	function allOrganizations(){
        return phpMysqliFetchAll("SELECT * FROM organizations");
    }

    function getloggedInUserId(){
	    session_start();
	    return isset($_SESSION["id"]) ? $_SESSION["id"] : null;
    }

    function insertAdminLog($message){
        $adminID = getloggedInUserId();
        return phpRunSingleQuery("INSERT INTO adminLogs (admin_id, message) VALUES ($adminID, '$message')");
    }

    function currentPath(){
	    return __DIR__;
    }

    function uploadFile($tmp, $name, $uploadFileDir){
	    $fileTmpPath = $tmp;
        $fileName = $name;
        echo "--$fileName--";
        $message = '';
        // get details of the uploaded file
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        echo "My: ".$fileExtension;

        // sanitize file-name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // check if file has one of the following extensions
        $allowedfileExtensions = array('jpg', 'jgeg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc', 'docx', 'pdf');

        if (in_array($fileExtension, $allowedfileExtensions))
        {
            // directory in which the uploaded file will be moved
            $dest_path = $uploadFileDir . $newFileName;

            if(move_uploaded_file($fileTmpPath, $dest_path))
            {
                $message ='File is successfully uploaded.';
            }
            else
            {
                $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
            }
        }
        else
        {
            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
        return $message;
    }
?>