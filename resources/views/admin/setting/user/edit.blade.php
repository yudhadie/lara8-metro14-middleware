@extends('admin.templates.default')

@section('content')

    @if ($errors->any())
    <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5">
        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
            <div class="row justify-content-md-center">
                <div class="col-lg-8 text-center">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </div>
            </div>
        </div>
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-2x svg-icon-light">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="7.05025" y="15.5356" width="12" height="2" rx="1" transform="rotate(-45 7.05025 15.5356)" fill="black"/>
                    <rect x="8.46447" y="7.05029" width="12" height="2" rx="1" transform="rotate(45 8.46447 7.05029)" fill="black"/>
                </svg>
            </span>
        </button>
    </div>
    @endif

    <div class="content flex-column-fluid" id="kt_content">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">User Detail</h3>
                </div>
            </div>
            <div id="kt_account_settings_profile_details" class="collapse show">
                <form id="modal_form_form"  class="form" action="{{ route('user.update', $user) }}" method="post"enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 fv-row">
                                        <input type="text" name="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $user->name }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                            <div class="col-lg-8 fv-row">
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid" value="{{ $user->email }}" />
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Role</span>
                            </label>
                            <div class="col-lg-8 fv-row">
                                <select name="current_team_id" aria-label="" data-control="select2" data-placeholder="Pilih Role..." class="form-select form-select-solid form-select-lg fw-bold">
                                    @foreach ($datateam as $team)
                                    @if ($team->id == $user->current_team_id)
                                        <option selected value="{{$team->id}}">{{$team->name}} (Selected)</option>
                                    @endif
                                        <option value="{{$team->id}}">{{$team->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Photo Profile</label>
                            <div class="col-lg-8">
                                @if ( $user->profile_photo_path == null )
                                    <img class="mw-100 mh-300px card-rounded-bottom" alt="" src="{{ asset('assets/media/avatars/default.jpg') }}"/>
                                @else
                                    <img class="mw-100 mh-300px card-rounded-bottom" alt="" src="{{ asset($user->profile_photo_path) }}"/>
                                @endif
                                <input type="file" name="profile_photo_path" class="form-control form-control-lg form-control-solid mt-3" value="{{ $user->profile_photo_path }}" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <a class="btn btn-light btn-active-light-primary me-2" href="{{route('user.index')}}">Discard</a>
                        <button type="submit" id="modal_form_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_modal_form_password" aria-expanded="true" aria-controls="kt_account_modal_form_password">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Reset Password</h3>
                </div>
            </div>
            <div id="kt_account_modal_form_password" class="collapse show">
                <form id="modal_form_password"  class="form" action="{{ route('user.reset', $user) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">New Password</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 fv-row">
                                        <input type="password" name="password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" id="modal_form_submit2" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    const form = document.getElementById('modal_form_form');
    var validator = FormValidation.formValidation(
        form,
        {
            fields: {
                'name': {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan isi nama!'
                        }
                    }
                },
                'email': {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan isi dengan format email!'
                        }
                    }
                },
                'current_team_id': {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan Pilih Role!'
                        }
                    }
                },
            },

            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                })
            }
        }
    );

    // Submit button handler
    const submitButton = document.getElementById('modal_form_submit');
    submitButton.addEventListener('click', function (e) {
        e.preventDefault();
        if (validator) {
            validator.validate().then(function (status) {
                console.log('validated!');
                if (status == 'Valid') {
                    submitButton.setAttribute('data-kt-indicator', 'on');
                    submitButton.disabled = true;
                    setTimeout(function () {
                        submitButton.removeAttribute('data-kt-indicator');
                        submitButton.disabled = false;
                        form.submit();
                    }, 2000);
                }
            });
        }
    });
</script>

<script>
    const form2 = document.getElementById('modal_form_password');
    var validator2 = FormValidation.formValidation(
        form2,
        {
            fields: {
                'password': {
                    validators: {
                        notEmpty: {
                            message: 'Silahkan isi password!'
                        }
                    }
                },
            },

            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: '.fv-row',
                    eleInvalidClass: '',
                    eleValidClass: ''
                })
            }
        }
    );

    // Submit button handler
    const submitButton2 = document.getElementById('modal_form_submit2');
    submitButton2.addEventListener('click', function (e) {
        e.preventDefault();
        if (validator2) {
            validator2.validate().then(function (status) {
                console.log('validated2!');
                if (status == 'Valid') {
                    submitButton2.setAttribute('data-kt-indicator', 'on');
                    submitButton2.disabled = true;
                    setTimeout(function () {
                        submitButton2.removeAttribute('data-kt-indicator');
                        submitButton2.disabled = false;
                        form2.submit();
                    }, 2000);
                }
            });
        }
    });
</script>


@endpush
