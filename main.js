/*
 * ============================================================
 *  高嶺のなでしこ — OFFICIAL WEBSITE SCRIPT
 *  main.js
 *
 *  Table of Contents:
 *   1. DATA
 *   2. INITIALIZATION
 *   3. HEADER SCROLL BEHAVIOR
 *   4. HAMBURGER MENU
 *   5. HERO PETALS
 *   6. NEWS RENDERING
 *   7. MEMBER RENDERING
 *   8. DISCOGRAPHY RENDERING
 *   9. BACK TO TOP
 *  10. SMOOTH SCROLL
 *  11. INTERSECTION OBSERVER
 * ============================================================
 */


/* ============================================================
   1. DATA
   Static data arrays that drive all dynamic rendering.
   ============================================================ */

/**
 * newsData — 15 news items.
 * Each item: { id, date, category, title }
 * Categories: 'live' | 'event' | 'goods' | 'info'
 */
const newsData = [
  {
    id: 1,
    date: '2024.07.15',
    category: 'live',
    title: '高嶺のなでしこ 4周年 Special LIVE / 4th ファンミーティング 開催決定！',
  },
  {
    id: 2,
    date: '2024.07.10',
    category: 'event',
    title: 'たかねこフェスVol.6 〜サマーセッション〜 開催決定！',
  },
  {
    id: 3,
    date: '2024.07.05',
    category: 'live',
    title: 'Live Tour -Bouquet of 9 Flowers– スタンプラリー企画 7会場・13公演特典の申請につきまして',
  },
  {
    id: 4,
    date: '2024.06.28',
    category: 'goods',
    title: 'たかねこブーケラッピングプロジェクトの特典に関するお知らせ',
  },
  {
    id: 5,
    date: '2024.06.20',
    category: 'info',
    title: '座席割当て間違いのお詫び',
  },
  {
    id: 6,
    date: '2024.06.15',
    category: 'event',
    title: '個別2ショット撮影会・個別TikTok撮影会・個別サイン会 キャラアニ・チャンス 2次受付のご案内',
  },
  {
    id: 7,
    date: '2024.06.10',
    category: 'event',
    title: 'メンバーとオンライン個別お話し会のお知らせ',
  },
  {
    id: 8,
    date: '2024.06.05',
    category: 'live',
    title: '12公演来場者限定 楽屋招待詳細につきまして',
  },
  {
    id: 9,
    date: '2024.05.30',
    category: 'goods',
    title: 'たかねこブーケラッピングプロジェクト FINAL',
  },
  {
    id: 10,
    date: '2024.05.22',
    category: 'event',
    title: '個別2ショット撮影会 1次受付のご案内',
  },
  // --- 5 additional plausible news items ---
  {
    id: 11,
    date: '2024.05.15',
    category: 'live',
    title: 'Live Tour -Bouquet of 9 Flowers– 追加公演決定のお知らせ',
  },
  {
    id: 12,
    date: '2024.05.08',
    category: 'goods',
    title: '4周年記念フォトブック 予約受付開始のお知らせ',
  },
  {
    id: 13,
    date: '2024.04.28',
    category: 'info',
    title: '公式ファンクラブ「たかねこFC」会員証デザイン変更のお知らせ',
  },
  {
    id: 14,
    date: '2024.04.20',
    category: 'event',
    title: '春のリリース記念 個別握手会・チェキ会 開催決定！',
  },
  {
    id: 15,
    date: '2024.04.10',
    category: 'live',
    title: '高嶺のなでしこ 4周年記念ライブ チケット一般発売のご案内',
  },
];

/**
 * membersData — 9 members.
 * Each item: { id, nameJp, nameEn, color }
 * Colors are each member's individual image color.
 */
const membersData = [
  { id: 1, nameJp: '白石みく',   nameEn: 'Miku Shiraishi',   color: '#f9a8c9' },
  { id: 2, nameJp: '桜井ことね', nameEn: 'Kotone Sakurai',   color: '#ffb3ba' },
  { id: 3, nameJp: '藤本りな',   nameEn: 'Rina Fujimoto',    color: '#c0396b' },
  { id: 4, nameJp: '中村あかり', nameEn: 'Akari Nakamura',   color: '#ff8fa3' },
  { id: 5, nameJp: '山田ゆい',   nameEn: 'Yui Yamada',       color: '#e8a0bf' },
  { id: 6, nameJp: '田中さくら', nameEn: 'Sakura Tanaka',    color: '#d4527e' },
  { id: 7, nameJp: '鈴木はな',   nameEn: 'Hana Suzuki',      color: '#f4c2d0' },
  { id: 8, nameJp: '伊藤めい',   nameEn: 'Mei Ito',          color: '#b5338a' },
  { id: 9, nameJp: '小林なな',   nameEn: 'Nana Kobayashi',   color: '#e07aaa' },
];

