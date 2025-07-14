<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>ThriftMe</title>
	<meta charset="UTF-8">
	<meta name="description" content="ThriftMe">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@include('Front.Partial.Style')

<style>
	/* Footer Styles */


footer {
    background-color: white; /* Background color for footer */
    color: black; /* Text color */
    padding: 40px 0;
    font-size: 1em;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    flex-wrap: wrap; /* Enable wrapping for smaller screens */
}

.footer-section {
    flex: 1;
    margin: 10px 20px; /* Add space between sections */
    text-align: center; /* Center-align text for consistency */
}

footer h3 {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: white; /* Gold color for headings */
}

footer p, footer ul {
    font-size: 1.1em;
}

footer ul {
    list-style-type: none;
    padding: 0;
}

footer ul li {
    margin: 5px 0;
}

footer ul li a {
    text-decoration: none;
    color: black;
    transition: color 0.3s ease;
}

footer ul li a:hover {
    color: black; /* Hover color */
}

.social-links {
    display: flex;
    justify-content: center;
    gap: 15px; /* Add spacing between social links */
}

.social-links li a {
    font-size: 1.2em;
    color: black;
    transition: color 0.3s ease;
}

.social-links li a:hover {
    color: black; /* Hover color for social media links */
}

.footer-bottom {
    background-color: #343a40; /* Footer bottom background color */
    padding: 20px 0;
    color: black;
    font-size: 1em;
    text-align: center;
}

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
.hero-section {
    width: 100%;
    height: 100vh;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.header {
  display: flex;
  justify-content: center;  /* Centers horizontally (left to right) */
  align-items: center;      /* Centers vertically (top to bottom) */
  height: 60px;             /* Adjust the height of the header */
}

.site-logo span {
  font-size: 24px;  /* Adjust the size of the text */
  font-weight: bold; /* Make it bold */
  color: #fff;      /* Choose the text color */
  font-family: 'Arial', sans-serif; /* Choose a font */
}

</style>

</head>
<body>
	<!-- Page Preloder
	<div id="preloder">
		<div class="loader"></div>
	</div> -->
	
	@include('Front.Partial.Header')

	@yield('content')

	@include('Front.Partial.Footer')
	
    @include('Front.Partial.Script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sly/1.6.1/sly.min.js"></script>

<script>
$(document).ready(function() {
    // Rental Slider
    var $rentalFrame = $('.rental-slider');
    var $rentalSlidee = $rentalFrame.find('ul.slidee');

    $rentalFrame.sly({
        horizontal: 1,
        itemNav: 'basic',
        smart: 1,
        activateOn: 'click',
        mouseDragging: 1,
        touchDragging: 1,
        releaseSwing: 1,
        startAt: 0,
        scrollBy: 1,
        speed: 300,
        elasticBounds: 1,
        easing: 'easeOutExpo',
        dragHandle: 1,
        dynamicHandle: 1,
    });

    // Thrift Slider
    var $thriftFrame = $('.thrift-slider');
    var $thriftSlidee = $thriftFrame.find('ul.slidee');

    $thriftFrame.sly({
        horizontal: 1,
        itemNav: 'basic',
        smart: 1,
        activateOn: 'click',
        mouseDragging: 1,
        touchDragging: 1,
        releaseSwing: 1,
        startAt: 0,
        scrollBy: 1,
        speed: 300,
        elasticBounds: 1,
        easing: 'easeOutExpo',
        dragHandle: 1,
        dynamicHandle: 1,
    });
});
</script>

    </body>
</html>