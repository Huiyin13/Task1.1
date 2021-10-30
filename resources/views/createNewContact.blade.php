@extends('layouts.app')

@section('content')

<form action = "submit" method = "post">
    @csrf
    <table border = 0 align = "center">
        <tr>
            <td>Name:</td>
            <td><input type = "text" name = "name"  id="name" placeholder = "e.g. Tan Hui Yin" required></input></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><input type="radio" name="gender" id="gender" value="Male" required> Male
                <input type="radio" name="gender" id="gender" value="Female" required> Female
             </td>
        </tr>
        <tr>
            <td>Phone Number:</td>
            <td><input type = "text" name = "phoneNo" id="phoneNo" placeholder = "e.g. 0103908612" required></input></td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td><input type = "text" name = "email" id="email" placeholder = "e.g. xxx@gmail.com" required></input></td>
        </tr>
    </table>
    <br><br><br>
    <center>   
    <button type="submit" class="btn btn-primary">Submit</button> <a class="btn btn-info" onclick="location.href='home'">Back</a>
    </center>
</form>
@endsection
