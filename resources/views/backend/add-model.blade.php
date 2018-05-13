@extends('layouts.app')
@push('h-scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
@endpush
@section('content')
    <div class="container">
        <div class="row margin-top-30">
            <div class="col-md-8 col-md-offset-2">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if (Session::has('flash_notification.message'))
                    <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ Session::get('flash_notification.message') }}
                    </div>
                @endif
                <div class="panel panel-primary">
                    <div class="panel-heading">Add Car Model</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="">
                        {!! csrf_field() !!}
                        <!-- Car Model Name -->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Model Name*</label>
                                <div class="col-md-4 padding-right-0">
                                    <input type="text" class="form-control border-radius-none" name="name" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-3 padding-0">
                                    <select name="manufacturer_id" class="form-control border-radius-none">
                                        @if(count($manufacturer) > 0)
                                            @foreach($manufacturer as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        <!-- /Car Model Name -->

                        <!--Model Color-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Model Color</label>
                                <div class="col-md-6">
                                    <input class="form-control border-radius-none" type="text" name="color" value="{{ old('color') }}">
                                </div>
                            </div>
                        <!-- /Model Color-->

                        <!--Manufacturing Year-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Manufacturing Year</label>
                                <div class="col-md-6">
                                    <input id="tdate" class="form-control border-radius-none" type="text" name="manufacturing_year" value="{{ old('manufacturing_year') }}">
                                </div>
                            </div>
                        <!-- /Manufacturing Year-->

                        <!--Registration Number-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Registration Number</label>
                                <div class="col-md-6">
                                    <input class="form-control border-radius-none" type="text" name="registration_number" value="{{ old('registration_number') }}">
                                </div>
                            </div>
                        <!-- /Registration Number-->

                        <!--Note-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Note</label>
                                <div class="col-md-6">
                                    <textarea maxlength="500" name="note"  class="form-control" rows="5">{{ old('note') }}</textarea>
                                </div>
                            </div>
                        <!-- /Note-->

                        <!--Car Model Images-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Car Model Images</label>
                                <div class="col-md-6">
                                    <input id="dropfile" class="dropzone" type="file" name="model_img" />
                                </div>
                            </div>
                        <!--/Car Model Images-->


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $('#tdate').datepicker({
        autoclose: true
    });
</script>
@endpush
