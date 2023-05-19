<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Blogs_model extends CI_Model
{
    private $_table = "blogs";
    public $id, $title, $content, $status, $created_at, $updated_at, $created_by, $updated_by, $image;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('helper');
    }

    public function getAll()
    {
        $sql = $this->db->query(
            "select a.id as id,  a.title, a.status, a.content, b.name as created_by, a.created_at, a.image, a.slug
            from blogs a
            inner join profile b on b.user_id = a.created_by
        ")->result();
        return $sql;
    }

    public function getAllByStatus()
    {
        $sql = $this->db->query(
            "select a.id as id,  a.title, a.status, a.content,a.short_content, b.name as created_by, a.created_at, a.image, a.slug
            from blogs a
            inner join profile b on b.user_id = a.created_by
            where a.status = 2
        ")->result();
        return $sql;
    }

    public function getById($id)
    {
        $data = $this->db->query(
            "select a.id as id,  a.title, a.status, a.content, b.name as created_by, a.created_at, a.image, a.slug
            from blogs a
            inner join profile b on b.user_id = a.created_by
            where id= '".$id."'
        ")->row();
        return $data;
    }

    public function save()
    {
        $success = false;
        $message = 'Data Gagal Disimpan!';
        $article_id = '';

        $date = new DateTime();
        $post = $this->input->post();
        if ($post['isNewRecord'] == 'true') {
            $this->created_at = $date->getTimestamp();

            if (!empty($_FILES['image']['name'])) {
                $helper_upload = $this->helper->upload_image($_FILES['image'], 'blogs');
                $this->upload->initialize($helper_upload);
                if ($this->upload->do_upload('image')) {
                    $foto = $this->upload->data();
                    $this->image = $foto['file_name'];
                }
            }

            $this->title = $post['title'];
            $this->content = $post['content_article'];
            $this->short_content = $this->substrwords($post['content_article'], 400);
            $this->status = ($post['status'] == 0) ? 1 : $post['status'];
            $this->slug = $this->generate_url_slug($post['title'], 'products');
            $this->updated_at = $date->getTimestamp();
            $this->created_by = $this->session->userdata('id');
            $this->updated_by = $this->session->userdata('id');
            $save = $this->db->insert($this->_table, $this);
            if ($save) {
                $article_id = $this->db->insert_id();
                $success = true;
                $message = 'Data Berhasil Disimpan!';
            }
        } else {
            $blog = $this->getBySlug($post['slug']);
            if (isset($blog)) {
                $image = '';
                if (!empty($_FILES['image']['name'])) {
                    $helper_upload = $this->helper->upload_image($_FILES['image'], 'blogs');
                    $this->upload->initialize($helper_upload);
                    if ($this->upload->do_upload('image')) {
                        $foto = $this->upload->data();
                        $image = $foto['file_name'];
                    }
                } else {
                    $image = $blog->image;
                }
                $data = [
                    'id' => $post['id'],
                    'title' => $post['title'],
                    'content' => $post['content_article'],
                    'short_content' => $this->substrwords($post['content_article'], 400),
                    'status'=>($post['status'] == 0) ? 1 : $post['status'],
                    'slug'=> $post['slug'],
                    'image'=> $image,
                    'created_at'=> $blog->created_at,
                    'updated_at'=> $date->getTimestamp(),
                    'created_by'=> $blog->created_by,
                    'updated_by'=>$this->session->userdata('id'),
                ];
                $save = $this->db->update($this->_table, $data, array('id' => $post['id']));
                if ($save){
                    $article_id = $blog->id;
                    $success = true;
                    $message = 'Data Berhasil Update!';
                }
            } else {
                $success = false;
                $message = 'Product tidak ditemukan!';
            }
        }
        return ['success' => $success, 'message' => $message, 'article_id' => $article_id];
    }

    function generate_url_slug($string, $table, $field = 'slug', $key = NULL, $value = NULL)
    {
        $t =& get_instance();
        $slug = url_title($string);
        $slug = strtolower($slug);
        $i = 0;
        $params = array();
        $params[$field] = $slug;

        if ($key) $params["$key !="] = $value;

        while ($t->db->where($params)->get($table)->num_rows()) {
            if (!preg_match('/-{1}[0-9]+$/', $slug))
                $slug .= '-' . ++$i;
            else
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);

            $params [$field] = $slug;
        }
        return $slug;
    }

    public function update_status($id, $status)
    {
        $success = false;
        $message = 'Failed, Updated!';

        $update_status = array(
            'status' => $status,
        );

        $this->db->where('id', $id);
        $update = $this->db->update($this->_table, $update_status);
        if ($update) {
            $success = true;
            $message = 'Updated Status Successfuly!';
        }

        return ['success' => $success, 'message' => $message];
    }

    public function getBySlug($slug)
    {
        $this->db->where('slug', $slug);
        return $this->db->get($this->_table)->row();
    }

    function substrwords($text, $maxchar, $end='...') {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                }
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        }
        else {
            $output = $text;
        }
        return $output;
    }

}