<?php

session_start();
include('db.php');

if ($_POST['action'] == 'image-check'){
	if (isset($_FILES) && !empty($_FILES)) {
		
		$img = $_FILES['img'];
		//print_r($img);
		$name = $img['name'];
		$pathinfo = pathinfo("$name");
		$path = $img['tmp_name'];
		$newName = "1234".".".$pathinfo['extension'];

		//echo $newName;

		//$final_path = "images/$newName";
		move_uploaded_file($path,$name);
		//rename( "tmp_images/$name", "tmp_images/$newName");

        // $command = escapeshellcmd('mamba activate dogvision; python3 dlib_dog_face_recognition/recognize_face.py');

		$command=escapeshellcmd('./dlib/recognize_face '.$name);
		//echo $command;
		$output = shell_exec($command);
		echo $output;

		unlink("$name");

		/*
		$command = escapeshellcmd('./dlib_dog_face_recognition/demo.py');
		echo $command;
        exec($command, $output, $status);
        print_r($output);
		*/
		// echo $status;

		// copy("tmp_images/$newName","../User/images/$newName");
		// unlink("tmp_images/$newName");
		
		// $query = "INSERT INTO `dog_data` (`id`,`photo`,`skinColor`,`mark`,`gender`,`isSterilized`,`whenSterilized`,`area`,`birth`) VALUES ('$id','$final_path','$skin_color','$mark','$gender','$sterilized','$sterilization_date','$territorial_area','$birth_date')";

		// //echo $query;
		
		// if(!mysqli_query($link,$query)){
		// 	die("error");
		// } else {
		// 	echo"<div class='alert alert-success'>Animal Added Successfully</div>";
		// }
		
	}
}

?>