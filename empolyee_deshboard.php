<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deshboard</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php

require_once "partials/employee_header.php";
?>
<div class="container mx-auto flex flex-wrap p-3 flex-col md:flex-row items-center">
    <?php

$eid= $_SESSION['eid'];

$rows = mysqli_query($db,"SELECT * FROM `addproject` WHERE id =$eid");
if (mysqli_num_rows($rows) > 0) {

?>
          <div class="flex flex-col text-center w-full mt-3 mb-3">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Projects</h1>
          </div>
        <table class="w-full border">
            <thead>
                <tr class="bg-cyan-200 border-b">
                   
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label> S.no</label>
                          
                    </th>
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label> Project</label>
                           
                        </div>
                    </th>
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label> Deadline
                            
                        </div>
                    </th>
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <lable>Discription</lable>
                            
                        </div>
                    </th>
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label>Assigned</label>
                          
                        </div>
                        <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label>Action</label>
                        </div>
                    </th>
                </tr>
            </thead>
            <?php
                    $i=0;
                    while($row = mysqli_fetch_array($rows)) {
                    ?>
                    <tbody>

<tr class="text-center border-b text-sm text-gray-600">
   
    <td class="p-2 border-r "><?php echo $i+1; ?></td>
    <td class="p-2 border-r"><?php echo $row['project']; ?></td>
    <td class="p-2 border-r"><?php echo $row['deadline'];?></td>
    <td class="p-2 border-r"><?php echo $row['discription'];?></td>
    <td class="p-2 border-r"><?php echo $row['assigndate'];?></td>
    <td>
        <a <?php echo "href='empolyee_project.php?project=$row[project]&sno=$row[sno]'";?> class="bg-blue-400 p-2 text-white hover:shadow-lg text-xs rounded font-thin">Submit</a>
       
    </td>
</tr>
<?php
    $i++;
    }
    ?>

</tbody>
</table>
<?php
                    }else{ echo "<div><p>You have no pending works</p></div>"; }?>
                    </div>


                    <div class="container mx-auto flex flex-wrap p-3 flex-col mb-8 md:flex-row items-center">
                        <?php
                    $rows = mysqli_query($db,"SELECT * FROM `leaves` WHERE `eid` =$eid");
                    if (mysqli_num_rows($rows) > 0) {

?>
          <div class="flex flex-col text-center w-full mt-3 mb-3">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Leaves</h1>
          </div>
        <table class="w-full border">
            <thead>
                <tr class="bg-cyan-200 border-b">
                   
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label> S.no</label>
                          
                    </th>
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label> From</label>
                           
                        </div>
                    </th>
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label> Till
                            
                        </div>
                    </th>
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label> Reason</label>
                            
                        </div>
                    </th>
                    <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label> Status</label>
                          
                        </div>
                        <th class="p-2 border-r text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            <label> Action</label>
                          
                        </div>
                    </th>
                </tr>
            </thead>
            <?php
                    $i=0;
                    while($row = mysqli_fetch_array($rows)) {
                    ?>
                    <tbody>

<tr class=" text-center border-b text-sm text-gray-600">
   
    <td class="p-2 border-r"><?php echo $i+1; ?></td>
    <td class="p-2 border-r"><?php echo $row['startingdate'] ?></td>
    <td class="p-2 border-r"><?php echo $row['enddate']?></td>
    <td class="p-2 border-r"><?php echo $row['reason']?></td>
    <td class="p-2 border-r"><?php echo $row['status']?></td>
    <td>
        
    <a <?php echo "href='partials/delete.php?sno=$row[sno]'"?> onclick="return confirm('Are you sure you want to Cancel the request?')" class="bg-blue-400 p-2 text-white hover:shadow-lg text-xs rounded-lg font-thin"> Cancel </a>
    </td>
</tr>
<?php
    $i++;
    }
    ?>

</tbody>
</table>
<?php
                    }
                    else{ echo "<div><p>You have no pending works</p></div>";}
                    ?>
                    </div>

<?php
  require_once "partials/footer.html";
  ?>
</body>
</html>
