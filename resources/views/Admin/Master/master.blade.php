<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThriftMe</title>
    @include('Admin.Partial.Style')
    @yield('style')
    <style>
        #layoutSidenav_nav {
            background: linear-gradient(to bottom, #ff99b6, #af99ff);

        }

        .header {
            background-color: #ff99b6;
        }

        .footer {
            background-color: #af99ff;
        }

        .navbar-brand {
            color: black;

        }

        .navbar-brand:hover {
            color: black;

        }

        .fa-bars {
            color: black;
        }

        .sidecontent {
            color: black;
        }

        .sidecontent:hover {
            color: black;
        }

        .profile {
            color: #af99ff;
        }

        .profile:hover {
            background-color: #ff99b6;
            color: #af99ff;
        }

        .categoryBtn {
            background-color: #ff99b6;
            color: #af99ff;
            border-radius: 5px;
        }

        .categoryBtn:hover {
            background-color: #ff99b6;
            color: black;
        }

        .submitCategory {
            background-color: #af99ff;
            color: black;
        }

        .submitCategory:hover {
            background-color: #af99ff;
            color: black;
        }

        .categoryCard {
            background-color: #ff99b6;
            width: 70%;

        }

        .cardContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .productContainer {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .productCard {
            background-color: #ff99b6;
            width: 70%;
            margin-bottom: 50px;
            margin-top: 50px;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    @include('Admin.Partial.Header')
    <div id="layoutSidenav">
        @include('Admin/Partial/Sidebar')
        <div id="layoutSidenav_content">
            @yield('content')
            @include('Admin.Partial.Footer')
        </div>
    </div>

    @include('Admin.Partial.Script')
    @yield('script')
</body>

</html>
