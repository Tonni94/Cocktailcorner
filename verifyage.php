<?php
// Start the session
session_start();

// Check if age verification form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve birthdate from form
    $birthdate = $_POST["birthdate"];
    
    // Calculate age based on birthdate
    $today = new DateTime();
    $diff = $today->diff(new DateTime($birthdate));
    $age = $diff->y;
    
    // Check if age is over 18
    if ($age >= 18) {
        // Age verification successful, allow access
        $_SESSION["age_verified"] = true;
        // Redirect to the main page for users 18 and over
        header("Location: cocktails.php");
        exit(); // Stop further execution
    } else {
        // Age verification failed, show pop-up and redirect
        echo '<script>
                // Show pop-up instantly
                alert("Age confirmation failed. Redirecting..");
                // Redirect to homepage when button is clicked
                function redirectToHomepage() {
                    window.location.href = "https://www.responsibility.org/drink-responsibly/";
                }
                setTimeout(redirectToHomepage, 0);
              </script>';
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>
</head>

<style>
    .box-wrapper {
        position: relative;
        height: 702px;
        width: 602px;
        overflow: hidden;
        max-height: 702px;
        max-width: 602px;
    }

    .box {
        position: absolute;
        height: 700px;
        width: 600px;
        background: #F2EBE2;
    }

    .box:before,
    .box:after,
    .box-inner:before,
    .box-inner:after {
        background: #292826;
        content: ' ';
        display: block;
        height: 3em;
        width: 3em;
        border-radius: 50%;
        position: absolute;
    }

    .box:before {
        top: -1.5em;
        left: -1.5em;
    }

    .box:after {
        top: -1.5em;
        right: -1.5em;
    }

    .box-inner:before {
        bottom: -1.5em;
        left: -1.5em;
    }

    .box-inner:after {
        bottom: -1.5em;
        right: -1.5em;
    }

    .box2-wrapper {
        position: relative;
        height: 600px; /* Adjusted height */
        width: 500px; /* Adjusted width */
        overflow: hidden;
        max-height: 600px; /* Adjusted max-height */
        max-width: 500px; /* Adjusted max-width */
    }

    .box2 {
        position: absolute;
        height: 600px; /* Adjusted height */
        width: 500px; /* Adjusted width */
        background: #bb4031;
    }

    .box2:before,
    .box2:after,
    .box2-inner:before,
    .box2-inner:after {
        background: #F2EBE2;
        content: ' ';
        display: block;
        height: 3em;
        width: 3em;
        border-radius: 50%;
        position: absolute;
    }

    .box2:before {
        top: -1.5em;
        left: -1.5em;
    }

    .box2:after {
        top: -1.5em;
        right: -1.5em;
    }

    .box2-inner:before {
        bottom: -1.5em;
        left: -1.5em;
    }

    .box2-inner:after {
        bottom: -1.5em;
        right: -1.5em;
    }
</style>

<body class="bg-[#292826] flex items-center justify-center mx-auto">
    <div class="scooped-corners demo-element">
        <div class="box-wrapper my-20 mx-20">
            <div class="box p-10 flex justify-center items-center">
                <div class="box-inner">
                    <div class="scooped-corners2 demo-element2">
                        <div class="box2-wrapper"> <!-- Moved box2-wrapper here -->
                            <div class="box2 flex justify-center items-center p-10"> <!-- Removed absolute positioning -->
                                <div class="box2-inner text-center"> <!-- Removed absolute positioning -->
                                <h1 class="mb-5 font-semibold text-3xl text-white">Age restricted content</h1>
                        <h2 class="mb-14 text-lg text-white">You must be over 18 years old in order to <br /> continue with our website</h2>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="">
                            <input type="date" name="birthdate" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-14" placeholder="Select date">
                            <button type="submit" class="bg-white font-semibold text-black px-10 py-3 rounded-lg">Continue</button>
                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</html>
</body>
