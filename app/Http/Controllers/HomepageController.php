<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cms;
use Illuminate\Support\Collection;
class HomepageController extends Controller
{
    public function index()
    {
        $getCms = Cms::all();
        $cmsArr = [];
        foreach($getCms->toArray() as $key => $cms)
        {
            $data = [
                 $cms['cms_name'] => $cms['content'],
            ];
            $cmsArr = array_merge($cmsArr,$data);
        }
        $cms = $cmsArr;

        return view('welcome',compact('cms'));
    }
}
