<style>input,textarea,select{width:100%;padding: 10px;margin :5px 0;outline:0;border:2px solid #ddd;}</style>
<form id="deposit_form">
<div style="padding:10px 0;">
<p>Payment method:</p>
<?php 
$queryy = "SELECT * FROM payment_method";
$resulyt = mysqli_query($con, $queryy);

if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>
<p><?php echo $roww['methodName'];?>(<?php echo $roww['methodType'];?>) :- <?php echo $roww['number'];?></p>

<?php
}}
?>
</div>




<p id="Load"> </p>
<select id="method" required>
<option value="0">Method</option>
<?php 
$queryy = "SELECT * FROM payment_method";
$resulyt = mysqli_query($con, $queryy);

if(mysqli_num_rows($resulyt) > 0){
while($roww = mysqli_fetch_array($resulyt)){
?>

<option value="<?php echo $roww['methodName'];?> :- <?php echo $roww['number'];?>"><?php echo $roww['methodName'];?> :- <?php echo $roww['number'];?></option>


<?php
}}
?>

</select>

<input type="number" placeholder="Ammount (tk)" id="ammount" required />
<input type="text" placeholder="From" id="valueFrom" required />
<input type="text" placeholder="transiction Number" id="transId" required />
<input type="submit" id="deposit_submit" value="Send Deposit Request">
</form>


<script>
$('#deposit_form').submit(function(e){
e.preventDefault()
var method = $('#method').val();
var ammount = $('#ammount').val();
var valueFrom = $('#valueFrom').val();
var transId = $('#transId').val();
var deposit_submit = $('#deposit_submit').val();

$.post('Actions/transAction.php' , {method:method, ammount:ammount,  valueFrom:valueFrom, transId:transId,deposit_submit:deposit_submit}, function(data){
$('#Load').html(data);
})
})
</script>