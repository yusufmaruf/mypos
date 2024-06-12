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
            <h3 class="box-title">Data Users</h3>
            <div class="pull-right">
                <a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-user-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>username</th>
                        <th>name</th>  
                        <th>address</th>  
                        <th>level</th>  
                        <th>action</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($row->result() as $key => $data) { ?>                        
                        <tr>
                            <td><?php echo $key+1 ?></td>
                            <td><?php echo $data->username ?></td>
                            <td><?php echo $data->name ?></td>
                            <td><?php echo $data->address ?></td>
                            <td><?php echo $data->level == 1 ? 'Admin' : 'Kasir' ?></td>
                            <td width="160px" class="text-center">
                                <a href="<?php echo site_url('user/edit/'.$data->user_id) ?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-edit"></i> Update
                                </a>
                                <form action="<?= site_url('user/del') ?>" method="post">
                                    <input type="hidden" name="user_id" value="<?= $data->user_id ?>">
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs" >
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>                               
                            </td>
                            
                        </tr>
                    <?php } ?>

                   

                </tbody>
            </table>

        </div>
    </div>
</section>