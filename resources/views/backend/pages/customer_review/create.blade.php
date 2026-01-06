@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('customer_review.index') }}
    @endslot
    @slot('pagetitle')
      Customer Review List
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'Customer Review Edit' : 'Customer Review Create' }}
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
              action="{{ isset($edit_data) ? route('customer_review.update', $edit_data->id) : route('customer_review.store') }}"
              enctype = "multipart/form-data">
              @csrf
              @if (isset($edit_data))
                @method('PUT')
              @endif
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="customer_reviews_top_discription">Customer Review Top Discription</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Customer Review Top Discription here"
                    name="customer_reviews_top_discription"
                    value="{{ old('customer_reviews_top_discription', isset($edit_data) ? $edit_data->customer_reviews_top_discription : '') }}"
                    required>
                  <span class="required">*</span>
                  @error('customer_reviews_top_discription')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="customer_review">Customer Review</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Customer Review here" name="customer_review">{!! isset($edit_data) ? $edit_data->customer_review : '' !!}</textarea>
                  <span class="required">*</span>
                  @error('customer_review')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="customer_name">Customer Name</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Customer Name here" name="customer_name"
                    value="{{ old('customer_name', isset($edit_data) ? $edit_data->customer_name : '') }}" required>
                  <span class="required">*</span>
                  @error('customer_name')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="customer_designation">Customer Designation</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Customer Designation here" name="customer_designation"
                    value="{{ old('customer_designation', isset($edit_data) ? $edit_data->customer_designation : '') }}" required>
                  <span class="required">*</span>
                  @error('customer_designation')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="customer_organization">Customer Organization</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Customer Organization here" name="customer_organization"
                    value="{{ old('customer_organization', isset($edit_data) ? $edit_data->customer_organization : '') }}" required>
                  <span class="required">*</span>
                  @error('customer_organization')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="customer_image">Customer Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="customer_image" type="file" class="form-control" required>
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  <span class="required">*</span>
                  @if (isset($edit_data->customer_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->customer_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->customer_image_path) }}" alt="Profile Photo" style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('services_card_image')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="form-footer mt-6" style="display: flex; justify-content: flex-end; gap: 10px;">
                <a href="{{ route('customer_review.index') }}" class="btn btn-light btn-pill">Cancel</a>
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
