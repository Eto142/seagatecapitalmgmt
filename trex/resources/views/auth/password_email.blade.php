@include('home.header')

<main>
    <!-- section content begin -->
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-2-3@m uk-width-1-1@s uk-margin-auto">
                    <h1 class="uk-margin-remove-bottom" style="color:#fff;">Forgot Password</h1>
                    <p class="uk-text-lead uk-text-muted uk-margin-small-top" style="color:#dbdbdb;">
                        Enter your email to receive a password reset link.
                    </p>
                </div>
                <div class="uk-width-2-3@m uk-width-1-1@s uk-margin-auto">
                    <!--messages-->
                    <div class="messages" style="text-align: center;">
                        @if (session('status'))
                        <div class="uk-alert-success" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            {{ session('status') }}
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="uk-alert-danger" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <!--end messages-->

                    <div class="uk-margin-medium-left in-margin-remove-left@s">
                        <form method="POST" action="{{ route('password.email') }}" class="uk-form uk-grid-small" data-uk-grid>
                            @csrf
                            <div class="uk-width-1-1@s uk-margin-small">
                                <label for="email" style="color:#fff;">Email Address</label>
                                <div class="uk-inline">
                                    <span class="uk-form-icon fas fa-envelope fa-sm"></span>
                                    <input type="email" name="email" id="email" required placeholder="Email Address"
                                        class="uk-input uk-border-rounded" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="uk-width-1-1 uk-margin-small">
                                <button class="uk-button uk-button-primary uk-border-rounded uk-width-expand"
                                    type="submit">Send Reset Link</button>
                            </div>
                            <div class="uk-width-1-1 uk-margin-top">
                                <p style="color: #fff;">Remember your password? <a href="{{ route('login') }}"
                                        style="color: #dbdbdb;">Login here</a>.</p>
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