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
 *   6. MEDIA RENDERING
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
 * mediaData — Media posts for the MEDIA page.
 * Each item: {
 *   id       — unique number
 *   date     — 'YYYY.MM.DD' format — used for sorting (newest first)
 *   category — 'news' | 'funfacts' | 'memories'
 *   title    — post title (Japanese or English)
 *   image    — path to cover image, e.g. 'img/media/post1.jpg'
 *              Set to null to show gradient placeholder
 *   excerpt  — short description (1-2 sentences)
 *   color    — accent color for the card gradient placeholder
 * }
 *
 * HOW TO ADD A NEW POST:
 *   1. Add a new object to this array
 *   2. Set date in 'YYYY.MM.DD' format — newer dates appear first
 *   3. Set category to 'news', 'funfacts', or 'memories'
 *   4. Add a cover image to img/media/ and set the image field
 *   5. The card will automatically appear in the correct sorted position
*/
// const mediaData = [
//   {
//     id: 1,
//     date: '2025.09.15',
//     category: 'news',
//     title: 'Takanesia Project Anniversary Takaneko',
//     image: 'img/media/ebookproj.jpg',
//     excerpt: 'E-Book Project',
//     content: `Perayaan tiga tahun penuh kenangan bersama Takane no Nadeshiko dari para penggemar Indonesia.

//               Kisah, karya, dan cinta dirangkai dalam satu e-book spesial yang menghadirkan berbagai kontribusi kreatif dari komunitas.

//               Proyek ini menjadi simbol kebersamaan dan dedikasi fans dalam merayakan perjalanan idol yang mereka cintai.`,
//     color: '#4883E0',
//     links: [
//       { label: 'Online Read', url: 'https://online.fliphtml5.com/TakanesiaID/dzck/#p=1', type: 'blue' },
//       { label: 'Read PDF', url: 'https://drive.google.com/file/d/1ZQ-r5gaqEc4DwUuXIY8jttX53pW_n6yb/view', type: 'blue' }
//     ]
//   },
//   {
//     id: 2,
//     date: '2026.05.06',
//     category: 'news',
//     title: 'Erisa Absen di Beberapa Pertunjukan',
//     image: 'img/media/erisa absen.jpg',
//     excerpt: 'Member Absen',
//     content: `Erisa dikabarkan absen dari beberapa pertunjukan sejak 2 Mei 2026 karena kondisi kesehatan yang kurang baik 🤍

//                 Selama masa istirahat, posisinya akan digantikan sementara oleh Momoko.
//                 Semoga Erisa segera pulih dan bisa kembali tampil dengan kondisi terbaiknya!

//                 Tetap kirimkan dukungan dan doa terbaik ya 🙏✨

//                 #Takanesia #TakaneNews #GetWellSoonErisa`,
//     color: '#F87590',
//     links: [
//       { label: 'Instagram', url: 'https://www.instagram.com/p/DX9RSpaEtSW/', type: 'blue' },
//     ]
//   },
//   {
//     id: 3,
//     date: '2026.04.30',
//     category: 'news',
//     title: 'Takaneko Tampil di Asia Culture Festival',
//     image: 'img/media/cultfest.jpg',
//     excerpt: '#TKNKONSTAGE',
//     content: `Takaneko diumumkan sebagai salah satu lineup dalam Asia Culture Festival 2026 
//               yang akan digelar pada 9-10 Juni 2026 di Tokyo Garden Theater, Jepang. Kehadiran 
//               mereka dalam festival ini menjadi bagian dari rangkaian penampilan bersama berbagai 
//               artis lain yang meramaikan acara tersebut.

//               Buat yang di Jepang, jangan sampai kelewatan 👀`,
//     color: '#4883E0',
//     links: [
//       { label: 'Instagram', url: 'https://www.instagram.com/p/DXvdW0BEkRy/', type: 'blue' },
//     ]
//   },
//   {
//     id: 4,
//     date: '2026.03.17',
//     category: 'memories',
//     title: 'Takanesia Berbagi Kebaikan',
//     image: 'img/media/berbagi.jpg',
//     excerpt: 'Berbagi Manfaat',
//     content: `Otsukare - Takanesia Berbagi Kebaikan ✨

//               Alhamdulillah, kemarin Takanesia bersama beberapa komunitas jejepangan lainnya 
//               berhasil membagikan 300 paket takjil kepada masyarakat di sekitar Mangga Dua Square.

//               Terima kasih sebesar-besarnya untuk semua yang sudah berpartisipasi, baik melalui 
//               tenaga maupun donasi. Semoga kebaikan ini bisa terus berlanjut ke depannya 🌸

//               #高嶺のなでしこ #たかねこ #takanenonadeshiko #takanenonadeshikoindonesia #takanememory`,
//     color: '#2d5fb8',
//     links: [
//       { label: 'Instagram', url: 'https://www.instagram.com/p/DV-LMvoEgLC/', type: 'blue' },
//     ]
//   },
//   {
//     id: 5,
//     date: '2026.03.11',
//     category: 'memories',
//     title: 'Otsukare BOUQUET OF 9 FLOWERS 🌸',
//     image: 'img/media/bouq9flow.jpg',
//     excerpt: 'Bouquet of 9 Flowers',
//     content: `Live Tour Takaneko yang keempat di Zepp DiverCity (Tokyo) dan Live tour selanjutnya tanggal 21 Maret di Zepp Fukuoka 💕

//               Banyak juga fancam dan potret setiap member dengan hastag "#たかねこツアー2026" bisa cari di X atau Tiktok ❤️

