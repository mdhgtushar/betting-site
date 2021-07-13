<style>input,textarea,select{width:100%;padding: 10px;margin :5px 0;outline:0;border:2px solid #ddd;}</style>
<form id="deposit_form">

<p id="Load"> </p>
<select id="method" required>
<option value="method">Method</option>
<option value="bkash">Bkash</option>
<option value="nagad">Nagad</option>
</select>
<input type="text" placeholder="To" id="valueTo" required />
<input type="number" placeholder="Ammount (tk)" id="ammount" required />
<input type="text" placeholder="From" id="valueFrom" required />
<input type="text" placeholder="transiction Number" id="transId" required />
<input type="submit" id="deposit_submit" value="Send Deposit Request">
</form>


<script>
$('#deposit_form').submit(function(e){
e.preventDefault()
var method = $('#method').val();
var valueTo = $('#valueTo').val();
var ammount = $('#ammount').val();
var valueFrom = $('#valueFrom').val();
var transId = $('#transId').val();
var deposit_submit = $('#deposit_submit').val();

$.post('Actions/transAction.php' , {method:method, valueTo:valueTo, ammount:ammount,  valueFrom:valueFrom, transId:transId,deposit_submit:deposit_submit}, function(data){
$('#Load').html(data);
})
})
</script>