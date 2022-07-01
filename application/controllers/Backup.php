<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Backup extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mapos_model');
    }

    public function process(){
        $this->load->dbutil();
        $prefs = [
            'format' => 'zip',
            'foreign_key_checks' => false,
            'filename' => 'backup' . date('d-m-Y') . '.sql',
        ];

        $backup = $this->dbutil->backup($prefs);
        $db_name = 'backup' . '.zip';
        $backup_path = FCPATH . 'backups/'; 
        if (!file_exists($backup_path)) {
        mkdir($backup_path, 0755, true);
        }
        $save = $backup_path . $db_name;
        $this->load->helper('file');
        write_file($save, $backup);
    }
        
}