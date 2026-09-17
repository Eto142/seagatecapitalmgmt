@include('dashboard.header')
<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Withdrawal</h4>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Make</li>
                        <li class="breadcrumb-item active"><a href="#">Withdrawal</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- Display Success and Error Messages -->
        <div class="row">
            <div class="col-12">
                <!-- Success Message -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <!-- Error Messages -->
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Whoops! Something went wrong.</strong>
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
            </div>
        </div>
        <!-- End: Messages -->

        <!-- Payment Method Selection Grid -->
        @if(!request()->has('payment_method'))
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">SELECT PAYMENT METHOD</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Crypto Methods -->
                            <div class="col-md-4 mb-4">
                                <a href="?payment_method=crypto" class="card method-card h-100 text-center">
                                    <div class="card-body">
                                        <i class="fas fa-coins fa-3x mb-3 text-warning"></i>
                                        <h5>CRYPTOCURRENCY</h5>
                                        <p class="text-muted">Bitcoin, XRP, USDT</p>
                                    </div>
                                </a>
                            </div>
                            
                            <!-- Bank Transfer -->
                            <div class="col-md-4 mb-4">
                                <a href="?payment_method=bank" class="card method-card h-100 text-center">
                                    <div class="card-body">
                                        <i class="fas fa-university fa-3x mb-3 text-primary"></i>
                                        <h5>BANK TRANSFER</h5>
                                        <p class="text-muted">Direct to your bank account</p>
                                    </div>
                                </a>
                            </div>
                            
                            <!-- Other Methods (if any) -->
                            <div class="col-md-4 mb-4">
                                <a href="?payment_method=other" class="card method-card h-100 text-center">
                                    <div class="card-body">
                                        <i class="fas fa-wallet fa-3x mb-3 text-success"></i>
                                        <h5>OTHER METHODS</h5>
                                        <p class="text-muted">Additional options</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
            <!-- Show specific withdrawal options based on selected method -->
            <div class="alert alert-primary text-center" role="alert">
                Payment will be sent through your selected method.
            </div>

            @php
                function getExchangeRate($currency) {
                    $apiUrl = "https://api.frankfurter.app/latest?from=USD";
                    $defaultRate = 1.0; // USD fallback
                    
                    $ch = curl_init($apiUrl);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
                    $response = curl_exec($ch);
                    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                    curl_close($ch);

                    if ($status !== 200 || !$response) {
                        return $defaultRate;
                    }

                    $data = json_decode($response, true);
                    if (json_last_error() !== JSON_ERROR_NONE) {
                        return $defaultRate;
                    }

                    return $data['rates'][strtoupper($currency)] ?? $defaultRate;
                }

                $userCurrency = auth()->user()->currency ?? 'USD';
                $exchangeRate = getExchangeRate($userCurrency);

                function formatCurrency($amount, $currencyCode) {
                    $formatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
                    $formatter->setTextAttribute(NumberFormatter::CURRENCY_CODE, $currencyCode);
                    $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 2);
                    
                    return $formatter->formatCurrency($amount, $currencyCode);
                }
            @endphp

            @if(request()->payment_method == 'crypto')
                <!-- Crypto Withdrawal Options -->
                <div class="row">
                    @foreach([
                        ['name' => 'Bitcoin', 'method_id' => 18],
                        ['name' => 'XRP', 'method_id' => 20],
                        ['name' => 'Tether (USDT)', 'method_id' => 19]
                    ] as $crypto)
                        <div class="col-12 col-lg-6 col-xl-4 mt-3">
                            <div class="card text-auto bg-default">
                                <div class="card-header text-uppercase text-center">
                                    {{ strtoupper($crypto['name']) }} WITHDRAWAL
                                </div>
                                <div class="card-body">
                                    <p>MINIMUM: <span class="float-right">{{ formatCurrency(50 * $exchangeRate, $userCurrency) }}</span></p>
                                    <hr>
                                    <p>MAXIMUM: <span class="float-right">{{ formatCurrency(1000000 * $exchangeRate, $userCurrency) }}</span></p>
                                    <hr>
                                    <p>CHARGES (VAT): <span class="float-right">{{ formatCurrency(750 * $exchangeRate, $userCurrency) }}</span></p>
                                    <hr>
                                    <p>CHARGES (%): <span class="float-right">15%</span></p>
                                    <hr>
                                    <p>DURATION: <span class="float-right">1-6 hours</span></p>
                                    <hr>
                                    <div class="text-center mb-3">
                                        <button class="btn btn-secondary" data-toggle="modal" data-target="#withdrawalModal"
                                            data-payment-mode="{{ $crypto['name'] }}" data-method-id="{{ $crypto['method_id'] }}">
                                            <i class="fa fa-plus"></i> Request Withdrawal
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif(request()->payment_method == 'bank')
                <!-- Bank Withdrawal Options -->
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-4 mt-3">
                        <div class="card text-auto bg-default">
                            <div class="card-header text-uppercase text-center">
                                BANK TRANSFER
                            </div>
                            <div class="card-body">
                                <p>MINIMUM: <span class="float-right">{{ formatCurrency(100 * $exchangeRate, $userCurrency) }}</span></p>
                                <hr>
                                <p>MAXIMUM: <span class="float-right">{{ formatCurrency(50000 * $exchangeRate, $userCurrency) }}</span></p>
                                <hr>
                                <p>CHARGES (VAT): <span class="float-right">{{ formatCurrency(1000 * $exchangeRate, $userCurrency) }}</span></p>
                                <hr>
                                <p>CHARGES (%): <span class="float-right">10%</span></p>
                                <hr>
                                <p>DURATION: <span class="float-right">1-3 business days</span></p>
                                <hr>
                                <div class="text-center mb-3">
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#bankWithdrawalModal"
                                        data-payment-mode="Bank Transfer" data-method-id="21">
                                        <i class="fa fa-plus"></i> Request Withdrawal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Withdrawals Table -->
            <div class="row">
                <div class="col-12 col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="btn-group mb-2">
                                <strong>PROCESSED/PENDING WITHDRAWALS</strong>
                            </div>

                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>REQUESTED AMOUNT</th>
                                            <th>AMOUNT + CHARGES</th>
                                            <th>RECEIVING MODE</th>
                                            <th>DATE</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($withdrawals as $withdrawal)
                                        <tr>
                                            <td>{{ $withdrawal->id }}</td>
                                            <td>${{ number_format($withdrawal->amount, 2) }}</td>
                                            <td>${{ number_format($withdrawal->total_amount, 2) }}</td>
                                            <td>{{ $withdrawal->account }}</td>
                                            <td>{{ $withdrawal->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                @if($withdrawal->status == 0)
                                                Pending
                                                @elseif($withdrawal->status == 1)
                                                Approved
                                                @else
                                                Unknown Status
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Crypto Withdrawal Modal -->
            <div id="withdrawalModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center w-100">CRYPTO WITHDRAWAL REQUEST</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('withdrawal.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" step="0.01" min="1" class="form-control" id="amount"
                                        name="amount" placeholder="Enter amount here" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="payment_mode">Payment Method</label>
                                    <input type="text" class="form-control" id="payment_mode_display" disabled>
                                    <input type="hidden" name="payment_mode" id="payment_mode">
                                </div>
                                
                                <input type="hidden" name="method_id" id="method_id">
                                
                                <div class="form-group">
                                    <label for="wallet_address">Your Wallet Address</label>
                                    <input type="text" class="form-control" id="wallet_address" 
                                           name="wallet_address" placeholder="Enter your crypto wallet address" required>
                                    <small class="form-text text-muted">
                                        Please double-check your wallet address before submitting
                                    </small>
                                </div>
                                
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="confirm_address" required>
                                        <label class="form-check-label" for="confirm_address">
                                            I confirm this wallet address is correct
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="fas fa-paper-plane"></i> Submit Withdrawal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bank Withdrawal Modal -->
            <div id="bankWithdrawalModal" class="modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-center w-100">BANK WITHDRAWAL REQUEST</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('withdrawal.submit') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" step="0.01" min="1" class="form-control" id="amount"
                                        name="amount" placeholder="Enter amount here" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="payment_mode">Payment Method</label>
                                    <input type="text" class="form-control" id="payment_mode_display" value="Bank Transfer" disabled>
                                    <input type="hidden" name="payment_mode" id="payment_mode" value="Bank Transfer">
                                </div>
                                
                                <input type="hidden" name="method_id" id="method_id" value="21">
                                
                                <div class="form-group">
                                    <label for="account_name">Account Name</label>
                                    <input type="text" class="form-control" id="account_name" 
                                           name="account_name" placeholder="Your name as it appears on bank account" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" 
                                           name="account_number" placeholder="Your bank account number" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input type="text" class="form-control" id="bank_name" 
                                           name="bank_name" placeholder="Name of your bank" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="swift_code">SWIFT/BIC Code</label>
                                    <input type="text" class="form-control" id="swift_code" 
                                           name="swift_code" placeholder="Your bank's SWIFT or BIC code">
                                    <small class="form-text text-muted">
                                        Required for international transfers
                                    </small>
                                </div>
                                
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="confirm_bank_details" required>
                                        <label class="form-check-label" for="confirm_bank_details">
                                            I confirm these bank details are correct
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-lg px-5">
                                        <i class="fas fa-paper-plane"></i> Submit Withdrawal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <br><br><br>
    </div>
</main>
<!-- END: Content-->

<!-- Footer Styles -->
<style>
    footer {
        background-color: #EAEDD0;
        text-align: center;
        width: 100%;
        position: fixed;
        bottom: 0;
    }
    
    /* Payment method card styling */
    .method-card {
        transition: all 0.3s ease;
        border: 2px solid transparent;
        text-decoration: none;
        color: inherit;
    }
    
    .method-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        border-color: #007bff;
    }
    
    .method-card .card-body {
        padding: 2rem 1rem;
    }
    
    /* Additional styling for the wallet address field */
    #wallet_address {
        font-family: monospace;
    }
    
    .form-check-label {
        user-select: none;
    }
</style>

<!-- START: Footer-->
@include('dashboard.footer')

<!-- Script to Populate Modal with Correct Data -->
<script>
    // For Crypto Withdrawal Modal
    $('#withdrawalModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var paymentMode = button.data('payment-mode');
        var methodId = button.data('method-id');
        
        var modal = $(this);
        modal.find('#payment_mode_display').val(paymentMode);
        modal.find('#payment_mode').val(paymentMode);
        modal.find('#method_id').val(methodId);
        
        // Clear previous values when modal is shown
        modal.find('#amount').val('');
        modal.find('#wallet_address').val('');
        modal.find('#confirm_address').prop('checked', false);
    });
    
    // For Bank Withdrawal Modal
    $('#bankWithdrawalModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        var paymentMode = button.data('payment-mode');
        var methodId = button.data('method-id');
        
        var modal = $(this);
        modal.find('#payment_mode_display').val(paymentMode);
        modal.find('#payment_mode').val(paymentMode);
        modal.find('#method_id').val(methodId);
        
        // Clear previous values when modal is shown
        modal.find('#amount').val('');
        modal.find('#account_name').val('');
        modal.find('#account_number').val('');
        modal.find('#bank_name').val('');
        modal.find('#swift_code').val('');
        modal.find('#confirm_bank_details').prop('checked', false);
    });
    
    // Validate wallet address format based on cryptocurrency
    $('#withdrawalModal').on('change', '#payment_mode_display', function() {
        var crypto = $(this).val().toLowerCase();
        var walletInput = $('#wallet_address');
        
        // Clear any previous validation
        walletInput.removeClass('is-invalid');
        
        // Set appropriate placeholder based on crypto
        if(crypto.includes('bitcoin')) {
            walletInput.attr('placeholder', 'Enter your Bitcoin address (starts with 1, 3, or bc1)');
        } else if(crypto.includes('xrp')) {
            walletInput.attr('placeholder', 'Enter your XRP address (starts with r)');
        } else if(crypto.includes('tether') || crypto.includes('usdt')) {
            walletInput.attr('placeholder', 'Enter your USDT address (ERC20/TRC20)');
        }
    });
</script>