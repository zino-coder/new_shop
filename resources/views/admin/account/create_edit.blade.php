@extends('admin.layouts.layout')

@section('content')
    @include('admin.layouts.components.content-header', ['pageHeader' => 'Product Create'])
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form id="create-account" method="post" action="{{ isset($accounts) ? route('accounts.update') : route('accounts.store') }}" enctype="multipart/form-data">
                        @if(isset($accounts))
                            @method('put')
                        @endif
                        @csrf
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Crate Account</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your name!">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label mb-0">Birthday: </label>
                                    <input type="text" id="birthday" class="form-control" data-provider="flatpickr" data-date-format="d/m/Y">
                                </div>
                                <div class="form-group">
                                    <div class="filepond-wrapper">
                                        <input type="file" class="filepond" name="filepond" multiple data-max-files="1" data-max-file-size="2MB" data-accepted-file-types="image/*">
                                        <div class="image-preview"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create Account</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('link-scripts')
    <!-- date-range-picker -->
    <script src="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('adminLTE/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminLTE/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Modern colorpicker bundle -->
    <script src="{{ asset('lib/simonwep/pickr/pickr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
@endpush
@push('link-styles')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/simonwep/pickr/themes/classic.min.css') }}" /> <!-- 'classic' theme -->
    <link href="https://unpkg.com/filepond/dist/filepond.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('custom-scripts')
    <script>
        $("#birthday").flatpickr({

        });
    </script>
    <script>
        $('.filepond').filepond({
            allowMultiple: true,
        })
    </script>
@endpush
