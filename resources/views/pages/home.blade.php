@extends('layouts.index')

@section('konten')
    <!-- ============================================================
                                   HERO SECTION
                                   Full-viewport visual splash with group name and tagline.
                                   ============================================================ -->
    <section class="hero" id="hero" aria-label="Hero Section">
        <!-- [HERO BG] Decorative background layer — gradient + pattern via CSS -->
        <div class="hero-bg" aria-hidden="true"></div>

        <!-- [HERO PETALS] Animated falling sakura petals (rendered by JS) -->
        <div class="hero-petals" id="heroPetals" aria-hidden="true"></div>

        <!-- [HERO CONTENT] Centered text overlay -->
        <div class="hero-content">
            <!-- [HERO EYEBROW] Small label above the main title -->
            <p class="hero-eyebrow">WELCOME</p>
            <!-- [HERO TITLE] Group name as the primary heading -->
            <h1 class="hero-title">
                <span class="hero-title-jp">タカネシア</span>
                <span class="hero-title-en">TAKANESIA</span>
            </h1>
            <!-- [HERO TAGLINE] Short descriptive phrase -->
            <p class="hero-tagline">Indonesian Fanbase of Takane no Nadeshiko</p>
            <!-- [HERO CTA] Call-to-action button linking to news -->
            <a href="about.html" class="btn btn--primary hero-cta">About Us</a>
        </div>

    </section>

    <!-- ============================================================
                                   MAIN CONTENT
                                   ============================================================ -->
    <main id="mainContent" role="main">

        <!-- ----------------------------------------------------------
                                     COMMUNITY NEWS
                                     Displays the 5 latest media items.
                                     ---------------------------------------------------------- -->
        <section class="section home-news-section is-visible" aria-label="MEDIA">
            <div class="home-news-header">
                <h2 class="home-news-title">
                    MEDIA
                </h2>
            </div>

            <!-- JS will inject the 5 newest media cards here -->
            <div class="home-news-grid" id="homeNewsGrid"></div>

            <!-- Centered Read More button -->
            <div class="home-news-footer">
                <a href="media.html" class="btn btn--primary home-news-btn">Read More</a>
            </div>
        </section>

    </main><!-- /#mainContent -->
    <!-- ============================================================
                                   MEDIA MODAL
                                   Shown when a media card is clicked.
                                   ============================================================ -->
    <div class="member-modal-overlay" id="mediaModal" role="dialog" aria-modal="true" aria-label="ニュース詳細">
        <!-- [MODAL CONTENT BOX] The white popup panel -->
        {{-- <div class="member-modal-box" id="mediaModalContent">
            <!-- Content is injected by openMediaModal() in main.js -->
        </div> --}}
    </div>
    <script>
        window.mediaData = @json($media);
        const mediaDetailUrl = "{{ url('/detail-media') }}";
    </script>
@endsection
