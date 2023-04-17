@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="container">
        <div class="main-body">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>

            @if (Session::has('msg'))
                <p class="alert alert-success">{{ Session::get('msg') }}</p>
            @endif
            <div class="row gutters-sm">
                {{-- <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>Aleen Khan</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">{{ $users->name }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">{{ $users->email }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">{{ $users->phone }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">{{ $users->address }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " href="{{ route('edit.profile') }}">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters-sm"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

    @if (Session::has('msg'))
        <script>
            toastr.options = {
                "progressBar": true,
                "closeButton": true,
            }
            toastr.success("{{ Session::get('msg') }}", 'Success!', {
                timeOut: 3000
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('.alert-success').fadeIn().delay(2000).fadeOut();
        });
    </script>
@endpush
