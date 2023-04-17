@extends('layouts.app')
@section('title')
    Edit Profile
@endsection
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
                    </div>
                    <form action="{{ route('edit.profile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-2">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="First Name"
                                    value="{{ Auth::user()->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Email ID</label>
                                <input type="text" class="form-control" placeholder="Enter Email id" readonly
                                    value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="labels">Mobile Number</label>
                                <input type="number" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="Enter Phone Number" value="{{ Auth::user()->phone }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Address</label>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address"
                                    value="{{ Auth::user()->address }}">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
