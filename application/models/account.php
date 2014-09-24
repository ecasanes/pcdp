<?php

class Account extends MY_Model {

    const DB_TABLE = 'accounts';
    const DB_TABLE_PK = 'id';

    public $publication_id;
    public $publication_name;

    public function get_accounts(){

        $sql = "SELECT id as ID, account as USERNAME, name as FIRSTNAME, middlename as MIDDLENAME, lastname as LASTNAME, role as ROLE FROM accounts";
        $query = $this->db->query($sql);

        //query_to_csv($query, TRUE, "admin.csv");
        $admin_data_results = $query->result_array();

        return $admin_data_results;
    }
	
	public function has_permission($role, $current_page){

        if($role == 'superadmin' || $current_page == ''){

            $boolean_result = false;

        }

        else if($role == '' || empty($role)){

            $sql = "SELECT count(id) as permission_count FROM ilo_pages WHERE role IS NULL AND page_uri_segment = '$current_page' AND status = 'restricted'";
            $query = $this->db->query($sql);   

            $result_count = $query->row()->permission_count;

            if($result_count > 0){
                $boolean_result = true;
            }else{
                $boolean_result = false;
            }

        }

        else{

            $sql = "SELECT count(id) as permission_count FROM ilo_pages WHERE role = '$role' AND page_uri_segment = '$current_page' AND status = 'restricted'";
            $query = $this->db->query($sql);   

            $result_count = $query->row()->permission_count;

            if($result_count > 0){
                $boolean_result = true;
            }else{
                $boolean_result = false;
            }
        }

        return $boolean_result;    
    }
	
    public function get_no_of_encoded_records($id){
        $this->db->select('count(id) as counted');
        $this->db->from('name_database');
        $this->db->where(array('admin' => $id));
        $query = $this->db->get();
        $row = $query->row();
        return $row->counted;
    }


    public function can_login($username, $password){
		
	
    	$this->db->where('account', $username);
    	$this->db->where('password', md5($password));

    	$query = $this->db->get('accounts');

    	if($query->num_rows() == 1)
    	{
    		return true;
    	} else {
    		return false;
    	}
    }


    public function get_id_by_credentials($username, $password){
        $this->db->select('id');
        $this->db->from('accounts');
        $this->db->where(array('account' => $username, 'password' => $password));
        $query = $this->db->get();
        $row = $query->row();
        return $row->id;
    }

    public function get_current_role($id){
        $this->db->select('role');
        $this->db->from('accounts');
        $this->db->where(array('id' => $id));
        $query = $this->db->get();
        $row = $query->row();
        return $row->role;
    }

    public function verify_duplicate($id, $username){
        $current_username = $this->get_current_username($id);

        if($current_username != $username){
            $this->db->select('count(account) as user_count');
            $this->db->from('accounts');
            $this->db->where(array('account' => $username));
            $query = $this->db->get();
            $row = $query->row();
            $user_count = $row->user_count;
        }else{
            $user_count = 0;
        }


        if($user_count > 0){
            return true;
        }else{
            return false;
        }
    }


    public function get_current_username($id){
        $this->db->select('account');
        $this->db->from('accounts');
        $this->db->where(array('id' => $id));
        $query = $this->db->get();
        $row = $query->row();
        $username = $row->account;

        return $username;
    }


    public function add($username, $password, $firstname, $lastname, $role){

        $sql = "INSERT INTO accounts (id, account, password, name, lastname, status, role) VALUES ('', '{$username}', '{$password}', '{$firstname}', '{$lastname}', '8', '{$role}')";
        $query = $this->db->query($sql);
    }


    public function update($id, $username, $password, $firstname, $lastname, $role){

        if($password == ''){
            $sql = "UPDATE accounts SET account = '{$username}', name = '{$firstname}', lastname = '{$lastname}',  role = '{$role}' WHERE id = {$id}";
        }else{
            $sql = "UPDATE accounts SET account = '{$username}', password = '{$password}', name = '{$firstname}', lastname = '{$lastname}',  role = '{$role}' WHERE id = {$id}";
        }
        
        $query = $this->db->query($sql);
    }


}