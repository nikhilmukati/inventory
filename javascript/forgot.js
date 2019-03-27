$(document).ready(function(){
	var em ="";
  var pn="";
	 var DOMAIN = "http://localhost/project/";
	$("#fetchOtp").click(function(){
		var email = $("#forgotPasswordEmail");
		var e_patt = new RegExp(/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/);
		var statusE = false;
		 if(!e_patt.test(email.val()))
            {
                email.addClass("border-danger");
                $("#e_error").html("<span class='text-danger'>Please Enter the correct email format</span>");
                statusE = false;
            }else
            {

                email.removeClass("border-danger");
                $("#e_error").html("");
                statusE = true;
                em = email.val();


            }

            if(statusE)
            {
            	$.ajax({
            		url : DOMAIN+"/includes/handleForgot.php",
            		method : "POST",
            		   data : {'emailValue':1,id:email.val()},
                   dataType : 'json',
            		success : function(data){	

            			//alert(data);
            		//	console.log(data);
            			if(data == ""||data==null)
            			{
            				alert("Wrong Email Id");
            			}else{
                    
                    pn = data["notes"];
                                      console.log(pn);
                                   $.ajax({
                                              url : "./includes/sendOtp.php",
                                              method : "POST",
                                              data : {'sendOtp':1,'num':pn},
                                              success : function(data)
                                              {
                                                 console.log(data);
                                                 $("#verify").click(function(){
                                                    var otp = $("#otpValue");
                                                    if(otp.val() == data)
                                                    {
                                                       window.location.href=encodeURI(DOMAIN+"/changePass.php?emailVal="+em);
                                                    }else
                                                    {
                                                      alert("wrong Otp");
                                                       $("#otpValue").val("");
                                                    }
                                                 })
                                              }
                                          })

            $("#fetchOtp").css("display","none");
						$("#otp").css("display","block");
						$("#verify").css("display","block");

					}

            		}
            	})
            }


	})



$("#forgotPassword_form").on("submit",function(){
  var pass = $("#pass");
  var cpass = $("#cpass");
  var checkPass = false;
 // console.log(pass.val());
  //console.log(cpass.val());
  if(pass.val() != cpass.val())
  {
    alert("passwords does nt match");
    checkPass = true;
  }
  if(pass.val().length < 9)
  {
    alert("password lenght should be greater than 9");
    checkPass = true;
  }
  if(!checkPass)
	updatePassword();
})	

function updatePassword()
{
 	var temp = $("#forgotPassword_form").serialize();
 	//console.log(temp);
 	//console.log("hello");
  $.ajax({
  	url : DOMAIN + "/includes/handleForgot.php",
  	method : "POST" ,
  	data : $("#forgotPassword_form").serialize(),
  	success : function(data)
  	{
  		if(data == "Record updated successfully")
  		{
  			alert("Password Changed successfully");
  			window.location.href=encodeURI(DOMAIN+"/index.php");	
  		}
  	} 
  })

}



	
})