<section class="content-header">
	<h1>User
		<small> Customer </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Customer</li>
	</ol>
</section>

<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Customer</h3>
            <div class="pull-right">
                <a href="<?=site_url('customer/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>  
                        <th>Gender</th>  
                        <th>phone</th>  
                        <th>address</th>  
                        <th>action</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row->result() as $key => $data) { ?>                        
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $data->name ?></td>
                            <td><?php echo $data->gender ?></td>
                            <td><?php echo $data->phone ?></td>
                            <td><?php echo $data->address ?></td>
                            <td width="160px" class="text-center">
                                <a href="<?php echo site_url('customer/del/'.$data->customer_id) ?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> Delete
                                </a> 
                                <a href="<?php echo site_url('customer/edit/'.$data->customer_id) ?>" class="btn btn-warning btn-xs">
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