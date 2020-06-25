<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
  
   public function __construct()
   {
   	 parent::__construct();
   	 $this->load->model('Main_Model');
   	 $this->load->library('Pdf');
   }
	
	public function index()
	{
		$this->load->model('Main_Model');
		$data['fetch_data'] = $this->Main_Model->fetch_data();
		$this->load->view('vender/home.php', $data);
	}



	 public function v_save()
	  {
	  	$posts = $this->input->post();
	  	$file = $this->upload_file();
	  //	print_r($file); die();

	  	$this->load->library('form_validation');
	  	$this->form_validation->set_rules('v_name', 'Vender Name', 'required');

	  	if($this->form_validation->run())
	     	{
                
                $data['v_name'] = $posts['v_name'];
                $data['v_address'] = $posts['v_address'];
                $data['v_city'] = $posts['v_city'];
                $data['v_state'] = $posts['v_state'];
                $data['v_pincode'] = $posts['v_pincode'];
                $data['v_nature'] = $posts['v_nature'];
                $data['v_phone'] = $posts['v_phone'];
                $data['v_mobile'] = $posts['v_mobile'];
                $data['v_website'] = $posts['v_website'];
                $data['v_email'] = $posts['v_email'];
                $data['v_panno'] = $posts['v_panno'];
				$data['v_panfile'] = $file['file_name'];
				$data['v_tanno'] = $posts['v_tanno'];
				$data['v_gstno'] = $posts['v_gstno'];
				$data['v_gstfile'] = $posts['v_gstfile'];
				$data['status'] = $posts['status'];
				$data['v_uinno'] = $posts['v_uinno'];
				$data['v_msmeno'] = $posts['v_msmeno'];
				$data['v_coo'] = $posts['v_coo'];
				$data['v_primary'] = $posts['v_primary'];
				$data['v_contact'] = $posts['v_contact'];
				$data['v_email1'] = $posts['v_email1'];
				$data['v_designation'] = $posts['v_designation'];
                $data['v_acceptence'] = implode("," , $posts['v_acceptence']);


                $this->load->model('Main_Model');
                $this->Main_Model->insert_data($data);
                redirect(base_url(). "main/inserted");
	  	    }
	  	else
	  	    {
	  	    	$this->v_register();
	  	    }    
	  }

	  public function inserted()
	    {
	    	$this->index();
	    }

	  public function upload_file()
        {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $this->load->library('upload', $config);

              if ( ! $this->upload->do_upload('v_panfile'))
                  {
                    $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                    $error = array('error' => $this->upload->display_errors());
                  }
              else
                  {
                     return $this->upload->data();
                  }
         }

   

	     public function view($id)
	    {
	    	$vender_id = $id;
	    	$this->load->model('Main_Model');
	    	$data['v_data'] = $this->Main_Model->fetch_single($vender_id);
	    	$this->load->view('vender/viewpage', $data);
	    } 

	public function pdf($id)
	    {
	    	$vender_id = $id;
	    	$html_content = "<h3 align='center'>Vender Data</h3>";
	    	$html_content .= $this->Main_Model->fetch_single($vender_id);
	    	$this->pdf->loadHtml($html_content);
	    	$this->pdf->render();
	    	$this->pdf->stream("".$vender_id.".pdf", array('Attachment'=>0));


	    } 




	public function excel_export()
		 { 
           
            $this->load->model('Main_Model');
		    $data['fetch_data'] = $this->Main_Model->fetch_data();
            $values = $data['fetch_data']->result();
		    


             require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
             require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

             $objPHPExcel  =   new PHPExcel();

             $objPHPExcel -> getproperties() -> setCreator("");
             $objPHPExcel -> getproperties() -> setLastModifiedBy("");
             $objPHPExcel -> getproperties() -> setTitle("");
             $objPHPExcel -> getproperties() -> setSubject("");
             $objPHPExcel -> getproperties() -> setDescription("");
              
             $objPHPExcel -> setActiveSheetIndex(0);

             $objPHPExcel -> getActiveSheet() -> setCellValue('A1', 'ID');
             $objPHPExcel -> getActiveSheet() -> setCellValue('B1', 'Vender Name');
             $objPHPExcel -> getActiveSheet() ->setCellValue('C1', 'Email');
             // $objPHPExcel -> getActiveSheet() ->setCellValue('D1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('E1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('F1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('G1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('H1',);

             $row = 2;

             foreach ($values as $key => $value)
               {
                 $objPHPExcel -> getActiveSheet() -> setCellValue('A'.$row,$value->id);
                 $objPHPExcel -> getActiveSheet() -> setCellValue('B'.$row,$value->v_name);
                 $objPHPExcel -> getActiveSheet() -> setCellValue('C'.$row,$value->v_email);
                 $row++;
               }

               $filename = "Task-Exported-on-".date('Y-m-d H-i-i-s').'.xlsx';
               $objPHPExcel -> getActiveSheet() -> setTitle("Task-overview");

               header('Content-Type: application/vnd.openxmlformats-officedocument..spreadsheetml.sheet');
               header('content-Disposition: attachment; filename="'.$filename.'"');
               header('cache-control: max-age-0');

               $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
               $writer -> save('php://output');
               exit;
     }

     public function export_single($id)
     { 
           
            $this->load->model('Main_Model');
            $data['fetch_data'] = $this->Main_Model->test($id);
            $values = $data['fetch_data']->result();
        


             require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
             require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

             $objPHPExcel  =   new PHPExcel();

             $objPHPExcel -> getproperties() -> setCreator("");
             $objPHPExcel -> getproperties() -> setLastModifiedBy("");
             $objPHPExcel -> getproperties() -> setTitle("");
             $objPHPExcel -> getproperties() -> setSubject("");
             $objPHPExcel -> getproperties() -> setDescription("");
              
             $objPHPExcel -> setActiveSheetIndex(0);

             $objPHPExcel -> getActiveSheet() -> setCellValue('A1', 'ID');
             $objPHPExcel -> getActiveSheet() -> setCellValue('B1', 'Vender Name');
             $objPHPExcel -> getActiveSheet() ->setCellValue('C1', 'Email');
             // $objPHPExcel -> getActiveSheet() ->setCellValue('D1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('E1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('F1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('G1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('H1',);

             $row = 2;

             foreach ($values as $key => $value)
               {
                 $objPHPExcel -> getActiveSheet() -> setCellValue('A'.$row,$value->id);
                 $objPHPExcel -> getActiveSheet() -> setCellValue('B'.$row,$value->v_name);
                 $objPHPExcel -> getActiveSheet() -> setCellValue('C'.$row,$value->v_email);
                 $row++;
               }

               $filename = "Task-Exported-on-".date('Y-m-d H-i-i-s').'.xlsx';
               $objPHPExcel -> getActiveSheet() -> setTitle("Task-overview");

               header('Content-Type: application/vnd.openxmlformats-officedocument..spreadsheetml.sheet');
               header('content-Disposition: attachment; filename="'.$filename.'"');
               header('cache-control: max-age-0');

               $writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
               $writer -> save('php://output');
               exit;
     }

         public function logout()
      {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_email');
        redirect('user/login');
      }


}
