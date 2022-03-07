<?php
    $myfile = fopen(".data_users_server", "r") or die("Unable to open file!");
    $server =  fread($myfile,filesize(".data_users_server"));
    fclose($myfile);

    $myfile = fopen(".data_users_pass", "r") or die("Unable to open file!");
    $serverpass =  fread($myfile,filesize(".data_users_pass"));
    fclose($myfile);
    function Redirect($url) {
        echo '<script type="text/javascript">
           window.location = "'.$url.'"
      </script>';
    };
    if (isset($_GET["server"])) {
        if ($_GET["server"] == "$server") {
            if ($_GET["password"] == "$serverpass") {
                Redirect("/panel.php");
            } else {
                Redirect("/wrong_pass.php");
            }
        } else {
            Redirect("/wrong_pass.php");
        }
    }
?>