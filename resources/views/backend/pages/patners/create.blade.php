@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('partnersinfo.index') }}
    @endslot
    @slot('pagetitle')
      Partners Information List
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'Partners Information Edit' : 'Partners Information Create' }}
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
              action="{{ isset($edit_data) ? route('partnersinfo.update', $edit_data->id) : route('partnersinfo.store') }}"
              enctype = "multipart/form-data">
              @csrf
              @if (isset($edit_data))
                @method('PUT')
              @endif
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="partners_top_discription">Partners Top Discription</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Partners Top Discription here" name="partners_top_discription">{!! isset($edit_data) ? $edit_data->partners_top_discription : '' !!}</textarea>
                  {{-- <<span class="required">*</span> --}}
                  @error('partners_top_discription')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="card_title">Card Title</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Card Title here" name="card_title"
                    value="{{ old('card_title', isset($edit_data) ? $edit_data->card_title : '') }}" required>
                  <span class="required">*</span>
                  @error('card_title')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="card_subtitle">Card Subtitle</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Card Subtitle here" name="card_subtitle"
                    value="{{ old('card_subtitle', isset($edit_data) ? $edit_data->card_subtitle : '') }}" required>
                  {{-- <span class="required">*</span> --}}
                  @error('card_subtitle')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>


              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="card_image_path">Card Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="card_image_path" type="file" class="form-control" required>
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  <span class="required">*</span>
                  @if (isset($edit_data->card_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->card_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->card_image_path) }}" alt="Profile Photo" style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('services_card_image')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="form-footer mt-6" style="display: flex; justify-content: flex-end; gap: 10px;">
                <a href="{{ route('partnersinfo.index') }}" class="btn btn-light btn-pill">Cancel</a>
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
