@extends('admin.layouts.master')
@section('title')
	{{env('APP_NAME')}} | Roles
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
      <h5 class="card-title mb-3">Roles List</h5>
      
  
    </div>
   
    <div class="card-datatable table-responsive">
      <table class="datatables-users table border-top">
        <thead>
          <tr>
            <th>#Sr</th>
            <th>Role</th>
            {{-- <th>Plan</th>
            <th>Billing</th>
            <th>Status</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>{{ $role->name }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- Offcanvas to add new user -->

  </div>
@endsection

@section('js')
{{-- <script src="{{ asset('admin-asset/js/app-user-list.js') }}"></script> --}}
<script src="{{ asset('admin-asset/vendor/libs/cleavejs/cleave.js') }}"></script>
<script src="{{ asset('admin-asset/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
  $('.datatables-users').DataTable();
});

</script>
@endsection