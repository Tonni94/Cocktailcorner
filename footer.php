<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/split-type"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://kit.fontawesome.com/6eb243e274.js" crossorigin="anonymous"></script>

<style>
h2 {
    font-family: 'JosefinSans';
    letter-spacing: 1px;
}

footer a{
    font-family: 'JosefinSans';
    letter-spacing: 1px;
}
</style>
</head>


<footer class="relative bottom-0 bg-[#161616] pt-12 pb-6">
    <div class="container mx-auto px-4 text-white">
        <div class="flex flex-wrap text-left lg:text-left justify-between">
            <div class="flex flex-col logo h-24 w-24">
            <img src="img/cclogo.png" alt="Logo">
                <h2 class="text-sm mt-2 text-center">
                    Home of cocktails
                </h2>
            </div>
            <div class="w-full lg:w-6/12 px-4 sm:mt-24 md:mt-20 lg:mt-0">
                <div class="flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 ml-auto md:mb-8 sm:mb-8">
                        <span class="block uppercase text-md font-semibold mb-3">Company</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="hover:text-blueGray-800 block pb-2 text-sm" href="about_us.php">About Us</a>
                            </li>
                            <li>
                                <a class="hover:text-blueGray-800 block pb-2 text-sm" href="cocktails.php">Cocktails</a>
                            </li>
                            <li>
                                <a class="hover:text-blueGray-800 block pb-2 text-sm" href="#">Careers</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full lg:w-4/12">
                        <span class="block uppercase text-md font-semibold mb-3">Support</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="hover:text-blueGray-800 block pb-2 text-sm" href="terms_conditions.php">Terms &amp; Conditions</a>
                            </li>
                            <li>
                                <a class="hover:text-blueGray-800 block pb-2 text-sm" href="privacy_policy.php">Privacy Policy</a>
                            </li>
                            <li>
                                <a class="hover:text-blueGray-800 block pb-2 text-sm" href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-8 border-blueGray-300">
        <div class="flex flex-col items-center md:justify-between justify-center">
            <div class="flex items-center justify-center mt-6 lg:mb-0 mb-6">
                <button class="bg-white text-lightBlue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                    <i class="fab fa-twitter"></i></button><button class="bg-white text-lightBlue-600 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                    <i class="fab fa-facebook-square"></i></button><button class="bg-white text-pink-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                    <i class="fab fa-dribbble"></i></button><button class="bg-white text-blueGray-800 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2" type="button">
                    <i class="fab fa-github"></i>
                </button>
            </div>
            <div class="w-full md:w-4/12 px-4 mx-auto text-center mt-6">
                <div class="text-sm text-blueGray-500 font-semibold py-1">
                    Copyright © <span id="get-current-year">2024</span><a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank"> Toni Hyvönen
                </div>
            </div>
        </div>
    </div>
</footer>
