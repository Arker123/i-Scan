<?php

	session_start();
	
	include 'db.php';
	
	
	//print_r($_POST['description']);
	
	
?>
<!doctype html>
<html lang="en">
  <head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<script src="https://kit.fontawesome.com/a26e0633fc.js" crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#4285f4">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	
	<link href="admin.css" rel="stylesheet">

		 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="jquery.ui.autocomplete.scroll.min.js"></script>
		

	
    <title>Admin Area</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:600&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=PT+Serif&display=swap');
	</style>

  </head>
  <body>

<div class="container-fluid dash-top">
	<div class="row justify-content-between">
		<div class="col-sm-3">
			<h2>Admin Area <i class="fas fa-address-card"></i></h2>
		</div>
		<div class="col-sm-2">
			<h3><i class="fas fa-user-circle" style="color:white;"></i>Admin<h3>
		</div>
		
	</div>

</div>


<div class="container-fluid">
	
	<div class="row">
	
		<div class="col-md-3 dashboard-side-bar justify-content-center">
			<p class="addInfo" onclick="showHideBar('addInfo')"><i class="fas fa-cube"></i> Add Info </p>	
			<p class="updateInfo" onclick="showHideBar('updateInfo')"><i class="fas fa-user"></i> Update Info </i></p>
			<p class="deleteInfo" onclick="showHideBar('deleteInfo')"><i class="fas fa-user"></i> Delete Info </i></p>			
			<p class="showAllAnimals" onclick="showHideBar('showAllAnimals')"><i class="fas fa-lock"></i> Show All </p>	
			<p class="Addvaccinationstatus" onclick="showHideBar('Addvaccinationstatus')"><i class="fas fa-lock"></i> Add vaccination Status </p>
			<p class="deliveredOrders" onclick="showHideBar('deliveredOrders')"><i class="fas fa-lock"></i> Delivered Orders </p>
			<p class="updateFeatured" onclick="showHideBar('updateFeatured')"><i class="fas fa-money-check"></i> Update Featured Products </p>	
			<p class="updateOnsale" onclick="showHideBar('updateOnsale')"><i class="fas fa-home"></i> Update On Sale Products </p>
			<p class="Summary" onclick="showHideBar('Summary')"><i class="fas fa-home"></i> Summary </p>	
			<a href="#"><p><i class="fas fa-sign-out-alt"></i> Log Out </p>	</a>
		
		</div>

		<div class="col-md-9">
			<div class="row justify-content-center">
			
				<div id="addInfo">
					<h3 class="title-top">Add Info</h3>
					<div class="input-fields row">
						<div class="insert_message"></div>
						<div class="col-md-6 style-boxes-and-labels">
							<h5 class="title-top">Identification Detail</h5>
							<p></p>

							<label for="new_skin_color">Skin Color</label>
							<input type="text" id="new_skin_color" />
							
							<label for="new_mark">Mark</label>
							<input type="text" id="new_mark"/>
							
							<label for="new_gender">Gender</label>
							<select id="new_gender" name="gender">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
							
							<label for="new_territorial_area">Territorial Area</label>
							<input type="text" id="new_territorial_area"/>

							<label for="new_birth_date">Birth Date</label>
							<input type="date" id="new_birth_date" name="birth_date"/>

							<label for="new_img">Image</label>
							<input type="file" id="new_img" accept="image/*" required />

							<h5 class="title-top">Sterilization Detail</h5>
							<p></p>

							<label for="new_sterilized">Sterilized</label>
							<select id="new_sterilized" name="sterilized">
								<option value="no">No</option>
								<option value="yes">Yes</option>
							</select>

							<label for="new_sterilization_date">Sterilization Date</label>
							<input type="date" id="new_sterilization_date" name="sterilization_date"/>
							
							<label></label>
							<button class="btn btn-warning btn-insert">Save</button>							
						</div>
					
					</div>

				</div>
				<div id="updateInfo">
				
					<h3 class="title-top">Update Info</h3>
					
					<div class="input-fields row">
						<div class="update_message"></div>
						<div class="col-md-6 style-boxes-and-labels">
							
							<label for="update_animal_ID">Enter Animal ID</label>
							<input type="text" id="update_animal_ID"/>
						
							<label class="hide-it"></label>
							<button class="btn btn-warning btn-update-1">Search</button>

							<label for="update_skin_color" class="hide-me">Skin Color</label>
							<input type="text" id="update_skin_color" class="hide-me"/>
							
							<label for="update_img" class="hide-me">Image 1</label>
							<input type="file" id="update_img" class="hide-me"/>
							
							<label class="hide-me"></label>
							<img id="update_show_img" src="" height="100px" class="hide-me">
							
							<label for="update_mark" class="hide-me">Mark</label>
							<input type="text" id="update_mark" class="hide-me"/>
							
							<label for="update_gender" class="hide-me">Gender</label>
							<select id="update_gender" name="gender" class="hide-me">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
							
							<label for="update_sterilized" class="hide-me">Sterilized</label>
							<select id="update_sterilized" name="sterilized" class="hide-me">
								<option value="no">No</option>
								<option value="yes">Yes</option>
							</select>
							
							<label for="update_sterilization_date" class="hide-me">Sterilization Date</label>
							<input type="date" id="update_sterilization_date" class="hide-me"/>
							
							<label for="update_area" class="hide-me">Area</label>
							<input type="text" id="update_area" class="hide-me"/>

							<label for="update_birth" class="hide-me">Birth</label>
							<input type="date" id="update_birth" class="hide-me"/>
							
							<label class="hide-me"></label>
							<button class="btn btn-warning btn-update-2 hide-me">Update</button>
							
							<label class="hide-me"></label>
							<input type="hidden" id="update_id">
						</div>
					
					</div>
		
				</div>
				<div id="deleteInfo">
					<h3 class="title-top">Delete Info</h3>
					<div class="input-fields row">
						<div class="delete_message"></div>
						<div class="col-md-6 style-boxes-and-labels">
						
							<label for="delete_animal_id">Enter Animal ID</label>
							<input type="text" id="delete_animal_id"/>
						
							<label></label>
							<button class="btn btn-warning btn-delete">Delete</button>
							
						</div>
					</div>
				</div>
				<div id="showAllAnimals">
					<h3 class="title-top">Show All Animals</h3>
					<div class="input-fields row">
						<div class="pass_data"></div>
						<div class="col-md-6">
							<table class="table table-responsive table-bordered">
							
							<thead>
								<tr>
									<th scope="col">ID</th>
									<th scope="col">photo</th>
									<th scope="col">Skin Color</th>
									<th scope="col">Mark</th>
									<th scope="col">Gender</th>
									<th scope="col">Sterilized</th>
									<th scope="col">Sterilization date</th>
									<th scope="col">Area</th>
									<th scope="col">Birth</th>
								</tr>
							</thead>
							<tbody class="generateshowAllAnimals">
							
							</tbody>
							</table>
						</div>
					
					</div>
				</div>
				<div id="Addvaccinationstatus">
					<h3 class="title-top">Add Vaccination Status</h3>
					
					<div class="input-fields row">
						<div class="add_vaccination_message"></div>
						<div class="col-md-6 style-boxes-and-labels">
							
							<label for="add_vaccination_animal_ID">Enter Animal ID</label>
							<input type="text" id="update_animal_ID"/>
						
							<label class="hide-it"></label>
							<button class="btn btn-warning btn-add-vaccination-1">Search</button>

							<label for="add_vaccination_skin_color" class="hide-me">Skin Color</label>
							<input type="text" id="add_vaccination_skin_color" class="hide-me"/>
							
							<label for="add_vaccination_img" class="hide-me">Image 1</label>
							<input type="file" id="add_vaccination_img" class="hide-me"/>
							
							<label class="hide-me"></label>
							<img id="add_vaccination_show_img" src="" height="100px" class="hide-me">
							
							<label for="add_vaccination_mark" class="hide-me">Mark</label>
							<input type="text" id="add_vaccination_mark" class="hide-me"/>
							
							<label for="add_vaccination_gender" class="hide-me">Gender</label>
							<select id="add_vaccination_gender" name="gender" class="hide-me">
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
							
							<label for="add_vaccination_sterilized" class="hide-me">Sterilized</label>
							<select id="add_vaccination_sterilized" name="sterilized" class="hide-me">
								<option value="no">No</option>
								<option value="yes">Yes</option>
							</select>
							
							<label for="add_vaccination_sterilization_date" class="hide-me">Sterilization Date</label>
							<input type="date" id="add_vaccination_sterilization_date" class="hide-me"/>
							
							<label for="add_vaccination_area" class="hide-me">Area</label>
							<input type="text" id="add_vaccination_area" class="hide-me"/>

							<label for="update_birth" class="hide-me">Birth</label>
							<input type="date" id="update_birth" class="hide-me"/>
							
							<label class="hide-me"></label>
							<button class="btn btn-warning btn-update-2 hide-me">Update</button>
							
							<label class="hide-me"></label>
							<input type="hidden" id="update_id">
						</div>
					
					</div>
				</div>
				<div id="deliveredOrders">
					<h3 class="title-top">Delivered Orders</h3>
					<div class="input-fields row">
						<div class="pass_data"></div>
						<div class="col-md-6">
							<table class="table table-responsive table-bordered">
							
							<thead>
								<tr>
									<th scope="col">Sno</th>
									<th scope="col">Name</th>
									<th scope="col">Email</th>
									<th scope="col">Phone</th>
									<th scope="col">Product_Name</th>
									<th scope="col">Product Image</th>
									<th scope="col">Quantity</th>
									<th scope="col">Date_of_Order</th>
									<th scope="col">Status</th>
								</tr>
							</thead>
							<tbody class="generateDeliveredOrders">
							
							</tbody>
							</table>
						</div>
					
					</div>
				</div>
				<div id="updateFeatured">
					<h3 class="title-top">Update Featured Product</h3>
					
					<h4 class="title-top">Currently featured</h4>
					<div class="input-fields row">
						<div class="featured_message"></div>
						<div class="col-md-6 style-boxes-and-labels-featured getFeatured">

						</div>
					</div>
					<h4 class="title-top">Add featured</h4>
					<div class="input-fields row">
						<div class="col-md-6 style-boxes-and-labels">
						
							<label for="featured_prod_name_add">Enter Product Name</label>
							<input type="text" id="featured_prod_name_add"/>
						
							<label></label>
							<button class="btn btn-warning btn-featured-add">Add Featured</button>
							
						</div>
					</div>
				</div>
				<div id="updateOnsale">
					<h3 class="title-top">Update On Sale</h3>
					
					<h4 class="title-top">Currently On Sale</h4>
					<div class="input-fields row">
						<div class="Sale_message"></div>
						<div class="col-md-6 style-boxes-and-labels-featured getSale">

						</div>
					</div>
					<h4 class="title-top">Add On Sale products</h4>
					<div class="input-fields row">
						<div class="col-md-6 style-boxes-and-labels">
						
							<label for="sale_prod_name_add">Enter Product Name</label>
							<input type="text" id="sale_prod_name_add"/>
						
							<label></label>
							<button class="btn btn-warning btn-sale-add">Add to Sale</button>
							
						</div>
					</div>
				</div>
				<div id="Summary">
					
					<h3 class="title-top">Manage Addresses</h3>
					<div class="input-fields row">
						<div class="error_message"></div>
						<div class="col-md-6 style-boxes-and-labels">
							
							
							
							<label for="AddressLine1">AddressLine1</label>
							<input type="text" id="AddressLine1" />
							
							<label for="AddressLine2">AddressLine2</label>
							<input type="text" id="AddressLine2"/>
							
							<label for="City">City</label>
							<input type="text" id="City"/>
							
							<label for="State">State</label>
							<input type="text" id="State"/>
							
							<label for="Pincode">Pincode</label>
							<input type="text" id="Pincode"/>
							
							<label></label>
							<button class="btn btn-warning btn-address">Save Changes</button>							
						</div>
					
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
	
