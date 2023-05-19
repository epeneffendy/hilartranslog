<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class CompanyProfile_model extends CI_Model
{
    private $_table = "company_profile";
    public $name, $alias, $description, $company, $address, $website, $year, $logo, $version, $id;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('helper');
    }

    public function company_profile()
    {
        $data = $this->db->query("select * from company_profile")->row();
        return $data;
    }

    public function save()
    {
        $success = true;
        $message = 'Update Company Profile Berhasil!';

        $post = $this->input->post();
        $data = $this->company_profile();
        if (!empty($_FILES['logo']['name'])) {
            if ($data->logo != $_FILES['logo']['name']) {
                $helper_upload = $this->helper->upload_image($_FILES['logo'], 'company_profile');
                $this->upload->initialize($helper_upload);
                if ($this->upload->do_upload('logo')) {
                    $foto = $this->upload->data();
                    $this->logo = $foto['file_name'];
                }
            } else {
                $this->logo = $data->logo;
            }
        } else {
            $this->logo = $data->logo;
        }

        $this->name = $post['name'];
        $this->owner = $post['owner'];
        $this->alias = $post['alias'];
        $this->description = $post['description'];
        $this->company = $post['company'];
        $this->address = $post['address'];
        $this->website = $post['website'];
        $this->email = $post['email'];
        $this->phone = $post['phone'];
        $this->year = $post['year'];
        $this->ig_name = $post['ig_name'];
        $this->ig_url = $post['ig_url'];
        $this->version = $post['version'];
        $this->id = $post['id'];
        $save = $this->db->update($this->_table, $this, array('id' => $post['id']));
        if (!$save) {
            $success = false;
            $message = 'Update Company Profile Gagal!';
        }

        return ['success' => $success, 'message' => $message];
    }
}