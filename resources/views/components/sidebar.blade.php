<div>
    <nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="../dashboard/index.html" class="b-brand text-primary">
       <span>Aplikasi Manajemen Pegawai</span>
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <x-sidebar.links title="Dashboard" icon='ti ti-home' route='home'  />
        @if (Auth::user()->role_id == 1)
         <x-sidebar.links title="Data User" icon='ti ti-user' route='users.index'  />
         @endif
        <x-sidebar.links title="Data Pegawai" icon='ti ti-report-analytics' route='pegawai.index'  />
        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
         <x-sidebar.links title="Data Bagian" icon='ti ti-briefcase' route='bagian.index'  />
         @endif
      </ul>
    </div>
  </div>
</nav>
</div>