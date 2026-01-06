@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('blog_category.index') }}
    @endslot
    @slot('pagetitle')
      Blog Category List
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'Blog Category Edit' : 'Blog Category Create' }}
    @endslot
  @endcomponent

  {{-- @dd($tags); --}}
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
              action="{{ isset($edit_data) ? route('blog_category.update', $edit_data->id) : route('blog_category.store') }}"
              enctype = "multipart/form-data">
              @csrf
              @if (isset($edit_data))
                @method('PUT')
              @endif

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="name">Title</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Title here" name="name"
                    value="{{ old('name', isset($edit_data) ? $edit_data->name : '') }}" required>
                  <span class="required">*</span>
                  @error('name')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="slug">Slug</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Slag here" name="slug"
                    value="{{ old('slug', isset($edit_data) ? $edit_data->slug : '') }}" required>
                  {{-- <span class="required">*</span> --}}
                  @error('slug')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="tag_id">Tags</label>
                </div>
                <div class="col-lg-8 form-group">
                  <select class="js-example-basic-multiple form-control" name="tag_id[]" multiple="multiple">
                    @foreach ($tags as $id => $tag)
                      <option value="{{ $id }}">{{ $tag }}</option>
                    @endforeach

                  </select>
                  <span class="required">*</span>
                  @error('tag_id')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="form-footer mt-6" style="display: flex; justify-content: flex-end; gap: 10px;">
                <a href="{{ route('blog_category.index') }}" class="btn btn-light btn-pill">Cancel</a>
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
