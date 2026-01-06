@extends('backend.layouts.master')
@section('title')
  @lang('translation.Form_Advanced_Plugins')
@endsection
@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
@endsection

@section('content')
  @component('backend.common-components.breadcrumb')
    @slot('BrRoute')
      {{ route('image_gallery.index') }}
    @endslot
    @slot('pagetitle')
      Gallery Image List
    @endslot
    @slot('title')
      {{ isset($edit_data) ? 'Gallery Image Edit' : 'Gallery Image Create' }}
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
            <form action="{{ route('image_gallery.store') }}" class="dropzone" id="image-dropzone">
              @csrf
              <input type="hidden" name="uploaded_files" id="uploaded-files">
            </form>

            <div class="form-footer mt-6" style="display: flex; justify-content: flex-end; gap: 10px;">
              <a href="{{ route('image_gallery.index') }}" class="btn btn-light btn-pill">Cancel</a>
              <button type="button" id="submit-button" class="btn btn-primary btn-pill">Submit</button>
            </div>

            <!-- Image Gallery -->
            <fieldset class="border border-primary p-3 rounded bg-white">
              <legend class="float-none w-auto px-2 text-primary">Image Gallery</legend>
              <div class="row">
                @foreach ($images as $image)
                  <div class="col-md-4 mb-3">
                    <a href="{{ asset('storage/' . $image->image_path) }}" class="gallery-item">
                      <div class="card">
                        <img src="{{ asset('storage/' . $image->image_path) }}" class="card-img-top"
                          style="width: 100%; height: 200px; object-fit: cover;" alt="Gallery Image">
                      </div>
                    </a>
                  </div>
                @endforeach
              </div>
            </fieldset>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      let uploadedFiles = []; // Store uploaded file paths
      let dropzone = new Dropzone("#image-dropzone", {
        url: "{{ route('image_gallery.store') }}", // Direct upload URL
        paramName: "file",
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        autoProcessQueue: false, // Disable auto upload
        uploadMultiple: false, // Upload one file at a time
        parallelUploads: 10, // Allow multiple files in queue
        maxFilesize: 5, // Max file size in MB
        headers: {
          "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
        },
        init: function() {
          let myDropzone = this;

          document.getElementById("submit-button").addEventListener("click", function(e) {
            e.preventDefault();

            if (myDropzone.getQueuedFiles().length > 0) {
              myDropzone.processQueue(); // Start file upload
            } else {
              document.getElementById("image-dropzone").submit(); // If no files, submit the form
            }
          });

          // When a file is successfully uploaded
          this.on("success", function(file, response) {
            uploadedFiles.push(response.image_path); // Store uploaded file path
            document.getElementById("uploaded-files").value = JSON.stringify(uploadedFiles);
          });

          // When all files are uploaded, submit the form
          this.on("queuecomplete", function() {
            document.getElementById("image-dropzone").submit();
          });
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.gallery-item').magnificPopup({
        type: 'image',
        gallery: {
          enabled: true, // Enables next & previous buttons
          navigateByImgClick: true,
        },
        zoom: {
          enabled: true, // Enables zoom effect
          duration: 300 // Animation duration
        }
      });
    });
  </script>
@endsection
