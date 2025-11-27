@extends('layout.app')

@section('content')
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

    <!-- BEGIN Header -->
    <div id="kt_header" class="header mt-0" data-kt-sticky="true">
        <div class="container d-flex flex-stack flex-wrap gap-4">
            <!-- Page Title -->
            <div class="page-title d-flex flex-column">
                <h1 class="text-gray-900 fw-bold fs-1">Delete Room</h1>
                <span class="text-muted fs-7">Confirm deleting the selected room</span>
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

            <!-- Confirmation Card -->
            <div class="card shadow-sm mt-10">

                <div class="card-header">
                    <h3 class="card-title fw-bold fs-3">Are you sure?</h3>
                </div>

                <div class="card-body">
                    <p class="fs-5 text-gray-700">
                        You are about to delete the room:
                        <strong class="text-danger">{{ $room->name }}</strong>
                    </p>

                    <div class="alert alert-danger d-flex align-items-center mt-5">
                        <i class="ki-duotone ki-information-2 fs-2 me-3"></i>
                        <span class="fs-6 fw-semibold">
                            This action cannot be undone. Are you sure you want to continue?
                        </span>
                    </div>

                    <!-- Delete Form -->
                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="mt-5">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger me-3">
                            Yes, Delete
                        </button>

                        <a href="{{ route('rooms.index') }}" class="btn btn-secondary">
                            Cancel
                        </a>
                    </form>

                </div>

            </div>
            <!-- END Confirmation Card -->

        </div>
    </div>
    <!-- END Content -->

</div>
@endsection
