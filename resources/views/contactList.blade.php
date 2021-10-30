@extends('layouts.app')
@section('content')

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
        <form  action = "contactList/{{$all->id}}" method="post">
            <tr>
                <td>{{$all->name}}</td>
                <td>{{$all->gender}}</td>
                <td>{{$all->phoneNo}}</td>
                <td>{{$all->email}}</td>
                <td><a class="btn btn-info" href="contactDetailsEdit/{{$all->id}}">Edit</a> <button type="submit" class="btn btn-danger">Delete</button> </td>
            </tr>
        </form>
        @endforeach
    </table>

@endsection