<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ContactController extends Controller
{
    public function contactList()
    {
        $print = contact::paginate(5);
        return view('contactList', compact("print"));
    }

    public function addContact(Request $new)
    {
        $newD = new contact;
        $newD ->name = $new->name;
        $newD ->phoneNo = $new->phoneNo;
        $newD ->gender = $new->gender;
        $newD->email = $new->email;
        $newD ->save();

        $message = "Contact created.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $data = contact::all();
        return view('contactList',['print'=> $data]); 
    }

    public function showDetails($id)
    {
        $data = contact::where('id', $id)->get();
        return view('contactDetailsEdit', compact("data"));
    }

    public function updateDetails(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phoneNo' => 'required|max:255',
            'email' => 'required|max:255',
            'gender' => 'required|max:255',

        ]);
        contact::where('id', $id)->update($validatedData);
        $message = "Contact is successful updated.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $print = contact::all();
        return view('/contactList', compact("print"));
    }

    public function destroy($id)
    {
        $data = contact::find($id);
        $data->delete();
        return redirect('/contactList')->with('success', 'Contact is Deleted');
    }
}
