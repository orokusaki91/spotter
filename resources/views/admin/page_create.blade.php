@extends('layouts.app')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection


@section('page-css')

@endsection

@section('content')
    <div class="container">
        <div id="wrapper">
            @include('admin.sidebar_menu')
            <div id="page-wrapper">
                @if( ! empty($title))
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header"> {{ $title }}  </h1>
                        </div> <!-- /.col-lg-12 -->
                    </div> <!-- /.row -->
                @endif

                @include('admin.flash_msg')

                <div class="row">
                    <div class="col-xs-12">

                        {{ Form::open(['class' => 'form-horizontal']) }}

                        <div class="form-group {{ $errors->has('title')? 'has-error':'' }}">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title" placeholder="@lang('app.title')">
                                {!! $errors->has('title')? '<p class="help-block">'.$errors->first('title').'</p>':'' !!}
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('post_content')? 'has-error':'' }}">
                            <div class="col-sm-12">
                                <textarea name="post_content" id="post_content" class="form-control summerNoteEditor" rows="6">{{ old('post_content') }}</textarea>
                                {!! $errors->has('post_content')? '<p class="help-block">'.$errors->first('post_content').'</p>':'' !!}
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="show_in_header_menu" class="checkbox-inline">
                                    <input type="checkbox" value="1" id="show_in_header_menu" name="show_in_header_menu">
                                    @lang('app.show_in_header_menu')
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label for="show_in_footer_menu" class="checkbox-inline">
                                    <input type="checkbox" value="1" id="show_in_footer_menu" name="show_in_footer_menu">
                                    @lang('app.show_in_footer_menu')
                                </label>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">@lang('app.save_new_page')</button>
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>

                </div>


            </div>   <!-- /#page-wrapper -->




        </div>   <!-- /#wrapper -->


    </div> <!-- /#container -->
@endsection

@section('page-js')
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace( 'post_content' );
    </script>
@endsection