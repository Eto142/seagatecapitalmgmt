@include('dashboard.header')
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto"> <b>Welcome to your Portfolio</b></div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- START: Card Data-->
        <div class="row">
            <div class="col-12 col-sm-6 col-xl-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('dist/images/wallet.png')}}" alt="wallet" class="float-right" />
                        <h6 class="card-title font-weight-bold">Total Balance</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Today</h6>
                        <h2>{{Auth::user()->currency}}{{
                            number_format($total_sum, 2) }}</h2>
                        <h6 style="color:blue">(Balance in USD: {{
                            number_format($amountsInUSD['balance'], 2) }})</h6>
                        <span class="text-success"><i class="ion ion-android-arrow-dropup"></i>
                            <script>
                                document.write(Math.ceil(Math.random() * 49))
                            </script>%
                        </span> than last day
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('dist/images/money.png')}}" alt="money" class="float-right" />
                        <h6 class="card-title font-weight-bold">Total Deposit</h6>
                        <h6 class="card-subtitle mb-2 text-muted">This Week</h6>
                        <h2>{{Auth::user()->currency}}{{
                            number_format($approved_deposits_sum, 2) }}
                        </h2>
                        <h6 style="color:blue">(Deposit in USD: {{
                            number_format($amountsInUSD['deposit'], 2) }})</h6>
                        <span class="text-success"><i class="ion ion-android-arrow-dropup"></i>
                            <script>
                                document.write(Math.ceil(Math.random() * 49))
                            </script>%
                        </span> than last week
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('dist/images/cart.png')}}" alt="cart" class="float-right" />
                        <h6 class="card-title font-weight-bold">All Time Profit</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Total ROI</h6>
                        <h2>{{Auth::user()->currency}}{{
                            number_format($profit_sum, 2) }}</h2>
                        <h6 style="color:blue">(Profit in USD: {{
                            number_format($amountsInUSD['profit'], 2) }})</h6>
                        <span class="text-success"><i class="ion ion-android-arrow-dropup"></i>
                            <script>
                                document.write(Math.ceil(Math.random() * 49))
                            </script>%
                        </span> than last week
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-3 mt-3">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('dist/images/wallet.png')}}" alt="wallet" class="float-right" />
                        <h6 class="card-title font-weight-bold">Referral Bonus</h6>
                        <h6 class="card-subtitle mb-2 text-muted">Earnings for referral</h6>
                        <h2>{{Auth::user()->currency}}{{
                            number_format($referral_sum, 2) }} </h2>
                         <h6 style="color:blue">(Earning in USD: {{
                            number_format($amountsInUSD['referral'], 2) }})</h6>
                        <span class="text-success"><i class="ion ion-android-arrow-dropup"></i>
                            <script>
                                document.write(Math.ceil(Math.random() * 49))
                            </script>%
                        </span> all time referral
                    </div>
                </div>
            </div>

            <div class="col-12  col-lg-12 col-xl-12 mt-3">
                <div class="card">
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div id="tradingview_6e482"></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                        <script type="text/javascript">
                            new TradingView.MediumWidget({
                                        "symbols": [
                                            [
                                                "BITSTAMP:BTCUSD|12M"
                                            ],
                                            [
                                                "BINANCE:ETHUSDT|12M"
                                            ],
                                            [
                                                "BINANCE:DOGEUSDT|12M"
                                            ],
                                            [
                                                "BINANCE:SHIBUSDT|12M"
                                            ],
                                            [
                                                "BITSTAMP:XRPUSD|12M"
                                            ]
                                        ],
                                        "chartOnly": false,
                                        "width": "100%",
                                        "height": 400,
                                        "locale": "en",
                                        "colorTheme": "light",
                                        "gridLineColor": "rgba(42 ,46, 57, 0)",
                                        "fontColor": "#787B86",
                                        "isTransparent": false,
                                        "autosize": false,
                                        "showFloatingTooltip": true,
                                        "scalePosition": "no",
                                        "scaleMode": "Normal",
                                        "fontFamily": "Trebuchet MS, sans-serif",
                                        "noTimeScale": false,
                                        "chartType": "area",
                                        "lineColor": "#2962FF",
                                        "bottomColor": "rgba(41, 98, 255, 0)",
                                        "topColor": "rgba(41, 98, 255, 0.3)",
                                        "container_id": "tradingview_6e482"
                                    });
                        </script>
                    </div>
                    <!-- TradingView Widget END -->

                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container">
                        <div class="tradingview-widget-container__widget"></div>
                        <script type="text/javascript"
                            src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                            {
                                        "width": "100%",
                                        "height": 490,
                                        "defaultColumn": "overview",
                                        "screener_type": "crypto_mkt",
                                        "displayCurrency": "BTC",
                                        "colorTheme": "light",
                                        "locale": "en"
                                    }
                        </script>
                    </div>
                    <!-- TradingView Widget END -->





                    <br><br><br>

                    <!-- send all users email -->
                    <div id="sendmailModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title" style="text-align:center;">Mail All Users On This
                                        Platform</h4>
                                    <form style="padding:3px;" role="form" method="post"
                                        action="https://Seagatecapitalmgmt.com/dashboard/sendmail">

                                        <textarea class="form-control" name="message" row="3"
                                            required=""></textarea><br />

                                        <input type="hidden" name="_token"
                                            value="CFyCuubD7pLdQdtRqibuWh75STB4TN8ENnNJ29if">
                                        <center><input type="submit" class="btn btn-primary" value="Send"></center>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /send all users email Modal -->


             

                    <!-- Deposit Modal -->
                    <div id="depositModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h6 class="modal-title">
                                        <center><strong>ENTER AMOUNT TO DEPOSIT BELOW</strong></center>
                                    </h6>
                                    <form style="padding:3px;" role="form" method="post"
                                        action="https://Seagatecapitalmgmt.com/dashboard/deposit">

                                        <div class="col-auto">
                                            <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">&#36;</div>
                                                </div>
                                                <input type="text" class="form-control" id="inlineFormInputGroup"
                                                    placeholder="Enter amount here..." name="amount" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token"
                                            value="CFyCuubD7pLdQdtRqibuWh75STB4TN8ENnNJ29if">
                                        <center><input type="submit" class="btn btn-primary" value="Continue">
                                        </center>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /deposit Modal -->


                    <!-- Withdrawal method Modal -->
                    <div id="wmethodModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title" style="text-align:center;">Add new withdrawal method
                                    </h4>
                                    <form style="padding:3px;" role="form" method="post"
                                        action="https://Seagatecapitalmgmt.com/dashboard/addwdmethod">
                                        <input style="padding:5px;" class="form-control" placeholder="Enter method name"
                                            type="text" name="name" required><br />
                                        <input style="padding:5px;" class="form-control" placeholder="Minimum amount $"
                                            type="text" name="minimum" required><br />
                                        <input style="padding:5px;" class="form-control" placeholder="Maximum amount $"
                                            type="text" name="maximum" required><br />
                                        <input style="padding:5px;" class="form-control"
                                            placeholder="Charges (Fixed amount $)" type="text" name="charges_fixed"
                                            required><br />
                                        <input style="padding:5px;" class="form-control"
                                            placeholder="Charges (Percentage %)" type="text" name="charges_percentage"
                                            required><br />
                                        <input style="padding:5px;" class="form-control" placeholder="Payout duration"
                                            type="text" name="duration" required><br />
                                        <select name="status" class="form-control">
                                            <option value="">Select action</option>
                                            <option value="enabled">Enable</option>
                                            <option value="disabled">Disable</option>
                                        </select><br />
                                        <input type="hidden" name="type" value="withdrawal">
                                        <input type="hidden" name="_token"
                                            value="CFyCuubD7pLdQdtRqibuWh75STB4TN8ENnNJ29if">
                                        <center> <input type="submit" class="btn btn-primary" value="Continue">
                                        </center>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /withdrawal method Modal -->


                    <!-- Withdrawal Modal -->
                    <div id="withdrawalModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title" style="text-align:center;">ENTER AMOUNT BELOW</h4>
                                    <form style="padding:3px;" role="form" method="post"
                                        action="https://Seagatecapitalmgmt.com/dashboard/withdrawal">
                                        <input style="padding:5px;" class="form-control" placeholder="Enter amount here"
                                            type="text" name="amount" required><br />

                                        <input type="hidden" name="_token"
                                            value="CFyCuubD7pLdQdtRqibuWh75STB4TN8ENnNJ29if">
                                        <center><input type="submit" class="btn btn-primary" value="Submit">
                                        </center>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Withdrawals Modal -->

                    <!-- Deposit for a plan Modal -->
                    <div id="topupModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title" style="text-align:center;">Top up user account.</strong>
                                    </h4>
                                    <form style="padding:3px;" role="form" method="post"
                                        action="https://Seagatecapitalmgmt.com/dashboard/topup">
                                        <input style="padding:5px;" class="form-control" value="" type="text"
                                            disabled><br />
                                        <input style="padding:5px;" class="form-control"
                                            placeholder="Enter amount to top up" type="text" name="amount"
                                            required><br />
                                        <input type="hidden" name="_token"
                                            value="CFyCuubD7pLdQdtRqibuWh75STB4TN8ENnNJ29if">
                                        <input type="hidden" name="user_id" value="">
                                        <center><input type="submit" class="btn btn-primary" value="Credit account">
                                        </center>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /deposit for a plan Modal -->

                    <!-- /Trading History Modal -->

                    <div id="TradingModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-body">
                                    <center>
                                        <h4>Add Trading History for </h4>
                                    </center>

                                    <form style="padding:3px;" role="form" method="post"
                                        action="https://Seagatecapitalmgmt.com/dashboard/AddHistory">
                                        <input type="hidden" name="user_id" value="">

                                        <div class="form-group">
                                            <label>Investment Plans</label>
                                            <select class="form-control" name="plan">
                                                <option value="">Select Plan</option>
                                            </select>
                                        </div>
                                        <label>Amount</label>
                                        <input type="number" name="amount" class="form-control">
                                        <br>
                                        <div class="form-group">
                                            <label>Type</label>
                                            <select class="form-control" name="type">
                                                <option value="">Select type</option>
                                                <option value="Bonus">Bonus</option>
                                                <option value="ROI">ROI</option>
                                            </select>
                                        </div>

                                        <input type="hidden" name="_token"
                                            value="CFyCuubD7pLdQdtRqibuWh75STB4TN8ENnNJ29if">
                                        <input type="submit" class="btn btn-default" value="Add History">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /send a single user email Modal -->

                    <!-- send a single user email Modal-->
                    <div id="sendmailtooneuserModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title" style="text-align:center;">This message will be sent to
                                </h4>
                            </div>

                            <div class="modal-body">
                                <form style="padding:3px;" role="form" method="post"
                                    action="https://Seagatecapitalmgmt.com/dashboard/sendmailsingle">
                                    <input type="hidden" name="user_id" value="">
                                    <textarea class="form-control" name="message" row="3" required=""></textarea><br />

                                    <input type="hidden" name="_token" value="CFyCuubD7pLdQdtRqibuWh75STB4TN8ENnNJ29if">
                                    <input type="submit" class="btn btn-default" value="Send">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- Reset user password Modal -->
                <div id="resetpswdModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="modal-title" style="text-align:center;">You are reseting password for
                                    .</strong>
                                </h4>
                                <p>Default password:</p>
                                <h3>#Tr@de#</h3><br>
                                <center> <a class="btn btn-primary"
                                        href="https://Seagatecapitalmgmt.com/dashboard/resetpswd/">Proceed</a></center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                            <div class="modal-body">
                                <h4 class="modal-title" style="text-align:center;">You are about to login as
                                    .</strong>
                                </h4>
                                <center> <a class="btn btn-primary"
                                        href="https://Seagatecapitalmgmt.com/dashboard/switchuser/">Proceed</a>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Switch user account Modal -->


                <!-- Edit user Modal -->
                <div id="edituser" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="modal-title" style="text-align:center;">Edit 's Details.</strong>
                                </h4>

                                <form style="padding:3px;" role="form" method="post"
                                    action="https://Seagatecapitalmgmt.com/dashboard/edituser">
                                    <input style="padding:5px;" class="form-control" value="" type="text"
                                        disabled><br />
                                    <label>Full name</label>
                                    <input style="padding:5px;" class="form-control" value="" type="text" name="name"
                                        required><br />
                                    <label>Email</label>
                                    <input style="padding:5px;" class="form-control" value="" type="text" name="email"
                                        required><br />
                                    <label>Phone number</label>
                                    <input style="padding:5px;" class="form-control" value="" type="text" name="phone"
                                        required><br />
                                    <label>Referral link</label>
                                    <input style="padding:5px;" class="form-control" value="" type="text"
                                        name="ref_link" required><br />
                                    <input type="hidden" name="_token" value="CFyCuubD7pLdQdtRqibuWh75STB4TN8ENnNJ29if">
                                    <input type="hidden" name="user_id" value="">
                                    <input type="submit" class="btn btn-default" value="Update user">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Edit user Modal -->

                <!-- Clear account Modal -->
                <div id="clearacctModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="modal-title" style="text-align:center;">You are clearing account for to
                                    $0.00</strong>
                                </h4>
                                <center> <a class="btn btn-primary"
                                        href="https://Seagatecapitalmgmt.com/dashboard/clearacct/">Proceed</a></center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Clear account Modal -->

                <!-- Plans Modal -->
                <div id="plansModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="modal-title" style="text-align:center;">Add new plan / package</h4>

                                <form style="padding:3px;" role="form" method="post"
                                    action="https://Seagatecapitalmgmt.com/dashboard/addplan">
                                    <label>Plan name</label><br />
                                    <input style="padding:5px;" class="form-control" placeholder="Enter Plan name"
                                        type="text" name="name" required><br />
                                    <label>Plan price</label><br />
                                    <input style="padding:5px;" class="form-control" placeholder="Enter Plan price"
                                        type="text" name="price" required><br />
                                    <label>Plan MIN. price</label><br />
                                    <input style="padding:5px;" placeholder="Enter Plan minimum price"
                                        class="form-control" type="text" name="min_price" required><br />
                                    <label>Plan MAX. price</label><br />
                                    <input style="padding:5px;" class="form-control"
                                        placeholder="Enter Plan maximum price" type="text" name="max_price"
                                        required><br />
                                    <label>Plan expected return (ROI)</label><br />
                                    <input style="padding:5px;" class="form-control"
                                        placeholder="Enter expected return for this plan" type="text" name="return"
                                        required><br />
                                    <label>top up interval</label><br />
                                    <select class="form-control" name="t_interval">
                                        <option>Monthly</option>
                                        <option>Weekly</option>
                                        <option>Daily</option>
                                        <option>Hourly</option>
                                    </select><br>
                                    <label>top up type</label><br />
                                    <select class="form-control" name="t_type">
                                        <option>Percentage</option>
                                        <option>Fixed</option>
                                    </select><br>
                                    <label>top up amount (in % or $ as specified above)</label><br />
                                    <input style="padding:5px;" class="form-control" placeholder="top up amount"
                                        type="text" name="t_amount" required><br />
                                    <label>Investment duration</label><br />
                                    <select class="form-control" name="expiration">
                                        <option>One week</option>
                                        <option>One month</option>
                                        <option>Three months</option>
                                        <option>Six months</option>
                                        <option>One year</option>
                                    </select><br>
                                    <input type="hidden" name="_token" value="CFyCuubD7pLdQdtRqibuWh75STB4TN8ENnNJ29if">
                                    <center> <input type="submit" class="btn btn-primary" value="Submit"></center>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /plans Modal -->

                <!-- settings update Modal -->
                <div id="s_updModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <center>
                                    <p>
                                    <h4>UPDATE TRACKER</h4>
                                    </p>
                                </center>
                                <hr>
                                <p>
                                <h5>LAST UPDATED BY: Super Admin</h5>
                                </p>
                                <p>
                                <h5>TIME UPDATED: 2024-07-20 22:44:00</h5>
                                </p>
                                <hr>
                                <p>
                                    <font color="red">If Data Was Updated By an impostor or none admin, please
                                        change admin login details Immediately.</font>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /settings update Modal -->
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