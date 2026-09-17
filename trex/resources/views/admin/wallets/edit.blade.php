@include('admin.header')
<div class="main-panel bg-dark">
    <div class="content bg-dark">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-light">Edit Wallet</h1>
            </div>

            <div class="mb-5 row">
                <div class="col-12">
                    <div class="card p-md-5 p-2 shadow-lg bg-dark">
                        <form action="{{ route('wallets.update', $wallet->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Wallet Type -->
                            <div class="form-group">
                                <label class="text-light" for="type">Wallet Type</label>
                                <input type="text" name="type" id="type" class="form-control"
                                    value="{{ $wallet->type }}" readonly>
                            </div>

                            <!-- Network (Visible for non-bank wallets) -->
                            @if($wallet->type !== 'Bank')
                            <div class="form-group">
                                <label class="text-light" for="network">Network</label>
                                <input type="text" name="network" id="network" class="form-control"
                                    value="{{ $wallet->network }}">
                            </div>

                            <div class="form-group">
                                <label class="text-light" for="address">Wallet Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    value="{{ $wallet->address }}">
                            </div>

                            <!-- XRP Tag (Only if it exists) -->
                            @if($wallet->xrp_tag)
                            <div class="form-group">
                                <label class="text-light" for="xrp_tag">XRP Tag</label>
                                <input type="text" name="xrp_tag" id="xrp_tag" class="form-control"
                                    value="{{ $wallet->xrp_tag }}">
                            </div>
                            @endif
                            @endif

                            <!-- Bank-specific Fields -->
                            @if($wallet->type === 'Bank')
                            <div class="form-group">
                                <label class="text-light" for="bank_name">Bank Name</label>
                                <input type="text" name="bank_name" id="bank_name" class="form-control"
                                    value="{{ $wallet->bank_name }}">
                            </div>

                            <div class="form-group">
                                <label class="text-light" for="account_holder">Account Holder Name</label>
                                <input type="text" name="account_holder" id="account_holder" class="form-control"
                                    value="{{ $wallet->account_holder }}">
                            </div>

                            <div class="form-group">
                                <label class="text-light" for="account_number">Account Number</label>
                                <input type="text" name="account_number" id="account_number" class="form-control"
                                    value="{{ $wallet->account_number }}">
                            </div>

                            <div class="form-group">
                                <label class="text-light" for="account_type">Account Type</label>
                                <input type="text" name="account_type" id="account_type" class="form-control"
                                    value="{{ $wallet->account_type }}">
                            </div>

                            <div class="form-group">
                                <label class="text-light" for="branch_name">Branch Name</label>
                                <input type="text" name="branch_name" id="branch_name" class="form-control"
                                    value="{{ $wallet->branch_name }}">
                            </div>

                            <div class="form-group">
                                <label class="text-light" for="branch_code">Branch Code</label>
                                <input type="text" name="branch_code" id="branch_code" class="form-control"
                                    value="{{ $wallet->branch_code }}">
                            </div>

                            <div class="form-group">
                                <label class="text-light" for="swift_code">SWIFT Code</label>
                                <input type="text" name="swift_code" id="swift_code" class="form-control"
                                    value="{{ $wallet->swift_code }}">
                            </div>
                            @endif

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Update Wallet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')