</div>


<script>
/*
$('.btn-address').click(function() {
	
	var action = 'changeAddress';
	var address_line_1 = $('#AddressLine1').val();
	var address_line_2 = $('#AddressLine2').val();
	var city = $('#City').val();
	var state = $('#State').val();
	var pincode = $('#Pincode').val();

  $.ajax({
    type: "POST",
    url: "UpdateAddress.php",
    data: { action:action, address_line_1: address_line_1, address_line_2:address_line_2, city:city, state:state, pincode:pincode},
	success:function(data){
		
		$('.error_message').html(data);
	}
  });
});


$('.btn-pass').click(function() {
	
	var action = 'change_pass';
	var current_pass = $('#currentPassword').val();

	var	confirm_pass = $('#newPassword').val();
	var	confirm_pass_1 = $('#confirmNewPassword').val();
	
  $.ajax({
    type: "POST",
    url: "UpdateAddress.php",
    data: { action:action, current_pass:current_pass, confirm_pass: confirm_pass, confirm_pass_1:confirm_pass_1},
	
	success:function(data){
		
		$('.pass_data').html(data);
	}
  });
});

$('.btn-personalDetails').click(function() {
	
	var action = 'change_personalDetails';
	
	var name = $('#Name').val();
	var phone = $('#Phone').val();
	
	$.ajax({
		type: "POST",
		url: "UpdateAddress.php",
		data: { action:action, name:name, phone:phone},
		
		success:function(data){
			
			$('.personalDetails_message').html(data);
		}
	  });
});						
*/
$('.btn-insert').click(function(){
	
	var action = 'insert';
	
	let files = new FormData()
	files.append('action','insert');
	
	files.append('skin_color',$('#new_skin_color').val());
	files.append('mark',$('#new_mark').val());
	files.append('gender',$('#new_gender').val());
	files.append('territorial_area',$('#new_territorial_area').val());
	files.append('sterilized',$('#new_sterilized').val());
	files.append('sterilization_date',$('#new_sterilization_date').val());
	files.append('birth_date',$('#new_birth_date').val());
	
	files.append('img', $('#new_img')[0].files[0]);

	console.log(files);

	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: files,
		processData: false,
        contentType: false,
		success:function(data){
			
			$('.insert_message').html(data);
		}
	  });
	
});
</script>

