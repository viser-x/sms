@extends('layouts.app')
@section('title')
    Send Sms
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Create Message</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('multiple.message') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label>Choose Multiple Group:</label>

                                    <select class="form-select" name="mul_group[]" id="mul_group">
                                        @if (count($messages) > 0)
                                            @foreach ($messages as $grouping)
                                                <option value="{{ $grouping['id'] }}">{{ $grouping['group_name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label>SMS Body</label>
                                    <textarea class="form-control" name="message" type="textarea" placeholder="Message"></textarea>
                                </div>
                                <div class="mt-2 mb-0">
                                    <div class="mb-3 mb-md-0">
                                        <button type="submit" class="btn btn-primary mb-1">Send</button>
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
@push('js')
    <script></script>
@endpush
