<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallerController extends Controller
{

    public function index()
    {
        $path = '/config/site/site_settings.json';
        $data = json_decode(file_get_contents(base_path($path)), true);

        if($data['installed'] != 1){
            return view('setup.installation');
        }

        // $data['car'] = "Change Manage Country";
        // $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
        // file_put_contents(base_path($path), stripslashes($newJsonString));

        return redirect('/');
    }

    public function store(request $request)
    {
        $path = '/config/site/site_settings.json';
        $data = json_decode(file_get_contents(base_path($path)), true);

        if($data['installed'] != 1){
            return view('setup.installation');
        }

        // $data['car'] = "Change Manage Country";
        // $newJsonString = json_encode($data, JSON_PRETTY_PRINT);
        // file_put_contents(base_path($path), stripslashes($newJsonString));
        dd($request);
        return redirect('/');
    }


}
