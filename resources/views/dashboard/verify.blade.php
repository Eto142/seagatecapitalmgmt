@include('dashboard.header')

<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12 align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Account Verification Required</h4>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active">Account</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Warning Message-->
        <div class="row">
            <div class="col-12 col-md-12 mt-3">
                <div class="alert alert-danger text-center">
                    <h5><strong>Warning:</strong> Your account is not verified!</h5>
                    <p>Please verify your account to gain full access to all features. If you have already submitted
                        your verification details, kindly wait for approval.</p>
                </div>
                <div class="text-center mt-4">
                    <a href="" class="btn btn-primary">Verify Account</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
        <!-- END: Warning Message-->

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