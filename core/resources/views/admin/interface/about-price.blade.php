@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-list font-blue"></i>
                        <span class="caption-subject font-green bold uppercase">About Price Table Text</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <form role="form" method="POST" action="{{route('about-price.update',$about_price->id)}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{method_field('put')}}
                            <div class="form-body">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><h3>Heading</h3></label>
                                        <input type="text" class="form-control input-lg" value="{{$about_price->heading}}" name="heading" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><h3>Details</h3></label>
                                        <textarea name="details" class="form-control" rows="10" id="about-textarea">
                                               {{$about_price->details}}
                                            </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions right">
                                <button type="submit" class="btn blue btn-lg">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- NicEditor -->
        <script src="{{ asset('assets/admin/js/nicEdit-latest.js') }}" type="text/javascript"></script>
         <!--<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>-->
          <script type="text/javascript">
                    bkLib.onDomLoaded(function() {
                        nicEditors.editors.push(
                            new nicEditor().panelInstance(
                                document.getElementById('about-textarea')     
                            )
                        );
                    });
                    //]]>
            </script>
@endsection