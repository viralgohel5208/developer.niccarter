<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Company Report</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table1" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Action</th>
                                    <th>Company Name</th>                                    
                                    <th>Address</th>
                                    <th>Market Cap (in million)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i=1;
                                if(count($data) > 0){
                                foreach($data as $data):
                                ?>
                                    <tr>
                                        <td><?=$i;?></td>
                                        <td>
                                            <a href="<?php echo site_url('admin/company/edit/'.base64_encode($data['id'])); ?>"><i class="fa fa-pencil fa-2x text-warning" aria-hidden="true"></i></a><br>
                                            <a href="<?php echo site_url('admin/company/delete/'.base64_encode($data['id'])); ?>"><i class="fa fa-trash fa-2x text-danger" aria-hidden="true" onclick="return confirm('Are you sure to delete?');"></i></a><br>
                                        </td>
                                        <td><?=$data['company_name'];?></td>                                        
                                        <td><?=$data['company_address']; ?></td>                                       
                                        <td><?=$data['employees']; ?></td>
                                    </tr>
                                <?php
                                $i++;
                                endforeach;
                                }else{ ?>
                                    <tr><td colspan="11">No Data Found.</td></tr>
                                <?php } ?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>