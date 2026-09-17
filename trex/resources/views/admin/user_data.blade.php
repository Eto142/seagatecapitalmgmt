@include('admin.header')
<div class="main-panel">
    <div class="content bg-dark">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{session('message')}}</div>
            @endif
            <div>
            </div>
            <div>
            </div> <!-- Beginning of  Dashboard Stats  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="p-3 card bg-dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <h1 class="d-inline text-primary">{{$user->name}}</h1>
                                    <span></span>
                                    <div class="d-inline">
                                        <div class="float-right btn-group">
                                            <a class="btn btn-primary btn-sm" href="{{route('manage.users.page')}}"> <i
                                                    class="fa fa-arrow-left"></i> back</a> &nbsp;
                                            <button type="button" class="btn btn-secondary dropdown-toggle btn-sm"
                                                data-toggle="dropdown" data-display="static" aria-haspopup="true"
                                                aria-expanded="false">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-lg-right">
                                                <a class="dropdown-item" href="">Login Activity</a>
                                                <a class="dropdown-item" href="#">Block</a>
                                                <a class="dropdown-item" href="">Turn off trade</a>

                                                <a href="#" data-toggle="modal" data-target="#topupModal"
                                                    class="dropdown-item">Credit/Debit</a>
                                                {{-- <a href="#" data-toggle="modal" data-target="#topupxModal"
                                                    class="dropdown-item">Fund / Wallet</a> --}}
                                                <a href="#" data-toggle="modal" data-target="#resetpswdModal"
                                                    class="dropdown-item">Reset Password</a>
                                                <a href="#" data-toggle="modal" data-target="#clearacctModal"
                                                    class="dropdown-item">Clear Account</a>

                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                    data-target="#accountSuspension">Account Suspension</a>

                                                <a href="#" data-toggle="modal" data-target="#accountverificationModal"
                                                    class="dropdown-item">Account Verification</a>

                                                <a href="#" data-toggle="modal" data-target="#edituser"
                                                    class="dropdown-item">Edit</a>
                                                <a href="#" data-toggle="modal" data-target="#sendmailtooneuserModal"
                                                    class="dropdown-item">Send Email</a>
                                                <a href="#" data-toggle="modal" data-target="#switchuserModal"
                                                    class="dropdown-item text-success">Gain Access</a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal"
                                                    class="dropdown-item text-danger">Delete {{$user->name}}</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 mt-4 border rounded row text-light">
                                <div class="col-md-3">
                                    <h5 class="text-bold">Total Balance</h5>
                                    <p>{{$user->currency}}{{number_format($total_sum, 2, '.', ',')}}</p>
                                    <p style="color:blue">(Balance in USD: {{
                            number_format($amountsInUSD['balance'], 2) }})</p>
                                          
                                </div>
                                <div class="col-md-3">
                                    <h5>Total Profit</h5>
                                    <p>{{$user->currency}}{{number_format($profit_sum, 2, '.', ',')}}</p>
                                     <p style="color:blue">(Profit in USD: {{
                            number_format($amountsInUSD['profit'], 2) }})</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>Total Investment</h5>
                                    <p>{{$user->currency}}{{number_format($investment_sum, 2, '.', ',')}}</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>Total Deposit</h5>
                                    <p>{{$user->currency}}{{number_format($approved_deposits_sum, 2, '.', ',')}}</p>
                                     <p style="color:blue">(Deposit in USD: {{
                            number_format($amountsInUSD['deposit'], 2) }})</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>Total Referral Bonus</h5>
                                    <p>{{$user->currency}}{{number_format($referral_sum, 2, '.', ',')}}</p>
                                     <p style="color:blue">(Referral in USD: {{
                            number_format($amountsInUSD['referral'], 2) }})</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>Total Withdrawal</h5>
                                    <p>{{$user->currency}}{{number_format($approved_withdrawals_sum, 2, '.', ',')}}</p>
                                     <p style="color:blue">(Withdrawal in USD: {{
                            number_format($amountsInUSD['withdrawal'], 2) }})</p>
                                </div>
                                <div class="col-md-3">
                                    <h5>User Account Status</h5>
                                    @if($user->user_status == 0)
                                    <td><span class="badge badge-danger">inactive</span></td>

                                    @else
                                    <td><span class="badge badge-success">active</span></td>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <h5>Inv. Plans</h5>

                                    <a class="btn btn-sm btn-primary d-inline" href="">View
                                        Plans</a>

                                </div>
                                <div class="col-md-3">
                                    <h5>KYC</h5>
                                    {{-- @if($kyc_status=="0")
                                    <span class="badge badge-danger">Not Verified Yet</span>
                                    @elseif($kyc_status=="1")
                                    <span class="badge badge-success">Verified</span>@endif --}}
                                </div>
                                <div class="col-md-3">
                                    <h5>Trade Mode</h5>
                                    <span class="badge badge-success">On</span>
                                </div>
                            </div>
                            <div class="mt-3 row text-light">
                                <div class="col-md-12">
                                    <h5>USER INFORMATION</h5>
                                </div>
                            </div>
                            <div class="p-3 border row text-light">
                                <div class="col-md-4 border-right">
                                    <h5>Fullname</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{$user->name}}</h5>
                                </div>
                            </div>

