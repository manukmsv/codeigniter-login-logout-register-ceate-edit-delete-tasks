<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Task class.
 * 
 * @extends CI_Controller
 */
class Task extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		$this->load->model('task_model');
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
		    
		} else {
		    // there user was not logged in, we cannot logged him out,
		    // redirect him to site root
		    redirect('/');
		}
		
	}
	
	
	public function index() {
		

		
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function create($task_id = null) {
		
	    // create the data object
	    $data = new stdClass();
	    
	    // load form helper and validation library
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	    
	    // set validation rules
	    $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha_numeric|min_length[2]');
	    $this->form_validation->set_rules('description', 'Description', 'trim|required|alpha_numeric|min_length[2]');

	    $actions = "creat";
	    
	    if ($this->form_validation->run() === false) {
	           
	    } else {
	        // set variables from the form
	        $name = $this->input->post('name');
	        $description    = $this->input->post('description');
	        if(!empty($task_id)) {
	            $status = $this->task_model->update_task($task_id, $name, $description);
	            $actions = "edit";
	        } else {
	            $status = $this->task_model->create_task($name, $description);
	        }
	        
	        if ($status) {
	            $data->success = 'Task '.$actions.'ed successfully.';
	        } else {
	            $data->error = 'There was a problem '.$actions.'ing task. Please try again.';
	        }
	    }
	    if(!empty($task_id) && ($actions != 'edit')) {
	        $data->edit_task = $this->task_model->get_task($task_id);
	        $data->edit_action = "Update";
	    } else {
	        $data->edit_action = "create";
	    }
	    // validation not ok, send validation errors to the view
	    $this->load->view('header');
	    $this->load->view('user/task/create', $data);
	    $this->load->view('footer');
		
	}

	public function delete($task_id) {
		
	    // create the data object
	    $data = new stdClass();
	    
	    if($this->task_model->delete_task($task_id)) {
	        $data->success = 'Task Deleted';
	    } else {
	        $data->error = 'Task not Deleted';
	    }
	    
	    $data->tasks = $this->task_model->get_tasks();
	    
	    // validation not ok, send validation errors to the view
	    $this->load->view('header');
	    $this->load->view('user/task/list_task', $data);
	    $this->load->view('footer');
		
	}
	
	
	public function tasks() {
	    
	    // create the data object
	    $data = new stdClass();

	    $data->tasks = $this->task_model->get_tasks();
	    
	    // validation not ok, send validation errors to the view
	    $this->load->view('header');
	    $this->load->view('user/task/list_task', $data);
	    $this->load->view('footer');

	}
	
}
