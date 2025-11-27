@extends('layout.app')

@section('content')
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

    <!-- BEGIN Header / Dashboard -->
    <div id="kt_header" class="header mt-0" data-kt-sticky="true">
        <div class="container d-flex flex-stack flex-wrap gap-4">
            <!-- Page Title -->
            <div class="page-title d-flex flex-column">
                <h1 class="text-gray-900 fw-bold fs-1">Rooms Dashboard</h1>
                <span class="text-muted fs-7">Manage all rooms easily</span>
            </div>
            <!-- Add Room Button -->
            <div class="d-flex align-items-center">
                <a href="{{ route('rooms.create') }}" class="btn btn-primary">
                    <i class="ki-duotone ki-plus fs-2"></i> Add Room
                </a>
            </div>
        </div>
    </div>
    <!-- END Header -->

    <!-- BEGIN Content -->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container-xxl">

            @if($rooms->isEmpty())
                <div class="card-px text-center pt-15 pb-15">
                    <h2 class="fs-2x fw-bold mb-0">No Rooms Found</h2>
                    <p class="text-gray-500 fs-4 fw-semibold py-7">
                        You haven't added any rooms yet. Click the button below to add your first room.
                    </p>
                    <a href="{{ route('rooms.create') }}" class="btn btn-primary fs-6 px-8 py-4">Add Room</a>
                </div>
            @else
                <!-- Rooms Table -->
                <div class="card mb-5">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title fw-bold fs-3 mb-1">Rooms List</h3>
                        <span class="text-muted mt-1 fw-semibold fs-7">Total: {{ $rooms->count() }}</span>
                    </div>
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle">
                                <thead>
                                    <tr>
                                        <th class="min-w-200px">Room Name</th>
                                        <th class="min-w-150px">Status</th>
                                        <th class="min-w-125px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rooms as $room)
                                    <tr>
                                        <td>{{ $room->name }}</td>
                                        <td>
                                            <span class="badge py-2 px-3 fs-7 
                                                @if($room->status == 'available') badge-light-success
                                                @elseif($room->status == 'busy') badge-light-danger
                                                @else badge-light-warning @endif">
                                                {{ ucfirst($room->status) }}
                                            </span>
                                        </td>
                                        <td>
    <div class="d-flex">
        <!-- زر التعديل -->
        <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-light btn-sm me-1">
            ediet
        </a>

        <!-- زر الحذف -->
        <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-light btn-sm">
                delete
            </button>
        </form>
    </div>
</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END Rooms Table -->
            @endif

        </div>
    </div>
    <!-- END Content -->

</div>
@endsection
