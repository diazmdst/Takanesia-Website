   @extends('layouts.backend')

   @section('konten')
       <div class="container-fluid">


           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Colour Setting</h6>
                   {{-- modal tambah --}}
                   <!-- Large modal -->
                   <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                       data-target=".bd-example-modal-lg">Tambah + </button>
                   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                       <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title">Modal title</h5>
                                   <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">
                                   <form id="formmember" enctype="multipart/form-data">
                                       @csrf

                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Nama</label>
                                           <input type="text" class="form-control" name="nama"
                                               id="exampleFormControlInput1" placeholder="masukkan nama member">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Nama Kanji</label>
                                           <input type="text" class="form-control" name="nama_kanji"
                                               id="exampleFormControlInput1" placeholder="masukkan nama member">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Sosmed X</label>
                                           <input type="text" class="form-control" name="sosmed_x"
                                               id="exampleFormControlInput1" placeholder="masukkan nama member">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Sosmed IG</label>
                                           <input type="text" class="form-control" name="sosmed_ig"
                                               id="exampleFormControlInput1" placeholder="masukkan nama member">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Sosmed Tiktok</label>
                                           <input type="text" class="form-control" name="sosmed_tiktok"
                                               id="exampleFormControlInput1" placeholder="masukkan nama member">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Position</label>
                                           <input type="text" class="form-control" name="position"
                                               id="exampleFormControlInput1" placeholder="masukkan position">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Blood Type</label>
                                           <input type="text" class="form-control" name="blood_type"
                                               id="exampleFormControlInput1" placeholder="masukkan blood_type">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Home Town</label>
                                           <input type="text" class="form-control" name="home_town"
                                               id="exampleFormControlInput1" placeholder="masukkan home_town">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Height</label>
                                           <input type="number" class="form-control" name="height"
                                               id="exampleFormControlInput1" placeholder="masukkan height">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">colour Member</label>
                                           <select id="id_kat_program" name = "color_setting_id" class="form-control">
                                               <option selected disabled riquired>Choose...</option>
                                               @foreach ($color_setting as $color)
                                                   <option value="{{ $color->id }}"
                                                       data-color="{{ $color->colour_code }}"
                                                       style="background-color: {{ $color->colour_code }};">
                                                       {{ $color->nama }} ({{ $color->colour_code }})
                                                   </option>
                                               @endforeach

                                           </select>
                                       </div>
                                       <div class="form-group">
                                           <label for="date_rilis">Birthday</label>

                                           <input type="date" class="form-control" id="birthday" name="birthday">
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="exampleFormControlInput1">Foto Profil</label>
                                           <div class="input-group ">
                                               <div class="input-group-prepend">
                                                   <span class="input-group-text">Upload</span>
                                               </div>
                                               <div class="custom-file">
                                                   <input name ="profil" type="file" class="custom-file-input">
                                                   <label class="custom-file-label">Choose file</label>
                                               </div>
                                           </div>
                                       </div>

                                       <div class="row">
                                           <div class="form-group col-md-6">
                                               <label>Detail Gambar</label>
                                               <div class="input-group mb-3">
                                                   <button type="button" class="btn btn-primary"
                                                       onclick="addInput()">Tambah
                                                       +</button>

                                               </div>
                                               <div id = "items-container"></div>
                                           </div>
                                       </div>
                                       <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary"
                                               data-dismiss="modal">Close</button>
                                           <button type="button" class="btn btn-primary" id="btnSavemember">Save
                                               changes</button>
                                       </div>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                   {{-- akhir modal tambah --}}
               </div>

               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Nama </th>
                                   <th>Foto</th>
                                   <th>Member Colour</th>
                                   <th>Aksi</th>

                               </tr>
                           </thead>

                           <tbody>
                               @foreach ($member as $key => $member)
                                   <tr>
                                       <td>{{ $key + 1 }}</td>
                                       <td>{{ $member->nama }} <span class="fw-bold">({{ $member->nama_kanji }})</span>
                                       </td>
                                       <td><img src="{{ $member->profil }}" alt=""
                                               style="width: 50%; height:300px; object-fit:cover;"></td>
                                       <td>{{ $member->rcolor?->nama }} <div
                                               style="
                                                    width: 20px;
                                                    height: 20px;
                                                    border-radius: 4px;
                                                    border: 1px solid #ccc;
                                                    background-color: {{ $member->rcolor->colour_code }};
                                                ">
                                           </div> <span>{{ $member->rcolor?->colour_code }} </span></td>
                                       <td>
                                           <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#Edit-{{ $member->id }}">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                   fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                   <path
                                                       d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                               </svg>
                                           </button>


                                           {{-- modal edit --}}
                                           <!-- Modal -->
                                           <div class="modal fade" id="Edit-{{ $member->id }}" data-backdrop="static"
                                               data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                               aria-hidden="true">
                                               <div class="modal-dialog modal-lg">
                                                   <div class="modal-content">
                                                       <div class="modal-header">
                                                           <h5 class="modal-title" id="staticBackdropLabel">Modal title
                                                           </h5>
                                                           <button type="button" class="close" data-dismiss="modal"
                                                               aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                           </button>
                                                       </div>
                                                       <div class="modal-body">
                                                           <form id="editformmember2" data-id="{{ $member->id }}"
                                                               enctype="multipart/form-data">
                                                               @csrf

                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Judul</label>
                                                                   <input type="text" class="form-control"
                                                                       name="nama" id="exampleFormControlInput1"
                                                                       placeholder="masukkan nama member"
                                                                       value="{{ $member->nama }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Nama Kanji</label>
                                                                   <input type="text" class="form-control"
                                                                       name="nama_kanji" id="exampleFormControlInput1"
                                                                       placeholder="masukkan nama member"
                                                                       value="{{ $member->nama_kanji }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Sosmed X</label>
                                                                   <input type="text" class="form-control"
                                                                       name="sosmed_x" id="exampleFormControlInput1"
                                                                       placeholder="masukkan nama member"
                                                                       value="{{ $member->sosmed_x }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Sosmed IG</label>
                                                                   <input type="text" class="form-control"
                                                                       name="sosmed_ig" id="exampleFormControlInput1"
                                                                       placeholder="masukkan nama member"
                                                                       value="{{ $member->sosmed_ig }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Sosmed
                                                                       Tiktok</label>
                                                                   <input type="text" class="form-control"
                                                                       name="sosmed_tiktok" id="exampleFormControlInput1"
                                                                       placeholder="masukkan nama member"
                                                                       value="{{ $member->sosmed_titok }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Position</label>
                                                                   <input type="text" class="form-control"
                                                                       name="position" id="exampleFormControlInput1"
                                                                       placeholder="masukkan position"
                                                                       value="{{ $member->position }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Blood Type</label>
                                                                   <input type="text" class="form-control"
                                                                       name="blood_type" id="exampleFormControlInput1"
                                                                       placeholder="masukkan blood_type"
                                                                       value="{{ $member->blood_type }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Home Town</label>
                                                                   <input type="text" class="form-control"
                                                                       name="home_town" id="exampleFormControlInput1"
                                                                       placeholder="masukkan home_town"
                                                                       value="{{ $member->home_town }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Height</label>
                                                                   <input type="number" class="form-control"
                                                                       name="height" id="exampleFormControlInput1"
                                                                       placeholder="masukkan height"
                                                                       value="{{ $member->height }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label
                                                                       for="exampleFormControlInput1">color_setting</label>
                                                                   <select id="id_kat_member" name = "color_setting_id"
                                                                       class="form-control">
                                                                       <option selected disabled riquired>Choose...</option>
                                                                       @foreach ($color_settings as $color_settingss)
                                                                           <option value="{{ $color_settingss->id }}"
                                                                               @selected($color_settingss->id == $member->color)
                                                                               data-color="{{ $color_settingss->colour_code }}"
                                                                               style="background-color: {{ $color_settingss->colour_code }};">
                                                                               {{ $color_settingss->nama }}
                                                                               ({{ $color_settingss->colour_code }})
                                                                           </option>
                                                                       @endforeach

                                                                   </select>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="birthday">Birthday</label>

                                                                   <input type="date" class="form-control"
                                                                       id="birthday" name="birthday"
                                                                       value="{{ old('birthday', $member->birthday ? \Carbon\Carbon::parse($member->birthday)->format('Y-m-d') : '') }}">
                                                               </div>
                                                               <div class="form-group col-md-6">
                                                                   <label for="exampleFormControlInput1">Foto
                                                                       Profil</label>
                                                                   <div class="input-group ">
                                                                       <div class="input-group-prepend">
                                                                           <span class="input-group-text">Upload</span>
                                                                       </div>
                                                                       <div class="custom-file">
                                                                           <input name ="profil" type="file"
                                                                               class="custom-file-input">
                                                                           <label class="custom-file-label">Choose
                                                                               file</label>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="form-group col-md-6">
                                                                   <img src="{{ $member->profil }}" alt=""
                                                                       style="
                                                                                                    width:100%;
                                                                                                    height:200px;
                                                                                                    object-fit:cover;
                                                                                                    border-radius:6px;
                                                                                                ">
                                                               </div>
                                                               <div class="col-md-6">
                                                                   <h4>Detail Gambar</h4>
                                                                   @if ($member->galeri_member->count())
                                                                       @foreach ($member->galeri_member as $picture)
                                                                           <div class="position-relative d-inline-block mr-2 mb-2"
                                                                               id="picture-{{ $picture->id }}">

                                                                               <img src="{{ asset('inputan/member/detailimg/' . $picture->foto) }}"
                                                                                   style="
                                                                                                    width:80px;
                                                                                                    height:80px;
                                                                                                    object-fit:cover;
                                                                                                    border-radius:6px;
                                                                                                ">

                                                                               <button type="button"
                                                                                   class="btn btn-danger btn-sm position-absolute"
                                                                                   style="top:2px; right:2px; padding:2px 6px;"
                                                                                   onclick="deletePicture({{ $picture->id }})">
                                                                                   ×
                                                                               </button>

                                                                           </div>
                                                                       @endforeach
                                                                   @else
                                                                       <p>Gambar Kosong</p>
                                                                   @endif
                                                               </div>
                                                               <div class="row">
                                                                   <div class="form-group col-md-6">
                                                                       <label>Detail Gambar</label>
                                                                       <div class="input-group mb-3">
                                                                           <button type="button" class="btn btn-primary"
                                                                               onclick="addInput2({{ $member->id }})">Tambah
                                                                               +</button>

                                                                       </div>
                                                                       <div id = "items-container2-{{ $member->id }}">
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="modal-footer">
                                                                   <button type="button" class="btn btn-secondary"
                                                                       data-dismiss="modal">Close</button>
                                                                   <button type="submit" class="btn btn-primary"
                                                                       id="btnSavemember">Save
                                                                       changes</button>
                                                               </div>
                                                           </form>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           {{-- akhir modal edit --}}

                                           <form action="{{ route('Member.destroy', $member->id) }}" method="POST"
                                               class="form-delete-member">
                                               @csrf
                                               @method('DELETE')
                                               <button type="submit" class="btn btn-danger btn-submit-delete">
                                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                       fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                       <path
                                                           d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                   </svg>
                                               </button>
                                           </form>
                                       </td>
                                   </tr>
                               @endforeach

                           </tbody>
                       </table>
                   </div>
               </div>
           </div>

       </div>
       <!-- /.container-fluid -->

       </div>
       </div>

       <!-- End of Main Content -->
       <script>
           // colour___code
           $('#colour_code').on('input', function() {
               $('#colour_code_text').val($(this).val());
           });
           // Update label filename
           document.addEventListener('change', function(e) {
               if (e.target.classList.contains('custom-file-input')) {
                   e.target.nextElementSibling.innerText = e.target.files[0].name;
               }
           });

           $('#btnSavemember').on('click', function() {
               let form = document.getElementById('formmember');
               let formData = new FormData(form);
               let editorId = 'deskripsi';


               $.ajax({
                   url: "{{ route('Tambah_Member') }}",
                   type: "POST",
                   data: formData,
                   processData: false,
                   contentType: false,

                   beforeSend: function() {
                       $('#btnSavemember')
                           .prop('disabled', true)
                           .text('Menyimpan...');
                   },

                   success: function(res) {
                       Swal.fire({
                           icon: 'success',
                           title: 'Berhasil',
                           text: 'member berhasil ditambahkan',
                           timer: 2000,
                           showConfirmButton: false
                       }).then(() => {
                           location.reload();
                       });
                   },

                   error: function(xhr) {
                       let pesan = 'Terjadi kesalahan';

                       if (xhr.status === 422) {
                           let errors = xhr.responseJSON.errors;
                           pesan = '';
                           for (let key in errors) {
                               pesan += `• ${errors[key][0]}<br>`;
                           }
                       }

                       Swal.fire({
                           icon: 'error',
                           title: 'Gagal',
                           html: pesan
                       });
                   },

                   complete: function() {
                       $('#btnSavemember')
                           .prop('disabled', false)
                           .text('Simpan member');
                   }
               });
           });

           $(document).on('submit', '#editformmember2', function(e) {
               e.preventDefault();

               let form = $(this);
               let id = form.data('id');
               let formData = new FormData(this);
               let editorId = 'deskripsi2-' + id;

               $.ajax({
                   url: "{{ url('/edit_member') }}/" + id,
                   type: "POST",
                   data: formData,
                   processData: false,
                   contentType: false,
                   success: function(response) {
                       Swal.fire('Sukses', response.message, 'success');
                       $('#Edit-' + id).modal('hide');
                       location.reload();
                   },
                   error: function(xhr) {
                       Swal.fire('Error', 'Terjadi kesalahan', 'error');
                   }
               });
           });

           $(document).on('submit', '.form-delete-member', function(e) {
               e.preventDefault();

               let form = $(this);
               let url = form.attr('action');

               console.log('DELETE URL:', url);

               Swal.fire({
                   title: 'Yakin?',
                   text: 'Data akan dihapus permanen!',
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonText: 'Ya, hapus',
                   cancelButtonText: 'Batal'
               }).then((result) => {
                   if (result.isConfirmed) {

                       $.ajax({
                           url: url,
                           type: 'POST',
                           data: form.serialize(), // sudah ada _method=DELETE + _token
                           success: function(response) {
                               Swal.fire('Terhapus!', response.message, 'success')
                                   .then(() => location.reload());
                           },
                           error: function(xhr) {
                               console.log(xhr.responseText);
                               Swal.fire('Error', 'Gagal menghapus data', 'error');
                           }
                       });

                   }
               });
           });

           //  addinput()
           function addInput() {
               let uniqueId = Date.now();

               let html = `
        <div class="input-group mb-3" id="item-${uniqueId}">
            <div class="input-group-prepend">
                <span class="input-group-text">Upload</span>
            </div>

            <div class="custom-file">
                <input type="file" 
                       name="files[]" 
                       class="custom-file-input" 
                       id="file-${uniqueId}">
                <label class="custom-file-label" for="file-${uniqueId}">
                    Choose file
                </label>
            </div>
      
            <div class="input-group-append">
                <button type="button" 
                        class="btn btn-danger"
                        onclick="removeInput('${uniqueId}')">
                    Hapus
                </button>
            </div>
        </div>
        `;

               document.getElementById('items-container').insertAdjacentHTML('beforeend', html);
           }

           document.addEventListener('change', function(e) {
               if (e.target.classList.contains('custom-file-input')) {
                   e.target.nextElementSibling.innerText = e.target.files[0].name;
               }
           });

           function removeInput(id) {
               document.getElementById(`item-${id}`).remove();
           }

           // changedetailimage
           function addInput2(id) {
               let uniqueIds = Date.now();

               let html = `
    <div class="input-group mb-3" id="item-${uniqueIds}">
        <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
        </div>

        <div class="custom-file">
            <input type="file" 
                   name="files[]" 
                   class="custom-file-input" 
                   id="file-${uniqueIds}">
            <label class="custom-file-label" for="file-${uniqueIds}">
                Choose file
            </label>
        </div>

        <div class="input-group-append">
            <button type="button" 
                    class="btn btn-danger"
                    onclick="removeInput('${uniqueIds}')">
                Hapus
            </button>
        </div>
    </div>
    `;

               document.getElementById(`items-container2-${id}`)
                   .insertAdjacentHTML('beforeend', html);
           }

           document.addEventListener('change', function(e) {
               if (e.target.classList.contains('custom-file-input')) {
                   e.target.nextElementSibling.innerText = e.target.files[0].name;
               }
           });

           function removeInput(id) {
               document.getElementById(`item-${id}`).remove();
           }

           deletepicture

           function deletePicture(id) {
               if (!confirm('Hapus gambar ini?')) return;

               fetch(`/member/detail-picture/${id}`, {
                       method: 'DELETE',
                       headers: {
                           'X-CSRF-TOKEN': '{{ csrf_token() }}',
                           'Accept': 'application/json'
                       }
                   })
                   .then(response => response.json())
                   .then(data => {
                       if (data.success) {
                           document.getElementById('picture-' + id).remove();

                           Swal.fire({
                               icon: 'success',
                               title: 'Berhasil',
                               text: 'Gambar berhasil dihapus',
                               timer: 1500,
                               showConfirmButton: false
                           });
                       } else {
                           alert('Gagal menghapus gambar');
                       }
                   })

                   .catch(error => {
                       console.error(error);
                       alert('Terjadi kesalahan');
                   });
           }

           // edit
           //    $(document).on('submit', '.editformmember2', function(e) {
           //        e.preventDefault();

           //        let form = $(this);
           //        let id = form.data('id');
           //        let formData = new FormData(this);
           //        console.log('form'.form);
           //        $.ajax({
           //            url: "{{ url('/edit_member') }}/" + id,
           //            type: "POST",
           //            data: formData,
           //            processData: false,
           //            contentType: false,
           //            success: function(response) {
           //                Swal.fire('Sukses', response.message, 'success');
           //                $('#Edit-' + id).modal('hide');
           //                location.reload();
           //            },
           //            error: function(xhr) {
           //                Swal.fire('Error', 'Terjadi kesalahan', 'error');
           //            }
           //        });
           //    });

           // editgaleri
           //    $(document).on('submit', '.editfotoitem2', function(e) {
           //        e.preventDefault();

           //        let form = $(this);
           //        let id = form.data('id');
           //        let formData = new FormData(this);

           //        $.ajax({
           //            url: "{{ url('/edit_foto_item') }}/" + id,
           //            type: "POST",
           //            data: formData,
           //            processData: false,
           //            contentType: false,
           //            success: function(response) {
           //                Swal.fire('Sukses', response.message, 'success');
           //                $('#Edit-' + id).modal('hide');
           //                location.reload();
           //            },
           //            error: function(xhr) {
           //                Swal.fire('Error', 'Terjadi kesalahan', 'error');
           //            }
           //        });
           //    });
       </script>
   @endsection
