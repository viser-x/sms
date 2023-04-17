@extends('layouts.app')
@section('title')
    Password Settings
@endsection
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Password Settings</h4>
                    </div>
                    <form action="{{ route('update.password') }}" method="post">
                        @csrf
                        <div class="row mt-3">
                            @if (Session::has('msg'))
                                <p class="alert alert-success">{{ Session::get('msg') }}</p>
                            @endif

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            
                            <div class="col-md-12">
                                <label class="form-label">Current Password</label>
                                <input type="password" name='current_password'
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    id="currentPasswordInput" placeholder="current password">

                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password"
                                    class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="new password">

                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="confirm_new_password"
                                    class="form-control @error('confirm_new_password') is-invalid @enderror"
                                    id="confirmNewPasswordInput" placeholder="confirm new password">

                                @error('confirm_new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mt-5 text-center">
                                <button class="btn btn-primary profile-button" type="submit">Save Password</button>
                            </div>
                        </div>
                    </form>
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
