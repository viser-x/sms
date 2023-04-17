@extends('layouts.app')
@section('title')
    Manage Contact
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3"></div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{ route('add.member') }}">Add Contact</a>
                <hr>
                @if (Session::has('msg'))
                    <p class="alert alert-success">{{ Session::get('msg') }}</p>
                @endif
                {{-- <h5>{{ session('message') }}</h5> --}}
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                {{-- {{ dd($members) }} --}}
                                <th>Contact Name</th>
                                <th>Contact Number</th>
                                <th>Group Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $contact)
                                <tr>
                                    <td>{{ $contact->contact_name }}</td>
                                    <td>{{ $contact->contact_number }}</td>
                                    <td>{{ $contact->group->group_name }}</td>
                                    <td>
                                        <a href="{{ route('edit.member', ['id' => $contact->id]) }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ route('delete.member', ['id' => $contact->id]) }}"
                                            onclick="return confirm('Are you sure want to Delete?')"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