<script>

function showHideBar(bar){
	
	$('#addInfo').hide();
	$('#updateInfo').hide();
	$('#showAllAnimals').hide();
	$('#Addvaccinationstatus').hide();
	$('#deliveredOrders').hide();
	$('#updateFeatured').hide();
	$('#updateOnsale').hide();
	$('#Summary').hide();
	$('#deleteInfo').hide();
	
	bar = '#' + bar;
	$(bar).show();
	
}

</script>

<script>

$(document).ready(function(){
	showHideBar(('addInfo'));
});

$('.btn-update-1').click(function(){
	
	var action = 'update';
	var animal_id = $('#update_animal_ID').val();

	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action, animal_id:animal_id},
		success:function(data){
			
			if (data == "error"){
				alert("error");
			} else {
				var temp = new Array();
				
				temp = data.split(',,,');
				var addOnImg = "../User/";
				console.log(temp);

				$('#update_animal_ID').prop('readonly', true);
				
				$('.hide-me').attr('style', 'display: block !important');
				
				//$("#update_id").val(temp[1]);
				//$("#update_skin_color").val(parseInt(temp[3].replaceAll('"','')));
				$("#update_skin_color").val(temp[3].replaceAll('"',''));

				$("#update_show_img").attr("src",addOnImg + temp[2].replaceAll("\\",'').replaceAll('"',''));
				
				$("#update_mark").val(temp[4].replaceAll('"',''));
				$("#update_gender").val(temp[5].replaceAll('"',''));
				$("#update_sterilized").val(temp[6].replaceAll('"',''));
				
				$("#update_sterilization_date").val(temp[7].replaceAll('"',''));
				$("#update_area").val(temp[8].replaceAll('"',''));
				$("#update_birth").val(temp[9].replaceAll('"',''));
				
				$('.btn-update-1').hide();
				$('.hide-it').hide();
			}
			//$('.insert_message').html(data);
		}
	  });
	
});
</script>

