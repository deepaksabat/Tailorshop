<?php

namespace App\Http\Controllers;

use App\About;
use App\AboutPrice;
use App\Contac;
use App\Footer;
use App\Member;
use App\Sericon;
use App\Service;
use App\ServiceFront;
use App\Slider;
use App\Statistic;
use App\Menu;
use App\Social;
use App\ShopInfo;
use App\Team;
use App\User;

class HomeController extends Controller
{
    
    public function frontIndex(){
    	
    	$menus      = Menu::All();
        $socials    = Social::All();
        $shop_name  = ShopInfo::find(1)->shop_name;
        $sliders = Slider::all();
        $about = About::latest()->first();
        $service_heading = ServiceFront::latest()->first();
        $service_items = Sericon::all();
        $contact_info = Contac::latest()->first();
        $footer = Footer::latest()->first();
        $services =Service::All();
        $statices = Statistic::All();
        $about_price = AboutPrice::latest()->first();
        $about_team = Team::latest()->first();
        $users = User::All();
        $members = Member::All();
        $menu = new Menu;
        $menu->id = 0;
        return view('front.index',compact('menus','menu','socials','shop_name','sliders','about','service_heading','service_items','contact_info','footer','services','statices','about_price','about_team','users','members'));

    }

     public function page($menu_id){
    	$menu      = Menu::find($menu_id);
    	$menus      = Menu::All();
        $socials    = Social::All();
        $shop_name  = ShopInfo::find(1)->shop_name;
        $sliders = Slider::all();
        $about = About::latest()->first();
        $service_heading = ServiceFront::latest()->first();
        $service_items = Sericon::all();
        $contact_info = Contac::latest()->first();
        $footer = Footer::latest()->first();
        $services =Service::All();
        $statices = Statistic::All();
        $about_price = AboutPrice::latest()->first();
        $about_team = Team::latest()->first();
        $users = User::All();
        $members = Member::All();

    	return view('front.page',compact('menu','menus','socials','shop_name','sliders','about','service_heading','service_items','contact_info','footer','services','statices','about_price','about_team','users','members'));

    }


}
