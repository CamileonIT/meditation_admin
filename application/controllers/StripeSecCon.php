<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripeSecCon extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
        date_default_timezone_set("Asia/Kolkata");
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('my_stripe');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost()
    {
        require_once('application/libraries/stripe-php/init.php');
        
        try{
            
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
        
        $amount = preg_replace("/[^0-9\.]/", '', $this->input->post('amount'));
        $user_id = $this->input->post('user_id');
        
        \Stripe\Charge::create ([
                // "amount" => ( $amount > 50 ? $amount : 50) * 100,
                "amount" => ($amount) * 100,
                "currency" => 'USD',
                "source" => $this->input->post('stripeToken'),
                "description" => "Test payment" 
        ]);
           
        $this->session->set_flashdata('success', 'Payment made successfully.');
        
        $package_data=$this->db->select('*')->where('package_id',$this->input->post('package_id'))->get('package_settings')->row();
        
        $package_duration=$package_data->package_duration;
        
        $user_expiry_data = $this->db->select('user_package_expiry_date')->where('user_id',$user_id)->get('user')->row();
       
        if($user_expiry_data->user_package_expiry_date == '' or $user_expiry_data->user_package_expiry_date == 0) $user_expiry_date = date('Y-m-d H:i:s'); 
        else $user_expiry_date=$user_expiry_data->user_package_expiry_date;
         $user_data=array(
            'user_package_expiry_date'=>date('Y-m-d H:i:s', strtotime("+$package_duration months" ,strtotime($user_expiry_date))),
            'user_package_paid_date'=>date('Y-m-d H:i:s'),
            'user_package_id' => $this->input->post('package_id')
            );
        $this->db->update('user',$user_data,array('user_id'=>$user_id));
        
        $user_payment_data = array(
                'user_id' => $user_id,
                'package_id' => $this->input->post('package_id'),
                'card_name' => $this->input->post('user_card_name'),
                'amount' => $amount,
                'card_number' => $this->input->post('user_card_number'),
                'cvc' => $this->input->post('user_card_cvc'),
                'expiration_month' => $this->input->post('user_card_expiration_month'),
                'expiration_year' => $this->input->post('user_card_card_expiration_year'),
                'created_date' => date('Y-m-d H:i:s')
            );
             $this->db->insert('user_payment', $user_payment_data);
            echo json_encode($result = array('msg'=>'success')); 
         }
         catch(Exception $e){
            $this->session->set_flashdata('error', $e->getMessage());
            redirect('API/getStripePaymentScreen', 'refresh');
            // echo 'Message: ' .$e->getMessage();
            }
        
          
        
    }
}