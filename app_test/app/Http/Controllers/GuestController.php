<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateFields;
use Validator;
use Redirect;
use Illuminate\Support\Facades\Input;

class GuestController extends Controller
{
	protected function getFields()
	{
		 $users=\App\User::get();
		 $data = array(
		 'guests'=>$users
		 );
		return view('guest.add')->with($data);
	}
	protected function postFields(ValidateFields $request)
	{
	
     $messages = array('min' => 'Campul :attribute este format din prea putine litere!',
            'max' => 'Campul :attribute este format din prea multe litere!',
            'required' => 'Campul :attribute este necesar!',
            'email'=>'Campul :attribute trebuie sa fie un email!'
        );
        $validation = Validator::make(Input::all(), $request->rules(), $messages);
        if ($validation->fails()) {
            return Redirect::to('/')->withErrors($validation);
        } else {
		$user = \App\User::create(
                             array(
									'name'=>Input::get('name'),
									'email'=>Input::get('email'),
									'message'=>Input::get('message'), 
									
                ));
				
		$user->save(); 
		 return Redirect::to('/')->withErrors($validation); 
        }
}
}
