<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function get_all_urls()
    {
        $urls = Url::all();
        return response()->json($urls);
    }

    public function index()
    {
        $urls = Url::orderBy('created_at', 'DESC')->get();//paginate(5);
        $total_links = Url::count();
        $total_clicks = Url::sum('hits');
        return view('welcome', compact('urls', 'total_links', 'total_clicks'));
    }

    public function open_url(Request $request)
    {
        $short_url = $request->short_url;
        $url_token = $request->url_token;
        $url = Url::where('short_url', $short_url)->where('url_token', $url_token)->first();
        if($url)
        {
            $url->hits = $url->hits + 1;
            $url->save();
            return redirect($url->long_url);
        }
        else
        {
            return redirect('/');
        }
    }

    public function create(Request $request)
    {

        $valid_url = $request->validate([
            'long_url' => 'required|url',
        ]);

        if($valid_url){
            $url_exist = Url::where('long_url', $valid_url['long_url'])->first();
            if($url_exist){
                return redirect('/')->with('warning', 'This URL already exist');
            } else{
                $url = Url::create();
                $url->long_url = $valid_url['long_url'];
                $url->short_url = '/u='. substr(md5($url->long_url), 0, 6);
                $url->url_token = $request->_token;

                $url->save();
                return redirect('/')->with('success', 'URL saved successfully');
            }

        } else{
            return redirect('/')->with('fail', 'Please enter a valid URL');
        }


        // dd($url->short_url);

    }

    public function destroy($request)
    {
        Url::where('id', $request)->delete();
        return redirect('/');
    }

    public function deleteAll()
    {
        Url::truncate();
        return redirect('/');
    }
}
