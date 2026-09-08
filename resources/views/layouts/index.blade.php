<!DOCTYPE html>
<!-- [ROOT] HTML5 document declaration -->
<html lang="ja">
<!-- [HEAD] Document metadata -->

<head>
    <!-- [META] Character encoding — UTF-8 supports Japanese characters -->
    <meta charset="UTF-8" />
    <!-- [FAVICON] Browser tab icon � change href to your logo file path -->
    <link rel="icon" type="image/png" href="img/logo2.png" />
    <link rel="apple-touch-icon" href="img/logo2.png" />
    <!-- [META] Responsive viewport — scales correctly on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- [META] SEO description -->
    <meta name="description" content="Takanesia Website" />
    <!-- [TITLE] Browser tab title -->
    <title>【公式】タカネシア</title>
    <!-- [LINK] Google Fonts — Noto Sans JP for Japanese text, Playfair Display for decorative headings -->
    @include('includes.style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>

<!-- [BODY] Main document body -->

<body>

    <!-- ============================================================
       HEADER / NAVIGATION
       Sticky top bar with logo and main nav links.
       ============================================================ -->
    @include('includes.navbar')

    @yield('konten')
    <!-- ============================================================
       FOOTER
       Site-wide footer with links, social icons, and copyright.
       ============================================================ -->
    @include('includes.footer')
    <!-- [BACK TO TOP] Fixed button that appears after scrolling down -->
    <button class="back-to-top" id="backToTop" aria-label="ページトップへ戻る" hidden>
        &#8593;
    </button>
    <!-- [SCRIPT] Main JavaScript file — loaded at end of body for performance -->
    @include('includes.script')

</body>

</html>
