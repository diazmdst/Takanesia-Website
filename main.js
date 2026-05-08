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
 * Each item: { id, nameJp, nameEn, color, position, photo, instagram, twitter, tiktok }
 *
 * HOW TO ADD A PHOTO:
 *   1. Put the image file in the img/members/ folder
 *      (e.g. img/members/shiraishi-miku.jpg)
 *   2. Set the photo field to that path, e.g.:
 *      photo: 'img/members/shiraishi-miku.jpg'
 *   3. Leave photo: null to keep the gradient placeholder.
 */
const membersData = [
  {
    id: 1, nameJp: '城月 菜央',   nameEn: 'KIZUKI NAO',
    color: '#f3d104', position: 'センター',
    photo: 'img/members/nao.jpg',
    instagram: 'https://www.instagram.com/nao_kizuki_', twitter: 'https://x.com/nao_kizuki', tiktok: 'https://www.tiktok.com/@nao_kizuki',
  },
  {
    id: 2, nameJp: '涼海 すう', nameEn: 'SUZUMI SU',
    color: '#209aca', position: 'リーダー',
    photo: 'img/members/suu.jpg',
    instagram: 'https://www.instagram.com/su_suzumi_/', twitter: 'https://x.com/su_suzumi_', tiktok: 'https://www.tiktok.com/@suu._.suu',
  },
  {
    id: 3, nameJp: '橋本 桃呼',   nameEn: 'HASHIMOTO MOMOKO',
    color: '#c72e85', position: 'メンバー',
    photo: 'img/members/momoko.jpg',
    instagram: 'https://www.instagram.com/momoko__3628/', twitter: 'https://x.com/MomokoHashimoto', tiktok: 'https://www.tiktok.com/@momoko_hashimoto',
  },
  {
    id: 4, nameJp: '葉月 紗蘭', nameEn: 'HAZUKI SAARA',
    color: '#ffffff', position: 'メンバー',
    photo: 'img/members/saara.jpg',
    instagram: 'https://www.instagram.com/saara_hazuki/', twitter: 'https://x.com/saara_hazuki', tiktok: 'https://www.tiktok.com/@saara_hazuki',
  },
  {
    id: 5, nameJp: '東山 恵里沙',   nameEn: 'HIGASHIYAMA ERISA',
    color: '#f98c27', position: 'メンバー',
    photo: 'img/members/erisa.jpg',
    instagram: 'https://www.instagram.com/erisa_higashiyama/', twitter: 'https://x.com/erisahigasiyama', tiktok: 'https://www.tiktok.com/@erisahigasiyama',
  },
  {
    id: 6, nameJp: '日向端 ひな', nameEn: 'HINAHATA HINA',
    color: '#8017bc', position: 'メンバー',
    photo: 'img/members/hinatama.jpg',
    instagram: 'https://www.instagram.com/hinatama18', twitter: 'https://x.com/hina_hinahata', tiktok: 'https://www.tiktok.com/@hinatam_18',
  },
  {
    id: 7, nameJp: '星谷 美来',   nameEn: 'HOSHITANI MIKURU',
    color: '#d21919', position: 'メンバー',
    photo: 'img/members/mikuru.jpg',
    instagram: 'https://www.instagram.com/mikuru_1106/', twitter: 'https://x.com/mikuru_hositani', tiktok: 'https://www.instagram.com/mikuru_1106/',
  },
  {
    id: 8, nameJp: '松本ももな',   nameEn: 'MATSUMOTO MOMONA',
    color: '#e87dd4', position: 'メンバー',
    photo: 'img/members/momona.jpg',
    instagram: 'https://www.instagram.com/momona.1012/', twitter: 'https://x.com/momonamatsumoto', tiktok: 'https://www.tiktok.com/@momona.1012',
  },
  {
    id: 9, nameJp: '籾山 ひめり',   nameEn: 'MOMIYAMA HIMERI',
    color: '#1864c1', position: 'メンバー',
    photo: 'img/members/himeri.jpg',
    instagram: 'https://www.instagram.com/momichan_hime/', twitter: 'https://x.com/himeri_momiyama', tiktok: 'https://www.tiktok.com/@momichan_hime',
  },
];

/**
 * discoData — 6 releases.
 * Each item: { title, type, year, color }
 */
