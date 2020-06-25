
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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Quote Submission</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Quote Submission</li>
                 
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
         

         <form action="<?php echo base_url(); ?>user/quotation_save" method="post" enctype="multipart/form-data">
            
            <div class="row">
              <div class="input-field col s12">
                <input name="u_rfp" type="text">
                <label for="u_rfp">ENTER RFP NUMBER</label>
                <span style="color:red"; ><?php echo form_error("a_title"); ?>
              </div>
             
            </div>

                <div class="row">
        <div class="col s12">
           <div id="view-date-picker">
              <label for="birthdate">SELECT RFP DATE</label>
                <input type="text" name= "u_date" class="datepicker" id="birthdate">
           </div>
         
           
        </div>

      </div>


 <div class="row">
              <div class="input-field col s12">
                <input name="u_base" type="text">
                <label for="u_base">ENTER BASE AMMOUNT</label>
                <span style="color:red"; ><?php echo form_error("a_title"); ?>
              </div>
             
            </div>

            <div class="row">
              <div class="input-field col s12">
                <input name="u_gst" type="text">
                <label for="u_gst">ENTER GST AMMOUNT</label>
                <span style="color:red"; ><?php echo form_error("a_title"); ?>
              </div>
             
            </div>
         

             <div class="row">
                <div class="col s12 file-field input-field">
                  <div class="btn float-right">
                    <span>UPLOAD SIGNED QUOTE</span>
                    <input type="file" name="u_qut">
                  </div>
                  <div class="file-path-wrapper">
                  	<input class="file-path validate" type="text">
                  </div>
                </div>
            </div>

	
          
              <div id="view-checkboxes">
                  <p class="mb-1">
                     <label>
                        <input type="checkbox" name= "u_acceptence" id= "u_acceptence" 
                               value="Acceptencefor the code of conduct" />
                             <span>Accept terms & conditions of RFP </span>
                     </label>
                  </p>
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
  