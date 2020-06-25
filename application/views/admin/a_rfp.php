
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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Create RPF</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Home</a>
                  </li>
                  <li class="breadcrumb-item active">RFP</li>
                 
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
                <input name="a_title" type="text">
                <label for="a_title">TITLE OF RFP</label>
                <span style="color:red"; ><?php echo form_error("a_title"); ?>
              </div>
             
            </div>

            <div class="row">
              <div class="input-field col s12">
                <textarea name="a_desc" class="materialize-textarea"></textarea>
                <label for="textarea2">DESCRIPTION FOR RFP</label>
              </div>
             
            </div>

             <div class="row">
              
                 <div class="col s12 file-field input-field">
                <div class="btn float-right">
                  <span>UPLOAD DOCUMENT</span>
                  <input type="file" name="a_doc">

                </div>
                <div class="file-path-wrapper">
                	<input class="file-path validate" type="text">
                </div>
              </div>
            
            </div>

			<div class="row">
			  <div class="col s12">
			     <div id="view-date-picker">
			     	  <label for="birthdate">LAST DATE OF SUBMISSION</label>
			          <input type="text" name= "a_date" class="datepicker" id="birthdate">
			     </div>
			   
			     
			  </div>

			</div>
               <div class="row">
              <div class="input-field col  s12">
                <select name="a_vender">
                  <option value="">SELECT VENDOR</option>
                  <option value="1">Option_1</option>
                  <option value="2">Option_2</option>
                  <option value="3">Option_3</option>
                </select>
               
              </div>
           </div>

            <div class="row">
              <div class="input-field col s12">
                <textarea name="a_emails" class="materialize-textarea"></textarea>
                <label for="a_emails">EMAIL'S FOR ADDITIONAL RECIPIENTS</label>
                <span style="color:red"; ><?php echo form_error("a_emails"); ?>
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
  