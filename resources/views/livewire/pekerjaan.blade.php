<div>
    <div class="card-header border-bottom">
        <h4 class="card-title">Jurusan </h4>
    </div>
    <div class="card-body py-2 my-25">
        <!-- form -->
        <div class="validate-form mt-2 pt-50">
            <div class="row">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="fakultas">Fakultas</label>
                    <select id="fakultas" class="select2 form-select">
                        <option value="">Select Fakultas</option>
                        <option value="Fakultas Teknik">Fakultas Teknik</option>
                        <option value="Fakultas Hukum">Fakultas Hukum</option>
                        <option value="Fakultas Ekonomi">Fakultas Ekonomi</option>
                        <option value="Fakultas Informatika dan Komputer">Fakultas Informatika dan Komputer</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label for="prodi" class="form-label">Prodi</label>
                    <select id="prodi" class="select2 form-select">
                        <option value="">Select Prodi</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="reason">Alasan Pilih Jurusan</label>
                    <input type="text" class="form-control" id="reason" placeholder="Masukkan Alasan" value="" />
                </div>
                <div class="col-12">
                    <button id="submitJurusan" type="submit" class="btn btn-primary mt-1 me-1">Save changes</button>
                    <button id="updateJurusan" type="submit" class="btn btn-outline-secondary mt-1" style="display: none">Update</button>
                </div>
            </div>
        </div>
        <!--/ form -->
    </div>
</div>
<script>
    const fakultas = document.getElementById('fakultas');
    const prodi = document.getElementById('prodi');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const hukum = 'Hukum';
    const teknik = ['Teknik Sipil', 'Teknik Mesin', 'Teknik Elektro','Teknik Kimia']
    const Ekonomi = ['Akuntansi', 'Manajemen'];
    const informatika = 'Teknik Informatika';
    const reason = document.getElementById('reason')
    fakultas.addEventListener("change", function() {
        
        
        if(fakultas.value === 'Fakultas Teknik'){
            prodi.innerHTML = '';
            teknik.forEach((v)=>{
                prodi.innerHTML += `<option value='${v}'>${v}</option>`;
            })
        }
        if(fakultas.value === 'Fakultas Ekonomi'){
            prodi.innerHTML = '';
            Ekonomi.forEach((v)=>{
                prodi.innerHTML +=`<option value='${v}'>${v}</option>`;
            })
        }
        if(fakultas.value === 'Fakultas Hukum'){
            prodi.innerHTML = '';
            prodi.innerHTML = `<option value='${hukum}'>${hukum}</option>`
        }
        if(fakultas.value === 'Fakultas Informatika dan Komputer'){
            prodi.innerHTML = '';
            prodi.innerHTML = `<option value='${informatika}'>${informatika}</option>`
        }
      });

      fetch('/dashboard/akun/{{ Auth::user()->id}}/jurusan', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
      })
      .then((res) => res.json())
      .then((json) => {
          if(json.data){
              fakultas.value = json.data.fakultas;
              prodi.value = json.data.prodi;
              reason.value = json.data.reason;
              $('#updateJurusan').show();
              $('#submitJurusan').hide();
          }
      })
      const submit = document.getElementById("submitJurusan");
      submit.onclick = function(){
        fetch('/dashboard/akun/{{ Auth::user()->id}}/jurusan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body:JSON.stringify({
                fakultas: fakultas.value,
                prodi: prodi.value,
                reason: reason.value,
                id_user:'{{ Auth::user()->id}}',
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
                    $('#updateJurusan').show();
              $('#submitJurusan').hide();
        })
        .catch((error) => {
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

      const update = document.getElementById("updateJurusan");
      update.onclick = function(){
        fetch('/dashboard/akun/{{ Auth::user()->id}}/jurusan', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body:JSON.stringify({
                fakultas: fakultas.value,
                prodi: prodi.value,
                reason: reason.value,
                id_user:'{{ Auth::user()->id}}',
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
                        text: 'terjadi Error',
                        icon: 'error',
                        customClass: {
                        confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    });
        })
      }
</script>