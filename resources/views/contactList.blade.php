@extends('layouts.app')
@section('content')
<html>
<body>
    @csrf
    <table border = 1 align = "center">
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>E-mail</th>
            <th>Action</th>
        </tr>
        @foreach ($print as $all)
       
        <form  action = "{{ route('showDetails', $all->id) }}" method="post">
            <tr>
                <td>{{$all->name}}</td>
                <td>{{$all->gender}}</td>
                <td>{{$all->phoneNo}}</td>
                <td>{{$all->email}}</td>
                <td><button class="btn btn-info" onclick="location.href='{{ route('showDetails', $all->id) }}'">Edit</button> <button class="btn btn-danger" onclick="location.href='{{ route('destroy', $all->id) }}'">Delete</button> </td>
            </tr>
        </form>
        @endforeach
    </table>
    <br><br>
    <center>
    <a class="btn btn-info" onclick="location.href='createNewContact'">Create New Contact</a> <a class="btn btn-info" onclick="location.href='home'">Back</a>
    </center>
    <br>
    <div class="d-flex justify-content-center">
        {{ $print->links('pagination::bootstrap-4') }}
    </div>

</body>
</html>
@endsection
