<section class="content-header">
	<h1>User
		<small> Category </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Category</li>
	</ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= ucfirst($page) ?> Category</h3>
            <div class="pull-right">
                <a href="<?=site_url('suplier')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
            
        </div>
        <div class="box-body ">
           <div class="row">
            <div class="col-md-4 col-md-offset-4 ">
                <form action="<?=site_url('category/process') ?>" method="post">
                    <div class="form-group">
                        <label>Category Name </label>
                        <input type="hidden" name="category_id" value="<?= $row->category_id ?>">
                        <input type="text" name="name" value="<?= $row->name ?>" class="form-control" required>
                    </div>
                   
                    <div class="form-group"></div>
                        <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Save
                        </button>
                        <button type="reset" class="btn btn-flat">Reset</button>
                    </div>
            </div>
             

        </div>
    </div>
</section>