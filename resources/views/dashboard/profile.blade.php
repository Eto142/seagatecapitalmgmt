@include('dashboard.header')
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Profile </h4>
                    </div>

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

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Personal</li>
                        <li class="breadcrumb-item active"><a href="#">Profile</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->



        <!-- Main content -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="row">
                    <div class="col-12 col-md-3 mt-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <center> <img class="d-flex img-fluid rounded-circle" src="/profilep.png"
                                            width="300" alt="User profile picture">
                                </div>
                                </center>

                                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                                
                                
                                
                                
                    @if(Auth::user()->user_status != 1)
            
                    
                                <p class="text-muted text-center"> <a>
                                        <font color="red"></font>
                                    </a><br> <a href="#" data-toggle="modal" data-target="#verifyModal">
                                        <font color="red">CLICK VERIFY ACCOUNT</font>
                                    </a>
                                </p>
                    @endif

                    @if(Auth::user()->user_status == 1)
                   <p class="text-muted text-center"> <a>
                                        <font color="green"></font>
                                    </a><br> <a href="#">
                                        <font color="green">VERIFIED</font>
                                    </a>
                                </p>
                    @endif

                         
                                <hr>
                                <center>
                                    <div class="toggle"></div><strong>ACTIVATE DARK MODE</strong>
                                </center>
                                <hr>
<ul class="list-group list-group-unbordered mb-3">
    <li class="list-group-item">
        <b>Name</b> <a class="float-right">{{ Auth::user()->name }}</a>
    </li>
    <li class="list-group-item">
        <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
    </li>
    <li class="list-group-item">
        <b>Phone Number</b> <a class="float-right">{{ Auth::user()->phone }}</a>
    </li>
    <li class="list-group-item">
        <b>User Status</b> <a class="float-right">{{ Auth::user()->user_status }}</a>
    </li>
    <li class="list-group-item">
        <b>Account Activated</b> <a class="float-right">{{ Auth::user()->is_activated ? 'Yes' : 'No' }}</a>
    </li>
    <li class="list-group-item">
        <b>Current Plan</b> <a class="float-right">{{ Auth::user()->acct_form }}</a>
    </li>
    <li class="list-group-item">
        <b>Country</b> <a class="float-right">{{ Auth::user()->country }}</a>
    </li>
    <li class="list-group-item">
        <b>Referral Code</b> <a class="float-right">{{ Auth::user()->referral_code }}</a>
    </li>
    <li class="list-group-item">
        <b>Bank Name</b> <a class="float-right">{{ Auth::user()->bank_name }}</a>
    </li>
    <li class="list-group-item">
        <b>Account Name</b> <a class="float-right">{{ Auth::user()->account_name }}</a>
    </li>
    <li class="list-group-item">
        <b>Account Number</b> <a class="float-right">{{ Auth::user()->account_number }}</a>
    </li>
    <li class="list-group-item">
        <b>ETH Address</b> <a class="float-right">{{ Auth::user()->eth_address }}</a>
    </li>
    <li class="list-group-item">
        <b>BTC Address</b> <a class="float-right">{{ Auth::user()->btc_address }}</a>
    </li>
    <li class="list-group-item">
        <b>Currency</b> <a class="float-right">{{ Auth::user()->currency }}</a>
    </li>
    <li class="list-group-item">
        <b>Balance</b> <a class="float-right">{{ Auth::user()->currency }}{{ number_format($total_sum, 2) }} (USD{{ number_format($amountsInUSD['balance'], 2) }})</a>
    </li>
    <li class="list-group-item">
        <b>Profit</b> <a class="float-right">{{ Auth::user()->currency }}{{ number_format($profit_sum, 2) }} (USD{{ number_format($amountsInUSD['profit'], 2) }})</a>
    </li>

</ul>

                                <a href="https://Seagatecapitalmgmt.com/dashboard/deposits"
                                    class="btn btn-primary btn-block"><b>Deposit</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card -->


                    <!-- /.col -->

                    <div class="col-12 col-md-9 mt-3">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Payment Details</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <!-- form start -->
                                        <!-- Payment Details Form -->
                                        <form method="post" action="{{ route('profile.updatePaymentDetails') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="bn">Bank Name</label>
                                                <input class="form-control" type="text" name="bank_name"
                                                    value="{{ $profile->bank_name ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="an">Account Name</label>
                                                <input class="form-control" type="text" name="account_name"
                                                    value="{{ $profile->account_name ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="ann">Account Number</label>
                                                <input class="form-control" type="text" name="account_number"
                                                    value="{{ $profile->account_number ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="eth_address">Ethereum Wallet Address</label>
                                                <input class="form-control" type="text" name="eth_address"
                                                    value="{{ $profile->eth_address ?? '' }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="btc_address">Bitcoin Wallet Address</label>
                                                <input class="form-control" type="text" name="btc_address"
                                                    value="{{ $profile->btc_address ?? '' }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Payment
                                                Details</button>
                                        </form>

                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- Add this section where you want the email change form to appear -->
 <div class="col-12 col-md-9 mt-3">
                        <div class="card">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">CHANGE EMAIL BELOW</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <!-- Post -->
                        <!-- form start -->
