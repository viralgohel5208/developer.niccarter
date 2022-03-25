<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employee</h1>
    </div>
    
    <?php  if($this->session->flashdata('flash_message')!=""){$message= $this->session->flashdata('flash_message');  ?>
    
                    <div class="alert alert-<?=$message['class']; ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <?php echo $message['message']; ?>
                    </div>
                    
    <?php  $this->session->set_flashdata('flash_message' , "");
                }  ?>
                
            <div class="card shadow mb-4">
                <!--<a href="#collapseCardExample" class="d-block card-header py-3 <?php if(!isset($row_data)){ echo 'collapsed'; } ?>" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">-->
                <!--    <h6 class="m-0 font-weight-bold text-primary"><?php if(isset($row_data)){ echo 'Edit'; }else{ echo 'Add'; } ?> Course</h6>-->
                <!--</a>-->
                <div class="collapse show" id="collapseCardExample">
                    <h6 class="d-block card-header py-3 m-0 font-weight-bold text-primary"><?php if(isset($row_data)){ echo 'Edit'; }else{ echo 'Add'; } ?> Salary Detail</h6>
                    <div class="card-body">
                        <form role="form" id="form" action="<?php if(!isset($row_data)){ echo site_url('admin/salary/create'); }else{ echo site_url('admin/salary/update/'.base64_encode($row_data['id'])); }?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Salary Amount *</label>
                                    <input type="text" name="salary_amount" class="form-control" value="<?php if(isset($row_data)){ echo $row_data['salary_amount']; } ?>" required>
                                </div>
    
                                <div class="form-group col-md-6">
                                    <label>Salary Period *</label>
                                    <input type="text" name="salary_period" class="form-control" value="<?php if(isset($row_data)){ echo $row_data['salary_period']; } ?>" required>                 
                                </div>
                                

                            </div>
                            <div class="row float-right m-3">
                                <input type="submit" id="submit" class="btn btn-outline-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#table1').DataTable({});
        $("#form").on('click', '#submit', function(e) {
            // var salary_period = CKEDITOR.instances['salary_period'].getData();
            var description = CKEDITOR.instances['description'].getData();
            e.preventDefault();
            if (description.length > 0) {
                $(this).unbind(e);
                $("#submit").click();
            } else {
                alert('Please enter description');
            }
        });
    });
</script>