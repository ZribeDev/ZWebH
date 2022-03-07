<?php
    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $myfile = fopen(".data_users_server", "r") or die("Unable to open file!");
    $server =  fread($myfile,filesize(".data_users_server"));
    fclose($myfile);
    if (isset($_GET['server'])) {
        if ($_GET['server'] == $server) {
            
            if (isset($_GET['viewmode'])) {
                $myfile = fopen("serverlog.txt", "r") or die("Unable to open file!");
                echo fread($myfile,filesize("serverlog.txt"));
                fclose($myfile);
            } else {
                $json = file_get_contents('php://input');
                $data = json_decode($json);
                $myfile = fopen("serverlog.txt", "a") or die("Unable to open file!");
                
                fwrite($myfile,$data->log);
                fclose($myfile);
            }
            
            
        }
    }
?>