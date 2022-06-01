<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
<?php
require_once "partials/employee_header.php";
$eid=$_SESSION['eid'];
?>
<?php
$rows = mysqli_query($db,"SELECT * FROM `myempolyees` WHERE id =$eid");
$row = mysqli_fetch_array($rows) ?>
<div class="overflow-auto" style="max-height: 480px;">
<div class="flex items-center justify-center min-h-screen">
        <div class="px-8 py-6 mx-4 mt-4 mb-4 text-left shadow-lg  md:w-2/3 lg:w-1/2 sm:w-2/3" style="background: rgba(255, 255, 255, 1)">
            <div class="flex justify-center">
            <img src="logo.jpg" alt="Logo" stroke-linecap="round" style="height: 50px; width: 50px; ">
                
            </div>
   
      <h1 class="text-2xl font-bold text-center">Your Profile</h1>
      <form action="" method="post">
        <div class="container" style="display: flex;flex-direction: column;">
            <div class="row">
                <div class="col-10">
                    <label for="fname">First Name:</label>
                </div>
                <div class="col-90">
                  

                    <input type="text" id="fname" value="<?php echo $row['firstname'];?>" name="firstname" required="" placeholder="Enter your first name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
            </div>
            
            <div class="row">
                <div class="col-10">
                    <label for="lname">Last Name:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="lname" value="<?php echo $row['lastname'];?>" name="lastname" required="" placeholder="Enter your last name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="email">Email Id:</label>
                </div>
                <div class="col-90">
                    <input type="email" value="<?php echo $row['email'];?>" name="email" required="" placeholder="Enter your last name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="mobile">Mobile:</label>
                </div>
                <div class="col-90">
                    <input type="number" id="mobile" value="<?php echo $row['mobile'];?>" name="mobile" required="" placeholder="only 10 digits are allowed" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="gender" required="">Gender:</label>
                </div>
                <div class="col-90">
                    <input type="radio" id="male" name="gender" value="M"<?php if($row['gender']=="M"){ echo "checked";}?>
>Male
                    <input type="radio" id="female" name="gender" value="F"<?php if($row['gender']=="F"){ echo "checked";}?>
>Female
                </div>
            </div>            
            
            <div class="row">
                <div class="col-10">
                    <label for="dob">Date Of Birth:</label>
                </div>
                <div class="col-90">
                    <input type="Date" id="dob" value="<?php echo $row['DOB'];?>"  required="" name="dob" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="address">Address:</label>
                </div>
                <div class="col-90">
                    <textarea name="address" id="address"   required="" cols="50" rows="2" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"><?php echo $row['address'];?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="city">City:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="city" value="<?php echo $row['city'];?>" required="" name="city" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="pincode">Area PIN:</label>
                </div>
                <div class="col-90">
                    <input type="number" id="pin" value="<?php echo $row['pin'];?>" name="pin" maxlength="6" required="" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="state">State:</label>
                </div>
                <div class="col-90">
                    <input type="text" id="state" value="<?php echo $row['state'];?>" name="state" required="" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="qualification"  >Qualification:</label>
                </div>
                <div class="col-90">
                    <select name="qualification" id="qualification" required="" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        <option value="<?php echo $row['qualification'];?>"><?php echo $row['qualification'];?></option>
                        <option value="Diploma">Diploma</option>
                        <option value="Graduation">Graduation</option>
                        <option value="BTech.">BTech.</option>
                        <option value="MTech.">MTech.</option>
                        <option value="MCA">MCA</option>
                        <option value="BCA">BCA</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <label for="branch">branch:</label>
                </div>
                <div class="col-90">
                    <select name="branch" id="branch" required="" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        <option value="<?php echo $row['Branch'];?>"><?php echo $row['Branch'];?></option>
                        <option value="ME">Mechanical</option>
                        <option value="CS">Computer Science</option>
                        <option value="EE">Electrical</option>
                        <option value="ET">Electronics and Telecommunication</option>
                    </select>
                </div>
            </div>
            
            <div class="flex">
            <input type="submit" value="Update" class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">

            </div>  
        </div>
    </form>
        </div></div></div>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST"){

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pin = $_POST['pin'];
    $state = $_POST['state'];
    $qualification = $_POST['qualification'];
    $Branch = $_POST['branch'];

    $errors = array();
  
    if(empty(trim($fname))){ array_push($errors, "Firstname cannot be blank");}else {
      if(empty(trim($lname))){array_push($errors, "Lastname cannot be blank");}else {
      if(empty(trim($email))){array_push($errors, "Email cannot be blank");}else {
      if(empty(trim($mobile))){array_push($errors, "Mobile Number cannot be blank");}else {
      if(empty(trim($city))){array_push($errors, "City cannot be blank");}else {
      if(empty(trim($pin))){array_push($errors, "Pin cannot be blank");}elseif (strlen($pin==6)) {
        array_push($errors, "Pin length cannot be more then  or less then 6 ");
      } else {
      
      if(empty(trim($state))){array_push($errors, "State cannot be blank");}else {
         
    
       $sql = "UPDATE `myempolyees`SET`firstname`='$fname',`lastname`='$lname',`email`='$email',`mobile`='$mobile',`gender`='$gender',`DOB`='$dob',`address`='$address',`city`='$city',`pin`='$pin',`state`='$state',`qualification`='$qualification',`Branch`='$Branch'WHERE `id`='$eid'";
          if($db->query($sql)){
            array_push($errors, " Updated Seccessfuly");

          }else {
            array_push($errors, 'Some thing went wrong');
          }}}}}}}}

              if(count($errors)>0){
                foreach ($errors as $error){
                echo "<script> alert('$error')</script>";
                }
}
}


?>




<?php
  require_once "partials/footer.html";
  ?>

</body>
</html>
