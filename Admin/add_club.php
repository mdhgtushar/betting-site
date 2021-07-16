<?php include"inc/header.php"?>
<section id="main-content">
<h3 class="tbl-head">Add new Club ||  <a href="club_list.php" class="btn btn-info">Club list</a></h3>


<style>input,textarea,select{width:100%;padding: 10px;outline:0;border:2px solid #ddd;}</style>
<form id="addClub">

<p id="Load"> </p>
<table id="customers">

<tr>
<th>Club Name</th>
<td><input type="text" id="clubName" placeholder="Club name" required></td>
</tr>

<tr>
<th>Add Club</th>
<td><input type="submit" id="sub_addClub" value="Submit"></td>
</tr>


</table>
</form>



<script>
$('#addClub').submit(function(e){
e.preventDefault()
var clubName = $('#clubName').val();
var sub_addClub = $('#sub_addClub').val();
$.post('Actions/club.php' , {clubName:clubName,
sub_addClub:sub_addClub}, function(data){
$('#Load').html(data);
})
})
</script>
</div>
</section
<?php include"inc/footer.php"?>