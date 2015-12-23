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

class CommentController extends Controller
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

    protected function postComment(Request $request)
    {
        if ($request->exists('comment')) {
          if($request->exists('approve')) {
            $user = Auth::user();
            $user_id = $user->id;
            $document_id = $request->document_id;

            Document::where('id',$document_id)->update([
                'status' => 'approved',
            ]);
            Comment::create([
                'comment' => $request->comment,
                'boss_id' => $user->id,
                'document_id' => $document_id
            ]);
            return Redirect::route('documents')->with('success', 'Document approved successful');
          }
          else if($request->exists('decline')){
            $user = Auth::user();
            $user_id = $user->id;
            $document_id = $request->document_id;

            Document::where('id',$document_id)->update([
                'status' => 'declined',
            ]);
            Comment::create([
                'comment' => $request->comment,
                'boss_id' => $user->id,
                'document_id' => $document_id
            ]);
            return Redirect::route('documents')->with('success', 'Document declined successful');
          }
        }else{
            return Redirect::route('documents')->with('fail', 'Something wrong!!');
        }
    }
}
