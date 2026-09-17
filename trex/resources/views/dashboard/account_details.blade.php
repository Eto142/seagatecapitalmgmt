

@include('dashboard.header')
<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Update Payment Details</h4>
                    </div>
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Update</li>
                        <li class="breadcrumb-item">Payment</li>
                        <li class="breadcrumb-item active"><a href="#">Details</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 mt-3">
                <div class="card">
                    <div class="card-content">
                        <div class="col-12 col-lg-12 col-xl-12 mt-3">
                            <div class="card">
                                      <!-- Success Message -->
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <!-- Error Messages -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- form start -->
                                <form method="POST" action="{{ route('payment.update') }}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="bn">Bank Name</label>
                                            <input class="form-control" type="text" name="bank_name" value="{{ old('bank_name', $paymentDetails->bank_name ?? '') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="an">Account Name</label>
                                            <input class="form-control" type="text" name="account_name" value="{{ old('account_name', $paymentDetails->account_name ?? '') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="ann">Account Number</label>
                                            <input class="form-control" type="text" name="account_number" value="{{ old('account_number', $paymentDetails->account_number ?? '') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label"> ETH Wallet Address</label>
                                            <input class="form-control" type="text" name="eth_address" value="{{ old('eth_address', $paymentDetails->eth_address ?? '') }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label"><i class="fab fa-bitcoin"></i> Bitcoin Wallet Address</label>
                                            <input class="form-control" type="text" name="btc_address" value="{{ old('btc_address', $paymentDetails->btc_address ?? '') }}" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <input type="hidden" name="id" value="{{ $paymentDetails->id ?? '' }}">
                                    </div>
                                </form>
                                <!-- form end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<!-- END: Content-->

@include('dashboard.footer')