<script>
$('.btn-update-2').click(function(){
	
	let files = new FormData()
	
	files.append('action','updateFinal');
	
	files.append('id',$('#update_animal_ID').val());
	files.append('skin_color',$('#update_skin_color').val());
	files.append('mark',$('#update_mark').val());
	files.append('gender',$('#update_gender').val());
	files.append('territorial_area',$('#update_area').val());
	files.append('sterilized',$('#update_sterilized').val());
	files.append('sterilization_date',$('#update_sterilization_date').val());
	files.append('birth_date',$('#update_birth').val());
	
	files.append('img1', $('#update_img')[0].files[0]);
		
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: files,
		processData: false,
        contentType: false,
		success:function(data){
			
			$('.update_message').html(data);
		}
	  });
});

</script>
<script>
$('.btn-delete').click(function(){
	
	var action = 'delete';
	var id = $('#delete_animal_id').val();
	
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action, id:id},
		success:function(data){
			
			if (data == "error"){
				$('.delete_message').html("<div class='alert alert-danger'>Error</div>");
			} else {
				$('.delete_message').html(data);
			}

			
			//$('.delete_message').html(data);
		}
	  });
});
</script>
<script>
$(document).ready(function(){
	
	var action = 'getFeatured';
	
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action},
		success:function(data){
			
			if (data == "error"){
				$('.getFeatured').html("<div class='alert alert-danger'>Error</div>");
			} else {
				$('.getFeatured').html(data);
			}

			
			//$('.delete_message').html(data);
		}
	  });
});
</script>
<script>

