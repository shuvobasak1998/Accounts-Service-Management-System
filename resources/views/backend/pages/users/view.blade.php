@extends('layouts.master')
@section('title')
	@lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
	@component('common-components.breadcrumb')
		@slot('BrRoute')
			{{ route('user.list') }}
		@endslot
		@slot('pagetitle')
			{{ trans('sidebar.user_information') }}
		@endslot
		@slot('title')
			View User Information
		@endslot
	@endcomponent

	<div class="form-box">
		<div class="row">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">

						<div class="row mb-3 align-items-center">
							<div class="col-lg-2">
								<label for="first_name">{{ trans('form.first_name') }}</label>
							</div>
							<div class="col-lg-4">
								<input type="text" value="{{ $user_info->first_name }}" class="form-control" readonly>

							</div>
							<div class="col-lg-2">
								<label for="bn_first_name">প্রথম অংশ</label>
							</div>
							<div class="col-lg-4">
								<input type="text" class="form-control" value="{{ $user_info->bn_first_name }}" readonly>
								<span class="required">*</span>
							</div>
						</div>
						<div class="row mb-3 align-items-center">
							<div class="col-lg-2">
								<label for="last_name">{{ trans('form.last_name') }}</label>
							</div>
							<div class="col-lg-4">
								<input type="text" class="form-control" placeholder="Last Name" name="last_name"
									value="{{ $user_info->last_name }}" readonly>
							</div>
							<div class="col-lg-2">
								<label for="bn_last_name">শেষ অংশ</label>
							</div>
							<div class="col-lg-4">
								<input type="text" class="form-control" value="{{ $user_info->bn_last_name }}" readonly>

							</div>
						</div>
						<div class="row mb-3 align-items-center">
							<div class="col-lg-4">
								<label for="login_id">Login ID</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" value="{{ $user_info->bn_last_name }}" readonly>
							</div>
						</div>

						<div class="row mb-3 align-items-center">
							<div class="col-lg-4">
								<label for="mobile">Mobile</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" value="{{ $user_info->mobile }}" readonly>
							</div>
						</div>
						<div class="row mb-3 align-items-center">
							<div class="col-lg-4">
								<label for="email">E-mail</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" value="{{ $user_info->email }}" readonly>
							</div>
						</div>
						<div class="row mb-3 align-items-center">
							<div class="col-lg-4">
								<label for="emplyee_id">Employee ID</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" value="{{ $user_info->name }}" readonly>
							</div>
						</div>

						<div class="row mb-3 align-items-center">
							<div class="col-lg-4">
								<label for="designation">Designation</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" value="{{ $user_info->designation_name }}"
									readonly>
							</div>
						</div>
						<div class="row mb-3 align-items-center">
							<div class="col-lg-4">
								<label for="department">Department</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" value="{{ $user_info->department_name }}"
									readonly>
							</div>
						</div>
						<div class="row mb-3 align-items-center">
							<div class="col-lg-4">
								<label for="profile_picture">Profile Picture</label>
							</div>
							<div class="col-lg-8">
								<a href="{{ asset('storage/' . $user_info->profile_photo_path) }}" target="_blank">
									<img src="{{ asset('storage/' . $user_info->profile_photo_path) }}" alt="Profile Photo"
										style="height: 100px; width: 120px;">
								</a>
							</div>
						</div>
						<div class="row mb-3 align-items-center">
							<div class="col-lg-4">
								<label for="signature">Signature</label>
							</div>
							<div class="col-lg-8">
								<a href="{{ asset('storage/' . $user_info->signature_photo_path) }}" target="_blank">
									<img src="{{ asset('storage/' . $user_info->signature_photo_path) }}"
										alt="Profile Photo" style="height: 100px; width: 150px;">
								</a>
							</div>
						</div>
						<div class="row mb-3 align-items-center">
							<div class="col-lg-4">
								<label for="user_role_id">User Role/Group</label>
							</div>
							<div class="col-lg-8">
								<input type="text" class="form-control" value="{{ $user_info->role_name }}" readonly>

							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="d-flex gap-2 align-items-center justify-content-end">
									<a href="{{ route('user.list') }}" class="btn btn-secondary">Back</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
