    <!-- [PAGE HERO] Compact header for the about page -->
    @extends('layouts.index')

    @section('konten')
        <section class="page-hero">
            <div class="page-hero-content">

                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <span class="breadcrumb-separator">/</span>

                    <a href="{{ route('HalamanMedia') }}">Media</a>
                    <span class="breadcrumb-separator">/</span>

                    <span class="breadcrumb-current">{{ $media->judul }}</span>
                </nav>

                <h1 class="">{{ $media->judul }}</h1>

            </div>
        </section>

        <!-- [ABOUT SECTION] Main content -->
        <section class="about-section section-padding">
            <div class="about-inner">
                <div class="about-body">

                    <div class="about-video-wrap mt-5" style="margin-top:50px;" data-reveal data-reveal-delay="4">
                        <img class="about-video" src="{{ asset($media->thumbnail) }}" alt="{{ $media->judul }}" />
                    </div>
                    <p data-reveal data-reveal-delay="1">
                        {!! $media->deskripsi !!}
                    </p>
                    <!-- [ABOUT IMAGE] Indonesia -->

                    <!-- [ABOUT CTA] Link to member page -->

                </div>

            </div>

        </section>
        <section class="galeri">
            <div class="container">
                <div class="gallery-grid">
                    @foreach ($media->galeri as $picture)
                        <div class="gallery-item">
                            <img src="{{ asset('inputan/media/detailimg/' . $picture->foto) }}" class="gallery-image"
                                loading="lazy" data-id="{{ $picture->id }}"
                                data-full="{{ asset('inputan/media/detailimg/' . $picture->foto) }}">

                        </div>
                    @endforeach
                </div>
            </div>
            <div id="galleryLightbox" class="gallery-lightbox">
                <span class="gallery-lightbox-close">&times;</span>

                <button type="button" class="lightbox-nav lightbox-prev">
                    ❮
                </button>

                <img id="galleryLightboxImage" src="" alt="">

                <button type="button" class="lightbox-nav lightbox-next">
                    ❯
                </button>
            </div>


        </section>
        <style>
            /* =====================
                                                                            GALLERY GRID
                                                                            ===================== */

            .gallery-item {
                width: 100%;

            }

            .gallery-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
                gap: 12px;
                margin-top: 50px;
                margin-bottom: 50px;
            }

            .gallery-image {
                width: 100%;
                height: 120px;
                object-fit: cover;
                border-radius: 10px;
            }

            .gallery-image:hover {
                transform: scale(1.05);
                box-shadow: 0 8px 20px rgba(0, 0, 0, .15);
            }

            /* =====================
                                                                            LIGHTBOX
                                                                            ===================== */

            .gallery-lightbox {
                display: none;
                position: fixed;
                inset: 0;
                z-index: 99999;
                background: rgba(0, 0, 0, .92);
                justify-content: center;
                align-items: center;
                padding: 20px;
            }

            .gallery-lightbox.active {
                display: flex;
            }

            .gallery-lightbox img {
                max-width: 95%;
                max-height: 90vh;
                object-fit: contain;
                animation: zoomIn .25s ease;
            }

            .gallery-lightbox-close {
                position: absolute;
                top: 20px;
                right: 30px;
                color: #fff;
                font-size: 42px;
                cursor: pointer;
                line-height: 1;
            }

            /* =====================
                                                                            LIGHTBOX NAVIGATION
                                                                            ===================== */

            .lightbox-nav {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 52px;
                height: 52px;
                border: none;
                border-radius: 50%;
                background: rgba(255, 255, 255, .15);
                color: #fff;
                cursor: pointer;
                font-size: 24px;
            }

            .lightbox-prev {
                left: 20px;
            }

            .lightbox-next {
                right: 20px;
            }

            /* =====================
                                                                            ANIMATION
                                                                            ===================== */

            @keyframes zoomIn {
                from {
                    opacity: 0;
                    transform: scale(.9);
                }

                to {
                    opacity: 1;
                    transform: scale(1);
                }
            }

            /* =====================
                                                                            MOBILE
                                                                            ===================== */

            @media (max-width: 768px) {

                .gallery-image {
                    height: 100px;
                }

                .lightbox-prev {
                    left: 10px;
                }

                .lightbox-next {
                    right: 10px;
                }

                .lightbox-nav {
                    width: 42px;
                    height: 42px;
                    font-size: 20px;
                }

                .gallery-lightbox-close {
                    font-size: 32px;
                    right: 20px;
                }
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', () => {

                const track = document.querySelector('.gallery-track');

                if (track) {

                    document.querySelector('.gallery-prev')
                        ?.addEventListener('click', () => {

                            track.scrollBy({
                                left: -350,
                                behavior: 'smooth'
                            });

                        });

                    document.querySelector('.gallery-next')
                        ?.addEventListener('click', () => {

                            track.scrollBy({
                                left: 350,
                                behavior: 'smooth'
                            });

                        });
                }

                const lightbox = document.getElementById('galleryLightbox');
                const lightboxImage = document.getElementById('galleryLightboxImage');

                const images = [
                    ...document.querySelectorAll('.gallery-image')
                ];

                let currentIndex = 0;

                function showImage(index) {

                    currentIndex = index;

                    lightboxImage.src =
                        images[currentIndex].dataset.full;

                    lightbox.classList.add('active');
                }

                images.forEach((img, index) => {

                    img.addEventListener('click', () => {

                        console.log('ID:', img.dataset.id);

                        showImage(index);

                    });

                });

                document.querySelector('.gallery-lightbox-close')
                    ?.addEventListener('click', () => {

                        lightbox.classList.remove('active');

                    });

                lightbox?.addEventListener('click', (e) => {

                    if (e.target === lightbox) {
                        lightbox.classList.remove('active');
                    }

                });

                document.querySelector('.lightbox-next')
                    ?.addEventListener('click', (e) => {

                        e.stopPropagation();

                        currentIndex =
                            (currentIndex + 1) % images.length;

                        showImage(currentIndex);

                    });

                document.querySelector('.lightbox-prev')
                    ?.addEventListener('click', (e) => {

                        e.stopPropagation();

                        currentIndex =
                            (currentIndex - 1 + images.length) %
                            images.length;

                        showImage(currentIndex);

                    });

                document.addEventListener('keydown', (e) => {

                    if (!lightbox?.classList.contains('active')) {
                        return;
                    }

                    if (e.key === 'Escape') {
                        lightbox.classList.remove('active');
                    }

                    if (e.key === 'ArrowRight') {

                        currentIndex =
                            (currentIndex + 1) % images.length;

                        showImage(currentIndex);
                    }

                    if (e.key === 'ArrowLeft') {

                        currentIndex =
                            (currentIndex - 1 + images.length) %
                            images.length;

                        showImage(currentIndex);
                    }

                });

            });
        </script>
    @endsection
