@extends('layouts.app')

@section('content')

    <div class="container">

		<div id="admin-panel" class="row">
			
			<div class="col-sm-5 col-md-4 col-lg-3">
				@include('admin.sidebar_menu')
			</div>
			
			<div class="col-sm-7 col-md-8 col-lg-9">
				@if(session('error'))
				<div class="alert alert-danger">
					{{ session('error') }}
				</div>
				@endif
				
				<h1 class="page-header">@lang('app.dashboard')</h1>
				
				<div class="row">
					<div class="col-sm-6 col-lg-3">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="huge">{{ $active_events }}</div>
								<div>@lang('app.published_events')</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6 col-lg-3">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="huge">{{ $active_ads }}</div>
								<div>@lang('app.published_auctions')</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="huge">{{ $pending_events }}</div>
								<div>@lang('app.pending_events')</div>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-lg-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="huge">{{ $pending_ads }}</div>
								<div>@lang('app.pending_auctions')</div>
							</div>
						</div>
					</div>

					@if($ten_contact_messages)
					<div class="col-sm-6 col-lg-3">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="huge">{{ $total_users }}</div>
								<div>@lang('app.users')</div>
							</div>
						</div>
					</div>
					@endif
				</div>
				<!-- /.row -->
				@if($lUser->is_admin())
				<div class="row">
					@if($ten_contact_messages)
					<div class="col-xs-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								@lang('app.latest_ten_contact_messages')
							</div>
							<div class="panel-body">
								<table class="table table-bordered">
									<tr>
										<th>@lang('app.sender')</th>
										<th>@lang('app.message')</th>
									</tr>

									@foreach($ten_contact_messages as $message)
										<tr>
											<td>
												<i class="fa fa-user"></i> {{ $message->name }} <br />
												<i class="fa fa-envelope-o"></i> {{ $message->email }} <br />
												<i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans() }}
											</td>
											<td>{{ $message->message }}</td>
										</tr>
									@endforeach
								</table>
							</div>
						</div>
					</div>
					@endif
				</div>
				@endif
			</div>
		</div>
</div> <!-- /#container -->
@endsection