//               #高嶺のなでしこ #たかねこ #takanenonadeshiko #takanenonadeshikoindonesia takanememory`,
//     color: '#F87590',
//     links: [
//       { label: 'Instagram', url: 'https://www.instagram.com/p/DVvYbcnkjZc/', type: 'blue' },
//     ]
//   },
//   {
//     id: 6,
//     date: '2026.03.20',
//     category: 'funfacts',
//     title: 'Funfact Watashi no Koto ga Suki',
//     image: 'img/media/Funfact Watashi no Koto ga Suki.jpg',
//     excerpt: 'Nao x Momoko',
//     content: `【TAKANE FUNFACT】

//               Lagu bertema self-love ini juga mendapatkan versi odotte mita (dance cover) yang menampilkan 
//               duo center sambil cosplay sebagai karakter dari Cosmic Princess Kaguya Nao sebagai Kaguya dan 
//               Momoko sebagai Sakayori Iroha

//               Ini juga menjadi momen pertama bagi Takane no Nadeshiko merilis dance cover dengan konsep cosplay`,
//     color: '#4883E0',
//     links: [
//       { label: 'Instagram', url: 'https://www.instagram.com/p/DXV7gYdktUp/', type: 'blue' },
//     ]
//   },
// ];

/**
 * membersData — 9 members.
 *
 * ============================================================
 * HOW TO EDIT MEMBER DATA:
 * ============================================================
 * CARD FIELDS:
 *   id        — unique number, do not change
 *   nameJp    — Japanese name displayed on card + modal header
 *   nameEn    — Romanized name in ALL CAPS
 *   color     — member accent color (hex) — name text color
 *   photo     — path to photo: 'img/members/filename.jpg'
 *               Set to null to show gradient placeholder
 *   instagram — Instagram profile URL
 *   twitter   — X (Twitter) profile URL
 *   tiktok    — TikTok profile URL
 *
 * MODAL BIODATA FIELDS (shown in popup when card is clicked):
 *   bloodType — 血液型  e.g. 'B型'
 *   zodiac    — 星座    e.g. 'やぎ座'
 *   height    — 身長    e.g. '153cm'
 *   birthday  — 生年月日 e.g. '2003年12月25日'
 *   hometown  — 出身地  e.g. '埼玉県'
 *   hobbies   — 趣味    e.g. 'ホラー系作品鑑賞・ヘアアレンジ'
 *   skills    — 特技    e.g. '色々な怪獣の顔マネ・変な動き'
 *   message   — ひとこと (personal message to fans)
 * ============================================================
*/

// membersData
// const membersData = [
//   {
//     id: 1, nameJp: '城月 菜央', nameEn: 'KIZUKI NAO',
//     color: '#f3d104', position: 'センター',
//     photo: 'img/members/nao.jpg',
//     instagram: 'https://www.instagram.com/nao_kizuki_',
//     twitter: 'https://x.com/nao_kizuki',
//     tiktok: 'https://www.tiktok.com/@nao_kizuki',
//     // --- MODAL BIODATA (edit these fields) ---
//     bloodType: 'B',
//     height: '153cm',
//     birthday: 'December 25, 2003',
//     hometown: 'Saitama Prefecture',
//   },
//   {
//     id: 2, nameJp: '涼海 すう', nameEn: 'SUZUMI SU',
//     color: '#209aca', position: 'リーダー',
//     photo: 'img/members/suu.jpg',
//     instagram: 'https://www.instagram.com/su_suzumi_/',
//     twitter: 'https://x.com/su_suzumi_',
//     tiktok: 'https://www.tiktok.com/@suu._.suu',
//     bloodType: 'AB',
//     height: '148cm',
//     birthday: 'August 22, 2007',
//     hometown: 'Osaka Prefecture',
//   },
//   {
//     id: 3, nameJp: '橋本 桃呼', nameEn: 'HASHIMOTO MOMOKO',
//     color: '#c72e85', position: 'メンバー',
//     photo: 'img/members/momoko.jpg',
//     instagram: 'https://www.instagram.com/momoko__3628/',
//     twitter: 'https://x.com/MomokoHashimoto',
//     tiktok: 'https://www.tiktok.com/@momoko_hashimoto',
//     bloodType: 'AB',
//     height: '160cm',
//     birthday: 'June 28, 2003',
//     hometown: 'Yamaguchi Prefecture',
//   },
//   {
//     id: 4, nameJp: '葉月 紗蘭', nameEn: 'HAZUKI SAARA',
//     color: '#ffffff', position: 'メンバー',
//     photo: 'img/members/saara.jpg',
//     instagram: 'https://www.instagram.com/saara_hazuki/',
//     twitter: 'https://x.com/saara_hazuki',
//     tiktok: 'https://www.tiktok.com/@saara_hazuki',
//     bloodType: '-',
//     height: '160cm',
//     birthday: 'March 3, 2007',
//     hometown: 'Mie Prefecture',
//   },
//   {
//     id: 5, nameJp: '東山 恵里沙', nameEn: 'HIGASHIYAMA ERISA',
//     color: '#f98c27', position: 'メンバー',
//     photo: 'img/members/erisa.jpg',
//     instagram: 'https://www.instagram.com/erisa_higashiyama/',
//     twitter: 'https://x.com/erisahigasiyama',
//     tiktok: 'https://www.tiktok.com/@erisahigasiyama',
//     bloodType: 'AB',
//     height: '157cm',
//     birthday: 'May 28, 2006',
//     hometown: 'Gifu Prefecture',
//   },
//   {
//     id: 6, nameJp: '日向端 ひな', nameEn: 'HINAHATA HINA',
//     color: '#8017bc', position: 'メンバー',
//     photo: 'img/members/hinatama.jpg',
//     instagram: 'https://www.instagram.com/hinatama18',
//     twitter: 'https://x.com/hina_hinahata',
//     tiktok: 'https://www.tiktok.com/@hinatam_18',
//     bloodType: 'O',
//     height: '158cm',
//     birthday: 'October 30, 2002',
//     hometown: 'Kanagawa Prefecture',
//   },
//   {
//     id: 7, nameJp: '星谷 美来', nameEn: 'HOSHITANI MIKURU',
//     color: '#d21919', position: 'メンバー',
//     photo: 'img/members/mikuru.jpg',
//     instagram: 'https://www.instagram.com/mikuru_1106/',
//     twitter: 'https://x.com/mikuru_hositani',
//     tiktok: 'https://www.tiktok.com/@mikuru_1106',
//     bloodType: 'O',
//     height: '161cm',
//     birthday: 'November 6, 2003',
//     hometown: 'Tokyo',
//   },
//   {
//     id: 8, nameJp: '松本ももな', nameEn: 'MATSUMOTO MOMONA',
//     color: '#e87dd4', position: 'メンバー',
//     photo: 'img/members/momona.jpg',
//     instagram: 'https://www.instagram.com/momona.1012/',
//     twitter: 'https://x.com/momonamatsumoto',
//     tiktok: 'https://www.tiktok.com/@momona.1012',
//     bloodType: 'B',
//     height: '159cm',
//     birthday: 'October 12, 2002',
//     hometown: 'Kanagawa Prefecture',
//   },
//   {
//     id: 9, nameJp: '籾山 ひめり', nameEn: 'MOMIYAMA HIMERI',
//     color: '#1864c1', position: 'メンバー',
//     photo: 'img/members/himeri.jpg',
//     instagram: 'https://www.instagram.com/momichan_hime/',
//     twitter: 'https://x.com/himeri_momiyama',
//     tiktok: 'https://www.tiktok.com/@momichan_hime',
//     bloodType: 'B',
//     height: '158cm',
//     birthday: 'March 22, 2004',
//     hometown: 'Tochigi Prefecture',
//   },
// ];

