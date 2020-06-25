<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Model extends CI_Model {

	function insert_data($data)
	 {
      
       $this->db->insert("tbl_ven_vender", $data);

	 }

	function insert_rfp($data)
	 {
      
       $this->db->insert("tbl_ven_rfp", $data);
     }

    function insert_quotation($data)
	 {
      
       $this->db->insert("tbl_ven_quote", $data);
     }

     function insert_user($data)
	 {
      
       $this->db->insert("tbl_ven_user", $data);
     }
     

    function fetch_rfp()
	 {
	   	  $query = $this->db->get("tbl_ven_rfp");
	   	  return $query;
	 }

	  function fetch_order()
	 {
	   	  $query = $this->db->get("tbl_ven_porder");
	   	  return $query;
	 }
	 
	 function fetch_qutations()
	 {
	   	  $query = $this->db->get("tbl_ven_quote");
	   	  return $query;
	 }

	function fetch_data()
	 {
	   	  $query = $this->db->get("tbl_ven_vender");
	   	  return $query;
	 }

	function fetch_single($vender_id)
	   {
	   	 $this->db->where('id', $vender_id);
	   	 $data = $this->db->get('tbl_ven_vender');

	   	 $output = '<table width="100%" cellspacing="5" cellpadding="5">';
	   	 foreach ($data->result() as $row)
	   	 	  {
	   	     // <td width="25%"><img src="'.base_url().'uploads/'.$row->v_panfile.'" /></td>
	   	 	  	$output .= '<tr>
							
							    <td width="75%">
							     <p><b>Name : </b>'.$row->id.'</p>
							     <p><b>Address : </b>'.$row->v_name.'</p>
							    </td>
							 </tr>';

               }
				  $output .= '
				  <tr>
				   <td colspan="2" align="center"><a href="'.base_url().'main" class="btn btn-primary">Back</a></td>
				  </tr>
				  ';
				  $output .= '</table>';
				  return $output;
				 }

	function fetch_single_rfp($vender_id)
	   {
	   	 $this->db->where('id', $vender_id);
	   	 $data = $this->db->get('tbl_ven_rfp');

	   	 $output = '<table width="100%" cellspacing="5" cellpadding="5">';
	   	 foreach ($data->result() as $row)
	   	 	  {
	   	     // <td width="25%"><img src="'.base_url().'uploads/'.$row->v_panfile.'" /></td>
	   	 	  	$output .= '<tr>
							
							    <td width="75%">
							     <p><b>Name : </b>'.$row->id.'</p>
							     <p><b>Address : </b>'.$row->title.'</p>
							    </td>
							 </tr>';

               }
				  $output .= '
				  <tr>
				   <td colspan="2" align="center"><a href="'.base_url().'admin" class="btn btn-primary">Back</a></td>
				  </tr>
				  ';
				  $output .= '</table>';
				  return $output;
	    }

	    function fetch_single_qut($qut_id)
	   {
	   	 $this->db->where('id', $qut_id);
	   	 $data = $this->db->get('tbl_ven_quote');

	   	 $output = '<table width="100%" cellspacing="5" cellpadding="5">';
	   	 foreach ($data->result() as $row)
	   	 	  {
	   	     // <td width="25%"><img src="'.base_url().'uploads/'.$row->v_panfile.'" /></td>
	   	 	  	$output .= '<tr>
							
							    <td width="75%">
							     <p><b>Name : </b>'.$row->id.'</p>
							     <p><b>Address : </b>'.$row->u_rfp.'</p>
							    </td>
							 </tr>';

               }
				  $output .= '
				  <tr>
				   <td colspan="2" align="center"><a href="'.base_url().'admin" class="btn btn-primary">Back</a></td>
				  </tr>
				  ';
				  $output .= '</table>';
				  return $output;
	    }

	 function test($vender_id)
	   {
	   	 $this->db->where('id', $vender_id);
	   	 $data = $this->db->get('tbl_ven_vender');
	   	 return $data;
       }

       public function check_login($email,$password){
      $sql = $this->db->get_where('tbl_ven_user',array('user_email'=>$email,'user_pass'=>$password));
      return $sql->row_array();
     }

}

?>
