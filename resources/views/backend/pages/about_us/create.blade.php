@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('about_us.index') }}
    @endslot
    @slot('pagetitle')
      About us Information List
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'About us Information Edit' : 'About us Information Create' }}
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
              action="{{ isset($edit_data) ? route('about_us.update', $edit_data->id) : route('about_us.store') }}" enctype = "multipart/form-data">
              @csrf
              @if (isset($edit_data))
                @method('PUT')
              @endif
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="about_us_top_discription">About us Top Discription</label>
                </div>
                <div class="col-lg-8">
                  <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Services Top Discription here" name="about_us_top_discription">{!! isset($edit_data) ? $edit_data->about_us_top_discription : '' !!}</textarea>
                  <span class="required">*</span>
                    @error('about_us_top_discription')
                      <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>
              </div>

              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="about_us_first_image_path">About us First Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="about_us_first_image_path" type="file" class="form-control">
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  {{-- <span class="required">*</span> --}}
                  @if (isset($edit_data->about_us_first_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->about_us_first_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->about_us_first_image_path) }}" alt="Photo"
                          style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('about_us_first_image_path')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3 align-items-center">
                <div class="col-lg-4">
                  <label for="about_us_second_image_path">About us Second Image</label>
                </div>
                <div class="col-lg-8">
                  <input name="about_us_second_image_path" type="file" class="form-control">
                  <span class="suggetion-text">File type JPG, PNG, SVG</span>
                  {{-- <span class="required">*</span> --}}
                  @if (isset($edit_data->about_us_second_image_path))
                    <div class="mt-2">
                      <a href="{{ asset('storage/' . $edit_data->about_us_second_image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $edit_data->about_us_second_image_path) }}" alt="Photo"
                          style="height: 80px; width: 100px;">
                      </a>
                    </div>
                  @endif
                  @error('about_us_second_image_path')
                    <span class="error-msg">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              {{-- Explore Our Card Section start --}}
              <fieldset class="border border-primary p-3 rounded bg-white">
                <legend class="float-none w-auto px-2 text-primary">Explore Our Card Section</legend>
                <div id="faqCloneContainer" class="row m-1">
                  @if (isset($edit_data))
                    @foreach ($edit_data->AboutUsCardInfo as $cardInfo)
                      <div style="background-color: rgb(233, 232, 232)" class="col-lg-12 border our_progress rounded-3 p-5">
                        <div class="row mb-3 align-items-center">
                          <div class="col-lg-4">
                            <label for="about_us_card_title">Card Title</label>
                          </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Plz Fill Card Title here" name="about_us_card_title[]"
                              value="{{ old('about_us_card_title', $cardInfo->about_us_card_title) }}" required>
                            <span class="required">*</span>
                            @error('about_us_card_title')
                              <span class="error-msg">{{ $message }}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="row mb-3 align-items-center">
                          <div class="col-lg-4">
                            <label for="about_us_card_discription">Card Description</label>
                          </div>
                          <div class="col-lg-8">
                            <textarea class="form-control" placeholder="Plz Fill Card Description here" name="about_us_card_discription[]">{{ old('about_us_card_discription', $cardInfo->about_us_card_discription ?? '') }}</textarea>
                            <span class="required">*</span>
                            @error('about_us_card_discription')
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
                          <label for="about_us_card_title">Card Title</label>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="Plz Fill Card Title here" name="about_us_card_title[]" required>
                          <span class="required">*</span>
                          @error('about_us_card_title')
                            <span class="error-msg">{{ $message }}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3 align-items-center">
                        <div class="col-lg-4">
                          <label for="about_us_card_discription">Card Description</label>
                        </div>
                        <div class="col-lg-8">
                          <textarea class="form-control" placeholder="Plz Fill Card Description here" name="about_us_card_discription[]"></textarea>
                          <span class="required">*</span>
                          @error('about_us_card_discription')
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
              {{-- Explore Our Card Section end --}}

              {{-- Explore Our Feature Section start --}}
              <fieldset class="border border-primary p-3 rounded bg-white">
                <legend class="float-none w-auto px-2 text-primary">Explore Our Feature Section</legend>
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-4">
                    <label for="about_us_feature_title">Feature Title</label>
                  </div>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" placeholder="Plz Fill Feature Title here" name="about_us_feature_title"
                      value="{{isset($edit_data) ? $edit_data->about_us_feature_title : '' }}" required>
                    <span class="required">*</span>
                    @error('about_us_feature_title')
                      <span class="error-msg">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div id="serviceBenefitsCloneContainer" class="row m-1">
                  @if (isset($edit_data))
                    @foreach ($edit_data->AboutUsFeatureInfo as $FeatureInfo)
                      <div style="background-color: rgb(233, 232, 232)" class="col-lg-12 border our_progress rounded-3 p-5">
                        <div class="row mb-3 align-items-center">
                          <div class="col-lg-4">
                            <label for="about_us_feature">Feature</label>
                          </div>
                          <div class="col-lg-8">
                            <input type="text" class="form-control" placeholder="Plz Fill Feature here" name="about_us_feature[]"
                              value="{{ old('about_us_feature', $FeatureInfo->about_us_feature) }}" required>
                            <span class="required">*</span>
                            @error('about_us_feature')
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
                          <label for="about_us_feature">Feature</label>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="Plz Fill Feature here" name="about_us_feature[]" required>
                          <span class="required">*</span>
                          @error('about_us_feature')
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
                <div class="row m-1">
                  <div class="col-lg-12">
                    <div class="d-flex gap-2 align-items-center justify-content-end">
                      <button type="button" class="btn btn-success" id="cloneButton" data-target="#serviceBenefitsCloneContainer">ADD+</button>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-4">
                    <label for="about_us_feature_description">Feature Description</label>
                  </div>
                  <div class="col-lg-8">
                    <textarea id="myeditor" class="form-control" placeholder="Plz Fill Feature Description here" name="about_us_feature_description">{!! isset($edit_data) ? $edit_data->about_us_feature_description : '' !!}</textarea>
                    <span class="required">*</span>
                    @error('about_us_feature_description')
                      <span class="error-msg">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </fieldset>
              {{-- Explore Our Feature Section start --}}

              {{-- Why Choose Us Section start --}}
              @isset($edit_data)
                @php
                  $topic_title = json_decode($edit_data->topic_title, true);
                  $percentage_value = json_decode($edit_data->percentage_value, true);
                @endphp
              @endisset
              <fieldset class="border border-primary p-3 rounded bg-white">
                <legend class="float-none w-auto px-2 text-primary">Why Choose Us Section</legend>
                <div class="row mb-3 align-items-center">
                  <div class="col-lg-4">
                    <label for="why_choose_us_description">Top Discription</label>
                  </div>
                  <div class="col-lg-8">
                    <textarea id="myeditor" type="text" class="form-control" placeholder="Plz Fill Services Card Discription here"
                      name="why_choose_us_description">{!! isset($edit_data) ? $edit_data->why_choose_us_description : '' !!}</textarea>
                    <span class="required">*</span>
                    @error('why_choose_us_description')
                      <span class="error-msg">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3 align-items-center">
                  <!-- Left Column -->
                  <div class="col-lg-6">
                    <div class="row mb-3 align-items-center">
                      <div class="col-lg-4">
                        <label for="first_title">Title</label>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" id="first_title" class="form-control" placeholder="Plz Fill First Title value here"
                          name="topic_title[first_title]" value="{{ old('topic_title.first_title', $topic_title['first_title'] ?? '') }}" required>
                        <span class="required">*</span>
                        @error('topic_title.first_title')
                          <span class="error-msg text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <!-- Right Column -->
                  <div class="col-lg-6">
                    <div class="row mb-3 align-items-center">
                      <div class="col-lg-4">
                        <label for="first_percentage_value">Percentage Value(%)</label>
                      </div>
                      <div class="col-lg-8">
                        <input type="number" id="first_percentage_value" class="form-control" placeholder="Plz Fill First Percentage Value(%) here"
                          name="percentage_value[first_percentage_value]"
                          value="{{ old('percentage_value.first_percentage_value', $percentage_value['first_percentage_value'] ?? '') }}" required>
                        <span class="required">*</span>
                        @error('percentage_value.first_percentage_value')
                          <span class="error-msg text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 align-items-center">
                  <!-- Left Column -->
                  <div class="col-lg-6">
                    <div class="row mb-3 align-items-center">
                      <div class="col-lg-4">
                        <label for="second_title">Title</label>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" id="second_title" class="form-control" placeholder="Plz Fill Second Title value here"
                          name="topic_title[second_title]" value="{{ old('topic_title.second_title', $topic_title['second_title'] ?? '') }}"
                          required>
                        <span class="required">*</span>
                        @error('topic_title.second_title')
                          <span class="error-msg text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <!-- Right Column -->
                  <div class="col-lg-6">
                    <div class="row mb-3 align-items-center">
                      <div class="col-lg-4">
                        <label for="second_percentage_value">Percentage Value(%)</label>
                      </div>
                      <div class="col-lg-8">
                        <input type="number" id="second_percentage_value" class="form-control"
                          placeholder="Plz Fill Second Percentage Value(%) here" name="percentage_value[second_percentage_value]"
                          value="{{ old('percentage_value.second_percentage_value', $percentage_value['second_percentage_value'] ?? '') }}" required>
                        <span class="required">*</span>
                        @error('percentage_value.second_percentage_value')
                          <span class="error-msg text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mb-3 align-items-center">
                  <!-- Left Column -->
                  <div class="col-lg-6">
                    <div class="row mb-3 align-items-center">
                      <div class="col-lg-4">
                        <label for="third_title">Title</label>
                      </div>
                      <div class="col-lg-8">
                        <input type="text" id="third_title" class="form-control" placeholder="Plz Fill Third Title value here"
                          name="topic_title[third_title]" value="{{ old('topic_title.third_title', $topic_title['third_title'] ?? '') }}" required>
                        <span class="required">*</span>
                        @error('topic_title.third_title')
                          <span class="error-msg text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <!-- Right Column -->
                  <div class="col-lg-6">
                    <div class="row mb-3 align-items-center">
                      <div class="col-lg-4">
                        <label for="third_percentage_value">Percentage Value(%)</label>
                      </div>
                      <div class="col-lg-8">
                        <input type="number" id="third_percentage_value" class="form-control" placeholder="Plz Fill Third Percentage Value(%) here"
                          name="percentage_value[third_percentage_value]"
                          value="{{ old('percentage_value.third_percentage_value', $percentage_value['third_percentage_value'] ?? '') }}" required>
                        <span class="required">*</span>
                        @error('percentage_value.second_percentage_value')
                          <span class="error-msg text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>

              </fieldset>
              {{-- Why Choose Us Section end --}}

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
