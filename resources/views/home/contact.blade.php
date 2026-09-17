@include('home.header')

<main>
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-3-5@m">
                    <h1 class="uk-margin-remove-bottom" style="color:#fff;">Login</h1>
                    <p class="uk-text-lead uk-text-muted uk-margin-small-top" style="color:#dbdbdb;">
                        Please enter your credentials to log in to your account.
                    </p>
                </div>
                <div class="uk-width-1-1@m uk-margin-large-top">
                    <div class="uk-grid uk-grid-large" data-uk-grid>
                        <div class="uk-width-1-3@m">
                            <h4 class="uk-margin-medium-top uk-margin-remove-bottom" style="color:#fff;">Follow us</h4>
                            <p class="uk-margin-small-top"></p>
                            <div class="uk-margin-medium-top in-contact-socials">
                                <a href="#" class="fab fa-facebook-square fa-lg uk-margin-right"></a>
                                <a href="#" class="fab fa-twitter fa-lg uk-margin-right"></a>
                                <a href="#" class="fab fa-linkedin-in fa-lg uk-margin-right"></a>
                                <a href="#" class="fab fa-instagram fa-lg uk-margin-right"></a>
                                <a href="#" class="fab fa-pinterest fa-lg uk-margin-right"></a>
                            </div>
                        </div>
                        <div class="uk-width-2-3@m">
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
                                <form id="login-form" action="{{ route('login') }}" method="POST"
                                    class="uk-form uk-grid-small" data-uk-grid>
                                    @csrf
                                    <div class="uk-width-1-1@s uk-inline">
                                        <span class="uk-form-icon fas fa-envelope fa-sm"></span>
                                        <input type="email" name="email" required placeholder="Email Address"
                                            class="uk-input uk-border-rounded">
                                    </div>
                                    <div class="uk-width-1-1@s uk-inline">
                                        <span class="uk-form-icon fas fa-lock fa-sm"></span>
                                        <input type="password" name="password" required placeholder="Password"
                                            class="uk-input uk-border-rounded">
                                    </div>
                                    <div class="uk-width-1-1">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                    <div class="uk-width-1-1">
                                        <button class="uk-button uk-button-primary uk-border-rounded uk-align-right"
                                            type="submit">Login</button>
                                    </div>
                                    <div class="uk-width-1-1 uk-margin-top">
                                        <p style="color: #fff;">Forgot your password? <a
                                                href="{{ route('password.request') }}" style="color: #dbdbdb;">Reset it
                                                here</a>.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section content end -->
</main>

@include('home.footer')