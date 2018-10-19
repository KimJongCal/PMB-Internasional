<section>
      <div class="container">
        <div class="row align-items-center" id="admission">
          <div class="col-md-2">
          &nbsp;
          </div>
          <div class="col-md-8">
            <br>
            <br>
            <br>
            <br>
            <fieldset>
              
            <!-- Form Name -->
            <legend><center><h2 class="masthead-subheading mb-0">REGISTRATION</h2></center></legend>
            <br>
            <br>
            <br>
            <?php if (!empty($this->session->flashdata('type_massage'))): ?>
              <div class="alert alert-<?=$this->session->flashdata('type_massage')?> alert-dismissible text-center">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?=$this->session->flashdata('massage')?>
              </div>
            <?php endif ?>

            <?php echo form_open_multipart('Auth/Register', 'class="form-horizontal"'); ?>
            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="noPassport">Passport Number</label>  
              <div class="col-md-12">
              <input id="noPassport" name="noPassport" type="text" minlength="8" maxlength="9" placeholder="passport number" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="nama">Name</label>  
              <div class="col-md-12">
              <input id="nama" name="nama" type="text" placeholder="Name" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="tempat">Place/Date of Birth</label>  
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <input id="tempat" name="tempat" type="text" placeholder="Place" class="form-control input-md" required="">
                  </div>
                  <div class="col-md-8">
                    <input id="tglLahir" name="tglLahir" type="date" placeholder="" class="form-control input-md" required="">
                  </div>
                </div>
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="jenisKelamin">Gender</label>
              <div class="col-md-12">
                <select id="jenisKelamin" name="jenisKelamin" class="form-control" required="">
                  <option>--Choose--</option>
                  <option value="MALE">Male</option>
                  <option value="FEMALE">Female</option>
                </select>
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="alamat">Address</label>
              <div class="col-md-12">                     
                <textarea class="form-control" id="alamat" name="alamat" required=""></textarea>
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="kebangsaan">Nationality</label>
              <div class="col-md-12">
                <select id="kebangsaan" name="kebangsaan" class="form-control" required="">
                  <option>--Choose--</option>
                  <?php foreach($negara as $value): ?>
                    <option value="<?=$value->country_name?>"><?=$value->country_name?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="asalSekolah">Which school are you from?
</label>  
              <div class="col-md-12">
              <input id="asalSekolah" name="asalSekolah" type="text" placeholder="" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="email">Email</label>  
              <div class="col-md-12">
              <input id="email" name="email" type="email" placeholder="Email" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <label class="col-md-4 control-label" for="phone">Phone Number</label>  
              <div class="col-md-12">
              <input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control input-md" required="">
                
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="rekomendasi">Recommendation</label>
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <select id="rekomendasi" onChange="makeEnable(this.value)" name="rekomendasi" class="form-control">
                      <option value="YES">Yes</option>
                      <option value="NO">No</option>
                    </select>
                  </div>
                  <div class="col-md-8">
                    <input id="dari" name="dari" type="text" placeholder="From" class="form-control input-md">
                  </div>
                </div>
              </div>
            </div>

            <!-- File Button --> 
            <div class="form-group">
              <label class="col-md-4 control-label" for="fileRekom">Recommended Letter</label>
              <div class="col-md-12">
                <input id="fileRekom" name="fileRekom" class="input-file" type="file">
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="jurusan1">First Majors Selection</label>
              <div class="col-md-12">
                <select id="jurusan1" name="jurusan1" class="form-control" required="">
                  <option>--Choose--</option>
                  <?php foreach($jurusan as $value): ?>
                    <option value="<?=$value->kode_jurusan?>"><?=$value->jurusan?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="jurusan2">Second Majors Selection</label>
              <div class="col-md-12">
                <select id="jurusan2" name="jurusan2" class="form-control" required="">
                  <option>--Choose--</option>
                  <?php foreach($jurusan as $value): ?>
                    <option value="<?=$value->kode_jurusan?>"><?=$value->jurusan?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="jurusan3">Third Majors Selection</label>
              <div class="col-md-12">
                <select id="jurusan3" name="jurusan3" class="form-control" required="">
                  <option>--Choose--</option>
                  <?php foreach($jurusan as $value): ?>
                    <option value="<?=$value->kode_jurusan?>"><?=$value->jurusan?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- File Button --> 
            <div class="form-group">
              <label class="col-md-4 control-label" for="foto">Photo <span class="label label-danger">(Max Allowed Size 2mb)</span></label>
              <div class="col-md-12">
                <input id="foto" name="foto" class="input-file" type="file" required="">
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="simpan"></label>
              <div class="col-md-12">
                <button id="simpan" name="simpan" class="btn btn-primary">Submit</button>
              </div>
            </div>

            </fieldset>
            <?php form_close(); ?>
          </div>
          <div class="col-md-2">
          &nbsp;
          </div>
        </div>
      </div>
    </section>