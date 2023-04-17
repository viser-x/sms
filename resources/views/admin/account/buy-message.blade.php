@extends('layouts.app')
@section('title')
    Account
@endsection
@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Account</h3>
                        </div>
                        <div class="form-floating mb-3 mb-md-0">
                            <div class="card border-left- h-100 py-4">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold mb-1">
                                                <h4>Remaining SMS</h4>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">127</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating mb-3 mb-md-0">
                                    <h4>Buy SMS</h4>
                                </div>
                                <div class="form-floating mb-3 mb-md-0">
                                    <p>Please use only
                                        <code>numeric</code> number not
                                        <code>decimal</code> number. Example: Accepted:
                                        <code>1, 2, 3</code> Not Accepted:
                                        <code>0.025, 1.025, 1.00, 1.5</code>
                                    </p>
                                    <div class="form-floating mb-3 mb-md-0">
                                        <div class="mb-1">
                                            <label for="add_unit" class="form-label required">Per unit price = 0.1 $</label>
                                            <div class="input-group input-group-merge mb-2">
                                                <input type="text" id="add_unit" class="form-control " name="add_unit"
                                                    required>
                                                <span class="input-group-text update-price"> <span id='amount'></span>
                                                    $</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3 mb-md-0">
                                    <button type="submit" class="btn btn-primary mb-1">
                                        Checkout
                                    </button>
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
        let buying = $('form').find('.buying').eq(0),
            price = 0,
            $get_price = $("#add_unit")

        function get_price() {
            let total_unit = $get_price[0].value;
            let total_price = total_unit * "0.1";
            $('.update-price').text(Math.ceil(total_price) + "$")
        }

        $get_price.keyup(get_price);
    </script>
@endpush
