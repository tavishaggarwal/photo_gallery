<?php

function log_action($action,$message){

			$file = "../../logs/logs.txt";
			$dir = ".";
			
			if(is_dir($dir)){
			
			if($handle = fopen($file,'a'))
			{
			$timestamp = strftime("%d/%m/%y %H:%M",filemtime($file));
			$content = $timestamp." ".$action. " | " .$message. "\n";
			fwrite($handle, $content);
			fclose($handle);
			}
			
			else{
			echo "error while writting to the file";
			}
			
			}
}

?>