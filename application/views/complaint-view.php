
	<div class="content-wrapper">    
	<div class="container-fluid">
 		<div class="row pt-2 pb-2">
    		<div class="col-sm-9">
	    		<h4 class="page-title">View Complaint</h4>
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
            <?php echo form_open_multipart('admin/viewcomp/'.$comp_detail->id); ?>
                <div class="row">
                    <div class="col-lg-8">
                        <h5 class="text-sh m-t-0">Basic Information</h5>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <input type="hidden" name="pid" value="<?php echo $comp_detail->id ?>">
                                    <label>Complaint Name:</label>
                                    <?php echo form_input(array(
                                        'class' => 'form-control',
                                        'disabled' => 'disabled',
                                        'value' => $comp_detail->cn
                                    )); ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group col-mb-6">
                                    <label>Room Name:</label>
                                    <?php echo form_input(array(
                                        'class' => 'form-control',
                                        'disabled' => 'disabled',
                                        'value' => $comp_detail->rn
                                    )); ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group mb-3">
                                    <label>Flaw Name:</label>
                                    <?php echo form_input(array(
                                        'class' => 'form-control',
                                        'disabled' => 'disabled',
                                        'value' => $comp_detail->fn
                                    )); ?>
                                </div>
                            </div>   
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Description:</label>
                                    <?php echo form_textarea(array(
                                        'class' => 'form-control',
                                        'rows'  => '10',
                                        'disabled' => 'disabled',
                                        'value' => $comp_detail->csd
                                    )); ?>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="text-sh m-t-0">Other Information</h5>                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="form-group mb-3">
                                    <label>Complaint Image:</label>
                                    <img src="<?php echo base_url().$comp_detail->cimg ?>" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
