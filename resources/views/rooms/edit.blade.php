@extends('layout.app')

@section('content')
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

    <!-- BEGIN Header -->
    <div id="kt_header" class="header mt-0" data-kt-sticky="true">
        <div class="container d-flex flex-stack flex-wrap gap-4">
            <!-- Page Title -->
            <div class="page-title d-flex flex-column">
                <h1 class="text-gray-900 fw-bold fs-1">Edit Room</h1>
                <span class="text-muted fs-7">Modify details of the selected room</span>
            </div>

            <!-- Back Button -->
            <div class="d-flex align-items-center">
                <a href="{{ route('rooms.index') }}" class="btn btn-light">
                    <i class="ki-duotone ki-arrow-left fs-2"></i> Back
                </a>
            </div>
        </div>
    </div>
    <!-- END Header -->

    <!-- BEGIN Content -->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl">

            <!-- Edit Card -->
            <div class="card shadow-sm mt-10">

                <div class="card-header">
                    <h3 class="card-title fw-bold fs-3">Edit Room Details</h3>
                </div>

                <div class="card-body">
                    <!-- show validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger mb-5">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('rooms.update', $room->id) }}" method="POST" class="mt-5">
                        @csrf
                        @method('PUT')

                        <!-- Room Name -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Room Name</label>
                            <input type="text" name="name" value="{{ old('name', $room->name) }}"
                                   class="form-control form-control-solid" required>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" class="form-select form-select-solid">
                                <option value="available" {{ old('status', $room->status) == 'available' ? 'selected' : '' }}>Available</option>
                                <option value="busy" {{ old('status', $room->status) == 'busy' ? 'selected' : '' }}>Busy</option>
                                <option value="maintenance" {{ old('status', $room->status) == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="mt-6">
                            <button type="submit" class="btn btn-primary me-3">
                                Save Changes
                            </button>

                            <a href="{{ route('rooms.index') }}" class="btn btn-light">
                                Cancel
                            </a>
                        </div>
                    </form>

                </div>

            </div>
            <!-- END Edit Card -->

        </div>
    </div>
    <!-- END Content -->

</div>
@endsection
