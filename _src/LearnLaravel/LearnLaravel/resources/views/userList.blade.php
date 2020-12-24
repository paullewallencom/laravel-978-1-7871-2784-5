<html>
<head>
    <title>List Of Names</title>
</head>
<body>
@foreach ($names as $name)
<p>This is {{ $name }}</p>
@endforeach

@php
    echo "They are the legends";
@endphp


@include('footer')
</body>
</html>