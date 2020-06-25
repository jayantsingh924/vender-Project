
<?php 
      $this->load->view('header/header');
      $this->load->view('header/side_nav');
?>


    <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div class="col s12">
          <div class="container">
            <div class="section">

   <!--card stats start-->
   <div id="card-stats" class="pt-0">
      <div class="row">
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">add_shopping_cart</i>
                        <p>Purchase order</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">690</h5>
                        <p class="no-margin">New</p>
                        <p>6,00,00</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">perm_identity</i>
                        <p>Vendor</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">1885</h5>
                        <p class="no-margin">New</p>
                        <p>1,12,900</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">timeline</i>
                        <p>RFP</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">80%</h5>
                        <p class="no-margin">Growth</p>
                        <p>3,42,230</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col s12 m6 l6 xl3">
            <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
               <div class="padding-4">
                  <div class="row">
                     <div class="col s7 m7">
                        <i class="material-icons background-round mt-5">attach_money</i>
                        <p>Profit</p>
                     </div>
                     <div class="col s5 m5 right-align">
                        <h5 class="mb-0 white-text">$890</h5>
                        <p class="no-margin">Today</p>
                        <p>$25,000</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
<br/>
    <div class="row">
             <div class="col s12">
               <a href = "<?php echo base_url(); ?>main/excel_export" 
                  class="waves-effect waves-light btn gradient-45deg-green-teal z-depth-4 mr-1 mb-2">export</a>
            </div>
          </div>


  <div class="row">
    <div class="col s12 m12 l12">
      <div id="responsive-table" class="card card card-default scrollspy">
        <div class="card-content">
          <h4 class="card-title">Vender's List</h4>
      
          <div class="row">
            <div class="col s12">
            </div>
            <div class="col s12">
              <table class="responsive-table">
                <thead>
                  <tr>
                    <th data-field="id">ID</th>
                    <th data-field="name">Vender Name</th>
                    <th data-field="name">Email</th>
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
                                <td><?php echo $row->v_name; ?></td>
                                <td><?php echo $row->v_email; ?></td>
                                <td><?php echo date("d-m-Y",strtotime($row->register_date)); ?></td>
                                <td>
                                    <a href="<?php echo base_url('main/view/'.$row->id); ?>">View</a>
                                      /
                                <a href="<?php echo base_url('main/pdf/'.$row->id); ?>" style="color: red;">PDF</a>
                                     /
                                <a href="<?php echo base_url('main/export_single/'.$row->id); ?>" style="color: green;">Excel</a>
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
