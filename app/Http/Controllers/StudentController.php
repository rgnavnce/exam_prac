<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

Class StudentController extends Controller {

private $request;
public function __construct(Request $request){
$this->request = $request;
}
    public function info(){
        $users = User::all();
        return response()->json($users, 200);
    }
    public function show(Request $request,$id)
    {
        //
        return User::where('studid','=',$id)->get();
    }
    public function student(Request $request ){
        $rules = [
        'studid' => 'required|max:20',
        'lastname' => 'required|alpha|max:20',
        'firstname' => 'required|alpha|max:20',
        'middlename' => 'required|alpha|max:20',
        'bday' => 'required|max:20',
        'age' => 'required|max:20',
        ];
        $this->validate($request,$rules);
        $user = User::create($request->all());
        return $user;
       
}
    public function update(Request $request,$id)
    {
    $rules = [
        'studid' => 'required|max:20',
        'lastname' => 'required|max:20',
        'firstname' => 'required|alpha|max:20',
        'middlename' => 'required|alpha|max:20',
        'bday' => 'required|max:20',
        'age' => 'required|max:20',
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());

    // if no changes happen
    if ($user->isClean()) {
    return $this->errorResponse('At least one value must
    change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $user->save();
    return $user;
}

    public function delete($id)
    {
    $user = User::findOrFail($id);
    $user->delete();}}