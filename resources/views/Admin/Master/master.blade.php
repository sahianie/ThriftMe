<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ThriftMe</title>
    @include('Admin.Partial.Style')
    @yield('style')
    <style>

        #layoutSidenav_nav
        {
            background: linear-gradient(to bottom, #ff99b6, #af99ff);

        }
        .header
        {
            background-color:#ff99b6;
        }
        .footer
        {
            background-color:#af99ff;
        }
        .navbar-brand
        {
            color:#191645 ;

        }
        .navbar-brand:hover
        {
            color: #191645;

        }
        .fa-bars
        {
           color: #191645;
        }

        .sidecontent
        {
            color: #191645;
        }
        .sidecontent:hover
        {
            color: #191645;
        }
        .profile
        {
            color: #191645;
        }
        .profile:hover
        {
            background-color: #43CBAC;
            color:#191645;
        }
        .categoryBtn
        {
            background-color: #43CBAC;
            color:#191645 ;
            border-radius: 5px;
        }
        .categoryBtn:hover
        {
            background-color: #43CBAC;
            color:#191645 ;
        }
        .submitCategory
        {
            background-color: #191645;
            color: #43CBAC;
        }
        .submitCategory:hover
        {
            background-color: #191645;
            color: #43CBAC;
        }
        .categoryCard
        {
            background-color: #43CBAC;
            width: 70%;

        }

        .cardContainer
        {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .productContainer
        {
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .productCard
        {
            background-color: #43CBAC;
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
