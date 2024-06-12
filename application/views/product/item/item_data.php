<section class="content-header">
	<h1>User
		<small> Item </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Item Barang</li>
	</ol>
</section>

<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Item</h3>
            <div class="pull-right">
                <a href="<?=site_url('item/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>barcode</th>    
                        <th>name</th>    
                        <th>action</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row->result() as $key => $data) { ?>                        
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $data->barcode ?></td>
                            <td><?php echo $data->name ?></td>
                            <td width="160px" class="text-center">
                                <a href="<?php echo site_url('item/del/'.$data->item_id) ?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a> 
                                <a href="<?php echo site_url('item/edit/'.$data->item_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> Edit
                                </a> 
                                                          
                            </td>
                            
                        </tr>
                    <?php } ?>

                   

                </tbody>
            </table>

        </div>
    </div>
</section>