@extends('layouts.app')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('content')

    <div class="container">

		<div id="admin-panel" class="row">
			
			<div class="col-sm-5 col-md-4 col-lg-3">
				@include('admin.sidebar_menu')
			</div>

			<div class="col-sm-7 col-md-8 col-lg-9">
                @if( ! empty($title))
				<h1 class="page-header"> {{ $title }}  <a href="{{ route('add_administrator') }}" class="btn btn-info pull-right"><i class="fa fa-user-plus"></i> {{ trans('app.add_administrator') }}</a> </h1>
                @endif

                @include('admin.flash_msg')

                <div class="row">
                    <div class="col-xs-12">

                        {{ Form::open(['role'=> 'form']) }}
                        <hr />

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group {{ $errors->has('name')? 'has-error':'' }} ">
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="@lang('app.name')" tabindex="1">
                                    {!! $errors->has('name')? '<p class="help-block">'.$errors->first('name').'</p>':'' !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group {{ $errors->has('email')? 'has-error':'' }} ">
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="@lang('app.email_address')" tabindex="4">
                                    {!! $errors->has('email')? '<p class="help-block">'.$errors->first('email').'</p>':'' !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('phone')? 'has-error':'' }}">
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" placeholder="Phone Number" tabindex="3">
                            {!! $errors->has('phone')? '<p class="help-block">'.$errors->first('phone').'</p>':'' !!}
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('gender')? 'has-error':'' }}">
                                    <select id="gender" name="gender" class="form-control select2">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Fe-Male</option>
                                        <option value="third_gender">Third Gender</option>
                                    </select>
                                    {!! $errors->has('gender')? '<p class="help-block">'.$errors->first('gender').'</p>':'' !!}

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group {{ $errors->has('country')? 'has-error':'' }}">
                                    <select id="country" name="country" class="form-control select2">
                                        <option value="">@lang('app.select_a_country')</option>
                                        <option value="756" {{ old('country') == 756 ? 'selected' : '' }}>Schweiz</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' :'' }}>{{ $country->name_de }}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->has('country')? '<p class="help-block">'.$errors->first('country').'</p>':'' !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group {{ $errors->has('password')? 'has-error':'' }}">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" tabindex="5">
                                    {!! $errors->has('password')? '<p class="help-block">'.$errors->first('password').'</p>':'' !!}

                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group {{ $errors->has('password_confirmation')? 'has-error':'' }}">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" tabindex="6">
                                    {!! $errors->has('password_confirmation')? '<p class="help-block">'.$errors->first('password_confirmation').'</p>':'' !!}

                                </div>
                            </div>
                        </div>


                        <hr />
                        <div class="row">
                            <div class="col-xs-12"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                        </div>
                        {{ Form::close() }}



                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@section('page-js')


@endsection