@extends('layouts.app')
@section('title')
    Edit Group
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Edit Group</h3>
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
                            <form action="{{ route('update.group') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $groups->id }}">
                                <div class="mb-3">
                                    <label>Group Name</label>
                                    <input type="text" class="form-control @error('group_name') is-invalid @enderror"
                                        name="group_name" value="{{ $groups->group_name }}" placeholder="Group Name">
                                    @error('group_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <input type="text" class="form-control @error('description') is-invalid @enderror"
                                        name="description" value="{{ $groups->description }}" placeholder="Description">
                                    @error('description')
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
