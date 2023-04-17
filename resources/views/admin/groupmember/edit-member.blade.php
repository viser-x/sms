@extends('layouts.app')
@section('title')
    Edit Contact
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Edit Contact</h3>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('update.member') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $members->id }}">
                                <div class="mb-3">
                                    <label>Contact Name</label>
                                    <input type="text" class="form-control @error('contact_name') is-invalid @enderror"
                                        name="contact_name" value="{{ $members->contact_name }}" placeholder="Contact Name">
                                    @error('contact_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Contact Number</label>
                                    <input type="number" class="form-control @error('contact_number') is-invalid @enderror"
                                        name="contact_number" value="{{ $members->contact_number }}"
                                        placeholder="Contact Number">
                                    @error('contact_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-2 mb-0">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <button type="submit" class="btn btn-primary mb-1">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