/**
 * discoData — Discography releases.
 *
 * ============================================================
 * HOW TO EDIT:
 *   releaseDate — 'YYYY.MM.DD' format — used for sorting
 *   cover       — path to cover image, e.g. 'img/disco/bouquet.jpg'
 *                 Set to null to show gradient placeholder
 * ============================================================
 */
// const discoData = [
//   {
//     title: 'アンチファン - Anti-fan',
//     type: 'Single',
//     releaseDate: '2022.10.26',
//     color: '#4883E0',
//     cover: 'img/disco/antifan.jpg',
//   },
//   {
//     title: '女の子は強い - Onnanoko wa Tsuyoi',
//     type: 'Digital Single',
//     releaseDate: '2022.12.26',
//     color: '#F87590',
//     cover: 'img/disco/onnanoko.jpg',
//   },
//   {
//     title: '可愛くてごめん - Kawaikute gomen',
//     type: 'Digital Single',
//     releaseDate: '2023.01.27',
//     color: '#2d5fb8',
//     cover: 'img/disco/kawaikute.png',
//   },
//   {
//     title: '乙女どもよ。 - Otomedomo yo',
//     type: 'Digital Single',
//     releaseDate: '2023.02.04',
//     color: '#F87590',
//     cover: 'img/disco/otome.jpg',
//   },
//   {
//     title: '男の子の目的は何？ - Otokonoko no Mokuteki wa Nani?',
//     type: 'Digital Single',
//     releaseDate: '2023.03.20',
//     color: '#4883E0',
//     cover: 'img/disco/otokonoko.jpg',
//   },
//   {
//     title: '僕は君になれない - Boku wa Kimi ni Narenai',
//     type: 'Digital Single',
//     releaseDate: '2023.04.04',
//     color: '#2d5fb8',
//     cover: 'img/disco/bokukimi.jpg',
//   },
//   {
//     title: '革命の女王 - Kakumei no Jyoou',
//     type: 'Digital Single',
//     releaseDate: '2023.04.04',
//     color: '#2d5fb8',
//     cover: 'img/disco/kakumei.jpg',
//   },
//   {
//     title: 'ヒロインは平均以下。 - Heroin wa Heikin ika.',
//     type: 'Digital Single',
//     releaseDate: '2023.06.21',
//     color: '#2d5fb8',
//     cover: 'img/disco/heroine.jpg',
//   },
//   {
//     title: '決戦スピリット - Kessen Spirit',
//     type: 'Digital Single',
//     releaseDate: '2023.06.22',
//     color: '#2d5fb8',
//     cover: 'img/disco/kessen.jpg',
//   },
//   {
//     title: '初恋のひと。 - Hatsukoi no Hito.',
//     type: 'Digital Single',
//     releaseDate: '2023.07.04',
//     color: '#2d5fb8',
//     cover: 'img/disco/hatsuhito.jpg',
//   },
//   {
//     title: '月曜日の憂鬱 - Getsuyoubi no Yuutsu',
//     type: 'Digital Single',
//     releaseDate: '2023.07.21',
//     color: '#2d5fb8',
//     cover: 'img/disco/getsuyobi.jpg',
//   },
//   {
//     title: 'すきっちゅーの！ - Sukicchuuno!',
//     type: 'Digital Single',
//     releaseDate: '2023.09.01',
//     color: '#2d5fb8',
//     cover: 'img/disco/sukichuno.png',
//   },
//   {
//     title: '17歳 - 17sai',
//     type: 'Digital Single',
//     releaseDate: '2023.09.03',
//     color: '#2d5fb8',
//     cover: 'img/disco/17sai.png',
//   },
//   {
//     title: 'いつか私がママになったら - Itsuka Watashi ga Mama ni Nattara',
//     type: 'Digital Single',
//     releaseDate: '2023.10.16',
//     color: '#2d5fb8',
//     cover: 'img/disco/itsumama.jpg',
//   },
//   {
//     title: '可愛いって言われたい - Kawaiitte Iwaretai',
//     type: 'Digital Single',
//     releaseDate: '2024.02.03',
//     color: '#2d5fb8',
//     cover: 'img/disco/kawaiiwaretai.jpg',
//   },
//   {
//     title: '私は怪物 - Watashi wa Kaibutsu',
//     type: 'Digital Single',
//     releaseDate: '2024.02.06',
//     color: '#2d5fb8',
//     cover: 'img/disco/watashikaibutsu.jpg',
//   },
//   {
//     title: '推しの魔法 - Oshi no Mahou',
//     type: 'Digital Single',
//     releaseDate: '2024.03.25',
//     color: '#2d5fb8',
//     cover: 'img/disco/oshinomahou.jpg',
//   },
//   {
//     title: 'メイド☆至上主義 - Maid Shijyoshugi',
//     type: 'Digital Single',
//     releaseDate: '2024.05.13',
//     color: '#2d5fb8',
//     cover: 'img/disco/maid.jpg',
//   },
//   {
//     title: '私より好きでいて - Watashi Yori Sukide Ite',
//     type: 'Digital Single',
//     releaseDate: '2024.06.05',
//     color: '#2d5fb8',
//     cover: 'img/disco/lovememore.jpg',
//   },
//   {
//     title: '小悪魔だってかまわない! - Koakuma Datte Kamawanai!',
//     type: 'Digital Single',
//     releaseDate: '2025.02.09',
//     color: '#2d5fb8',
//     cover: 'img/disco/koakuma.jpg',
//   },
//   {
//     title: 'Cute for Life',
//     type: 'Digital Single',
//     releaseDate: '2025.04.07',
//     color: '#2d5fb8',
//     cover: 'img/disco/cfl.jpg',
//   },
//   {
//     title: 'メランコリックハニー - Melancholic Honey',
//     type: 'Digital Single',
//     releaseDate: '2025.04.30',
//     color: '#2d5fb8',
//     cover: 'img/disco/meraho.jpg',
//   },
//   {
//     title: '美しく生きろ - Utsukushiku Ikiro',
//     type: 'Single',
//     releaseDate: '2024.02.21',
//     color: '#2d5fb8',
//     cover: 'img/disco/utsukushi.jpg',
//   },
//   {
//     title: 'I’M YOUR IDOL / アドレナリンゲーム - I’M YOUR IDOL / Adrenaline Game',
//     type: 'Single',
//     releaseDate: '2024.12.11',
//     color: '#2d5fb8',
//     cover: 'img/disco/imidol.jpg',
//   },
//   {
//     title: '見上げるたびに、恋をする。 - Miageru Tabi ni, Koi o Suru.',
//     type: 'Album',
//     releaseDate: '2025.12.17',
//     color: '#2d5fb8',
//     cover: 'img/disco/miageru.jpg',
//   },
// ];

