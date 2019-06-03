<div class="content-wrapper">    
	<div class="container-fluid">
 		<div class="row pt-2 pb-2">
    		<div class="col-sm-9">
	    		<h4 class="page-title">Add/Edit College</h4>
		   	</div>
	    </div>
	</div>
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-lg-4">
                    <h5 class="text-sh m-t-0">Add/Edit Rooms</h5>
                    <?php echo validation_errors('<span class="error">', '</span>'); ?>
                    <?php echo form_open_multipart('admin/addrooms'); ?>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Room Name:</label>
                                    <?php echo form_input(array(
                                        'name'  => 'rn',
                                        'class' => 'form-control',
                                        'value' => set_value('cn')
                                    )); ?>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit">Save</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="col-lg-8">
                    <h5>All Rooms</h5>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Room Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rooms as $room) {
                                ?>
                                <tr>
                                    <td><?php echo $room->id ?></td>
                                    <td><?php echo $room->rn ?></td>
                                    <td>
                                      <a href="<?php echo base_url('admin/room-edit/'.$room->id) ?>" 
                                         class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>
                                       </a>
                                      <a href="<?php echo base_url('admin/deleteRoom/'.$room->id) ?>" 
                                         class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
                                       </a>
                                    </td>
                                </tr>
                                <?php
                                } ?>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
