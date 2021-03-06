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
                        <div class="profile-avatar">
                            <img src="{{ $user->get_gravatar(150) }}" class="img-thumbnail img-circle" />
                        </div>

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>@lang('app.anrede')</th>
                                <td>{{ getArray('title_types')[$user->title] }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.first_name')</th>
                                <td>{{ $user->first_name }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.last_name')</th>
                                <td>{{ $user->last_name }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.user_name')</th>
                                <td>{{ $user->user_name }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.email')</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                           {{--  <tr>
                                <th>@lang('app.gender')</th>
                                <td>{{ ucfirst($user->gender) }}</td>
                            </tr> --}}
                         {{--    <tr>
                                <th>@lang('app.mobile')</th>
                                <td>{{ $user->mobile }}</td>
                            </tr> --}}
                            <tr>
                                <th>@lang('app.phone')</th>
                                <td>{{ $user->phone }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.address')</th>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.zip_code')</th>
                                <td>{{ $user->zip_code }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.city')</th>
                                <td>{{ $user->city }}</td>
                            </tr>
                            <tr>
                                <th>@lang('app.country')</th>
                                <td>
                                    @if($user->country)
                                        {{ $user->country->name_de }}
                                    @endif
                                </td>
                            </tr>
                            <tr>{{-- 
                                <th>@lang('app.website')</th>
                                <td>{{ $user->website }}</td>
                            </tr> --}}
                            <tr>
                                <th>@lang('app.created_at')</th>
                                <td>{{ \Carbon\Carbon::parse($user->created_at)->formatLocalized(get_option('date_format')) }}</td>
                            </tr>
                            {{-- <tr>
                                <th>@lang('app.status')</th>
                                <td>{{ $user->status_context() }}</td>
                            </tr> --}}
                        </table>

                        @if($user->id == auth()->user()->id || $auth_user->is_admin())
                            <a href="{{ route('profile_edit', $user->id) }}" class="edit-profile"><i class="fa fa-pencil-square-o"></i> @lang('app.edit') </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('page-js')

@endsection