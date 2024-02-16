<?php
@include 'config.php'; // Include your database configuration file

$errorMsg = ""; // Initialize the error message variable
$successMsg = ""; // Initialize the success message variable

if (isset($_POST['submit'])) {
    // Get the email entered by the user
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Query the database to check if the email exists
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    // Check if any rows were returned (i.e., if the email exists)
    if (mysqli_num_rows($result) > 0) {
        // Email exists, proceed with sending the reset password link
        // Add your code to send the reset password link here
        $successMsg = "A password reset link has been sent to your email.";
    } else {
        // Email does not exist in the database, display error message
        $errorMsg = "Email not found. Please enter a valid email address.";
    }
}
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
</head>

<body class="bg-cover bg-no-repeat bg-center" style="background-image: url('img/mainbg.png')">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-md shadow-md w-96 mx-auto">
            <h2 class=" text-xl font-semibold mb-4">Password Reset</h2>
            <form action="" method="post">
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 mb-4">Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email" class="form-input mt-1 block w-full p-4 border border-gray-300">
                </div>
                <div class="">
                    <button type="submit" name="submit" class="bg-[#f9d342] text-[#292826] font-semibold py-2 px-6 rounded-md cursor-pointer">Submit</button>
                </div>
            </form>
            <?php if (!empty($successMsg)) : ?>
                <p class="text-green-500 mt-4"><?php echo $successMsg; ?></p>
            <?php elseif (!empty($errorMsg)) : ?>
                <p class="text-red-500 mt-4"><?php echo $errorMsg; ?></p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
