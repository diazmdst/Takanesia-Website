 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Takanesia <sup>Admin</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ route('HalamanDashboard') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <hr class="sidebar-divider d-none d-md-block">

     <!-- Nav Item - Tables -->
     <li class="nav-item">
         <a class="nav-link" href="{{ route('HalamanAdminAbout') }}">
             <i class="fas fa-fw fa-table"></i>
             <span>About</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ route('HalamanAdminKategori') }}">
             <i class="fas fa-fw fa-table"></i>
             <span>Kategori</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ route('HalamanAdminKategori_disco') }}">
             <i class="fas fa-fw fa-table"></i>
             <span>Kategori Discography</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ route('HalamanAdminColor_setting') }}">
             <i class="fas fa-fw fa-table"></i>
             <span>Colour Setting</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ route('HalamanAdminmedia') }}">
             <i class="fas fa-fw fa-table"></i>
             <span>Media</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ route('HalamanAdminmember') }}">
             <i class="fas fa-fw fa-table"></i>
             <span>Member</span></a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ route('HalamanAdmindisco') }}">
             <i class="fas fa-fw fa-table"></i>
             <span>Discography</span></a>
     </li>

     <!-- Divider -->


     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>

     <!-- Sidebar Message -->

 </ul>
