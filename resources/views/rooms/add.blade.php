@extends('layout.app')

@section('content')
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

    <!-- BEGIN Header / Add Room -->
    <div id="kt_header" class="header mt-0" data-kt-sticky="true">
        <div class="container d-flex flex-stack flex-wrap gap-4">
            <!-- Page Title -->
            <div class="page-title d-flex flex-column">
                <h1 class="text-gray-900 fw-bold fs-1">Add New Room</h1>
                <span class="text-muted fs-7">Fill the details below to add a new room</span>
            </div>
            <!-- Back to Rooms Button -->
            <div class="d-flex align-items-center">
                <a href="{{ route('rooms.index') }}" class="btn btn-secondary">
                    <i class="ki-duotone ki-arrow-left fs-2"></i> Back to Rooms
                </a>
            </div>
        </div>
    </div>
    <!-- END Header -->

    <!-- BEGIN Content -->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl">

            @if(session('success'))
                <div class="alert alert-success mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Add Room Form Card -->
            <div class="card mb-5">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title fw-bold fs-3 mb-1">Room Details</h3>
                    <span class="text-muted mt-1 fw-semibold fs-7">Enter room information below</span>
                </div>
                <div class="card-body py-3">
                    <form action="{{ route('rooms.store') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label class="form-label fw-semibold">Room Name</label>
                            <input type="text" name="name" class="form-control form-control-solid" placeholder="Enter room name" required>
                        </div>

                        <div class="mb-5">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" class="form-select form-select-solid" required>
                                <option value="">Select status</option>
                                <option value="available">Available</option>
                                <option value="busy">Busy</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light me-3">Reset</button>
                            <button type="submit" class="btn btn-primary">Add Room</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Add Room Form Card -->

        </div>
    </div>
    <!-- END Content -->

</div>
@endsection
