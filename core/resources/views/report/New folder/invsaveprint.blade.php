@extends('admin.layouts.master')

@section('content')
    <div class="row" id="bg-print">
        <div class="col-md-12">
            <div class="invBody" id="printInvoice">
                <body>

                <div class="headerinv">

                    <div class="headerleft">
                        <h1>{{$shopinfo->shop_name}}</h1>
                        <p>Address:{{$shopinfo->shop_address}} <br> Email: {{$shopinfo->shop_email}}. Contact: {{$shopinfo->shop_contact_number}}</p>
                    </div>
                    <div class="headerright">
                        <img src="{{URL::asset('/assets/image/tailorlogo.jpg')}}" height="100" width="100">
                    </div>
                </div>
                <div class="cus-info">
                    <div class="cus-inf-sub-left">
                        <div class="inf-left">
                            <h3>Bill To</h3>
                            <p>Customer Name: </p>
                            <p>Address:</p>
                            <p>Mail Address:</p>
                        </div>
                        <div class="inf-right">
                            <h3>.</h3>
                            <p>{{$order->service_cus_name}}</p>
                            <p>{{$order->service_cus_address}}</p>
                            <p>{{$order->service_cus_email}}</p>
                        </div>
                    </div>
                    <div class="cus-inf-sub-right">
                        <div class="info-left">
                            <h3>Invoice Ref </h3>
                            <p>Invoice Date: </p>
                            <p>Delivery Date:</p>
                            <p>Numnber of Service Qty:</p>
                        </div>
                        <div class="info-right">
                            <h3>{{$order->service_ref}}</h3>
                            <p>{{Carbon\Carbon::parse($order->service_crete_date)->format('d-m-Y')}} </p>
                            <p>{{Carbon\Carbon::parse($order->service_delivery_date)->format('d-m-Y')}}</p>
                            <p>{{$order->orderdetails->sum('service_quantity')}}</p>
                        </div>

                    </div>
                </div>
                <div class="data-table">
                    <table class="table table-hover table-striped table-condensed">
                        <thead>
                        <tr class="firsttr">
                            <th>#</th>
                            <th>SERVICE NAME</th>
                            <th class="alingcenter">UNIT PRICE </th>
                            <th class="alingcenter">SERVICE QUANTITY</th>
                            <th class="alingright">AMOUNT</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1
                        @endphp
                        @foreach($order->orderdetails as $orderdetial)

                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$orderdetial->service->service_name}}</td>
                                <td class="alingcenter">{{number_format($orderdetial->service_price,2)}}</td>
                                <td class="alingcenter">{{$orderdetial->service_quantity}}</td>
                                <td class="alingright">{{number_format($orderdetial->service_amount,2)}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Sub Total:</th>
                            <th class="alingright">{{number_format(($order->total_amount + $order->discount_amount),2)}}</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="lasttr">Discount:</th>
                            <th class="lasttr alingright">-{{number_format($order->discount_amount,2)}}</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="lasttr"><span class="sub-total"> Total Bill: </span></th>
                            <th class="lasttr alingright"><span class="sub-total"> {{number_format($order->total_amount,2)}}  </span></th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="lasttr">Advance & Installment Amount:</th>
                            <th class="lasttr alingright">-{{number_format($order->payments->sum('received_amount'),2)}}</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="lasttr">Cash Discount:</th>
                            <th class="lasttr alingright">-{{number_format($order->payments->sum('add_discount_amount'),2)}}</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th class="lasttr">Due Amount:</th>
                            <th class="lasttr alingright">{{number_format($order->total_amount-$order->payments->sum('received_amount'),2)}}</th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
                <p id="inword">InWord: {{ucfirst($total_bill_word)}} only</p>
                <div class="footer">
                    <p id="notemes">It is computer generated no signature required</p>
                </div>
                <div class="print-info">
                    <div class="print-left">
                        <p>Invoice Print Date: {{Carbon\Carbon::now('Asia/Dhaka')->format('d-m-Y h:i:s A')}}</p>
                    </div>
                    <div class="print-right">
                        <p>Invoice Print By: {{ Auth::user()->name }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="buttonClss">
            <input type='button' class=" btn bg-purple btn-lg btn-flat" id='printbtn' value='Print'>
        </div>
    </div>

    <script>

        jQuery(document).ready(function() {

            //Print Invoice
            $("#printbtn").click(function () {
                var contents = $("#printInvoice").html();
                var frame1 = $('<iframe />');
                frame1[0].name = "frame1";
                frame1.css({ "position": "absolute", "top": "-1000000px" });
                $("body").append(frame1);
                var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
                frameDoc.document.open();
                //Create a new HTML document.
                frameDoc.document.write('<html><head><title>Invoice</title>');
                frameDoc.document.write('</head><body>');
                //Append the external CSS file.
                frameDoc.document.write('<link href="../assets/css/invoiceprint.css" rel="stylesheet" type="text/css" />');
                frameDoc.document.write('<link href="../assets/css/app.css" rel="stylesheet" type="text/css" />');
                //alert(frameDoc);
                //Append the DIV contents.
                frameDoc.document.write(contents);
                frameDoc.document.write('</body></html>');
                frameDoc.document.close();
                setTimeout(function () {
                    window.frames["frame1"].focus();
                    window.frames["frame1"].print();
                    frame1.remove();
                }, 500);
            });

        });


        /***

         Usage
         ***/
        //Custom.doSomeStuff();
    </script>
@endsection('content')