@extends('admin.layouts.master')
@section('title')
    {{ env('APP_NAME') }} | Properties
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/tagify/tagify.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <!-- Include Dropzone.js and CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">


    {{-- <link rel="stylesheet" href="{{ asset('admin-asset/vendor/libs/dropzone/dropzone.css') }}" /> --}}
@endsection
@section('content')
    <!-- Users List Table -->
    <form id="addNewForm" method="POST">
        @csrf
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">{{ isset($property) ? 'Edit Property' : 'Add Property' }}</h5>
                <div class="row">
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ isset($property->title) ? $property->title : '' }}" placeholder="John Doe" />
                    </div>
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label" for="plPropertyType">Property Type</label>
                        <select id="plPropertyType" name="category_id" class="select2 form-select" data-allow-clear="true">
                            <option value="">Select Property Type</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ isset($property->category_id) && $property->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label" for="purpose">Purpose</label>
                        <select id="purpose" name="purpose" class="select2 form-select" data-allow-clear="true">
                            <option value="">Select Purpose</option>
                            <option value="Rent"
                                {{ isset($property->type) && $property->type == 'Rent' ? 'selected' : '' }}>Rent</option>
                            <option value="Sale"
                                {{ isset($property->type) && $property->type == 'Buy' ? 'selected' : '' }}>Buy</option>
                        </select>
                    </div>
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label" for="zip_code">Zip Code</label>
                        <input type="number" id="zip_code" name="zip_code"
                            value="{{ isset($property->zip_code) ? $property->zip_code : '' }}" class="form-control"
                            placeholder="99950" />
                    </div>
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label" for="plCountry">Country</label>
                        <select id="country" name="country" class="select2 form-select" data-allow-clear="true">
                            <option value="">Select</option>
                            <option value="Australia"
                                {{ isset($property->country) && $property->country == 'Australia' ? 'selected' : '' }}>
                                Australia</option>
                            <option value="Bangladesh"
                                {{ isset($property->country) && $property->country == 'Bangladesh' ? 'selected' : '' }}>
                                Bangladesh</option>
                            <option value="Belarus"
                                {{ isset($property->country) && $property->country == 'Belarus' ? 'selected' : '' }}>
                                Belarus</option>
                            <option value="Brazil"
                                {{ isset($property->country) && $property->country == 'Brazil' ? 'selected' : '' }}>Brazil
                            </option>
                            <option value="Canada"
                                {{ isset($property->country) && $property->country == 'Canada' ? 'selected' : '' }}>Canada
                            </option>
                            <option value="China"
                                {{ isset($property->country) && $property->country == 'China' ? 'selected' : '' }}>China
                            </option>
                            <option value="France"
                                {{ isset($property->country) && $property->country == 'France' ? 'selected' : '' }}>France
                            </option>
                            <option value="Germany"
                                {{ isset($property->country) && $property->country == 'Germany' ? 'selected' : '' }}>
                                Germany</option>
                            <option value="India"
                                {{ isset($property->country) && $property->country == 'India' ? 'selected' : '' }}>India
                            </option>
                            <option value="Indonesia"
                                {{ isset($property->country) && $property->country == 'Indonesia' ? 'selected' : '' }}>
                                Indonesia</option>
                            <option value="Israel"
                                {{ isset($property->country) && $property->country == 'Israel' ? 'selected' : '' }}>Israel
                            </option>
                            <option value="Italy"
                                {{ isset($property->country) && $property->country == 'Italy' ? 'selected' : '' }}>Italy
                            </option>
                            <option value="Japan"
                                {{ isset($property->country) && $property->country == 'Japan' ? 'selected' : '' }}>Japan
                            </option>
                            <option value="Korea"
                                {{ isset($property->country) && $property->country == 'Korea' ? 'selected' : '' }}>Korea,
                                Republic of</option>
                            <option value="Mexico"
                                {{ isset($property->country) && $property->country == 'Mexico' ? 'selected' : '' }}>Mexico
                            </option>
                            <option value="Philippines"
                                {{ isset($property->country) && $property->country == 'Philippines' ? 'selected' : '' }}>
                                Philippines</option>
                            <option value="Russia"
                                {{ isset($property->country) && $property->country == 'Russia' ? 'selected' : '' }}>Russian
                                Federation</option>
                            <option value="South Africa"
                                {{ isset($property->country) && $property->country == 'South Africa' ? 'selected' : '' }}>
                                South Africa</option>
                            <option value="Thailand"
                                {{ isset($property->country) && $property->country == 'Thailand' ? 'selected' : '' }}>
                                Thailand</option>
                            <option value="Turkey"
                                {{ isset($property->country) && $property->country == 'Turkey' ? 'selected' : '' }}>Turkey
                            </option>
                            <option value="Ukraine"
                                {{ isset($property->country) && $property->country == 'Ukraine' ? 'selected' : '' }}>
                                Ukraine</option>
                            <option value="United Arab Emirates"
                                {{ isset($property->country) && $property->country == 'United Arab Emirates' ? 'selected' : '' }}>
                                United Arab Emirates</option>
                            <option value="United Kingdom"
                                {{ isset($property->country) && $property->country == 'United Kingdom' ? 'selected' : '' }}>
                                United Kingdom</option>
                            <option value="United States"
                                {{ isset($property->country) && $property->country == 'United States' ? 'selected' : '' }}>
                                United States</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label" for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control"
                            value="{{ isset($property->city) ? $property->city : '' }}" placeholder="Los Angeles" />
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label" for="address">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="2" placeholder="12, Business Park">{{ isset($property->address) ? $property->address : '' }}</textarea>
                    </div>

                </div>


                <!-- Offcanvas to add new user -->

            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Property Features</h5>
                <div class="row">
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label d-block" for="bedrooms">Bedrooms</label>
                        <input type="number" id="bedrooms" name="bedrooms"
                            value="{{ isset($property->bedroom) ? $property->bedroom : '' }}" class="form-control"
                            placeholder="3" />
                    </div>
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label" for="bathrooms">Bathrooms</label>
                        <input type="number" id="bathrooms" name="bathrooms"
                            value="{{ isset($property->bathroom) ? $property->bathroom : '' }}" class="form-control"
                            placeholder="12" />
                    </div>
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label" for="furnished_status">Furnished Status</label>
                        <select id="furnished_status" name="furnished_status" class="form-select">
                            <option selected disabled value="">Select furnished status</option>
                            <option value="Furnished"
                                {{ isset($property->furnished_status) && $property->furnished_status == 'Furnished' ? 'selected' : '' }}>
                                Furnished</option>
                            <option value="Unfurnished"
                                {{ isset($property->furnished_status) && $property->furnished_status == 'Unfurnished' ? 'selected' : '' }}>
                                Unfurnished</option>
                        </select>
                    </div>
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label" for="parking_lots">Parking Lots</label>
                        <input type="number" id="parking_lots"
                            value="{{ isset($property->parking_lots) ? $property->parking_lots : '' }}"
                            name="parking_lots" class="form-control" placeholder="12" />

                    </div>
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label" for="rental_period">Rental Period</label>
                        <input type="text" id="rental_period" name="rental_period"
                            value="{{ isset($property->rental_period) ? $property->rental_period : '' }}"
                            class="form-control" placeholder="1 year" />

                    </div>
                    <div class="col-sm-12 fv-plugins-icon-container">
                        <label class="form-label" for="plFurnishingDetails">Features</label>
                        <input id="plFurnishingDetails" name="features" class="form-control"
                            placeholder="select options" value="" />

                    </div>
                    <div class="col-lg-12 mb-2">
                        <label class="form-label" for="address">Near By</label>
                        <textarea id="nearby" name="nearby" class="form-control" rows="2" placeholder="12, Business Park">{{ isset($property->near_by) ? $property->near_by : '' }}</textarea>
                    </div>
                    <div class="col-lg-12 mb-2">
                        <label class="form-label" for="address">Description</label>
                        <textarea id="Description" name="Description" class="form-control" rows="2" placeholder="12, Business Park">{{ isset($property->description) ? $property->description : '' }}</textarea>
                    </div>




                </div>


                <!-- Offcanvas to add new user -->

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header border-bottom">
                <h5 class="card-title mb-3">Property Area</h5>
                <div class="row">
                    <div class="col-sm-3">
                        <label class="form-label d-block" for="area_sqf">Total Area</label>
                        <div class="input-group input-group-merge">
                            <input type="number" class="form-control" id="area_sqf" name="area_sqf"
                                value="{{ isset($property->area_sqf) ? $property->area_sqf : '' }}" placeholder="1000"
                                aria-describedby="pl-total-area">
                            <span class="input-group-text" id="pl-total-area">sq-ft</span>
                        </div>
                    </div>
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label d-block" for="area_sqm">Total Area</label>
                        <div class="input-group input-group-merge">
                            <input type="number" class="form-control" id="area_sqm"
                                value="{{ isset($property->area_sqm) ? $property->area_sqm : '' }}" name="area_sqm"
                                placeholder="1000" aria-describedby="pl-total-area">
                            <span class="input-group-text" id="pl-total-area">sq-m</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label class="form-label d-block" for="price_sqf">Price</label>
                        <div class="input-group input-group-merge">
                            <input type="number" class="form-control" id="price_sqf"
                                value="{{ isset($property->price_sqf) ? $property->price_sqf : '' }}" name="price_sqf"
                                placeholder="1000" aria-describedby="pl-total-area">
                            <span class="input-group-text" id="pl-total-area">sq-ft</span>
                        </div>
                    </div>
                    <div class="col-sm-3 fv-plugins-icon-container">
                        <label class="form-label d-block" for="price_sqm">Price</label>
                        <div class="input-group input-group-merge">
                            <input type="number" class="form-control" id="price_sqm"
                                value="{{ isset($property->price_sqm) ? $property->price_sqm : '' }}" name="price_sqm"
                                placeholder="1000" aria-describedby="pl-total-area">
                            <span class="input-group-text" id="pl-total-area">sq-m</span>
                        </div>
                    </div>
                </div>


                <!-- Offcanvas to add new user -->

            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header border-bottom">
                <input type="hidden" name="id" value="{{ isset($property->id) ? $property->id  : '' }}">
                <h5 class="card-title mb-3">Property Image</h5>
                <div class="row">
                    <div class="col-sm-12">
                        <label class="form-label d-block" for="image">Property Image</label>

                        <input name="image" type="file" class="dropify" data-default-file="{{ isset($property->image) ? asset('admin-asset/images/product_images/'.$property->image) : '' }}" data-height="220" />
                    </div>

                    <div class="col-sm-9">
                        <label class="form-label d-block" for="area_sqf">Property Multiple Images</label>
                        <div class="row py-2" id="coba">
                            @if (isset($property->propertyImages))

                                        @foreach ($property->propertyImages as $key => $photo)
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-6 spartan_item_wrapper">
                                                <img class="img--square" width="50" height="50" src="{{ asset('admin-asset/images/product_images/'.$photo->image)}}"
                                                    alt="Product image">
                                                    <a href="{{ route('property.removeImage', ['id' => $photo->id, 'name' => $photo->image,'property_id'=>$property->id]) }}" class="spartan_remove_row">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    
                                                {{-- <a href="{{route('vendor.item.remove-image',['id'=>$product['id'],'name'=>$photo])}}"
                                    class="spartan_remove_row">
                                    <i class="tio-add-to-trash"></i>
                                </a> --}}
                                            </div>
                                        @endforeach
                                    @endif
                        </div>


                    </div>
                </div>


                <!-- Offcanvas to add new user -->

            </div>

            <div class="row p-5">
                <div class="col-12  mt-2">
                    <div style="float: right">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit"
                            id="addBtn">Submit</button>
                        <button type="reset" class="btn btn-label-secondary btn-reset" data-bs-dismiss="modal"
                            aria-label="Close">
                            Back
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('js')
    {{-- <script src="{{ asset('admin-asset/js/app-user-list.js') }}"></script> --}}
    <script src="{{ asset('admin-asset/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('admin-asset/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin-asset/vendor/libs/tagify/tagify.js') }}"></script>
    {{-- <script src="{{ asset('admin-asset/vendor/libs/dropzone/dropzone.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin-asset/js/forms-file-upload.js') }}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('admin-asset/js/spartan-multi-image-picker.js') }}"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>


    <script>
        $(document).ready(function() {
            const existingFeatureIds = @json($featureIds);

            $("#coba").spartanMultiImagePicker({
                fieldName: 'property_images[]',
                maxCount: 6,
                rowHeight: '120px',
                groupClassName: 'col-6 spartan_item_wrapper',
                maxFileSize: '',
                placeholderImage: {
                    image: "{{ asset('admin-asset/img/pages/img2.jpg') }}",
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function(index, file) {

                },
                onRenderedPreview: function(index) {

                },
                onRemoveRow: function(index) {

                },
                onExtensionErr: function(index, file) {
                    toastr.error(
                        "Please only jpg,png file allowed", {
                            CloseButton: true,
                            ProgressBar: true
                        });
                },
                onSizeErr: function(index, file) {
                    toastr.error("your file size is too big", {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
           





            $('.dropify').dropify();


            const plFurnishingDetailsSuggestionEl = document.querySelector('#plFurnishingDetails');

            if (plFurnishingDetailsSuggestionEl) {
                fetch('/properties/featureListing') // Replace with the actual URL
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log(data);
                        // Handle the JSON data
                        const furnishingList = data.map(item => ({
                            value: item.name,
                            label: item.id
                        }));
                        const plFurnishingDetailsSuggestion = new Tagify(plFurnishingDetailsSuggestionEl, {
                            whitelist: furnishingList,
                            maxTags: 10,
                            dropdown: {
                                maxItems: 20,
                                classname: 'tags-inline',
                                enabled: 0,
                                closeOnSelect: false
                            },
                            callbacks: {
                                add: onTagAdded // You can add a callback to handle tag selection
                            }
                        });
                        const existingFeatures = existingFeatureIds.map(featureId => {
                        const feature = data.find(item => item.id === featureId);
                        if (feature) {
                            return {
                                value: feature.name,
                                label: feature.id
                            };
                        }
                    });
                    plFurnishingDetailsSuggestion.addTags(existingFeatures);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }

            function onTagAdded(e) {
                console.log('e', e);
                // Set the value of the input to the ID of the selected item
                const input = document.getElementById('plFurnishingDetails');
                if (e.detail && e.detail.data) {
                    console.log('e.detail.data.label', e.detail.data.label);
                    input.value = e.detail.data.label;
                }
            }



        });


        $(document).on('submit', '#addNewForm', function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '{{ route('property.propertyStore') }}',
                data: formData,
                processData: false, // Don't process the data
                contentType: false, // Don't set content type
                success: function(response) {
                    if (response.status === true) {
                        var redirectUrl = "{{ route('property.propertyList') }}";
                        // Handle the success response
                        toastr.success(response.message, 'Success');
                        // Reload the page after a 3-second delay
                        setTimeout(function() {
                            window.location.href = redirectUrl;
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
