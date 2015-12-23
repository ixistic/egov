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
        if($user->is_boss == 0){
            $documents = Document::where('users.id', $user->id);
            $documents = $documents->join('users','users.id','=','officer_id');
        }else{
            $documents = Document::join('users','users.id','=','officer_id');
        }
        if(isset($query)){
            $documents = $documents->where('documents.name','LIKE', '%'.$query.'%');
        }
        $documents = $documents->select('documents.*', 'users.name as username');
        $documents = $documents->orderBy('updated_at', 'desc');
        $documents = $documents->paginate(15);
        return view('index', ['documents' => $documents,'user' => $user]);
    }

    public function showAddDocument(){
        return view('document/add');
    }

    public function showDetailDocument($id){
        $user = Auth::user();
        $document = Document::where(['id'=>$id])->first();
        $comments = Comment::where('document_id', $id);
        $comments = $comments->join('users','users.id','=','boss_id');
        $comments = $comments->select('comments.*', 'users.name as username');
        $comments = $comments->orderBy('updated_at', 'desc');
        $comments = $comments->get();
        return view('document/detail', ['document' => $document,'user' => $user,'comments' => $comments]);
    }

    public function showEditDocument($id){
        $user = Auth::user();
        $documents = Document::where(['id'=>$id])->first();
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
        if ($request->exists('file') && $request->exists('name')) {
            $user = Auth::user();
            $user_id = $user->id;
            $file = $request->file('file');
            $randomFolder = str_random(12);
            $fileName = $file->getClientOriginalName();
            $file->move(base_path() . '/public/file/'.$randomFolder.'/', $file->getClientOriginalName());
            Document::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => 'pre-request',
                'officer_id' => $user->id,
                'filename' => $fileName,
                'file_folder' => $randomFolder
            ]);
            return Redirect::route('documents')->with('success', 'Document added successful');
        }else{
            return Redirect::route('documents')->with('fail', 'Something wrong!!');
        }
    }

    public function editDocument(Request $request,$id){
        $oldDocument = Document::find($id);
        if ($request->exists('file')) {
            $file = $request->file('file');
            $randomFolder = str_random(12);
            $fileName = $file->getClientOriginalName();
            $file->move(base_path() . '/public/file/'.$randomFolder.'/', $file->getClientOriginalName());
        }else{
            $fileName = $oldDocument->filename;
            $randomFolder = $oldDocument->file_folder;
        }
        Document::where('id',$id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'pre-request',
            'filename' => $fileName,
            'file_folder' => $randomFolder
        ]);
        return Redirect::route('documents')->with('success', 'Document edited successful');
    }

    public function deleteDocument($id){
        $document = Document::find($id);
        if(isset($document)){
            Document::where('id',$id)->update(['status' => 'deleted']);
        }
        return Redirect::route('documents')->with('success', 'Document deleted successful.');
    }

}
