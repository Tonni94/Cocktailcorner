<?php

@include 'config.php';
session_start();

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

<style>
  @font-face {

font-family: "JosefinSans"
src: url("fontit/JosefinSans-Regular.ttf")

font-family: "JosefinSansBold"
src: url("fontit/JosefinSans-Bold.ttf")
}

h1 {
    font-family: 'JosefinSans';
    letter-spacing: 2px;
}


</style>
</head>

<?php include_once('header.php');?>  

<body>
<section style="background-image: url('img/contactbg.jpg'); background-repeat: no-repeat; width: 100%; margin-top: -10rem; background-size: cover; height: 105vh; overflow: hidden;">
  <div style="width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center;">
   

    <div class="flex justify-center items-center w-screen h-screen">
	<div class="container mx-auto mb-40 mt-64 px-4 lg:px-32">
		<div class="w-full p-8 md:px-12 lg:pl-20 mr-auto rounded-2xl bg-neutral-900/[0.4]">
			<div class="flex">
				<h1 class="font-bold uppercase text-5xl text-white">Send us a <br /> message</h1>
			</div>
			<div class="grid grid-cols-1 gap-5 md:grid-cols-2 mt-5">
				<input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
            type="text" placeholder="First Name*" />
				<input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
            type="text" placeholder="Last Name*" />
				<input class="w-full bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
            type="email" placeholder="Email*" />
        </div>
				<div class="my-4">
					<textarea placeholder="Message*" class="w-full h-32 bg-gray-100 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"></textarea>
				</div>
				<div class="my-2 w-full lg:w-1/4">
					<button class="uppercase text-md font-bold tracking-wide bg-[#f9d342] text-[#292826] p-3 rounded-lg w-full 
                      focus:outline-none focus:shadow-outline">
            Send Message
          </button>
				</div>
      </div>
    </div>
</div>
</section>

<?php include_once('footer.php');?>
    
</body>
</html>