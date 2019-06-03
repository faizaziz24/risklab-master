
<div class="content-wrapper">    
	<div class="container-fluid">
 		<div class="row pt-2 pb-2">
    		<div class="col-sm-9">
	    		<h4 class="page-title">Add Complaints</h4>
		   	</div>
	    </div>
	</div>
    <div class="card">
        <div class="card-header text-uppercase">
            <a href="<?php echo base_url('admin/getcomplaints') ?>" class="btn btn-success pull-right">View All Complaints</a>
        </div>
        <div class="card-body">
            <!-- <form autocomplete="off" action="#" method="POST" enctype="multipart/form-data"> -->
            <?php echo validation_errors('<span class="error">', '</span>'); ?>
            <?php echo form_open_multipart('admin/addcomplaint'); ?>
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="text-sh m-t-0">Basic Information</h5>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Complaint Name:</label>
                                    <?php echo form_input(array(
                                        'name'  => 'cn',
                                        'class' => 'form-control',
                                        'value' => set_value('cn')
                                    )); ?>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Description:</label>
                                    <?php echo form_textarea(array(
                                        'name'  => 'csd',
                                        'class' => 'form-control',
                                        'rows'  => '8',
                                        'value' => set_value('csd')
                                    )); ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Room Name:</label>
                                    <select class="form-control" name="crms">
                                        <?php
                                        if(!empty($rooms))
                                        {
                                            foreach ($rooms as $room)
                                            {
                                                ?>
                                                <option value="<?php echo $room->id ?>"><?php echo $room->rn ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>    
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Flaw Name:</label>
                                    <select class="form-control" name="cfws">
                                        <?php
                                        if(!empty($flaws))
                                        {
                                            foreach ($flaws as $flaw)
                                            {
                                                ?>
                                                <option value="<?php echo $flaw->id ?>"><?php echo $flaw->fn ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>   
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-sh m-t-0">Other Information</h5>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <input type="hidden" name="cid">
                                    <label>Complaint Image:</label>
                                    <?php echo form_upload(array(
                                        'name'  => 'cimg',
                                        'class' => 'form-control',
                                        'value' => set_value('cimg')
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
