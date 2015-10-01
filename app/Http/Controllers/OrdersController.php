<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\Orders\Registrar;
use App\Shop\Models\Product;
use App\Shop\Models\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{

    /**
     * @var Request
     */
    private $request;
    /**
     * @var Guard
     */
    private $auth;
    /**
     * @var Registrar
     */
    private $registrar;

    public function __construct(Request $request, Guard $auth, Registrar $registrar)
    {
        $this->middleware('auth', ['except' => 'create']);
        $this->request = $request;
        $this->auth = $auth;
        $this->registrar = $registrar;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $userId
     * @return Response
     */
    public function create($userId)
    {
        //check if the authenticated user is the one who sent the request
        if ((int)$userId !== $this->auth->id()) {
            return abort(404);
        }
        //create the order
        $product = Product::findOrFail($this->request->get('productId'));

        //return to the view
        return view('orders.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //validate the input
        $this->registrar->validator($this->request);
        //store the order
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
