
<style>
    .logo:hover{
        text-decoration: none !important;
    }
</style>

<header class="topmenu bg-light" style="position: sticky;">
    <div id="header-waypoint" class="main-header">
        <div class="container-fluid w90">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a href="{{ url('/') }}" class="logo">
                            <h4 class="font-wieght-bold ">NETWORK-360</h4>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" id="header-waypoint"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-bars"></span>
                        </button>

                        <div class="collapse navbar-collapse justify-content-end animation"
                            id="navbarSupportedContent">
                            <div class="main-menu-darken"></div>
                            <div class="main-menu-content">
                                <div class="d-lg-none bg-primary p-2">
                                    <span class="text-white">Menu</span>
                                    <span class="float-right toggle-main-menu-offcanvas text-white">
                                        <i class="far fa-times-circle"></i>
                                    </span>
                                </div>
                                <div class="main-menu-nav d-lg-flex">
                                    <ul class="navbar-nav justify-content-end menu menu--mobile">
                                        <li class="menu-item   ">
                                            <a href="{{ url('projects') }}" target="_self">
                                                Projects
                                            </a>
                                        </li>
                                        <li class="menu-item   ">
                                            <a href="{{ url('property') }}" target="_self">
                                                Properties
                                            </a>
                                        </li>
                                        <li class="menu-item   ">
                                            <a href="{{ url('agents') }}" target="_self">
                                                Agents
                                            </a>
                                        </li>
                                        <li class="menu-item   ">
                                            <a href="news.html" target="_self">
                                                News
                                            </a>
                                        </li>
                                        <li class="menu-item   ">
                                            <a href="career.html" target="_self">
                                                Careers
                                            </a>
                                        </li>
                                        <li class="menu-item   ">
                                            <a href="contact.html" target="_self">
                                                Contact
                                            </a>
                                        </li>
                                    </ul>

                                    <a class="btn btn-primary add-property" href="#">
                                        <i class="fas fa-plus-circle"></i> Add Property
                                    </a>

                                    <div class="d-sm-none">
                                        <div>
                                            <div class="choose-currency">
                                                <span>Currency: </span>
                                                <a href="currency/switch/USD"
                                                    class="active"><span>USD</span></a>&nbsp;
                                                <a href="currency/switch/VND"><span>VND</span></a>&nbsp;
                                            </div>
                                            <div class="padtop10 mb-2 language">
                                                <strong class="language-label">Languages: </strong>
                                                <a rel="alternate" hreflang="vi" href="vi">
                                                    <img src="vendor/core/core/base/images/flags/vn.svg"
                                                        title="Tiếng Việt" width="16" alt="Tiếng Việt"> <span>Tiếng
                                                        Việt</span> </a> &nbsp;
                                            </div>

                                            <ul class="topbar-items">
                                                <li class="login-item">
                                                    <a href="login"><i class="fas fa-sign-in-alt"></i> Login</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    </div>
</header>