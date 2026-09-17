@include('dashboard.header')
<div class="main-panel bg-light">
    <div class="content bg-light">
        <div class="page-inner">
            <div class="mt-2 mb-5">
                <h1 class="title1 text-dark">Change Your Password</h1><br><br>
            </div>

            <!-- Display Success Message -->
            <div class="row">
                <div class="col-lg-12">
                    @if(session('status'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-info-circle"></i> {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>

            <!-- Display Error Messages -->
            <div class="row">
                <div class="col-lg-12">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-exclamation-circle"></i> Please fix the following errors:
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-lg-8 offset-lg-2 card p-4 shadow-lg bg-light">
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        <div class="form-group bg-light mb-2">
                            <h5 class="text-dark">Old Password</h5>
                            <input type="password" name="old_password" class="form-control text-dark bg-light" required>
                        </div>
                        <div class="form-group bg-light mb-2">
                            <h5 class="text-dark">New Password*</h5>
                            <input type="password" name="password" class="form-control text-dark bg-light" required>
                        </div>
                        <div class="form-group bg-light mb-2">
                            <h5 class="text-dark">Confirm Password*</h5>
                            <input type="password" name="password_confirmation" class="form-control text-dark bg-light"
                                required>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @include('dashboard.footer')