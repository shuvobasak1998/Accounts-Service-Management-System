@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('our_progress.index') }}
    @endslot
    @slot('pagetitle')
      Our Progress Information List
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'Our Progress Information Edit' : 'Our Progress Information Create' }}
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
              action="{{ isset($edit_data) ? route('our_progress.update', $edit_data->id) : route('our_progress.store') }}"
              enctype = "multipart/form-data">
              @csrf
              @if (isset($edit_data))
                @method('PUT')
              @endif
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="progress_top_discription">Our Progress Top Discription</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Our Progress Top Discription here" name="progress_top_discription">{!! isset($edit_data) ? $edit_data->progress_top_discription : '' !!}</textarea>
                  <span class="required">*</span>
                  @error('progress_top_discription')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="first_image_path">First Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="first_image_path" type="file" class="form-control" required>
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  <span class="required">*</span>
                  @if (isset($edit_data->first_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->first_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->first_image_path) }}" alt="Profile Photo" style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('first_image_path')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="second_image_path">Second Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="second_image_path" type="file" class="form-control" required>
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  <span class="required">*</span>
                  @if (isset($edit_data->second_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->second_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->second_image_path) }}" alt="Profile Photo" style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('second_image_path')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="third_image_path">Third Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="third_image_path" type="file" class="form-control" required>
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  <span class="required">*</span>
                  @if (isset($edit_data->third_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->third_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->third_image_path) }}" alt="Profile Photo" style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('third_image_path')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <fieldset class="border border-primary p-3 rounded bg-white">
                <legend class="float-none w-auto px-2 text-primary">Our Progress Details Section</legend>
                <div id="sectionToClone">
                  @if (isset($edit_data))
                    @foreach ($edit_data->OurProgressDetails as $OurProgressDetail)
                      {{-- @dd($OurProgressDetail) --}}
                      <div class="row m-1 cloned-section">
                        <div style="background-color: rgb(220, 220, 220)" class="col-lg-12 border our_progress rounded-3 p-5">
                          <div class="row mb-3 align-items-center">
                            <div class="col-lg-4">
                              <label for="details_title">Details Title</label>
                            </div>
                            <div class="col-lg-8">
                              <input type="text" class="form-control" placeholder="Plz Fill Card Subtitle here" name="details_title[]"
                                value="{{ old('details_title', $OurProgressDetail->details_title) }}" required>
                              <span class="required">*</span>
                              @error('details_title')
                                <span class="error-msg">{{ $message }}</span>
                              @enderror
                            </div>
                          </div>
                          <div class="row mb-3 align-items-center">
                            <div class="col-lg-4">
                              <label for="detail_discription">Details Discription</label>
                            </div>
                            <div class="col-lg-8">
                              <textarea class="form-control" placeholder="Plz Fill Our Progress Details Description here" name="detail_discription[]">{!! old('detail_discription', $OurProgressDetail->detail_discription) !!}</textarea>
                              <span class="required">*</span>
                              @error('detail_discription')
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
                    <div style="background-color: rgb(220, 220, 220)" class="col-lg-12 border our_progress rounded-3 p-5">
                      <div class="row mb-3 align-items-center">
                        <div class="col-lg-4">
                          <label for="details_title">Details Title</label>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="Plz Fill Card Subtitle here" name="details_title[]" required>
                          <span class="required">*</span>
                          @error('details_title')
                            <span class="error-msg">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3 align-items-center">
                        <div class="col-lg-4">
                          <label for="detail_discription">Details Description</label>
                        </div>
                        <div class="col-lg-8">
                          <textarea class="form-control" placeholder="Plz Fill Our Progress Details Description here" name="detail_discription[]"></textarea>
                          <span class="required">*</span>
                          @error('detail_discription')
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
                <a href="{{ route('our_progress.index') }}" class="btn btn-light btn-pill">Cancel</a>
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
