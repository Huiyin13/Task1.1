@extends('layouts.app')
@section('content')
<html>

<style>
tr {
  text-align: center;
}
</style>

<body>

    @csrf
    
    <table border = 1 align = "center" width=70%>
        <tr style ="text-align: center">
            <th colspan=3>Name</th>
            <th>Gender</th>
            <th colspan=3>Phone Number</th>
            <th colspan=3>E-mail</th>
            <th colspan=3>Action</th>
        </tr>
        @foreach ($data as $all)
       
        <form  action = "{{ route('showDetails', $all->id) }}" method="post">
            <tr style ="text-align: center">
                <td colspan=3 >{{$all->name}}</td>
                <td>{{$all->gender}}</td>
                <td colspan=3>{{$all->phoneNo}}</td>
                <td colspan=3>{{$all->email}}</td>
                <td colspan=2><button class="btn btn-info" onclick="location.href='{{ route('showDetails', $all->id) }}'">Edit</button> <button class="btn btn-danger" onclick="location.href='{{ route('destroy', $all->id) }}'">Delete</button> </td>
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
        {{ $data->links('pagination::bootstrap-4') }}
    </div>

</body>
</html>
@endsection
