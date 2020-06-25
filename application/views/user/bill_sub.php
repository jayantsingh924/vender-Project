
<?php 
      $this->load->view('header/header');
      $this->load->view('header/side_nav');
?>


   <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div class="pt-3 pb-1" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s12 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>BILL SUBMISSION</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>user">Home</a>
                  </li>
                  <li class="breadcrumb-item active">submission</li>
                 
                </ol>
              </div>
            </div>
          </div>
        </div>
       

 <div class="col s12">
      <div class="container">
          <div class="seaction">

              <div class="card">
                <div class="card-content">
                  <p class="caption mb-0">We are still working on this form.</p>
                </div>
              </div>

 
  <div class="row">
     <div class="col s12 m12 l12">
       <div id="Form-advance" class="card card card-default scrollspy">
         <div class="card-content">
         

         <form action="<?php echo base_url(); ?>admin/rfp_save" method="post" enctype="multipart/form-data">
            
            <div class="row">
              <div class="input-field col s12">
                <input name="po_number" type="text">
                <label>P.O. NUMBER</label>
                <span style="color:red"; ><?php echo form_error("po_number"); ?>
              </div>
            </div>

            <div class="row">
               <div class="col s12">
                   <div id="po_date">
                       <label>P.O. DATE</label>
                       <input type="text" name= "po_date" class="datepicker" id="birthdate">
                   </div>
               </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input name="base_amm" type="text">
                <label>BASE AMMOUNT</label>
                <span style="color:red"; ><?php echo form_error("base_amm"); ?>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input name="gst_amm" type="text">
                <label>GST AMMOUNT</label>
                <span style="color:red"; ><?php echo form_error("gst_amm"); ?>
              </div>
            </div>

            <div class="row">
               <div class="col s12 file-field input-field">
                  <div class="btn float-right">
                     <span>UPLOAD PDF BILL</span>
                     <input type="file" name="pdf">
                  </div>
                  <div class="file-path-wrapper">
                     <input class="file-path validate" type="text">
                  </div>
              </div>
            </div>

     
              



   <div class="row">
      <button class="waves-effect waves-light btn gradient-45deg-light-blue-cyan 
                      z-depth-4 mr-1 mb-2 right" type="submit">Submit
            <i class="material-icons right">send</i>
       </button>
   </div>
 </div>
     
       </form>
        
               </div>
           </div>
       </div>
   </div>
            </div>
          </div>
        <div class="content-overlay"></div>
      </div>
    </div>
  </div>
    
<!-- END: Page Main-->


    

<?php 
      $this->load->view('header/footer');
  
?>
  