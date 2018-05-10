<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Validator;
use Illuminate\Support\Facades\Input;
use App\lib\Custom;
use App\lib\DBQuery;
use App\Order;
use DB;

class ServiceController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $services = Service::All();
        return view('service.allservicelist',compact('services'));
    }

    public function getServices()
    {   
            $services = Service::All();
            return view('service.allservicelist',compact('services'));
    }

    public function addService()
    {   
            return view('service.addnewservice');
    }

    public function saveAddService(Request $request)
    {

         return view('demo');
        $validator = Validator::make(Input::all(), Service::$rules);

        if($validator->fails()){
          return view('service.addnewservice')->withErrors($validator);
        }else{

            $service = DBQuery::saveService($request);
            $request->session()->flash('success', 'Service has been saved successfully!');
         return view('service.addnewservice');

        }
    }

    public function updateService($service_id)
    {    return view('demo');    
        $service = Service::where('id',$service_id)->first();
            return view('service.editservice',compact('service'));
    }

    public function saveUpdateService(Request $request)
    {       
          return view('demo');

        if(Service::find($request->service_id)->service_name==$request->service_name){
            $validator = Validator::make(Input::all(), Service::$updateNewRules);
        }else{
            $validator = Validator::make(Input::all(), Service::$updateRules);
        }

        if($validator->fails()){
          $service = Service::where('id',$request->service_id)->first();
          return view('service.editservice',compact('service'))->withErrors($validator);
        }else{
        Service::where('id',$request->service_id)
                ->update(array('service_name' => $request->service_name,'service_price' => $request->service_price));

            return redirect('admin/service-list');;
        }
    }

    public function activationService($service_id){

         return view('demo');
        $service = Service::find($service_id);
        if($service->active_status==0){
           Service::where('id',$service_id)
                ->update(array('active_status' => 1)); 
            }else{
                Service::where('id',$service_id)
                ->update(array('active_status' => 0)); 
            }
        return redirect('admin/service-list');;
    }


}
