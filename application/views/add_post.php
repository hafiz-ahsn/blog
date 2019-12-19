<?php
	include 'admin_common/admin_hfiles.php';
	include 'admin_common/admin_navbar.php';
	include 'admin_common/admin_sidebar.php';
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Post to Blog
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Blog</a></li>
            <li class="active">Add Post</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add Post</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="register-box-body">
                  <p class="login-box-msg">Add a new Post to Blog</p>
                  <div class="alert alert-success success" style="display: none;"> Your Post is Submitted. and you are redirecting ....</div>
                  <div class="alert alert-danger error" style="display: none;"></div>
                  <div class="alert alert-warning warning" style="display: none;"></div>
                  <form onsubmit="return false;" name="addpost" enctype="multipart/form-data">
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control required" name="post_heading" placeholder="Post Heading"/>
                      <span class="glyphicon glyphicon-header form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control required" name="post_description" placeholder="Post Description"/>
                      <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="file" class="form-control required" name="post_image" placeholder="Post Image" accept="image/*" />
                      <span class="glyphicon glyphicon-file form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="text" class="form-control required" name="post_author_name" placeholder="Post Author Name"/>
                      <span class="glyphicon glyphicon-education form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <input type="file" class="form-control required" name="post_author_image" placeholder="Post Author Image" accept="image/*"/>
                      <span class="glyphicon glyphicon-file form-control-feedback"></span>
                    </div>
                    <div class="row">

                      <div class="col-xs-12">
                        <button type="submit" name="upload" id="addpost" class="btn btn-primary btn-block btn-flat">Submit Post</button>
                      </div><!-- /.col -->
                    </div>
                  </form> 
                </div><!-- /.form-box -->
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            <div class="col-md-3">
            </div>
          </div>   <!-- /.row -->
        </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
	include 'admin_common/admin_fbar.php';
	include 'admin_common/admin_ffiles.php';
?>
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
      $("#addpost").click(function(e) {
        
        var formData = new FormData(document.getElementsByName('addpost')[0]);

        $("#addpost").attr('disabled',true);
        $.ajax({
          type: "post",
          url: "<?=base_url()?>submitPost",
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
                        window.location.href = '<?=base_url()?>viewpost';
                    }, 2000);
                }
                else if(data.status == 'empty')
                {
                    $('.error').hide();
                    $('.warning').show();
                    $("#addpost").attr('disabled',false);
                    $('.warning').text(data.message);
                }
                else if(data.status == 'exist')
                {
                    $('.error').hide();
                    $('.warning').show();
                    $("#addpost").attr('disabled',false);
                    $('.warning').text(data.message);
                }
                else
                {
                    $('.warning').hide();
                    $("#addpost").attr('disabled',false);
                    $('.error').text(data.message);
                    $('.error').show();
                }
          }
        });
    });
    });
</script> 


