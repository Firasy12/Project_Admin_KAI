{{-- Sidebar Admin Unit --}}
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo-kai.png') }}" alt="KAI" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
            <span class="sidebar-logo-fallback" style="display:none;">KAI</span>
        </div>
        <div class="sidebar-title">Sistem Informasi<br>Magang</div>
        <div class="sidebar-subtitle">PT Kereta Api Indonesia</div>
    </div>

    <div class="sidebar-section-label">Admin Unit</div>

    <nav class="sidebar-nav">
        <a href="{{ route('unit.dashboard') }}" class="nav-item {{ request()->routeIs('unit.dashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('unit.pengajuan') }}" class="nav-item {{ request()->routeIs('unit.pengajuan*') ? 'active' : '' }}">
            <i class="fas fa-file-import"></i>
            <span>Pengajuan Masuk</span>
            @if(isset($pengajuanCount) && $pengajuanCount > 0)
                <span class="nav-badge">{{ $pengajuanCount }}</span>
            @endif
        </a>
        <a href="{{ route('unit.review') }}" class="nav-item {{ request()->routeIs('unit.review*') ? 'active' : '' }}">
            <i class="fas fa-clipboard-check"></i>
            <span>Review Pengajuan</span>
        </a>
        <a href="{{ route('unit.riwayat') }}" class="nav-item {{ request()->routeIs('unit.riwayat*') ? 'active' : '' }}">
            <i class="fas fa-history"></i>
            <span>Riwayat</span>
        </a>
    </nav>
</aside>
