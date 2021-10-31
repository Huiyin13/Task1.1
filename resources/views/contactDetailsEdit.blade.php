@extends('layouts.app')
@section('content')

        @foreach ($data as $all)
        <center>
        <form  action = "{{ route('updateDetails', $all->id) }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table>
            <tr>
				<td>Name: </td>
				<td><input type="text" name="name"  id="name" value="{{$all->name}}" required></td>
			</tr>
			<tr>
                <td>Gender:</td>
                @if ($all->gender == 'Male')
                <td><input type="radio" name="gender" id="gender" value="Male" checked> Male
                    <input type="radio" name="gender" id="gender" value="Female" > Female
                </td>
                @else
                <td><input type="radio" name="gender" id="gender" value="Male" > Male
                    <input type="radio" name="gender" id="gender" value="Female" checked> Female
                </td>
                @endif
            </tr>
            <tr> 
				<td>Phone Number: </td>
				<td><input type="text" name="phoneNo" id="phoneNo" value="{{$all->phoneNo}}" required></td>
			</tr>
            <tr>
				<td>Email: </td>
				<td><input type="email" name="email" id="email" value="{{$all->email}}" required></td>
			</tr>
		</table>
        
        @endforeach
    <br><br><br>
    
    <button type="submit" class="btn btn-primary" >Update</button> <a class="btn btn-info" onclick="location.href='/contactList'">Back</a>
    </center>
    </form>
@endsection
