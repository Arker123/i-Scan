<?php
	session_start();
	
	include '../includes/db.php';
	

	if (!isset($_POST["action"])){
		echo "error";
	}
	
	if($_POST["action"] == 'fetch') {
		
		
		$id = mysqli_real_escape_string($link, $_POST['id']);
		
		$query = "SELECT * FROM `dog_data` WHERE id='".$id."'";
		
        $result = mysqli_query($link, $query); 

        while($row = mysqli_fetch_array($result))
        {
            $photo = $row['photo'];
            $skinColor = $row['skinColor'];
            $Mark = $row['Mark'];
            $gender = $row['gender'];
            $isSterilized = $row['isSterilized'];
            $whenSterilized = $row['whenSterilized'];
            $area = $row['area'];
            $birth = $row['birth'];

            $query = "SELECT * FROM `vaccine` WHERE id='".$id."'";

            echo '
				<legend>Profile Info</legend>
				<img style="float: right;"src="'.$photo.'" height="100" width="100" >
				<form id ="info" method="POST" class="info">
					<div class="form-group">
						<h3>Dog ID: '.$id.'</h3><br>
						<h4>Identification Detail</h4>
						<label>Skin Colour</label>
							<input type="text" placeholder="'.$skinColor.'" disabled>
						

							<br><label>Mark</label>
							<input type="text" placeholder="'.$Mark.'" disabled>
							<br>
							<label>Gender: </label>
							<input type="text" placeholder="'.$gender.'" disabled>
							<br>
							<label>Territorial Area</label>
							<input type="text" placeholder="'.$area.'" disabled>
							<br>
							<br><br>


							<h4>Vaccination Detail</h4>
							<label>1st Dose Date:</label>
							<input type="text" disabled>
							<br>
							<label>2nd Dose Date:</label>
							<input type="text" disabled>
							<br>
							<label>Rabbies Vaccine:</label>
							<input type="text" disabled>
							<br><br>


							<h4>Sterilization Status</h4>
							<label>Date:</label>
							<input type="text" placeholder="'.$isSterilized.'" disabled>

							<br>
							<br>
							<label></label>
							<br>
							<br>
					</div>
				</form>
				<div class="naw-text mb-3">
					<h5>Hope we fetched all the details you were looking for</h5>
				</div>
			';
			
            //echo '';

            //$number += 1;
            //$query = "UPDATE `track` SET number='".$number."' WHERE ip='".$ip."'";
            // if (!mysqli_query($link, $query)) 
            // {
            //     echo "Error";
            // }
            break;
        }

		// if (mysqli_query($link, $query)){
			

			
		// } else {
		// 	echo "error";
		// }
	}
	
?>