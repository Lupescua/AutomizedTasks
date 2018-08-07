<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\Mail\CommentReceived;
use Illuminate\Support\Facades\Mail;

class RegistrationForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //validate
        return [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed'
        ];
    }

    public function persist()
    {
    //create & save new user
    // $user=User::create(request(['name','email','password']));
    //it can be written better as:
    
    $user=User::create(
        $this->only(['name','email','password'])
    );

    //sign them in
    auth()->login($user);

    \Mail::to($user)->send(new CommentReceived($user));
    }
}
