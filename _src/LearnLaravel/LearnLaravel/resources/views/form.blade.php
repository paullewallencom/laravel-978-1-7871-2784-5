<form method="POST" action="/formsubmit">
    {{ csrf_field() }}
    First name:<br>
    <input type="text" name="firstname"><br>
    Last name:<br>
    <input type="text" name="lastname">
    <input type="submit" value="Submit">
</form>