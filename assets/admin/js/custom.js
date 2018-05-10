
jQuery(document).ready(function() {    
    alert();
   //Commom Script
    $('.dpicker').datepicker({
      autoclose: true
    })
    var currentDate = new Date(); 
    $(".createdpicker").datepicker("setDate",currentDate);
    $("#loader").css("display",'none');
    $("#myDiv").removeAttr("style");
    $("#addService").removeAttr("disabled");

    $('#data-table-button').dataTable();
    $('#user-datatable').dataTable();
    var table = $('#payment_table').DataTable();
        $('#payment_table').on('draw.dt', function () { 
          var currentDate = new Date();
        $(".createdpicker").datepicker("setDate",currentDate);
     })

});


/***

Usage
***/
//Custom.doSomeStuff();