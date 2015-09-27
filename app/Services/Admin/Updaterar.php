<?php namespace App\Services\Admin;

use App\Shop\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;

class Updaterar
{
    use ValidatesRequests;

    /*j
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(Request $request)
    {
        return $this->validate($request, [
            'name' => 'sometimes|max:255|alpha',
            'last_name' => 'sometimes|max:255|alpha',
            'email' => 'sometimes|unique:users,email|max:255',
            'password' => 'sometimes|confirmed',
            'is_admin' => 'sometimes|boolean',
            'thumbnail' => 'sometimes|image|mimes:jpeg,bmp,png,jpg',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @param $user
     * @return User
     */
    public function update(array $data, User $user)
    {
        $updateArray = [];
        foreach ($data as $key => $value) {
            if ($value !== '') {
                switch ($key) {
                    case 'name':
                    case 'last_name':
                    case 'email':
                    case 'is_admin':
                        $updateArray[$key] = $value;
                        break;
                    case 'password':
                        $updateArray[$key] = bcrypt($value);
                        break;
                    case 'thumbnail':
                        $updateArray[$key] = $this->extractThumbnail($value, $user);
                        break;
                }
            }
        }

        $user->update($updateArray);

        return $user;
    }

    /**
     * Move the thumbnail to the specific place
     *
     * @param $thumbnail
     * @param User $user
     * @return string
     */
    private function extractThumbnail($thumbnail, User $user)
    {
        $path = public_path() . '/content/profile_pictures/' . $user->id;

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $thumbnailName = time() . '-' . $thumbnail->getClientOriginalName();

        $thumbnail->move($path, $thumbnailName);

        return $thumbnailName;
    }
}
