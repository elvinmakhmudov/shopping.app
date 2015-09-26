<?php namespace App\Services\Admin;

use App\Shop\Models\User;
use Illuminate\Support\Facades\File;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Updaterar
{

    /*j
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255|alpha',
            'last_name' => 'required|max:255|alpha',
            'email' => 'required|email|max:255',
            'password' => 'confirmed',
            'is_admin' => 'required|boolean',
            'thumbnail' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @param $user
     * @return User
     */
    public function update(array $data, $user)
    {
        $user->update([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'is_admin' => $data['is_admin']
        ]);
        //if the password is sent, save it
        if (isset($data['password'])) {
            $user->password = bcrypt($data['password']);
            $user->save();
        }
        //if the thumbnail is sent, make it profile picture
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