<div class="p-3 border row text-light"> 
    <div class="col-md-4 border-right">
        <h5>Email Address</h5>
    </div>
    <div class="col-md-8">
        <h5>{{$user->email}}</h5>
    </div>
</div>

<div class="p-3 border row text-light">
    <div class="col-md-4 border-right">
        <h5>Mobile Number</h5>
    </div>
    <div class="col-md-8">
        <h5>{{$user->phone}}</h5>
    </div>
</div>

<div class="p-3 border row text-light">
    <div class="col-md-4 border-right">
        <h5>User Status</h5>
    </div>
    <div class="col-md-8">
        <h5>{{$user->user_status}}</h5>
    </div>
</div>





<div class="p-3 border row text-light">
    <div class="col-md-4 border-right">
        <h5>Country</h5>
    </div>
    <div class="col-md-8">
        <h5>{{$user->country}}</h5>
    </div>
</div>



<div class="p-3 border row text-light">
    <div class="col-md-4 border-right">
        <h5>Bank Name</h5>
    </div>
    <div class="col-md-8">
        <h5>{{$user->bank_name}}</h5>
    </div>
</div>

<div class="p-3 border row text-light">
    <div class="col-md-4 border-right">
        <h5>Account Name</h5>
    </div>
    <div class="col-md-8">
        <h5>{{$user->account_name}}</h5>
    </div>
</div>

<div class="p-3 border row text-light">
    <div class="col-md-4 border-right">
        <h5>Account Number</h5>
    </div>
    <div class="col-md-8">
        <h5>{{$user->account_number}}</h5>
    </div>
</div>

<div class="p-3 border row text-light">
    <div class="col-md-4 border-right">
        <h5>Ethereum Address</h5>
    </div>
    <div class="col-md-8">
        <h5>{{$user->eth_address}}</h5>
    </div>
</div>

<div class="p-3 border row text-light">
    <div class="col-md-4 border-right">
        <h5>Bitcoin Address</h5>
    </div>
    <div class="col-md-8">
        <h5>{{$user->btc_address}}</h5>
    </div>