/**
 * discoData — 6 releases.
 * Each item: { title, type, year, color }
 */
const discoData = [
  { title: 'Bouquet of 9 Flowers',  type: 'Album',  year: '2024', color: '#f9a8c9' },
  { title: 'なでしこ色の空',          type: 'Single', year: '2023', color: '#c0396b' },
  { title: 'ハナコトバ',              type: 'Single', year: '2023', color: '#e07aaa' },
  { title: '高嶺の花よ',              type: 'Single', year: '2022', color: '#d4527e' },
  { title: 'First Bloom',            type: 'Album',  year: '2022', color: '#b5338a' },
  { title: 'たかねこ☆スターター',     type: 'Single', year: '2021', color: '#ff8fa3' },
];

/* ============================================================
   2. INITIALIZATION
   DOMContentLoaded listener that calls all init functions
   in the correct order once the DOM is fully parsed.
   ============================================================ */

document.addEventListener('DOMContentLoaded', () => {
  initHeaderScroll();         // 3. Sticky header shadow on scroll
  initHamburger();            // 4. Mobile nav toggle
  createPetals();             // 5. Hero falling petals
  initNews();                 // 6. News list + filter tabs
  renderMembers();            // 7. Member grid
  renderDisco();              // 8. Discography cards + nav
  initBackToTop();            // 9. Back-to-top button
  initSmoothScroll();         // 10. Smooth anchor scrolling
  initIntersectionObserver(); // 11. Fade-in-up for sections
});

/* ============================================================
   3. HEADER SCROLL BEHAVIOR
   Adds .site-header--scrolled to the header once the user
   scrolls past the hero section, triggering a box-shadow.
   ============================================================ */

/**
 * initHeaderScroll
 * Uses IntersectionObserver to watch the hero section.
 * When the hero is no longer intersecting (i.e. scrolled past),
 * the scrolled class is added; when it re-enters, it's removed.
 */
function initHeaderScroll() {
  const header = document.getElementById('siteHeader');
  const hero   = document.getElementById('hero');
  if (!header || !hero) return;

  const observer = new IntersectionObserver(
    ([entry]) => {
      // entry.isIntersecting is true while hero is visible
      if (entry.isIntersecting) {
        header.classList.remove('site-header--scrolled');
      } else {
        header.classList.add('site-header--scrolled');
      }
    },
    {
      // Trigger when the hero is fully out of view
      threshold: 0,
      // rootMargin shifts the trigger point to the bottom of the header
      rootMargin: `-${getComputedStyle(document.documentElement)
        .getPropertyValue('--header-height')
        .trim() || '64px'} 0px 0px 0px`,
    }
  );

  observer.observe(hero);
}

/* ============================================================
   5. HAMBURGER MENU
   Toggles the mobile navigation open/closed.
   ============================================================ */

/**
 * initHamburger
 * Attaches a click handler to #hamburgerBtn.
 * Toggles .is-open on both the button and the nav,
 * and updates aria-expanded for accessibility.
 */
function initHamburger() {
  const btn = document.getElementById('hamburgerBtn');
  const nav = document.getElementById('mainNav');
  if (!btn || !nav) return;

  btn.addEventListener('click', () => {
    const isOpen = btn.classList.toggle('is-open');

    // Sync the nav's open state
    nav.classList.toggle('is-open', isOpen);

    // Update ARIA attribute so screen readers announce the state
    btn.setAttribute('aria-expanded', String(isOpen));
    btn.setAttribute('aria-label', isOpen ? 'メニューを閉じる' : 'メニューを開く');
  });

  // Close nav when a nav link is clicked (single-page navigation)
  nav.querySelectorAll('.nav-link').forEach((link) => {
    link.addEventListener('click', () => {
      btn.classList.remove('is-open');
      nav.classList.remove('is-open');
      btn.setAttribute('aria-expanded', 'false');
      btn.setAttribute('aria-label', 'メニューを開く');
    });
  });

  // Close nav when clicking outside of it
  document.addEventListener('click', (e) => {
    if (!nav.contains(e.target) && !btn.contains(e.target)) {
      btn.classList.remove('is-open');
      nav.classList.remove('is-open');
      btn.setAttribute('aria-expanded', 'false');
    }
  });
}

