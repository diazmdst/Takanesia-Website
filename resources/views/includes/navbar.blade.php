   <header class="site-header" id="siteHeader" role="banner">
       <!-- [HEADER INNER] Max-width wrapper to center content -->
       <div class="header-inner">

           <!-- [LOGO] Site identity — clicking returns to top of page -->
           <a href="#" class="logo" aria-label="TAKANESIA WEBSITE">
               <!-- [LOGO IMAGE] logo.png from the img folder -->
               <img src="{{ asset('img/logo.png') }}" alt="TAKANESIA LOGO" class="logo-img" />
           </a>

           <!-- [THEME TOGGLE] Dark/Light mode switch -->
           <button class="theme-toggle" id="themeToggle" aria-label="Toggle Dark Mode">
               <svg class="sun-icon" viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                   <path
                       d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zM2 13h2c.55 0 1-.45 1-1s-.45-1-1-1H2c-.55 0-1 .45-1 1s.45 1 1 1zm18 0h2c.55 0 1-.45 1-1s-.45-1-1-1h-2c-.55 0-1 .45-1 1s.45 1 1 1zM11 2v2c0 .55.45 1 1 1s1-.45 1-1V2c0-.55-.45-1-1-1s-1 .45-1 1zm0 18v2c0 .55.45 1 1 1s1-.45 1-1v-2c0-.55-.45-1-1-1s-1 .45-1 1zM5.99 4.58a.996.996 0 00-1.41 0 .996.996 0 000 1.41l1.06 1.06c.39.39 1.03.39 1.41 0s.39-1.03 0-1.41L5.99 4.58zm12.37 12.37a.996.996 0 00-1.41 0 .996.996 0 000 1.41l1.06 1.06c.39.39 1.03.39 1.41 0a.996.996 0 000-1.41l-1.06-1.06zm1.06-10.96a.996.996 0 000-1.41.996.996 0 00-1.41 0l-1.06 1.06c-.39.39-.39 1.03 0 1.41s1.03.39 1.41 0l1.06-1.06zM7.05 18.36a.996.996 0 000-1.41.996.996 0 00-1.41 0l-1.06 1.06c-.39.39-.39 1.03 0 1.41s1.03.39 1.41 0l1.06-1.06z">
                   </path>
               </svg>
               <svg class="moon-icon" viewBox="0 0 24 24" fill="currentColor" width="20" height="20">
                   <path
                       d="M12.1 2.9c.3-.05.45.3.3.55a8.03 8.03 0 0011 11c.25-.15.6 0 .55.3a10.03 10.03 0 01-11.85 11.85c-.3.05-.45-.3-.3-.55a8.03 8.03 0 00-11-11c-.25.15-.6 0-.55-.3A10.03 10.03 0 0112.1 2.9z">
                   </path>
               </svg>
           </button>

           <!-- [HAMBURGER BUTTON] Visible only on mobile — toggles nav menu -->
           <button class="hamburger" id="hamburgerBtn" aria-label="Open Menu" aria-expanded="false"
               aria-controls="mainNav">
               <!-- [HAMBURGER LINES] Three spans form the ☰ icon, animated to ✕ when open -->
               <span></span>
               <span></span>
               <span></span>
           </button>

           <!-- [MAIN NAV] Primary navigation links -->
           <nav class="main-nav" id="mainNav" role="navigation" aria-label="MAIN NAV">
               <ul class="nav-list" role="list">
                   <li>
                       <a href="{{ route('HalamanBeranda') }}"
                           class="nav-link {{ request()->routeIs('HalamanBeranda') ? 'nav-link--active' : '' }}">
                           HOME
                       </a>
                   </li>

                   <li>
                       <a href="{{ route('HalamanAbout') }}"
                           class="nav-link {{ request()->routeIs('HalamanAbout') ? 'nav-link--active' : '' }}">
                           ABOUT
                       </a>
                   </li>

                   <li>
                       <a href="{{ route('HalamanMedia') }}"
                           class="nav-link {{ request()->routeIs('HalamanMedia', 'HalamanDMedia') ? 'nav-link--active' : '' }}">
                           MEDIA
                       </a>
                   </li>

                   <li>
                       <a href="{{ route('HalamanMember') }}"
                           class="nav-link {{ request()->routeIs('HalamanMember') ? 'nav-link--active' : '' }}">
                           MEMBER
                       </a>
                   </li>

                   <li>
                       <a href="{{ route('HalamanDiscography') }}"
                           class="nav-link {{ request()->routeIs('HalamanDiscography') ? 'nav-link--active' : '' }}">
                           DISCOGRAPHY
                       </a>
                   </li>

                   <li>
                       <a href="https://www.instagram.com/takanesia.id/" class="nav-link" target="_blank"
                           rel="noopener noreferrer">
                           GOODS
                       </a>
                   </li>
               </ul>
           </nav>

       </div><!-- /.header-inner -->
   </header>