function deleteMeFeatured(prod_id){
	
	var action = 'deleteFeatured';
	var id = prod_id;
	
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action, id:id},
		success:function(data){
			
			if (data == "error"){
				$('.getFeatured').html("<div class='alert alert-danger'>Error</div>");
			} else {
				document.location.reload(true);
			}

			
			//$('.delete_message').html(data);
		}
	  });
}
	

</script>
<script>
$('.btn-featured-add').click(function(){
	
	var action = 'addFeatured';
	var prod_name = $('#featured_prod_name_add').val();
	
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action, prod_name:prod_name},
		success:function(data){
			if (data == "error"){
				alert("error");
			} else {
				
				document.location.reload(true);
			}

			
			//$('.delete_message').html(data);
		}
	  });
});
</script>
<script>
$(document).ready(function(){
	
	var action = 'getSale';
	
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action},
		success:function(data){
			
			if (data == "error"){
				$('.getSale').html("<div class='alert alert-danger'>Error</div>");
			} else {
				$('.getSale').html(data);
			}

		}
	  });
});
</script>
<script>

function deleteMeSale(prod_id){
	
	var action = 'deleteSale';
	var id = prod_id;
	
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action, id:id},
		success:function(data){
			
			if (data == "error"){
				$('.getSale').html("<div class='alert alert-danger'>Error</div>");
			} else {
				document.location.reload(true);
			}

			
			//$('.delete_message').html(data);
		}
	  });
}
	

</script>
<script>
$('.btn-sale-add').click(function(){
	
	var action = 'addSale';
	var prod_name = $('#sale_prod_name_add').val();
	
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action, prod_name:prod_name},
		success:function(data){
			if (data == "error"){
				alert("error");
			} else {
				
				document.location.reload(true);
			}

			
			//$('.delete_message').html(data);
		}
	  });
});
</script>
<script>
$(document).ready(function(){
	
	var action = 'getshowAllAnimals';
	
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action},
		success:function(data){
			
			if (data == "error"){
				$('.generateshowAllAnimals').html("<div class='alert alert-danger'>Error</div>");
			} else {
				$('.generateshowAllAnimals').html(data);
			}

		}
	  });
});

$(document).ready(function(){
	
	var action = 'getAddvaccinationstatus';
	
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action},
		success:function(data){
			
			if (data == "error"){
				$('.generateAddvaccinationstatus').html("<div class='alert alert-danger'>Error</div>");
			} else {
				$('.generateAddvaccinationstatus').html(data);
			}

		}
	  });
});

$(document).ready(function(){
	
	var action = 'getDeliveredOrders';
	
	$.ajax({
		type: "POST",
		url: "admin_help.php",
		data: {action:action},
		success:function(data){
			
			if (data == "error"){
				$('.generateDeliveredOrders').html("<div class='alert alert-danger'>Error</div>");
			} else {
				$('.generateDeliveredOrders').html(data);
			}

		}
	  });
});

</script>
<script src="tinymce/tinymce.min.js"></script>
<script>

tinymce.init({
	selector: "textarea.tinymce",

	
	

	statubar: true,
	
	plugins: [
		"advlist autolink link image lists charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		"save table contextmenu directionality emoticons template paste textcolor"
	],

	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
	
	style_formats: [
		{title: "Headers", items: [
			{title: "Header 1", format: "h1"},
			{title: "Header 2", format: "h2"},
			{title: "Header 3", format: "h3"},
			{title: "Header 4", format: "h4"},
			{title: "Header 5", format: "h5"},
			{title: "Header 6", format: "h6"}
		]},
		{title: "Inline", items: [
			{title: "Bold", icon: "bold", format: "bold"},
			{title: "Italic", icon: "italic", format: "italic"},
			{title: "Underline", icon: "underline", format: "underline"},
			{title: "Superscript", icon: "superscript", format: "superscript"},
			{title: "Subscript", icon: "subscript", format: "subscript"},
		]},
		{title: "Blocks", items: [
			{title: "Paragraph", format: "p"},
		]},
		{title: "Alignment", items: [
			{title: "Left", icon: "alignleft", format: "alignleft"},
			{title: "Center", icon: "aligncenter", format: "aligncenter"},
			{title: "Right", icon: "alignright", format: "alignright"},
			{title: "Justify", icon: "alignjustify", format: "alignjustify"}
		]}
	]
});

</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 
  </body>
</html>