@include('dashboard.header')

<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row">
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
    
    <!-- Verify Modal -->
    <div id="verifyModal" class="modal fade" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="modal-title text-center" id="verifyModalLabel">USER VERIFICATION SYSTEM</h4>
                    <center>
                        <p>
                            <font color="red">Upload required documents to get verified.<br>Using the format below:</font>
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
                        <center><button type="submit" class="btn btn-primary">Submit Documents</button></center>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /Verify Modal -->
</main>

<!-- END: Content-->

<!-- Footer -->
<footer>
    <style>
        footer {
            background-color: #EAEDD0;
            text-align: center;
            width: 100%;
            position: fixed;
            bottom: 0;
        }
    </style>
</footer>
@include('dashboard.footer')

<!-- Bootstrap and Script -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Auto Show Modal Script -->
<script>
    $(document).ready(function () {
        let myModal = new bootstrap.Modal(document.getElementById('verifyModal'), {
            keyboard: false,
            backdrop: 'static'
        });
        myModal.show();
    });
</script>
