
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
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Register Vender</span></h5>
              </div>
              <div class="col s12 m6 l6 right-align-md">
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>main">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Register</li>
                 
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
         

         <form action="<?php echo base_url(); ?>main/v_save" method="post" enctype="multipart/form-data">
            
            <div class="row">
              <div class="input-field col m6 s12">
                <input name="v_name" type="text">
                <label for="v_name">VENDOR NAME</label>
                <span style="color:red"; ><?php echo form_error("v_name"); ?>
              </div>
              <div class="input-field col m6 s12">
                <input name="v_address" type="text">
                <label for="v_address">VENDOR ADDRESS</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col m6 s12">
                <input name="v_city" type="text">
                <label for="v_city">CITY</label>
              </div>
              <div class="input-field col m6 s12">
                <input name="v_state" type="text">
                <label for="v_state">STATE</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col m6 s12">
                <input name="v_pincode" type="text">  
                <label for="v_pincode">PINCODE</label>
              </div>
              <div class="input-field col m6 s12">
                <input name="v_nature" type="text">
                <label for="v_nature">NATURE OF BUSINESS</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col m6 s12">
                <input name="v_phone" type="text">
                <label for="v_phone">PHONE NO.</label>
              </div>
              <div class="input-field col m6 s12">
                <input name="v_mobile" type="text">
                <label for="v_mobile">MOBILE NO.</label>
              </div>
            </div>

              <div class="row">
              <div class="input-field col m6 s12">
                <input name= "v_website" type="text">
                <label for="v_website">WEBSITE ID</label>
              </div>
              <div class="input-field col m6 s12">
                <input name="v_email" type="text">
                <label for="v_email">EMAIL ID</label>
              </div>
            </div>

              <div class="row">
              <div class="input-field col m6 s12">
                <input name="v_panno" type="text">
                <label for="v_panno">PAN NO. (Copy attached)</label>
              </div>
                 <div class="col m6 s12 file-field input-field">
                <div class="btn float-right">
                  <span>File</span>
                  <input type="file" name="v_panfile">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>

              <div class="row">
                <div class="input-field col s12">
                   <input name="v_tanno" type="text">
                   <label for="v_tanno">TAN NO.</label>
                </div>
             </div>

            <div class="row">
              <div class="input-field col m6 s12">
                <input name="v_gstno" type="text">
                <label for="v_gstno">GSTIN# (Form-6 Copy Attached)</label>
              </div>
                 <div class="col m6 s12 file-field input-field">
                <div class="btn float-right">
                  <span>File</span>
                  <input type="file" name="v_gstfile">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
              </div>
            </div>


        <div class="card-title">
          <div class="row">
            <div class="col s12 m6 l10">
              <h4 class="card-title">GST STATUS</h4>
            </div>
          </div>
        </div>

        <div id="view-radio-buttons">
           <p class="mb-1">
              <label>
                <input name="status" type="radio" value="active" checked />
                <span>Active</span>
              </label>
            </p>
            <p class="mb-1">
              <label>
                <input name="status" type="radio" value="inactive" />
                <span>Inactive </span>
              </label>
            </p>
       
        </div>


          <div class="row">
              <div class="input-field col m6 s12">
                <input name="v_uinno" type="text">
                <label for="v_uinno">UIN NO.</label>
              </div>
              <div class="input-field col m6 s12">
                <input name="v_msmeno" type="text">
                <label for="v_msmeno">MSME NO.</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col  s12">
                <select name="v_coo">
                  <option value="">Please select</option>
                  <option value="1">Option_1</option>
                  <option value="2">Option_2</option>
                  <option value="3">Option_3</option>
                </select>
                <label>CONSTITUTION OF ORGANIZATION</label>
              </div>
           </div>


             <div class="row">
              <div class="input-field col m6 s12">
                <input name="v_primary" type="text">
                <label for="v_primary">Primany Contact Person</label>
              </div>
              <div class="input-field col m6 s12">
                <input name="v_contact" type="text">
                <label for="v_contact">Contact Number</label>
              </div>
            </div>

               <div class="row">
              <div class="input-field col m6 s12">
                <input name="v_email1" type="email">
                <label for="v_email1s">Email</label>
              </div>
              <div class="input-field col m6 s12">
                <input name="v_designation" type="text">
                <label for="v_designation">Desingation</label>
              </div>
            </div>
  
        <div class="card-title">
          <div class="row">
            <div class="col s12 m6 l10">
              <h4 class="card-title">Acceptence</h4>
            </div>
         
          </div>
        </div>
        <div id="view-checkboxes">
           <p class="mb-1">
              <label>
                <input type="checkbox" name= "v_acceptence[]" id= "v_acceptence" 
                       value="Acceptencefor the code of conduct" />
                       <span>Acceptence for Code of Conduct </span>
              </label>
            </p>
            <p class="mb-1">
              <label>
                <input type="checkbox" name= "v_acceptence[]" id= "v_acceptence" 
                       value="Acceptence for NDA" />
                       <span>Acceptance for NDA</span>
              </label>
            </p>
        </div>

         <div class="row">

          <button class="waves-effect waves-light btn gradient-45deg-light-blue-cyan z-depth-4 mr-1 mb-2 right"         type="submit">Submit
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
