<div>
    <div class="card-header border-bottom">
        <h4 class="card-title">Lain - Lain</h4>
    </div>
    <div class="card-body py-2 my-25">
        <div class="validate-form mt-2 pt-50">
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="organisasi">Organisasi</label>
                    <input type="text" class="form-control" id="organisasi"  placeholder="Masukkan Nama Organisasi"
                        value=""  />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="jabatan">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan"  placeholder="Masukkan Jabatan"
                        value=""  />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="hobi">Hobby</label>
                    <input type="email" class="form-control" id="hobi"  placeholder="Masukkan Hobi"
                        value="" />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="prestasi">Prestasi</label>
                    <textarea type="text" class="form-control" id="prestasi" 
                        placeholder="Masukkan prestasi" value="PIXINVENT"></textarea>
                </div>
                <div class="col-12">
                    <button id="submitOthers"  class="btn btn-primary mt-1 me-1">Save changes</button>
                    <button id="updateOthers"  class="btn btn-outline-secondary mt-1" style="display: none">update</button>
                </div>
            </div>
        </div>
        <!--/ form -->
    </div>
</div>
<script>
    
    const organisasi = document.getElementById('organisasi');
    const jabatan = document.getElementById('jabatan');
    const hobi = document.getElementById('hobi');
    const prestasi = document.getElementById('prestasi');
    fetch('/api/dashboard/akun/others/{{ Auth::user()->id}}', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
      })
      .then((res) => res.json())
      .then((json) => {
          if(json.data){
              organisasi.value = json.data.organisasi;
              jabatan.value = json.data.jabatan_organisasi;
              hobi.value = json.data.hobi;
              prestasi.value = json.data.prestasi;
              $('#updateOthers').show();
              $('#submitOthers').hide();
          }
      })

      const submite = document.getElementById('submitOthers');
      const updateu = document.getElementById('updateOthers');
      
      submite.onclick = function(){
          fetch('/api/dashboard/akun/others', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                  organisasi: organisasi.value,
                  jabatan_organisasi: jabatan.value,
                  hobi: hobi.value,
                  prestasi: prestasi.value,
                  id_user: '{{ Auth::user()->id}}'
              })
          })
          .then((res) => res.json())
          .then((json) => {
            Swal.fire({
                title: 'Good job!',
                text: 'Data Berhasil disubmit',
                icon: 'success',
                customClass: {
                confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
            $('#updateOthers').show();
            $('#submitOthers').hide();
          })
          .catch((error) => {
            console.log(error)
            Swal.fire({
                title: 'Error!',
                text: 'Silahkan Selesaikan Input Form',
                icon: 'error',
                customClass: {
                confirmButton: 'btn btn-primary'
                },
                buttonsStyling: false
            });
          })
      }
      updateu.onclick = function(){
        fetch('/api/dashboard/akun/others', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                organisasi: organisasi.value,
                  jabatan_organisasi: jabatan.value,
                  hobi: hobi.value,
                  prestasi: prestasi.value,
                  id_user: '{{ Auth::user()->id}}'
            })
        })
        .then((res) => res.json())
        .then((json) => {
          Swal.fire({
              title: 'Good job!',
              text: 'Data Berhasil diupdate',
              icon: 'success',
              customClass: {
              confirmButton: 'btn btn-primary'
              },
              buttonsStyling: false 
          });
        })
        .catch((error) => {
          Swal.fire({
              title: 'Error!',
              text: 'Terjadi Kesalahan',
              icon: 'error',
              customClass: {
              confirmButton: 'btn btn-primary'
              },
              buttonsStyling: false
          });
        })
    }

</script>