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
font-family: "DancingScript";
src: url("fontit/DancingScript-Regular.otf");

font-family: "DancingScriptBold";
src: url("fontit/DancingScript-Bold.otf");

font-family: "JosefinSans"
src: url("fontit/JosefinSans-Regular.ttf");

font-family: "JosefinSansBold"
src: url("fontit/JosefinSans-Bold.ttf");
}

h1 {
    font-family: 'DancingScriptBold';
}

h2 {
    font-family: 'JosefinSans';
    letter-spacing: 1px;
}

p {
    font-family: 'JosefinSans';
    letter-spacing: 1px;
}

.thirdsection {
    background-image: url("img/bar.jpg");
    background-size: cover;
    background-repeat: no-repeat;
}

.carousel {
   box-shadow: 0px 1px 6px rgba(0, 0, 0, 0.64);
}

.carousel-open:checked + .carousel-item {
    position: static;
    opacity: 100;
}


.carousel-item.active {
    opacity: 1;
}

.carousel-bullet.active {
    color: #292826; 
}

.cssbuttons-io-button button {
    font-family: 'JosefinSans';
    letter-spacing: 1px;
}

.cssbuttons-io-button {
  background: #f9d342;
  padding: 0.35em;
  padding-left: 1.2em;
  font-size: 17px;
  font-weight: 500;
  border-radius: 0.9em;
  letter-spacing: 0.05em;
  display: flex;
  align-items: center;
  box-shadow: inset 0 0 1.6em -0.6em #4e505b;
  overflow: hidden;
  position: relative;
  height: 3em;
  padding-right: 3.3em;
  cursor: pointer;
}

.cssbuttons-io-button .icon {
  background: white;
  margin-left: 1em;
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 2.2em;
  width: 2.2em;
  border-radius: 0.7em;
  right: 0.3em;
  transition: all 0.3s;
}

.cssbuttons-io-button:hover .icon {
  width: calc(100% - 0.6em);
}

.cssbuttons-io-button .icon svg {
  width: 1.1em;
  transition: transform 0.3s;
  color: #292826;
}

.cssbuttons-io-button:hover .icon svg {
  transform: translateX(0.1em);
}

.cssbuttons-io-button:active .icon {
  transform: scale(0.95);
}

</style>
</head>

<?php include_once('header.php');?>  

<body class="bg-[#292826]">

    <!--Banneri alkaa-->
    <section style="background-image: url('img/bannerimg.jpg'); background-repeat: no-repeat; width: 100%; margin-top: -10rem; background-size: cover; height: 105vh; overflow: hidden;">
    <div style="width: 100%; height: 100%; backdrop-filter: blur(5px); background-color: rgba(0, 0, 0, 0.5);">
        <!-- Tähän voit lisätä muun sisällön -->
        <div class="flex max-w-[1300px] mx-auto h-screen justify-center pt-20">
            <!-- Vasen sarake -->
            <div class="w-3/5 flex flex-col justify-center items-start text-white pl-10">
                <h1 class="animate-heading text-9xl mb-4 sm:text-7xl md:text-8xl lg:text-9xl xl:text-9xl 2xl:text-9xl">Cocktail Corner</h1>
                <p class="animate-paragraph text-xl mb-6">Welcome to the home of drinks</p>
                <a href="cocktails.php" class="animate-button px-8 py-4 bg-[#f9d342] text-[#292826] text-xl rounded-lg font-bold hover:bg-white inline-flex items-center justify-center">
    Our cocktails
</a>
    </div>
        <!-- Oikea sarake -->
    <div class="w-2/3 flex flex-col justify-center items-center pt-10">
    <img src="img/bannerbubble1.png" alt="Kuva" class="bannerbubbles" style="margin-left: auto; padding-top: 5rem; padding-right: 1rem;"/>          
    <img src="img/bannerbubble2.png" alt="Kuva" class="bannerbubbles w-52 sm:w-64 md:w-72 lg:w-80 xl:w-80" style="margin-right:auto; margin-bottom: -6rem; margin-top: -9rem;"/>
    <img src="img/bannerbubble4.png" alt="Kuva" class="bannerbubbles w-48 sm:w-48 md:w-48 lg:w-60 xl:w-64" style="margin-left: auto; padding-bottom: 5rem; margin-right: 2.5rem;"/>
</div>

    </div>
</div>
</section>


<!--Second section-->
<div class="triggerDiv flex justify-center items-center bg-black" style="height: 98vh;">
    <div id="animationContainer" class="section2 relative w-full h-full overflow-hidden flex flex-col justify-center items-center">

        <!-- Middle Image, no animation -->
        <img id="staticImage" src="img/section22.png" alt="Static Image" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10">

        <!-- Animated image that glides to left -->
        <img id="glidingImageLeft" src="img/section25.png" alt="Left Glide Image" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-0">

        <!-- Animated image that glides to right -->
        <img id="glidingImageRight" src="img/section25.png" alt="Right Glide Image" class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-0">

        <!-- Texts and button -->
        <div id="loadingScreen" class="hidden fixed top-0 left-0 w-screen h-screen bg-black bg-opacity-50 flex items-center justify-center z-50">
    <img src="img/loading.gif" alt="Loading...">
