<div>
    <div class="card-header border-bottom">
        <h4 class="card-title">Orang Tua / Wali</h4>
    </div>
    <!-- form -->
    <div class="validate-form mt-2 pt-50 px-3 py-3" >
            @csrf
            <div class="row">
                <div class="col-12 col-sm-6 mb-1 px">
                    <label class="form-label" for="wali">Nama Orang Tua / Wali</label>
                    <input type="text" class="form-control" id="wali" name="firstName" placeholder="Masukkan Nama"
                        value=""  />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label for="hubungan" class="form-label">Hubungan</label>
                    <select id="hubungan" class="select2 form-select">
                        <option value="">Pilih Hubungan</option>
                        <option value="Ayah">Ayah</option>
                        <option value="Ibu">Ibu</option>
                        <option value="Wali">Wali</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="kontak">Kontak</label>
                    <input type="text" class="form-control" id="kontak"  placeholder="Masukkan kontak"
                        value="" />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" 
                        placeholder="Masukkan Pekerjaan" />
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="alamataccountAddress">Alamat</label>
                    <input type="text" class="form-control" id="alamat" 
                        placeholder="Masukkan Alamat" />
                </div>
                <div class="col-12">
                    <button id="submitWali" type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                    <button id="updateWali" type="submit" class="btn btn-outline-secondary mt-1" style="display: none;">Update</button>
                </div>
            </div>
        </div>
        <!--/ form -->
    </div>
<script>
    
    const wali = document.getElementById('wali');
    const hubungan = document.getElementById('hubungan');
    const kontak = document.getElementById('kontak');
    const pekerjaan = document.getElementById('pekerjaan');
    const alamat = document.getElementById('alamat');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    fetch('/api/dashboard/akun/{{ Auth::user()->id}}/wali', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
      })
      .then((res) => res.json())
      .then((json) => {
          if(json.data){
              wali.value = json.data.nama_wali;
              hubungan.value = json.data.hubungan;
              kontak.value = json.data.kontak;
              pekerjaan.value = json.data.pekerjaan;
              alamat.value = json.data.alamat;
              $('#updateWali').show();
              $('#submitWali').hide();
          }
      })

      const submit = document.getElementById('submitWali');
      const update = document.getElementById('updateWali');
      
      submit.onclick = function(){
          fetch('/api/dashboard/akun/{{ Auth::user()->id}}/wali', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json',
              },
              body: JSON.stringify({
                  nama_wali: wali.value,
                  hubungan: hubungan.value,
                  kontak: kontak.value,
                  pekerjaan: pekerjaan.value,
                  alamat: alamat.value,
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
            $('#updateWali').show();
            $('#submitWali').hide();
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
      update.onclick = function(){
        fetch('/api/dashboard/akun/{{ Auth::user()->id}}/wali', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                nama_wali: wali.value,
                hubungan: hubungan.value,
                kontak: kontak.value,
                pekerjaan: pekerjaan.value,
                alamat: alamat.value,
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