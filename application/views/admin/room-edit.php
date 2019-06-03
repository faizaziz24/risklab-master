
	<div class="content-wrapper">    
	<div class="container-fluid">
 		<div class="row pt-2 pb-2">
    		<div class="col-sm-9">
	    		<h4 class="page-title">Edit Rooms</h4>
		   	</div>
	    </div>
	</div>
    <div class="card">
        <div class="card-header text-uppercase">
            <a href="<?php echo base_url('admin/rooms') ?>" class="btn btn-success pull-right">View All Room</a>
        </div>
        <div class="card-body">
            <!-- <form autocomplete="off" action="#" method="POST" enctype="multipart/form-data"> -->
            <?php echo validation_errors('<span class="error">', '</span>'); ?>
            <?php echo form_open_multipart('admin/editroom/'.$room_detail->id); ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="text-sh m-t-0">Basic Information</h5>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="hidden" name="rid" value="<?php echo $room_detail->id ?>">
                                    <label>Room Name:</label>
                                    <?php echo form_input(array(
                                        'name'  => 'rn',
                                        'class' => 'form-control',
                                        'value' => $room_detail->rn
                                    )); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>              
                <div class="card">
                    <button class="btn btn-primary pull-right" type="save">Save</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
