<?php

session_start();
include('db.php');

/*
if ($_POST['action'] == 'insert'){
	
	echo "hello";
	
}*/
function getImgPath($id){
	
	global $link;
	
	$query = "SELECT prod_img_1,prod_img_2,prod_img_3 FROM prod WHERE prod_id='$id' LIMIT 1";
	
	$row = mysqli_query($link,$query);
	
	$img = array();
	
	if($row){
		while($row_prod = mysqli_fetch_array($row)){
			
			$img1 = $row_prod['prod_img_1'];
			$img2 = $row_prod['prod_img_2'];
			$img3 = $row_prod['prod_img_3'];
			
			array_push( $img, $img1 );
			array_push( $img, $img2 );
			array_push( $img, $img3 );
		}
		return $img;
	} else {
		echo("error");
	}
}

function getAnimalID(){
	
	global $link;
	$query = "SELECT id FROM dog_data";
	
	$row = mysqli_query($link,$query);
	
	$arrName = array();
	
	if($row){
		while($row_prod = mysqli_fetch_array($row)){
			
			$names = $row_prod['id'];

			array_push( $arrName, $names );
		}
		return $arrName;
	} else {
		echo("error");
	}
}
function getProdNameById($id){
	
	global $link;
	
	$query = "SELECT prod_name FROM prod WHERE prod_id='$id' LIMIT 1";
	
	$row = mysqli_query($link,$query);

	if($row){
		while($row_prod = mysqli_fetch_array($row)){
			
			$name = $row_prod['prod_name'];

		}
		return $name;
	} else {
		echo("error");
	}
}
function getProdIdByName($name){
	
	global $link;
	
	$name = mysqli_real_escape_string($link, $name);
	
	$query = "SELECT prod_id FROM prod WHERE prod_name='$name' LIMIT 1";
	
	$row = mysqli_query($link,$query);

	if($row){
		while($row_id = mysqli_fetch_array($row)){
			
			$id = $row_id['prod_id'];

		}
		return $id;
	} else {
		echo("error");
		die();
	}
	
}
if ($_POST['action'] == 'insert'){
	if (isset($_FILES) && !empty($_FILES)) {

		/*
			files.append('skin_color',$('#new_skin_color').val());
			files.append('mark',$('#new_mark').val());
			files.append('gender',$('#new_gender').val());
			files.append('territorial_area',$('#new_territorial_area').val());
			files.append('sterilized',$('#new_sterilized').val());
			files.append('sterilization_date',$('#new_sterilization_date').val());
			
			files.append('img', $('#new_img')[0].files[0]);
		
		*/
		
		$skin_color = mysqli_real_escape_string($link, $_POST['skin_color']);
		$mark = mysqli_real_escape_string($link, $_POST['mark']);
		$gender = mysqli_real_escape_string($link, $_POST['gender']);
		$territorial_area = mysqli_real_escape_string($link, $_POST['territorial_area']);
		$sterilized = mysqli_real_escape_string($link, $_POST['sterilized']);
		$sterilization_date = mysqli_real_escape_string($link, $_POST['sterilization_date']);
		$birth_date = mysqli_real_escape_string($link, $_POST['birth_date']);

		$id = 1111;
		do
		{
			$id = mt_rand(1111,9999);
		}
		while(in_array($id, getAnimalID()));
		
		$img = $_FILES['img'];
		//print_r($img);
		$name = $img['name'];
		$pathinfo = pathinfo("$name");
		$path = $img['tmp_name'];
		$newName = "$id".".".$pathinfo['extension'];

		//echo $newName;

		$final_path = "images/$newName";

		move_uploaded_file($path,"tmp_images/$name");
		rename( "tmp_images/$name", "tmp_images/$newName");
		copy("tmp_images/$newName","../User/images/$newName");
		unlink("tmp_images/$newName");
		
		$query = "INSERT INTO `dog_data` (`id`,`photo`,`skinColor`,`mark`,`gender`,`isSterilized`,`whenSterilized`,`area`,`birth`) VALUES ('$id','$final_path','$skin_color','$mark','$gender','$sterilized','$sterilization_date','$territorial_area','$birth_date')";

		//echo $query;
		
		if(!mysqli_query($link,$query)){
			die("error");
		} else {
			echo"<div class='alert alert-success'>Animal Added Successfully</div>";
		}
		
	}
}
else if ($_POST['action'] == 'update'){
	
	$id = mysqli_real_escape_string($link, $_POST['animal_id']);
	
	$query = "SELECT * FROM dog_data WHERE id='$id' LIMIT 1";
	
	$row = mysqli_query($link,$query);
	
	if($row){
		
		while($row_prod= mysqli_fetch_array($row)){
			
			$id = $row_prod['id'];
			$photo = $row_prod['photo'];
			$skin_color = $row_prod['skinColor'];
			$mark = $row_prod['Mark'];
			$gender = $row_prod['gender'];
			$sterilized = $row_prod['isSterilized'];
			$sterilization_date = $row_prod['whenSterilized'];
			$area = $row_prod['area'];
			$birth = $row_prod['birth'];
			
			$prod_info = array("",$prod_id,$prod_name,$price,$img1,$img2,$img3,$stock,$old_price,$desc,$brand,$cat,"");
			//print_r($prod_info);
			echo "'',,,$id,,,$photo,,,$skin_color,,,$mark,,,$gender,,,$sterilized,,,$sterilization_date,,,$area,,,$birth";
		}
		
	} else {
		echo "error";
	}

} else if ($_POST['action'] == 'updateFinal'){

	$id = mysqli_real_escape_string($link, $_POST['id']);
	$skin_color = mysqli_real_escape_string($link, $_POST['skin_color']);
	$mark = mysqli_real_escape_string($link, $_POST['mark']);
	$gender = mysqli_real_escape_string($link, $_POST['gender']);
	$territorial_area = mysqli_real_escape_string($link, $_POST['territorial_area']);
	$sterilized = mysqli_real_escape_string($link, $_POST['sterilized']);
	$sterilization_date = mysqli_real_escape_string($link, $_POST['sterilization_date']);
	$birth_date = mysqli_real_escape_string($link, $_POST['birth_date']);
	
	$final_path_1 = "";
	
	if (isset($_FILES['img1']) && !empty($_FILES['img1'])) {
		
		$img1 = $_FILES['img1'];
		$name1 = $img1['name'];
		$path1 = $img1['tmp_name'];
		
		$pathinfo1 = pathinfo("$name1");
		$newName1 = $id.".".$pathinfo1['extension'];
		$final_path_1 = "images/$newName1";
		
		//unlink("../".getImgPath($id)[0]);
		move_uploaded_file($path1,"tmp_images/$name1");
		rename( "tmp_images/$name1", "tmp_images/$newName1");
		copy("tmp_images/$newName1","../User/images/$newName1");
		unlink("tmp_images/$newName1");

	}
		
	$query = "UPDATE dog_data SET photo='$final_path_1', skinColor='$skin_color',Mark='$mark',gender='$gender',isSterilized='$sterilized',whenSterilized='$sterilization_date',area='$territorial_area', birth='$birth_date' WHERE id='$id'";
	
	//echo $query;

	
	if(!mysqli_query($link,$query)){
			echo "error";
			die();
	} else {
			echo"<div class='alert alert-success'>Animal Updated Successfully</div>";
	}
	
} else if ($_POST['action'] == 'delete'){
	
	$id = mysqli_real_escape_string($link, $_POST['id']);
	
	$query = "DELETE FROM dog_data WHERE id = '$id' LIMIT 1";
	
	if(!mysqli_query($link,$query)){
			echo "error";
	} else {
			echo"<div class='alert alert-success'>Animal Deleted Successfully</div>";
	}
	
} else if ($_POST['action'] == 'getFeatured'){
	
	$query = "SELECT prod_id FROM featured";
	
	$row = mysqli_query($link,$query);
	
	if($row){
		
		while($row_featured= mysqli_fetch_array($row)){
			
			$prod_id = $row_featured['prod_id'];
			
			$query_prod = "SELECT prod_name,prod_img_1 FROM prod WHERE prod_id = '$prod_id'";
			
			$row_prod = mysqli_query($link,$query_prod);
			
			if($row_prod){
				
				while($row_details= mysqli_fetch_array($row_prod)){
					
					$prod_name = $row_details['prod_name'];
					$prod_img_1 = $row_details['prod_img_1'];
					
					echo "<p>$prod_name</p>";
					echo "<p><img src='../$prod_img_1' height = '100px'></p>";
					echo "<button class='btn btn-primary delete_featured' onclick='deleteMeFeatured($prod_id)' value='$prod_id'>Delete</button>";
				}
				
				
				
			} else{
				echo "error";
				die();
			}
	
			
			

		}
		
	} else {
		echo "error";
		die();
	}
} else if ($_POST['action'] == 'deleteFeatured'){
	
	$id = mysqli_real_escape_string($link, $_POST['id']);
	
	$query = "DELETE FROM featured WHERE prod_id = '$id'";
	
	if(!mysqli_query($link,$query)){
			echo "error";
	} else {
			echo"<div class='alert alert-success'>Deleted Successfully</div>";
	}
} else if ($_POST['action'] == 'addFeatured'){
	
	$name = mysqli_real_escape_string($link, $_POST['prod_name']);
	
	$id = getProdIdByName($name);
	
	$query = "INSERT INTO featured (`prod_id`) VALUES ('$id')";
	
	if(!mysqli_query($link,$query)){
			echo "error";
	} else {
			echo"<div class='alert alert-success'>Success</div>";
	}
} else if ($_POST['action'] == 'getSale'){
	
	$query = "SELECT prod_id FROM onsale";
	
	$row = mysqli_query($link,$query);
	
	if($row){
		
		while($row_sale= mysqli_fetch_array($row)){
			
			$prod_id = $row_sale['prod_id'];
			
			$query_prod = "SELECT prod_name,prod_img_1 FROM prod WHERE prod_id = '$prod_id'";
			
			$row_prod = mysqli_query($link,$query_prod);
			
			if($row_prod){
				
				while($row_details= mysqli_fetch_array($row_prod)){
					
					$prod_name = $row_details['prod_name'];
					$prod_img_1 = $row_details['prod_img_1'];
					
					echo "<p>$prod_name</p>";
					echo "<p><img src='../$prod_img_1' height = '100px'></p>";
					echo "<button class='btn btn-primary delete_featured' onclick='deleteMeSale($prod_id)' value='$prod_id'>Delete</button>";
				}
				
				
				
			} else{
				echo "error";
				die();
			}
	
			
			

		}
		
	} else {
		echo "error";
		die();
	}
} else if ($_POST['action'] == 'deleteSale'){
	
	$id = mysqli_real_escape_string($link, $_POST['id']);
	
	$query = "DELETE FROM onsale WHERE prod_id = '$id'";
	
	if(!mysqli_query($link,$query)){
			echo "error";
	} else {
			echo"<div class='alert alert-success'>Deleted Successfully</div>";
	}
} else if ($_POST['action'] == 'addSale'){
	
	$name = mysqli_real_escape_string($link, $_POST['prod_name']);
	
	$id = getProdIdByName($name);
	
	$query = "INSERT INTO onsale (`prod_id`) VALUES ('$id')";
	
	if(!mysqli_query($link,$query)){
			echo "error";
	} else {
			echo"<div class='alert alert-success'>Success</div>";
	}
} else if ($_POST['action'] == 'getshowAllAnimals'){

	$query = "SELECT * FROM dog_data";
	
	$row = mysqli_query($link,$query);
	
		if($row){
			while($row_orders= mysqli_fetch_array($row)){
				$id = $row_orders['id'];
				$photo = $row_orders['photo'];
				$skin_color = $row_orders['skinColor'];
				$mark = $row_orders['Mark'];
				$gender = $row_orders['gender'];
				$sterilized = $row_orders['isSterilized'];
				$sterilization_date = $row_orders['whenSterilized'];
				$area = $row_orders['area'];
				$birth = $row_orders['birth'];

				$photo = '../User/'. $photo;
				
				$sno = $sno + 1;
				echo "
				<tr>
					<th scope='row'>$id</th>
					<td><img src='$photo' width='200px'></td>
					<td>$skin_color</td>
					<td>$mark</td>
					<td>$gender</td>
					<td>$sterilized</td>
					<td>$sterilization_date</td>
					<td>$area</td>
					<td>$birth</td>
					
				</tr>
				";
			}
		
		//name email phone productname productimg1 qty orderstatus
 		
	} else{
		echo "error";
		die();
	}
} else if ($_POST['action'] == 'getDispachedOrders'){
	
	
	
	$query = "SELECT * FROM orders WHERE status = 'dispached'";
	
	$row = mysqli_query($link,$query);
	
		if($row){
			$sno = 0;
			while($row_orders= mysqli_fetch_array($row)){
				
				$user_id = $row_orders['user_id'];
				$prod_id = $row_orders['prod_id'];
				$qty = $row_orders['qty'];
				$status = $row_orders['status'];
				$date_of_order = $row_orders['date_of_order'];
				$newDate = date("d-m-Y", strtotime($date_of_order));  

				$query_prod = "SELECT prod_name,prod_img_1 FROM prod WHERE prod_id = '$prod_id' LIMIT 1";
				$row_prod = mysqli_query($link,$query_prod);
				if ($row_prod){
					
					while($result_prod = mysqli_fetch_array($row_prod)){
						
						$prod_name = $result_prod['prod_name'];
						$prod_img_1 = $result_prod['prod_img_1'];
						$prod_img_1 = '../'.$prod_img_1;
					}
				} else {
					echo "error";
					die();
				}
				
				$query_users = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
				$row_users = mysqli_query($link,$query_users);
				if ($row_users){
					
					while($result_users = mysqli_fetch_array($row_users)){
						
						$name = $result_users['name'];
						$email = $result_users['email'];
						$phone = $result_users['phone'];
					}
				} else {
					echo "error";
					die();
				}
				
				$sno = $sno + 1;
				echo "
				<tr>
					<th scope='row'>$sno</th>
					<td>$name</td>
					<td>$email</td>
					<td>$phone</td>
					<td>$prod_name</td>
					<td><img src='$prod_img_1' width='95px'></td>
					<td>$qty</td>
					<td>$newDate</td>
					<td>$status</td>
					
				</tr>
				";
			}
		
		//name email phone productname productimg1 qty orderstatus
 		
	} else{
		echo "error";
		die();
	}
} else if ($_POST['action'] == 'getDeliveredOrders'){
	
	
	
	$query = "SELECT * FROM orders WHERE status = 'delivered'";
	
	$row = mysqli_query($link,$query);
	
		if($row){
			$sno = 0;
			while($row_orders= mysqli_fetch_array($row)){
				
				$user_id = $row_orders['user_id'];
				$prod_id = $row_orders['prod_id'];
				$qty = $row_orders['qty'];
				$status = $row_orders['status'];
				$date_of_order = $row_orders['date_of_order'];
				$newDate = date("d-m-Y", strtotime($date_of_order));  

				$query_prod = "SELECT prod_name,prod_img_1 FROM prod WHERE prod_id = '$prod_id' LIMIT 1";
				$row_prod = mysqli_query($link,$query_prod);
				if ($row_prod){
					
					while($result_prod = mysqli_fetch_array($row_prod)){
						
						$prod_name = $result_prod['prod_name'];
						$prod_img_1 = $result_prod['prod_img_1'];
						$prod_img_1 = '../'.$prod_img_1;
					}
				} else {
					echo "error";
					die();
				}
				
				$query_users = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
				$row_users = mysqli_query($link,$query_users);
				if ($row_users){
					
					while($result_users = mysqli_fetch_array($row_users)){
						
						$name = $result_users['name'];
						$email = $result_users['email'];
						$phone = $result_users['phone'];
					}
				} else {
					echo "error";
					die();
				}
				
				$sno = $sno + 1;
				echo "
				<tr>
					<th scope='row'>$sno</th>
					<td>$name</td>
					<td>$email</td>
					<td>$phone</td>
					<td>$prod_name</td>
					<td><img src='$prod_img_1' width='95px'></td>
					<td>$qty</td>
					<td>$newDate</td>
					<td>$status</td>
					
				</tr>
				";
			}
		
		//name email phone productname productimg1 qty orderstatus
 		
	} else{
		echo "error";
		die();
	}
}
?>