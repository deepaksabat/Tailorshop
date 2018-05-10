<?php 
namespace App\lib;

use Users\User;
use Auth;
use App\Order;
use DateTime;
use format;
use App\Service;
use DB;

class Custom
{

	public function __construct()
    {
    		$year = date("y");
	    	$user = Auth::user()->id;
	    	$service_activity= Order::All()->last();
            if ($service_activity==null) {
               $service_activityid=1;
               $invRef = $year.$user.$service_activityid;
            }else{
               $invRef = $year.$user.$service_activityid;
            }
	    	
        return $invRef;
    }

    public static function  orderRef () {
    		$year = date("y");
	    	$user = Auth::user()->id;
	    	$service_activity= Order::All()->last();
            if ($service_activity==null) {
               $service_activityid=1;
               $invRef = $year.$user.$service_activityid;
            }else{
            	$service_activityid = $service_activity->id + 1;
               	$invRef = $year.$user.$service_activityid;
            }
    	return $invRef;
    }
    public static function dateConvertor($date){
			$date = DateTime::createFromFormat('m/d/Y',$date);
			$from_date = $date->format("Y-m-d");
		  return $from_date ;
    }

       public static function getPaymentDatatable($request)
    {
        
        $columns = array( 
                            0 =>'id', 
                            1 =>'order_id',
                            2=> 'received_amount',
                            3=> 'add_discount_amount',
                            4=> 'payment_date',
                            5=> 'created_at',
                            6=> 'updated_at',
                        );

        $totalData = Payment::count();
            
        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
            
        if(empty($request->input('search.value')))
        {            
            $objects = Payment::offset($start)
                         ->limit($limit)
                         ->orderBy($order,$dir)
                         ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $objects =  Payment::where('id','LIKE',"%{$search}%")
                            ->orWhere('order_id', 'LIKE',"%{$search}%")
                            ->orWhere('received_amount', 'LIKE',"%{$search}%")
                            ->orWhere('add_discount_amount', 'LIKE',"%{$search}%")
                            ->orWhere('payment_date', 'LIKE',"%{$search}%")
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();

            $totalFiltered = Payment::where('id','LIKE',"%{$search}%")
                             ->orWhere('order_id', 'LIKE',"%{$search}%")
                             ->count();
        }

         $data = array();
        if(!empty($objects))
        {
            foreach ($objects as $object)
            {
                $show =  "";
                $edit =  "";

                $nestedData['id'] = $object->id;
                $nestedData['order_id'] = $object->order_id;
                $nestedData['received_amount'] = substr(strip_tags($object->received_amount),0,50);
                $nestedData['payment_date'] = $object->payment_date;
                $nestedData['add_discount_amount'] = $object->add_discount_amount;
                $nestedData['add_discount_amount'] = $object->add_discount_amount;
                $nestedData['created_at'] = date('j M Y h:i a',strtotime($object->payment_date));
                $nestedData['updated_at'] = date('j M Y h:i a',strtotime($object->payment_date));
                $nestedData['Option'] = "&emsp;<a href='#' id='sumitOpen' data-toggle='modal' data-target='#myModal'title='SHOW' ><span class='glyphicon glyphicon-list'></span></a>
                                          &emsp;<a href='#' title='EDIT' ><span class='glyphicon glyphicon-edit'></span></a>";
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($request->input('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
         return $json_data; 
        
    }

    public static function convert_number_to_words($number) {

        $hyphen      = '-';
        $conjunction = '  ';
        $separator   = ' ';
        $negative    = 'negative ';
        $decimal     = ' & ';
        $dictionary  = array(
              0                   => 'zero',
              1                   => 'one',
              2                   => 'two',
              3                   => 'three',
              4                   => 'four',
              5                   => 'five',
              6                   => 'six',
              7                   => 'seven',
              8                   => 'eight',
              9                   => 'nine',
              10                  => 'ten',
              11                  => 'eleven',
              12                  => 'twelve',
              13                  => 'thirteen',
              14                  => 'fourteen',
              15                  => 'fifteen',
              16                  => 'sixteen',
              17                  => 'seventeen',
              18                  => 'eighteen',
              19                  => 'nineteen',
              20                  => 'twenty',
              30                  => 'thirty',
              40                  => 'fourty',
              50                  => 'fifty',
              60                  => 'sixty',
              70                  => 'seventy',
              80                  => 'eighty',
              90                  => 'ninety',
              100                 => 'hundred',
              1000                => 'thousand',
              100000              => 'lakh',
              10000000            => 'crore'
        );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($number < 0) {
            return $negative . Self::convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
                $string = $dictionary[$number];
                break;
            case $number < 100:
                $tens   = ((int) ($number / 10)) * 10;
                $units  = $number % 10;
                $string = $dictionary[$tens];
                if ($units) {
                    $string .= $hyphen . $dictionary[$units];
                }
                break;
            case $number < 1000:
                $hundreds  = $number / 100;
                $remainder = $number % 100;
                $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
                if ($remainder) {
                    $string .= $conjunction . Self::convert_number_to_words($remainder);
                }
                break; 
            case $number < 100000:
            $thousands   = ((int) ($number / 1000));
            $remainder = $number % 1000;

            $thousands = Self::convert_number_to_words($thousands);

            $string .= $thousands . ' ' . $dictionary[1000];
            if ($remainder) {
                $string .= $conjunction . Self::convert_number_to_words($remainder);
            }
            break;
        case $number < 10000000:
            $lakhs   = ((int) ($number / 100000));
            $remainder = $number % 100000;

            $lakhs = Self::convert_number_to_words($lakhs);

            $string = $lakhs . ' ' . $dictionary[100000];
            if ($remainder) {
                $string .= $conjunction . Self::convert_number_to_words($remainder);
            }
            break;
        case $number < 1000000000:
            $crores   = ((int) ($number / 10000000));
            $remainder = $number % 10000000;

            $crores = Self::convert_number_to_words($crores);

            $string = $crores . ' ' . $dictionary[10000000];
            if ($remainder) {
                $string .= $conjunction . Self::convert_number_to_words($remainder);
            }
            break;         
            default:
                $baseUnit = pow(1000, floor(log($number, 1000)));
                $numBaseUnits = (int) ($number / $baseUnit);
                $remainder = $number % $baseUnit;
                $string = Self::convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
                if ($remainder) {
                    $string .= $remainder < 100 ? $conjunction : $separator;
                    $string .= Self::convert_number_to_words($remainder);
                }
                break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }
   
}