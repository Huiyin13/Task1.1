@extends('layouts.app')

@section('content')
    @foreach($data as $row)
		<form  action = "{{ route('updateDetails', $row->id) }}" method="post">
		@csrf
				
		<table>
            <tr>
				<td>Name: </td>
				<td><input type="text" name="name"  id="name" value="{{$row->name}}" required></td>
			</tr>
			<tr>
                <td>Gender:</td>
                <td><input type="radio" name="gender" id="gender" value="{{$row->gender}}"> Male
                    <input type="radio" name="gender" id="gender" value="{{$row->gender}}"> Female
                </td>
            </tr>
            <tr> 
				<td>Phone Number: </td>
				<td><input type="text" name="phoneNo" id="phoneNo" value="{{$row->phoneNo}}" required></td>
			</tr>
            <tr>
				<td>Email: </td>
				<td><input type="text" name="email" id="email" value="{{$row->email}}" required></td>
			</tr>
		</table>
        
        @endforeach
    <br><br><br>
    <center>   
    <button type="submit" class="btn btn-primary">Edit</button> <a class="btn btn-info" onclick="location.href='contactList'">Back</a>
    </center>
</form>
@endsection
