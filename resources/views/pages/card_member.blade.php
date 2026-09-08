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
        <section class="member-section">
            <div class="member-container">

                <!-- =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 CANVAS
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ========================== -->
                <div class="canvas-area">
                    <canvas id="memberCanvas" width="1000" height="610">
                    </canvas>

                    <small class="canvas-info">
                        Geser foto untuk memindahkan posisi.
                    </small>
                </div>


                <!-- =========================
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 FORM
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ========================== -->
                <div class="form-area">

                    <form id="memberForm">

                        <!-- Nama -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" class="form-control" placeholder="Member">
                        </div>


                        <!-- Discord & Instagram -->
                        <div class="form-row">

                            <div class="form-group">
                                <label for="discord">Discord</label>
                                <input type="text" id="discord" class="form-control" placeholder="Kumapan">
                            </div>

                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" id="instagram" class="form-control" placeholder="Kumapan">
                            </div>

                        </div>


                        <!-- Facebook -->
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" id="facebook" class="form-control" placeholder="Kumapan">
                        </div>


                        <!-- Comment -->
                        <div class="form-group">

                            <label for="member">Pilih Oshimu</label>

                            <div class="slct-mmbr">

                                <!-- Tombol dropdown -->
                                <button type="button" class="slct-mmbr-toggle">
                                    <span class="slct-mmbr-placeholder">
                                        Pilih oshimu...
                                    </span>
                                    <span class="slct-mmbr-arrow">▼</span>
                                </button>

                                <!-- Dropdown -->
                                <div class="slct-mmbr-dropdown">

                                    <!-- Search -->
                                    <input type="text" id="comment" class="slct-mmbr-search"
                                        placeholder="Cari member...">

                                    <!-- Daftar member -->
                                    <div class="slct-mmbr-list">

                                        @foreach ($member as $item)
                                            <label class="slct-mmbr-item">
                                                <input type="checkbox" value="{{ $item->id }}"
                                                    data-name="{{ $item->nama }}" data-profil="{{ $item->profil }}">


                                                <span class="slct-mmbr-check"></span>

                                                <span class="slct-mmbr-name">
                                                    {{ $item->nama }}
                                                </span>
                                            </label>
                                        @endforeach

                                    </div>

                                </div>

                            </div>
                            {{-- <textarea id="comment" class="form-control" maxlength="320" rows="4"
                                placeholder="Tulis sesuatu tentang kamu..."></textarea>

                            <small class="counter">
                                <span id="counter">0</span> / 320 karakter
                            </small> --}}
                        </div>


                        <hr>


                        <!-- Warna -->
                        <div class="form-section">

                            <h5>2. Pilih warna</h5>

                            <div class="color-list">

                                <button type="button" class="color-option active" data-color="#59B7D8"
                                    style="background:#59B7D8">
                                </button>

                                <button type="button" class="color-option" data-color="#EF77A9" style="background:#EF77A9">
                                </button>

                                <button type="button" class="color-option" data-color="#F3D45B" style="background:#F3D45B">
                                </button>

                                <button type="button" class="color-option" data-color="#8FD46D" style="background:#8FD46D">
                                </button>

                                <button type="button" class="color-option" data-color="#858DD8" style="background:#858DD8">
                                </button>

                                <button type="button" class="color-option" data-color="#B57DDB" style="background:#B57DDB">
                                </button>

                            </div>

                        </div>


                        <hr>


                        <!-- Upload -->
                        <div class="form-section">

                            <h5>3. Unggah foto</h5>

                            <input type="file" id="foto" accept="image/*" hidden>

                            <button type="button" id="btnFoto" class="btn-foto">
                                Pilih Foto
                            </button>

                        </div>
                        <input type="hidden" name="unique_id" id="unique_id" value="{{ $uniqueId }}">

                        <div id="qrcode" style="display: none;">
                            {!! $qrCode !!}
                        </div>
                    </form>

                </div>

            </div>
        </section>

    </main>
    <script>
        const uniqueId = @json($uniqueId);

        const qrImage = new Image();

        qrImage.onload = function() {
            drawCanvas();
        };

        qrImage.src = "data:image/png;base64,{{ $qrCode }}";
    </script>
    <script>
        const memberSelect = document.querySelector('.slct-mmbr');
        const memberToggle = document.querySelector('.slct-mmbr-toggle');
        const memberPlaceholder = document.querySelector('.slct-mmbr-placeholder');
        const memberSearch = document.querySelector('.slct-mmbr-search');
        const memberItems = document.querySelectorAll('.slct-mmbr-item');
        const memberCheckboxes = document.querySelectorAll(
            '.slct-mmbr-item input[type="checkbox"]'
        );
        memberToggle.addEventListener('click', function(e) {

            e.stopPropagation();

            memberSelect.classList.toggle('open');

        });
        memberCheckboxes.forEach(checkbox => {

            checkbox.addEventListener('change', function() {

                updateMemberDisplay();

                drawCanvas();

            });

        });

        function updateMemberDisplay() {

            const selected = Array.from(memberCheckboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.dataset.name);

            if (selected.length === 0) {

                memberPlaceholder.textContent = 'Pilih member...';

            } else if (selected.length === 1) {

                memberPlaceholder.textContent = selected[0];

            } else {

                memberPlaceholder.textContent =
                    selected.length + ' member dipilih';

            }
        }
        memberSearch.addEventListener('input', function() {

            const keyword = this.value.toLowerCase();

            memberItems.forEach(item => {

                const name = item
                    .querySelector('.slct-mmbr-name')
                    .textContent
                    .toLowerCase();

                if (name.includes(keyword)) {

                    item.style.display = 'flex';

                } else {

                    item.style.display = 'none';

                }

            });

        });
        document.addEventListener('click', function(e) {

            if (!memberSelect.contains(e.target)) {

                memberSelect.classList.remove('open');

            }

        });

        // function getSelectedMembers() {

        //     return Array.from(memberCheckboxes)
        //         .filter(checkbox => checkbox.checked)
        //         .map(checkbox => ({
        //             id: checkbox.value,
        //             nama: checkbox.dataset.name,
        //             profil: checkbox.dataset.profil
        //         }));

        // }
        function getSelectedMembers() {

            const selected = Array.from(memberCheckboxes)
                .filter(checkbox => checkbox.checked);

            if (selected.length > 5) {
                alert('tidak boleh lebih dari 5 dasar karbit');

                // Batalkan checkbox yang baru saja dipilih
                selected[selected.length - 1].checked = false;

                return getSelectedMembers();
            }

            return selected.map(checkbox => ({
                id: checkbox.value,
                nama: checkbox.dataset.name,
                profil: checkbox.dataset.profil
            }));
        }
    </script>

    <script>
        const canvas = document.getElementById('memberCanvas');
        const ctx = canvas.getContext('2d');

        const template = new Image();

        template.src = "{{ asset('assets/img/kartu.png') }}";

        let selectedColor = '#59B7D8';

        let memberPhoto = null;

        let photoX = 105;
        let photoY = 125;

        let photoWidth = 255;
        let photoHeight = 240;


        // ==========================================
        // LOAD TEMPLATE
        // ==========================================

        template.onload = function() {

            drawCanvas();

        };

        function drawCanvas() {

            ctx.clearRect(
                0,
                0,
                canvas.width,
                canvas.height
            );

            // Template
            ctx.drawImage(
                template,
                0,
                0,
                canvas.width,
                canvas.height
            );

            // Foto
            if (memberPhoto) {
                drawPhoto();
            }

            // Nama
            const nama =
                document.getElementById('nama').value || 'Member';

            ctx.fillStyle = '#111';
            ctx.font = 'bold 44px Arial';

            ctx.fillText(
                nama,
                420,
                145
            );

            // Discord
            const discord =
                document.getElementById('discord').value || '-';

            drawSocial(
                'Discord',
                discord,
                420,
                165
            );

            // Instagram
            const instagram =
                document.getElementById('instagram').value || '-';

            drawSocial(
                'Instagram',
                instagram,
                420,
                215
            );

            // Facebook
            const facebook =
                document.getElementById('facebook').value || '-';

            drawSocial(
                'Facebook',
                facebook,
                420,
                265
            );

            // Comment
            const comment =
                document.getElementById('comment')?.value || '';

            drawComment(comment);
            // PROFIL MEMBER YANG DIPILIH
            drawMemberProfiles();

            // Oshi
            drawOshi();
        }

        function drawComment(comment) {

            const x = 400;
            const y = 360;
            const width = 512;
            const height = 160;

            // Background
            ctx.fillStyle = '#ffffffff';

            roundRect(
                ctx,
                x,
                y,
                width,
                height,
                15
            );

            ctx.fill();

            // Kalau comment kosong, tetap tampilkan kotaknya
            if (!comment) return;

            // Text
            ctx.fillStyle = '#ffffff';
            ctx.font = '20px Arial';

            const maxWidth = width - 40;
            const lineHeight = 28;

            const words = comment.split(' ');
            let line = '';
            let lines = [];

            words.forEach(word => {

                const testLine = line + word + ' ';
                const metrics = ctx.measureText(testLine);

                if (metrics.width > maxWidth) {
                    lines.push(line);
                    line = word + ' ';
                } else {
                    line = testLine;
                }

            });

            lines.push(line);

            lines.forEach((line, index) => {

                ctx.fillText(
                    line.trim(),
                    x + 20,
                    y + 35 + (index * lineHeight)
                );

            });
        }

        // ==========================================
        // DRAW CANVAS
        // ==========================================



        function drawSocial(label, value, x, y) {

            // Kotak label

            ctx.fillStyle = '#5D72A7';

            roundRect(
                ctx,
                x,
                y,
                115,
                45,
                10
            );

            ctx.fill();


            // Text label

            ctx.fillStyle = '#fff';

            ctx.font = 'bold 20px Arial';

            ctx.fillText(
                label,
                x + 20,
                y + 29
            );


            // Value

            ctx.fillStyle = '#5D72A7';

            ctx.font = 'bold 20px Arial';

            ctx.fillText(
                value,
                x + 140,
                y + 29
            );
        }

        function roundRect(ctx, x, y, width, height, radius) {

            ctx.beginPath();

            ctx.moveTo(x + radius, y);

            ctx.lineTo(x + width - radius, y);

            ctx.quadraticCurveTo(
                x + width,
                y,
                x + width,
                y + radius
            );

            ctx.lineTo(
                x + width,
                y + height - radius
            );

            ctx.quadraticCurveTo(
                x + width,
                y + height,
                x + width - radius,
                y + height
            );

            ctx.lineTo(
                x + radius,
                y + height
            );

            ctx.quadraticCurveTo(
                x,
                y + height,
                x,
                y + height - radius
            );

            ctx.lineTo(
                x,
                y + radius
            );

            ctx.quadraticCurveTo(
                x,
                y,
                x + radius,
                y
            );

            ctx.closePath();
        }

        function drawMemberProfiles() {

            const selectedMembers = getSelectedMembers();

            if (selectedMembers.length === 0) return;

            const startX = 420;
            const startY = 380;

            const photoWidth = 80;
            const photoHeight = 80;
            const gap = 20;

            selectedMembers.forEach((member, index) => {

                const img = new Image();

                img.onload = function() {

                    const x = startX + (index * (photoWidth + gap));
                    ctx.save();

                    // Rounded corner 15px
                    ctx.beginPath();
                    ctx.roundRect(
                        x,
                        startY,
                        photoWidth,
                        photoHeight,
                        15
                    );
                    ctx.clip();

                    ctx.drawImage(
                        img,
                        x,
                        startY,
                        photoWidth,
                        photoHeight
                    );

                    ctx.restore();

                };

                img.src = "{{ asset('') }}" + member.profil;
            });
        }

        function drawOshi() {

            const x = 226;
            const y = 400;

            const width = 135;
            const height = 130;

            // Background
            ctx.fillStyle = selectedColor;

            roundRect(
                ctx,
                x,
                y,
                width,
                height,
                10
            );

            ctx.fill();

            // QR CODE
            const qrSize = 90;

            const qrX = x + (width - qrSize) / 2;
            const qrY = y + 8;

            if (qrImage.complete) {

                ctx.drawImage(
                    qrImage,
                    qrX,
                    qrY,
                    qrSize,
                    qrSize
                );
            }

            // TEXT
            ctx.fillStyle = '#222';

            ctx.font = 'bold 20px Arial';

            ctx.textAlign = 'center';

            ctx.fillText(
                '',
                x + width / 2,
                y + 118
            );

            ctx.textAlign = 'left';
        }
        document.addEventListener('DOMContentLoaded', function() {
            generateQRCode();
        });
        const inputs = [
            'nama',
            'discord',
            'instagram',
            'facebook',
            'comment'
        ];

        inputs.forEach(id => {

            const element = document.getElementById(id);

            if (element) {
                element.addEventListener('input', function() {
                    drawCanvas();
                });
            }

        });
        //posisi hapus text area
        document
            .querySelectorAll('.color-option')
            .forEach(button => {

                button.addEventListener('click', function() {

                    selectedColor =
                        this.dataset.color;


                    document
                        .querySelectorAll('.color-option')
                        .forEach(btn => {

                            btn.classList.remove('active');

                        });


                    this.classList.add('active');


                    drawCanvas();

                });

            });
        document
            .getElementById('btnFoto')
            .addEventListener('click', function() {

                document
                    .getElementById('foto')
                    .click();

            });


        document
            .getElementById('foto')
            .addEventListener('change', function(e) {

                const file = e.target.files[0];

                if (!file) return;


                const reader = new FileReader();


                reader.onload = function(event) {

                    memberPhoto = new Image();

                    memberPhoto.onload = function() {

                        drawCanvas();

                    };

                    memberPhoto.src =
                        event.target.result;

                };


                reader.readAsDataURL(file);

            });
        let qrImage = null;

        function generateQRCode() {

            const uniqueId = crypto.randomUUID();

            document.getElementById('unique_id').value = uniqueId;

            const container = document.getElementById('qrcode');

            container.innerHTML = '';

            new QRCode(container, {
                text: uniqueId,
                width: 100,
                height: 100,
                correctLevel: QRCode.CorrectLevel.H
            });

            setTimeout(() => {

                const canvas = container.querySelector('canvas');

                if (canvas) {

                    qrImage = new Image();

                    qrImage.onload = function() {
                        drawCanvas();
                    };

                    qrImage.src = canvas.toDataURL('image/png');
                }

            }, 100);
        }

        function drawPhoto() {

            if (!memberPhoto) return;


            ctx.save();


            // Area foto

            ctx.beginPath();

            ctx.rect(
                105,
                125,
                255,
                245
            );

            ctx.clip();


            // Rasio gambar

            const ratio = Math.max(
                photoWidth / memberPhoto.width,
                photoHeight / memberPhoto.height
            );


            const width =
                memberPhoto.width * ratio;

            const height =
                memberPhoto.height * ratio;


            ctx.drawImage(
                memberPhoto,
                photoX,
                photoY,
                width,
                height
            );


            ctx.restore();

        }
        let dragging = false;

        let startX = 0;
        let startY = 0;


        canvas.addEventListener(
            'mousedown',
            function(e) {

                dragging = true;

                startX = e.offsetX;

                startY = e.offsetY;

            }
        );


        canvas.addEventListener(
            'mousemove',
            function(e) {

                if (!dragging) return;


                const dx =
                    e.offsetX - startX;

                const dy =
                    e.offsetY - startY;


                photoX += dx;

                photoY += dy;


                startX = e.offsetX;

                startY = e.offsetY;


                drawCanvas();

            }
        );


        canvas.addEventListener(
            'mouseup',
            function() {

                dragging = false;

            }
        );


        canvas.addEventListener(
            'mouseleave',
            function() {

                dragging = false;

            }
        );
        document
            .getElementById('btnSave')
            .addEventListener('click', function() {

                const image =
                    canvas.toDataURL('image/png');




            });
    </script>
@endsection
