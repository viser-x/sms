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
                            <form action="{{ route('single-message') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label>Choose a Group:</label>

                                    <select class="form-select" name="group[]" id="group"
                                        aria-label="Default select example">
                                        <option value="" selected>Select Group</option>
                                        @if (count($messages) > 0)
                                            @foreach ($messages as $grouping)
                                                <option value="{{ $grouping['id'] }}">{{ $grouping['group_name'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>

                                </div>
                                <div class="mb-3">
                                    <label>Choose a Contact:</label>

                                    <select class="form-select" name="group_member_id" id="mySelect"
                                        aria-label="Default select example">
                                        <option value="" selected>Select Contact</option>
                                        @foreach ($messages as $member)
                                            <option value="{{ $member['id'] }}">{{ $member['contact_name'] }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                {{-- <div class="mb-3">
                                    <label>Number</label>
                                    <input type="number" class="form-control" name="number" placeholder="Number">
                                </div> --}}
                                <div class="mb-3">
                                    <label>SMS Body</label>
                                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
    <script>
        let members = eval("{{ Js::from($members) }}");
        console.log(members)


        jQuery(document).ready(function() {
            jQuery('#group').change(function(e) {
                console.log(e.target.value)
                let id = e.target.value;
                jQuery.ajax({

                    url: "group-members/" + id,
                    type: 'get',
                    success: function(result) {
                        // console.log('hello')
                        console.log(result)
                        $('#mySelect').html('')
                        $.each(result, function(i, item) {
                            $('#mySelect').append($('<option>', {
                                value: item.id,
                                text: item.contact_name
                                + ' ('+ item.contact_number + ')'
                            }));
                        });
                    }
                })
            });
        })
    </script>

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
