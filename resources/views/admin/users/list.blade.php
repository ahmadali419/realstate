@extends('admin.layouts.master')
@section('title')
	{{env('APP_NAME')}} | Users
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">

@endsection
@section('content')
  <!-- Users List Table -->
  <div class="card">
    <div class="card-header border-bottom">
      <h5 class="card-title mb-3">Users List</h5>
      <div class="row">
        <div class="col-md-12">
          <div class="dt-buttons btn-group flex-wrap" style="float: right"><button class="btn btn-secondary add-new btn-primary mx-3" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New User</span></span></button> </div>
        </div>
      </div>
      <div class="d-flex justify-content-between align-items-center row pb-2 gap-3 gap-md-0">
        <div class="col-md-4 user_role"></div>
        <div class="col-md-4 user_plan"></div>
        <div class="col-md-4 user_status"></div>
      </div>
    </div>
   
    <div class="card-datatable table-responsive">
      <table class="datatables-users table border-top">
        <thead>
          <tr>
            <th>#Sr</th>
            <th>Username</th>
            <th>Role</th>
            <th>Phone</th>
            {{-- <th>Plan</th>
            <th>Billing</th>
            <th>Status</th> --}}
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->role->name }}</td>
              <td>{{ $user->mobile }}</td>
              <td>
                <div class="d-flex align-items-center">
                  <a href="javascript:;" class="text-body edit-record" data-id="{{ $user->id }}"><i class="ti ti-pencil ti-sm mx-2"></i></a>

                 <a href="{{ route('user.userDelete', ['id' => $user->id]) }}" class="text-body delete-record"  onclick="return confirm('Are you sure you want to delete this record?')"><i class="ti ti-trash ti-sm mx-2"></i></a>

                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- Offcanvas to add new user -->
    <div
      class="offcanvas offcanvas-end"
      tabindex="-1"
      id="offcanvasAddUser"
      aria-labelledby="offcanvasAddUserLabel">
      <div class="offcanvas-header">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
        <button
          type="button"
          class="btn-close text-reset"
          data-bs-dismiss="offcanvas"
          aria-label="Close"></button>
      </div>
      <div class="offcanvas-body mx-0 flex-grow-0 pt-0 h-100">
        <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
          <div class="mb-3">
            <input type="hidden" id="user-id" name="id" value="">
            @csrf
            <label class="form-label" for="add-user-fullname">Username</label>
            <input
              type="text"
              class="form-control"
              id="add-user-fullname"
              placeholder="John Doe"
              name="username"
              aria-label="John Doe" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="add-user-email">Email</label>
            <input
              type="text"
              id="add-user-email"
              class="form-control"
              placeholder="john.doe@example.com"
              aria-label="john.doe@example.com"
              name="email"  />
          </div>
          <div class="mb-3" id="password-field">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-merge">
              <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="passwordToggler" >
              <span id="passwordToggler" class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="add-user-contact">Contact</label>
            <input
              type="number"
              id="add-user-contact"
              class="form-control phone-mask"
              placeholder="+1 (609) 988-44-11"
              aria-label="john.doe@example.com"
              name="mobile" />
          </div>
          <div class="mb-3">
            <label class="form-label" for="user-role">User Role</label>
            <select id="user-role" name="role_id" class="form-select">
              <option value="">Select</option>
              @foreach ($roles as $role)
              <option value="{{ $role->id }}">{{ $role->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="address">Address</label>
            <textarea id="address" name="address" class="form-control" rows="2" placeholder="12, Business Park" ></textarea>
          </div>
          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
{{-- <script src="{{ asset('admin-asset/js/app-user-list.js') }}"></script> --}}
<script src="{{ asset('admin-asset/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('admin-asset/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {

  $(document).on('click', '.edit-record', function() {
    var userId = $(this).data('id');
    
    // Fetch user data via AJAX based on userId and populate the form fields
    // Replace the following lines with your own AJAX logic
    var url = "{{ route('user.userEdit', ['id' => ':id']) }}";
    url = url.replace(':id', userId);
    $.ajax({
        url: url,
        method: 'GET',
        success: function(data) {
            $('#user-id').val(data.id);
            $('#add-user-fullname').val(data.username);
            $('#add-user-email').val(data.email);
            $('#address').val(data.address);
            $('#add-user-contact').val(data.mobile);
            $('#password-field').css('display', 'none');
            $('#user-role').val(data.role_id);


            // Populate other fields
        }
    });

    // Show the offcanvas
    $('#offcanvasAddUser').offcanvas('show');
});
  $('.datatables-users').DataTable();
 
    $('#addNewUserForm').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: '{{ route('user.userStore') }}',
            data: formData,
            success: function(response) {
              console.log('stast',response);
                if (response.status === true) {
                    // Handle the success response
                    toastr.success(response.message, 'Success');
                    $('#offcanvasAddUser').offcanvas('hide');
                    // Reload the page after a 3-second delay
                    setTimeout(function() {
                        location.reload();
                    }, 3000); // 3000 milliseconds = 3 seconds

                } else {
                    // Handle validation errors
                    var errors = response.message;
                    // Clear previous error messages
                    toastr.clear();

                    // Display validation/ errors using Toastr
                    $.each(errors, function(field, messages) {
                      console.log(messages)
                        $.each(messages, function(index, message) {
                            toastr.error(message, 'Validation Error');
                        });
                    });
                }
            }
            
        });
    });
});

</script>
@endsection