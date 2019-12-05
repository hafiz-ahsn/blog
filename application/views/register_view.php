<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?= base_url()?>/admin_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url()?>/admin_assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?= base_url()?>/admin_assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="<?= base_url()?>/login"><b>Admin</b>LTE</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <div class="alert alert-success success" style="display: none;"> You are registered. and you are redirecting ....</div>
        <div class="alert alert-danger error" style="display: none;"></div>
        <div class="alert alert-warning warning" style="display: none;"></div>
        <form onsubmit="return false;" name="signup">
          <div class="form-group has-feedback">
            <input type="text" class="form-control required" name="user_full_name" placeholder="Full name"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control required" name="user_email" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control required" name="user_password" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control required" name="cuser_password" placeholder="Retype password"/>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">

            <div class="col-xs-12">
              <button type="submit" name="submit" id="signup" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form> 
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?= base_url()?>/admin_assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= base_url()?>/admin_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?= base_url()?>/admin_assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>

      $('.required').on('input', function() {
          var input=$(this);
          var is_name=input.val();
          if(is_name){input.parent().removeClass("has-error");}
          else{input.parent().addClass("has-error");}
        });
    </script>


    <script type="text/javascript">
    $(document).ready(function() {
      $("#signup").click(function(e) {

        var formData = new FormData(document.getElementsByName('signup')[0]);

        $("#signup").attr('disabled',true);
        $.ajax({
          type: "post",
          url: "<?=base_url()?>registerUser",
          data: formData,
          processData: false,
          contentType: false,
          dataType: "JSON",
          success: function(data){
                if (data.status == 'success') {
                   $('.warning').hide();
                    $('.error').hide();
                    $('.success').show();
                    setTimeout(function() {
                        window.location.href = '<?=base_url()?>login';
                    }, 2000);
                }
                else if(data.status == 'empty')
                {
                    $('.error').hide();
                    $('.warning').show();
                    $("#signup").attr('disabled',false);
                    $('.warning').text(data.message);
                }
                else if(data.status == 'exist')
                {
                    $('.error').hide();
                    $('.warning').show();
                    $("#signup").attr('disabled',false);
                    $('.warning').text(data.message);
                }
                else
                {
                    $('.warning').hide();
                    $("#signup").attr('disabled',false);
                    $('.error').text(data.message);
                    $('.error').show();
                }
          }
        });
    });
  });
</script>
</body>
</html>