/* ============================================================
   2. INITIALIZATION
   DOMContentLoaded listener that calls all init functions
   in the correct order once the DOM is fully parsed.
   ============================================================ */

document.addEventListener('DOMContentLoaded', () => {
  initTheme();               // 2.5 Theme management
  initHeaderScroll();         // 3. Sticky header shadow on scroll
  initHamburger();            // 4. Mobile nav toggle
  createPetals();             // 5. Hero falling petals
  initMedia();               // 6. Media grid + filter tabs
  renderHomeNews();           // 6.5 Home Community News
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
  const hero = document.getElementById('hero');
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
   6. MEDIA RENDERING
   Renders filtered media cards into #mediaGrid sorted by date
   (newest first). Supports All / News / Fun Facts / Memories tabs.
   ============================================================ */

/** How many media cards to show per page load */
const MEDIA_PAGE_SIZE = 6;

/** Tracks the current media filter category */
let currentMediaFilter = 'all';

/** Tracks how many media cards are currently visible */
let visibleMediaCount = MEDIA_PAGE_SIZE;

/**
 * initMedia
 * Sets up filter tab click handlers and performs the initial render.
 * Called from DOMContentLoaded if #mediaGrid exists on the page.
 */
function initMedia() {
  const grid = document.getElementById('mediaGrid');
  if (!grid) return;

  // Initial render — show all, sorted by date
  renderMedia('all');

  // Attach click handlers to each filter tab
  const tabs = document.querySelectorAll('.media-tab');
  tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      const filter = tab.dataset.category;

      // Update active tab styling
      tabs.forEach((t) => {
        t.classList.remove('media-tab--active');
        t.setAttribute('aria-selected', 'false');
      });
      tab.classList.add('media-tab--active');
      tab.setAttribute('aria-selected', 'true');

      // Reset pagination and re-render
      visibleMediaCount = MEDIA_PAGE_SIZE;
      renderMedia(filter);
    });
  });

  // Load more button
  const loadMoreBtn = document.getElementById('loadMoreMedia');
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener('click', () => {
      visibleMediaCount += MEDIA_PAGE_SIZE;
      renderMedia(currentMediaFilter, false);
    });
  }
}