/* ============================================================
   6. HERO PETALS
   Generates 20 animated falling petal elements inside
   #heroPetals. Each petal has randomized position, size,
   delay, and duration for a natural, varied effect.
   ============================================================ */

/**
 * createPetals
 * Injects 20 div.petal elements into #heroPetals.
 * Each petal is either a ✿ character or a small circle (●),
 * chosen randomly for visual variety.
 */
function createPetals() {
  const container = document.getElementById('heroPetals');
  if (!container) return;

  const PETAL_COUNT = 20;

  // Petal characters — mix of flower and circle shapes
  const petalChars = ['✿', '✿', '✿', '❀', '✾', '●'];

  for (let i = 0; i < PETAL_COUNT; i++) {
    const petal = document.createElement('div');
    petal.classList.add('petal');

    // Random horizontal start position (0–100% of viewport width)
    const leftPct = Math.random() * 100;

    // Random size between 8px and 16px
    const size = 8 + Math.random() * 8;

    // Random animation delay so petals don't all start together (0–8s)
    const delay = Math.random() * 8;

    // Random fall duration between 6s and 14s
    const duration = 6 + Math.random() * 8;

    // Random opacity between 0.3 and 0.7
    const opacity = 0.3 + Math.random() * 0.4;

    // Pick a random petal character
    const char = petalChars[Math.floor(Math.random() * petalChars.length)];

    // Apply inline styles
    petal.style.cssText = `
      left: ${leftPct}%;
      font-size: ${size}px;
      animation-delay: ${delay}s;
      animation-duration: ${duration}s;
      opacity: ${opacity};
    `;

    petal.textContent = char;
    petal.setAttribute('aria-hidden', 'true');

    container.appendChild(petal);
  }
}

/* ============================================================
   7. NEWS RENDERING
   Renders filtered news items into #newsList with pagination.
   ============================================================ */

/** How many news items to show per page load */
const NEWS_PAGE_SIZE = 5;

/** Tracks the current filter category ('all' or a category string) */
let currentFilter = 'all';

/** Tracks how many items are currently visible */
let visibleCount = NEWS_PAGE_SIZE;

/**
 * initNews
 * Sets up filter tab click handlers and performs the initial render.
 */
function initNews() {
  // Initial render — show all, first page
  renderNews('all');

  // Attach click handlers to each filter tab
  const tabs = document.querySelectorAll('.filter-tab');
  tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      const filter = tab.dataset.filter;

      // Update active tab styling
      tabs.forEach((t) => {
        t.classList.remove('filter-tab--active');
        t.setAttribute('aria-selected', 'false');
      });
      tab.classList.add('filter-tab--active');
      tab.setAttribute('aria-selected', 'true');

      // Reset pagination and re-render with new filter
      visibleCount = NEWS_PAGE_SIZE;
      renderNews(filter);
    });
  });

  // Load more button
  const loadMoreBtn = document.getElementById('loadMoreBtn');
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', () => {
      visibleCount += NEWS_PAGE_SIZE;
      renderNews(currentFilter, false); // false = don't reset scroll
    });
  }
}

/**
 * renderNews
 * Filters newsData by category, then renders up to `visibleCount`
 * items as <li> elements inside #newsList.
 *
 * @param {string} filter - Category to filter by, or 'all' for no filter.
 * @param {boolean} [resetCount=true] - Whether to reset visibleCount to PAGE_SIZE.
 */
function renderNews(filter, resetCount = true) {
  currentFilter = filter;
  if (resetCount) visibleCount = NEWS_PAGE_SIZE;

  const list = document.getElementById('newsList');
  const loadMoreBtn = document.getElementById('loadMoreBtn');
  if (!list) return;

  // Filter the data
  const filtered = filter === 'all'
    ? newsData
    : newsData.filter((item) => item.category === filter);

  // Slice to the current visible count
  const visible = filtered.slice(0, visibleCount);

  // Build HTML string for all visible items
  list.innerHTML = visible.map((item) => createNewsItemHTML(item)).join('');

  // Show/hide the load more button
  if (loadMoreBtn) {
    const hasMore = visibleCount < filtered.length;
    loadMoreBtn.style.display = hasMore ? 'inline-flex' : 'none';
  }
}

