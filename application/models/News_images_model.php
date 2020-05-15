<?php

class News_images_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->database();
    }

    public function get_list() {
        $this->db->select('*');
        $this->db->from('post_image');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }

    public function update($id, $post_id, $picture) {
        $record = [
            'post_id' => $post_id,
            'picture' => $picture
        ];
        $this->db->where('id', $id);
        return $this->db->update('post_image', $record);
    }

    public function select_by_id($id) {
        $this->db->select("*");
        $this->db->from('post_image');
        $this->db->where('id', $id);

        return $this->db->get()
                        ->row();
    }

    public function select_by_postID($id) {
        $this->db->select("*");
        $this->db->from('post_image');
        $this->db->where('post_id', $id);
        $this->db->order_by('picture', 'ASC');

        $query = $this->db->get();
        return $query->result();
        ;
    }

    public function insert($post_id, $picture) {
        $record = [
            'post_id' => $post_id,
            'picture' => $picture
        ];
        return $this->db->insert('post_image', $record);
        return $this->db->insert_id();
    }

}
