<div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Employee Report</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table1" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Action</th>
                                    <th>Employee Name</th>                                    
                                    <th>Address</th>
                                    <th>Company Name</th>
                                    <th>Salary</th>
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
                                            <a href="<?php echo site_url('admin/employee/edit/'.base64_encode($data['id'])); ?>"><i class="fa fa-pencil fa-2x text-warning" aria-hidden="true"></i></a><br>
                                            <a href="<?php echo site_url('admin/employee/delete/'.base64_encode($data['id'])); ?>"><i class="fa fa-trash fa-2x text-danger" aria-hidden="true" onclick="return confirm('Are you sure to delete?');"></i></a><br>
                                        </td>
                                        <td><?=$data['name'];?></td>                                        
                                        <td><?=$data['email']; ?></td>                                       
                                        <td><?=$data['company_name']; ?></td>
                                        <td><?=$data['salary_amount']; ?></td>
                                    </tr>
                                <?php
                                $i++;
                                endforeach;
                                }else{ ?>
                                    <tr><td colspan="11">No Data Found.</td></tr>
                                <?php } ?>
                            </tbody>
                            <!--<tfoot>-->
                            <!--    <tr>-->
                            <!--        <th>Sr No</th>-->
                            <!--        <th>Action</th>-->
                            <!--        <th>Name</th>-->
                            <!--        <th>Price</th>-->
                            <!--        <th>Days</th>-->
                            <!--        <th>Photo</th>-->
                            <!--        <th>Description</th>-->
                            <!--        <th>Status</th>-->
                            <!--        <th>Date</th>-->
                            <!--        <th>Entry User</th>-->
                            <!--    </tr>-->
                            <!--</tfoot>-->
                        </table>
                    </div>
                </div>
            </div>