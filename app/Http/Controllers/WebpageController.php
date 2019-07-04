<?php

namespace App\Http\Controllers;

use Storage;
use App\Http\Requests\WebpageStore;
use Illuminate\Http\Request;

class WebpageController extends Controller
{
    public function index()
    {
        $data = Storage::disk('local')->get('data.json');

        return view('webpage', compact('data'));
    }
    
    public function store(WebpageStore $request)
    {
        $data = $request->validated();
        $data['created_at'] = date("Y-m-d H:i:s");
        $data['created_at'] = date("d F Y h:i A");
        
        $fileInfo = Storage::disk('local')->exists('data.json') ? json_decode(Storage::disk('local')->get('data.json')) : [];

        array_push($fileInfo, $data);

        Storage::disk('local')->put('data.json', json_encode($fileInfo));

        return response()->json(['message' => 'Data captured successfully']);
    }
}
