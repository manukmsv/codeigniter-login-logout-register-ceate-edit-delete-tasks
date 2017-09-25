<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Task_model class.
 *
 * @extends CI_Model
 */
class Task_model extends CI_Model
{

    /**
     * __construct function.
     *
     * @access public
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * create_user function.
     *
     * @access public
     * @param mixed $name
     * @param mixed $description
     * @return bool true on success, false on failure
     */
    public function create_task($name, $description)
    {
        $data = array(
            'name' => $name,
            'description' => $description,
            'dateCreated' => date('Y-m-j H:i:s')
        );
        
        return $this->db->insert('tasks', $data);
    }
    
    public function update_task($task_id, $name, $description)
    {
        $data = array(
            'name' => $name,
            'description' => $description,
            'dateUpdated' => date('Y-m-j H:i:s')
        );
        $this->db->where('id', $task_id);
        return $this->db->update('tasks', $data);
    }
    
    public function delete_task($task_id)
    {
        $this->db->where('id', $task_id);
        return $this->db->delete('tasks');
    }
    
    public function get_task($task_id)
    {
        $this->db->from('tasks');
        $this->db->where('id', $task_id);
        return $this->db->get()->row();
    }

    public function get_tasks()
    {
        $q = $this->db->get('tasks');
        return $q->result();
    }

}