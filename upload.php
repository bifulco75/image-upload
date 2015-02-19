<?php
/*
 ________  ________  ________  _______                               
|\   ____\|\   __  \|\   ___ \|\  ___ \                              
\ \  \___|\ \  \|\  \ \  \_|\ \ \   __/|                             
 \ \  \    \ \  \\\  \ \  \ \\ \ \  \_|/__                           
  \ \  \____\ \  \\\  \ \  \_\\ \ \  \_|\ \                          
   \ \_______\ \_______\ \_______\ \_______\                         
    \|_______|\|_______|\|_______|\|_______|                         
                                                                     
                                                                     
                                                                     
 ___  ___  ________  _____ ______   ________  _______   ________     
|\  \|\  \|\   __  \|\   _ \  _   \|\   __  \|\  ___ \ |\   __  \    
\ \  \\\  \ \  \|\  \ \  \\\__\ \  \ \  \|\  \ \   __/|\ \  \|\  \   
 \ \   __  \ \   __  \ \  \\|__| \  \ \   ____\ \  \_|/_\ \   _  _\  
  \ \  \ \  \ \  \ \  \ \  \    \ \  \ \  \___|\ \  \_|\ \ \  \\  \| 
   \ \__\ \__\ \__\ \__\ \__\    \ \__\ \__\    \ \_______\ \__\\ _\ 
    \|__|\|__|\|__|\|__|\|__|     \|__|\|__|     \|_______|\|__|\|__|
                                                                     
                                                                     
                                                                     
# stenzel@hotmail.com
# www.codehamper.com

*/

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$_FILES['upl']['name'])){
		echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;
