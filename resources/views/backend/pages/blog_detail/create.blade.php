@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('blog_details.index') }}
    @endslot
    @slot('pagetitle')
      Blog Details Information List
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'Blog Details Information Edit' : 'Blog Details Information Create' }}
    @endslot
  @endcomponent

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
              action="{{ isset($edit_data) ? route('blog_details.update', $edit_data->id) : route('blog_details.store') }}"
              enctype = "multipart/form-data">
              @csrf
              @if (isset($edit_data))
                @method('PUT')
              @endif
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="blog_category_id">Blog Category</label>
                </div>
                <div class="col-lg-8 form-group">
                  <select class="form-control" name="blog_category_id">
                    <option value="">Plz Select Blog Category</option>
                    @foreach ($blog_categoryes as $id => $blog_category)
                      <option value="{{ $id }}" {{ isset($edit_data) && $edit_data->blog_category_id === $id ? 'selected' : '' }}>
                        {{ $blog_category }}</option>
                    @endforeach
                  </select>
                  <span class="required">*</span>
                  @error('blog_category_id')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="card_title">Card Title</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Card title here" name="card_title"
                    value="{{ isset($edit_data) ? $edit_data->card_title : '' }}" required>
                  <span class="required">*</span>
                  @error('card_title')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="card_discription">Card Discription</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Card Discription here" name="card_discription">{!! isset($edit_data) ? $edit_data->card_discription : '' !!}</textarea>
                  <span class="required">*</span>
                  @error('card_discription')
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
                  @error('card_image_path')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="blog_detail_image_path">Blog Detail Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="blog_detail_image_path" type="file" class="form-control" required>
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  <span class="required">*</span>
                  @if (isset($edit_data->blog_detail_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->blog_detail_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->blog_detail_image_path) }}" alt="Profile Photo"
                          style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('blog_detail_image_path')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <fieldset class="border border-primary p-3 rounded bg-white">
                <legend class="float-none w-auto px-2 text-primary">Blog Details Section</legend>
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-4">
                    <label for="blog_detail_title">Details Title</label>
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" placeholder="Plz Fill Details Title here" name="blog_detail_title"
                      value="{{ isset($edit_data) ? $edit_data->blog_detail_title : '' }}" required>
                    <span class="required">*</span>
                    @error('blog_detail_title')
                      <span class="error-msg">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-4">
                    <label for="blog_detail_discription">Details Description</label>
                  </div>
                  <div class="col-lg-8">
                    <textarea id="myeditor" class="form-control" placeholder="Plz Fill Blog Details Description here" name="blog_detail_discription">{!! isset($edit_data) ? $edit_data->blog_detail_discription : '' !!}</textarea>
                    <span class="required">*</span>
                    @error('blog_detail_discription')
                      <span class="error-msg">{{ $message }}</span>
                    @enderror
                  </div>
                </div>


              </fieldset>


              <div class="form-footer mt-6" style="display: flex; justify-content: flex-end; gap: 10px;">
                <a href="{{ route('blog_details.index') }}" class="btn btn-light btn-pill">Cancel</a>
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
  <script>
    // Cloning functionality
    $('#cloneButton').click(function() {
      cloneSection();
    });

    function cloneSection() {
      // Clone the first div inside the section and reset its values
      var clonedSection = $('#sectionToClone div').first().clone();
      // Clear textarea values
      clonedSection.find('textarea').val('').trigger('change');
      // Clear input values
      clonedSection.find('input').val('');
      // Append the cloned section
      $('#sectionToClone').append(clonedSection);
    }
    // Remove the cloned section
    $(document).on('click', '.remove', function() {
      $(this).closest('.our_progress').remove();
    });
  </script>
@endsection
