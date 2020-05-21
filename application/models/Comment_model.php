<?php

class Comment_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    public function get_list()
    {
        $this->db->select('*');
        $this->db->from('comment');
        $this->db->order_by('add_date', 'ASC');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function update($id, $post_id, $user_email, $text, $add_date)
    {
        $record = [
            'user_email' => $user_email,
            'text' => $text,
            'post_id' => $post_id,
            'add_date' => $add_date
        ];
        $this->db->where('id', $id);
        return $this->db->update('comment', $record);
    }

    public function select_by_id($id)
    {
        $this->db->select("*");
        $this->db->from('comment');
        $this->db->where('id', $id);

        return $this->db->get()
            ->row();
    }

    public function select_by_user_email($email)
    {
        $this->db->select("*");
        $this->db->from('comment');
        $this->db->where('user_email', $email);

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function select_by_post_id($id)
    {
        $this->db->select("*");
        $this->db->from('comment');
        $this->db->where('post_id', $id);

        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function insert($post_id, $user_email, $text, $add_date)
    {
        $record = [
            'user_email' => $user_email,
            'text' => $text,
            'post_id' => $post_id,
            'add_date' => $add_date
        ];
        $this->db->insert('comment', $record);
        return $this->db->insert_id();
    }
}
