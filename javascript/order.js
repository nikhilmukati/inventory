$(document).ready(function(){
          
          var DOMAIN = "http://localhost/project/";
          
          addNewProduct();
         $("#add").click(function(){
         	//console.log("hello");
         	addNewProduct();
         });

         function addNewProduct()
         {
         	$.ajax({
         		url : DOMAIN+"/includes/process.php",
         		method : "POST",
         		data : {'addProduct':1},
         		success : function(data)
         		{
         			//alert(data);
         			$("#invoice_form").append(data);
         			var n=0;
         			$(".number").each(function(){
         				$(this).html(++n);
         			});
         		}

         	})
         }

         $("#remove").click(function(){
         	$("#invoice_form").children("tr:last").remove();
         	calculate(0,0);
         })

         $("#invoice_form").delegate(".pid","change",function(){
         	var pid = $(this).val();
         	//console.log(pid);

         	var tr= $(this).parent().parent();
         	//console.log(parentId);
         	$.ajax({
         		url : DOMAIN+"/includes/process.php",
         		method : "POST",
         		data : {'getPriceAndQuantity':1,id:pid},
         		dataType : "json",
         		success : function(data)
         		{
         			//console.log(data);
         			tr.find(".tqty").val(data["product_stock"]);
         			tr.find(".product_name").val(data["product_name"]);
         			tr.find(".qty").val(1);
         			tr.find(".price").val(data["product_price"]);
         			tr.find(".amt").html(tr.find(".qty").val()*tr.find(".price").val());
         			calculate(0,0);
         		}

         	})
         });

         $("#invoice_form").delegate(".qty","keyup",function(){
         	var qty = $(this);
         	var tr = $(this).parent().parent();
         	//console.log(tr.find(".tqty").val())
            if(tr.find(".tqty").val() == "")
            {
                alert("Please Select The Option");
            }else
         	if(isNaN(qty.val()))
         	{
         		alert("Please write a valid Number");
         		qty.val(1);
         	}else if((qty.val() - 0) > (tr.find(".tqty").val()-0))
         	{
         		alert("Stock is not available");
         	}else{
         		tr.find(".amt").html(qty.val()*tr.find(".price").val());
         		calculate(0,0);
         	}
         })


         function calculate(discount,paid)
         {

         	var subtotal=0;
         	var gst=0;
         	var dis = discount;
         	var paidAmount = paid;
         	var due = 0;
         	$(".amt").each(function(){
         		subtotal = subtotal + ($(this).html())*1;
         	})
         	//console.log(subtotal);
            if(isNaN(paidAmount))
            {
                alert("Please Enter Valid Amount");
                paidAmount=0;

            }
         	gst= .18 * subtotal;
         	var nettotal = subtotal + gst;
         	nettotal = nettotal-discount;
         	due = nettotal - paidAmount;

           
            if(due < 0)
            {
                alert("Due cannot be less than 0");
                due=nettotal;
                $("#paidAmount").val(0);
            }

            
         	//console.log(nettotal);
         	//console.log(paidAmount);
         	//console.log(due);
         	$("#subtotal").val(subtotal);
         	$("#nettotal").val(nettotal);
         	$("#GST").val(gst);
         	$("#Discount").val(discount);
         	$("#due").val(due);
         }

         $("#Discount").keyup(function(){
         	var discount = $(this).val();
            if(isNaN(discount))
            {
                alert("Please write valid Number");
                discount.val(0);
            }
         	calculate(discount,0);
         })

         $("#paidAmount").keyup(function(){
         	var paid = $(this).val();
         	//console.log("paid"+paid);
         	var discount = $("#Discount").val();


         	calculate(discount,paid);
         })

        $("#order_form").click(function(){
            var invoice = $("#my_order_form").serialize();
           // alert(invoice);
        	$.ajax({
        		url : DOMAIN+"/includes/process.php",
        		method : "POST" , 
        		data : $("#my_order_form").serialize(),
        		success : function(data)
        		{
                    $("#my_order_form").trigger("reset");
                    alert(data);
        			if(data == "Order Completed")
                    {
                        $("#my_order_form").trigger("reset");
                        if(confirm("Do You Want To Print Invoice ? "))
                        {
                            window.location.href = DOMAIN+ "/includes/invoice_bill.php?"+invoice;
                        }
                    }else
                    {
                        alert("error");
                    }
        			
        		}
        	})
        })

       
    
      });