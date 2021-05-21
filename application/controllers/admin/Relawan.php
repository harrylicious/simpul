<?php
class Relawan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
		$this->load->model('m_relawan');
		$this->load->library('upload');
		$this->load->library('form_validation');
	}


	function index(){
		//$kode=$this->session->userdata('idadmin');
		//$x['user']=$this->m_relawan->get_pengguna_login($kode);

		$x['data']=$this->m_relawan->get_all();
		$this->load->view('admin/v_relawan',$x);
	}

   function check_data(){
	   $this->form_validation->set_rules('username', 'Username', 'is_unique[relawan.username]');
	   if ($this->form_validation->run() == FALSE) {
		echo $this->session->set_flashdata('msg','exist');
		redirect('admin/relawan');
	   } else {
		   $this->save_data();
	   }
   }


	function save_data(){
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto'))
			{
					$gbr = $this->upload->data();
					//Compress Image
					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 300;
					$config['height']= 300;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					$nama_lengkap=$this->input->post('nama_lengkap');
					$ktp=$this->input->post('ktp');
					$jenis_kelamin=$this->input->post('jenis_kelamin');
					$username=$this->input->post('username');
					$password=$this->input->post('password');
					$konfirm_password=$this->input->post('password2');
					$email=$this->input->post('email');
					$alamat=$this->input->post('alamat');
					$tlpn=$this->input->post('tlpn');
					//$level=$this->input->post('xlevel');
					$data=array(
						'nama_lengkap'=>$nama_lengkap,
						'jenis_kelamin'=>$jenis_kelamin,
						'username'=>$username,
						'password'=>md5($password),
						'ktp'=> $ktp,
						'email'=>$email,
						'telp'=>$tlpn,
						'photo'=>$gambar,
						'alamat'=>$alamat
					);

					 if ($password <> $konfirm_password) {
						 echo $this->session->set_flashdata('msg','error');
						   redirect('admin/relawan');
					 }else{
						   $this->m_relawan->insert($data);
						echo $this->session->set_flashdata('msg','success');
						   redirect('admin/relawan');
						   
				 }
				
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/relawan');
			}
			 
		}else{
			$nama_lengkap=$this->input->post('nama_lengkap');
			$nik=$this->input->post('nik');
					$jenis_kelamin=$this->input->post('jenis_kelamin');
					$username=$this->input->post('username');
					$password=$this->input->post('password');
					$konfirm_password=$this->input->post('password2');
					$email=$this->input->post('email');
					$alamat=$this->input->post('alamat');
					$tlpn=$this->input->post('tlpn');
			if ($password <> $konfirm_password) {
				 echo $this->session->set_flashdata('msg','error');
				   redirect('admin/pengguna');
			 }else{
				   $this->m_pengguna->simpan_pengguna_tanpa_gambar($nama_lengkap,$nik,$jenis_kelamin,$username,$password,$email,$tlpn,$alamat);
				echo $this->session->set_flashdata('msg','success');
				   redirect('admin/pengguna');
			   }
		}

	}
	function update_pengguna(){
				
		$config['upload_path'] = './assets/images/'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);
		if(!empty($_FILES['filefoto']['name']))
		{
			if ($this->upload->do_upload('filefoto') ){

					$gbr = $this->upload->data();
					//Compress Image
					$config['image_library']='gd2';
					$config['source_image']='./assets/images/'.$gbr['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 300;
					$config['height']= 300;
					$config['new_image']= './assets/images/'.$gbr['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$gambar=$gbr['file_name'];
					//$ktp =$gbr['filename'];
					$id_relawan =$this->input->post('id_relawan');
					$nama=$this->input->post('nama_lengkap');
					$jenkel=$this->input->post('jenis_kelamin');
					$username=$this->input->post('username');
					$password=$this->input->post('password');
					$konfirm_password=$this->input->post('password2');
					$email=$this->input->post('email');
					$alamat=$this->input->post('alamat');
					$nohp=$this->input->post('tlpn');
					$ktp=$this->input->post('ktp');
					
					//$level=$this->input->post('xlevel');
					$data_tanpa_pasword=array(
						'nama_lengkap'=>$nama,
						'jenis_kelamin'=>$jenkel,
						'username'=>$username,
						'email'=>$email,
						'telp'=>$nohp,
						'photo'=>$gambar,
						'alamat'=>$alamat,
						'ktp'=> $ktp
					);

					$data=array(
						'nama_lengkap'=>$nama,
						'jenis_kelamin'=>$jenkel,
						'username'=>$username,
						'password'=>$password,
						'email'=>$email,
						'telp'=>$nohp,
						'photo'=>$gambar,
						'alamat'=>$alamat,
						'ktp'=> $ktp
					);

					if (empty($password) && empty($konfirm_password)) {
						$this->m_relawan->update($id_relawan,$data_tanpa_pasword);
						echo $this->session->set_flashdata('msg','info');
						   redirect('admin/relawan');
					 }elseif ($password <> $konfirm_password) {
						 echo $this->session->set_flashdata('msg','error');
						   redirect('admin/relawan');
					 }else{
						   $this->m_relawan->update($id_relawan,$data);
						echo $this->session->set_flashdata('msg','info');
						   redirect('admin/relawan');
					   }
				
			}else{
				echo $this->session->set_flashdata('msg','warning');
				redirect('admin/relawan');
			}
			
		}else{
			$id_relawan =$this->input->post('id_relawan');
			$nama=$this->input->post('nama_lengkap');
			$jenkel=$this->input->post('jenis_kelamin');
			$username=$this->input->post('username');
			$password=md5($this->input->post('password'));
			$konfirm_password=$this->input->post('password2');
			$email=$this->input->post('email');
			$alamat=$this->input->post('alamat');
			$nohp=$this->input->post('tlpn');
			$ktp=$this->input->post('ktp');
		

			$data_tanpa_password_dan_gambar=array(
				'nama_lengkap'=>$nama,
				'jenis_kelamin'=>$jenkel,
				'username'=>$username,
				'email'=>$email,
				'telp'=>$nohp,
				'alamat'=>$alamat,
				'ktp'=> $ktp
				

			);

			$data_tanpa_gambar=array(
				'nama_lengkap'=>$nama,
				'jenis_kelamin'=>$jenkel,
				'password'=> $password,
				'username'=>$username,
				'email'=>$email,
				'telp'=>$nohp,
				'alamat'=>$alamat,
				'ktp'=> $ktp
				

			);
			if (empty($password) && empty($konfirm_password)) {
				   $this->m_relawan->update($id_relawan,$data_tanpa_password_dan_gambar);
				echo $this->session->set_flashdata('msg','info');
				   redirect('admin/relawan');
			 }elseif ($password <> $konfirm_password) {
				 echo $this->session->set_flashdata('msg','error');
				   redirect('admin/relawan');
			 }else{
				   $this->m_relawan->update($id_relawan,$data_tanpa_gambar);
				echo $this->session->set_flashdata('msg','warning');
				   redirect('admin/relawan');
			   }
		} 


	

}
function hapus_pengguna(){
	 $id_relawan = $this->input->post('id_relawan');
	 $timestamp = date("Y-m-d H:i:s");
	 $data =array(
		 'deleted_at'=>$timestamp

	 );
	 $this->m_relawan->delete($id_relawan,$data);
	echo $this->session->set_flashdata('msg','success-hapus');
	redirect('admin/relawan');
}




}