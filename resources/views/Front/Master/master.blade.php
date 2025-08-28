<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>ThriftMe</title>
    <meta charset="UTF-8">
    <meta name="description" content="ThriftMe">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Front.Partial.Style')

    <style>
        footer {
            background-color: white;
            color: black;
            padding: 40px 0;
            font-size: 1em;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            flex-wrap: wrap;
        }

        .footer-section {
            flex: 1;
            margin: 10px 20px;
            text-align: center;
        }

        footer h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: white;
        }

        footer p,
        footer ul {
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
            color: black;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-links li a {
            font-size: 1.2em;
            color: black;
            transition: color 0.3s ease;
        }

        .social-links li a:hover {
            color: black;
        }

        .footer-bottom {
            background-color: #343a40;
            padding: 20px 0;
            color: black;
            font-size: 1em;
            text-align: center;
        }

        html,
        body {
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
            justify-content: center;
            align-items: center;
            height: 60px;
        }

        .site-logo span {
            font-size: 24px;
            font-weight: bold;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
    </style>

</head>

<body>

    @include('Front.Partial.Header')

    @yield('content')

    @include('Front.Partial.Footer')

    @include('Front.Partial.Script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sly/1.6.1/sly.min.js"></script>

    <script>
        $(document).ready(function() {
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
