<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php if ($this->session->flashdata('type_message')): ?>
                      <div class="alert alert-<?php echo $this->session->flashdata('type_message');?> alert-dismissible text-center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->flashdata('message');?>
                      </div>
                    <?php endif ?>
                    <div class="col-lg-12">
                        <h1 class="page-header">Welcome <?php echo $this->session->userdata('nama')?></h1>
                        <h2>Registration Steps : </h2>
                        <ul class="list-group">
                            <li class="list-group-item">1. Fill in the administration form <a href="https://pmb-intl.uinsgd.ac.id/">Here</a>. if you have filled in, go to step 2</li>
                            <li class="list-group-item">2. Login using email and password created in the administration form</li>
                            <li class="list-group-item">3. Make payment as specified in <a href="https://pmb.uinsgd.ac.id/">Here</a></li>
                            <li class="list-group-item">4. Wait until payment is verified by the admin</li>
                            <li class="list-group-item">5. Print the participant card</li>
                            <li class="list-group-item">6. Follow the steps on the participant card</li>
                        </ul>
                        <div class="alert alert-warning alert-dismissible text-center">
                            if you have made payment and payment has been verified by admin, please print the participant card
                        </div>
                    </div>
                    <?php if ($kelulusan->status_kelulusan == "LULUS"): ?>
                        <div class="alert alert-warning alert-dismissible text-center">
                            congratulations you have been accepted in UIN Sunan Gunung Djati Bandung majoring in <?=$kelulusan->kode_jurusan_kelulusan?> faculty of ...
                        </div>
                    <?php endif ?>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
