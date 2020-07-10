<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Gallery;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $testimoni = Slider::all();
        $news = News::with('category')->take(3)->orderBy('created_at','desc')->get();
        
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

        return view('welcome',compact('cms','testimoni', 'news'));
    }

    public function listBerita(Request $request)
    {
        $getCms = Cms::all();
        $cmsArr = [];
        foreach ($getCms->toArray() as $key => $cms) {
            $data = [
                $cms['cms_name'] => $cms['content'],
            ];
            $cmsArr = array_merge($cmsArr, $data);
        }
        $cms = $cmsArr;
        if($request->category != null)
        {
            $news = News::with('category')->where('category_id',$request->category)->orderBy('created_at', 'desc')->paginate(5);
        }
        else
        {
            $news = News::with('category')->orderBy('created_at', 'desc')->paginate(5);
        }
        $category = NewsCategory::all();
        return view('listberita', compact('cms','news','category'));
    }

    public function detailBerita($slug)
    {
        $getCms = Cms::all();
        $cmsArr = [];
        foreach ($getCms->toArray() as $key => $cms) {
            $data = [
                $cms['cms_name'] => $cms['content'],
            ];
            $cmsArr = array_merge($cmsArr, $data);
        }
        $cms = $cmsArr;
        $category = NewsCategory::all();
        $news = News::with('category')->where('slug', $slug)->first();
        return view('detail', compact('cms', 'news', 'category'));
    }

    public function documentation()
    {
        $getCms = Cms::all();
        $cmsArr = [];
        foreach ($getCms->toArray() as $key => $cms) {
            $data = [
                $cms['cms_name'] => $cms['content'],
            ];
            $cmsArr = array_merge($cmsArr, $data);
        }
        $cms = $cmsArr;
        
        $gallery = Gallery::all();
        return view('documentation', compact('cms', 'gallery'));
    }
}