<!-- Form to change email -->
<form method="post" action="{{ route('profile.changeEmail') }}" id="changeEmailForm">
    @csrf
    <div class="form-group">
        <label for="new_email">Enter New Email</label>
        <input type="email" name="new_email" id="new_email" required class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Send Verification Code</button>
</form>

<!-- Modal for Verification Code -->
<div class="modal fade" id="verificationModal" tabindex="-1" role="dialog" aria-labelledby="verificationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verificationModalLabel">Verify Your Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>A verification code has been sent to your new email address. Please enter the code below:</p>
                <form method="post" action="{{ route('profile.verifyEmailChange') }}" id="verifyCodeForm">
                    @csrf
                    <div class="form-group">
                        <label for="verification_code">Verification Code</label>
                        <input type="text" name="verification_code" required class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Verify and Change Email</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Handle Form Submission and Modal Display -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle the email form submission
        $('#changeEmailForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Submit the form via AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // If the email submission is successful, show the modal
                    $('#verificationModal').modal('show');
                },
                error: function(xhr) {
                    // Handle errors (e.g., display validation errors)
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        });

        // Handle the verification code form submission
        $('#verifyCodeForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Submit the form via AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // If verification is successful, reload the page or show a success message
                    alert(response.message);
                    window.location.reload(); // Reload the page to reflect the changes
                },
                error: function(xhr) {
                    // Handle errors (e.g., invalid verification code)
                    alert('Error: ' + xhr.responseJSON.message);
                }
            });
        });
    });
</script>
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->

                    <!-- Main content -->
            <div class="col-12 col-md-9 mt-3">
                        <div class="card">
                            <div class="row">
                                <div class="col-12 col-md-12 mt-3">

                                    <!-- Profile Image -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                                        data-toggle="tab">CHANGE PASSWORD BELOW</a></li>
                                            </ul>
                                        </div><!-- /.card-header -->
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="active tab-pane" id="activity">
                                                    <!-- Post -->
                                                    <!-- form start -->
                                                    <form method="post" action="{{ route('profile.changePassword') }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="old_password">Enter Old Password</label>
                                                            <input type="password" name="old_password" required
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password">New Password</label>
                                                            <input type="password" name="password" required
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password_confirmation">Confirm Password</label>
                                                            <input type="password" name="password_confirmation" required
                                                                class="form-control">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Change
                                                            Password</button>
                                                    </form>


                                                </div>
                                            </div>

                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-content -->
                                    </div><!-- /.card-body -->
                                </div>
                                <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->

                    <!-- /.content -->
                </div>


                <br><br><br>





            </div>


       <!-- Verify Modal -->
                    <div id="verifyModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">

                            <!-- Modal content -->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title text-center">USER VERIFICATION SYSTEM</h4>
                                    <center>
                                        <p>
                                            <font color="red">Upload required documents to get verified.<br>Using the
                                                format below:</font>
                                            <img src="/verify.png" alt="Verification Format" style="width:100%;">
                                        </p>
                                    </center>
                                    <form style="padding:3px;" role="form" method="POST"
                                        action="{{ route('user.verification.save') }}" enctype="multipart/form-data">
                                        @csrf
                                        <hr>
                                        <label for="id_front">VALID IDENTITY CARD (FRONT)</label>
                                        <input type="file" name="id_front" id="id_front" required>
                                        <hr>
                                        <label for="id_back">VALID IDENTITY CARD (BACK)</label>
                                        <input type="file" name="id_back" id="id_back" required>
                                        <hr>
                                        <label for="passport">USER FACIAL PASSPORT</label>
                                        <input type="file" name="passport" id="passport" required>
                                        <hr>
                                        <center><button type="submit" class="btn btn-primary">Submit Documents</button>
                                        </center>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /Verify Modal -->







        </div>
    </div>
    </div>
    </div>
    <!-- END: Card DATA-->
    </div>

</main>
<!-- END: Content-->
<!--Start of Tawk.to Script-->
<style>
    footer {
        background-color: #EAEDD0;
        text-align: center;
        width: 100%;
        position: fixed;
        bottom: 0;
    }
</style>
<!--End of Tawk.to Script-->

@include('dashboard.footer')