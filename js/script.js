/* 
 * @Author: Jethro A. Acosta
 * June 21, 2017
 */

$(document).ready(function()
{
	/*$('.menu-toggle').click(function(){
		$(this).toggleClass('active'); 
	    $('.left-nav').ToggleClass("active");
	});*/

	$('#btnLogOut').click(function(){
		$.ajax({
			url: "unsetSession",
	        type: "POST",
	        data: { },
	        dataType: "json",
	        success: function(data)
	        {
	        	window.location = "index";
	        }
		});
	});

	tinymce.init({
        selector: '#textareatinymce',
        height: 300,
        theme: 'modern',
        plugins: [
          'advlist autolink lists link image charmap print preview hr anchor pagebreak',
          'searchreplace wordcount visualblocks visualchars code fullscreen',
          'insertdatetime media nonbreaking save table contextmenu directionality',
          'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample help',
        image_advtab: true,
        templates: [
          { title: 'Test template 1', content: 'Test 1' },
          { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
          '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
          '//www.tinymce.com/css/codepen.min.css'
        ]
    });

	$("#btnSaveMember").click(function(){
		var firstName = $("#firstName").val();
		var lastName = $("#lastName").val();
		var address = $("#address").val();
		var mobileNumber = $("#mobileNumber").val();
		var emailAddress = $("#emailAddress").val();
		var userName = $("#userName").val();
		var password = $("#password").val();
		var confirmPassword = $("#confirmPassword").val();

		$("#saveStatus").html("");
		if (firstName == "" || lastName == "" || address == "" || mobileNumber == "" || emailAddress == "" || userName == "" || password == "" || confirmPassword == "")
		{
        	$("#saveStatus").append('<div class="alert alert-warning">' +
				'<strong>Please enter complete details. Try again.</strong>' +
			'</div>');
		}
		else
		{
			if (password != confirmPassword)
			{
	        	$("#saveStatus").append('<div class="alert alert-danger">' +
					'<strong>Password do not match. Try again.</strong>' +
				'</div>');
			}
			else
			{
				$.ajax({
					url: "saveNewMember",
			        type: "POST",
			        data: {
			        	firstName: firstName,
			        	lastName: lastName,
			        	address: address,
			        	mobileNumber: mobileNumber,
			        	emailAddress: emailAddress,
			        	userName: userName,
			        	password: password,
			        	confirmPassword: confirmPassword
			        },
			        dataType: "json",
			        success: function(data)
			        {
			        	$("#saveStatus").append('<div class="alert alert-success">' +
  						'<strong>'+data+'</strong>' +
						'</div>');
			        }
				});
			}
		}
	});

	$(document).on( "click", "#btnEditMember", function(){
		var memberid = $(this).attr("data-id");
		$('#myModalEditMembers').modal('toggle');
		$.ajax({
			url: "getMembersDetails",
	        type: "POST",
	        data: { memberid:memberid },
	        dataType: "json",
	        success: function(data)
	        {
	        	$("#editid").val(data[0]['id']);
				$("#editFirstName").val(data[0]['firstname']);
				$("#editLastName").val(data[0]['lastname']);
				$("#editAddress").val(data[0]['address']);
				$("#editMobileNumber").val(data[0]['mobile']);
				$("#editEmailAddress").val(data[0]['email']);
	        }
		});
	});

	$(document).on( "click", "#btnRemoveMember", function(){
		var memberid = $(this).attr("data-id");
		var confirmRemove = confirm("Are you sure you want to remove this member?");
		if (confirmRemove)
		{
			$.ajax({
				url: "removeMember",
		        type: "POST",
		        data: { memberid: memberid },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#member"+memberid).fadeOut('slow');
		        }
			});
		}
	});

	$("#btnUpdateMember").click(function(){
		var id = $("#editid").val();
		var newFirstName = $("#editFirstName").val();
		var newLastName = $("#editLastName").val();
		var newAddress = $("#editAddress").val();
		var newMobileNumber = $("#editMobileNumber").val();
		var newEmailAddress = $("#editEmailAddress").val();

		$("#editStatus").html("");
		if (newFirstName == "" || newLastName == "" || newAddress == "" || newMobileNumber == "" || newEmailAddress == "")
		{
        	$("#editStatus").append('<div class="alert alert-warning">' +
				'<strong>Please enter complete details. Try again.</strong>' +
			'</div>');
		}
		else
		{
			$.ajax({
				url: "updateMember",
		        type: "POST",
		        data: { 
		        	id: id,
		        	newFirstName: newFirstName,
		        	newLastName: newLastName,
		        	newAddress: newAddress,
		        	newMobileNumber: newMobileNumber,
		        	newEmailAddress: newEmailAddress
		        },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#editStatus").append('<div class="alert alert-success">' +
						'<strong>'+data+'</strong>' +
					'</div>');
					$("#memberFname"+id).html(newFirstName);
					$("#memberLname"+id).html(newLastName);
					$("#memberMobile"+id).html(newMobileNumber);
		        }
			});
		}
	});

	$("#file").change(function(){
	    var file = $("#file")[0].files[0];
	    $("#filename").val(file.name);
	});

	$("#fileService").change(function(){
	    var file = $("#fileService")[0].files[0];
	    $("#filename").val(file.name);
	});

	$("#fileProduct").change(function(){
	    var file = $("#fileProduct")[0].files[0];
	    $("#filename").val(file.name);
	});

	$(document).on( "click", "#btnRemoveProduct", function(){
		var productid = $(this).attr("data-id");
		var confirmRemove = confirm("Are you sure you want to remove this product?");
		if (confirmRemove)
		{
			$.ajax({
				url: "removeProduct",
		        type: "POST",
		        data: { productid: productid },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#product"+productid).fadeOut('slow');
		        }
			});
		}
	});

	$(document).on( "click", "#btnEditProduct", function(){
		var id = $(this).attr("data-id");
	});

	$('#btnSaveDoctor').click(function(){
		var firstName = $('#firstName').val();
		var lastName = $('#lastName').val();
		var mobileNumber = $('#mobileNumber').val();
		var sun = $('#sunday').is(":checked") ? '1' : '0';
		var mon = $('#monday').is(":checked") ? '1' : '0';
		var tues = $('#tuesday').is(":checked") ? '1' : '0';
		var wed = $('#wednesday').is(":checked") ? '1' : '0';
		var thurs = $('#thursday').is(":checked") ? '1' : '0';
		var fri = $('#friday').is(":checked") ? '1' : '0';
		var sat = $('#saturday').is(":checked") ? '1' : '0';
		var timeIn = $('#timeIn').val();
		var timeOut = $('#timeOut').val();

		$("#saveStatus").html("");
		if (firstName == "" || lastName == "" || mobileNumber == "" || timeIn == "" || timeOut == "")
		{
        	$("#saveStatus").append('<div class="alert alert-warning">' +
				'<strong>Please enter needed details. Try again.</strong>' +
			'</div>');
		}
		else
		{
			$.ajax({
				url: "addNewDoctorDetails",
		        type: "POST",
		        data: { 
		        	firstName: firstName,
		        	lastName: lastName,
		        	mobileNumber: mobileNumber,
		        	sun: sun,
		        	mon: mon,
		        	tues: tues,
		        	wed: wed,
		        	thurs: thurs,
		        	fri: fri,
		        	sat: sat,
		        	timeIn: timeIn,
		        	timeOut: timeOut
		        },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#saveStatus").append('<div class="alert alert-success">' +
						'<strong>'+data+'</strong>' +
					'</div>');
					$('#firstName').val("");
					$('#lastName').val("");
					$('#mobileNumber').val("");
    				$('.dayOption').prop('checked', false);
					$('#timeIn').val("");
					$('#timeOut').val("");
		        }
			});
		}
	});

	$('#btnSaveUser').click(function(){
		var userName = $('#userName').val();
		var password = $('#password').val();
		var confirmPassword = $('#confirmPassword').val();

		$("#saveStatus").html("");
		if (userName == "" || password == "" || confirmPassword == "")
		{
        	$("#saveStatus").append('<div class="alert alert-warning">' +
				'<strong>Please enter complete details. Try again.</strong>' +
			'</div>');
		}
		else
		{
			if (password == confirmPassword)
			{
				$.ajax({
					url: "addNewUserAdmin",
			        type: "POST",
			        data: { 
			        	userName: userName,
			        	password: password
			       	},
			        dataType: "json",
			        success: function(data)
			        {
			        	$("#saveStatus").append('<div class="alert alert-success">' +
							'<strong>'+data+'</strong>' +
						'</div>');
						$('#userName').val("");
						$('#password').val("");
						$('#confirmPassword').val("");
			        }
				});
			}
			else
			{
	        	$("#saveStatus").append('<div class="alert alert-danger">' +
					'<strong>Password do not match. Try again.</strong>' +
				'</div>');
			}
		}
	});

	$(document).on( "click", "#btnRemoveDoctor", function(){
		var doctorid = $(this).attr("data-id");
		var confirmRemove = confirm("Are you sure you want to remove a doctor?");
		if (confirmRemove)
		{
			$.ajax({
				url: "removeDoctor",
		        type: "POST",
		        data: { doctorid: doctorid },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#doctor"+doctorid).fadeOut('slow');
		        }
			});
		}
	});

	$(document).on( "click", "#btnEditDoctor", function(){
		$('#myModalEditDoctor').modal('toggle');
		var doctorid = $(this).attr("data-id");

		$.ajax({
			url: "getDoctorDetails",
	        type: "POST",
	        data: { doctorid: doctorid },
	        dataType: "json",
	        success: function(data)
	        {
	        	$('.dayOption').prop('checked', false);

	        	$('#doctorId').val(data[0]['id']);
	        	$('#editFirstName').val(data[0]['firstname']);
	        	$('#editLastName').val(data[0]['lastname']);
	        	$('#editMobileNumber').val(data[0]['mobile']);

	        	var sun = data[0]['sun'] == 1 ? true : false;
	        	var mon = data[0]['mon'] == 1 ? true : false;
	        	var tues = data[0]['tue'] == 1 ? true : false;
	        	var wed = data[0]['wed'] == 1 ? true : false;
	        	var thurs = data[0]['thur'] == 1 ? true : false;
	        	var fri = data[0]['fri'] == 1 ? true : false;
	        	var sat = data[0]['sat'] == 1 ? true : false;

	        	$('#editsunday').prop('checked', sun);
	        	$('#editmonday').prop('checked', mon);
	        	$('#edittuesday').prop('checked', tues);
	        	$('#editwednesday').prop('checked', wed);
	        	$('#editthursday').prop('checked', thurs);
	        	$('#editfriday').prop('checked', fri);
	        	$('#editsaturday').prop('checked', sat);

	        	$('#editTimeIn').val(data[0]['time_in']);
	        	$('#editTimeOut').val(data[0]['time_out']);
	        }
		});
	});

	$('#btnUpdateDoctor').click(function(){
		var doctorid = $('#doctorId').val();
		var editFirstName = $('#editFirstName').val();
		var editLastName = $('#editLastName').val();
		var editMobileNumber = $('#editMobileNumber').val();
		var sun = $('#editsunday').is(":checked") ? '1' : '0';
		var mon = $('#editmonday').is(":checked") ? '1' : '0';
		var tues = $('#edittuesday').is(":checked") ? '1' : '0';
		var wed = $('#editwednesday').is(":checked") ? '1' : '0';
		var thurs = $('#editthursday').is(":checked") ? '1' : '0';
		var fri = $('#editfriday').is(":checked") ? '1' : '0';
		var sat = $('#editsaturday').is(":checked") ? '1' : '0';
		var timeIn = $('#editTimeIn').val();
		var timeOut = $('#editTimeOut').val();

		$('#editStatus').html("");
		if (editFirstName == "" || editLastName == "" || editMobileNumber == "" || timeIn == "" || timeOut == "")
		{
			$("#editStatus").append('<div class="alert alert-warning">' +
				'<strong>Please enter complete details. Try again.</strong>' +
			'</div>');
		}
		else
		{
			$.ajax({
				url: "updateDoctor",
		        type: "POST",
		        data: { 
		        	doctorid: doctorid,
		        	editFirstName: editFirstName,
		        	editLastName: editLastName,
		        	editMobileNumber: editMobileNumber,
		        	sun: sun,
		        	mon: mon,
		        	tues: tues,
		        	wed: wed,
		        	thurs: thurs,
		        	fri: fri,
		        	sat: sat,
		        	timeIn: timeIn,
		        	timeOut: timeOut
		        },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#editStatus").append('<div class="alert alert-success">' +
						'<strong>'+data+'</strong>' +
					'</div>');
					$("#firstName"+doctorid).html(editFirstName);
					$("#lastName"+doctorid).html(editLastName);
					$("#mobileNumber"+doctorid).html(editMobileNumber);
		        }
			});
		}
	});

	$('#btnCloseEditDoctor').click(function(){
		$('#editStatus').html("");
		$('.dayOption').prop('checked', false);
	});

	$('#optSpecie').change(function(){
		var speciename = $(this).val();
		$.ajax({
			url: "getBreed",
	        type: "POST",
	        data: { speciename: speciename },
	        dataType: "json",
	        success: function(data)
	        {
	        	$('#optBreed').html(" ");
	        	for (var i = 0; i < data.length; i++)
	        	{
	        		$('#optBreed').append("<option>"+data[i]['name']+"<option>");
	        	}
	        }
		});
	});

	$('#btnAddNewPet').click(function(){
		var ownerName = $('#optOwnerName').val();
		var petName = $('#petName').val();
		var specie = $('#optSpecie').val();
		var breed = $('#optBreed').val();
		var petGender = $('#petGender').val() == "Male" ? '1' : '2';

		$('#saveStatus').html(" ");
		if (petName == "" || specie == null || breed == null) 
		{
			$("#saveStatus").append('<div class="alert alert-warning">' +
				'<strong>Please enter complete details. Try again.</strong>' +
			'</div>');
		}
		else
		{
			$.ajax({
				url: "saveNewPet",
		        type: "POST",
		        data: { 
		        	ownerName: ownerName,
		        	petName: petName,
		        	specie: specie,
		        	breed: breed,
		        	petGender: petGender
		        },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#saveStatus").append('<div class="alert alert-success">' +
  					'<strong>'+data+'</strong>' +
					'</div>');
		        }
			});
		}
	});

	$(document).on( "click", "#btnRemovePet", function(){
		var petid = $(this).attr("data-id");
		var confirmRemove = confirm("Are you sure you want to remove this pet?");

		if (confirmRemove)
		{
			$.ajax({
				url: "removePet",
		        type: "POST",
		        data: { petid: petid },
		        dataType: "json",
		        success: function(data)
		        {
		        	$('#pet'+petid).fadeOut('slow');
		        }
			});
		}
	});

	$(document).on( "click", "#btnViewMember", function(){
		var id = $(this).attr("data-id");
		$('#myModalViewMembers').modal('toggle');

		$.ajax({
			url: "getMembersDetailsForView",
	        type: "POST",
	        data: { id: id },
	        dataType: "json",
	        success: function(data)
	        {
	        	$('#petsList').html(" ");
	        	var fullname = data['memberDetails'][0]['firstname'] + " " + data['memberDetails'][0]['lastname'];
	        	$('#fullName').html(fullname);
	        	$('#address').html(data['memberDetails'][0]['address']);
	        	$('#mobile').html(data['memberDetails'][0]['mobile']);
	        	$('#email').html(data['memberDetails'][0]['email']);

	        	for (var i = 0; i < data['petDetails'].length; i++)
	        	{
	        		$('#petsList').append("<a href='editPets/"+ data['petDetails'][i]['id'] +"'>" + data['petDetails'][i]['name'] + "</a><br/>");
	        	}
	        }
		});
	});

	$('#btnLogIn').click(function(){
		var username = $('#userName').val();
		var password = $('#password').val();

		$.ajax({
			url: "logIn",
	        type: "POST",
	        data: { 
	        	username: username,
	        	password: password
	        },
	        dataType: "json",
	        success: function(data)
	        {
	        	if (data.length == 0)
				{
					$('#logInStatus').html('<br/><div class="alert alert-danger">' +
  						'<strong>Please check your username and password. Try again.</strong>' +
					'</div>');
				}
				else
				{
					window.location = "products";
				}
	        }
		});
	});

	$(document).on( "click", "#btnRemoveService", function(){
		var id = $(this).attr("data-id");
		var confirmRemove = confirm("Are you sure you want to remove this service?");

		if (confirmRemove)
		{
			$.ajax({
				url: "removeService",
		        type: "POST",
		        data: { id: id },
		        dataType: "json",
		        success: function(data)
		        {
		        	$('#service'+id).fadeOut('slow');
		        }
			});
		}
	});

	$(document).on( "click", "#btnEditService", function(){
		var id = $(this).attr("data-id");
	});

	$('#btnUpdateService').click(function(){
		var id = $('#serviceid').val();
		var editServiceName = $('#editServiceName').val();
		var textareatinymce = tinymce.get('textareatinymce').getContent();
		var editServicePrice = $('#editServicePrice').val();

		$("#updateStatus").html(" ");
		if (editServiceName == "" || textareatinymce == "" || editServicePrice == "")
		{
			$("#updateStatus").append('<div class="alert alert-warning">' +
				'<strong>Please enter complete details. Try again.</strong>' +
			'</div>');
		}
		else
		{
			$.ajax({
				url: "../updateServiceDetailsOnly",
		        type: "POST",
		        data: { 
		        	id: id,
		        	editServiceName: editServiceName,
		        	textareatinymce: textareatinymce,
		        	editServicePrice: editServicePrice
		        },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#updateStatus").append('<div class="alert alert-success">' +
  						'<strong>'+data+'</strong>' +
					'</div>');
		        }
			});
		}
	});

	$('#btnUpdateProduct').click(function(){
		var id = $('#productid').val();
		var editProductName = $('#editProductName').val();
		var textareatinymce = tinymce.get('textareatinymce').getContent();
		var editProductPrice = $('#editProductPrice').val();

		$("#updateStatus").html(" ");
		if (editProductName == "" || textareatinymce == "" || editProductPrice == "")
		{
			$("#updateStatus").append('<div class="alert alert-warning">' +
				'<strong>Please enter complete details. Try again.</strong>' +
			'</div>');
		}
		else
		{
			$.ajax({
				url: "../updateProductDetailsOnly",
		        type: "POST",
		        data: { 
		        	id: id,
		        	editProductName: editProductName,
		        	textareatinymce: textareatinymce,
		        	editProductPrice: editProductPrice
		        },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#updateStatus").append('<div class="alert alert-success">' +
  						'<strong>'+data+'</strong>' +
					'</div>');
		        }
			});
		}
	});

	$('#tryAgain').click(function(){
		history.go(-1);
    });

    $('#btnUpdatePet').click(function(){
    	var id = $('#petid').val();
		var petName = $('#petName').val();
		var optSpecie = $('#optSpecie').val();
		var optBreed = $('#optBreed').val();
		var petGender = $('#petGender').val();

		$("#saveStatus").html(" ");
		if (petName == "" || optBreed == "")
		{
			$("#saveStatus").append('<div class="alert alert-warning">' +
				'<strong>Please enter complete details. Try again.</strong>' +
			'</div>');
		}
		else
		{
			$.ajax({
				url: "../updatePet",
		        type: "POST",
		        data: { 
		        	id: id,
		        	petName: petName,
		        	optSpecie: optSpecie,
		        	optBreed: optBreed,
		        	petGender: petGender
		        },
		        dataType: "json",
		        success: function(data)
		        {
		        	$("#saveStatus").append('<div class="alert alert-success">' +
  						'<strong>'+data+'</strong>' +
					'</div>');
		        }
			});
		}
    });
});