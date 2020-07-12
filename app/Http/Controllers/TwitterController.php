<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;

use App\TwitterModel;
use View;
use App\HasRoles;
use App\Roles;
use App\User;
//use auth;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Namecontrollers\Role;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Input;

use Spatie\Permission\Namecontrollers\Permission;

class TwitterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected $rules =
    [
        'content' => 'required|min:2|max:191',
        //'user_id' => 'required|min:2|max:255',
        //'created_at' => 'required|min:2|max:255',
        //'updated_at' => 'required|min:2|max:255',
        //regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ.,()_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ.,()_-]*)*)+$/

    ];

    public function index()
    {
        return view('Twitter.index', []);
    }
    public function consulta(Request $request)
    {
        $consulta_data = $request->get("consulta_data");
        if ($consulta_data == "") {
            $data = TwitterModel::with('user_id')->orderBy('created_at', 'desc')->paginate(5);
        } else {
            $data = TwitterModel::where("id", 1)
                ->orwhere("content", "like", "%" . $consulta_data . "%")->with('user_id')->orderBy('created_at', 'desc')
                ->paginate(20);
        }
        return response()->json($data);
    }
    public function create()
    {
        $data_foraneos = [
            "usuario_id" => auth()->user()->id,
            //"departamento_id" => DepartamentoModel::select("id_departamento as id","departamento as text")->get(),
        ];
        return response()->json($data_foraneos);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $Twitter = new TwitterModel();
            $Twitter->content = $request->content;
            $Twitter->user_id = auth()->user()->id;
            $Twitter->save();
            return response()->json($Twitter);
        }
    }
    public function show($id)
    {
        //return response()->json(TwitterModel::findOrFail($id));
        $data = TwitterModel::with('user_id')->findOrFail($id);
        return view('Twitter.show', ['twitter_id' => $data]);
    }


    public function edit($id)
    {
        return response()->json(TwitterModel::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $Twitter = TwitterModel::findOrFail($id);
            $Twitter->content = $request->content;
            $Twitter->user_id = $request->user_id;
            $Twitter->save();
            return response()->json($Twitter);
        }
    }

    public function destroy($id)
    {
        $Twitter = TwitterModel::findOrFail($id);
        $Twitter->delete();
        return response()->json($Twitter);
    }
}
