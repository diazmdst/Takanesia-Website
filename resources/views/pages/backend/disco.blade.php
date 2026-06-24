   @extends('layouts.backend')

   @section('konten')
       <div class="container-fluid">


           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">Kategori Discography</h6>
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
                                   <form id="formdisco" enctype="multipart/form-data">
                                       @csrf
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Kategori</label>
                                           <select id="id_kat_program" name = "kategori_disco" class="form-control">
                                               <option selected disabled riquired>Choose...</option>
                                               @foreach ($kat_disco as $kategori)
                                                   <option value=" {{ $kategori->id }}">
                                                       {{ $kategori->kategori }} </option>
                                               @endforeach

                                           </select>
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Judul</label>
                                           <input type="text" class="form-control" name="judul"
                                               id="exampleFormControlInput1" placeholder="masukkan judul Lagu">
                                       </div>
                                       <div class="form-group">
                                           <label for="date_rilis">Tanggal Rilis</label>

                                           <input type="date" class="form-control" id="date_rilis" name="date_rilis">
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="exampleFormControlInput1">Foto</label>
                                           <div class="input-group ">
                                               <div class="input-group-prepend">
                                                   <span class="input-group-text">Upload</span>
                                               </div>
                                               <div class="custom-file">
                                                   <input name ="foto" type="file" class="custom-file-input">
                                                   <label class="custom-file-label">Choose file</label>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Link Embed Spotify</label>


                                           <textarea class="form-control" name="link_embed_spotify" placeholder="masukkan embed spotify"></textarea>

                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Lirik</label>
                                           <textarea class="form-control" id="lirik" name="lirik" placeholder="masukkan Tulisan"></textarea>
                                       </div>
                                       <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary"
                                               data-dismiss="modal">Close</button>
                                           <button type="button" class="btn btn-primary" id="btnSavedisco">Save
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
                                   <th>Kategori</th>
                                   <th>Judul</th>
                                   <th>Foto</th>
                                   <th>Tanggal Rilis</th>
                                   <th>Aksi</th>

                               </tr>
                           </thead>

                           <tbody>
                               @foreach ($discos as $key => $disco)
                                   <tr>
                                       <td>{{ $key + 1 }}</td>
                                       <td>{{ $disco->rkategori_disco->kategori }}</td>
                                       <td>{{ $disco->judul }}
                                           {!! $disco->link_embed_spotify !!}
                                       </td>
                                       <td><img src="{{ asset($disco->foto) }}" alt=""
                                               style="width: 100%; height:300px; object-fit:cover;"></td>
                                       <td>{{ $disco->date_rilis }}</td>
                                       <td>
                                           <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#Edit-{{ $disco->id }}">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                   fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                   <path
                                                       d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                               </svg>
                                           </button>


                                           {{-- modal edit --}}
                                           <!-- Modal -->
                                           <div class="modal fade" id="Edit-{{ $disco->id }}" data-backdrop="static"
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
                                                       <form class="editformdisco" data-id="{{ $disco->id }}"
                                                           enctype="multipart/form-data">
                                                           @csrf
                                                           <div class="modal-body">
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Kategori</label>
                                                                   <select id="id_kat_program" name = "kategori_disco"
                                                                       class="form-control">
                                                                       <option selected disabled riquired>Choose...</option>
                                                                       @foreach ($kat_discos as $kategoriss)
                                                                           <option value=" {{ $kategoriss->id }}"
                                                                               @selected($kategoriss->id == $disco->kategori_disco)>
                                                                               {{ $kategoriss->kategori }} </option>
                                                                       @endforeach

                                                                   </select>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Judul</label>
                                                                   <input type="text" class="form-control"
                                                                       name="judul" id="exampleFormControlInput1"
                                                                       placeholder="masukkan judul Lagu"
                                                                       value="{{ $disco->judul }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="date_rilis">Tanggal Rilis</label>

                                                                   <input type="date" class="form-control"
                                                                       id="date_rilis" name="date_rilis"
                                                                       value="{{ old('date_rilis', $disco->date_rilis ? \Carbon\Carbon::parse($disco->date_rilis)->format('Y-m-d') : '') }}">
                                                               </div>
                                                               <div class="form-group col-md-6">
                                                                   <label for="exampleFormControlInput1">Foto</label>
                                                                   <div class="input-group ">
                                                                       <div class="input-group-prepend">
                                                                           <span class="input-group-text">Upload</span>
                                                                       </div>
                                                                       <div class="custom-file">
                                                                           <input name ="foto" type="file"
                                                                               class="custom-file-input">
                                                                           <label class="custom-file-label">Choose
                                                                               file</label>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="form-group col-md-6">
                                                                   <img src="{{ $disco->foto }}" alt=""
                                                                       style="
                                                                                                    width:100%;
                                                                                                    height:200px;
                                                                                                    object-fit:cover;
                                                                                                    border-radius:6px;
                                                                                                ">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label>Link Embed Spotify</label>

                                                                   <textarea class="form-control" name="link_embed_spotify" placeholder="masukkan embed spotify">{{ $disco->link_embed_spotify }}</textarea>
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Lirik</label>
                                                                   <textarea class="form-control editor" id="lirik2-{{ $disco->id }}" name="lirik"
                                                                       placeholder="masukkan Tulisan">{{ strip_tags($disco->lirik) }}</textarea>
                                                               </div>

                                                           </div>
                                                           <div class="modal-footer">
                                                               <button type="button" class="btn btn-secondary"
                                                                   data-dismiss="modal">Close</button>
                                                               <button type="submit" class="btn btn-primary">Save
                                                                   changes</button>
                                                           </div>
                                                       </form>
                                                   </div>
                                               </div>
                                           </div>
                                           {{-- akhir modal edit --}}

                                           <form action="{{ route('Disco.destroy', $disco->id) }}" method="POST"
                                               class="form-delete-disco">
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
           // Update label filename
           document.addEventListener('change', function(e) {
               if (e.target.classList.contains('custom-file-input')) {
                   e.target.nextElementSibling.innerText = e.target.files[0].name;
               }
           });
           document.addEventListener("DOMContentLoaded", function() {
               CKEDITOR.replace('lirik');
           });
           $('#btnSavedisco').on('click', function() {
               let form = document.getElementById('formdisco');
               let formData = new FormData(form);
               let editorId = 'lirik';
               if (CKEDITOR.instances[editorId]) {
                   formData.set('lirik', CKEDITOR.instances[editorId].getData());
               }
               $.ajax({
                   url: "{{ route('Tambah_disco') }}",
                   type: "POST",
                   data: formData,
                   processData: false,
                   contentType: false,

                   beforeSend: function() {
                       $('#btnSavedisco')
                           .prop('disabled', true)
                           .text('Menyimpan...');
                   },

                   success: function(res) {
                       Swal.fire({
                           icon: 'success',
                           title: 'Berhasil',
                           text: 'disco berhasil ditambahkan',
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
                       $('#btnSavedisco')
                           .prop('disabled', false)
                           .text('Simpan disco');
                   }
               });
           });
           //lirik2
           document.addEventListener("DOMContentLoaded", function() {

               document.querySelectorAll('.editor').forEach(function(el) {

                   CKEDITOR.replace(el.id);

               });

           });
           //    document.addEventListener("DOMContentLoaded", function() {
           //        CKEDITOR.replace('lirik2-{{ $disco->id }}');
           //    });
           $(document).on('submit', '.editformdisco', function(e) {
               e.preventDefault();

               let form = $(this);
               let id = form.data('id');
               let formData = new FormData(this);
               let editorId = 'lirik2-' + id;
               $.ajax({
                   url: "{{ url('/edit_disco') }}/" + id,
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

           $(document).on('submit', '.form-delete-disco', function(e) {
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
       </script>
   @endsection
