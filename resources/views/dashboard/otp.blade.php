@include('dashboard.header')
<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">OTP Verification</h4>
                    </div>
                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Withdrawal</li>
                        <li class="breadcrumb-item active"><a href="#">Verify OTP</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- Display Messages -->
        <div class="row">
            <div class="col-12">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Verify Your Withdrawal</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i> We've sent a 6-digit OTP to your registered email/phone.
                        </div>

                        <!-- Withdrawal Summary -->
                        <div class="withdrawal-summary mb-4 p-3 border rounded">
                            <h6>Withdrawal Details:</h6>
                            <div class="d-flex justify-content-between">
                                <span>Amount:</span>
                                <strong>${{ number_format(session('withdrawal_data.amount'), 2) }}</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Payment Method:</span>
                                <strong>{{ session('withdrawal_data.payment_mode') }}</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Total (incl. charges):</span>
                                <strong>${{ number_format(session('withdrawal_data.amount') * 1.15, 2) }}</strong>
                            </div>
                        </div>

                        <!-- OTP Form -->
                        <form method="POST" action="{{ route('withdrawal.verify.otp') }}">
                            @csrf
                            <div class="form-group">
                                <label for="otp">Enter 6-digit OTP</label>
                                <div class="input-group">
                                    <input type="text" class="form-control text-center" id="otp" name="otp" 
                                           placeholder="••••••" maxlength="6" required
                                           pattern="\d{6}" title="Please enter exactly 6 digits">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="resendOtp">
                                            Resend OTP
                                        </button>
                                    </div>
                                </div>
                                <small class="form-text text-muted">
                                    Check your email/SMS for the OTP code
                                </small>
                            </div>

                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <i class="fas fa-check-circle"></i> Verify & Complete Withdrawal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </div>
</main>
<!-- END: Content-->

@include('dashboard.footer')

<!-- JavaScript for OTP Input and Resend -->
<script>
    $(document).ready(function() {
        // Auto-tab between OTP digits
        $('#otp').on('input', function() {
            if (this.value.length === 6) {
                $(this).next('.input-group-append').find('button').focus();
            }
        });

        // Resend OTP functionality
        $('#resendOtp').click(function() {
            $(this).prop('disabled', true);
            $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...');
            
            // Simulate API call to resend OTP
            setTimeout(function() {
                $('#resendOtp').html('Resend OTP');
                $('#resendOtp').prop('disabled', false);
                alert('A new OTP has been sent to your registered email/phone.');
            }, 2000);
        });
    });
</script>

<style>
    .withdrawal-summary {
        background-color: #f8f9fa;
    }
    
    #otp {
        font-size: 1.5rem;
        letter-spacing: 0.5rem;
        height: 3.5rem;
    }
    
    #resendOtp {
        white-space: nowrap;
    }
</style>