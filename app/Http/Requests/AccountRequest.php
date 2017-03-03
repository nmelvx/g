<?php namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'firstname' => 'required|max:255',
                    'lastname' => 'required|max:255',
                    'phone' => 'required|numeric',
                    'email' => 'required|email|max:255|unique:users',
                    'password' => 'required|min:6|confirmed',
                    'password_confirmation' => 'required|min:6',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'firstname' => 'required|max:255',
                    'lastname' => 'required|max:255',
                    'phone' => 'required|numeric',
                    'email' => 'required|max:255|unique:users,email,'.$this->get('id'),
                    'password' => 'required|min:6|confirmed',
                    'password_confirmation' => 'required|min:6',
                ];
            }
            default:break;
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
}