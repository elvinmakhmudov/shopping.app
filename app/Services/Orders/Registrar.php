<?php namespace App\Services\Orders;

use Illuminate\Http\Request;
use App\Shop\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\File;
use Validator;

class Registrar
{
    use ValidatesRequests;

    /*j
     * Get a validator for an incoming registration request.
     *
     * @param Request $request
     */
    public function validator(Request $request)
    {
        return $this->validate($request, [
            'name' => 'required|max:255|alpha',
            'last_name' => 'required|max:255|alpha',
            'email' => 'required|email|max:255|unique:users',
            'telephone' => 'required|string',
            'address' => 'required|string|max:255',
            'message' => 'required|string',
            'product_id' => 'required|exists:products,id',
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
            $this->extractThumbnail($data['thumbnail'], $user);
        }

        return $user;
    }

    /**
     * Extract the thumbnail
     *
     * @param $thumbnail
     * @param User $user
     */
    public function extractThumbnail($thumbnail, User $user)
    {
        $path = public_path() . '/content/profile_pictures/' . $user->id;

        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $thumbnailName = time() . '-' . $thumbnail->getClientOriginalName();

        $thumbnail->move($path, $thumbnailName);

        $user->thumbnail = $thumbnailName;
        $user->save();
    }

}
