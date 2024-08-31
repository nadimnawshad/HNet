
$(document).ready(function(){
	$("#login_button").click(function(){
		$("#signUp_button").css("background", "#518045");
		$("#signUp_button").css("border", "1px solid #ffffff");
		$("#login_button").css("background-color", "#000");
		$("#login_button").css("border", "1px solid #c55a11");
 		$("#login_Form").show();
 		$("#signUp_Form").hide();
	});
});

$(document).ready(function(){
	$("#signUp_button").click(function(){
		$("#login_button").css("background", "#518045");
		$("#login_button").css("border", "1px solid #ffffff");
		$("#signUp_button").css("background-color", "#000");
		$("#signUp_button").css("border", "1px solid #c55a11");
 		$("#signUp_Form").show();
 		$("#login_Form").hide();
	});
});

$(document).ready(function () {  
	$(document).on('keyup','#password',function( e ){
    	var value = $(this).val();  
        $('#passwordValidation').html(checkStrength(value));  
    })  
    function checkStrength(password) {  
        var strength = 0;  
        if (password.length < 8) {  
            $('#passwordValidation').removeClass();  
            $('#passwordValidation').addClass('ShortPass');  
            return 'Too short';  
        }  
        if (password.length > 7) strength += 1;  
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;  
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1; 
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1  
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;  

        if (strength < 2) {  
            $('#passwordValidation').removeClass()  
            $('#passwordValidation').addClass('WeakPass')  
            return 'Weak'  
        } else if (strength < 4) {  
            $('#passwordValidation').removeClass()  
            $('#passwordValidation').addClass('GoodPass')  
            return 'Good'  
        } else {  
            $('#passwordValidation').removeClass()  
            $('#passwordValidation').addClass('StrongPass')  
            return 'Strong'  
        }  
    }  
}); 


$(document).ready(function(){
	$("#guide_box").click(function(){
		$("#notification_section").show();
	});
});



//********************************************************
//Date,Time Checking 
let daysList = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
let monthsList = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Aug', 'Oct', 'Nov', 'Dec'];

// For todays date;

Date.prototype.get_today_date = function () { 
    return ((this.getDate() < 10)?"0":"") + this.getDate();
}

var datetime = new Date().get_today_date()+ " "+monthsList[new Date().getMonth()]+", "+new Date().getFullYear()+" ( "+daysList[new Date().getDay()]+" ) ";
document.getElementById('today_date_time').innerHTML= "<b>Today</b> : "+datetime;

$(document).ready(function(){
	$("#changePlantButton").click(function(){
 		$(".new_cultivation").show();
	});
});
//********************************************************************************
// Sign Up Validation

function signUpValidation(){
	document.getElementById('firstNameValidation').innerHTML="";
	document.getElementById('sureNameValidation').innerHTML="";
	document.getElementById('emailValidation').innerHTML="";
	document.getElementById('phoneValidation').innerHTML="";
	document.getElementById('addressValidation').innerHTML="";
	var passStatus = document.getElementById('passwordValidation').innerHTML;
	document.getElementById('rePasswordValidation').innerHTML="";

	var firstName = document.getElementById("firstName").value;
	if(firstName.length<3)
	{
		document.getElementById('firstNameValidation').innerHTML="*First Name must be grater that 3 character";
		return false;
	}

	var sureName = document.getElementById("sureName").value;
	if(sureName.length<3)
	{
		document.getElementById('sureNameValidation').innerHTML="*Sure Name must be grater that 3 character";
		return false;
	}

	var phone = document.getElementById("phone").value;
	if(phone.charAt(0)!='0' || phone.charAt(1)!='1' || phone.length != 11 || isNaN(phone))
	{
		document.getElementById('phoneValidation').innerHTML="*Invalid phone number. Example: 01712345678";
		return false;
	}

	var emailVal = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
	var email = document.getElementById("email").value;
	if(email=="")
	{
		document.getElementById('emailValidation').innerHTML="*Please enter your email";
		return false;
	}
	else if(!email.match(emailVal))
	{
		document.getElementById('emailValidation').innerHTML="*Invalid email. Example: user@company.com";
		return false;
	}

	var userPass = document.getElementById("password").value;
	if(passStatus != 'Strong'){ 
		document.getElementById('passwordValidation').innerHTML="*Please enter a strong password";
		return false;
	}
	
	if(userPass.length<8 || userPass.length>15)
	{
		document.getElementById('passwordValidation').innerHTML="*Password must be grater that 8 and less than 15 character";
		return false;
	}

    var repassword = document.getElementById("repassword").value;
	if(repassword!=userPass)
	{
		document.getElementById('rePasswordValidation').innerHTML="*Password doesn't match";
		return false;
	}

    var address = document.getElementById("address").value;   
	if(address=="") 
	{   
         document.getElementById('addressValidation').innerHTML="*Write your address"; 
         return false;
    } 
    

}

//****************************************************************************************
//Login Validation

