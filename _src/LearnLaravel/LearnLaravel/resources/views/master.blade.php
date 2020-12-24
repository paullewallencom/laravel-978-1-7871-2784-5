<html>
<head>
    <title>Page Name - @yield('title')</title>
</head>
<body>
<div style="float: left;">
    @section('sidebar')
    <ul>
        <li>
            About Us
        </li>
        <li>
            Contact Us
        </li>
        <li>
            Reach Us
        </li>
        <li>
            Customer Care
        </li>
    </ul>
    @show
</div>
<div style="float: left;">
    @yield('content')
</div>
</body>
</html>
