@include('dashboard.header')

<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <h2 class="content-header-title float-left mb-0">New Loan</h2>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../">Home</a></li>
                    <li class="breadcrumb-item"><a href="../">New Loan</a></li>
                    <li class="breadcrumb-item">New Loan</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="content-body">
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Apply for Loan</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <!-- Display Success Message -->
                                        @if(session('status'))
                                        <div class="alert alert-success alert-dismissable">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            <i class="fa fa-info-circle"></i> {{ session('status') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <form method="post" action="{{ route('loan.apply') }}" class="form">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-label-group">
                                            <input type="number" class="form-control form-control-lg"
                                                placeholder="Amount" name="amount" required>
                                            <label for="amount">Loan Amount</label>
                                        </div>

                                        <div class="form-label-group">
                                            <input type="text" class="form-control form-control-lg" placeholder="Reason"
                                                name="reason" required>
                                            <label for="reason">Reason For Loan</label>
                                        </div>

                                        <div class="form-label-group">
                                            <input type="text" class="form-control form-control-lg"
                                                placeholder="Current Address" name="address" required>
                                            <label for="address">Current Address</label>
                                        </div>

                                        <div class="form-label-group">
                                            <input type="text" class="form-control form-control-lg"
                                                placeholder="Guarantor" name="guarantor" required>
                                            <label for="guarantor">Guarantor</label>
                                        </div>

                                        <div class="form-label-group">
                                            <select class="form-control form-control-lg" name="repayment_plan" required>
                                                <option value="">Select Repayment Plan</option>
                                                <option value="Daily">Daily Repayment</option>
                                                <option value="Weekly">Weekly Repayment</option>
                                                <option value="Monthly">Monthly Repayment</option>
                                            </select>
                                            <label for="repayment_plan">Repayment Plan</label>
                                        </div>

                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn btn-primary">Apply Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="content-body">
                        <section id="loan-history">
                            <div class="row">
                                <div class="col-lg-10 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Your Loan History</h4>
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                @if($loans->isEmpty())
                                                <p>No loans found.</p>
                                                @else
                                                <div class="table-responsive">
                                                    <table class="table table-hover text-dark">
                                                        <thead>
                                                            <tr>
                                                                <th>ID</th>
                                                                <th>Amount Requested</th>
                                                                <th>Repayment Plan</th>
                                                                <th>Reason</th>
                                                                <th>Status</th>
                                                                <th>Date Created</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($loans as $loan)
                                                            <tr>
                                                                <td>{{ $loan->id }}</td>
                                                                <td>${{ number_format($loan->amount, 2) }}</td>
                                                                <td>{{ $loan->repayment_plan }}</td>
                                                                <td>{{ $loan->reason }}</td>
                                                                <td>{{ $loan->status }}</td>
                                                                <td>{{ $loan->created_at->format('Y-m-d') }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@include('dashboard.footer')