<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocumentsController extends Controller
{
    const SAVE_DIRECTORY = "uploads";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return view("index",[]);
    }

    public function save(Request $request){
        $fileName = "";
        if ($request->hasFile('file')) {
            $fileName = $request->file('file')->getClientOriginalName().".".$request->file("file")->getExtension();

            $request->file('file')->move(self::SAVE_DIRECTORY,$fileName);
        }
        $document = new Document();

        $document->name = $fileName;
        $document->url = self::SAVE_DIRECTORY."/".$fileName;
        $document->user_id = 1;
        $document->save();
        return true;
    }

    public function delete($id){
        $document = Document::find($id);
        $document->delete();
    }

    public function get(){
        $documents = Document::all();
        return $documents;
    }

    public function getTrash(){
        return Document::onlyTrashed();
    }
    //
}
