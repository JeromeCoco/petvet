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
		if (firstName == "" || lastName == "" || address == "" || mobileNumber == "" || emailAddress == "" || userName == "" || password == "" || confirmPassword == "")
		{
			$("#saveStatus").html("");
        	$("#saveStatus").append('<div class="alert alert-warning">' +
				'<strong>Please enter complete details. Try again.</strong>' +
			'</div>');
		}
		else
		{
			if (password != confirmPassword)
			{
				$("#saveStatus").html("");
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
			        	$("#saveStatus").html("");
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
		$('#myModalEdit').modal('toggle');
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
		if (newFirstName == "" || newLastName == "" || newAddress == "" || newMobileNumber == "" || newEmailAddress == "")
		{
			$("#editStatus").html("");
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
		        	$("#editStatus").html("");
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

		if (firstName == "" || lastName == "" || mobileNumber == "" || timeIn == "" || timeOut == "")
		{
			$("#saveStatus").html("");
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
		        	$('#saveStatus').html(" ");
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
		if (userName == "" || password == "" || confirmPassword == "")
		{
			$("#saveStatus").html("");
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
			        	$('#saveStatus').html(" ");
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
				$("#saveStatus").html("");
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
});