$(document).ready(function(){


              
          var DOMAIN = "http://localhost/project/";
          //alert("hello");
          var statusN = false;
          var statusP =false;
          var statusT = false;

          $("#edit_form").on("submit",function(){

          	 var name = $("#edit_name");
            
            var password = $("#edit_pwd");
            
            var phno = $("#edit_phno");
            var n_patt = new RegExp(/^[A-Za-z ]+$/);

           if(name.val() == "" ||!n_patt.test(name.val()) ||name.val().length < 6)
            {
                name.addClass("border-danger");
                $("#en_error").html("<span class='text-danger'>Please Enter the Name and it has minimum 6 characters and contains only alphabets</span>");
                statusN = false;
            }else
            {

                name.removeClass("border-danger");
                $("#en_error").html("");
                statusN = true;


            }    


             if(password.val() == "" || password.val().length < 9)
            {
                password.addClass("border-danger");
                $("#ep_error").html("<span class='text-danger'>password length is greater than 9</span>");
                statusP = false;
            }else
            {

                password.removeClass("border-danger");
                $("#ep_error").html("");
                statusP = true;


            }        

             if(phno.val()==""||isNaN(phno.val())||phno.val().length!=10)
            {
                phno.addClass("border-danger");
                $("#eph_error").html("<span class='text-danger'>select a Valid Phone Number</span>");
                statusT = false;
            }else
            {

                phno.removeClass("border-danger");
                $("#eph_error").html("");
                statusT = true;


            } 

            if(statusT&&statusP&&statusN)
            {
            	$.ajax({
            		url : "./includes/process.php",
            		method : "POST",
            		data : $("#edit_form").serialize(),
            		success : function(data)
            		{
            			//console.log(data);
            			alert(data);
            			
            		}
            	})

            }   
          })


})