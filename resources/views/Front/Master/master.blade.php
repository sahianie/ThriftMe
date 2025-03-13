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

    </body>
</html>