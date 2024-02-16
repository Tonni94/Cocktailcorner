<?php
// Include the config file
@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM user WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['age_verified'] = true;

        // Retrieve profile image data from the database and assign it to the session variable
        $_SESSION['profile_image'] = $row['profile_image']; // Assuming 'profile_image' is the column name in your database

        header('location:index.php');
        exit();
    } else {
        $error[] = 'Incorrect email or password!';
    }
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Handle login logic
    // ...

} else if (isset($_POST['forgot_password'])) {
    // Handle forgot password logic
    // Redirect to the forgot password page
    header('Location: forgot_password.php');
    exit();
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
    <div class="flex justify-center items-center h-screen">
        <div class="form-container bg-white p-8 rounded-md shadow-md w-96 mx-auto">
            <form action="" method="post">
                <h3 class="font-bold mb-4 text-xl">Login now</h3>
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg text-red-500">' . $error . '</span>';
                    };
                };
                ?>
                <input type="email" name="email" required placeholder="Your email" class="mb-4 mt-4 p-2 rounded-md border border-gray-300 w-full">
                <input type="password" name="password" required placeholder="Your password" class="mb-4 p-2 rounded-md border border-gray-300 w-full">
                <input type="submit" name="submit" value="Login" class="form-btn bg-[#f9d342] text-[#292826] font-semibold py-2 px-6 rounded-md cursor-pointer">
                <p class="mt-4">Don't Have an account? <a href="register_form.php" class="text-violet-600">Register</a></p>
                <p class="mt-4"><a href="forgot_your_password.php" class="text-violet-600">Forgot your password?</a></p>
            </form>
        </div>
    </div>

    <!-- JavaScript function to handle "Forgot your password" link click -->
    <script>
        function forgotPassword() {
            // Submit the form with a hidden input to trigger the forgot password logic
            var form = document.createElement('form');
            form.method = 'post';
            form.action = '';
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'forgot_password';
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    </script>

</body>
</html>