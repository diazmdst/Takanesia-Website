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
                                           <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="masukkan about">{{ strip_tags($about->deskripsi) }}</textarea>
                                       </div>
                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Judul</label>
                                           <select id="id_kat_program" name = "unit_id" class="form-control">
                                               <option selected disabled riquired>Choose...</option>
                                               @foreach ($unit as $unit)
                                                   <option value=" {{ $unit->id }}">
                                                       {{ $unit->name_unit }} </option>
                                               @endforeach

                                           </select>
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
                                       <td>{{ $media->timestamp }}</td>
                                       <td>{{ $media->kategori->kategori }}</td>
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
                                                       <form class="editformmedia" data-id="{{ $media->id }}"
                                                           enctype="multipart/form-data">
                                                           @csrf
                                                           <div class="modal-body">
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Nama Warna</label>
                                                                   <input type="text" class="form-control" name="nama"
                                                                       id="exampleFormControlInput1"
                                                                       value="{{ $media->nama }}">
                                                               </div>
                                                               <div class="form-group">
                                                                   <label for="colour_code">Kode Warna</label>

                                                                   <div class="d-flex align-items-center">
                                                                       <input type="color" class="form-control"
                                                                           name="colour_code" id="colour_code"
                                                                           value="{{ $media->colour_code }}"
                                                                           style="width: 80px; height: 40px; padding: 3px;">

                                                                       <input type="text" class="form-control ml-2"
                                                                           id="colour_code_text"
                                                                           value="{{ $media->colour_code }}" readonly>
                                                                   </div>
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
           $('#btnSavemedia').on('click', function() {
               let form = document.getElementById('formmedia');
               let formData = new FormData(form);


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

           $(document).on('submit', '.editformmedia', function(e) {
               e.preventDefault();

               let form = $(this);
               let id = form.data('id');
               let formData = new FormData(this);
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
       </script>
   @endsection
