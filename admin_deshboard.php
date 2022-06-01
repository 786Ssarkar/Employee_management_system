<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Deshboard</title>
  <link rel="icon" href="logo.jpg" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div class="msg">

  </div>

  <?php
  require_once "partials/admin_header.php";
  ?>

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-10 items-center flex flex-col mx-auto">
      <?php


      $result = mysqli_query($db, "SELECT * FROM `myempolyees`");

      if (mysqli_num_rows($result) > 1) {

      ?>
        <div class="flex flex-col text-center w-full mb-10">
          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Our Team</h1>
        </div>
        <div class="overflow-auto w-4/5 items-center" style="max-height: 280px;">

          <div class="flex flex-wrap">


            <?php
            $i = 1;
            while ($row = mysqli_fetch_array($result)) {
              if ($row["id"] == 0) {
                continue;
              }
            ?>
              <div class="p-2 lg:w-4/12 md:w-1/2 w-full">
                <div class="h-full flex items-center m-1 border-gray-200 border p-4 rounded-lg">
                  <!-- <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80"> -->
                  <a <?php echo "href='admin_empolyees.php?id=$row[id]'"; ?>>
                    

                      <h2 class="text-gray-900 title-font font-medium">
                        <?php echo $row["firstname"]; ?></h2>
                      <p class="text-gray-900"><?php echo $row["email"]; ?></p>
                      <p class="text-gray-900"><?php echo $row["mobile"]; ?></p>
                    
                  </a>
                  <div class="action ml-6 right-0">
                    <a href='<?php echo "partials/delete.php?id=$row[id]&table=myempolyees" ?>' onclick="return confirm('Are you sure! You want to remove this Employee?')" class="right-2 bg-red-400 p-2 text-white hover:shadow-lg text-xs rounded-lg font-thin">Remove</a>

                  </div>
                </div>
              </div>

            <?php
              $i++;
            }
            ?>
          </div>
        <?php
      } else {
        echo "<div class='flex flex-col text-center w-full mb-10'>
                        <h1 class='sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900'>You Did Not Have Any Employee</h1>
                      </div>";
      }
        ?>
        </div>
    </div>
    </div>
  </section>

  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap">
        <div class="flex flex-col text-center w-full mb-10">
          <h1 class="sm:text-3xl  text-2xl font-medium title-font text-gray-900">
            Projects</h1>
        </div>
        <div class="p-4 max-h-96 lg:w-1/2 w-full">
          <div class="h-full bg-gray-100 bg-opacity-75 px-2 pt-4 pb-4 rounded-lg overflow-hidden  relative">
            <?php

            $result = mysqli_query($db, "SELECT * FROM `submited`");

            if (mysqli_num_rows($result) > 0) {

            ?>

              <div class="flex flex-col">
                <div class="overflow-x-auto max-h-96 sm:-mx-6 lg:-mx-8">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-auto flex flex-col space-x-4">
                      <h1 class="sm:text-3xl  text-2xl font-medium title-font m-4 pl-4 text-gray-900">
                        Submited Projects</h1>
                      <table class="divide-y shadow-xl divide-gray-300 w-1/2">
                        <thead class="bg-gray-200 sticky top-0">
                          <tr>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              S.no
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              Project
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              About
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              Download
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              Delete
                            </th>
                          </tr>
                        </thead>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tbody class="bg-white divide-y hover:bg-gray-200 divide-gray-300">
                            <tr class="whitespace-nowrap">
                              <td class="px-6 py-4 text-sm text-gray-900">
                                <?php echo $i + 1; ?>
                              </td>
                              <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                  <?php echo $row["id"]; ?>
                                </div>
                              </td>
                              <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                  <?php echo $row["projectname"]; ?></div>

                              </td>
                              <td class="px-6 py-4 text-sm text-gray-900">
                                <?php echo $row["about"]; ?>
                              </td>
                              <td class="px-4 py-1">
                                <a href="<?php echo $row["projectfile"]; ?>" Download>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" fill="none">
                                    <path d="M20 14V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14M12 15L12 3M12 15L8 11M12 15L16 11" stroke="#001A72" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                  </svg></a>
                              </td>
                              <td class="px-6 py-4">
                                <a href='<?php echo "partials/delete.php?id=$row[sno]&table=submited" ?>' onclick="return confirm('Are you sure! You want to delete this Project?')" class="px-4 py-1"><svg xmlns="http://www.w3.org/2000/svg" href="1.php" class="w-6 h-6 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg></a>
                              </td>
                            </tr>
                          </tbody>
                        <?php
                          $i++;
                        }
                        ?>
                      </table>

                    </div>
                  </div>
                </div>
              </div><?php
                  }
                    ?>
          </div>
        </div>
        <div class="p-4 lg:w-1/2  max-h-96 w-full">
          <div class="h-full bg-gray-100 bg-opacity-75 px-2 pt-4 pb-4 rounded-lg overflow-hidden  relative">
            <?php

            $result = mysqli_query($db, "SELECT * FROM `addproject`");

            if (mysqli_num_rows($result) > 0) {

            ?>

              <div class="flex flex-col">
                <div class="overflow-x-auto max-h-96 sm:-mx-6 lg:-mx-8">
                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-auto flex flex-col space-x-4">
                      <h1 class="sm:text-3xl   text-2xl font-medium title-font m-4 pl-4 text-gray-900">
                        Pendding Projects</h1>
                      <table class="divide-y shadow-xl divide-gray-300 w-1/2">
                        <thead class="bg-gray-200 sticky  top-0">
                          <tr>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              S.no
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              Project
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              About
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              Deadline
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-900">
                              Cancel
                            </th>
                          </tr>
                        </thead>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tbody class="bg-white divide-y hover:bg-gray-200 divide-gray-300">
                            <tr class="whitespace-nowrap border-1">
                              <td class="px-6 py-4 text-sm text-gray-900">
                                <?php echo $i + 1; ?>
                              </td>
                              <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                  <?php echo $row["id"]; ?>
                                </div>
                              </td>
                              <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                  <?php echo $row["project"]; ?></div>

                              </td>
                              <td class="px-2 py-2 text-sm text-gray-900">
                                <?php echo $row["discription"]; ?>
                              </td>
                              <td class="px-6 py-4 text-sm text-gray-900">
                                <?php echo $row["deadline"]; ?>
                              </td>
                              </td>
                              <td class="px-6 py-4">
                                <a href='<?php echo "partials/delete.php?id=$row[sno]&table=addproject" ?>' onclick="return confirm('Are you sure! You want to Cancal this Assigned Project?')" class="px-4 py-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                    <path style="fill:#c82a2a;" d="M256,512c-68.48,0-132.797-26.6-181.096-74.904C26.6,388.797,0,324.48,0,256  c0-68.486,26.6-132.797,74.904-181.096C123.204,26.6,187.515,0,256,0c68.48,0,132.797,26.6,181.096,74.904  C485.4,123.203,512,187.52,512,256c0,68.486-26.6,132.797-74.904,181.096l0,0l0,0C388.797,485.4,324.486,512,256,512z" />
                                    <path style="fill:#b32525;" d="M437.096,437.096C485.4,388.797,512,324.486,512,256c0-68.48-26.6-132.797-74.904-181.096  C388.797,26.6,324.48,0,256,0v512C324.486,512,388.797,485.4,437.096,437.096z" />
                                    <path style="fill:#FFFFFF;" d="M279.624,256l82.695-82.695c6.526-6.52,6.526-17.103,0-23.624c-6.526-6.526-17.099-6.526-23.624,0  L256,232.376l-82.695-82.695c-6.526-6.526-17.099-6.526-23.624,0c-6.526,6.52-6.526,17.103,0,23.624L232.376,256l-82.695,82.695  c-6.526,6.52-6.526,17.103,0,23.624c3.263,3.263,7.538,4.895,11.812,4.895c4.274,0,8.549-1.632,11.812-4.895l82.695-82.695  l82.695,82.695c3.263,3.263,7.538,4.895,11.812,4.895c4.274,0,8.549-1.632,11.812-4.895c6.526-6.52,6.526-17.103,0-23.624  L279.624,256z" />
                                    <path style="fill:#FFEB99;" d="M279.624,256l82.695-82.695c6.526-6.52,6.526-17.103,0-23.624c-6.526-6.526-17.099-6.526-23.624,0  L256,232.376v47.248l82.695,82.695c3.263,3.263,7.538,4.895,11.812,4.895c4.274,0,8.549-1.632,11.812-4.895  c6.526-6.52,6.526-17.103,0-23.624L279.624,256z" />
                                  </svg></a>
                              </td>
                            </tr>
                          </tbody>
                        <?php
                          $i++;
                        }
                        ?>
                      </table>

                    </div>
                  </div>
                </div>
              </div><?php
                  }
                    ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="py-12 bg-gray-400 absolute top-0 right-0 bottom-0 left-0 hidden " id="modal">
    <div class="container mx-auto w-1/2 ">
        <div class="relative py- px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">

            <button
                class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                onclick="modalHandler()" aria-label="close modal" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                    height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>


            <!-- <div class="relative overflow-auto  max-h-64 mb-5 mt-2"> -->


            <section class="text-gray-600 body-font">
                <div class="container px-5 py-10 items-center flex flex-col mx-auto">
                    <?php


        $result = mysqli_query($db, "SELECT * FROM `contact`");

        if (mysqli_num_rows($result) > 0) {

        ?>
                    <div class="flex flex-col text-center w-full mb-10">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Messages</h1>
                    </div>
                    <div class="overflow-auto w-4/5 items-center" style="max-height: 280px;">

                        <div class="flex flex-col">


                            <?php
              $i = 1;
              while ($row = mysqli_fetch_array($result)) {
             

              ?>
                            <div class="p-2 flex flex-col w-full">

                                <div class="h-full  items-center  border-gray-200 border p-4 rounded-lg">
                                    <!-- <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80"> -->
                                    <div class="action ml-6 right-0">
                                        <h1 class="text-gray-900 title-font font-medium">
                                            <?php echo $i; ?>
                                        </h1>

                                    </div>
                                    <hr>
                                    <div class="flex flex-col mb-5 mt-2">
                                        <div class="flex items-center justify-start w-full">




                                            <p class="text-gray-900 ">
                                        </div>
                                        <div class="flex items-center justify-start w-full">
                                            <?php echo $row["name"]; ?></p>
                                        </div>
                                        <div class="flex items-center justify-start w-full">
                                            <p class="text-gray-900"><?php echo $row["email"]; ?></p>
                                        </div>
                                        <div class="flex items-center justify-start w-full">
                                            <text class="text-gray-900"><?php echo $row["message"]; ?></text>
                                        </div>

                                    </div>

                                    <div class="action ml-6 right-0">
                                        <a href='<?php echo "partials/delete.php?id=$row[sno]&table=contact"; ?>'
                                          
                                            class="right-2 bg-red-400 p-2 text-white hover:shadow-lg text-xs
                                            rounded-lg font-thin">Remove</a>

                                    </div>
                                    
                                </div>
                            </div>

                            <?php
                $i++;
              }
              ?>
                        </div>
                        <?php
        } else {
          echo "<div class='flex flex-col text-center w-full mb-10'>
                    <h1 class='sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900'>NOT Found </h1>
                  </div>";
        }
          ?>
                    </div>
                </div>
        
        

        
        <div class="flex items-center justify-end pb-4 w-full">
            
            <button
                class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm"
                onclick="modalHandler()">Cancel</button>
        </div>
      </div>
      </section>
    </div>
