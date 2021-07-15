<?php include"inc/header.php"?>
<section id="main-content">
    <h3 class="tbl-head">Add new ||  <a href="paymentOption.php" class="btn btn-info">Payment Opntions</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd;}</style>
<form id="addPayOpt">
  
    <p id="Load"> </p>
<table id="customers">

<tr>
<th>Method Name</th>
<td><input type="text" id="methodName" placeholder="Method name" required></td>
</tr>
<tr>
<th>Method Type</th>
<td><input type="text" id="methodType" placeholder="Method type (e.g personal)" required></td>
</tr>
<tr>
<th>Payment Number</th>
<td><input type="number" id="number" placeholder="Payment Number" required></td>
</tr>
<tr>
<th>Add payment</th>
<td><input type="submit" id="sub_paymentOpt" value="Submit"></td>
</tr>


</table>
</form>



<script>
     $('#addPayOpt').submit(function(e){
            e.preventDefault()
            var methodName = $('#methodName').val();
            var methodType = $('#methodType').val();
            var number = $('#number').val();
            var sub_paymentOpt = $('#sub_paymentOpt').val();
            $.post('Actions/payment.php' , {methodName:methodName, methodType:methodType, 
            number:number, sub_paymentOpt:sub_paymentOpt}, function(data){
                $('#Load').html(data);
            })
        })
</script>
</div>
</section
<?php include"inc/footer.php"?>