<html>
<head>
    <title>List Of Names</title>
</head>
<body>
<div>Name : {{$name}}</div>
<div>Designation : {{$designation}}</div>
<div>Mobile : {{$mobile}}</div>
<div>
    @if($available == 1)
    He is available.
    @else
    He is not available.
    @endif
</div>
</body>
</html>