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
                                   <form id="formmedia" enctype="multipart/form-data">
                                       @csrf

                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Judul</label>
                                           <input type="text" class="form-control" name="judul"
                                               id="exampleFormControlInput1" placeholder="masukkan nama media">
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Deskripsi</label>
                                           <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="masukkan Tulisan"></textarea>
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Kategori</label>
                                           <select id="id_kat_program" name = "kategori_id" class="form-control">
                                               <option selected disabled riquired>Choose...</option>
                                               @foreach ($kategori as $kategori)
                                                   <option value=" {{ $kategori->id }}">
                                                       {{ $kategori->kategori }} </option>
                                               @endforeach

                                           </select>
                                       </div>
                                       <div class="form-group">
                                           <label>Link Postingan</label>

                                           <textarea class="form-control" name="link" placeholder="masukkan  URL Postingan"></textarea>
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="exampleFormControlInput1">Thumbnail</label>
                                           <div class="input-group ">
                                               <div class="input-group-prepend">
                                                   <span class="input-group-text">Upload</span>
                                               </div>
                                               <div class="custom-file">
                                                   <input name ="thumbnail" type="file" class="custom-file-input">
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
                                           <button type="button" class="btn btn-primary" id="btnSavemedia">Save
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
                                   <th>Judul</th>
                                   <th>Time</th>
                                   <th>Kategori</th>
                                   <th>Aksi</th>

                               </tr>
                           </thead>

                           <tbody>
                               @foreach ($media as $key => $media)
                                   <tr>
                                       <td>{{ $key + 1 }}</td>
                                       <td>{{ $media->judul }}</td>
                                       <td>{{ $media->created_at }}</td>
                                       <td>{{ $media->rkategori?->kategori }}</td>
                                       <td>
                                           <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#Edit-{{ $media->id }}">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                   fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                   <path
                                                       d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                               </svg>
                                           </button>


                                           {{-- modal edit --}}
                                           <!-- Modal -->
                                           <div class="modal fade" id="Edit-{{ $media->id }}" data-backdrop="static"
                                               data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                               aria-hidden="true">
                                               <div class="modal-dialog modal-lg">
                                                   <div class="modal-content">
                                                       <div class="modal-header">
                                                           <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                                           <button type="button" class="close" data-dismiss="modal"
                                                               aria-label="Close">
                                                               <span aria-hidden="true">&times;</span>
                                                           </button>
                                                       </div>
                                                       <div class="modal-body">
                                                           <form id="editformmedia2" data-id="{{ $media->id }}"
                                                               enctype="multipart/form-data">
                                                               @csrf

                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Judul</label>
                                                                   <input type="text" class="form-control"
                                                                       name="judul" id="exampleFormControlInput1"
                                                                       placeholder="masukkan nama media"
                                                                       value="{{ $media->judul }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Deskripsi</label>
                                                                   <textarea class="form-control editor" id="deskripsi2-{{ $media->id }}" name="deskripsi"
                                                                       placeholder="masukkan Tulisan">{!! $media->deskripsi !!}</textarea>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Kategori</label>
                                                                   <select id="id_kat_media" name = "kategori_id"
                                                                       class="form-control">
                                                                       <option selected disabled riquired>Choose...</option>
                                                                       @foreach ($kategoris as $kategoriss)
                                                                           <option value=" {{ $kategoriss->id }}"
                                                                               @selected($kategoriss->id == $media->kategori)>
                                                                               {{ $kategoriss->kategori }} </option>
                                                                       @endforeach

                                                                   </select>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label>Link Postingan</label>

                                                                   <textarea class="form-control" name="link" placeholder="masukkan  URL Postingan">{{ $media->link }}</textarea>
                                                               </div>
                                                               <div class="form-group col-md-6">
                                                                   <label for="exampleFormControlInput1">Thumbnail</label>
                                                                   <div class="input-group ">
                                                                       <div class="input-group-prepend">
                                                                           <span class="input-group-text">Upload</span>
                                                                       </div>
                                                                       <div class="custom-file">
                                                                           <input name ="thumbnail" type="file"
                                                                               class="custom-file-input">
                                                                           <label class="custom-file-label">Choose
                                                                               file</label>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="form-group col-md-6">
                                                                   <img src="{{ $media->thumbnail }}" alt=""
                                                                       style="
                                                                                                    width:100%;
                                                                                                    height:200px;
                                                                                                    object-fit:cover;
                                                                                                    border-radius:6px;
                                                                                                ">
                                                               </div>
                                                               <div class="col-md-6">
                                                                   <h4>Detail Gambar</h4>
                                                                   @if ($media->galeri->count())
                                                                       @foreach ($media->galeri as $picture)
                                                                           <div class="position-relative d-inline-block mr-2 mb-2"
                                                                               id="picture-{{ $picture->id }}">

                                                                               <img src=”｛｛ asset（’inputan/media/detailimg/’
                                                                                   . ＄picture→f"
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
                                                                               onclick="addInput2({{ $media->id }})">Tambah
                                                                               +</button>

                                                                       </div>
                                                                       <div id = "items-container2-{{ $media->id }}">
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="modal-footer">
                                                                   <button type="button" class="btn btn-secondary"
                                                                       data-dismiss="modal">Close</button>
                                                                   <button type="submit" class="btn btn-primary"
                                                                       id="btnSavemedia">Save
                                                                       changes</button>
                                                               </div>
                                                           </form>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           {{-- akhir modal edit --}}

                                           <form action="{{ route('Media.destroy', $media->id) }}" method="POST"
                                               class="form-delete-media">
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
           document.addEventListener("DOMContentLoaded", function() {
               CKEDITOR.replace('deskripsi');
           });
           $('#btnSavemedia').on('click', function() {
               let form = document.getElementById('formmedia');
               let formData = new FormData(form);
               let editorId = 'deskripsi';
               if (CKEDITOR.instances[editorId]) {
                   formData.set('deskripsi', CKEDITOR.instances[editorId].getData());
               }

               $.ajax({
                   url: "{{ route('Tambah_Media') }}",
                   type: "POST",
                   data: formData,
                   processData: false,
                   contentType: false,

                   beforeSend: function() {
                       $('#btnSavemedia')
                           .prop('disabled', true)
                           .text('Menyimpan...');
                   },

                   success: function(res) {
                       Swal.fire({
                           icon: 'success',
                           title: 'Berhasil',
                           text: 'media berhasil ditambahkan',
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
                       $('#btnSavemedia')
                           .prop('disabled', false)
                           .text('Simpan media');
                   }
               });
           });
           //deskripsi2
           document.addEventListener("DOMContentLoaded", function() {

               document.querySelectorAll('.editor').forEach(function(el) {

                   CKEDITOR.replace(el.id);

               });

           });
           //    document.addEventListener("DOMContentLoaded", function() {
           //        CKEDITOR.replace('deskripsi2-{{ $media->id }}');
           //    });
           $(document).on('submit', '#editformmedia2', function(e) {
               e.preventDefault();

               let form = $(this);
               let id = form.data('id');
               let formData = new FormData(this);
               let editorId = 'deskripsi2-' + id;

               $.ajax({
                   url: "{{ url('/edit_media') }}/" + id,
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

           $(document).on('submit', '.form-delete-media', function(e) {
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

               fetch(`/item/detail-picture/${id}`, {
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
           //    $(document).on('submit', '.editformmedia2', function(e) {
           //        e.preventDefault();

           //        let form = $(this);
           //        let id = form.data('id');
           //        let formData = new FormData(this);
           //        console.log('form'.form);
           //        $.ajax({
           //            url: "{{ url('/edit_media') }}/" + id,
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
