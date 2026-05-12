<!-- [PAGE HERO] Compact header for the about page -->
@extends('layouts.index')

@section('konten')
    <section class="page-hero">
        <div class="page-hero-content">
            <span class="page-hero-eyebrow">OFFICIAL WEBSITE</span>
            <h1 class="page-hero-title">ABOUT</h1>
            <p class="page-hero-sub">タカネシアについて</p>
        </div>
    </section>

    <!-- [ABOUT SECTION] Main content -->
    <section class="about-section section-padding">
        <div class="about-inner">
            <div class="about-body">
                <h2 class="about-heading" data-reveal data-reveal-delay="0">タカネシア</h2>

                <p data-reveal data-reveal-delay="1">
                    Takanesia adalah komunitas penggemar Takane no
                    Nadeshiko dengan skala nasional yang dibentuk dengan
                    semangat persatuan, dedikasi dan cinta tanpa batas dari
                    para fans di seluruh Indonesia.</br>
                    タカネシアは、高嶺のなでしこのインドネシア全国規模のファンコミュニ
                    ティであり、インドネシア各地のファンによる団結の精神、献身、そして限
                    りない愛を原動力として結成されました。
                </p>

                <p data-reveal data-reveal-delay="2">
                    Nama Takanesia lahir dari kombinasi dua elemen penting
                    yang mencerminkan identitas komunitas ini: "Takane" dari
                    Takane no Nadeshiko, dan "nesia", singkatan dari Indonesia,
                    tempat para penggemar ini berasal.</br>
                    タカネシア (Takanesia)」という名前は、このコミュニティのアイデンティテ
                    ィを象徴する2つの要素から生まれました。すなわち、「高嶺 (Takane)」は
                    高嶺のなでしこから、そして「ネシア (nesia)」はインドネシア (Indonesia)
                    を意味し、このファンたちが集う場所を表しています。
                </p>

                <p data-reveal data-reveal-delay="3">
                    Takanesia didirikan pada 27 November 2024 dan telah berkomitmen penuh untuk
                    mendukung perjalanan Takane no Nadeshiko serta menyatukan para penggemar
                    di seluruh Indonesia, dengan terfokus pada area Jabodetabek dan sekitarnya
                </p>

                <!-- [ABOUT IMAGE] Indonesia -->
                <div class="about-video-wrap" data-reveal data-reveal-delay="4">
                    <img class="about-video" src="img/indonesia.png" alt="Takanesia Indonesia" />
                </div>

                <p data-reveal data-reveal-delay="5">
                    タカネシアは2024年11月27日に設立され、高嶺のなでしこの活動を全力で
                    サポートし、ジャボデタベック地域とその周辺エリアを中心に、インドネシア全
                    土のファンを一つにすることに尽力しています
                </p>

                <!-- [ABOUT CTA] Link to member page -->
                <a href="member.html" class="btn btn--primary" data-reveal data-reveal-delay="7">View Member</a></br>
            </div>
        </div>
    </section>
@endsection
