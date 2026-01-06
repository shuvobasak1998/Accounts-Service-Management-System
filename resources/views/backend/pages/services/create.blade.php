@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('servicesinfo.index') }}
    @endslot
    @slot('pagetitle')
      Services Information
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'Services Information Edit' : 'Services Information Create' }}
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
              action="{{ isset($edit_data) ? route('servicesinfo.update', $edit_data->id) : route('servicesinfo.store') }}"
              enctype = "multipart/form-data">
              @csrf
              @if (isset($edit_data))
                @method('PUT')
              @endif
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="services_top_discription">Services Top Discription</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Services Top Discription here" name="services_top_discription">{!! isset($edit_data) ? $edit_data->services_top_discription : '' !!}</textarea>
                  {{-- <<span class="required">*</span> --}}
                  @error('services_top_discription')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="services_card_title">Services Card Title</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Services Card Title here" name="services_card_title"
                    value="{{ old('services_card_title', isset($edit_data) ? $edit_data->services_card_title : '') }}" required>
                  <span class="required">*</span>
                  @error('card_title')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="services_card_subtitle">Services Card Subtitle</label>
                </div>
                <div class="col-lg-8">
                  <input type="text" class="form-control" placeholder="Plz Fill Services Card Subtitle here" name="services_card_subtitle"
                    value="{{ old('services_card_subtitle', isset($edit_data) ? $edit_data->services_card_subtitle : '') }}">
                  {{-- <span class="required">*</span> --}}
                  @error('services_card_subtitle')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="services_card_discription">Services Card Discription</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Services Card Discription here" name="services_card_discription">{!! isset($edit_data) ? $edit_data->services_card_discription : '' !!}</textarea>
                  <span class="required">*</span>
                  @error('services_card_discription')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="services_card_image">Services Card Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="services_card_image" type="file" class="form-control">
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  {{-- <span class="required">*</span> --}}
                  @if (isset($edit_data->services_card_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->services_card_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->services_card_image_path) }}" alt="Profile Photo"
                          style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('services_card_image')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="service_overview">Service Overview</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Service Overview here" name="service_overview">{!! isset($edit_data) ? $edit_data->service_overview : '' !!}</textarea>
                  <span class="required">*</span>
                  @error('service_overview')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="service_category_id">Service Category</label>
                </div>
                <div class="col-lg-8 form-group">
                  <select class="form-control" name="service_category_id">
                    <option value="">Plz Select Service Category</option>
                    @foreach ($service_categoryes as $id => $service_category)
                      <option value="{{ $id }}" {{ isset($edit_data) && $edit_data->service_category_id === $id ? 'selected' : '' }}>
                        {{ $service_category }}</option>
                    @endforeach

                  </select>
                  <span class="required">*</span>
                  @error('service_category_id')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              @if (isset($edit_data->service_attachment_path))
                @php
                  // Get file extension for the current attachment
                  $fileExtension = pathinfo($edit_data->service_attachment_path, PATHINFO_EXTENSION);
                  // Define a mapping of extensions to icons (Font Awesome)
                  $fileIcons = [
                      'pdf' => 'fas fa-file-pdf',
                      'doc' => 'fas fa-file-word',
                      'docx' => 'fas fa-file-word',
                      'xls' => 'fas fa-file-excel',
                      'xlsx' => 'fas fa-file-excel',
                      'jpg' => 'fas fa-file-image',
                      'jpeg' => 'fas fa-file-image',
                      'png' => 'fas fa-file-image',
                      'txt' => 'fas fa-file-alt',
                  ];
                  $iconClass = $fileIcons[$fileExtension] ?? 'fas fa-file'; // Default icon if not found
                @endphp
              @endif
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="service_attachment_path">Services Attachment</label>
                </div>
                <div class="col-lg-8">
                  <input name="service_attachment_path" type="file" class="form-control">
                  <span class="suggetion-text text-info">File type PDF, XLSX, DOC, JPG, PNG, SVG</span>
                  {{-- <span class="required">*</span> --}}
                  @error('service_attachment_path')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                  @if (isset($edit_data->service_attachment_path))
                    <div class="row mt-2">
                      <div class="col-lg-3">
                        <span style="font-weight: bold;">Service Attachment :</span>
                      </div>
                      <div class="col-lg-9">
                        @if (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
                          <a class="image-popup-no-margins" href="{{ asset('storage/' . $edit_data->service_attachment_path) }}">
                            <img class="img-fluid" alt="" src="{{ asset('storage/' . $edit_data->service_attachment_path) }}"
                              width="50">
                          </a>
                        @else
                          <a href="{{ asset('storage/' . $edit_data->service_attachment_path) }}" class="print_button" target="_blank">
                            <i class="{{ $iconClass }} fa-3x"></i>
                          </a>
                        @endif
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              <fieldset class="border border-primary p-3 rounded bg-white">
                <legend class="float-none w-auto px-2 text-primary">Performance Over the Year Section</legend>
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-4">
                    <label for="performance_discription">Performance Discription</label>
                  </div>
                  <div class="col-lg-8">
                    <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Services Card Discription here"
                      name="performance_discription">{!! isset($edit_data) ? $edit_data->performance_discription : '' !!}</textarea>
                    <span class="required">*</span>
                    @error('performance_discription')
                      <span class="error-msg">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                {{-- @dd($edit_data) --}}
                @isset($edit_data)
                  @php
                    $performance = json_decode($edit_data->performance, true);
                  @endphp
                @endisset

                <div class="row m-1">
                  <div class="col-lg-12">
                    <div class="row mb-3 align-items-center">
                      <div class="col-lg-4">
                        <label for="build_quality">Build Quality(%):</label>
                      </div>
                      <div class="col-lg-8">
                        <input type="number" class="form-control" placeholder="Plz Fill Build Quality(%) value here"
                          name="performance[build_quality]" value="{{ isset($performance['build_quality']) ? $performance['build_quality'] : '' }}"
                          required>
                        <span class="required">*</span>
                        @error('build_quality')
                          <span class="error-msg">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row m-1">
                  <div class="col-lg-12">
                    <div class="row mb-3 align-items-center">
                      <div class="col-lg-4">
                        <label for="technology">Technology(%):</label>
                      </div>
                      <div class="col-lg-8">
                        <input type="number" class="form-control" placeholder="Plz Fill Technology(%) value here" name="performance[technology]"
                          value="{{ isset($performance['technology']) ? $performance['technology'] : '' }}" required>
                        <span class="required">*</span>
                        @error('technology')
                          <span class="error-msg">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row m-1">
                  <div class="col-lg-12">
                    <div class="row mb-3 align-items-center">
                      <div class="col-lg-4">
                        <label for="sustainability">Sustainability(%):</label>
                      </div>
                      <div class="col-lg-8">
                        <input type="number" class="form-control" placeholder="Plz Fill Sustainability(%) value here"
                          name="performance[sustainability]"
                          value="{{ isset($performance['sustainability']) ? $performance['sustainability'] : '' }}" required>
                        <span class="required">*</span>
                        @error('sustainability')
                          <span class="error-msg">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>

              <fieldset class="border border-primary p-3 rounded bg-white">
                <legend class="float-none w-auto px-2 text-primary">Service Benefits Section</legend>
                <div id="serviceBenefitsCloneContainer" class="row m-1">
                  @if (isset($edit_data))
                    @foreach ($edit_data->ServiceBenefits as $benefit)
                      <div style="background-color: rgb(233, 232, 232)" class="col-lg-12 border our_progress rounded-3 p-5">
                        <div class="row mb-3 align-items-center">
                          <div class="col-lg-4">
                            <label for="service_benefit">Service Benefits</label>
                          </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Plz Fill Service Benefits here" name="service_benefit[]"
                              value="{{ old('service_benefit', $benefit->service_benefit) }}" required>
                            <span class="required">*</span>
                            @error('service_benefit')
                              <span class="error-msg">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="d-flex gap-2 align-items-center justify-content-end">
                          <button type="button" class="btn btn-danger btn-sm remove">Cancel</button>
                        </div>
                      </div>
                    @endforeach
                  @else
                    <div style="background-color: rgb(233, 232, 232)" class="col-lg-12 border our_progress rounded-3 p-5">
                      <div class="row mb-3 align-items-center">
                        <div class="col-lg-4">
                          <label for="service_benefit">Service Benefits</label>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="Plz Fill Service Benefits here" name="service_benefit[]" required>
                          <span class="required">*</span>
                          @error('service_benefit')
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
                <div class="row mt-1">
                  <div class="col-lg-12">
                    <div class="d-flex gap-2 align-items-center justify-content-end">
                      <button type="button" class="btn btn-success" id="cloneButton" data-target="#serviceBenefitsCloneContainer">ADD+</button>
                    </div>
                  </div>
                </div>
              </fieldset>


              <fieldset class="border border-primary p-3 rounded bg-white">
                <legend class="float-none w-auto px-2 text-primary">Frequently Asked Questions about this Service</legend>
                <div id="faqCloneContainer" class="row m-1">

                  @if (isset($edit_data))
                    @foreach ($edit_data->ServiceAskQuestion as $ServiceAskQuestionData)
                      <div style="background-color: rgb(233, 232, 232)" class="col-lg-12 border our_progress rounded-3 p-5">
                        <div class="row mb-3 align-items-center">
                          <div class="col-lg-4">
                            <label for="details_title">Title</label>
                          </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Plz Fill Title here" name="details_title[]"
                              value="{{ old('details_title', $ServiceAskQuestionData->details_title) }}" required>
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
                            <textarea class="form-control" placeholder="Plz Fill Details Description here" name="detail_discription[]">{{ old('detail_discription', $ServiceAskQuestionData->detail_discription ?? '') }}</textarea>
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
                    @endforeach
                  @else
                    <div style="background-color: rgb(233, 232, 232)" class="col-lg-12 border our_progress rounded-3 p-5">
                      <div class="row mb-3 align-items-center">
                        <div class="col-lg-4">
                          <label for="details_title">Title</label>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="Plz Fill Title here" name="details_title[]" required>
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
                          <textarea class="form-control" placeholder="Plz Fill Details Description here" name="detail_discription[]"></textarea>
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
                      <button type="button" class="btn btn-success" id="cloneButton" data-target="#faqCloneContainer">ADD+</button>
                    </div>
                  </div>
                </div>
              </fieldset>


              <div class="form-footer mt-6" style="display: flex; justify-content: flex-end; gap: 10px;">
                <a href="{{ route('servicesinfo.index') }}" class="btn btn-light btn-pill">Cancel</a>
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
    $(document).on('click', '#cloneButton', function() {
      var target = $(this).data('target'); // Get the target container ID
      cloneSection(target);
    });

    function cloneSection(target) {
      var clonedSection = $(target).children().first().clone(); // Clone first child
      clonedSection.find('textarea, input').val(''); // Clear input values
      $(target).append(clonedSection); // Append cloned section
    }

    $(document).on('click', '.remove', function() {
      $(this).closest('.our_progress').remove();
    });
  </script>
@endsection
