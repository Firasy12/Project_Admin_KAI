<aside class="sidebar">
    <div class="logo-area">
        <img src="{{ asset('images/logo-kai.png') }}" class="logo">
        <h5>Sistem Informasi Magang</h5>
        <small>PT Kereta Api Indonesia</small>
    </div>

    <span class="menu-label">ADMIN SDM</span>

    <ul class="menu">
        <li class="{{ request()->routeIs('sdm.dashboard') ? 'active' : '' }}">
            <a href="{{ route('sdm.dashboard') }}">
                <i class="fa-solid fa-house"></i> Dashboard
            </a>
        </li>
        <li class="{{ request()->routeIs('sdm.pengajuan') ? 'active' : '' }}">
            <a href="{{ route('sdm.pengajuan') }}">
                <i class="fa-solid fa-file-lines"></i> Pengajuan Magang
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-users"></i> Review Berkas
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-location-dot"></i> Disposisi
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa-solid fa-chart-column"></i> Laporan
            </a>
        </li>
    </ul>
</aside>