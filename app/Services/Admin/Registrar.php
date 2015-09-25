<?php namespace App\Services\Admin;

use App\Shop\Models\User;
use Illuminate\Support\Facades\File;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract
{

    /*j
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        //if is_admin wasn't send, make it false
        $data['is_admin'] = (isset($data['is_admin'])) ? !!($data['is_admin']) : false;
        return Validator::make($data, [
            'name' => 'required|max:255|alpha',
            'last_name' => 'required|max:255|alpha',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'is_admin' => 'boolean',
            'thumbnail' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    public function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'is_admin' => $data['is_admin']
        ]);
        if (isset($data['thumbnail'])) {
            $thumbnail = $data['thumbnail'];
            $path = public_path() . '/content/profile_pictures/' . $user->id;

            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $thumbnailName = time() . '-' . $thumbnail->getClientOriginalName();

            $thumbnail->move($path, $thumbnailName);

            $user->thumbnail = $thumbnailName;
            $user->save();
        }

        return $user;
    }

}
