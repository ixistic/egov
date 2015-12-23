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

class PasswordController extends Controller
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
        // if ($request->exists('file')) {
        //     $user = Auth::user();
        //     $user_id = $user->id;
        //     $file = $request->file('file');
        //     $randomFolder = str_random(12);
        //     $fileName = $file->getClientOriginalName();
        //     $file->move(base_path() . '/public/file/'.$randomFolder.'/', $file->getClientOriginalName());
        //     Document::create([
        //         'name' => $request->name,
        //         'description' => $request->description,
        //         'status' => 'pre-request',
        //         'officer_id' => $user->id,
        //         'filename' => $fileName,
        //         'file_folder' => $randomFolder
        //     ]);
        //     return Redirect::route('documents')->with('success', 'Document added successful');
        // }else{
        //     return Redirect::route('documents')->with('fail', 'Something wrong!!');
        // }
    }
}
