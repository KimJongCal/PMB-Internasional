<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Error</title>
    <link rel="shortcut icon" href="<?=base_url('assets/images/logo-uin2.png')?>">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 col-sm-offset-3">
            <br><br>
            <img src="<?=base_url('assets/images/oops.png')?>" width="100" height="50">
            <h3>Registration Error</h3>
            <p style="font-size:20px;color:#5C5C5C;">
                <?php if ($this->session->flashdata('type_message')): ?>
                  <div class="alert alert-<?php echo $this->session->flashdata('type_message');?> alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('message');?>
                  </div>
                <?php endif ?>
            </p>
            <a href="<?=base_url()?>" class="btn btn-danger">Back</a>
        <br><br>
            </div>
            
        </div>
    </div>
</body>
</html>
