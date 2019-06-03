<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">All Complaints</h4>
            </div>
        </div>
    </div>
    <!-- End container-fluid-->
    <div class="card">
        <?php
            if($ar == 'College') {
        ?>
        <div class="card-header text-uppercase">
            <a href="<?php echo base_url('admin/addcomplaints') ?>" class="btn btn-success pull-right">Add Complaints</a>
        </div>
        <?php
            }
        ?>
        <div class="card-body">           
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            All Complaints

                        </div>
                        <div class="table-responsive">

                            <table class="table align-items-center table-flush">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Complaint</th>
                                        <th>Room</th>                                        
                                        <th>Flaw</th>
                                        <th>Date</th>
                                        <?php if ($ar == 'Administrator') {
                                        ?>
                                        <th>Action</th>                                        
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($complaints as $complaint) {
                                    ?>
                                    <tr>
                                        <td>
                                            <img alt="Image placeholder" src="<?php echo base_url().$complaint->cimg ?>" class="product-img" alt="complaint img">
                                        </td>
                                        <td><?php echo $complaint->cn ?></td>
                                        <td><?php echo $complaint->rn ?></td>
                                        <td><?php echo $complaint->fn ?></td>
                                        <td><?php echo $complaint->ccd ?></td>
                                        <?php if ($ar == 'Administrator') {
                                        ?>
                                        <td>
                                          <a href="<?php echo base_url('admin/agreeComp/'.$complaint->id); ?>"  
                                             class="btn btn-success btn-sm"><i class="fa fa-check"></i>
                                          </a>                                           
                                          <a href="<?php echo base_url('admin/rejectComp/'.$complaint->id); ?>" 
                                             class="btn btn-danger btn-sm"><i class="fa fa-times"></i>
                                          </a>
                                          <a href="<?php echo base_url('admin/comp-view/').$complaint->id; ?>" 
                                             class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                                          </a>
                                        </td>
                                        <?php
                                        }
                                        ?>
                                    </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Dashboard Content-->
        </div>        
    </div>
    <!--End Row-->
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Agreement Complaints</h4>
            </div>
        </div>
    </div>
    <!-- End container-fluid-->
    <div class="card">
        <div class="card-body">           
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">

                            <table class="table align-items-center table-flush">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Complaint</th>
                                        <th>Room</th>                                     
                                        <th>Flaw</th>
                                        <th>Date</th>                                     
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($agreecomp as $agree) {
                                    ?>
                                    <tr>
                                        <td>
                                            <img alt="Image placeholder" src="<?php echo base_url().$agree->cimg ?>" class="product-img" alt="agree img">
                                        </td>
                                        <td><?php echo $agree->cn ?></td>
                                        <td><?php echo $agree->rn ?></td>
                                        <td><?php echo $agree->fn ?></td>
                                        <td><?php echo $agree->ccd ?></td>
                                        <td>
                                          <a href="<?php echo base_url('admin/comp-view/').$agree->id; ?>" 
                                             class="btn btn-success btn-sm"><i class="fa fa-eye"></i>
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
            <!--End Dashboard Content-->
        </div>        
    </div>
    <!--End Row-->
    <?php if ($ar == 'Administrator') {
    ?>
    <div class="container-fluid">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Reject Complaints</h4>
            </div>
        </div>
    </div>
    <!-- End container-fluid-->
    <div class="card">
        <div class="card-body">           
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">

                            <table class="table align-items-center table-flush">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Complaint</th>
                                        <th>Room</th>                                     
                                        <th>Flaw</th>
                                        <th>Date</th>                                     
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rejectcomp as $reject) {
                                    ?>
                                    <tr>
                                        <td>
                                            <img alt="Image placeholder" src="<?php echo base_url().$reject->cimg ?>" class="product-img" alt="reject img">
                                        </td>
                                        <td><?php echo $reject->cn ?></td>
                                        <td><?php echo $reject->rn ?></td>
                                        <td><?php echo $reject->fn ?></td>
                                        <td><?php echo $reject->ccd ?></td>
                                        <td>
                                          <a href="<?php echo base_url('admin/comp-view/').$reject->id; ?>" 
                                             class="btn btn-danger btn-sm"><i class="fa fa-eye"></i>
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
            <!--End Dashboard Content-->
        </div>        
    </div>
    <!--End Row-->
    <?php
    } ?>
</div>
<!--End content-wrapper-->