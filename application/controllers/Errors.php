<?php
class Errors extends CI_Controller 
{

    // Main controller for the contact form
    public function error404()
    {
        // Create your custom controller

        // Display page
      
        $this->load->view('errors/error404');
      
    }
}
?>