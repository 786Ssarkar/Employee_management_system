<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave</title>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
require_once "partials/admin_header.php";
?>

<div class="container mx-auto flex flex-wrap p-3 flex-col  md:flex-row items-center">
<?php

          $result = mysqli_query($db,"SELECT * FROM `leaves`");

          if (mysqli_num_rows($result) > 0) {
          
          ?>
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-50 border-b">
                   
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Sno
                          
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            ID
                          
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Name
                           
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Starting Date
                            
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Ending Date
                            
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                            Reason
                          
                        </div>
                     </th>
                     <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Status
                            
                        </div>
                        </th>
                       
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Action
                          
                        </div>
                    </th>
                </tr>
            </thead>
            <?php
                    $i=0;
                    $no=0;
                    while($row = mysqli_fetch_array($result)) {
                        $no++;
                        
                      
                    ?>

            <tbody>

                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">

                    <td class="p-2 border-r"><?php echo $no; ?></td>
                    <td class="p-2 border-r"><?php echo $row['eid']; ?></td>
                    <td class="p-2 border-r"><?php echo $row['name']; ?></td>
                    <td class="p-2 border-r"><?php echo $row['startingdate'];?></td>
                    <td class="p-2 border-r"><?php echo $row['enddate'];?></td>
                    <td class="p-2 border-r"><?php echo $row['reason'];?></td>
                    <td class="p-2 border-r"><?php echo $row['status'];?></td>
                    <td>
                   <?php if($row['status']=='Accepted'||$row['status']=='Rejected'){

                            continue;
                        }?>
                        <a name="accept" <?php echo "href='partials/accept.php?sno=$row[sno]'"?> onclick="return confirm('Are you sure you want to Accept the request?')" class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin">Accept</a>
                        <a name="reject" <?php echo "href='partials/reject.php?sno=$row[sno]'"?> onclick="return confirm('Are you sure you want to Reject the request?')" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Reject</a>
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
                    else{
                        echo "No result found";
                    }
                    ?>

        
    </div>
    <?php
  require_once "partials/footer.html";
  ?>
</body>
</html>