/**
 * renderMedia
 * Filters mediaData by category, sorts by date (newest first),
 * then renders up to visibleMediaCount cards into #mediaGrid.
 *
 * @param {string} filter - 'all' | 'news' | 'funfacts' | 'memories'
 * @param {boolean} [resetCount=true] - Whether to reset visible count
 */
// function renderMedia(filter, resetCount = true) {
//   currentMediaFilter = filter;
//   if (resetCount) visibleMediaCount = MEDIA_PAGE_SIZE;

//   const grid = document.getElementById('mediaGrid');
//   const loadMoreBtn = document.getElementById('loadMoreMedia');
//   if (!grid) return;

//   // Filter by category
//   // const filtered = filter === 'all'
//   //   ? [...mediaData]
//   //   : mediaData.filter((item) => item.category === filter);
 
//   // Sort by date descending (newest first)
//   // Date format: 'YYYY.MM.DD' — replace dots for reliable comparison
//   filtered.sort((a, b) => {
//     const da = a.date.replace(/\./g, '');
//     const db = b.date.replace(/\./g, '');
//     return db.localeCompare(da);
//   });

//   // Slice to visible count
//   const visible = filtered.slice(0, visibleMediaCount);

//   // Render cards
//   grid.innerHTML = visible.map((item) => createMediaCardHTML(item)).join('');

//   // Show/hide load more button
//   if (loadMoreBtn) {
//     loadMoreBtn.style.display = visibleMediaCount < filtered.length ? 'inline-flex' : 'none';
//   }
// }
function renderMedia(filter, resetCount = true) {
    currentMediaFilter = filter;

    if (resetCount) {
        visibleMediaCount = MEDIA_PAGE_SIZE;
    }

    const grid = document.getElementById('mediaGrid');
    const loadMoreBtn = document.getElementById('loadMoreMedia');

    if (!grid) return;

    // Filter kategori
    const filtered = filter === 'all'
        ? [...mediaData]
        : mediaData.filter(item =>
            item.category.toLowerCase() === filter.toLowerCase()
        );

    // Urutkan terbaru
    filtered.sort((a, b) => new Date(b.date) - new Date(a.date));

    // Ambil sejumlah data
    const visible = filtered.slice(0, visibleMediaCount);

    // Tampilkan
    grid.innerHTML = visible
        .map(item => createMediaCardHTML(item))
        .join('');

    // Tombol Read More
    if (loadMoreBtn) {
        loadMoreBtn.style.display =
            visibleMediaCount < filtered.length
                ? 'inline-flex'
                : 'none';
    }
}
/**
 * createMediaCardHTML
 * Returns the HTML string for a single media card.
 * Card style mirrors the member card: dark background, colored
 * accent, cover image area, title + date + category in footer.
 *
 * @param {Object} item - A mediaData object.
 * @returns {string} HTML string for a .media-card div.
 */

function stripHtml(html) {
    const div = document.createElement('div');
    div.innerHTML = html;
    return div.textContent || div.innerText || '';
}
function createMediaCardHTML(item) {
  // Category label map
  const categoryLabels = {
    news: 'NEWS',
    funfacts: 'FUN FACTS',
    memories: 'MEMORIES',
  };
  const catLabel = categoryLabels[item.category] || item.category.toUpperCase();
  const excerpt = stripHtml(item.content)
    .replace(/\s+/g, ' ')
    .trim()
    .substring(0, 120);
  // Cover image or gradient placeholder
  const coverHTML = item.image
    ? `<img src="${escapeHTML(item.image)}" alt="${escapeHTML(item.title)}" class="media-card-img" loading="lazy" />`
    : `<div class="media-card-placeholder" style="background:linear-gradient(160deg,${escapeHTML(item.color)}44,${escapeHTML(item.color)})">
         <span class="media-card-placeholder-icon">✿</span>
       </div>`;

  return `
   <a href="${mediaDetailUrl}/${item.id}"
    <div class="media-card" tabindex="0" aria-label="${escapeHTML(item.title)}"
         role="button"
         onclick="openMediaModal(${item.id})"
         onkeydown="if(event.key==='Enter'||event.key===' ')openMediaModal(${item.id})">
      <!-- [COVER] Post cover image or gradient placeholder -->
      <div class="media-card-cover">
        ${coverHTML}
        <!-- [CATEGORY BADGE] Shown on top of the cover -->
        <span style="background:linear-gradient(160deg,${escapeHTML(item.color)}44,${escapeHTML(item.color)})" class="media-card-badge media-card-badge--${escapeHTML(item.category)}">${catLabel}</span>
      </div>
      <!-- [FOOTER] Title, excerpt, date -->
      <div class="media-card-footer">
        <p class="media-card-title">${escapeHTML(item.title)}</p>
        <p class="media-card-excerpt">${escapeHTML(excerpt)}</p>
        <p class="media-card-date">${escapeHTML(item.date)}</p>
      </div>
    </div>
        </a>

  `;
}

/**
 * renderHomeNews
 * Finds the 5 newest media items and renders them into #homeNewsGrid
 */
