<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  
   public function __construct()
   {
   	 parent::__construct();
   	 $this->load->model('Main_Model');
   
   }
	
	public function index()
	{
		$this->load->view('admin/a_rfp.php');
	}

	public function my_rfp()
	{
	    $this->load->model('Main_Model');
		$data['fetch_data'] = $this->Main_Model->fetch_rfp();
		$this->load->view('admin/my_rfp.php', $data);
	}

	public function  rfp_save()
       {
        $posts = $this->input->post();
	  	$file = $this->upload_file();
	    $this->load->library('form_validation');
	  	$this->form_validation->set_rules('a_title', 'Title', 'required');

	  	if($this->form_validation->run())
	     	{
               

                $data['title'] = $posts['a_title'];
                $data['t_desc'] = $posts['a_desc'];
                $data['document'] = $file['file_name'];
                $data['l_date'] = $posts['a_date'];
                $data['vender'] = $posts['a_vender'];
                $data['emails'] = $posts['a_emails'];
                
                $this->load->model('Main_Model');
                $this->Main_Model->insert_rfp($data);
                redirect(base_url(). "main/inserted");
	  	    }
	  	else
	  	    {
	  	    	die('error');
	  	    	$this->v_register();
	  	    }    
       }

       public function upload_file()
        {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'pdf|xls';
                $this->load->library('upload', $config);

              if ( ! $this->upload->do_upload('a_doc'))
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
	    	$rfp_id = $id;
	    	$this->load->model('Main_Model');
	    	$data['v_data'] = $this->Main_Model->fetch_single_rfp($rfp_id);
	    	$this->load->view('vender/viewpage', $data);
	    }

	    
     public function excel_export_rfp()
		 { 
            
            $this->load->model('Main_Model');
		    $data['fetch_data'] = $this->Main_Model->fetch_rfp();
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
             $objPHPExcel -> getActiveSheet() -> setCellValue('B1', 'Title');
             //$objPHPExcel -> getActiveSheet() ->setCellValue('C1', 'Email');
             // $objPHPExcel -> getActiveSheet() ->setCellValue('D1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('E1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('F1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('G1',);
             // $objPHPExcel -> getActiveSheet() ->setCellValue('H1',);

             $row = 2;

             foreach ($values as $key => $value)
               {
                 $objPHPExcel -> getActiveSheet() -> setCellValue('A'.$row,$value->id);
                 $objPHPExcel -> getActiveSheet() -> setCellValue('B'.$row,$value->title);
                 //$objPHPExcel -> getActiveSheet() -> setCellValue('C'.$row,$value->v_email);
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
 }
