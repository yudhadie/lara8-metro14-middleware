@extends('admin.templates.default')

@section('content')

<div class="content flex-column-fluid" id="kt_content">
    <div class="card">
        <div class="card-body p-5 px-lg-19 py-lg-16">
            <div class="mb-15">
                <h1 class="fs-2x text-dark mb-6">Dashboard</h1>
                <div class="fs-5 text-muted fw-bold">
                    test
                </div>
            </div>
            <div class="row g-10 mb-15">

            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="{{ asset('assets\plugins\custom\bootstrap-notify\bootstrap-notify.min.js') }}"></script>
@include('admin.templates.partials.alert')

@endpush
