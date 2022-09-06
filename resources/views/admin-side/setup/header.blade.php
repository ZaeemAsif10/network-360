<nav class="navbar navbar-expand-md navbar-light bg-white bb b--black-10">
    <div class="container">

        <h2 class="font-weight-bold">Network-360</h2>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto my-2">
                    <!-- Authentication Links -->
                    <li>
                        <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db mr2"
                            style="text-decoration: none; line-height: 32px;" href="{{ url('admin/dashboard') }}" title="Profile">
                            <span>
                                <img src="{{ asset('public/assets/vendor/core/core/base/images/placeholder.png') }}" class="br-100 v-mid mr1"
                                    alt="No Image" style="width: 30px;">
                                <span>{{ Auth::user()->name ? : '' }}</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db mr2"
                            style="text-decoration: none; line-height: 32px;" href="agents_setting.html" title="Settings">
                            <i class="fas fa-cogs mr1"></i>Settings
                        </a>
                    </li>
                    <li>
                        <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db mr2"
                            style="text-decoration: none; line-height: 32px;" href="agents_buy_credits.html" title="credits">
                            <i class="far fa-credit-card mr1"></i>Buy credits <span class="badge badge-info">0
                                credits</span>
                        </a>
                    </li>

                    <li>
                        <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db mr2"
                            style="text-decoration: none; line-height: 32px;" href="agents_view.html" title="Properties">
                            <i class="far fa-newspaper mr1"></i>Properties
                        </a>
                    </li>
                    <li>
                        <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db"
                            style="text-decoration: none; line-height: 32px;" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            title="Logout">
                            <i class="fas fa-sign-out-alt mr1"></i><span class="dn-ns">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
    </div>
</nav>