@extends('admin.layouts.master')
@section('title')
	{{env('APP_NAME')}} | Properties
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
      <h5 class="card-title mb-3">Property List</h5>
      <div class="row">
        <div class="col-md-12">
          <div class="dt-buttons btn-group flex-wrap" style="float: right"><a class="btn btn-secondary add-new btn-primary mx-3" tabindex="0" href="{{ route('property.propertyCreate') }}" aria-controls="DataTables_Table_0"  ><span><i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span class="d-none d-sm-inline-block">Add New Property</span></span></a> </div>
        </div>
      </div>
  
    </div>
   
    <div class="card-datatable table-responsive">
      <table class="datatables-users table border-top">
        <thead>
          <tr>
            <th>#Sr</th>
            <th>Title</th>
            <th>Type</th>
            <th>Category</th>
            <th>Bedrooms</th>
            <th>Bathrooms</th>
            <th>Area (sqf)</th>
            <th>Area (sqm)</th>
            <th>Price (sqf)</th>
            <th>Price (sqm)</th>
            <th>Furnished</th>
            <th>Rental Period</th>
            <th>Parking Lots</th>
            <th>Actions</th>
            {{-- <th>Plan</th>
            <th>Billing</th>
            <th>Status</th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach ($properties as $property)
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>{{ $property->title }}</td>
              <td>{{ $property->type ?? '' }}</td>
              <td>{{ $property->category->name ?? '' }}</td>
              <td>{{ $property->bedroom ?? '' }}</td>
              <td>{{ $property->bathroom ?? '' }}</td>
              <td>{{ $property->area_sqm ?? '' }}</td>
              <td>{{ $property->area_sqf ?? '' }}</td>
              <td>{{ $property->price_sqf ?? '' }}</td>
              <td>{{ $property->price_sqm ?? '' }}</td>
              <td>{{ $property->furnished_status }}</td>
              <td>{{ $property->rental_period }}</td>
              <td>{{ $property->parking_lots }}</td>
              <td>
                <div class="d-flex align-items-center">
                  <a href="{{ route('property.propertyEdit', ['id' => $property->id]) }}" class="text-body edit-record" data-id="{{ $property->id }}"><i class="ti ti-pencil ti-sm mx-2"></i></a>

                 <a href="{{ route('property.propertyDelete', ['id' => $property->id]) }}" class="text-body delete-record"  onclick="return confirm('Are you sure you want to delete this record?')"><i class="ti ti-trash ti-sm mx-2"></i></a>

                </div>
              </td>
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