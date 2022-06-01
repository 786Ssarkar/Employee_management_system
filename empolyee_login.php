<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<style>
        #menu-toggle:checked+#menu {
            display: block;
        }
    </style>
    <header class="text-gray-600 body-font p-2">
        <div class="container mx-auto flex flex-wrap p-3 flex-col bg-indigo-300 md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="logo.jpg" alt="Logo" stroke-linecap="round" style="height: 35px; width: 35px; ">
            <label class="ml-3 text-xl">Empolyee Management System</label>
          </a>
           <label for="menu-toggle" class="mr-5 hover:bg-indigo-400 p-2 border-2 pointer-cursor ml-auto lg:hidden block"><svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg></label>
            <input class="hidden" type="checkbox" id="menu-toggle" />
            <div class="hidden lg:flex lg:items-center ml-auto lg:w-auto w-full" id="menu">

                    <ul class="lg:flex items-center justify-between text-base text-gray-700 pt-4 lg:pt-0">
                        <li><a class="lg:border-2 m-2 hover:bg-indigo-400 p-1 block hover:bg-indigo-400 " href="index.php">Home</a></li>
                        <li><a class="lg:border-2 m-2 hover:bg-indigo-400 p-1 block hover:bg-indigo-400 " href="contact.php">Contact</a></li>
                        <li><a class="lg:border-2 m-2 hover:bg-indigo-400 p-1 block hover:bg-indigo-400 " href="">Employee login</a></li>
                        <li><a class="lg:border-2 m-2 hover:bg-indigo-400 p-1 block hover:bg-indigo-400 " href="admin_login.php">Admin login</a></li>
                    </ul>
  
            </div>
         
        </div>
      </header>
      <form action="" method="post">
      <div class="container p-10 mx-auto h-full flex justify-center items-center">
        <div class=" w-auto">
          <h1 class="font-hairline mb-6 text-center"><strong>EMPOLYEE LOGIN</strong></h1>
            <div class="border-teal p-5 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
                <div class="mb-4">
                  <h1 class="font-hairline mb-6 text-center">Login to our Website</h1>
                    <label class="font-bold text-grey-darker block mb-2">Email</label>
                    <input type="text" name="email" required="" 
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow" 
                    placeholder="Your Username">
                </div>
    
                <div class="mb-4">
                    <label class="font-bold text-grey-darker block mb-2">Password</label>
                    <input type="password" name="password" required="" 
                    class="block appearance-none w-full bg-white border border-grey-light hover:border-grey px-2 py-2 rounded shadow" 
                    placeholder="Your Password">
                </div>
    
                <div class="flex items-center justify-between">
                  <input type="submit" value="Submit" 
                  class="inline-flex items-center bg-indigo-300 border-0 py-1 px-3 font-bold fochover:bg-indigo-400 p-2 rounded text-black mt-4 md:mt-0">
    
                  <a class="underline inline-block align-baseline font-bold text-sm text-blue hover:bg-gray-300 float-right bg-gray-200" 
                  href="forgotpass.php">
                        Forgot Password?
                    </a>
                </div>
              </div>
            </div>
      </div>
      </form>
      <?php
      require "partials/conn.php";
      if(isset($_SESSION['eid']))
      {
          header("location: empolyee_deshboard.php");
      }

      if ($_SERVER['REQUEST_METHOD'] == "POST"){
     $db = mysqli_connect('localhost', 'root', '', 'dbtest' );
      
      $email = $_POST['email'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT * FROM myempolyees WHERE email = '$email' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
    
      if($count == 1) {
        
         $_SESSION['user'] = $row['firstname'];
         $_SESSION['eid'] = $row['id'];
         $_SESSION['loggedin'] = true;
         
         header("location: empolyee_deshboard.php");
      }else { $error = "Your Login Email or Password is invalid"; } }
      require_once "partials/footer.html";
      ?>
</body>
</html>