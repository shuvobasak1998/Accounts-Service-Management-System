@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('contact_us.index') }}
    @endslot
    @slot('pagetitle')
      Contact Us Information List
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'Contact Us Information Edit' : 'Contact Us Information Create' }}
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
              action="{{ isset($edit_data) ? route('contact_us.update', $edit_data->id) : route('contact_us.store') }}" enctype = "multipart/form-data">
              @csrf
              @if (isset($edit_data))
                @method('PUT')
              @endif
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="contact_us_top_title">Contact Us Top Title</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Contact Us Top Title here" name="contact_us_top_title" value="{{isset($edit_data)?$edit_data->contact_us_top_title:' '}}"
                    required>
                  <span class="required">*</span>
                  @error('contact_us_top_title')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="contact_us_top_discription">Contact Us Top Description</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Contact Us Top Description here" name="contact_us_top_discription">{!! isset($edit_data) ? $edit_data->contact_us_top_discription : '' !!}</textarea>
                  <span class="required">*</span>
                  @error('contact_us_top_discription')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>


              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="contact_us_image_path">Contact Us Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="contact_us_image_path" type="file" class="form-control" required>
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  <span class="required">*</span>
                  @if (isset($edit_data->contact_us_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->contact_us_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->contact_us_image_path) }}" alt="Profile Photo" style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('contact_us_image_path')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <fieldset class="border border-primary p-3 rounded bg-white">
                <legend class="float-none w-auto px-2 text-primary">Frequently Asked Questions Section</legend>
                <div id="sectionToClone">
                  @if (isset($edit_data))
                    @foreach ($edit_data->ContactUsFrequentlyAskQuestion as $FrequentlyAskQuestion)
                      {{-- @dd($OurProgressDetail) --}}
                      <div class="row m-1 cloned-section">
                        <div style="background-color: rgb(220, 220, 220)" class="col-lg-12 border contact_us rounded-3 p-5">
                          <div class="row mb-3 align-items-center">
                            <div class="col-lg-4">
                              <label for="title">Details Title</label>
                            </div>
                            <div class="col-lg-8">
                              <input type="text" class="form-control" placeholder="Plz Fill Details Title here" name="title[]"
                                value="{{ old('title', $FrequentlyAskQuestion->title) }}" required>
                              <span class="required">*</span>
                              @error('title')
                                <span class="error-msg">{{ $message }}</span>
                              @enderror
                            </div>
                          </div>
                          <div class="row mb-3 align-items-center">
                            <div class="col-lg-4">
                              <label for="discription">Details Discription</label>
                            </div>
                            <div class="col-lg-8">
                              <textarea class="form-control" placeholder="Plz Fill Details Discription here" name="discription[]">{!! old('discription', $FrequentlyAskQuestion->discription) !!}</textarea>
                              <span class="required">*</span>
                              @error('discription')
                                <span class="error-msg">{{ $message }}</span>
                              @enderror
                            </div>
                          </div>
                          <div class="d-flex gap-2 align-items-center justify-content-end">
                            <button type="button" class="btn btn-danger btn-sm remove">Cancel</button>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  @else
                    <div style="background-color: rgb(220, 220, 220)" class="col-lg-12 border contact_us rounded-3 p-5">
                      <div class="row mb-3 align-items-center">
                        <div class="col-lg-4">
                          <label for="title">Details Title</label>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="Plz Fill Details Title here" name="title[]" required>
                          <span class="required">*</span>
                          @error('title')
                            <span class="error-msg">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3 align-items-center">
                        <div class="col-lg-4">
                          <label for="discription">Details Description</label>
                        </div>
                        <div class="col-lg-8">
                          <textarea class="form-control" placeholder="Plz Fill Details Description here" name="discription[]"></textarea>
                          <span class="required">*</span>
                          @error('discription')
                            <span class="error-msg">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="d-flex gap-2 align-items-center justify-content-end">
                        <button type="button" class="btn btn-danger btn-sm remove">Cancel</button>
                      </div>
                    </div>
                  @endif
                </div>

                <div class="row mt-5">
                  <div class="col-lg-12">
                    <div class="d-flex gap-2 align-items-center justify-content-end">
                      <button type="button" class="btn btn-success" id="cloneButton">ADD+</button>
                    </div>
                  </div>
                </div>
              </fieldset>


              <div class="form-footer mt-6" style="display: flex; justify-content: flex-end; gap: 10px;">
                <a href="{{ route('contact_us.index') }}" class="btn btn-light btn-pill">Cancel</a>
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
      $(this).closest('.contact_us').remove();
    });
  </script>
@endsection
