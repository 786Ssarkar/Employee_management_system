<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
   <?php

   require_once "partials/header.html";
   ?>
      <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
            <!-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base"> cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify.</p> -->
          </div>
          <form action="" method="post">
          <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
              <div class="p-2 w-1/2">
                <div class="relative">
                  <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                  <input type="text" id="name" name="name" required=""
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                 
                </div>
              </div>
              <div class="p-2 w-1/2">
                <div class="relative">
                  <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                  <input type="email" id="email" name="email" required=""
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  
                </div>
              </div>
              <div class="p-2 w-full">
                <div class="relative">
                  <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                  <textarea id="message" required="" name="message" 
                  class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
          
                </div>
              </div>
              <div class="p-2 w-full">
                <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Button</button>
              </div></div></div>
          </form>
          <?php
          
  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $db = mysqli_connect('localhost', 'root', '', 'dbtest', );

    if (empty( $_POST['name'])) { $msg= "Name is required"; }else {
      $name = $_POST['name'];
    }
    if (empty($_POST['email'])) { $msg= "Email is required"; }else {
      $email = $_POST['email'];
    }
    if (empty($_POST['message'])) { $msg= "Fill Message Box"; }else {
      $message=$_POST['message'];

      $sql = "INSERT INTO `contact` (`sno`, `name`, `email`, `message`, `sent time`) VALUES (NULL, '$name', '$email', '$message', current_timestamp())";
      if($db->query($sql));
      $msg=  "Message sent";
    }
    echo "<script>
    window.alert('$msg');
    </script>";
  }
    ?>  
      </section>
      <?php
   require_once "partials/footer.html"
   ?>
</body>
</html>
