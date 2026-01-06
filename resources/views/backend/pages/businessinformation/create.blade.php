@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('businessinfo.index') }}
    @endslot
    @slot('pagetitle')
      Business Information List
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'Business Information Edit' : 'Business Information Create' }}
    @endslot
  @endcomponent
  <style>
    .required {
      color: red;
      font-weight: 700;
      position: absolute;
      right: 0;
      top: 0;
    }
  </style>
  {{-- @dd($business_info); --}}
  <div class="form-box">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" class="needs-validation" novalidate
              action="{{ isset($business_info) ? route('businessinfo.update', $business_info->id) : route('businessinfo.store') }}"
              enctype = "multipart/form-data">
              @csrf
              @if (isset($business_info))
                @method('PUT')
              @endif
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="title">Organization Title</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz fill title here" name="title"
                    value="{{ old('title', isset($business_info) ? $business_info->title : '') }}" required>
                  <span class="required">*</span>
                  @error('title')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="short_code">Organization Code</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Business Code here" name="short_code"
                    value="{{ old('short_code', isset($business_info) ? $business_info->short_code : '') }}" required>
                  {{-- <span class="required">*</span> --}}
                  @error('short_code')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="welcome_msg_title">Welcome message title</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Welcome message Code here" name="welcome_msg_title"
                    value="{{ old('welcome_msg_title', isset($business_info) ? $business_info->welcome_msg_title : '') }}" required>
                  <span class="required">*</span>
                  @error('welcome_msg_title')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="welcome_msg_subtitle">Welcome message Sub-title</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Welcome message Sub-title here" name="welcome_msg_subtitle"
                    value="{{ old('welcome_msg_subtitle', isset($business_info) ? $business_info->welcome_msg_subtitle : '') }}" required>
                  <span class="required">*</span>
                  @error('welcome_msg_subtitle')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="welcome_msg_discription">Welcome message discription</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" name="welcome_msg_discription" class="form-control" placeholder="Plz Fill Welcome message discription here" cols="20"
                    rows="3" required>{{ old('welcome_msg_discription', isset($business_info) ? $business_info->welcome_msg_discription : '') }}</textarea>
                  <span class="required">*</span>
                  @error('welcome_msg_discription')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="business_logo">Organization logo</label>
                </div>
                <div class="col-lg-8">
                  <input name="business_logo" type="file" class="form-control" required>
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  <span class="required">*</span>
                  @if (isset($business_info->business_logo_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $business_info->business_logo_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $business_info->business_logo_path) }}" alt="Profile Photo"
                          style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('business_logo')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror

                </div>

              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="address">Address</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" name="address" class="form-control" placeholder="Plz Fill Address here" cols="20" rows="3">{{ old('address', isset($business_info) ? $business_info->address : '') }}</textarea>
                  {{-- <span class="required">*</span> --}}
                  @error('address')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="mobile">Mobile No</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="phone Number" name="mobile"
                    value="{{ old('mobile', isset($business_info) ? $business_info->mobile : '') }}">
                  <span class="required">*</span>
                  @error('mobile')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="telephone">Telephone No</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Telephone Number" name="telephone"
                    value="{{ old('telephone', isset($business_info) ? $business_info->telephone : '') }}">
                  {{-- <span class="required">*</span> --}}
                  @error('telephone')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="email">E-mail</label>
                </div>
                <div class="col-lg-8">
                  <input type="email" class="form-control" placeholder="E-mail" name="email"
                    value="{{ old('email', isset($business_info) ? $business_info->email : '') }}">
                  {{-- <span class="required">*</span> --}}
                  @error('email')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="web_address">Web Address</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Web Address"
                    value="{{ old('web_address', isset($business_info) ? $business_info->web_address : '') }}" name="web_address">
                  {{-- <span class="required">*</span> --}}
                  @error('web_address')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="facebook_address">Facebook Address</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Facebook Address"
                    value="{{ old('facebook_address', isset($business_info) ? $business_info->facebook_address : '') }}" name="facebook_address">
                  {{-- <span class="required">*</span> --}}
                  @error('facebook_address')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="twitter_address">Twitter Address</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Twitter Address"
                    value="{{ old('twitter_address', isset($business_info) ? $business_info->twitter_address : '') }}" name="twitter_address">
                  {{-- <span class="required">*</span> --}}
                  @error('twitter_address')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="linkedin_address">Linkedin Address</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Linkedin Address"
                    value="{{ old('linkedin_address', isset($business_info) ? $business_info->linkedin_address : '') }}" name="linkedin_address">
                  {{-- <span class="required">*</span> --}}
                  @error('linkedin_address')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="form-footer mt-6" style="display: flex; justify-content: flex-end; gap: 10px;">
                <a href="{{ route('businessinfo.index') }}" class="btn btn-light btn-pill">Cancel</a>
                <button type="submit" class="btn btn-primary btn-pill">Submit</button>
              </div>


            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
@endsection
