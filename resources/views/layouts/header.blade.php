<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">Amazing E-Book</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (!Auth::check())
                <ul class="navbar-nav mb-2 mb-lg-0 ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">{{ __('app.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">{{ __('app.regist') }}</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav mb-2 mb-lg-0 ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">{{ __('app.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">{{ __('app.cart') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">{{ __('app.profile') }}</a>
                    </li>
                    @if (Auth::user()->role_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="/manage">{{ __('app.accmgmt') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/api/logout">{{ __('app.logout') }}</a>
                    </li>
                </ul>
            @endif
        </div>
    </div>
</nav>
