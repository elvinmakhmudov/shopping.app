<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\Orders\Registrar;
use App\Shop\Models\Product;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $this->middleware('auth', ['except' => ['create', 'store']]);
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
        $orders = $this->auth->user()->orders()->orderBy('created_at', 'desc')->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if ($this->auth->check()) {
            $user = $this->auth->user();
        }

        $product = Product::findOrFail($this->request->get('productId'));

        //return to the view
        return view('orders.create', compact('product', 'user'));
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

        //fetch the product
        $product = Product::findOrFail($this->request->input('product_id'));

        //store the order
        $this->registrar->create($this->request->all(), $product, $this->auth->user());

        //to stop form from resubmitting
        Session::put('_token', sha1(microtime()));

        return redirect()->route('orders.success', ['productId' => $product->id]);
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

    /**
     * If it succeded
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        $product = Product::findOrFail($this->request->input('productId'));

        //get the user
        $user = $this->auth->user();

        return view('orders.success', compact('product', 'user'));
    }
}