/**
 * createNewsItemHTML
 * Returns the HTML string for a single news list item.
 *
 * @param {Object} item - A news data object.
 * @returns {string} HTML string for an <li> element.
 */
function createNewsItemHTML(item) {
  // Map category values to Japanese display labels
  const categoryLabels = {
    live:  'LIVE',
    event: 'EVENT',
    goods: 'GOODS',
    info:  'INFO',
  };

  const label = categoryLabels[item.category] || item.category.toUpperCase();

  return `
    <li class="news-item">
      <span class="news-date">${escapeHTML(item.date)}</span>
      <span class="news-category" data-category="${escapeHTML(item.category)}">${label}</span>
      <span class="news-title">${escapeHTML(item.title)}</span>
    </li>
  `;
}

/* ============================================================
   8. MEMBER RENDERING
   Creates .member-card elements for each member in membersData.
   ============================================================ */

/**
 * renderMembers
 * Injects one .member-card per member into #memberGrid.
 * Each card shows a gradient photo placeholder, the member's
 * Japanese and English names, and a color accent bar.
 */
function renderMembers() {
  const grid = document.getElementById('memberGrid');
  if (!grid) return;

  // Build all cards as a single HTML string for one DOM write
  grid.innerHTML = membersData.map((member) => createMemberCardHTML(member)).join('');
}

/**
 * createMemberCardHTML
 * Returns the HTML string for a single member card.
 *
 * @param {Object} member - A member data object.
 * @returns {string} HTML string for a .member-card div.
 */
function createMemberCardHTML(member) {
  return `
    <div class="member-card" tabindex="0" aria-label="${escapeHTML(member.nameJp)}">
      <!-- Photo placeholder: gradient using the member's color -->
      <div class="member-photo" style="background: linear-gradient(160deg, ${escapeHTML(member.color)}55 0%, ${escapeHTML(member.color)} 100%);">
        <!-- Decorative ✿ centered on the placeholder -->
        <div style="
          position: absolute;
          inset: 0;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 3rem;
          color: rgba(255,255,255,0.45);
          pointer-events: none;
          z-index: 1;
        " aria-hidden="true">✿</div>
      </div>
      <!-- Member name and romanization -->
      <div class="member-info">
        <p class="member-name-jp">${escapeHTML(member.nameJp)}</p>
        <p class="member-name-en">${escapeHTML(member.nameEn)}</p>
      </div>
      <!-- Thin color accent bar at the bottom of the card -->
      <div class="member-color-bar" style="background-color: ${escapeHTML(member.color)};"></div>
    </div>
  `;
}

/* ============================================================
   8. DISCOGRAPHY RENDERING
   Creates .disco-card elements in a grid — same structure as
   the member section cards.
   ============================================================ */

/**
 * renderDisco
 * Injects one .disco-card per release into #discoTrack (.disco-grid).
 * Card structure mirrors .member-card exactly.
 */
function renderDisco() {
  const grid = document.getElementById('discoTrack');
  if (!grid) return;

  // Build all cards as a single HTML string for one DOM write
  grid.innerHTML = discoData.map((release) => createDiscoCardHTML(release)).join('');
}

/**
 * createDiscoCardHTML
 * Returns the HTML string for a single discography card.
 * Mirrors createMemberCardHTML: cover (photo), info block, color bar.
 *
 * @param {Object} release - A disco data object.
 * @returns {string} HTML string for a .disco-card div.
 */
function createDiscoCardHTML(release) {
  return `
    <div class="disco-card" tabindex="0" aria-label="${escapeHTML(release.title)} — ${escapeHTML(release.type)}">
      <!-- Cover art placeholder: gradient using the release color (mirrors .member-photo) -->
      <div class="disco-cover" style="background: linear-gradient(160deg, ${escapeHTML(release.color)}55 0%, ${escapeHTML(release.color)} 100%);">
        <!-- Decorative ✿ centered on the placeholder -->
        <div class="disco-cover-icon" aria-hidden="true">✿</div>
      </div>
      <!-- Release title and type · year (mirrors .member-info) -->
      <div class="disco-info">
        <p class="disco-title">${escapeHTML(release.title)}</p>
        <p class="disco-meta">${escapeHTML(release.type)} · ${escapeHTML(release.year)}</p>
      </div>
      <!-- Thin color accent bar at the bottom (mirrors .member-color-bar) -->
      <div class="disco-color-bar" style="background-color: ${escapeHTML(release.color)};"></div>
    </div>
  `;
}

