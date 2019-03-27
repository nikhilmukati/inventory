$(document).ready(function(){


              
          var DOMAIN = "http://localhost/project/";
        $("#registration_form").on("submit",function(e){
            // body...

            var statusN = false;
            var statusE = false;
            var statusP = false;
            var statusC = false;
            var statusT = false;
            // alert("hello");
            var name = $("#name");
            var email = $("#email")
            var password = $("#pwd");
            var cpassword = $("#cpwd");
            var usertype = $("#usertype");
            var phno = $("#phno");
            var n_patt = new RegExp(/^[A-Za-z ]+$/);
            var e_patt = new RegExp(/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/);
           // alert(phno.val());
           
            if(name.val() == "" ||!n_patt.test(name.val()) ||name.val().length < 6)
            {
                name.addClass("border-danger");
                $("#n_error").html("<span class='text-danger'>Please Enter the Name and it has minimum 6 characters and contains only alphabets</span>");
                statusN = false;
            }else
            {

                name.removeClass("border-danger");
                $("#n_error").html("");
                statusN = true;


            }    

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


            }

            if(password.val() == "" || password.val().length < 9)
            {
                password.addClass("border-danger");
                $("#p_error").html("<span class='text-danger'>password length is greater than 9</span>");
                statusP = false;
            }else
            {

                password.removeClass("border-danger");
                $("#p_error").html("");
                statusP = true;


            }        

            if(cpassword.val() == "" || cpassword.val().length < 9)
            {
                cpassword.addClass("border-danger");
                $("#cp_error").html("<span class='text-danger'>password length is greater than 9</span>");
                statusC = false;
            }else
            {

                cpassword.removeClass("border-danger");
                $("#cp_error").html("");
                statusC = true;


            }     


            if(usertype.val() == "" )
            {
                usertype.addClass("border-danger");
                $("#t_error").html("<span class='text-danger'>select a user type</span>");
                statusT = false;
            }else
            {

                usertype.removeClass("border-danger");
                $("#t_error").html("");
                statusT = true;


            }    
            if(phno.val()==""||isNaN(phno.val())||phno.val().length!=10)
            {
                phno.addClass("border-danger");
                $("#ph_error").html("<span class='text-danger'>select a Valid Phone Number</span>");
                statusT = false;
            }else
            {

                phno.removeClass("border-danger");
                $("#ph_error").html("");
                statusT = true;


            }    
            if((password.val() == cpassword.val()) && statusN == true && statusE == true && statusP == true && statusC == true && statusT == true)
            {
                var temp = $("#registration_form").serialize();
                
               
                $.ajax({

                    url : DOMAIN+"/includes/process.php",
                    method : "POST", 
                   
                    data : temp,
                    success : function(data)
                    {
                        if (data == "EMAIL_ALREADY_EXISTS") {
                          //alert("You have already registered");
                          $("#customAlert").html("<div class='alert alert-danger alert-dismissible'>It seems You Have already registered</div>");
                          
                        } else if(data == "SOME_ERROR"){
                            alert("Something Wrong");
                        }else
                        {
                            //alert(data);
                            window.location.href  = encodeURI(DOMAIN+"/index.php?msg=you are registered");
                        }
                    }

                    
                });
            
           
            }else
            {
                cpassword.addClass("border-danger");
                $("#cp_error").html("<span class='text-danger'>password does not match</span>");
                status = true;
            } 
            e.preventDefault();      
        })


//validation for login form

        $("#login_form").on("submit",function(){

            var email = $("#email_log");
            var password = $("#password_log");
            emailDisplay = email.val();
            //alert(emailDisplay);
            var statusE = false;
            var statusP= false;
            var e_patt = new RegExp(/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/);
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


            }

            if(password.val() == "" || password.val().length < 9)
            {
                password.addClass("border-danger");
                $("#p_error").html("<span class='text-danger'>password Enter the correct password </span>");
                statusP = false;
            }else
            {

                password.removeClass("border-danger");
                $("#p_error").html("");
                statusP = true;


            }      

            if(statusE == true && statusP == true)
            {
                $("#loader").css("display","block");
               var temp = $("#login_form").serialize();
                
               
                $.ajax({

                    url : DOMAIN+"/includes/process.php",
                    method : "POST", 
                   
                    data : temp,
                    success : function(data)
                    {
                        if (data == "not registered") {
                            $("#loader").css("display","none");
                           email.addClass("border-danger");
                            $("#e_error").html("<span class='text-danger'>Please Enter the correct email </span>");
                
                          
                        } else if(data == "password not match"){
                            $("#loader").css("display","none");
                            password.addClass("border-danger");
                            $("#p_error").html("<span class='text-danger'>Enter the correct password </span>")
                        }else
                        {
                            //alert(data);
                            //console.log(data);
                            window.location.href  = encodeURI(DOMAIN+"/dashboard.php?emailDisplay="+ email.val());
                        }
                    }

                    
                });
            
            }

        })

        //function to fetch category
        fetch_category();
        function fetch_category()
        {
            $.ajax({

                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : {getCategory:1}, 
                success : function(data)
                {
                    var root="<option value = '0'>Root</option>";
                    var choose="<option value = ''>Choose Category</option>"
                    $("#parent_category").html(root+data);
                    $("#category_option").html(choose+data);
                }



            });
        }

        //function for fetch brand
        fetch_brands();
        function fetch_brands()
        {
            $.ajax({

                url : DOMAIN+"/includes/process.php",
                method : "POST",
                data : {getBrands:1}, 
                success : function(data)
                {
                    
                    var choose="<option value = ''>Choose Brands</option>";
                    $("#Brand_option").html(choose+data);
                }



            });
        }

       /*  fetch_user();
        function fetch_user()
        {
            //alert(emailDisplay);
            //alert("hello");
            
            alert("hello");
             $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {'getUser':1,id:emailDisplay},
                dataType: 'json',
                success : function(data)
                    {
                        //alert(data);
                       // console.log(data);
                       console.log(data);
                       alert(data);

                    }
        })

}*/

      // adding the category
       $("#category_form").on("submit",function(){
         var category_name = $("#category_name");
        var n_patt = new RegExp(/^[A-Za-z ]+$/);
        var statusN = false;
          if(category_name.val() == "" ||!n_patt.test(category_name.val()))
            {
                category_name.addClass("border-danger");
                $("#e_error").html("<span class='text-danger'>Please Enter the category</span>");
                statusN = false;
            }else
            {

                category_name.removeClass("border-danger");
                $("#e_error").html("");
                statusN = true;


            }  

            if(statusN == true)
            {
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : $("#category_form").serialize(),
                    success : function(data)
                    {
                        if(data == "CATEGORY ADDED")
                        {
                              $("#category_name").removeClass("border-danger");
                              $("#e_error").html("<span class='text-success'>CATEGORY ADDED SUCCESSFULLY</span>");
                              $("#category_name").val("");
                              fetch_category();
                        }else
                        {
                             $("#e_error").html("<span class='text-danger'>category_name already Exists</span>");
                        }
                    }
                });
            }

       })

       //addding a brand

       $("#brand_form").on("submit",function(){

        var brand_name = $("#brand_name");
        //alert(brand_name.val());
        var n_patt = new RegExp(/^[A-Za-z ]+$/);
        var statusN = false;
         if(brand_name.val() == "" )
            {
                brand_name.addClass("border-danger");
                $("#b_error").html("<span class='text-danger'>Please Enter the Brand_name</span>");
                statusN = false;
            }else
            {

                brand_name.removeClass("border-danger");
                $("#b_error").html("");
                statusN = true;


            }    

            if(statusN)
            {
                $.ajax({

                    url : DOMAIN+"/includes/process.php",
                    method:"POST",
                    data : $("#brand_form").serialize(),
                    success : function(data)
                    {
                        if(data == "Brand ADDED")
                        {
                              $("#brand_name").removeClass("border-danger");
                              $("#b_error").html("<span class='text-success'>Brand ADDED SUCCESSFULLY</span>");
                              $("#brand_name").val("");
                               fetch_brands();
                        }else
                        {
                             $("#b_error").html("<span class='text-danger'>Brand_name already Exists</span>");
                        } ;
                    }


                });
            }
            

       })


       //adding a product

       $("#products_form").on("submit",function(){

        var product_name = $("#product_name");
        var product_price =$("#product_price");
        var product_quantity=$("#product_quantity");
        var date=$("#added_date");
        //alert(product_name.val());
         //alert(product_price.val());
          //alert(product_quantity.val());
          //alert(date.val());
          
        var statusN = true;
        var n_patt = new RegExp(/^[A-Za-z ]+$/);
        
         if(product_name.val() == "" )
            {
                product_name.addClass("border-danger");
                $("#n_error").html("<span class='text-danger'>Please Enter the product_name</span>");
                statusN = false;
            }else
            {

                product_name.removeClass("border-danger");
                $("#n_error").html("");
                statusN = true;


            }    

            if(product_price.val() == "" )
            {
                product_price.addClass("border-danger");
                $("#p_error").html("<span class='text-danger'>Please Enter the product_price</span>");
                statusN = false;
            }else
            {

                product_price.removeClass("border-danger");
                $("#p_error").html("");
                statusN = true;


            }    

            if(product_quantity.val() == "" )
            {
                product_quantity.addClass("border-danger");
                $("#q_error").html("<span class='text-danger'>Please Enter the product_quantity</span>");
                statusN = false;
            }else
            {

                product_quantity.removeClass("border-danger");
                $("#q_error").html("");
                statusN = true;


            }

            if(statusN)
            {
                $.ajax({

                    url : DOMAIN+"/includes/process.php",
                    method:"POST",
                    data : $("#products_form").serialize(),
                    success : function(data)
                    {
                        if(data == "Product ADDED")
                        {
                              $("#product_name").html("");
                              $("#product_price").html("");
                              $("#product_quantity").html("");
                               $("#n_error").html("<span class='text-success'>Product added successfully</span>");
                        }else
                        {
                             $("#n_error").html("<span class='text-danger'>Product_name already Exists</span>");
                        } ;
                    }


                });
            }
            

       })


var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

//fetch_user();
        function fetch_user()
        {
          
          var emailDisplay = getUrlParameter('emailDisplay');
          console.log(emailDisplay);
             $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {'getUser':1,ed:emailDisplay},
                dataType: 'json',
                success : function(data)
                    {
                       

                        $("#userName").text('\xa0\xa0'+data["name"]);
                        $("#userType").text('\xa0\xa0'+data["usertype"]);
                        $("#lastLogin").text('\xa0\xa0'+data["last_login"]);
                        $("#hd").text(data["name"]);
                      

                    },
                       error: function (jqXHR, exception) {
        var msg = '';
        if (jqXHR.status === 0) {
            msg = 'Not connect.\n Verify Network.';
        } else if (jqXHR.status == 404) {
            msg = 'Requested page not found. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Internal Server Error [500].';
        } else if (exception === 'parsererror') {
            msg = 'Requested JSON parse failed.';
        } else if (exception === 'timeout') {
            msg = 'Time out error.';
        } else if (exception === 'abort') {
            msg = 'Ajax request aborted.';
        } else {
            msg = 'Uncaught Error.\n' + jqXHR.responseText;
        }
        //$('#post').html(msg);
        console.log(msg);
    }
        })
    }
       

                 })
