<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use Auth;
use App\User;
use App\Document;
use App\Comment;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showDocument()
    {
        $user = Auth::user();
        $query = Input::get('search');
        $documents = Document::join('users','users.id','=','officer_id');
        if($user->is_boss == 1){
          $documents = $documents->where('users.id', $user->id);
        }
        if(isset($query)){
          $documents = $documents->where('documents.name','LIKE', '%'.$query.'%');
        }
        $documents = $documents->select('documents.*', 'users.name as username');
        $documents = $documents->get();
        return view('index', ['documents' => $documents,'user' => $user]);
    }

    public function showAddDocument(){
        return view('document/add');
    }

    public function showDetailDocument($id){
        $user = Auth::user();
        $documents = Document::where(['id'=>$id,'officer_id'=>$user->id])->first();
        return view('document/detail', ['documents' => $documents,'user' => $user]);
    }

    public function showEditDocument($id){
        $user = Auth::user();
        $documents = Document::where(['id'=>$id,'officer_id'=>$user->id])->first();
        return view('document/edit', ['documents' => $documents,'user' => $user]);
    }

    protected function validator(Request $request)
    {
        return Validator::make($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'file' => 'required'
        ]);
    }

    protected function postDocument(Request $request)
    {
        if ($request->exists('file')) {
            $user = Auth::user();
            $user_id = $user->id;
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $fileName = str_random(12).'.'.$ext;
            $file->move(base_path() . '/public/file/', $fileName);
            Document::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => 'pre-request',
                'officer_id' => $user->id,
                'pic_path' => $fileName
            ]);
            return Redirect::route('documents')->with('message', 'Document added!');
        }else{
            return Redirect::route('documents')->with('message', 'Something wrong!!');
        }
    }

    public function editDocument(Request $request,$id){
        if ($request->hasFile('file')) {
            $user = Auth::user();
            $user_id = $user->id;
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
            $fileName = str_random(12).'.'.$ext;
            $file->move(base_path() . '/public/file/', $fileName);
            Document::where('id',$id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => 'pre-request',
                'officer_id' => $user->id,
                'filename' => $fileName
            ]);
            return Redirect::route('documents')->with('message', 'Document edited!');
        }else{
            return Redirect::route('documents')->with('message', 'Something wrong!!');
        }
    }

    public function deleteDocument($id){
        $document = Document::find($id);
        if(isset($document)){
            Document::where('id',$id)->update(['status' => 'deleted']);
        }
    }

}
