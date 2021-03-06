<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: index.php');
}

?>

<html lang="en">
<head>
<meta charset="utf-8">
<title>Digital Visual Request Form</title>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="generator" content="digitalForm">
<meta name="robots" content="index, follow">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSS -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link href="css/form-structure.css" rel="stylesheet">

<!-- JS -->
<script src="js/lib/jquery.js"></script><script src="http://jquery.bassistance.de/validate/lib/jquery-1.9.0.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/lib/dropzone.js"></script>
<script>

$().ready(function() {
  // validate the comment form when it is submitted

  // validate signup form on keyup and submit
  $("#digitalForm").validate({
    rules: {
      firstname: "required",
      lastname: "required",
      password: {
        required: true,
        minlength: 5
      },
      confirm_password: {
        required: true,
        minlength: 5,
        equalTo: "#password"
      },
      repEmail: {
        required: true,
        email: true
      },
      cname: {
        required: true
      },
      cemail: {
        required: true,
        email: true
      },

      area: "required",
      format: "required",

    },
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      username: {
        required: "Please enter a username",
        minlength: "Your username must consist of at least 2 characters"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      confirm_password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
        equalTo: "Please enter the same password as above"
      },
      cname: {
        required: "Please provide the clients name",
      }, 
      cemail: {
        required: "Please enter a valid clients email address",
      },
      area: {
        required: "Please provide an area"
      },
      format: {
        required: "Please provide a format"
      },
      email: "Please enter a valid email address",
      agree: "Please accept our policy"
      }
  });

  // propose username by combining first- and lastname
  $("#username").focus(function() {
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    if(firstname && lastname && !this.value) {
      this.value = firstname + "." + lastname;
    }
  });


});
</script>
</head>
<body id="public">
<div class="hero">
  <header class="header-logo">
    <div class="container">
      <div class="logo"></div>
    </div>
  </header>
</div>
<div class="container">
  <div class="form-wrap">
    <h1>Digital Visual Request</h1>
    <h2 class="alpha">This form is to be used when not linked to print advertising</h2>
    <p>* Required fields</p>
    <div class="separator"></div>
    <form id="digitalForm" method="post" action="submit.php" novalidate enctype="multipart/form-data">
      <h2 class="alpha">Sales Executive details:</h2>
      <div id="sales-first" class="grid_8">
        <label for="firstname">First name:  *</label>
        <input id="firstname" name="firstname" type="text" class="form-input">
      </div>
      <div id="sales-lastname" class="grid_8">
        <label for="lastname">Last name: *</label>
        <input id="lastname" name="lastname" type="text" class="form-input">
      </div>
      <div id="sales-email" class="grid_8">
        <label for="repEmail">Email: *</label>
        <input id="repEmail" name="repEmail" type="text" class="form-input">
      </div>
      <div id="sales-region" class="grid_8">
        <label for="area">Select region *</label>
        <select id="area" name="area" class="form-input" tabindex="4" >
          <option value=""> Select and option below</option>
          <option value="Midlands" > Midlands</option>
          <option value="Northwest and Wales" > Northwest and Wales</option>
          <option value="South" > South</option>
          <option value="Scotland" > Scotland</option>
          <option value="Northeast" > Northeast</option>
          <option value="MEN Media and Huddersfield" > MEN Media and Huddersfield</option>
          <option value="Media Wales" > Media Wales</option>
        </select>
      </div>
      <div class="separator"></div>
      <h2 class="alpha">Client details:</h2>
      <div id="clients-name" class="grid_8">
        <label for="cname">Clients name: *</label>
        <input id="cname" name="cname" type="text" class="form-input">
      </div>
      <div id="clients-email" class="grid_8">
        <label for="cemail">Clients email: *</label>
        <input id="cemail" name="cemail" type="text" class="form-input">
      </div>
      <div id="creatives" class="grid_8">
        <div class="creatives_wrap">
          <p>The following creatives will be designed for each booking:</p>
          <ul>
            <li>MPU</li>
            <li>Leaderboard</li>
            <li>Skyscraper</li>
            <li>MMA Banner</li>
          </ul>
        </div>
      </div>
      <div id="website-based" class="grid_8">
        <div class="c_box_wrap">
          <p>Advert based on current website: </p>
          <input class="c_box" type="checkbox" name="web" value="Design creatives off current website">
        </div>
      </div>
      <div id="instruct" class="grid_16">
        <label class="full" for="instructions">Insert any client instructions or design elements required: </label>
        <textarea id="instructions" 
name="instructions" spellcheck="true" 
rows="10"
tabindex="8" 
onkeyup=""
 ></textarea>
      </div>
      <label class="full" for="instructions">Upload design elements: </label>
      <div id="website-based" class="grid_8">
        <input type="file" name="attachFile">
        <input type="file" name="attachFile2">
      </div>
      <div id="website-based" class="grid_8">
        <input type="file" name="attachFile3">
        <input type="file" name="attachFile4">
      </div>
      <div class="separator"></div>
      <div id="time-taken" class="grid_16">
        <p>Visuals can take up to 48 hours to be completed.
        <p> 
      </div>
      <div class="grid_16">
        <button class="submit" name="submit" type="submit" value="submit"/>
        Submit
        </button>
      </div>
    </form>
  </div>
  <!-- end of form wrap --> 
  
</div>
<footer class="home-foot">
  <div class="container">
    <div class="footer-logo"><img src="images/trinity-logo.png"></div>
  </div>
</footer>
</body>
</html>


