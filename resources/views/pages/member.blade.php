@extends('layouts.index')
@section('konten')
    <div class="page-hero">
        <div class="page-hero-content">
            <p class="page-hero-eyebrow">OFFICIAL WEBSITE</p>
            <h1 class="page-hero-title">MEMBER</h1>
            <p class="page-hero-sub">メンバー</p>
        </div>
    </div>

    <main id="mainContent" role="main">
        <section class="section member-section">
            <div class="member-grid" id="memberGrid">
                <!-- Members will be rendered here by main.js -->
            </div>
        </section>

        <!-- ============================================================
             MEMBER MODAL
             Shown when a member card is clicked.
             ============================================================ -->
        <div class="member-modal-overlay" id="memberModal" role="dialog" aria-modal="true" aria-label="Member Details">
            <!-- [MODAL CONTENT BOX] The white popup panel -->
            <div class="member-modal-box" id="memberModalContent">
                <!-- Content is injected by openMemberModal() in main.js -->
            </div>
        </div>
    </main>
@endsection
