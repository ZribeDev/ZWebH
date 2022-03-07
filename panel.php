
<style>
div {
  background-color: lightgrey;
  width: 700px;
  border: 15px black;
  padding: 50px;
  margin: 20px;
}
</style>




<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php
    $myfile = fopen(".data_pass", "r") or die("Unable to open file!");
    $rconpass =  fread($myfile,filesize(".data_users_server"));
    fclose($myfile);

    $myfile = fopen(".data_port", "r") or die("Unable to open file!");
    $rconport =  fread($myfile,filesize(".data_users_pass"));
    fclose($myfile);

    $myfile = fopen(".data_address", "r") or die("Unable to open file!");
    $rconaddress =  fread($myfile,filesize(".data_users_server"));
    fclose($myfile);

    ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $host = $rconaddress; // Server host name or IP
    $port = $rconport;                      // Port rcon is listening on
    $password = $rconpass; // rcon.password setting set in server.properties
    $timeout = 3;                       // How long to timeout.                      // How long to timeout.

    include 'Rcon.php';
    $rcon = new Thedudeguy\Rcon($host, $port, $password, $timeout);


    if (isset($_GET["cmd"])) {
        if ($rcon->connect())
        {
        $rcon->sendCommand($_GET["cmd"]);
        }
        
    }

    if (isset($_GET["say"])) {
        if ($rcon->connect())
        {
        $rcon->sendCommand("tellraw @a \"[Server] ".$_GET['say']."\"");
        }
        
    }
    
?>
<center>
<div id='ConsoleDiv'>
    <center>
        <h2>Console Log - <a href="/serverlog.txt" download>Download Log</a></h2>
    </center>
    <br>
    <iframe src='/log.php?server=panel&viewmode=true' width="100%" height="600"></iframe>
    <br>
    <form method="get">
        <input type="submit" value="Refresh">
    </form>
    <br>
    <form method="get">
        Command: <input type="text" name="cmd">
        <input type="submit" value="Submit">
    </form>
    <form method="get">
        Message: <input type="text" name="say">
        <input type="submit" value="Submit">
    </form>
</div>
</center>
<script>
    const component = document.getElementById('ConsoleDiv');
    component.scrollIntoView({behavior: "smooth", block: 'end'});
</script>
