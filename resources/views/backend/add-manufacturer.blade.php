@extends('layouts.app')

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
                    <div class="panel-heading">Add Car Manufacturer</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="post" action="">
                        {!! csrf_field() !!}
                        <!--Manufacturer Name-->
                            <div class="form-group">
                                <label class="col-md-4 control-label">Manufacturer Name*</label>
                                <div class="col-md-6">
                                    <input class="form-control border-radius-none" type="text" name="name" value="{{ old('name') }}" required>
                                </div>
                            </div>
                        <!-- /Manufacturer Name-->

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-cogs" aria-hidden="true"></i> Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
