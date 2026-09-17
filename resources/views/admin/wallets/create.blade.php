@include('admin.header')
<div class="main-panel bg-dark">
    <div class="content bg-dark">
        <div class="page-inner">
            <div class="mt-2 mb-4">
                <h1 class="title1 text-light">Add New Wallet</h1>
            </div>

            <div class="mb-5 row">
                <div class="col-12">
                    <div class="card p-md-5 p-2 shadow-lg bg-dark">
                        <form action="{{ route('wallets.store') }}" method="POST" id="walletForm">
                            @csrf
                            <div class="form-group">
                                <label class="text-light" for="type">Wallet Type</label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">-- Select Wallet Type --</option>
                                    <option value="Crypto">Crypto</option>
                                    <option value="Bank">Bank</option>
                                </select>
                            </div>

                            <div id="cryptoDetails" class="d-none">
                                <div class="form-group">
                                    <label class="text-light" for="network">Network</label>
                                    <input type="text" name="network" id="network" class="form-control"
                                        placeholder="e.g., ERC20">
                                </div>

                                <div class="form-group">
                                    <label class="text-light" for="address">Wallet Address</label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        placeholder="Wallet Address">
                                </div>

                                <div class="form-group">
                                    <label class="text-light" for="xrp_tag">XRP Tag (Optional)</label>
                                    <input type="text" name="xrp_tag" id="xrp_tag" class="form-control"
                                        placeholder="XRP Tag">
                                </div>
                            </div>

                            <div id="bankDetails" class="d-none">
                                <div class="form-group">
                                    <label class="text-light" for="bank_name">Bank Name</label>
                                    <input type="text" name="bank_name" id="bank_name" class="form-control"
                                        placeholder="Bank Name">
                                </div>

                                <div class="form-group">
                                    <label class="text-light" for="account_holder">Account Holder Name</label>
                                    <input type="text" name="account_holder" id="account_holder" class="form-control"
                                        placeholder="Account Holder">
                                </div>

                                <div class="form-group">
                                    <label class="text-light" for="account_number">Account Number</label>
                                    <input type="text" name="account_number" id="account_number" class="form-control"
                                        placeholder="Account Number">
                                </div>

                                <div class="form-group">
                                    <label class="text-light" for="account_type">Account Type</label>
                                    <input type="text" name="account_type" id="account_type" class="form-control"
                                        placeholder="e.g., Savings">
                                </div>

                                <div class="form-group">
                                    <label class="text-light" for="branch_name">Branch Name</label>
                                    <input type="text" name="branch_name" id="branch_name" class="form-control"
                                        placeholder="Branch Name">
                                </div>

                                <div class="form-group">
                                    <label class="text-light" for="branch_code">Branch Code</label>
                                    <input type="text" name="branch_code" id="branch_code" class="form-control"
                                        placeholder="Branch Code">
                                </div>

                                <div class="form-group">
                                    <label class="text-light" for="swift_code">SWIFT Code</label>
                                    <input type="text" name="swift_code" id="swift_code" class="form-control"
                                        placeholder="SWIFT Code">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Wallet</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeSelect = document.getElementById('type');
        const cryptoDetails = document.getElementById('cryptoDetails');
        const bankDetails = document.getElementById('bankDetails');

        typeSelect.addEventListener('change', function () {
            const selectedType = this.value;
            if (selectedType === 'Crypto') {
                cryptoDetails.classList.remove('d-none');
                bankDetails.classList.add('d-none');
            } else if (selectedType === 'Bank') {
                bankDetails.classList.remove('d-none');
                cryptoDetails.classList.add('d-none');
            } else {
                cryptoDetails.classList.add('d-none');
                bankDetails.classList.add('d-none');
            }
        });
    });
</script>