
<?php
session_start();
// Include database configuration and start session
@include 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_SESSION['email']; // Email of the logged-in user

    // Check if the 'email' key is set in the $_POST array
    if(isset($_POST['email'])) {
        // Get the email entered in the form
        $entered_email = $_POST['email'];

        // Validate that the entered email matches the email of the logged-in user
        if ($entered_email !== $email) {
            // Email does not match, set error message
            $error_message = "Error: Email doesnt match!";
        } else {
            // Continue with password update logic

            $new_password = $_POST['password'];

            // Check if passwords match
            if ($new_password !== $_POST['confirm-password']) {
                // Passwords do not match, set error message
                $error_message = "Error: Passwords do not match!";
            } else {
                // Passwords match, continue with password update logic

                // Hash the new password with MD5
                $hashed_password = md5($new_password);

                // Update the user's password in the database using prepared statement
                $sql = "UPDATE user SET password = ? WHERE email = ?";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $hashed_password, $email);

                if ($stmt->execute()) {
                    $_SESSION['password_updated'] = true; // Set session variable for successful password update
                } else {
                    echo "Error updating password: " . $stmt->error;
                }

                $stmt->close();
            }
        }
    } else {
        // 'email' key is not set in the $_POST array
        $error_message = "Error: Email not provided";
    }
}
?>


<!--Kuvatesti-->
<?php
@include 'config.php';

// Use session variables directly
$user_id = $_SESSION['user_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE user_id = $user_id"));
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/6eb243e274.js" crossorigin="anonymous"></script>

    <style>
        .upload{
            width: 160px;
            position: relative;
            margin: auto;
        }

        .upload img{
            border-radius: 50%;
            border: 8px solid #fff
            width: 160px;
            height: 160px;
        }

        .upload .round{
            position: absolute;
            background: #292826;
            bottom: 0;
            right: 0;
            width: 39px;
            height: 39px;
            line-height: 40px;
            text-align: center;
            border-radius: 50%;
            overflow: hidden;
        }

        .upload .round input[type = "file"]{
            position: absolute;
            transform: scale(3);
            opacity: 0;
        }

        input[type=file]::-webkit-file-upload-button{
            cursor: pointer;
        }
    </style>
</head>

<?php include_once('header.php');?> 
<body class="bg-cover bg-no-repeat bg-center" style="background-image: url('img/mainbg.png')">

<!--Popup for successful password change-->
<div id="myModal" class="modal bg-[#5cb85c] p-6 cursor-pointer justify-center items-center mx-auto max-w-md rounded-lg relative" style="display: none;">
    <div class="modal-content">
        <span class="close absolute top-0 right-2 cursor-pointer text-lg">&times;</span>
        <p>Password updated successfully!</p>
    </div>
</div>

<!--Greeting and profile picture-->
<main class="flex flex-col justify-center text-center items-center px-4 mx-auto gap-6">
    <h1 class="text-4xl font-bold mb-4 text-white">Hello, <?php echo $_SESSION['name']; ?>!</h1>
    <p class="text-white">Welcome</p>
    <form action="user_page.php" method="post" enctype="multipart/form-data" id="imgform">
        <div class="upload">
        <?php
        $user_id = $_SESSION['user_id'];
        $name = $_SESSION['name'];
        $image = $_SESSION['profile_image'];
        ?>
        <img src="../tipsybartender/profileimg/<?php echo $image; ?>" alt="" title="<?php echo $image; ?>">

        <div class="round">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <input type="hidden" name="name" value="<?php echo $name ?>">
            <input type="file" name="image" id = "image" accept = ".jpg, .jpeg, .png">
            <i class="fa-solid fa-camera" style="color: #fff"></i>
            </div>
        </div>      
    </form>
</main>

<!--Password change-->
<section class="flex">
    <div class="flex flex-col items-center justify-center px-3 py-4 mx-auto lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <!-- Logo or brand name here -->
        </a>
        <div class="bg-white rounded-lg sm:max-w-md px-10 py-5">
            <button id="reveal-form-btn" class="w-full text-black font-medium rounded-xl text-xl text-center">Change password</button>
            <form id="password-reset-form" class="mt-4 space-y-4 lg:mt-5 md:space-y-5 <?php if (!empty($error_message)) echo 'block'; else echo 'hidden'; ?>" action="user_page.php" method="POST" onsubmit="return validatePassword()">
    <?php if (!empty($error_message)) : ?>
        <div class="mb-4 text-red-500"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="name@company.com" required="">
    </div>
    <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" required="">
    </div>
    <div>
        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
        <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
        <span id="password-error" class="text-red-500"></span> <!-- Error message for password mismatch -->
    </div>
    <div class="flex items-start">
        <div class="flex items-center h-5">
            <input id="newsletter" aria-describedby="newsletter" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300" required="">
        </div>
        <div class="ml-3 text-sm">
            <label for="newsletter" class="font-light text-gray-700">I have read and accept the <a class="font-medium text-primary-800 hover:underline" href="terms_conditions.php">Terms and Conditions</a></label>
        </div>
    </div>
    <button type="submit" class="w-full text-[#292826] bg-[#f9d342] hover:bg-white border border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="return validatePassword()">Reset Password</button>
</form>
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("reveal-form-btn").addEventListener("click", function() {
        var form = document.getElementById("password-reset-form");
        form.classList.toggle("hidden");
    });

    function validatePassword() {
        var newPassword = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm-password").value;
        var errorElement = document.getElementById("password-error");

        if (newPassword !== confirmPassword) {
            errorElement.textContent = "Passwords do not match";
            return false; // Prevent form submission
        } else {
            errorElement.textContent = ""; // Clear error message
            return true; // Allow form submission
        }
    }
});
</script>


<!--Popup for succesfull password change-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.querySelector(".modal .close");

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // Display the modal when password updated successfully
        <?php if (isset($_SESSION['password_updated']) && $_SESSION['password_updated']): ?>
            modal.style.display = "block";
        <?php endif; ?>

        // Unset session variable after displaying modal
        <?php unset($_SESSION['password_updated']); ?>
    });
</script>

<!--Kuvatesti-->
<script>
    document.getElementById("image").onchange = function(){
        document.getElementById('imgform').submit();
    }
</script>

<?php
    if(isset($_FILES["image"]["name"])){
        $user_id = $_POST["user_id"];
        $name = $_POST["name"];

        $imageName = $_FILES["image"]["name"];
        $imageSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

// Image validation
$validImageExtensions = ['jpg', 'jpeg', 'png'];
$imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

if (!in_array($imageExtension, $validImageExtensions)) {
    // Invalid image extension
    echo "<script>alert('Invalid Image Extension');</script>";
} elseif ($imageSize > 1200000) {
    // Image size too large
    echo "<script>alert('Image Size Is Too Large');</script>";
}else{
            $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); //Generate new image name
            $newImageName .= "." . $imageExtension;
            $query = "UPDATE user SET profile_image = '$newImageName' WHERE user_id = $user_id";
            mysqli_query($conn, $query);
            move_uploaded_file($tmpName, '../tipsybartender/profileimg/' . $newImageName);
            echo
            "
                <script>
                    document.location.href = '../tipsybartender/user_page.php';
                </script>
                "
                ;
        }
    }
?>  

<?php include_once('footer.php');?>

</body>
</html>