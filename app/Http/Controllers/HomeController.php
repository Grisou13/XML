<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tracking;
use DOMDocument;
use Auth;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function uploadXml(Request $request)
    {
      libxml_disable_entity_loader(false);
      $file = $request->file("tracking_data");
      $dom = new DOMDocument;
      //$dom->validateOnParse = true;

      try{
        $dom->load($file->path(), LIBXML_DTDLOAD|LIBXML_DTDVALID);
        //dd($dom->getElementsByTagName("name")[0]);
        $user = $request->user();
        $path =  $file->store("/files/{$user->id}");
        $t = $request->user()->trackings()->create(["file_path" => $path, "url"=>url("storage/{$path}") ]);
        libxml_disable_entity_loader(true);
        return redirect()->to("/trackings/{$t->id}");
      }catch(\Exception $e){
        return redirect()->back()->with("errors","Le gpx contient des erreurs (".$e->getMessage().")");
      }



    }
    public function showXml(Request $request, Tracking $tracking)
    {
      return view("xml.show",compact("tracking"));
    }
    public function allXml()
    {
      return view("xml.all",["trackings"=>Auth::user()->trackings]);
    }
    public function addXml()
    {
      return view("xml.create");
    }
}
