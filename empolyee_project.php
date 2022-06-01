
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Project</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php


require_once "partials/employee_header.php"
?>


<div class="flex items-center justify-center">
    <div class="px-8 py-4 mx-4 my-6 text-left bg-white shadow-lg  md:w-2/3 lg:w-1/2 sm:w-2/3">
        <div class="flex justify-center">
        <img src="logo.jpg" alt="Logo" stroke-linecap="round" style="height: 50px; width: 50px; ">
            
        </div>
        <h3 class="text-2xl font-bold text-center">Submit Project</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- <div class="mt-4">
              <div>
                <label class="block" for="ID">ID<label>
                        <input type="number" name="eid" placeholder="Employee ID" required=""
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div> -->
            <div class="mt-2">

              <label class="block" for="Project">Project Name<label>
                      <input type="text" name="projectname" placeholder="Project" required="" value="<?php $project=$_GET['project']; echo $project;?>"
                          class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
          </div>
          <div class="mt-2">

            <label class="block" for="pfile">Project File<label>
              <input type="file" name="file" required="" 
              class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
        </div>
          <div class="mt-2">
        <label class="block" for="about">About Project<label>
                <textarea cols="30" rows="3" name="about"
                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" 
                placeholder="Write something about project"></textarea>
                    
    </div>
                <div class="flex">
                    <input type="submit" value="submit" class="w-full px-6 py-2 mt-2 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                </div>
            </div>
        </form>
    </div>
</div>
   
<?php 

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $id =$_SESSION["eid"];
  $filename = $_FILES["file"]["name"];
  $tempname = $_FILES["file"]["tmp_name"];	
  $projectname= $_POST["projectname"];
  $about = $_POST['about'];
  $folder = "projectfiles/".$filename;

    $sql ="INSERT INTO `submited`(`sno`, `id`, `projectname`, `projectfile`, `about`, `submitdate`) VALUES (NULL,'$id','$projectname','$folder','$about',current_time())";

		// Execute query
		if(mysqli_query($db, $sql)){
      if (move_uploaded_file($tempname, $folder)) {
        $sql= "DELETE FROM `addproject` WHERE `addproject`.`sno` = $id";
        if(mysqli_query($db, $sql)){
          header ("location: empolyee_deshboard.php");
        }
      }else{$msg = "Failed to upload image";
      }}}
  require_once "partials/footer.html";
  ?>

</body>
</html>
