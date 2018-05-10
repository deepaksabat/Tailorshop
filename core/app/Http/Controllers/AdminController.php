<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Validator;
use Illuminate\Support\Facades\Input;
use App\lib\DBQuery;
use App\Order;
use App\Orderdetail;
use Auth;
use File;
use App\ShopInfo;
use App\User;
use Hash;
use Session;



class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    { 
        $orders = Order::All();
        $orderdetails = Orderdetail::All();
        $services = Service::All();
        $activeOrderQty = DBQuery::getOrdersByStatus($id = 1)->count();
        $deliveredOderQty = DBQuery::getOrdersByStatus($id = 2)->count();
        return view('dashboard',compact('orders','activeOrderQty','deliveredOderQty','orderdetails','services'));
    }

    public function resetPassword(){

        return view('auth.passwords.reset');
    }

    public function saveResetPassword(Request $request){

        return view('demo');
       $this->validate($request, [
           'current_password' =>'required',
           'password' => 'required|min:5|confirmed'
       ]);

       try {
           $c_password = Auth::User()->password;
           $c_id = Auth::User()->id;
           //return  $c_password;

           $user = User::findOrFail($c_id);

           if(Hash::check($request->current_password, $c_password)){

               $password = Hash::make($request->password);
               $user->password = $password;
               $user->save();
               return redirect()->back()->withSuccess('Password Changes Successfully.');
           }else{
               session()->flash('message', 'Password Not Match');
               Session::flash('type', 'warning');
               return redirect()->back();
           }

       } catch (\PDOException $e) {
           session()->flash('message', 'Some Problem Occurs, Please Try Again!');
           Session::flash('type', 'warning');
           return redirect()->back();
       }
    }

    public function getUsers()
    { 
        $users = User::All();
        return view('user.alluserlist',compact('users'));
    }


    public function setUserRole(Request $request)
    {
           if($request->role_id ==4){
               return 0;
           }else{
               User::where('id',$request->user_id)
                   ->update(array('is_permission' => $request->role_id));
           }

        return 0;
    }

    public function updateShopInfo()
    { 
        $shopinfo = ShopInfo::find(1);
        return view('updateShopInfo',compact('shopinfo'));
    }

     public function saveUpdateShopInfo(Request $request)
    {
        return view('demo');
        $validator = Validator::make(Input::all(), ShopInfo::$rules);
            if($validator->fails()){
            $shopinfo = ShopInfo::find(1);
              return view('updateShopInfo',compact('shopinfo'))->withErrors($validator);
        }else{
            $shopinfo = ShopInfo::find(1);
            $shopinfo->shop_name =      $request->shop_name;
            $shopinfo->shop_address =   $request->shop_address;
            $shopinfo->shop_email =     $request->shop_email;
            $shopinfo->color_code =     $request->color_code;
            $shopinfo->currency_text =  $request->currency_text;
            $shopinfo->shop_contact_number =  $request->shop_contact_number;
            if($request->hasFile('shop_image')){
               File::delete('assets/image/', $shopinfo->image);
               $imageName ='tailorlogo.'.'jpg';
               request()->shop_image->move('assets/image', $imageName);
               $shopinfo->image =  $imageName;
            }
        $shopinfo->save();
        return back()->with('success','Contact Info Updated successfully.');
        }
    }
}