</div>
</div>
<div class="fixed right-5 bottom-6 z-50 bg-gray-500  p-2 cursor-pointer" onclick="modalHandler(true)" id="msg">
    <svg width="24px" height="24px" viewBox="0 -7.96 70.001 70.001" xmlns:dc="http://purl.org/dc/elements/1.1/"
        xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="m -169.31733,559.07933 c -0.8266,-0.38573 -1.5949,-1.20166 -1.9061,-2.02419 -0.2108,-0.55729 -0.2258,-2.50566 -0.191,-24.90545 l 0.038,-24.3009 0.3645,-0.6178 c 0.4479,-0.7591 0.8259,-1.1151 1.6263,-1.5318 l 0.6178,-0.3217 32.0532,-0.035 c 35.5474,-0.039 32.886,-0.1082 34.0414,0.8808 0.3314,0.2837 0.7428,0.8221 0.9217,1.2064 l 0.3233,0.6941 0,24.2322 0,24.23226 -0.3251,0.68646 c -0.3933,0.83049 -1.0396,1.46769 -1.869,1.84268 -0.6156,0.27835 -0.7309,0.27934 -32.813,0.28101 l -32.1952,0.002 -0.6865,-0.32034 z m 60.7522,-22.81896 c 0,-12.65508 -0.035,-15.84488 -0.1716,-15.76378 -0.094,0.056 -5.9196,4.56 -12.9449,10.0091 -7.0253,5.44915 -13.0226,10.07256 -13.3274,10.27426 -0.8596,0.56883 -1.8689,0.72909 -2.8288,0.44916 -0.8665,-0.2527 0.3583,0.67343 -16.9607,-12.82522 l -9.3703,-7.3033 0,15.51262 0,15.51261 27.8019,0 27.8018,0 0,-15.86545 z m -13.6856,-14.47628 11.7702,-9.13 -13.1835,-0.035 c -7.2509,-0.019 -19.1217,-0.019 -26.3796,0 l -13.1961,0.035 13.1501,10.2538 13.1501,10.2538 1.4593,-1.1238 c 0.8026,-0.6181 6.7559,-5.2323 13.2295,-10.2538 z"
            fill="#00bcf2" transform="translate(171.429 -505.324)" />
    </svg>
</div>
<!-- <div class="w-full flex justify-center py-12" id="button">
  <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 mx-auto transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-4 sm:px-8 py-2 text-xs sm:text-sm" >Open Modal</button>
</div> -->
<script>
let modal = document.getElementById("modal");

function modalHandler(val) {
    if (val) {
        fadeIn(modal);
    } else {
        fadeOut(modal);
    }
}

function fadeOut(el) {
    el.style.opacity = 1;
    (function fade() {
        if ((el.style.opacity -= 0.1) < 0) {
            el.style.display = "none";
        } else {
            requestAnimationFrame(fade);
        }
    })();
}

function fadeIn(el, display) {
    el.style.opacity = 0;
    el.style.display = display || "flex";
    (function fade() {
        let val = parseFloat(el.style.opacity);
        if (!((val += 0.2) > 1)) {
            el.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })();
}
</script>

  <?php
  require_once "partials/footer.html"
  ?>
</body>

</html>