</div>

<div class="flex flex-col items-center justify-center text-white bg-opacity-50 rounded-lg p-7 z-30 bg-neutral-950/[.50]">
    <h2 class="animate-heading2 text-center text-4xl">Looking for something new and tasty?</h2>
    <h2 class="animate-heading2 text-center pt-4 text-xl ">Try our randomized cocktail generator</h2>
    <button id="generateButton" class="cssbuttons-io-button text-[#292826] font-bold mt-4">
        Generate me!
        <div class="icon inline-block ml-2">
            <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0h24v24H0z" fill="none"></path>
                <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path>
            </svg>
        </div>
    </button>
</div> <!--Random cocktail generator-->
    </div>
</div>


<!-- Third Section -->
<section class="thirdsection flex justify-center items-center overflow-hidden min-h-screen">
    <div class="flex bg-neutral-950/[.50] max-w-[955px] w-full h-[450px]"> 
    <div class="relative flex-col items-start p-8 text-white flex-1">
    <hr class="w-16 h-px mb-2">
    <h2 class="text-4xl mb-4">Our weekly recommendations</h2>
    <p class="text-lg mb-44">For you to enjoy</p>
    <div class="slide-content absolute bottom-0 py-8 w-full flex items-center justify-between z-10 max-w-[360px]">
        <h2 class="text-white text-2xl">Mojito</h2>
        <a href="recipe1.php" class="btn bg-[#f9d342] hover:bg-white text-[#292826] font-semibold rounded-lg py-2 px-6 bottom-0">Recipe</a>
    </div>
    </div>
        
        <div class="relative z-2 max-w-[650px]">
    <div class="carousel relative overflow-hidden">
        <div class="carousel-inner relative flex items-center justify-center">
            <!-- Slide 1 -->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden checked="checked">
            <div class="carousel-item absolute w-full opacity-100 transition-opacity duration-1000 ease-out">
                <img src="img/mojito.png" alt="mojito" class="object-cover h-[450px] w-[530px]">
            </div>
            <!-- Slide 2 -->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden>
            <div class="carousel-item absolute w-full opacity-0 transition-opacity duration-1000 ease-out">
                <img src="img/aperol.png" alt="aperol" class="object-cover h-[450px] w-full">
            </div>
            <!-- Slide 3 -->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden>
            <div class="carousel-item absolute w-full opacity-0 transition-opacity duration-1000 ease-out">
                <img src="img/oldfashioned.png" alt="oldfashioned" class="object-cover h-[450px] w-full">
            </div>
        </div>
                <!-- Carousel controls -->
                <div class="carousel-controls absolute top-1/2 flex items-center justify-between w-full">
                    <button class="prevBtn text-white text-4xl ml-3 bg-neutral-950/[.50] px-2 pb-2.5 -mt-2.5 rounded-full">&#8249;</button>
                    <button class="nextBtn text-white text-4xl mr-3 bg-neutral-950/[.50] px-2 pb-2.5 -mt-2.5 rounded-full">&#8250;</button>
                </div>
                <!-- Carousel indicators -->
                <ol class="carousel-indicators flex justify-center absolute bottom-0 left-0 right-0 mb-1 list-none z-10 max-w-40 mx-auto z-2">
                    <li>
                     <button class="carousel-bullet text-white cursor-pointer text-4xl">&#8226;</button>
                     <button class="carousel-bullet text-white cursor-pointer text-4xl">&#8226;</button>
                     <button class="carousel-bullet text-white cursor-pointer text-4xl">&#8226;</button>
                </li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--Kolmas sektio end-->

<!--Banner text animation-->

<script>
   // SplitType and gsap animations for first set of elements
   let typeSplit1 = new SplitType('.animate-heading, .animate-paragraph, .animate-button, .bannerbubbles', {
       types: 'lines, words, chars, image',
       tagName: 'span'
   });

   gsap.from('.animate-heading, .animate-paragraph, .animate-button, .bannerbubbles', {
       y: '-120%',
       opacity: 0,
       duration: 1,
       ease: 'Power4.easeOut',
       stagger: 0.3
   });
</script>

