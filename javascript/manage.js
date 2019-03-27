$(document).ready(function(){
          
          var DOMAIN = "http://localhost/project/";
          //managing categories
       manageCategories(1);
       function manageCategories(pn)
       {
            $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {'manageCategory':1,pageno:pn},
                success : function(data)
                    {
                        $("#get_category").html(data);
                       //alert(data);
                    }

                
            });
       }

       $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        //alert(pn);
        manageCategories(pn);
       })



       //deleting categories
       $("body").delegate(".my_delete","click",function(){
        var did = $(this).attr("did");
        //alert(did);
        if(confirm("Are you Sure You Want to delete Check That the selected Category is not dependent on other ? "))
        {
            $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {deleteCategory:1,id:did},
                success : function(data)
                    {
                       if(data == "DEPENDENT CATEGORY")
                          alert("category cannot be deleted");
                        else if(data == "CATEGORY_DELETED"){
                         alert("deleted");
                         manageCategories(1);
                       
                        }
                        else
                         // alert("not deleted");
                        alert(data);
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
    },


                
            });
        }

        
       })

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
                   
                }



            });
        }


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
    
 function updateCategories(eid)
       {
       // alert(eid);
            $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {'updateCategory':1,id:eid},
                dataType: 'json',
                success : function(data)
                    {
                        //alert(data);
                       // console.log(data);
                       $("#cid").val(data["cid"]);
                       $("#update_category_name").val(data["category_name"]);
                       $("#parent_category").val(data["parent_category"]);

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
    },
                
            });
       }

       $("body").delegate(".my_edit","click",function(){

        var eid = $(this).attr("eid");
        //alert(eid);
        updateCategories(eid);
       })
       

                
       $("#update_category_form").on("submit",function(){

           var update_category_name = $("#update_category_name");
        var n_patt = new RegExp(/^[A-Za-z ]+$/);
        var statusN = false;
          if(update_category_name.val() == "" ||!n_patt.test(update_category_name.val()))
            {
                update_category_name.addClass("border-danger");
                $("#e_error").html("<span class='text-danger'>Please Enter the category</span>");
                statusN = false;
            }else
            {

                update_category_name.removeClass("border-danger");
                $("#e_error").html("");
                statusN = true;


            }  

            if(statusN == true)
            {
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : $("#update_category_form").serialize(),
                    success : function(data)
                    {
                       alert(data);
                       windows.location.href="manage_category.php";
                    }
                });
            }

       });


//---------------------Management for Brand Handling----------------------//

 manageBrands(1);
       function manageBrands(pn)
       {
            $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {'manageBrands':1,pageno:pn},
                success : function(data)
                    {
                        $("#get_brands").html(data);
                       //alert(data);
                    }

                
            });
       }

       $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        //alert(pn);
        manageBrands(pn);
       })


//Deleting Brands
$("body").delegate(".delete_brand","click",function(){
        var did = $(this).attr("did");
        //alert(did);
       if(confirm("Are you Sure You Want to delete? "))
        {
            $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {'deleteBrand':1,id:did},
                success : function(data)
                    {
                       
                         alert(data);
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
    },


                
            });
        }

        
       })

//Updating Brands

$("body").delegate(".edit_brand","click",function(){
        var eid = $(this).attr("eid");
        //alert(eid);
       
                  $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {updateBrands:1,id:eid},
                dataType: 'json',
                success : function(data)
                    {
                        //alert(data);
                       // console.log(data);
                       $("#bid").val(data["bid"]);
                       $("#update_brand_name").val(data["brand_name"]);
                      // alert(data);
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
    },
                
            });
        
       })

$("#update_brand_form").on("submit",function(){
 var update_brand_name = $("#update_brand_name");
        var n_patt = new RegExp(/^[A-Za-z ]+$/);
        var statusN = false;
          if(update_brand_name.val() == "" ||!n_patt.test(update_brand_name.val()))
            {
                update_brand_name.addClass("border-danger");
                $("#e_error").html("<span class='text-danger'>Please Enter the category</span>");
                statusN = false;
            }else
            {

                update_brand_name.removeClass("border-danger");
                $("#e_error").html("");
                statusN = true;


            }  

            if(statusN == true)
            {
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : $("#update_brand_form").serialize(),
                    success : function(data)
                    {
                       alert(data);
                       windows.location.href="manage_category.php";
                    }
                });
            }

})

//--------------------------Managing Products-----------------//
manageProducts(1);
       function manageProducts(pn)
       {
            $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {'manageProducts':1,pageno:pn},
                success : function(data)
                    {
                        $("#get_products").html(data);
                       //alert(data);
                    }

                
            });
       }

       $("body").delegate(".page-link","click",function(){
        var pn = $(this).attr("pn");
        //alert(pn);
        manageProducts(pn);
       })



//deletion of products
       $("body").delegate(".delete_prod","click",function(){

        var did=$(this).attr("did");
         //alert(did);
        if(confirm("Are you Sure You Want to delete? "))
        {
            $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {'deleteProd':1,id:did},
                success : function(data)
                    {
                       
                         if(data == "Record_deleted")
                         {
                            alert(data);
                            manageProducts(1);
                         }
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
    },


                
            });
        } 

       })

//updating products
       $("body").delegate(".edit_prod","click",function(){
        var eid = $(this).attr("eid");
        //alert(eid);
       
                  $.ajax({

                url : DOMAIN+"/includes/process.php",
                method:"POST",
                data : {updateProducts:1,id:eid},
                dataType: 'json',
                success : function(data)
                    {
                        //alert(data);
                        console.log(data);
                      $("#pid").val(data["pid"]);   
                      $("#update_product_name").val(data["product_name"]);
                      $("#parent_category").val(data["cid"]);
                      $("#Brand_option").val(data["bid"]);
                      $("#update_product_price").val(data["product_price"]);
                      $("#update_product_quantity").val(data["product_stock"]);
                    
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
    },
                
            });
        
       })


       $("#update_products_form").on("submit",function(){

           var update_product_name = $("#update_product_name");
            //alert(update_product_name.val());

      
        var statusN = true;
          
            if(statusN == true)
            {
                $.ajax({
                    url : DOMAIN+"/includes/process.php",
                    method : "POST",
                    data : $("#update_products_form").serialize(),
                    success : function(data)
                    {
                       alert(data);
                       //windows.location.href="";
                    }
                });
            }

       });

      })