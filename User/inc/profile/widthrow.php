<style>
input,textarea,select{
width:100%;
padding: 10px;
margin :5px 0;
outline:0;
border:2px solid #ddd;
}

</style>
<form id="withrowForm">
    <p id="Load"> </p>
<select id="method">
<option value="Club">Method</option>
<option value="bkash">Bkash</option>
<option value="nagad">Nagad</option>
</select>
<select id="methodType">
<option value="Club">Accout Type</option>
<option value="personal">Personal</option>
<option value="agent">Agent</option>
</select>
<input type="number" placeholder="Ammount (tk)" id="ammount" />
<input type="text" placeholder="To" id="valueTo" />
<input type="submit" id="withrow_submit" value="Send Withdrow Request">
</form>



<script>
     $('#withrowForm').submit(function(e){
            e.preventDefault()
            var method = $('#method').val();
            var methodType = $('#methodType').val();
            var ammount = $('#ammount').val();
            var valueTo = $('#valueTo').val();
            var withrow_submit = $('#withrow_submit').val();
            
            $.post('Actions/transAction.php' , {method:method, methodType:methodType, ammount:ammount,  valueTo:valueTo, withrow_submit:withrow_submit}, function(data){
                $('#Load').html(data);
            })
        })
</script>