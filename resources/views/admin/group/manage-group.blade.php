@extends('layouts.app')
@section('title')
    Manage Group
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3"></div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{ route('add.group') }}">Add Group</a>
                <hr>
                @if (Session::has('msg'))
                    <p class="alert alert-success">{{ Session::get('msg') }}</p>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                {{-- {{ dd($groups) }} --}}
                                <th>Group Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($groups as $team)
                                <tr>
                                    <td>{{ $team->group_name }}</td>
                                    <td>{{ $team->description }}</td>
                                    <td>
                                        <a href="{{ route('edit', ['id' => $team->id]) }}" class="btn btn-success">Edit</a>
                                        <a href="{{ route('delete', ['id' => $team->id]) }}"
                                            onclick="return confirm('Are You Sure Want To Delete?')"
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
                timeOut: 2000
            });
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('.alert-success').fadeIn().delay(2000).fadeOut();
        });
    </script>
@endpush
