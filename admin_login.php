<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header class="text-gray-600 body-font p-2">
        <div class="container mx-auto flex flex-wrap p-3 flex-col bg-indigo-300 md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="logo.jpg" alt="Logo" stroke-linecap="round" style="height: 35px; width: 35px; ">
            <label class="ml-3 text-xl">Empolyee Management System</label>
          </a>
          <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
              <a class="mr-5 hover:bg-indigo-400 p-2 border-2" href="index.php">Home</a>
              <a class="mr-5 hover:bg-indigo-400 p-2 border-2" href="contact.php">Contact</a>
              <a class="mr-5 hover:bg-indigo-400 p-2 border-2" href="empolyee_login.php" >Empolyee Login</a>
              <a class="mr-5 hover:bg-indigo-400 p-2 border-2" href="">Admin Login</a>
            </nav>
         
        </div>
      </header>
      <form action="" method="post">
      <div class="container p-10 mx-auto h-full flex justify-center items-center">
        <div class=" w-auto">
          <h1 class="font-hairline mb-6 text-center"><strong>ADMIN LOGIN</strong></h1>
            <div class="border-teal p-5 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
                <div class="mb-4">
                  <h1 class="font-hairline mb-6 text-center">Login to your Website</h1>
                    <label class="font-bold text-grey-darker block mb-2">Email</label>
                    <input type="text" name="email" required="" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow" placeholder="Your email">
                </div>
    
                <div class="mb-4">
                    <label class="font-bold text-grey-darker block mb-2">Password</label>
                    <input type="password" name="password" required="" class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow" placeholder="Your Password">
                </div>
    
                <div class="flex items-center justify-between">
                    <input type="submit" name="submit" id="" class="inline-flex items-center bg-indigo-300 border-0 py-1 px-3 font-bold fochover:bg-indigo-400 p-2 rounded text-black mt-4 md:mt-0">
                      <!-- <a class="inline-flex items-center bg-indigo-300 border-0 py-1 px-3 font-bold fochover:bg-indigo-400 p-2 rounded text-black mt-4 md:mt-0" ">Login</a>
                    </button> -->
    
                    <a class="underline inline-block align-baseline font-bold text-sm text-blue hover:bg-gray-300 float-right bg-gray-200" href="forgotpass.php">
                        Forgot Password?
                    </a>
                </div>
              </div>
            </div>
      </div>
      </form>
      <?php
      

      require "partials/conn.php";

      // check if the user is already logged in
      if(isset($_SESSION['loggedin']))
      {

          header("location: admin_deshboard.php");
      }
   if ($_SERVER['REQUEST_METHOD'] == "POST"){
  
   
   $email =$_POST['email'];
   $mypassword =$_POST['password']; 
   $sql = "SELECT * FROM admin WHERE email = '$email' and password = '$mypassword'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  
   $count = mysqli_num_rows($result);
   if($count == 1) {
     
      $_SESSION['user'] = $row['name'];
      $_SESSION['id'] = $row["id"];
      $_SESSION['loggedin'] = true;
    
      header("location: admin_deshboard.php");
   }else {
    echo "<script>
    window.alert('Your Login Name or Password is invalid');
    </script>";
   }}
   require_once "partials/footer.html";
   ?>
</body>
</html>
