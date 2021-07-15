<?php include"inc/header.php"?>
<section id="main-content">
  <style>
    input,textarea{
      width:100%;
      padding: 10px;
      margin :10px 5px;
      outline:0;
      border:2px solid #ddd;
    }
    
  </style>
<br>
<h2>Contact</h2>
<div>
        <form action="Actions/contact.php" method="post">
    <input type="text" placeholder="Full Name" name="fullName" />
    <input type="email" placeholder="Email" name="email" />
    <input type="text" placeholder="Subject" name="subject" />
    <textarea id="" cols="30" rows="10" name="message" placeholder="message"></textarea>
    <p style="padding-left:10px;">Description of your  message, maximum 500 characters.</p>
    <input type="submit" name="contact_submit" value="Send Message">
  </form>


</div>

</section> <br>
<?php include"inc/footer.php";?>