<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        is_login();
        check_admin();
        $this->load->model('Banner_model');
        $this->load->library('form_validation');
        $this->load->helper('debug');
    }

    public function index ()
    {
        $banner = $this->Banner_model->get_all();
        $data = array(
            'banner_data' => $banner,
        );

        $this->template->load('template', 'banner/banner_list', $data);
    }

    public function create ()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('banner/create_action'),
            'banner_id' => set_value('banner_id'),
        );
        $this->template->load('template', 'banner/banner_form', $data);
    }

    public function create_action ()
    {
        $config['upload_path']          = './temp/banner/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('banner')){
            $data = array(
                'button' => 'Create',
                'action' => site_url('banner/create_action'),
                'banner_id' => set_value('banner_id'),
            );
            $this->session->set_flashdata('error', $this->upload->display_errors());
            $this->template->load('template', 'banner/banner_form', $data);
        }else{
            $data = $this->upload->data();
            $this->Banner_model->insert([
                'url' => $config['upload_path'] . $data['file_name'],
                'created_at' => date('Y-m-d H:i:s')
            ]);
            redirect('/banner');
        }

    }

    public function update($id)
    {

        $row = $this->Banner_model->get_by_id(decrypt_url($id));

        $data = array(
            'button' => 'Update',
            'action' => site_url('banner/update_action/' . decrypt_url($id)),
            'banner_id' => set_value('banner_id'),
            'row' => $row 
        );
        $this->template->load('template', 'banner/banner_form', $data);
    }

    public function update_action($id)
    {

        $config['upload_path']          = './temp/banner/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('banner')) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('banner/update_action/' . $id),
                'banner_id' => set_value('banner_id'),
            );

            $this->session->set_flashdata('error', $this->upload->display_errors());
            $this->template->load('template', 'banner/banner_form', $data);
        } else {
            $data = $this->upload->data();
            
            $this->Banner_model->update($id, [
                'url' => $config['upload_path'] . $data['file_name'],
            ]);

            redirect('/banner');
        }
    }

    public function delete($id)
    {
        $row = $this->Banner_model->get_by_id(decrypt_url($id));

        if ($row) {
            $this->Banner_model->delete(decrypt_url($id));
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('banner'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('banner'));
        }
    }

}




?>