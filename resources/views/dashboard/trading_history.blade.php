@include('dashboard.header')

<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row ">
            <div class="col-12  align-self-center">
                <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                    <div class="w-sm-100 mr-auto">
                        <h4 class="mb-0">Active Return of Interest</h4>
                    </div>

                    <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Active</li>
                        <li class="breadcrumb-item active"><a href="#">ROI</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- END: Breadcrumbs-->


        <div class="row">
            <div class="col-12 col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="btn-group mb-2">
                            <strong> TOTAL RETURNS OF INTEREST</strong>
                        </div>

                        <div class="table-responsive">
                            <table id="example" class="display table dataTable table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>PLAN</th>
                                        <th>AMOUNT</th>
                                        <th>TYPE</th>
                                        <th>CURRENCY PAIR</th>
                                        <th>DATE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <span style="margin:3px;">

                                    </span>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div><br><br><br>
            </div>


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