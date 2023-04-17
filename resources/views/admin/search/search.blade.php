@extends('layouts.app')
@section('title')
    Search
@endsection
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3"></div>
            <div class="card-body">
                @if (Session::has('msg'))
                    <p class="alert alert-success">{{ Session::get('msg') }}</p>
                @endif                
                <div class="table-responsive">
                    @if (isset($searchContacts))
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    {{-- {{ dd($members) }} --}}
                                    <th>Contact Name</th>
                                    <th>Contact Number</th>
                                    <th>Group Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($searchContacts) > 0)
                                    @foreach ($searchContacts as $contact)
                                        <tr>
                                            <td>{{ $contact->contact_name }}</td>
                                            <td>{{ $contact->contact_number }}</td>
                                            <td>{{ $contact->group->group_name ?? '-' }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>No Result Found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
