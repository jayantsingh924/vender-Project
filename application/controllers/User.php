<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  
   public function __construct()
   {
   	 parent::__construct();
   	 $this->load->model('Main_Model');
   
   }

    public function index()
  {
    $this->load->model('Main_Model');
    $data['fetch_data'] = $this->Main_Model->fetch_data();
    $this->load->view('user/dashboard.php', $data);
  }
	
	public function qut()
	{
		$this->load->view('user/u_quotation.php');
	}

    public function v_register()
   {
    $this->load->view('vender/v_register.php');
   }

    public function my_rfp()
  {
      $this->load->model('Main_Model');
    $data['fetch_data'] = $this->Main_Model->fetch_rfp();
    $this->load->view('user/my_rfp.php', $data);
  }

    public function purchase_order()
     {
        $this->load->model('Main_Model');
        $data['fetch_data'] = $this->Main_Model->fetch_rfp();
        $this->load->view('user/purchase_order.php', $data);
     }

  public function bill_sub()
    {
      $this->load->view('user/Bill_sub.php');
    } 

	public function qutations()
	{
	    $this->load->model('Main_Model');
		  $data['fetch_data'] = $this->Main_Model->fetch_qutations();
		  $this->load->view('user/quotation_list.php', $data);
	}

	public function  quotation_save()
       {
        $posts = $this->input->post();
	  	  $file = $this->upload_file();
	      $this->load->library('form_validation');
	  	  $this->form_validation->set_rules('u_rfp', 'RFP', 'required');

	  	if($this->form_validation->run())
	     	{
              

                $data['u_rfp'] = $posts['u_rfp'];
                $data['u_date'] = $posts['u_date'];
                $data['u_base'] = $posts['u_base'];
                $data['u_gst'] = $posts['u_gst'];
                $data['u_qut'] = $file['file_name'];
                $data['u_acceptence'] = $posts['u_acceptence'];

                
                $this->load->model('Main_Model');
                $this->Main_Model->insert_quotation($data);
                redirect(base_url(). "main/inserted");
	  	    }
	  	else
	  	    {
	  	    	
	  	    	$this->v_register();
	  	    }    
       }

       public function upload_file()
        {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'pdf|xls';
                $this->load->library('upload', $config);

              if ( ! $this->upload->do_upload('u_qut'))
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
	    	$data['v_data'] = $this->Main_Model->fetch_single_qut($rfp_id);
	    	$this->load->view('vender/viewpage', $data);
	    }
    public function excel_export_qut()
      { 
            
            $this->load->model('Main_Model');
            $data['fetch_data'] = $this->Main_Model->fetch_qutations();
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
             $objPHPExcel -> getActiveSheet() -> setCellValue('B1', 'RFP Number');
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
                 $objPHPExcel -> getActiveSheet() -> setCellValue('B'.$row,$value->u_rfp);
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
	    
  
  public function register()
  {
    $this->load->view('user/register.php');
  }

  public function save()
       {
        
        $posts = $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[12]');

      if($this->form_validation->run())
        {
              

                $data['user_name'] = $posts['name'];
                $data['user_email'] = $posts['email'];
                $data['user_pass'] = $posts['password'];
            
                $this->load->model('Main_Model');
                $this->Main_Model->insert_user($data);
                redirect(base_url(). "main/inserted");
          }
      else
          {
            
            $this->register();
          }    
       }

    public function login()
      {
        $this->load->view('user/login.php');
      }

      public function login_check()
      {
        $data = $this->input->post(); 
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
           {   
             $this->load->view('user/login');
           }
       else
           {  
    
        if(isset($_POST['email']))
          {
             $user_data = $this->Main_Model->check_login($_POST['email'],md5($_POST['password']));
              if(!empty($user_data))
                 {
                    $session_data = array(
                                          'user_id' => $user_data['user_id'],
                                          'user_email' => $user_data['user_email']
                                          );

                    $this->session->set_userdata($session_data);
                    redirect('user/dashboard');
                  }
              else
                  {
                    $this->session->set_flashdata('error', 'Invalid Username and Password');
                    redirect('user/login');
                  } 
           }
         }
      }
      
    public function dashboard()
      {
          
        $login = $this->session->userdata('user_email');
          if (empty($login))
             {
                redirect('user/login');
             }
           else
             {
               // print_r($_SESSION); 
               // echo '<label><a href="'.base_url().'user/logout">Logout</a></label>';
              // die();
              $this->index();
             }
          
         }




 }
