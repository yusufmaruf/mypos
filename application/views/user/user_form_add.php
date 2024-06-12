<section class="content-header">
	<h1>User
		<small> Pengguna </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Pengguna</li>
	</ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add User</h3>
            <div class="pull-right">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
            
        </div>
        <div class="box-body ">
           <div class="row">
            <div class="col-md-4 col-md-offset-4 ">
                <form action="" method="post">
                    
                    <div class="form-group <?=form_error('fullname') ? 'has-error' : null?>">
                        <label>Name *</label>
                        <input type="text" name="fullname" class="form-control" value="<?php echo set_value('fullname')?>" >
                        <span class="help-block"><?php echo form_error('fullname') ?></span>
                    </div>
                    <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                        <label>Username *</label>
                        <input type="text" name="username" class="form-control" value="<?php echo set_value('username')?>" >
                        <span class="help-block"><?php echo form_error('username') ?></span>
                    </div>
                    <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                        <label>Password *</label>
                        <input type="password" name="password" class="form-control" value="<?php echo set_value('password')?>" >
                        <span class="help-block"><?php echo form_error('password') ?></span>
                    </div>
                    <div class="form-group <?=form_error('passconf') ? 'has-error' : null ?>">
                        <label>Confirm Password *</label>
                        <input type="password" name="passconf" class="form-control" value="<?php echo set_value('passconf')?>" >
                        <span class="help-block"><?php echo form_error('passconf') ?></span>
                    </div>                    
                    <div class="form-group <?=form_error('address') ? 'has-error' : null ?>">
                        <label>Address </label>
                        <textarea name="address" class="form-control" ><?php echo set_value('address') ?> </textarea>
                        <span class="help-block"><?php echo form_error('address') ?></span>
                    </div>
                    <div class="form-group">
                        <label>Level *</label>
                        <select name="level" class="form-control <?=form_error('level') ? 'has-error' : null ?>" >
                            <option >- Pilih -</option>
                            <option value="1" <?php echo set_value('level') == 1 ? "selected" : null ?> >Admin</option>
                            <option value="2" <?php echo set_value('level') == 2 ? "selected" : null ?> >Kasir</option>
                        </select>
                        <span class="help-block"><?php echo form_error('Level') ?></span>
                    </div>
                    <div class="form-group"></div>
                        <button type="submit" name="add" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Save
                        </button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
            </div>
             

        </div>
    </div>
</section>