</div>



                            <div class="p-3 border row text-light">
                                <div class="col-md-4 border-right">
                                    <h5>Nationality</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{$user->country}}</h5>
                                </div>
                            </div>

                            <div class="p-3 border row text-light">
                                <div class="col-md-4 border-right">
                                    <h5>Registered</h5>
                                </div>
                                <div class="col-md-8">
                                    <h5>{{ \Carbon\Carbon::parse($user->created_at)->format('D, M j, Y g:i A') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Up Modal first -->
    <div id="topupModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light">Credit/Debit {{$user->name}}
                        account.</strong></h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <form action="{{route('credit-debit')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field()}}

                        <input type="hidden" class="form-control" name="user_id" value="{{$user->id}}">

                        <input type="hidden" class="form-control" name="name" value="{{$user->name}}">
                        <input type="hidden" class="form-control" name="email" value="{{$user->email}}">
                        <input type="hidden" class="form-control" name="balance" value="{{$total_sum}}">
                         <input type="hidden" class="form-control" name="currency" value="{{$user->currency}}">



                        <div class="form-group">
                            <input class="form-control bg-dark text-light" placeholder="Enter amount" type="text"
                                name="amount" required>
                        </div>
                        <div class="form-group">
                            <h5 class="text-light">Select where to Credit/Debit</h5>
                            <select class="form-control bg-dark text-light" name="type" required>
                                <option value="" selected disabled>Select Column</option>
                                <option value="Deposit">Deposit</option>
                                <option value="Earning">Earning</option>
                                <option value="Profit">Profit</option>
                                <option value="Ref_Bonus">Ref_Bonus</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5 class="text-light">Select credit to add, debit to subtract.</h5>
                            <select class="form-control bg-dark text-light" name="t_type" required>
                                <option value="">Select type</option>
                                <option value="Credit">Credit</option>
                                <option value="Debit">Debit</option>
                            </select>
                            <small> <b>NOTE:</b> You cannot debit deposit</small>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-light" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /deposit for a plan Modal -->



    <!-- Account verification Modal -->
    <div id="accountverificationModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light">You are about to verify {{$user->name}}'s account,
                        Ones you verify thier account they wil be able to access thier account.</strong></h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <a class="btn btn-success" href="{{ route('user.verification', $user->id) }}">Verify</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Account verification Modal -->

    <!-- Account suspension Modal -->
    <div id="accountSuspension" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light">You are about to suspend {{$user->name}}'s account,
                        Ones you verify thier account they wil not be able to access thier account.</strong></h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <a class="btn btn-success" href="{{ route('user.suspension', $user->id) }}">Account
                        Suspension</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Account suspension Modal -->




    <!-- Top Up Modal -->
    <div id="topupxModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light">Fund/Debit {{$user->first_name}} WALLET.</strong></h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <form action="" method="POST" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <input class="form-control bg-dark text-light" placeholder="Enter amount" type="text"
                                name="amount" required>
                        </div>
                        <div class="form-group">
                            <h5 class="text-light">Select Wallet to Credit/Debit</h5>
                            <select class="form-control bg-dark text-light" name="type" required>
                                <option value="" selected disabled>Select Wallet</option>
                                <option value="Bitcoin">Bitcoin</option>
                                <option value="Ethereum">Ethereum</option>
                                <option value="LTC">LTC</option>
                                <option value="BNB">BNB</option>
                                <option value="Doge">Doge</option>
                                <option value="USDT">USDT</option>
                                <option value="Dash">Dash</option>
                                <option value="Tron">Tron</option>
                                <option value="XRP">XRP</option>
                                <option value="EOS">EOS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5 class="text-light">Select credit to add, debit to subtract.</h5>
                            <select class="form-control bg-dark text-light" name="t_type" required>
                                <option value="">Select type</option>
                                <option value="Credit">Credit</option>
                                <option value="Debit">Debit</option>
                            </select>
                            <small> <b>NOTE:</b> You cannot debit deposit</small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="151">
                            <input type="submit" class="btn btn-light" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /deposit for a plan Modal -->












    <!-- send a single user email Modal-->
    <div id="sendmailtooneuserModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light">Send Email</h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <p class="text-light">This message will be sent to {{$user->name}}</p>
                    <form style="padding:3px;" role="form" method="post" action="{{ route('admin.send.mail')}}">

                        @csrf
                        <input type="hidden" name="email" value="{{$user->email}}">
                        <div class=" form-group">
                            <input type="text" name="subject" class="form-control bg-dark text-light"
                                placeholder="Subject" required>
                        </div>
                        <div class=" form-group">
                            <textarea placeholder="Type your message here" class="form-control bg-dark text-light"
                                name="message" row="8" placeholder="Type your message here" required></textarea>
                        </div>
                        <div class=" form-group">

                            <input type="submit" class="btn btn-light" value="Send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Trading History Modal -->

    <div id="TradingModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light">Add Trading History for {{$user->first_name}} </h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <form role="form" method="post"
                        action="https://stockmarket-hq.com/account/admin/dashboard/AddHistory">
                        <input type="hidden" name="_token" value="kdEbfxRivvoFCKcDsPzyFFmWfvfFFzdQoWNWGi0E">
                        <div class="form-group">
                            <h5 class=" text-light">Select Investment Plan</h5>
                            <select class="form-control bg-dark text-light" name="plan">
                                <option value="" selected disabled>Select Plan</option>
                                <option value="GME">GME</option>
                                <option value="Shopify">Shopify</option>
                                <option value="COCA-COLA">COCA-COLA</option>
                                <option value="MCDONALD">MCDONALD</option>
                                <option value="PayPal">PayPal</option>
                                <option value="META">META</option>
                                <option value="Google">Google</option>
                                <option value="Tesla">Tesla</option>
                                <option value="Microsoft">Microsoft</option>
                                <option value="Apple">Apple</option>
                                <option value="NETFLIX">NETFLIX</option>
                                <option value="AMAZON">AMAZON</option>
                                <option value="Jeff Paulson">Jeff Paulson</option>
                                <option value="Zack Whitney">Zack Whitney</option>
                                <option value="Nathaniel Forman">Nathaniel Forman</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <h5 class=" text-light">Amount</h5>
                            <input type="number" name="amount" class="form-control bg-dark text-light">
                        </div>
                        <div class="form-group">
                            <h5 class=" text-light">Type</h5>
                            <select class="form-control bg-dark text-light" name="type">
                                <option value="" selected disabled>Select type</option>
                                <option value="Bonus">Bonus</option>
                                <option value="ROI">ROI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-light" value="Add History">
                            <input type="hidden" name="user_id" value="151">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /send a single user email Modal -->

    <!-- Edit user Modal -->
    <div id="edituser" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light">Edit {{$user->name}} details.</strong>
                    </h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <form role="form" method="post" action="">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <h5 class=" text-light">Username</h5>
                            <input class="form-control bg-dark text-light" id="input1" value="{{$user->first_name}}"
                                type="text" name="username" required>
                            <small>Note: same username should be use in the referral link.</small>
                        </div>
                        <div class="form-group">
                            <h5 class=" text-light">Fullname</h5>
                            <input class="form-control bg-dark text-light" value="{{$user->last_name}}" type="text"
                                name="name" required>
                        </div>
                        <div class="form-group">
                            <h5 class=" text-light">Email</h5>
                            <input class="form-control bg-dark text-light" value="{{$user->email}}" type="text"
                                name="email" required>
                        </div>
                        <div class="form-group">
                            <h5 class=" text-light">Phone Number</h5>
                            <input class="form-control bg-dark text-light" value="{{$user->phone}}" type="text"
                                name="phone" required>
                        </div>
                        <div class="form-group">
                            <h5 class=" text-light">Country</h5>
                            <input class="form-control bg-dark text-light" value="{{$user->country}}" type="text"
                                name="country">
                        </div>
                        <div class="form-group">
                            <h5 class=" text-light">Referral link</h5>
                            <input class="form-control bg-dark text-light"
                                value="https://stockmarket-hq.com/account/ref/eddyblues13" type="text" name="ref_link"
                                required>
                        </div>
                        <div class="form-group">

                            <input type="submit" class="btn btn-light" value="Update">
                        </div>
                    </form>
                </div>
                <script>
                    $('#input1').on('keypress', function(e) {
                        return e.which !== 32;
                    });
                </script>
            </div>
        </div>
    </div>
    <!-- /Edit user Modal -->

    <!-- Reset user password Modal -->
    <div id="resetpswdModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light">Reset Password</strong></h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <p class="text-light">Are you sure you want to reset password for {{$user->first_name}} to <span
                            class="text-primary font-weight-bolder">user01236</span></p>
                    <a class="btn btn-light" href="{{ route('reset.password', $user->id) }}">Reset Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Reset user password Modal -->

    <!-- Switch useraccount Modal -->
    <div id="switchuserModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light">You are about to login as {{$user->first_name}}.</strong></h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <a class="btn btn-success" href="{{ route('users.impersonate', $user->id) }}">Proceed</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Switch user account Modal -->

    <!-- Clear account Modal -->
    <div id="clearacctModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h4 class="modal-title text-light">Clear Account</strong></h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark">
                    <p class="text-light">You are clearing account for {{$user->first_name}} to $0.00</p>
                    <a class="btn btn-light" href="{{route('clear.account',$user->id)}}">Proceed</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Clear account Modal -->

    <!-- Delete user Modal -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-dark">

                    <h4 class="modal-title text-light">Delete User</strong></h4>
                    <button type="button" class="close text-light" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-dark p-3">
                    <p class="text-light">Are you sure you want to delete {{$user->first_name}} Account? Everything
                        associated
                        with this account will be loss.</p>
                    <a class="btn btn-danger" href="{{ route('delete.user', $user->id) }}">Yes i'm sure</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete user Modal -->

    @include('admin.footer')