@include('dashboard.header')
<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Choose a Crypto Plan</h4><br>
                        <p>Your current Trading Package <font color="Red">"0"</font>
                        </p>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Choose</li>
                        <li class="breadcrumb-item active"><a href="#">Plan</a></li>
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


        <div class="row">
            @foreach($packages as $package)
            <div class="col-12 col-lg-6 col-xl-4 mt-3">
                <div class="card text-auto bg-default">
                    <div class="card-header text-uppercase text-center">
                        {{ $package->name }}
                    </div>
                    <div class="card-body">
                        <i class="fa fa-check" aria-hidden="true"></i> {{ $package->daily_roi }}% Daily ROI<br><br>

                        <i class="fa fa-check" aria-hidden="true"></i> Minimum investment: ${{
                        number_format($package->minimum_investment, 2) }}<br><br>

                        <i class="fa fa-check" aria-hidden="true"></i> {{ $package->duration_days }} days investment
                        duration<br><br>

                        @if($package->instant_withdrawal)
                        <i class="fa fa-check" aria-hidden="true"></i> Instant daily withdrawal of earnings<br><br>
                        @endif

                        <i class="fa fa-check" aria-hidden="true"></i> Minimum withdrawal of ${{
                        number_format($package->minimum_withdrawal, 2) }}<br>

                        <form style="padding:3px;" role="form" method="post" action="{{ route('trade.store') }}">
                            @csrf
                            <select class="form-control" name="duration" hidden>
                                <option>
                                    @if($package->duration_days == 30)
                                    One month
                                    @elseif($package->duration_days == 60)
                                    Two months
                                    @elseif($package->duration_days == 90)
                                    Three months
                                    @else
                                    {{ $package->duration_days }} days
                                    @endif
                                </option>
                            </select>
                            <hr>
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInputGroup">Investment Amount</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" class="form-control" min="{{ $package->minimum_investment }}"
                                        max="3000000" name="iamount"
                                        placeholder="Type in minimum of {{ $package->minimum_investment }}" required>
                                </div>
                            </div>
                            <center>
                                <input type="hidden" name="id" value="{{ $package->id }}">
                                <input type="submit" class="btn btn-primary" value="Activate Plan">
                            </center>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach



        </div><br><br><br>













    </div>


    </div>
    </div>
    </div>
    </div>
    <!-- END: Card DATA-->
    </div>

</main>
@include('dashboard.footer')