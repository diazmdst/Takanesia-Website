@extends('layouts.index')

@section('konten')
    <div class="page-hero">
        <div class="page-hero-content">
            <p class="page-hero-eyebrow">OFFICIAL WEBSITE</p>
            <h1 class="page-hero-title">DISCOGRAPHY</h1>
            <p class="page-hero-sub">ディスコグラフィ</p>
        </div>
    </div>

    <main id="mainContent" role="main">
        <section class="section disco-section" id="discography">
            <div class="disco-grid" id="discoTrack">
                <!-- Discography will be rendered here by main.js -->
            </div>
            <div class="disco-pagination" id="discoPagination">
                <!-- Pagination will be rendered here by main.js -->
            </div>
        </section>
    </main>
    <script>
        const discoData = @json($disco);
        const discoDetailUrl = "{{ url('/detail-disco') }}";
    </script>
@endsection
