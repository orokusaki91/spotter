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
                    <div class="col-xs-12">
						
						<div class="table-scrollable">
							@if($events->total() > 0)
								<table class="table table-bordered table-striped table-responsive">

									@foreach($events as $event)
										<tr>
											<td width="100">
												@if(isset($event->auctions))
													<img class="primary-img thumb-listing-table" src="{{ event_img_url($event->image)" alt="primary image" />
												@endif
											</td>
											<td class="text-info">
												<h5><a href="{{  route('single_event', ['event' => $event->id]) }}" target="_blank">{{ $event->title }}</a> ({!! $event->status_context() !!})</h5>
											</td>

											<td class="edit-delete">
												<a href="{{ route('edit_event', $event->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i> </a>

												@if(Carbon\Carbon::parse($event->auction_ends)->isPast() && $event->status != '2')
													<a href="{{ route('close_event', $event->id) }}" class="btn btn-danger"><i class="fa fa-close"></i> </a>
												@endif
												<a href="javascript:;" class="btn btn-danger deleteAds" data-event="{{ $event->id }}"><i class="fa fa-trash"></i> </a>
											</td>
										</tr>
									@endforeach

								</table>
							@endif

							{!! $events->links() !!}
						</div>

                    </div>
                </div>

            </div>
			
        </div>

    </div>
@endsection

@section('page-js')

    <script>
        $(document).ready(function() {
            $('.deleteAds').on('click', function () {
                if (!confirm('{{ trans('app.are_you_sure_data_will_be_removed') }}')) {
                    return '';
                }
                var selector = $(this);
                var event = selector.data('event');
                $.ajax({
                    url: '{{ route('delete_event') }}',
                    type: "POST",
                    data: {event: event, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                            selector.closest('tr').hide('slow');
                            toastr.success(data.msg, '@lang('app.success')', toastr_options);
                        }
                    }
                });
            });
        });
    </script>

    <script>
        @if(session('success'))
            toastr.success('{{ session('success') }}', '{{ trans('app.success') }}', toastr_options);
        @endif
        @if(session('error'))
            toastr.error('{{ session('error') }}', '{{ trans('app.success') }}', toastr_options);
        @endif
    </script>

@endsection