function loginValidation(){
	document.getElementById('user_emailValidation').innerHTML="";
	document.getElementById('user_passwordValidation').innerHTML="";	

	var user_email = document.getElementById("user_email").value;
	if(user_email=="")
	{
		document.getElementById('user_emailValidation').innerHTML="*Please enter your email";
		return false;
	}

	var user_password = document.getElementById("user_password").value;
	if(user_password=="")
	{
		document.getElementById('user_passwordValidation').innerHTML="*Please enter your password";
		return false;
	}


}

// //*********************************************************
const dropArea1 = document.querySelector('#drag-area1');
const paste1 = document.querySelector('#imagePreview1');
dragEventHandeler(dropArea1,paste1);
const dropArea2 = document.querySelector('#drag-area2');
const paste2 = document.querySelector('#imagePreview2');
dragEventHandeler(dropArea2,paste2);
const dropArea3 = document.querySelector('#drag-area3');
const paste3 = document.querySelector('#imagePreview3');
dragEventHandeler(dropArea3,paste3);

const image_input3 = document.querySelector("#inputDisease_image3");

UploadEventHandeler(dropArea1);
UploadEventHandeler(dropArea2);
UploadEventHandeler(image_input3);

function dragEventHandeler(dropArea,paste){
	dropArea.addEventListener('dragover', (event) => {
	  event.preventDefault();
	  dropArea.classList.add('active');
	});

	dropArea.addEventListener('dragleave', () => {
	  dropArea.classList.remove('active');
	});

	// when file is dropped
	dropArea.addEventListener('drop', (event) => {
	event.preventDefault();
	let file = event.dataTransfer.files[0];
	if(file){
      	let fileReader = new FileReader();
    	fileReader.onload = () => {
      		let fileURL = fileReader.result;
      		let imgTag = `<img src="${fileURL}" alt="" class="preview-img">`;

      		paste.innerHTML = imgTag;
    	};
    	fileReader.readAsDataURL(file);
    }
    else{
    	dropArea.classList.remove('active');
    }
	});
}

function preview_image(event,upload) 
{	
	const upload_file = document.querySelector(upload);
	var reader = new FileReader();
	reader.onload = function()
	{
	   	let fileURL = reader.result;
		let imgTag = `<img src="${fileURL}" alt="" class="preview-img">`;

		upload_file.innerHTML = imgTag;
	}
	reader.readAsDataURL(event.target.files[0]);
}

function plantDetailsFind()
{
	var plant_name_table = document.getElementById('plant_name_table');             
   	for(var i = 1; i < plant_name_table.rows.length; i++)
   	{
		plant_name_table.rows[i].onclick = function()
		{
			var plant_name = this.cells[0].innerHTML;  
			var xhttp = new XMLHttpRequest();
		  	xhttp.onreadystatechange = function() {
			    if (this.readyState == 4 && this.status == 200) {
			     	 document.getElementById("plant_description").innerHTML = this.responseText;
			    }
				else
				{
					 document.getElementById("plant_description").innerHTML = this.status;
				}
		  	};
		    xhttp.open("POST", "/hhgg/view/plant_description.php", true);
		    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		    xhttp.send("plant_name="+plant_name);     	
		};
   	}
}


function allNotificatioCheck(){
	var notification_table = document.getElementById('notification_table');             
   	for(var i = 1; i < notification_table.rows.length; i++)
   	{
		notification_table.rows[i].onclick = function()
		{
			var notification_name = this.cells[0].innerHTML;
			var time = this.cells[1].innerHTML;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
			     	 window.location.href = "/hhgg/view/Notification.php";
		    	}
			};
		    xhttp.open("POST", "/hhgg/control/NotificationValidation.php", true);
		    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");    	
			xhttp.send("notification_name="+notification_name+"&time="+time); 
		};
   	}

}

//******************************************************************

// // Mess details




// $(document).ready(function(){
// 	$("#add_mess_member_button").click(function(){
//  		$("#add_member_popUp").show();
// 	});
// });

// $(document).ready(function(){
//   $("#search").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
    
//   });
// });

// function checkMess($mess_name,$per_type){
// 	    if($mess_name=='none'){
//         	if (window.confirm('You are not in any mess. Press ok to create a mess.'))
//    			{
//    				window.open('/Mess_Meal_Management/view/createMess.php', '_self');
//    			};   	
//     	}
//     	else if($per_type=='pending'){
//     		document.getElementById("mess_req_pending").style.display = "block";
//     	}
//     	else{
//     		window.open('/Mess_Meal_Management/view/perMess.php', '_self');
//     	}
// }

// function searchId()
// {
//     var table = document.getElementById('table');
                
//    for(var i = 1; i < table.rows.length; i++)
//    {
//       table.rows[i].onclick = function()
//       {
//          document.getElementById("add_mess_member_input").value = this.cells[0].innerHTML;
//       };
//    }
// }

// $(document).ready(function(){
//   $("#add_mess_member_input").on("keyup", function() {
//     var value = $(this).val().toLowerCase();
//     $("#table tr").filter(function() {
//       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
//     });
//   });
// });





//************************************************************



