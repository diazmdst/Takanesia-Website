   @extends('layouts.backend')

   @section('konten')
       <div class="container-fluid">


           <!-- DataTales Example -->
           <div class="card shadow mb-4">
               <div class="card-header py-3">
                   <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                                   <form id="formkategori" enctype="multipart/form-data">
                                       @csrf

                                       <div class="form-group">
                                           <label for="exampleFormControlInput1">Nama Kategori</label>
                                           <input type="text" class="form-control" name="kategori"
                                               id="exampleFormControlInput1" placeholder="masukkan nama Kategori">
                                       </div>
                                       <div class="modal-footer">
                                           <button type="button" class="btn btn-secondary"
                                               data-dismiss="modal">Close</button>
                                           <button type="button" class="btn btn-primary" id="btnSavekategori">Save
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
                                   <th>kategori</th>
                                   <th>Aksi</th>

                               </tr>
                           </thead>

                           <tbody>
                               @foreach ($kategori as $key => $kategori)
                                   <tr>
                                       <td>{{ $key + 1 }}</td>
                                       <td>{{ strip_tags($kategori->kategori) }}</td>
                                       <td>
                                           <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#Edit-{{ $kategori->id }}">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                   fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                   <path
                                                       d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                               </svg>
                                           </button>


                                           {{-- modal edit --}}
                                           <!-- Modal -->
                                           <div class="modal fade" id="Edit-{{ $kategori->id }}" data-backdrop="static"
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
                                                       <form class="editformkategori" data-id="{{ $kategori->id }}"
                                                           enctype="multipart/form-data">
                                                           @csrf
                                                           <div class="modal-body">
                                                               <div class="form-group">
                                                                   <label for="exampleFormControlInput1">Judul</label>
                                                                   <input type="text" class="form-control"
                                                                       name="kategori" id="exampleFormControlInput1"
                                                                       value="{{ $kategori->kategori }}">
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

                                           <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                               class="form-delete-kategori">
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
           $('#btnSavekategori').on('click', function() {
               let form = document.getElementById('formkategori');
               let formData = new FormData(form);


               $.ajax({
                   url: "{{ route('Tambah_Kategori') }}",
                   type: "POST",
                   data: formData,
                   processData: false,
                   contentType: false,

                   beforeSend: function() {
                       $('#btnSavekategori')
                           .prop('disabled', true)
                           .text('Menyimpan...');
                   },

                   success: function(res) {
                       Swal.fire({
                           icon: 'success',
                           title: 'Berhasil',
                           text: 'Kategori berhasil ditambahkan',
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
                       $('#btnSavekategori')
                           .prop('disabled', false)
                           .text('Simpan kategori');
                   }
               });
           });

           $(document).on('submit', '.editformkategori', function(e) {
               e.preventDefault();

               let form = $(this);
               let id = form.data('id');
               let formData = new FormData(this);
               $.ajax({
                   url: "{{ url('/edit_kategori') }}/" + id,
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

           $(document).on('submit', '.form-delete-kategori', function(e) {
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
