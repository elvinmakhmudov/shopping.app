<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Services\Admin\Registrar;
use App\Services\Admin\Updaterar;
use App\Shop\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $registrar;
    /**
     * @var Updaterar
     */
    private $updaterar;

    public function __construct(Registrar $registrar, Updaterar $updaterar)
    {
        $this->registrar = $registrar;
        $this->updaterar = $updaterar;

        $this->middleware('admin', ['only' => ['index','create' ,'store']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = $this->registrar->validator($request->all());

        if ($validator->fails())
        {
            return redirect()->back();
        }

        $this->registrar->create($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = $this->updaterar->validator($request->all());

        if ($validator->fails())
        {
            return redirect()->back()->withErrors('something went wrong');
        }

        $user = User::findOrFail($id);

        $this->updaterar->update($request->all(), $user);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index');
    }

}
