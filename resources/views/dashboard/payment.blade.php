@include('dashboard.header')

<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Select Payment Method</h4>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Select</li>
                        <li class="breadcrumb-item active"><a href="#">Payment</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Display Success and Error Messages -->
        @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Success!</strong> {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>There were some problems with your input:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- END: Display Success and Error Messages -->

        <br>
        <div class="alert alert-primary" role="alert">
            <center>
                <p> <i class="fas fa-info"></i> Note: You are to make payment of <strong>{{Auth::user()->currency}}{{ $amount ?? session('deposit_amount') }}</strong> using your preferred mode of payment below.</p>
            </center>
        </div>

   <!-- Payment Method Selection Form -->
@if(!request()->has('payment_method'))
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">SELECT PAYMENT METHOD</h4>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('payment.page') }}">
                    @csrf
                    <div class="form-group">
                        <label>Choose Payment Method</label>
                        <div class="row">
                            @foreach ($walletDetails as $wallet)
                            <div class="col-md-4 col-sm-6 mb-3">
                                <div class="payment-method-card">
                                    <input type="radio" name="payment_method" id="method-{{ $wallet->id }}" value="{{ $wallet->id }}" class="d-none" required>
                                    <label for="method-{{ $wallet->id }}" class="d-block p-3 border rounded text-center cursor-pointer method-label">
                                        <div class="font-weight-bold">{{ strtoupper($wallet->type) }}</div>
                                        @if($wallet->network)
                                        <div class="small text-muted">({{ $wallet->network }})</div>
                                        @endif
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Continue with Selected Method</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@else
        <!-- Display Selected Payment Method Details -->
        @php
            $selectedWallet = \App\Models\WalletDetail::find(request('payment_method'));
        @endphp
        
        @if($selectedWallet)
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-4 mt-3">
                <div class="card text-auto bg-default">
                    <div class="card-header text-center">
                        <strong>{{ strtoupper($selectedWallet->type) }} @if($selectedWallet->network) ({{ $selectedWallet->network }}) @endif</strong>
                    </div>
                    <div class="card-body">
                        @if($selectedWallet->type !== 'Bank')
                            ADDRESS: <span class="float-right badge">{{ $selectedWallet->address }}</span>
                            @if($selectedWallet->xrp_tag)
                                <hr>
                                XRP TAG: <span class="float-right badge">{{ $selectedWallet->xrp_tag }}</span>
                            @endif
                            <hr>
                            <center class="mb-3">
                                <a href="{{ strtolower($selectedWallet->type) }}:{{ $selectedWallet->address }}"
                                    class="btn btn-secondary btn-lg mb-20"
                                    style="font-size: 20px; font-weight: bold;">
                                    {{ $selectedWallet->type === 'Tether' ? 'Copy Wallet Address' : 'Pay Using ' . strtoupper($selectedWallet->type) . ' Wallet App' }}
                                </a>
                            </center>
                        @else
                            BANK NAME: <span class="float-right badge">{{ $selectedWallet->bank_name }}</span><br>
                            <hr>
                            ACCOUNT HOLDER: <span class="float-right badge">{{ $selectedWallet->account_holder }}</span><br>
                            <hr>
                            ACCOUNT NUMBER: <span class="float-right badge">{{ $selectedWallet->account_number }}</span><br>
                            ACCOUNT TYPE: <span class="float-right badge">{{ $selectedWallet->account_type }}</span><br>
                            <hr>
                            BRANCH NAME: <span class="float-right badge">{{ $selectedWallet->branch_name }}</span><br>
                            <hr>
                            BRANCH CODE: <span class="float-right badge">{{ $selectedWallet->branch_code }}</span><br>
                            <hr>
                            SWIFT CODE: <span class="float-right badge">{{ $selectedWallet->swift_code }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Upload Proof of Payment Card -->
            <div class="col-12 mt-3">
                <div class="card text-auto bg-default">
                    <div class="card-header justify-content-between align-items-center">
                        <h4 class="card-title">UPLOAD PROOF OF PAYMENT</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('handle.payment') }}" enctype="multipart/form-data"
                            style="padding:20px; margin-top:10px;">
                            @csrf
                            <input type="hidden" name="payment_mode" value="{{ $selectedWallet->type }}">
                            
                            @if($selectedWallet->type !== 'Bank')
                            <div class="form-group">
                                <label>Hash Key (Transaction ID)</label>
                                <input type="text" class="form-control" name="hashurl" id="hashurl"
                                    value="{{ old('hashurl') }}" required>
                                <small class="text-danger">
                                    <i>(All cryptocurrency payments require transaction hash for verification)</i>
                                </small>
                            </div>
                            @endif

                            <div class="form-group">
                                <label>Proof of Payment</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input @error('proof') is-invalid @enderror"
                                        name="proof" id="proof" required>
                                    <label class="custom-file-label" for="proof">Choose file</label>
                                    @error('proof')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="sub_home">
                                <input type="submit" class="btn btn-primary" value="Submit Payment Proof">
                                <div class="clearfix"></div>
                            </div>

                            <input type="hidden" name="amount" value="{{ $amount ?? session('deposit_amount') }}">
                            <input type="hidden" name="pay_type" value="">
                            <input type="hidden" name="plan_id" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endif
        <br><br><br>
    </div>
</main>
<!-- END: Content-->

<!--Start of Tawk.to Script-->
<style>
.method-label:hover {
    background-color: #f8f9fa;
    border-color: #007bff;
}

input[type="radio"]:checked + .method-label {
    background-color: #e7f1ff;
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
    footer {
        background-color: #EAEDD0;
        text-align: center;
        width: 100%;
        position: fixed;
        bottom: 0;
    }
</style>
<!--End of Tawk.to Script-->

<!-- START: Footer-->
@include('dashboard.footer')