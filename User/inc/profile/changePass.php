<style>
input,textarea,select{
width:100%;
padding: 10px;
margin :5px 0;
outline:0;
border:2px solid #ddd;
}

</style>
<div style="width:100%">
    
<form id="cngPassword">
    <p id="Load"> </p>
<input type="password" placeholder="Carrent Password" id="oldPass" required />
<input type="text" placeholder="New Password" id="passoword" required />
<input type="text" placeholder="Confirm Password" id="cPassword" required />
<input type="submit" id="cngPassSubmited" value="Send Deposit Request">
</form>
</div>


<script>
     $('#cngPassword').submit(function(e){
            e.preventDefault()
            var oldPass = $('#oldPass').val();
            var passoword = $('#passoword').val();
            var cPassword = $('#cPassword').val();
            var cngPassSubmited = $('#cngPassSubmited').val();
            if(passoword == cPassword){
            $.post('Actions/authAction.php' , {oldPass:oldPass, passoword:passoword, cngPassSubmited:cngPassSubmited}, function(data){
                $('#Load').html(data);
            })
            }else{
                 $('#Load').html("<p class='col-dng'>password not mached</p>");
            }
        })
</script>