const discoData = [
  { title: 'Bouquet of 9 Flowers',  type: 'Album',  year: '2024', color: '#4883E0' },
  { title: 'なでしこ色の空',          type: 'Single', year: '2023', color: '#F87590' },
  { title: 'ハナコトバ',              type: 'Single', year: '2023', color: '#2d5fb8' },
  { title: '高嶺の花よ',              type: 'Single', year: '2022', color: '#F87590' },
  { title: 'First Bloom',            type: 'Album',  year: '2022', color: '#4883E0' },
  { title: 'たかねこ☆スターター',     type: 'Single', year: '2021', color: '#2d5fb8' },
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
 * Layout mirrors the reference: colored photo area, social icons
 * on the left rail, Japanese name + romanized name at the bottom.
 *
 * @param {Object} member - A member data object.
 * @returns {string} HTML string for a .member-card div.
 */
function createMemberCardHTML(member) {
  // SVG icons inlined
  const igSVG = `<svg viewBox="0 0 24 24" fill="currentColor" width="22" height="22" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>`;
  const xSVG   = `<svg viewBox="0 0 24 24" fill="currentColor" width="22" height="22" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>`;
  const ttSVG  = `<svg viewBox="0 0 24 24" fill="currentColor" width="22" height="22" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.76a4.85 4.85 0 01-1.01-.07z"/></svg>`;

  // Photo inner: real image or ✿ placeholder
  const photoInner = member.photo
    ? `<img src="${escapeHTML(member.photo)}"
            alt="${escapeHTML(member.nameJp)}"
            class="member-photo-img"
            loading="lazy"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
       <div class="member-photo-icon" aria-hidden="true" style="display:none">✿</div>`
    : `<div class="member-photo-icon" aria-hidden="true">✿</div>`;

  return `
    <div class="member-card" tabindex="0" aria-label="${escapeHTML(member.nameJp)}">

      <!-- [CARD UPPER] Dark outer area containing the color block + photo + social rail -->
      <div class="member-card-upper">

        <!-- [COLOR BLOCK] Member color rounded rectangle — sits behind the photo -->
        <div class="member-color-block" style="background-color: ${escapeHTML(member.color)};"></div>

        <!-- [SOCIAL RAIL] White pill strip on the left with social icons -->
        <div class="member-social-rail" aria-label="${escapeHTML(member.nameJp)}のSNS">
          <a href="${escapeHTML(member.instagram)}" class="member-social-btn" aria-label="Instagram" target="_blank" rel="noopener noreferrer">${igSVG}</a>
          <a href="${escapeHTML(member.twitter)}"   class="member-social-btn" aria-label="X (Twitter)" target="_blank" rel="noopener noreferrer">${xSVG}</a>
          <a href="${escapeHTML(member.tiktok)}"    class="member-social-btn" aria-label="TikTok" target="_blank" rel="noopener noreferrer">${ttSVG}</a>
        </div>

        <!-- [PHOTO] Sits on top of the color block -->
        <div class="member-photo">
          ${photoInner}
        </div>

      </div>

      <!-- [CARD FOOTER] Dark footer with member name in color -->
      <div class="member-card-footer">
        <p class="member-name-jp" style="color: ${escapeHTML(member.color)};">${escapeHTML(member.nameJp)}</p>
        <p class="member-name-en">${escapeHTML(member.nameEn)}</p>
      </div>

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

/* ============================================================
   ABOUT PAGE — STAGGERED SCROLL REVEAL
   Observes every [data-reveal] element on the about page.
   When each enters the viewport, .is-revealed is added after
   a staggered delay based on data-reveal-delay index.
   ============================================================ */

/**
 * initAboutReveal
 * Uses IntersectionObserver to watch all [data-reveal] elements.
 * Each element fires after a delay of (index × 120ms) so they
 * appear one by one as the user scrolls down.
 */
function initAboutReveal() {
  const items = document.querySelectorAll('[data-reveal]');
  if (!items.length) return;

  // Base stagger step in milliseconds between each element
  const STAGGER_MS = 120;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const el    = entry.target;
        // data-reveal-delay is the sequential index (0, 1, 2 …)
        const index = parseInt(el.dataset.revealDelay || '0', 10);

        // Apply the staggered delay then reveal
        setTimeout(() => {
          el.classList.add('is-revealed');
        }, index * STAGGER_MS);

        // Stop observing once revealed — no need to re-animate
        observer.unobserve(el);
      });
    },
    {
      threshold: 0.12,              // trigger when 12% of element is visible
      rootMargin: '0px 0px -40px 0px', // start slightly before fully in view
    }
  );

  items.forEach((el) => observer.observe(el));
}

// Run on DOMContentLoaded (works on about.html and any page with [data-reveal])
document.addEventListener('DOMContentLoaded', initAboutReveal);