function renderHomeNews() {
  const grid = document.getElementById('homeNewsGrid');
  if (!grid) return;

  // Copy and sort by date descending (newest first)
  const sorted = [...mediaData].sort((a, b) => {
    const da = a.date.replace(/\./g, '');
    const db = b.date.replace(/\./g, '');
    return db.localeCompare(da);
  });

  // Get the topmsin 5
  const top5 = sorted.slice(0, 5);

  // Render cards reusing the existing HTML generator
  grid.innerHTML = top5.map((item) => createMediaCardHTML(item)).join('');
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
  // SVG icons — plain, no background pill
  const igSVG = `<svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>`;
  const xSVG = `<svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>`;
  const ttSVG = `<svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.76a4.85 4.85 0 01-1.01-.07z"/></svg>`;

  // Photo inner: real image only — no ✿ overlay when photo is set
  const photoInner = member.photo
    ? `<img src="${escapeHTML(member.photo)}"
            alt="${escapeHTML(member.nameJp)}"
            class="member-photo-img"
            loading="lazy"
            onerror="this.style.display='none';this.insertAdjacentHTML('afterend','<div class=\\'member-photo-icon\\' aria-hidden=\\'true\\'>✿</div>')" />`
    : `<div class="member-photo-icon" aria-hidden="true">✿</div>`;

  return `
    <div class="member-card" tabindex="0" aria-label="${escapeHTML(member.nameJp)}"
         data-member-id="${member.id}"
         role="button"
         onclick="openMemberModal(${member.id})"
         onkeydown="if(event.key==='Enter'||event.key===' ')openMemberModal(${member.id})">

      <!-- [CARD BODY] Photo + color block only — no social rail here -->
      <div class="member-card-body">

        <!-- [COLOR BLOCK] Member color rect behind the photo -->
        <div class="member-color-block" style="background-color:${escapeHTML(member.color)};"></div>

        <!-- [PHOTO] Fills the card body -->
        <div class="member-photo">
          ${photoInner}
        </div>

      </div>

      <!-- [CARD FOOTER] Name on left, social icons on right -->
      <div class="member-card-footer">
        <div class="member-footer-names">
          <p class="member-name-jp" style="color:${escapeHTML(member.color)};">${escapeHTML(member.nameJp)}</p>
          <p class="member-name-en">${escapeHTML(member.nameEn)}</p>
        </div>
        <!-- Social icons: X → Instagram → TikTok -->
        <div class="member-social-rail" aria-label="${escapeHTML(member.nameJp)}のSNS">
          <a href="${escapeHTML(member.twitter)}"   class="member-social-btn" aria-label="X (Twitter)" target="_blank" rel="noopener noreferrer">${xSVG}</a>
          <a href="${escapeHTML(member.instagram)}" class="member-social-btn" aria-label="Instagram" target="_blank" rel="noopener noreferrer">${igSVG}</a>
          <a href="${escapeHTML(member.tiktok)}"    class="member-social-btn" aria-label="TikTok" target="_blank" rel="noopener noreferrer">${ttSVG}</a>
        </div>
      </div>

    </div>
  `; 
}

/* ============================================================
   8. DISCOGRAPHY RENDERING
   Renders disco cards in a paginated grid.
   - Desktop: 3 columns × 4 rows = 12 per page
   - Mobile:  2 columns × 6 rows = 12 per page
   Sort order toggled by #discoSortBtn.
   ============================================================ */

/** Items per page — 12 fills both 3×4 and 2×6 layouts */
const DISCO_PAGE_SIZE = 12;

/** Current page (1-indexed) */
let discoCurrentPage = 1;

/** Current sort direction */
let discoSortOrder = 'desc';

/**
 * renderDisco
 * Sorts discoData, slices to the current page, renders cards,
 * and rebuilds the pagination controls.
 */
function renderDisco() {
  const grid = document.getElementById('discoTrack');
  const pagination = document.getElementById('discoPagination');
  if (!grid) return;

  // Sort a copy — never mutate the source array
  const sorted = [...discoData].sort((a, b) => {
    const da = a.releaseDate.replace(/\./g, '');
    const db = b.releaseDate.replace(/\./g, '');
    return discoSortOrder === 'desc'
      ? db.localeCompare(da)
      : da.localeCompare(db);
  });

  const totalPages = Math.ceil(sorted.length / DISCO_PAGE_SIZE);

  // Clamp current page within valid range
  discoCurrentPage = Math.max(1, Math.min(discoCurrentPage, totalPages));

  // Slice to current page
  const start = (discoCurrentPage - 1) * DISCO_PAGE_SIZE;
  const visible = sorted.slice(start, start + DISCO_PAGE_SIZE);

  // Render cards
  grid.innerHTML = visible.map((release) => createDiscoCardHTML(release)).join('');

  // Update sort button label
  const btn = document.getElementById('discoSortBtn');
  if (btn) {
    btn.textContent = discoSortOrder === 'desc' ? '↓ Newest First' : '↑ Oldest First';
  }

  // Render pagination
  if (pagination) {
    if (totalPages <= 1) {
      pagination.innerHTML = '';
      return;
    }

    pagination.innerHTML = Array.from({ length: totalPages }, (_, i) => {
      const page = i + 1;
      const isActive = page === discoCurrentPage;
      return `<button
        class="disco-page-btn${isActive ? ' disco-page-btn--active' : ''}"
        onclick="goToDiscoPage(${page})"
        aria-label="ページ ${page}"
        aria-current="${isActive ? 'page' : 'false'}"
      >${page}</button>`;
    }).join('');
  }
}

/**
 * goToDiscoPage
 * Navigates to a specific page and scrolls the section into view.
 *
 * @param {number} page - Target page number (1-indexed).
 */
function goToDiscoPage(page) {
  discoCurrentPage = page;
  renderDisco();
  // Scroll to the top of the disco section smoothly
  const section = document.getElementById('discography');
  if (section) {
    const header = document.getElementById('siteHeader');
    const offset = header ? header.offsetHeight + 16 : 80;
    const top = section.getBoundingClientRect().top + window.scrollY - offset;
    window.scrollTo({ top, behavior: 'smooth' });
  }
}

