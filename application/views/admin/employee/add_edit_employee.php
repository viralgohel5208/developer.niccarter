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
                    <h6 class="d-block card-header py-3 m-0 font-weight-bold text-primary"><?php if(isset($row_data)){ echo 'Edit'; }else{ echo 'Add'; } ?> Employee Detail</h6>
                    <div class="card-body">
                        <form role="form" id="form" action="<?php if(!isset($row_data)){ echo site_url('admin/employee/create'); }else{ echo site_url('admin/employee/update/'.base64_encode($row_data['id'])); }?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" id="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Employee Name *</label>
                                    <input type="text" name="name" class="form-control" value="<?php if(isset($row_data)){ echo $row_data['name']; } ?>" required>
                                </div>
    
                                <div class="form-group col-md-6">
                                    <label>Email *</label>
                                    <input type="email" name="email" class="form-control" value="<?php if(isset($row_data)){ echo $row_data['email']; } ?>" required>                 
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Company Name</label>
                               
                               <?php  $this->db->select('*');
                                      $this->db->from('company');
                                      $data = $this->db->get()->result_array();
                                ?>

                                    <select id="company_id" name="company_id" class="form-control" required> 

                                    <?php foreach($data as $company) {  ?>
                                       <option value="<?=$company['id'] ?>" <?php if(isset($row_data['company_id']) && $row_data['company_id']==$company['id']){ echo "selected"; } ?>><?=$company['company_name'] ?></option>                                                                                                              
                                    <?php } ?>                                    
                                   
                                </select>
                                    
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label>Salary</label>
                               
                               <?php  $this->db->select('*');
                                      $this->db->from('salary');
                                      $data = $this->db->get()->result_array();
                                ?>

                                    <select id="salary_id" name="salary_id" class="form-control" required> 

                                    <?php foreach($data as $salary) {  ?>
                                       <option value="<?=$salary['id'] ?>" <?php if(isset($row_data['salary_id']) && $row_data['salary_id']==$salary['id']){ echo "selected"; } ?>><?=$salary['salary_amount'] ?></option>                                                                                                              
                                    <?php } ?>                                    
                                   
                                </select>
                                    
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
            // var email = CKEDITOR.instances['email'].getData();
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