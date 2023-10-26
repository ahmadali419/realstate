@extends('admin.layouts.master')
@section('title')
	{{env('APP_NAME')}} | Testimonials
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">



@endsection
@section('content')
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-3">Testimonial List</h5>
      
      <div class="row">
        <div class="col-md-12">
        <div class="dt-buttons btn-group flex-wrap" style="float: right"><button class="btn btn-secondary add-new btn-primary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button"
          data-bs-toggle="modal"
          data-bs-target="#addNewCCModal"><span><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Testimonial</span></span></button> </div>
        </div>
      </div>
    </div>
   
    <div class="card-datatable table-responsive">
      <table class="datatables-users table border-top">
        <thead>
          <tr>
            <th>#Sr</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
            {{-- <th>Plan</th>
            <th>Billing</th>
            <th>Status</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($services as $service)
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>{{ $service->name }}</td>
              <td>{{ $service->description }}</td>
              <td><img src="{{ asset('admin-asset/images/testimonial_images/' . $service->image) }}" width="50" height="50" alt=""></td>
              <td>
                <div class="d-flex align-items-center">
                  <a href="javascript:;" class="text-body edit-record" data-id="{{ $service->id }}"><i class="ti ti-pencil ti-sm mx-2"></i></a>

                 <a href="{{ route('testimonial.testimonialDelete', ['id' => $service->id]) }}" class="text-body delete-record"  onclick="return confirm('Are you sure you want to delete this record?')"><i class="ti ti-trash ti-sm mx-2"></i></a>

                </div>
              </td>
              {{-- <td><img src="" alt=""></td> --}}
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- Offcanvas to add new user -->

  </div>

  <div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3 class="mb-2">Add New Testimonial</h3>
          </div>
          <form id="addNewForm" enctype="multipart/form-data" class="row g-3" onsubmit="return false">
            @csrf
            <input type="hidden" name="id" value="" id="category-id">
            <div class="col-12 col-md-12">
              <label class="form-label" for="categoryName">Name</label>
              <input type="text" name="name" id="categoryName" class="form-control" placeholder="John Doe" />
            </div>
            <div class="col-12">
                <div class="fallback">
                  <input name="image" type="file" class="form-control" />
                </div> 
            </div>
            <div class="col-12 col-md-12">
              <label class="form-label" for="description">Description</label>
              <div class="input-group input-group-merge">
                <textarea name="description" id="description" class="form-control" cols="10" rows="10"></textarea>
              </div>
            </div>
        
          
            <div class="col-12 text-center mt-2">
              <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit" id="addBtn">Submit</button>
              <button
                type="reset"
                class="btn btn-label-secondary btn-reset"
                data-bs-dismiss="modal"
                aria-label="Close">
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
{{-- <script src="{{ asset('admin-asset/js/app-user-list.js') }}"></script> --}}
<script src="{{ asset('admin-asset/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('admin-asset/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

{{-- <script src="{{ asset('admin-asset/js/forms-file-upload.js') }}"></script> --}}


<script>
$(document).ready(function() {
  $('.datatables-users').DataTable();
});
Dropzone.options.myDropzone = {
    paramName: "file", // The name that will be used for the uploaded file
    maxFilesize: 2, // Max file size in MB
    acceptedFiles: ".jpg, .jpeg, .png, .gif", // Accepted file types
  };

  $(document).on('click', '.edit-record', function() {
    var userId = $(this).data('id');
    
    // Fetch user data via AJAX based on userId and populate the form fields
    // Replace the following lines with your own AJAX logic
    var url = "{{ route('testimonial.testimonialEdit', ['id' => ':id']) }}";
    url = url.replace(':id', userId);
    $.ajax({
        url: url,
        method: 'GET',
        success: function(data) {
            $('#category-id').val(data.id);
            $('#categoryName').val(data.name);
            $('#description').val(data.description);
            // $('#address').val(data.address);
            // $('#add-user-contact').val(data.mobile);
            // $('#password-field').css('display', 'none');
            // $('#user-role').val(data.role_id);


            // Populate other fields
        }
    });

    // Show the offcanvas
    $('#addNewCCModal').modal('show');
});

  $(document).on('submit', '#addNewForm', function(event) {
    event.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        type: 'POST',
        url: '{{ route('testimonial.testimonialStore') }}',
        data: formData,
        processData: false,  // Don't process the data
        contentType: false,  // Don't set content type
        success: function(response) {
            if (response.status === true) {
                // Handle the success response
                toastr.success(response.message, 'Success');
                $('#addNewCCModal').modal('hide');
                // Reload the page after a 3-second delay
                setTimeout(function() {
                    location.reload();
                }, 3000); // 3000 milliseconds = 3 seconds
            } else {
                // Handle validation errors
                var errors = response.message;
                // Clear previous error messages
                toastr.clear();

                // Display validation errors using Toastr
                $.each(errors, function(field, messages) {
                    $.each(messages, function(index, message) {
                        toastr.error(message, 'Validation Error');
                    });
                });
            }
        }
    });
});


</script>
@endsection