/* ============================================================
   9. BACK TO TOP
   Shows a fixed button after scrolling 400px; clicking it
   smoothly scrolls back to the top of the page.
   ============================================================ */

/**
 * initBackToTop
 * Attaches a scroll listener to show/hide #backToTop,
 * and a click handler to scroll to the top.
 */
function initBackToTop() {
  const btn = document.getElementById('backToTop');
  if (!btn) return;

  // Show button after scrolling 400px down
  window.addEventListener('scroll', () => {
    if (window.scrollY > 400) {
      // Remove the HTML hidden attribute and add visible class
      btn.removeAttribute('hidden');
      // Use rAF to ensure the transition plays after display change
      requestAnimationFrame(() => btn.classList.add('is-visible'));
    } else {
      btn.classList.remove('is-visible');
      // Re-add hidden after the CSS transition completes (250ms)
      setTimeout(() => {
        if (!btn.classList.contains('is-visible')) {
          btn.setAttribute('hidden', '');
        }
      }, 300);
    }
  }, { passive: true });

  // Smooth scroll to top on click
  btn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

/* ============================================================
   12. SMOOTH SCROLL
   Intercepts all anchor clicks with href="#..." and uses
   scrollIntoView for smooth, native-feeling navigation.
   ============================================================ */

/**
 * initSmoothScroll
 * Delegates a click listener on the document.
 * When an anchor with a hash href is clicked, it finds the
 * target element and scrolls to it smoothly, accounting for
 * the sticky header height.
 */
function initSmoothScroll() {
  document.addEventListener('click', (e) => {
    // Walk up the DOM to find the nearest <a> ancestor
    const anchor = e.target.closest('a[href^="#"]');
    if (!anchor) return;

    const href = anchor.getAttribute('href');
    // Ignore bare "#" links (no target)
    if (href === '#') {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
      return;
    }

    const target = document.querySelector(href);
    if (!target) return;

    e.preventDefault();

    // Get the header height to offset the scroll position
    const header = document.getElementById('siteHeader');
    const headerHeight = header ? header.offsetHeight : 0;

    // Calculate the element's position relative to the document
    const targetTop = target.getBoundingClientRect().top + window.scrollY - headerHeight - 8;

    window.scrollTo({ top: targetTop, behavior: 'smooth' });
  });
}

/* ============================================================
   13. INTERSECTION OBSERVER
   Adds .is-visible to .section elements as they enter the
   viewport, triggering the fadeInUp CSS transition defined
   in the stylesheet.
   ============================================================ */

/**
 * initIntersectionObserver
 * Observes all .section elements. When a section enters the
 * viewport (at least 10% visible), .is-visible is added,
 * which triggers the opacity + translateY transition in CSS.
 */
function initIntersectionObserver() {
  // If IntersectionObserver is not supported, just show everything
  if (!('IntersectionObserver' in window)) {
    document.querySelectorAll('.section').forEach((el) => {
      el.classList.add('is-visible');
    });
    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          // Once visible, stop observing — no need to re-animate
          observer.unobserve(entry.target);
        }
      });
    },
    {
      // Trigger when 10% of the section is visible
      threshold: 0.1,
      // Start the animation slightly before the element enters view
      rootMargin: '0px 0px -40px 0px',
    }
  );

  // Observe every .section on the page
  document.querySelectorAll('.section').forEach((section) => {
    observer.observe(section);
  });
}

/* ============================================================
   UTILITY FUNCTIONS
   Shared helpers used across multiple sections above.
   ============================================================ */

/**
 * escapeHTML
 * Escapes special HTML characters in a string to prevent XSS
 * when inserting user-controlled or data-driven content into
 * innerHTML.
 *
 * @param {string} str - The string to escape.
 * @returns {string} The escaped string.
 */
function escapeHTML(str) {
  if (typeof str !== 'string') return String(str);
  return str
    .replace(/&/g,  '&amp;')
    .replace(/</g,  '&lt;')
    .replace(/>/g,  '&gt;')
    .replace(/"/g,  '&quot;')
    .replace(/'/g,  '&#39;');
}
