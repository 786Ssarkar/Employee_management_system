<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Projects</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
   require_once "partials/admin_header.php"
   ?>
    <div class="overflow-auto" style="max-height: 480px;">
        <div class="flex items-center justify-center min-h-screen">
            <div class="px-8 py-6 mx-4 mt-4 mb-4 text-left shadow-lg md:w-2/3 lg:w-1/2 sm:w-2/3"
                style="background: rgba(255, 255, 255, 1)">
                <div class="flex justify-center">
                    <img src="logo.jpg" alt="Logo" stroke-linecap="round" style="height: 50px; width: 50px; ">

                </div>

                <h3 class="text-2xl font-bold text-center">Assign Project</h3>
                <form action="" method="post">
                    <div class="mt-4">
                        <div>
                            <label for="ID">ID<label>
                                    <?php  $result = mysqli_query($db,"SELECT id FROM `myempolyees`");
                  if (mysqli_num_rows($result) > 1) {?>
                                    <select name="eid" id="eid"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                                        <option value="?>">Select Employee ID</option>
                                        <?php while($row = mysqli_fetch_array($result)) {
                      if($row["id"]==0){
                        continue;
                      }
                      ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['id'];?></option>
                                        <?php } ?>
                                    </select><?php }else {
                      echo '<input type="number" name="eid" placeholder="Project" required=""
                      class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">';
                    } ?>
                        </div>
                        <div class="mt-4">

                            <label for="Project">Project Name<label>
                                    <input type="text" name="projectname" placeholder="Project" required=""
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="mt-4">

                            <label for="Deadline">Deadline<label>
                                    <input type="date" name="Deadline" id="Deadline" required=""
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="mt-4">
                            <label for="State">Project Discription<label>
                                    <textarea cols="30" rows="4" name="pdiscription" required=""
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                        placeholder="Project discription for better understanding"></textarea>

                        </div>
                        <div class="flex">
                            <input type="submit" value="Submit"
                                class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
 require"partials/footer.html";
 
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
   $eid =$_POST['eid'];
   $project=$_POST['projectname'];
   $deadline=$_POST['Deadline'];
   $pdiscription=$_POST["pdiscription"];
   $errors = array();


     
  if(empty(trim($eid))){
     array_push($errors,"ID cannot be blank");

}else {
    
  if(empty($project)){
     array_push($errors,"Project Name cannot be blank");
  
}else {
    
  if(empty($pdiscription)){
     array_push($errors,"project discription cannot be blank");
    
}else {
  $sql="INSERT INTO `addproject`(`id`, `project`, `deadline`, `discription`, `assigndate`, `sno`)
  VALUES ('$eid','$project','$deadline','$pdiscription', current_timestamp(), NUll)";
  if($db->query($sql)){
    array_push($errors,"project Assigned");
  }}}}
  if(count($errors)>0){
    foreach ($errors as $error){
    echo "<script>window.alert($error);</script>";             
    }
    }}
  
  ?>
</body>

</html>