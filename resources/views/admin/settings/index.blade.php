@extends('admin.layouts.master')
@section('title')
    {{ env('APP_NAME') }} | Settings
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
@endsection
@section('content')
    <!-- Users List Table -->
    <div class="card">


        <div class="card-body">
            <form action="{{ route('setting.settingStore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label d-block" for="image">Favicon</label>
                        <input name="favicon" type="file" class="dropify" data-height="220" data-default-file="{{ isset($settings['favicon']) ? asset('admin-asset/images/settings/' . $settings['favicon'])
                        : '' }}"/>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label d-block" for="image">Logo</label>
                        <input name="logo" type="file" class="dropify" data-height="220" data-default-file="{{ isset($settings['logo']) ?  asset('admin-asset/images/settings/' . $settings['logo'])  : '' }}" />
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="address">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="2" placeholder="12, Business Park">{{ isset($settings['address']) ? $settings['address'] : ''   }}</textarea>
                    </div>
                    <div class="col-6">
                        <label class="form-label d-block" for="image">Email</label>

                        <input name="email" type="email" class="form-control" placeholder="Email" value="{{ isset($settings['email']) ? $settings['email'] : ''   }}" />
                    </div>
                    <div class="col-6">
                        <label class="form-label d-block" for="image">Facebook</label>

                        <input name="fb_link" type="url" class="form-control" placeholder="Fb url" value="{{ isset($settings['fb_link']) ? $settings['fb_link'] : ''   }}" />
                    </div>
                    <div class="col-6">
                        <label class="form-label d-block" for="image">Linkedin</label>

                        <input name="linkedin_link" type="url" class="form-control" placeholder="Linkedin url" value="{{ isset($settings['linkedin_link']) ? $settings['linkedin_link'] : ''   }}" />
                    </div>
                    <div class="col-6">
                        <label class="form-label d-block" for="image">Twitter</label>

                        <input name="twitter_link" type="url" class="form-control" placeholder="Twitter url" value="{{ isset($settings['twitter_link']) ? $settings['twitter_link'] : ''   }}" />
                    </div>
                    <div class="col-6">
                        <label class="form-label d-block" for="image">Whtsapp</label>
                        <input name="whtsapp" type="number" class="form-control" placeholder="Whtsapp no" value="{{ isset($settings['whtsapp']) ? $settings['whtsapp'] : ''   }}" />
                    </div>
                    <div class="col-12  mt-2">
                        <div style="float: right">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
                                id="addBtn">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Offcanvas to add new user -->

    </div>
@endsection

@section('js')
    {{-- <script src="{{ asset('admin-asset/js/app-user-list.js') }}"></script> --}}
    <script src="{{ asset('admin-asset/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('admin-asset/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>

    {{-- <script src="{{ asset('admin-asset/js/forms-file-upload.js') }}"></script> --}}


    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        })
    </script>
@endsection
