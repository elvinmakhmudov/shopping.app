<?php namespace App\Services\Orders;

use App\Shop\Models\Order;
use App\Shop\Models\Product;
use Illuminate\Http\Request;
use App\Shop\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\File;
use Validator;
use Illuminate\Contracts\Auth\Guard;

class Registrar
{
    use ValidatesRequests;

    /**
     * @var Guard
     */
    private $auth;

    public function __construct(Guard $auth)
    {

        $this->auth = $auth;
    }

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
     * @param Product $product
     * @return User
     */
    public function create(array $data, Product $product)
    {
        $order = Order::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'address' => $data['address'],
            'message' => $data['message'],
        ]);

        $order->product()->associate($product)->save();

        return $order;
    }
}
