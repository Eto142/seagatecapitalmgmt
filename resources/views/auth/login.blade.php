@include('home.header')

<main>
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-2-3@m uk-width-1-1@s uk-margin-auto">
                    <h1 class="uk-margin-remove-bottom" style="color:#fff;">Login</h1>
                    <p class="uk-text-lead uk-text-muted uk-margin-small-top" style="color:#dbdbdb;">
                        Please enter your credentials to log in to your account.
                    </p>
                </div>
                <div class="uk-width-2-3@m uk-width-1-1@s uk-margin-auto">
                    <!--messages-->
                    <div class="messages" style="text-align: center;">
                        @if(session('error'))
                        <div class="uk-alert-danger" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                    <!--end messages-->

                    <div class="uk-margin-medium-left in-margin-remove-left@s">
                        <form id="login-form" action="{{ route('login') }}" method="POST" class="uk-form uk-grid-small"
                            data-uk-grid>
                            @csrf
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="email" style="color:#fff;">Email Address</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon fas fa-envelope fa-sm"></span>
                                    <input type="email" name="email" id="email" required placeholder="Email Address"
                                        class="uk-input uk-border-rounded">
                                </div>
                            </div>
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="password" style="color:#fff;">Password</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon fas fa-lock fa-sm"></span>
                                    <input type="password" name="password" id="password" required placeholder="Password"
                                        class="uk-input uk-border-rounded">
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-margin-small">
                                <label>
                                    <input type="checkbox" name="remember"> Remember Me
                                </label>
                            </div>
                            <div class="uk-width-1-1 uk-margin-small">
                                <button class="uk-button uk-button-primary uk-border-rounded uk-width-expand"
                                    type="submit">Login</button>
                            </div>
                            <div class="uk-width-1-1 uk-margin-top">
                                <p style="color: #fff;">Forgot your password? <a href="{{ route('password.request') }}"
                                        style="color: #dbdbdb;">Reset it here</a>.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
</main>

@include('home.footer')