<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ApiUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = Url::all();
        return response()->json($urls);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($original_url)
    {
        $valid_url = $request->validate([
            'long_url' => 'required|url',
        ]);

        if($valid_url){
            $url_exist = Url::where('long_url', $valid_url['long_url'])->first();
            if($url_exist){
                return response()->json(['warning' => 'This URL already exist'], 404);

            } else{
                $url = Url::create();
                $url->long_url = $valid_url['long_url'];
                $url->short_url = '/u='. substr(md5($url->long_url), 0, 6);
                $url->url_token = $request->_token;
                $url->save();
                return response()->json(['success' => 'URL saved successfully'], 200);
            }

        } else{
            return response()->json(['error' => 'URL not found'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($short_uri,$token)
    {
        $url = Url::where('short_url', $short_uri)->where('url_token', $token)->first();
        if($url)
        {
            return response()->json($url);
        }
        else
        {
            return response()->json(['error' => 'URL not found'], 404);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
