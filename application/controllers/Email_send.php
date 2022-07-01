<?php


class email_send extends CI_Controller{

public function __construct()
{
    parent::__construct();
    $this->load->library('email');
}

public function sendEmail($emitente, $remitente, $subject, $message){
        $this->initConfig();
        $this->email->from($emitente);
        $this->email->to($remitente);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
}

private function initConfig(){
    $configuracoes = $this->db->get('configuracoes')->result();

    $config['protocol']         = $configuracoes['protocol'];
    $config['smtp_host']        = $configuracoes['smtp_host'];
    $config['smtp_crypto']      = $configuracoes['smtp_crypto'];
    $config['smtp_port']        = $configuracoes['smpt_port'];
    $config['smtp_user']        = $configuracoes['smtp_user'];
    $config['smtp_pass']        = $configuracoes['smtp_password'];
    $config['validate']         = true; // validar email
    $config['mailtype']         = 'html'; // text ou html
    $config['charset']          = 'utf-8';
    $config['newline']          = "\r\n";
    $config['bcc_batch_mode']   = false;
    $config['wordwrap']         = false;
    $config['priority']         = 3; // 1, 2, 3, 4, 5 | Email Priority. 1 = highest. 5 = lowest. 3 = normal.    

    $this->email->initialize($config);

}


}