<div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </form>
        <h4 class="d-flex mr-auto my-auto text-white">SISTEM PERAMALAN PENJUALAN</h4>
        <ul class="navbar-nav navbar-right">
            <li class="dropdown"><a href="#" data-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="{{ asset('stisla') }}/assets/img/avatar/avatar-1.png"
                        class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">Hi, {{ $users->login_nama }}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">Logged in 5 min ago</div>
                    <a href="features-profile.html" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                    <a href="features-activities.html" class="dropdown-item has-icon">
                        <i class="fas fa-bolt"></i> Activities
                    </a>
                    <a href="features-settings.html" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="#" class="dropdown-item has-icon text-danger" data-toggle="modal"
                            data-target="#modallogout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </form>

                    <!-- Modal Logout -->
                    <div class="modal fade" id="modallogout" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin keluar dari Dashboard?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batalkan</button>
                                        <button type="submit" class="btn btn-danger">Keluar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- END Modal Logout -->
                </div>
            </li>
        </ul>
    </nav>
</div>
