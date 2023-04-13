<div class="modal fade" id="uploadExcel" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Upload Excel Transaksi PLK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <form id="uploadExcelForm">
              <div class="form-group">
                <label>Penyelenggara Lelang</label>
                <div class="select-full">
                  <select class="bootstrap-select list-marketname" id="excelPasarId" data-width="100%">
                    <option value="">Pilih Penyelenggara</option>
                    <?php foreach ($pasars as $pasar) { ?>
                      <option value="<?= $pasar['pasar_id'] ?>"><?= $pasar['pasar_name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label>Tanggal Lelang</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="icon-calendar"></i>
                  </span>
                  <input class="form-control date-from" placeholder="" id="excelTglLelang" type="date" />
                </div>
              </div>
              <div class="form-group">
                <a href="<?= site_url('laporan/plk/templateExcel') ?>" target="_blank">Download Template Excel</a>
              </div>
              <div class="form-group">
                <label for="excel">Upload Excel</label>
                <input type="file" class="form-control-file" id="excelFile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="doUpload">Upload</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(function() {


    $('#doUpload').on('click', function() {
      const file = $('#excelFile')[0].files[0];
      const pasarId = $('#excelPasarId').val();
      const tglLelang = $('#excelTglLelang').val();

      if (!pasarId || !tglLelang || !file) {
        alert('semua data harus diisi');
        return false;
      }

      const data = {
        pasarId,
        tglLelang
      };

      const myUpload = new Upload(file);
      myUpload.doUpload(data);
    })
    const Upload = function(file) {
      this.file = file;
    };

    Upload.prototype.getType = function() {
      return this.file.type;
    };
    Upload.prototype.getSize = function() {
      return this.file.size;
    };
    Upload.prototype.getName = function() {
      return this.file.name;
    };

    Upload.prototype.doUpload = function(additionalData = {}) {
      var that = this;
      var formData = new FormData();

      formData.append("excelPlk", this.file, this.getName());
      formData.append("upload_file", true);

      for (const key of Object.keys(additionalData)) {
        formData.append(key, additionalData[key]);
      }

      $.LoadingOverlay('show');
      $.ajax({
        type: "POST",
        url: `<?= site_url('laporan/plk/uploadExcel') ?>`,
        xhr: function() {
          var myXhr = $.ajaxSettings.xhr();
          if (myXhr.upload) {
            myXhr.upload.addEventListener('progress', that.progressHandling, false);
          }
          return myXhr;
        },
        success: function(data) {
          alert('Upload Sukses!')
        },
        error: function(xhr, status) {
          alert('Gagal Upload ' + xhr.responseText || '')
        },
        complete: function() {
          $.LoadingOverlay('hide')
          $('#uploadExcel').modal('hide');
          $('#uploadExcelForm input').val('');
        },
        async: true,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        timeout: 60000
      });
    };

    Upload.prototype.progressHandling = function(event) {
      var percent = 0;
      var position = event.loaded || event.position;
      var total = event.total;
      var progress_bar_id = "#progress-wrp";
      if (event.lengthComputable) {
        percent = Math.ceil(position / total * 100);
      }
      // update progressbars classes so it fits your code
      $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
      $(progress_bar_id + " .status").text(percent + "%");
    };

  })
</script>