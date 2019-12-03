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
            <li class="active">Add Blog</li>
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
                <form role="form">
                  <div class="box-body">
                  	<div class="form-group">
                      <label for="post_heading">Post Heading</label>
                      <input type="email" name="post_heading" class="form-control" id="post_heading" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="post_description">Post Description</label>
                      <input type="email" name="post_description" class="form-control" id="post_description" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="post_image">Post Image</label>
                      <input type="file" name="post_image" id="post_image">
                    </div>
                    <div class="form-group">
                      <label for="post_author_name">Post Author Name</label>
                      <input type="password" name="post_author_name" class="form-control" id="post_author_name" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="post_author_image">Post Author Image</label>
                      <input type="file" name="post_author_image" id="post_author_image">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
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