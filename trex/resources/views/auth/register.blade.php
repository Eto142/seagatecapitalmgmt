@include('home.header')

<main>
    <!-- Section Content Begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-2-3@m uk-width-1-1@s uk-margin-auto">
                    <h1 class="uk-margin-remove-bottom uk-text-white">Register</h1>
                    <p class="uk-text-lead uk-text-muted uk-margin-small-top uk-text-light">
                        Create your account to get started.
                    </p>
                </div>

                <div class="uk-width-2-3@m uk-width-1-1@s uk-margin-auto">
                    <div class="uk-margin-medium-left in-margin-remove-left@s">
                        <form id="register-form" action="{{ route('register') }}" method="POST"
                            class="uk-form uk-grid-small" uk-grid>
                            @csrf
                            @if($referred_by)
                            <input type="hidden" name="referred_by" value="{{ $referred_by->id }}">
                            @endif
                            
                            <!-- Honeypot field -->
                             <input type="text" name="honeypot" style="display:none;">
                                       <!-- Timestamp field -->
                             <input type="hidden" name="timestamp" value="{{ now()->timestamp }}">


                            <!-- Fullname -->
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="name" class="uk-text-white">Fullname*</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                        placeholder="Enter your Fullname"
                                        class="uk-input uk-border-rounded @error('name') uk-form-danger @enderror">
                                    @error('name')
                                    <span class="uk-text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="email" class="uk-text-white">Email Address*</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: mail"></span>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                        placeholder="Valid Email Address"
                                        class="uk-input uk-border-rounded @error('email') uk-form-danger @enderror">
                                    @error('email')
                                    <span class="uk-text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mobile Number -->
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="phone" class="uk-text-white">Mobile Number*</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                                    <input type="text" name="phone" value="{{ old('phone') }}" required
                                        placeholder="Mobile Number with Country Code (e.g., +1)"
                                        class="uk-input uk-border-rounded @error('phone') uk-form-danger @enderror">
                                    @error('phone')
                                    <span class="uk-text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            
                            <!-- Currency Selection -->
          <div class="uk-width-1-1@s uk-margin-small">
    <label for="currency" class="uk-text-white">Preferred Currency*</label>
    <div class="uk-inline">
        <span class="uk-form-icon" uk-icon="icon: credit-card"></span>
        <select name="currency" id="currency"
                class="uk-select uk-border-rounded @error('currency') uk-form-danger @enderror" required>
            <option value="USD">Select Currency</option>
    <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD - United States Dollar</option>
    <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR - Euro</option>
    <option value="GBP" {{ old('currency') == 'GBP' ? 'selected' : '' }}>GBP - British Pound</option>
    <option value="JPY" {{ old('currency') == 'JPY' ? 'selected' : '' }}>JPY - Japanese Yen</option>
    <option value="CAD" {{ old('currency') == 'CAD' ? 'selected' : '' }}>CAD - Canadian Dollar</option>
    <option value="AUD" {{ old('currency') == 'AUD' ? 'selected' : '' }}>AUD - Australian Dollar</option>
    <option value="CHF" {{ old('currency') == 'CHF' ? 'selected' : '' }}>CHF - Swiss Franc</option>
    <option value="CNY" {{ old('currency') == 'CNY' ? 'selected' : '' }}>CNY - Chinese Yuan</option>
    <option value="INR" {{ old('currency') == 'INR' ? 'selected' : '' }}>INR - Indian Rupee</option>
    <option value="NZD" {{ old('currency') == 'NZD' ? 'selected' : '' }}>NZD - New Zealand Dollar</option>
    <option value="ZAR" {{ old('currency') == 'ZAR' ? 'selected' : '' }}>ZAR - South African Rand</option>
    <option value="MXN" {{ old('currency') == 'MXN' ? 'selected' : '' }}>MXN - Mexican Peso</option>
    <option value="BRL" {{ old('currency') == 'BRL' ? 'selected' : '' }}>BRL - Brazilian Real</option>
    <option value="RUB" {{ old('currency') == 'RUB' ? 'selected' : '' }}>RUB - Russian Ruble</option>
    <option value="HKD" {{ old('currency') == 'HKD' ? 'selected' : '' }}>HKD - Hong Kong Dollar</option>
    <option value="SGD" {{ old('currency') == 'SGD' ? 'selected' : '' }}>SGD - Singapore Dollar</option>
    <option value="KRW" {{ old('currency') == 'KRW' ? 'selected' : '' }}>KRW - South Korean Won</option>
    <option value="TRY" {{ old('currency') == 'TRY' ? 'selected' : '' }}>TRY - Turkish Lira</option>
    <option value="AED" {{ old('currency') == 'AED' ? 'selected' : '' }}>AED - United Arab Emirates Dirham</option>
    <option value="SEK" {{ old('currency') == 'SEK' ? 'selected' : '' }}>SEK - Swedish Krona</option>
    <option value="TTD" {{ old('currency') == 'TTD' ? 'selected' : '' }}>TTD - Trinidad and Tobago Dollar</option>
    <option value="NOK" {{ old('currency') == 'NOK' ? 'selected' : '' }}>NOK - Norwegian Krone</option>
    <option value="DKK" {{ old('currency') == 'DKK' ? 'selected' : '' }}>DKK - Danish Krone</option>
    <option value="PLN" {{ old('currency') == 'PLN' ? 'selected' : '' }}>PLN - Polish Zloty</option>
    <option value="THB" {{ old('currency') == 'THB' ? 'selected' : '' }}>THB - Thai Baht</option>
    <option value="PGK" {{ old('currency') == 'PGK' ? 'selected' : '' }}>PGK - Papua New Guinean Kina</option>
    <option value="MYR" {{ old('currency') == 'MYR' ? 'selected' : '' }}>MYR - Malaysian Ringgit</option>
    <option value="ILS" {{ old('currency') == 'ILS' ? 'selected' : '' }}>ILS - Israeli New Shekel</option>
    <option value="IDR" {{ old('currency') == 'IDR' ? 'selected' : '' }}>IDR - Indonesian Rupiah</option>
    <option value="CZK" {{ old('currency') == 'CZK' ? 'selected' : '' }}>CZK - Czech Koruna</option>
    <option value="HUF" {{ old('currency') == 'HUF' ? 'selected' : '' }}>HUF - Hungarian Forint</option>
    <option value="PHP" {{ old('currency') == 'PHP' ? 'selected' : '' }}>PHP - Philippine Peso</option>
    <option value="CLP" {{ old('currency') == 'CLP' ? 'selected' : '' }}>CLP - Chilean Peso</option>
    <option value="PKR" {{ old('currency') == 'PKR' ? 'selected' : '' }}>PKR - Pakistani Rupee</option>
    <option value="SAR" {{ old('currency') == 'SAR' ? 'selected' : '' }}>SAR - Saudi Riyal</option>
    <option value="NGN" {{ old('currency') == 'NGN' ? 'selected' : '' }}>NGN - Nigerian Naira</option>
    <option value="EGP" {{ old('currency') == 'EGP' ? 'selected' : '' }}>EGP - Egyptian Pound</option>
    <option value="BDT" {{ old('currency') == 'BDT' ? 'selected' : '' }}>BDT - Bangladeshi Taka</option>
    <option value="VND" {{ old('currency') == 'VND' ? 'selected' : '' }}>VND - Vietnamese Dong</option>
    <option value="KWD" {{ old('currency') == 'KWD' ? 'selected' : '' }}>KWD - Kuwaiti Dinar</option>
    <option value="BHD" {{ old('currency') == 'BHD' ? 'selected' : '' }}>BHD - Bahraini Dinar</option>
    <option value="OMR" {{ old('currency') == 'OMR' ? 'selected' : '' }}>OMR - Omani Rial</option>
    <option value="JOD" {{ old('currency') == 'JOD' ? 'selected' : '' }}>JOD - Jordanian Dinar</option>
    <option value="QAR" {{ old('currency') == 'QAR' ? 'selected' : '' }}>QAR - Qatari Riyal</option>
    <option value="KES" {{ old('currency') == 'KES' ? 'selected' : '' }}>KES - Kenyan Shilling</option>
    <option value="TZS" {{ old('currency') == 'TZS' ? 'selected' : '' }}>TZS - Tanzanian Shilling</option>
    <option value="UGX" {{ old('currency') == 'UGX' ? 'selected' : '' }}>UGX - Ugandan Shilling</option>
    <option value="GHS" {{ old('currency') == 'GHS' ? 'selected' : '' }}>GHS - Ghanaian Cedi</option>
    <option value="XOF" {{ old('currency') == 'XOF' ? 'selected' : '' }}>XOF - West African CFA Franc</option>
    <option value="XAF" {{ old('currency') == 'XAF' ? 'selected' : '' }}>XAF - Central African CFA Franc</option>
    <option value="NPR" {{ old('currency') == 'NPR' ? 'selected' : '' }}>NPR - Nepalese Rupee</option>
    <option value="LKR" {{ old('currency') == 'LKR' ? 'selected' : '' }}>LKR - Sri Lankan Rupee</option>
    <option value="MMK" {{ old('currency') == 'MMK' ? 'selected' : '' }}>MMK - Myanmar Kyat</option>
    <option value="LAK" {{ old('currency') == 'LAK' ? 'selected' : '' }}>LAK - Lao Kip</option>
    <option value="KHR" {{ old('currency') == 'KHR' ? 'selected' : '' }}>KHR - Cambodian Riel</option>
    <option value="AFN" {{ old('currency') == 'AFN' ? 'selected' : '' }}>AFN - Afghan Afghani</option>
    <option value="MVR" {{ old('currency') == 'MVR' ? 'selected' : '' }}>MVR - Maldivian Rufiyaa</option>
    <option value="PEN" {{ old('currency') == 'PEN' ? 'selected' : '' }}>PEN - Peruvian Sol</option>
    <option value="COP" {{ old('currency') == 'COP' ? 'selected' : '' }}>COP - Colombian Peso</option>
    <option value="ARS" {{ old('currency') == 'ARS' ? 'selected' : '' }}>ARS - Argentine Peso</option>
    <option value="BOB" {{ old('currency') == 'BOB' ? 'selected' : '' }}>BOB - Bolivian Boliviano</option>
    <option value="PYG" {{ old('currency') == 'PYG' ? 'selected' : '' }}>PYG - Paraguayan Guarani</option>
    <option value="UYU" {{ old('currency') == 'UYU' ? 'selected' : '' }}>UYU - Uruguayan Peso</option>


        </select>
        @error('currency')
        <span class="uk-text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>


                            <!-- Account Type -->
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="acct_form" class="uk-text-white">Account Type*</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: home"></span>
                                    <select name="acct_form"
                                        class="uk-select uk-border-rounded @error('acct_form') uk-form-danger @enderror"
                                        required>
                                        <option value="">Select Account Type</option>
                                        <option value="forex" {{ old('acct_form')=='forex' ? 'selected' : '' }}>Forex
                                            Account</option>
                                        <option value="crypto" {{ old('acct_form')=='crypto' ? 'selected' : '' }}>Crypto
                                            Account</option>
                                    </select>
                                    @error('acct_form')
                                    <span class="uk-text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="password" class="uk-text-white">Password*</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <input type="password" name="password" id="password" required
                                        placeholder="Enter Strong Password"
                                        class="uk-input uk-border-rounded @error('password') uk-form-danger @enderror">
                                    @error('password')
                                    <span class="uk-text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="password_confirmation" class="uk-text-white">Retype Password*</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: lock"></span>
                                    <input type="password" name="password_confirmation" required
                                        placeholder="Confirm Password" class="uk-input uk-border-rounded">
                                </div>
                            </div>

                            <!-- Referrer Username -->
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="ref" class="uk-text-white">Referrer Username (optional)</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon" uk-icon="icon: user"></span>
                                    <input type="text" name="ref" value="{{ old('ref') }}"
                                        placeholder="Enter referrer username" class="uk-input uk-border-rounded">
                                </div>
                            </div>

                            <!-- Terms and Conditions -->
                            <div class="uk-width-1-1 uk-margin-small">
                                <label class="uk-text-white">
                                    <input type="checkbox" checked disabled> I agree to the
                                    <a href="TERM.pdf" class="uk-text-light">terms and conditions</a>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="uk-width-1-1 uk-margin-small">
                                <button type="submit"
                                    class="uk-button uk-button-primary uk-border-rounded uk-width-expand">Sign
                                    up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Content End -->
</main>

@include('home.footer')