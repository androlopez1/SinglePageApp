<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Validator;
use Response;
use App\Post;
use View;


class PeopleController extends Controller
{
    /**
    * @var array
    */
    protected $rules =
    [
        'name' => 'required|min:2|max:32|regex:/^[a-z ,.\'-]+$/i',
        'age' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i',
        'gender' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i',
        'mobile' => 'required|min:2|max:128|regex:/^[a-z ,.\'-]+$/i'

    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People::all();

        return view('people.index', ['people' => $people]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $people = new People();
            $people->title = $request->title;
            $people->content = $request->content;
            $people->save();
            return response()->json($people);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $people = People::findOrFail($id);

        return view('people.show', ['people' => $people]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
        } else {
            $people = People::findOrFail($id);
            $people->name = $request->name;
            $people->age = $request->age;
            $people->gender = $request->gender;
            $people->mobile = $request->mobile;
            $post->save();
            return response()->json($people);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $people = Post::findOrFail($id);
        $people->delete();

        return response()->json($people);
    }


    /**
     * Change resource status.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus() 
    {
        $id = Input::get('id');

        $people = People::findOrFail($id);
        $people->is_published = !$people->is_published;
        $people->save();

        return response()->json($people);
    }
}