<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{

    public function index() {
        return view('front.registration.index');
    }

    public function store(Request $request) {

    $img = $_POST['image'];
    $folderPath = "photos/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    //$fileName = uniqid() . '.png';
    $fileName = $request->email . '.png';

  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
    print_r($fileName);


        // Validate the user
        $request->validate([
           'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // Save the data
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => 'Active',
        ]);

        // Sign the user in
        auth()->login($user);

        // Redirect to
		return redirect('/');

    }

}