/**
 * toggleDiscoSort
 * Flips sort order, resets to page 1, and re-renders.
 */
function toggleDiscoSort() {
  discoSortOrder = discoSortOrder === 'desc' ? 'asc' : 'desc';
  discoCurrentPage = 1;
  renderDisco();
}

/**
 * createDiscoCardHTML
 * Returns HTML for a single discography card.
 */
function createDiscoCardHTML(release) {
  const coverContent = release.cover
    ? `<img src="${escapeHTML(release.cover)}"
            alt="${escapeHTML(release.title)}"
            class="disco-cover-img"
            loading="lazy"
            onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
       <div class="disco-cover-icon" aria-hidden="true" style="display:none">✿</div>`
    : `<div class="disco-cover-icon" aria-hidden="true">✿</div>`;

  const coverBg = release.cover
    ? `background-color: ${escapeHTML(release.color)}22;`
    : `background: linear-gradient(160deg, ${escapeHTML(release.color)}55 0%, ${escapeHTML(release.color)} 100%);`;

  return `
   <a href="${discoDetailUrl}/${release.id}"
    <div class="disco-card" tabindex="0" aria-label="${escapeHTML(release.title)} — ${escapeHTML(release.type)}">
      <div class="disco-cover" style="${coverBg}">
        ${coverContent}
      </div>
      <div class="disco-info">
        <p class="disco-title">${escapeHTML(release.title)}</p>
        <p class="disco-meta">${escapeHTML(release.type)}</p>
        <p class="disco-date">${escapeHTML(release.releaseDate)}</p>
      </div>
      <div class="disco-color-bar" style="background-color: ${escapeHTML(release.color)};"></div>
    </div>
     </a>
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
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;');
}

/**
 * renderParagraphs
 * Converts a string with double newlines (\n\n) into multiple
 * HTML <p> tags, while escaping each paragraph for safety.
 *
 * @param {string} text - The raw text content.
 * @returns {string} HTML string with <p> tags.
 */
function renderParagraphs(text) {
  if (!text) return '';
  return text
    .split('\n\n')
    .map((p) => `<p>${escapeHTML(p.trim())}</p>`)
    .join('');
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

        const el = entry.target;
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

/* ============================================================
   MEMBER PROFILE MODAL
   Opens a popup with full biodata when a member card is clicked.
   ============================================================ */

/**
 * openMemberModal
 * Finds the member by id, builds the modal HTML, injects it
 * into #memberModal, and shows the overlay.
 *
 * @param {number} id - The member's id from membersData.
 */
function openMemberModal(id) {
  const member = membersData.find((m) => m.id === id);
  if (!member) return;

  const modal = document.getElementById('memberModal');
  const content = document.getElementById('memberModalContent');
  if (!modal || !content) return;

  // SVG icons for social links inside the modal
  const igSVG = `<svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>`;
  const xSVG = `<svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>`;
  const ttSVG = `<svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.76a4.85 4.85 0 01-1.01-.07z"/></svg>`;

  // Photo or gradient placeholder
  const photoHTML = member.photo
    ? `<img src="${escapeHTML(member.photo)}" alt="${escapeHTML(member.nameJp)}" class="modal-photo-img" />`
    : `<div class="modal-photo-placeholder" style="background:linear-gradient(160deg,${escapeHTML(member.color)}44,${escapeHTML(member.color)})">✿</div>`;

  // Build biodata rows — only show rows where data exists
  const bioRows = [
    { label: 'Blood Type', value: member.bloodType },
    { label: 'Height', value: member.height },
    { label: 'Birthday', value: member.birthday },
    { label: 'Hometown', value: member.hometown },
  ]
    .filter((row) => row.value)
    .map((row) => `
      <tr class="modal-bio-row">
        <td class="modal-bio-label">${escapeHTML(row.label)}</td>
        <td class="modal-bio-value">${escapeHTML(row.value)}</td>
      </tr>`)
    .join('');

  // Inject modal content
  content.innerHTML = `
    <!-- [MODAL HEADER] "profile" label + close button -->
    <div class="modal-header">
      <span class="modal-profile-label">p r o f i l e</span>
      <button class="modal-close" onclick="closeMemberModal()" aria-label="閉じる">&times;</button>
    </div>

    <!-- [MODAL BODY] Photo left, biodata right -->
    <div class="modal-body">

      <!-- [MODAL PHOTO] Member photo -->
      <div class="modal-photo-wrap">
        ${photoHTML}
      </div>

      <!-- [MODAL INFO] Name + biodata table + social links -->
      <div class="modal-info">

        <!-- [MODAL NAME] Japanese name in member color, romanized below -->
        <h2 class="modal-name-jp" style="color:${escapeHTML(member.color)};">${escapeHTML(member.nameJp)}</h2>
        <p class="modal-name-en">${escapeHTML(member.nameEn)}</p>

        <!-- [MODAL BIODATA TABLE] Edit fields in membersData in main.js -->
        <table class="modal-bio-table" aria-label="プロフィール">
          <tbody>${bioRows}</tbody>
        </table>

        <!-- [MODAL SOCIAL] Social media links — order: X, Instagram, TikTok -->
        <div class="modal-social">
          <a href="${escapeHTML(member.twitter)}"   class="modal-social-btn" aria-label="X (Twitter)" target="_blank" rel="noopener noreferrer">${xSVG}</a>
          <a href="${escapeHTML(member.instagram)}" class="modal-social-btn" aria-label="Instagram"   target="_blank" rel="noopener noreferrer">${igSVG}</a>
          <a href="${escapeHTML(member.tiktok)}"    class="modal-social-btn" aria-label="TikTok"      target="_blank" rel="noopener noreferrer">${ttSVG}</a>
        </div>

      </div>
    </div>
  `;

  // Show the modal
  modal.classList.add('is-open');
  document.body.style.overflow = 'hidden'; // prevent background scroll
}

