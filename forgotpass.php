<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="logo.jpg" type="image/x-icon">
    <title>Reset Password</title>
</head>

<body>
    <?php
    require_once("partials/header.html")
    ?>

    <div class="flex items-center justify-center min-h-screen">
        <div class="px-8 py-6 mx-4 mt-4 mb-4 text-left shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3" style="background: rgba(255, 255, 255, 1)">
            <div class="flex justify-center">
                <img src="logo.jpg" alt="Logo" stroke-linecap="round" style="height: 50px; width: 50px; ">

            </div>
            <h1 class="text-2xl font-bold text-center">Reset Password</h1>
            <form action="" method="post">
                <div class="container" style="display: flex;flex-direction: column;">

                    <div class="row">
                        <div class="col-10">
                            <label for="lname">Email Id:</label>
                        </div>
                        <div class="col-90">
                            <input type="email" name="email" required="" placeholder="Enter your last name" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <label for="dob">Date Of Birth:</label>
                        </div>
                        <div class="col-90">
                            <input type="Date" id="dob" name="dob" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <label for="password">Password:</label>
                        </div>
                        <div class="col-90">
                            <input type="password" id="password" name="password" required="" maxlength="20" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10">
                            <label for="password">Conform Password:</label>
                        </div>
                        <div class="col-90">
                            <input type="password" id="Conform" name="Conform" required="" maxlength="20" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="flex">
                        <input type="submit" value="Reset Password" class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">

                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>


    </script>
    <?php
    $db = mysqli_connect('localhost', 'root', '', 'dbtest');
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $password_1 = $_POST['password'];
        $password_2 = $_POST['Conform'];
        $errors = array();



        if (empty(trim($email))) {
            array_push($errors, "Email cannot be blank");
        } else {
            if (empty(trim($password_1))) {
                array_push($errors, "Password cannot be blank");
            } elseif (strlen(trim($password_1)) < 8) {
                array_push($errors, "Password cannot be less than 8 characters");
            } else {

                if ($password_1 == $password_2) {

                    $sql = "UPDATE `myempolyees` SET  `password`='$password_1' WHERE email='$email' AND DOB='$dob'";
                    if ($db->query($sql)) {
                        array_push($errors, "New password saved");
                    }
                } else {
                    array_push($errors, "Something went wrong");
                }
            }
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<script>window.alert('$error');</script>";
            }
        }
    }
    ?>



    <?PHP
    require_once("partials/footer.html")
    ?>

</body>

</html>