<script>
    //Toisen section animaatiot
    // SplitType and gsap animations for the second set of elements
    let typeSplit2 = new SplitType('.animate-heading2, .animate-button2', {
        types: 'lines, words, chars',
        tagName: 'span'
    });

    const tlSplit2 = gsap.timeline({ defaults: { ease: 'Power4.easeOut' } });

    tlSplit2.from('.animate-heading2', {
        y: '-100%',
        opacity: 0,
        duration: 2.1,
        stagger: 0.3
    });

    // GSAP animations for section2
    const tlSection2 = gsap.timeline({ defaults: { ease: "power2.inOut" } });
    tlSection2.fromTo("#glidingImageLeft", { x: "0%", opacity: 0 }, { x: "-50%", opacity: 1, duration: 0.7 },);
    tlSection2.fromTo("#glidingImageRight", { x: "0%", opacity: 0 }, { x: "50%", opacity: 1, duration: 0.7 }, "-=0.7");

    // GSAP animation for the button
    const tlButton = gsap.timeline({ defaults: { ease: 'Power4.easeOut' } });
    tlButton.from('.animate-button2', {
        y: '100%',
        opacity: 0,
        duration: 2.1,
        stagger: 0.3
    });

    // Add the button animation to the main timeline
    tlSection2.add(tlButton, 0); // Add the button animation at the beginning of the timeline

    // Intersection Observer for section2
    const animationContainer = document.getElementById('animationContainer');
    const objOptions = {
        root: null,
        threshold: 0.3,
        rootMargin: "-100px",
    };

    const sectionObserver = new IntersectionObserver(callBackFunction, objOptions);
    sectionObserver.observe(animationContainer);

    function callBackFunction(entries) {
        const [entry] = entries;
        if (entry.isIntersecting) {
            tlSection2.play(); // Play the animation when the section is in view
            tlSplit2.play(); // Play the text animations when the section is in view
        } else {
            tlSection2.reverse(); // Reverse the animation when the section is out of view
            tlSplit2.reverse(); // Reverse the text animations when the section is out of view
        }
    }
</script>


<?php include_once('footer.php');?>


<!--Section 2 Carousel -->
<script>
    const prevBtn = document.querySelector('.prevBtn');
    const nextBtn = document.querySelector('.nextBtn');
    const carouselItems = document.querySelectorAll('.carousel-item');
    const carouselBullets = document.querySelectorAll('.carousel-bullet');
    const slideContent = document.querySelector('.slide-content');
    const recipeButton = slideContent.querySelector('a');

    let currentItem = 0;

    function showSlide(index) {
        carouselItems.forEach((item, i) => {
            if (i === index) {
                item.style.opacity = 1;
            } else {
                item.style.opacity = 0;
            }
        });
    }

    function updateIndicator(index) {
        carouselBullets.forEach((bullet, i) => {
            if (i === index) {
                bullet.classList.add('active');
            } else {
                bullet.classList.remove('active');
            }
        });
    }
// Change text and button link
    function updateSlideContent(index) {
        const slideTitles = ['Mojito', 'Aperol Spritz', 'Old Fashioned'];
        const recipeLinks = ['classic_mojito.php', 'aperol_spritz.php', 'old_fashioned.php'];

        slideContent.querySelector('h2').textContent = slideTitles[index];
        recipeButton.href = recipeLinks[index];
    }

    prevBtn.addEventListener('click', () => {
        currentItem = (currentItem - 1 + carouselItems.length) % carouselItems.length;
        showSlide(currentItem);
        updateIndicator(currentItem);
        updateSlideContent(currentItem);
    });

    nextBtn.addEventListener('click', () => {
        currentItem = (currentItem + 1) % carouselItems.length;
        showSlide(currentItem);
        updateIndicator(currentItem);
        updateSlideContent(currentItem);
    });

    carouselBullets.forEach((bullet, index) => {
        bullet.addEventListener('click', () => {
            currentItem = index;
            showSlide(currentItem);
            updateIndicator(currentItem);
            updateSlideContent(currentItem);
        });
    });

    // Show the initial slide
    showSlide(currentItem);
    updateIndicator(currentItem);
    updateSlideContent(currentItem);
</script>

<!--Random coktail generator-->

<script>
    document.getElementById('generateButton').addEventListener('click', function() {
        // Show loading screen
        document.getElementById('loadingScreen').classList.remove('hidden');

        // Array of PHP pages with cocktail recipes
        var cocktailPages = [
            'gin_tonic.php',
                'peach_old_fashioned.php',
                'roku_gin_sonic.php',
                'cruzan_confusion.php',
                'cucumber_cooler.php',
                'french75.php',
                'gimlet.php',
                'gin_basil_smash.php',
                'haku_highball.php',
                'handsome_ginger.php',
                'hot_toddy.php',
                'independence_spice.php',
                'japanese_gin_sour.php',
                'jim_beam_lemonade.php',
                'kentucky_mule.php',
                'last_word.php',
                'mai_tai.php',
                'melon_berry_mist.php',
                'melon_cooler.php',
                'moscow_mule.php',
                'peach_daiquri.php',
                'peach_iced_tea.php',
                'sipsmith_martini.php',
                'sloe_gin_fizz.php',
                'tokyo_collins.php',
                'tom_collins.php',
                'vodka_lemonade.php',
                'watermelon_mai_tai.php',
                // Add more pages as needed
        ];

        // Generate a random index
        var randomIndex = Math.floor(Math.random() * cocktailPages.length);

        // Get the random page URL
        var randomPage = cocktailPages[randomIndex];

        // Redirect the user to the random page after a short delay
        setTimeout(function() {
            window.location.href = randomPage;
        }, 2000); // 2000 milliseconds (2 seconds) delay for demonstration purposes
    });
</script>



</body>
</html>

