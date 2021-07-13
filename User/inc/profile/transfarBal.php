<style>input,textarea,select{width:100%;padding: 10px;margin :5px 0;outline:0;border:2px solid #ddd;}</style>
<form id="transfar_form">
  
    <p id="Load"> </p>
<input type="number" placeholder="Ammount (tk)" id="ammount" required />
<input type="text" placeholder="Username" id="username" required />
<input type="text" placeholder="note" id="note" required />
<input type="password" placeholder="password" id="password" required />
<input type="submit" id="transfar_submit" value="Send Balance">
</form>


<script>
     $('#transfar_form').submit(function(e){
            e.preventDefault()
            var username = $('#username').val();
            var note = $('#note').val();
            var ammount = $('#ammount').val();
            var password = $('#password').val();
            var transfar_submit = $('#transfar_submit').val();
            
            $.post('Actions/transAction.php' , {username:username, note:note, ammount:ammount,  password:password, transfar_submit:transfar_submit}, function(data){
                $('#Load').html(data);
            })
        })
</script>