
<?php 
      $this->load->view('header/header');
      $this->load->view('header/side_nav');
       $this->load->view('header/card');
?>


   
    <div class="row">
             <div class="col s12">
               <a href = "<?php echo base_url(); ?>admin/excel_export_rfp" 
                  class="waves-effect waves-light btn gradient-45deg-green-teal z-depth-4 mr-1 mb-2">export</a>
            </div>
          </div>


  <div class="row">
    <div class="col s12 m12 l12">
      <div id="responsive-table" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Purchase Order's</h4>
      
          <div class="row">
            <div class="col s12">
            </div>
            <div class="col s12">
              <table class="responsive-table">
                <thead>
                  <tr>
                    <th data-field="id">ID</th>
                    <th data-field="name">Title</th>
                    <th data-field="name">created_date</th>
                    <th data-field="name" style="color: blue;">Action</th>
                  </tr>
                   </thead>
                <tbody>
                  <?php



                 if($fetch_data->num_rows() > 0)
                  {
                     $data = $fetch_data->result();
                     foreach($data as $row)
                        {
                           ?>
                              <tr>
                                <td><?php echo $row->id; ?></td>
                                <td><?php echo $row->title; ?></td>
                                <td><?php echo date("d-m-Y",strtotime($row->created_date)); ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/view/'.$row->id); ?>">View</a>
                                      /
                                <a href="<?php echo base_url('admin/pdf/'.$row->id); ?>" style="color: green;">Download</a>
                                
                                </td>
   
                              </tr>
                           <?php
                        }
                  }
             
               else
                  {
                     ?>
                            <tr>
                                 <td colspan="3">No Data Found</td>
                            </tr>
                     <?php
                  }

                  ?>
               
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php 
      $this->load->view('header/footer');
?>
