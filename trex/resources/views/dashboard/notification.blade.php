@include('dashboard.header')
<div class="content-wrapper">

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">News Update</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">

                            <li class="breadcrumb-item">
                                <a href="../"> Home </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href=",,/"> News update </a>
                            </li>
                            <li class="breadcrumb-item">
                                news </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">

        <!-- Zero configuration table -->
        <section id="basic-datatable">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Recent Activated plan</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Message</th>
                                                <th>Recieve Date</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    </table>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>
        @include('dashboard.footer')