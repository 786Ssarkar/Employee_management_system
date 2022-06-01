<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
   
    <style>
      body {
    background-image: url('salary-negotiation.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-size: cover;
  }
  body {font-family: "Lato", sans-serif;}
  
  .sidebar {
    height: 100%;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 16px;
  }
  
  .sidebar a, .dropdown-btn {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #eee7e7;
    display: block;
    background: none;
  }
  .sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #eee7e7;
  display: block;
  border: 1px;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}


  .sidebar a.dropdown-btn:hover {
    color: #f30d0d;
  }
  
  .main {
    margin-left: 300px; /* Same as the width of the sidenav */
    padding: 0px 10px;
    font-size: 30px;
   /* text-align: center;*/
    
  }
  .dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}
  
  
  @media screen and (max-height: 450px) {
    .sidebar {padding-top: 15px;}
    .sidebar a {font-size: 18px;}
  }
  </style>
</head>
<body>
  <div class="sidebar">
    <a href="#"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a>
   
    <button class="dropdown-btn active">
      <i class="fa fa-caret-down" style="margin-left: 8px;"></i> Login
    </button>
    <div class="dropdown-container" style="display: none;">
      <a href="empolyee_login.php"> Empolyee_login  </a>
      <a href="admin_login.php"> Admin_login</a>
     
    </div>
  </div>
  <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;
    
    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
    </script>
  
  <div class="main">
    <h2>EMPLOYEE<br> MANAGEMENT<br> SYSTEM</h2>
  </div>
</body>
</html>