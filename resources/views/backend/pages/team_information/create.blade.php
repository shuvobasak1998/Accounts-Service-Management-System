@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('our_team.index') }}
    @endslot
    @slot('pagetitle')
      Team Member Information List
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'Team Member Information Edit' : 'Team Member Information Create' }}
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
  {{-- @dd($edit_data); --}}
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
              action="{{ isset($edit_data) ? route('our_team.update', $edit_data->id) : route('our_team.store') }}" enctype = "multipart/form-data">
              @csrf
              @if (isset($edit_data))
                @method('PUT')
              @endif
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="team_information_top_discription">Team Information Top Discription</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Team Information Top Discription here"
                    name="team_information_top_discription"
                    value="{{ old('team_information_top_discription', isset($edit_data) ? $edit_data->team_information_top_discription : '') }}"
                    required>
                  <span class="required">*</span>
                  @error('team_information_top_discription')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="team_member_name">Member Name</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Member Name here" name="team_member_name"
                    value="{{ old('team_member_name', isset($edit_data) ? $edit_data->team_member_name : '') }}" required>
                  <span class="required">*</span>
                  @error('team_member_name')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="team_member_designation">Member Designation</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Member Designation here" name="team_member_designation"
                    value="{{ old('team_member_designation', isset($edit_data) ? $edit_data->team_member_designation : '') }}" required>
                  <span class="required">*</span>
                  @error('team_member_designation')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>


              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="team_member_image_path">Team Member Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="team_member_image_path" type="file" class="form-control" required>
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  <span class="required">*</span>
                  @if (isset($edit_data->team_member_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->team_member_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->team_member_image_path) }}" alt="Profile Photo"
                          style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('team_member_image_path')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="google_address">Google Address</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Google Address"
                    value="{{ old('google_address', isset($edit_data) ? $edit_data->google_address : '') }}" name="google_address" required>
                  {{-- <span class="required">*</span> --}}
                  @error('google_address')
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
                    value="{{ old('facebook_address', isset($edit_data) ? $edit_data->facebook_address : '') }}" name="facebook_address" required>
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
                    value="{{ old('twitter_address', isset($edit_data) ? $edit_data->twitter_address : '') }}" name="twitter_address" required>
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
                    value="{{ old('linkedin_address', isset($edit_data) ? $edit_data->linkedin_address : '') }}" name="linkedin_address" required>
                  {{-- <span class="required">*</span> --}}
                  @error('linkedin_address')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="pinterest_address">Pinterest Address</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Pinterest Address"
                    value="{{ old('pinterest_address', isset($edit_data) ? $edit_data->pinterest_address : '') }}" name="pinterest_address" required>
                  {{-- <span class="required">*</span> --}}
                  @error('pinterest_address')
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
