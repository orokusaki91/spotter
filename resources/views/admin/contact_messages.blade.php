@extends('layouts.app')
@section('title') @if( ! empty($title)) {{ $title }} | @endif @parent @endsection

@section('page-css')
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" />
@stop


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
                    <div class="col-xs-12">

                        <table class="table table-bordered table-striped" id="jDataTable">
                            <thead>
                                <tr>
                                    <th>@lang('app.name')</th>
                                    <th>@lang('app.email')</th>
                                    <th>@lang('app.message')</th>
                                    <th>@lang('app.created_at')</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>

            </div>
			
        </div>
		
    </div>
@endsection

@section('page-js')
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#jDataTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('contact_messages_data') }}',
                "aaSorting": []
            });
        });
    </script>
@endsection