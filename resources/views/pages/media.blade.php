@extends('layouts.index')

@section('konten')
    <main>
        <!-- [PAGE HERO] Compact header for the media page -->
        <section class="page-hero">
            <div class="page-hero-content">
                <span class="page-hero-eyebrow">OFFICIAL WEBSITE</span>
                <h1 class="page-hero-title">MEDIA</h1>
                <p class="page-hero-sub">メディア</p>
            </div>
        </section>

        <!-- [MEDIA SECTION] News and updates -->
        <section class="media-section section-padding">
            <div class="container">
                <!-- [MEDIA TABS] Filter items by category -->
                <div class="media-tabs" role="tablist" aria-label="メディアカテゴリー">
                    <button class="media-tab media-tab--active" role="tab" aria-selected="true"
                        data-category="all">ALL</button>
                    <button class="media-tab" role="tab" aria-selected="false" data-category="news">NEWS</button>
                    <button class="media-tab" role="tab" aria-selected="false"
                        data-category="funfacts">FUNFACTS</button>
                    <button class="media-tab" role="tab" aria-selected="false"
                        data-category="memories">MEMORIES</button>
                </div>

                <!-- [MEDIA GRID] Container for news cards -->
                <div class="media-grid" id="mediaGrid">
                    <!-- Content is injected by renderMedia() in main.js -->
                </div>

                <!-- [MEDIA MORE] Optional load more button -->
                <div class="media-more">
                    <button class="btn btn--primary" id="loadMoreMedia">Read More</button>
                </div>
                </br>
            </div>
        </section>


    </main>
@endsection
