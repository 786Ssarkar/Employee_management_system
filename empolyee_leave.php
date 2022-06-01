<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Leave</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <?php
  require_once "partials/employee_header.php"
  ?>

<div class="flex items-center justify-center min-h-screen" style="background-image:url('leves.png');  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">
    <div class="px-8 py-6 mx-4 mt-4 mb-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <div class="flex justify-center">
        <img src="logo.jpg" alt="Logo" stroke-linecap="round" style="height: 50px; width: 50px; ">
            
        </div>
        <h3 class="text-2xl font-bold text-center">Apply for leave</h3>
        <form action="" method="post">
            <div class="mt-4">
              <div>
                <label class="block" for="Reason">Reason of Leave<label>
                  <textarea name="reason" id="reason" cols="30" rows="1" placeholder=" Ex:- Friends Reunion" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"></textarea>
                
            </div>
            
                <div>
                  <label class="block mt-2" for="sdate">Starting Date<label>
                          <input type="date"name="sdate"
                              class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
              </div>
              <div>
                <label class="block mt-2" for="enddate">Ending Date<label>
                        <input type="date" name ="edate"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
          </div>
          <div class="flex">
                    <input type="submit" value="Submit" class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                </div>
            </div>
        </form>
    </div>
</div>
        <?php
        




 if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $db = mysqli_connect('localhost', 'root', '', 'dbtest', );

   $reason =$_POST['reason'];
   $sdate=$_POST['sdate'];
   $edate=$_POST['edate'];
   $eid=$_SESSION['eid'];
   $ename=$_SESSION['user'];
   $cdate=date("Y-m-d");
   $errors = array();
     
  if(empty(trim($reason))){
    array_push($errors, "Reason cannot be blank");

}else {
  
  if($sdate<$cdate){
    array_push($errors, "You cannot apply for past days");
  
}else {
    
  if($edate<$sdate){
    array_push($errors,"You cannot do it because you chose $sdate as a starting date and $edate as the ending date of your leave");
  
}else {
  $sql="INSERT INTO `leaves`(`sno`, `eid`, `name`, `reason`, `startingdate`, `enddate`, `apply_on`) VALUES (null,'$eid','$ename','$reason','$sdate','$edate', current_timestamp())";
  if($db->query($sql)){
    array_push($errors, "Successfully Submited");

  }

                                    }}}
                                  
                                    if(count($errors)>0){
                                      foreach ($errors as $error){
                                      echo "<script> alert('$error')</script>";
                                      }}
                                  
                                  }
        require_once "partials/footer.html"
        
        ?>
</body>
</html>
