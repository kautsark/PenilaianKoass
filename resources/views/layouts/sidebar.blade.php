<div class="sidebar">
    
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('azzara-master/assets/img/user.png') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ auth()->user()->name }}
                            <span class="user-level">{{ auth()->user()->role_name }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="link-collapse">Pengaturan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}">
                                    <span class="link-collapse">Keluar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Master Data</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#users">
                        <i class="fas fa-user-friends"></i>
                        <p>Data Users</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="users">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('users.index') }}">
                                    <span class="sub-item">List Data Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.create') }}">
                                    <span class="sub-item">Add Data Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('role_user.index') }}">
                                    <span class="sub-item">List Role User</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('role_user.create') }}">
                                    <span class="sub-item">Add Role Users</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#pengajar">
                        <i class="fas fa-user-tie"></i>
                        <p>Data Pengajar</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="pengajar">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('pengajar.index') }}">
                                    <span class="sub-item">List Data Pengajar</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('pengajar.create') }}">
                                    <span class="sub-item">Add Data Pengajar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#mhs">
                        <i class="fas fa-user-graduate"></i>
                        <p>Data Koass</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="mhs">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('peserta_didik.index') }}">
                                    <span class="sub-item">List Data Koass</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('peserta_didik.create') }}">
                                    <span class="sub-item">Add Data Koass</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#ksm">
                        <i class="fas fa-user-graduate"></i>
                        <p>Data KSM</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="ksm">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('ksm.index') }}">
                                    <span class="sub-item">List Data KSM</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('ksm.create') }}">
                                    <span class="sub-item">Add Data KSM</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data Nilai</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#nilai">
                        <i class="fas fa-award"></i>
                        <p>Penilaian</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="nilai">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{ route('nilai_pdk.index') }}">
                                    <span class="sub-item">List Nilai Koass</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('nilai_pdk.create') }}">
                                    <span class="sub-item">Add Nilai Koass</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>