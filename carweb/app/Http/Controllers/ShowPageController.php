<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Profile;
use App\Recommend;
use GrahamCampbell\Markdown\Facades\Markdown;

class ShowPageController extends Controller
{
    //
    public function index(){
        $bannerlg = Banner::where('name','index-lg')->where('is_show',1)->first('imgurl');
        $bannersm = Banner::where('name','index-sm')->where('is_show',1)->first('imgurl');
        $carsrec = Recommend::where('is_show',1)->where('is_hot',0)->get();
        $carshot = Recommend::where('is_show',1)->where('is_hot',1)->get();
        //dd($bannersm['imgurl']);
        return view('showpages.index',['bannerlg'=>$bannerlg,'bannersm'=>$bannersm,'carsrec'=>$carsrec,'carshot'=>$carshot]);
    }

    public function carsafe(){
        $bannerlg = Banner::where('name','carsafe-lg')->where('is_show',1)->first();
        $bannersm = Banner::where('name','carsafe-sm')->where('is_show',1)->first();
        return view('showpages.carsafe',['bannerlg'=>$bannerlg,'bannersm'=>$bannersm]);
    }

    public function aboutus(){
        $bannerlg = Banner::where('name','profile-lg')->where('is_show',1)->first();
        $bannersm = Banner::where('name','profile-sm')->where('is_show',1)->first();

        $profile = Profile::get()->first();
        //dd($profile->description);
        $content=Markdown::convertToHtml($profile->description);
        //dd($content);
        return view('showpages.aboutus',['profile'=>$profile,'bannerlg'=>$bannerlg,'bannersm'=>$bannersm,'content'=>$content]);
    }
}


