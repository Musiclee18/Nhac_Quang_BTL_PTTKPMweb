<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Videos;
use App\Models\Nick;

class IndexController extends Controller
{
    public function home(){
        $slider = Slider::orderBy('id', 'DESC')->where('status',1)->get();

        $category = Category::orderBy('id', 'DESC')->get();

        return view('pages.home',compact('category','slider'));
    }
    public function dichvu(){
        $slider = Slider::orderBy('id', 'DESC')->where('status',1)->get();
        return view('pages.services',compact('slider'));
    }
    public function dichvucon($slug){
        $slider = Slider::orderBy('id', 'DESC')->where('status',1)->get();
        return view('pages.sub_services',compact('slug', 'slider'));
    }
    public function danhmuc_game($slug){
        $slider = Slider::orderBy('id', 'DESC')->where('status',1)->get();
        $category = Category::Where('slug', $slug)->first();
        return view('pages.category',compact('slider', 'category'));
    }
    public function acc($slug){
        $category = Category::where('slug', $slug)->first();
        $nicks = Nick::where('category_id', $category->id)->where('status',1)->paginate(16);
        $slider = Slider::orderBy('id', 'DESC')->where('status',1)->get();
        return view('pages.acc',compact('slug', 'slider','nicks', 'category'));
    }

    public function video_highlight(){
        $videos = Videos::orderBy('id','DESC')->where('status',1)->paginate(10);
        $slider = Slider::orderBy('id', 'DESC')->where('status',1)->get();
        return view('pages.video',compact('slider','videos'));
    }

}
