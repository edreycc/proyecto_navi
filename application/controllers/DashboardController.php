<?php
defined('BASEPATH') or exit('No direct script access allowed');
class DashboardController extends CI_Controller
{
    public function index()
    {
       $this->load->view('dashboard');
    }
    // public function index()
	// {
	// 	$this->load->view('inc/head');
	// 	$this->load->view('loginform');
        
	// 	$this->load->view('inc/pie');
	// }    
}