/**
 * closeMemberModal
 * Hides the modal and restores page scrolling.
 */
/**
 * closeMemberModal
 * Hides the modal and restores page scrolling.
 */
function closeMemberModal() {
  const modal = document.getElementById('memberModal');
  if (!modal) return;
  modal.classList.remove('is-open');
  document.body.style.overflow = '';
}

/* ============================================================
   MEDIA MODAL
   Opens a popup with full news content when a media card is clicked.
   ============================================================ */

/**
 * openMediaModal
 * Finds the media item by id, builds the modal HTML, injects it
 * into #mediaModalContent, and shows the overlay.
 *
 * @param {number} id - The media item's id from mediaData.
 */
function openMediaModal(id) {
  const item = mediaData.find((m) => m.id === id);
  if (!item) return;

  const modal = document.getElementById('mediaModal');
  const content = document.getElementById('mediaModalContent');
  if (!modal || !content) return;

  // Cover image or gradient placeholder
  const coverHTML = item.image
    ? `<img src="${escapeHTML(item.image)}" alt="${escapeHTML(item.title)}" class="modal-media-img" />`
    : `<div class="modal-media-placeholder" style="background:linear-gradient(160deg,${escapeHTML(item.color)}44,${escapeHTML(item.color)})">✿</div>`;

  // Inject modal content
  content.innerHTML = `
    <!-- [MODAL HEADER] Close button -->
    <div class="modal-header">
      <span class="modal-profile-label">${item.category.split('').join(' ')}</span>
      <button class="modal-close" onclick="closeMediaModal()" aria-label="閉じる">&times;</button>
    </div>

    <!-- [MODAL BODY] Image at top, text below -->
    <div class="media-modal-body">
      <!-- [MODAL PHOTO] Media cover -->
      <div class="modal-media-cover">
        ${coverHTML}
        <span class="media-card-badge media-card-badge--${escapeHTML(item.category)}" style="position:absolute; top:1rem; left:1rem;">
          ${item.category.toUpperCase()}
        </span>
      </div>

      <!-- [MODAL INFO] Title, Date, Content -->
      <div class="modal-media-info">
        <h2 class="modal-media-title">${escapeHTML(item.title)}</h2>
        <p class="modal-media-date">${escapeHTML(item.date)}</p>
        <div class="modal-media-content">
          ${renderParagraphs(item.content)}
        </div>

        <!-- [MODAL LINKS] Render buttons if links exist in data -->
        ${item.links ? `
          <div class="modal-media-links">
            ${item.links.map(link => `
              <a href="${escapeHTML(link.url)}" 
                 class="btn btn--${link.type || 'primary'} modal-media-btn" 
                 target="_blank" rel="noopener noreferrer">
                ${escapeHTML(link.label)}
              </a>
            `).join('')}
          </div>
        ` : ''}
      </div>
    </div>
  `;

  // Show the modal
  modal.classList.add('is-open');
  document.body.style.overflow = 'hidden'; // prevent background scroll
}

/**
 * closeMediaModal
 * Hides the media modal and restores page scrolling.
 */
function closeMediaModal() {
  const modal = document.getElementById('mediaModal');
  if (!modal) return;
  modal.classList.remove('is-open');
  document.body.style.overflow = '';
}

// Close modal when clicking the dark overlay backdrop
document.addEventListener('DOMContentLoaded', () => {
  const memberModal = document.getElementById('memberModal');
  if (memberModal) {
    memberModal.addEventListener('click', (e) => {
      if (e.target === memberModal) closeMemberModal();
    });
  }

  const mediaModal = document.getElementById('mediaModal');
  if (mediaModal) {
    mediaModal.addEventListener('click', (e) => {
      if (e.target === mediaModal) closeMediaModal();
    });
  }

  // Close modals with Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      closeMemberModal();
      closeMediaModal();
    }
  });
});

/* ============================================================
   12. THEME MANAGEMENT
   Handles dark/light mode toggling and persistence.
   ============================================================ */

/**
 * initTheme
 * Checks localStorage for 'theme' and applies it.
 * If no theme is saved, checks system prefers-color-scheme.
 */
function initTheme() {
  const toggleBtn = document.getElementById('themeToggle');
  const savedTheme = localStorage.getItem('theme');
  const systemDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

  // 1. Determine which theme to use
  let theme = 'light';
  if (savedTheme) {
    theme = savedTheme;
  } else if (systemDark) {
    theme = 'dark';
  }

  // 2. Apply theme to body
  if (theme === 'dark') {
    document.body.classList.add('dark-mode');
  } else {
    document.body.classList.remove('dark-mode');
  }

  // 3. Setup click listener
  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      const isDark = document.body.classList.toggle('dark-mode');
      const newTheme = isDark ? 'dark' : 'light';
      localStorage.setItem('theme', newTheme);

      // Update aria-label for accessibility
      toggleBtn.setAttribute('aria-label', isDark ? 'Switch to Light Mode' : 'Switch to Dark Mode');
    });
  }

  // 4. Listen for system theme changes if no user preference is set
  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
    if (!localStorage.getItem('theme')) {
      if (e.matches) {
        document.body.classList.add('dark-mode');
      } else {
        document.body.classList.remove('dark-mode');
      }
    }
  });
}



