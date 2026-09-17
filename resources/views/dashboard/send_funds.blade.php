@include('dashboard.header')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- END: Header-->
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Send Fund</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('send.funds') }}">New Transfer</a>
                            </li>
                            <li class="breadcrumb-item active">New Withdrawal</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Fund Transfer</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form method="POST" action="{{ route('send.fund') }}" class="form">
                                    @csrf
                                    <div class="form-body">
                                        <p>Account balance: <b style="color:red">${{
                                                number_format($balance_sum, 2) }}</b></p>
                                        <p>Profit Balance: <b style="color:red">${{
                                                number_format($profit_sum, 2) }}</b></p>

                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-label-group">
                                                    <input type="email" id="recipient-email"
                                                        class="form-control form-control-lg"
                                                        placeholder="Enter Recipient Email" name="email" required>
                                                    <label for="recipient-email">Receiver Email</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="form-label-group">
                                                    <input type="number" id="transfer-amount"
                                                        class="form-control form-control-lg" placeholder="Amount"
                                                        name="amount" required>
                                                    <label for="transfer-amount">Amount</label>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="form-label-group">
                                                    <select id="transfer-from" class="form-control form-control-lg"
                                                        name="type" required>
                                                        <option value="">Select option</option>
                                                        <option value="1">Account Balance <br><b
                                                                style="color:red">$0</b></option>
                                                        <option value="2">Profit Balance<br><b style="color:red">$0</b>
                                                        </option>
                                                    </select>
                                                    <label for="transfer-from">Transfer From</label>
                                                </div>
                                            </div>

                                            <div class="col-12 text-center">
                                                <button type="submit" class="btn btn-primary mr-1 mb-1">Transfer
                                                    Fund</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Transfer History -->
                    <div class="row">
                        <div class="col card p-3">
                            <h3 class="title1 text-dark">Transfer History</h3>
                            <p>
                                <button onclick="toggleSection('Demo1')" class="btn btn-primary mr-1 mb-1">Sent</button>
                                <button onclick="toggleSection('Demo2')"
                                    class="btn btn-primary mr-1 mb-1">Received</button>
                            </p>
                            <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                                <div id="Demo1" class="w3-hide w3-container">
                                    <p>Sent funds</p>
                                    <table class="table table-hover text-dark">
                                        <thead>
                                            <tr class="w3-indigo">
                                                <th>ID</th>
                                                <th>Amount Sent</th>
                                                <th>Receiver</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Transfer history entries go here -->
                                        </tbody>
                                    </table>
                                </div>

                                <div id="Demo2" class="w3-hide w3-container w3-pale-blue">
                                    <p>Received fund</p>
                                    <table class="table table-hover text-dark">
                                        <thead>
                                            <tr class="w3-black">
                                                <th>ID</th>
                                                <th>Amount Sent</th>
                                                <th>Sender</th>
                                                <th>Status</th>
                                                <th>Date Created</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Transfer history entries go here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <script>
                            function toggleSection(id) {
                                var element = document.getElementById(id);
                                if (element.className.indexOf("w3-show") == -1) {
                                    element.className += " w3-show";
                                } else {
                                    element.className = element.className.replace(" w3-show", "");
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('dashboard.footer')