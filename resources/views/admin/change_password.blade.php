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
				<h1 class="page-header"> {{ $title }}  </h1>
                @endif

                @include('admin.flash_msg')

                <div class="row">
                    <div class="col-sm-8 col-sm-offset-1 col-xs-12">

                        {!! Form::open(['class' => 'form-horizontal']) !!}

                        <div class="form-group {{ $errors->has('old_password')? 'has-error' : '' }}">
                            <label class="col-sm-3 control-label" for="old_password">@lang('app.old_password') *</label>
                            <div class="col-sm-9">
                                <input type="password" name="old_password" id="old_password" class="form-control" value="" autocomplete="off" placeholder="@lang('app.old_password') " />
                                {!! $errors->has('old_password')? '<p class="help-block"> '.$errors->first('old_password').' </p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('new_password')? 'has-error' : '' }}">
                            <label class="col-sm-3 control-label" for="new_password">@lang('app.new_password') *</label>
                            <div class="col-sm-9">
                                <input type="password" name="new_password" id="new_password" class="form-control" value="" autocomplete="off" placeholder="@lang('app.new_password')" />
                                {!! $errors->has('new_password')? '<p class="help-block"> '.$errors->first('new_password').' </p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('new_password_confirmation')? 'has-error' : '' }}">
                            <label class="col-sm-3 control-label" for="new_password_confirmation">@lang('app.new_password_confirmation') *</label>
                            <div class="col-sm-9">
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" value="" autocomplete="off" placeholder="@lang('app.new_password_confirmation')" />
                                {!! $errors->has('new_password_confirmation')? '<p class="help-block"> '.$errors->first('new_password_confirmation').' </p>':'' !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-10">
                                <button type="submit" class="btn btn-info">@lang('app.change_password')</button>
                            </div>
                        </div>
                        </form>




                    </div>

                </div>





            </div>

        </div>

    </div>
@endsection

@section('page-js')

@endsection