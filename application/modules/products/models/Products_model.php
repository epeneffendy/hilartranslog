<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Products_model extends CI_Model
{
    private $_table = "products";
    public $id, $name, $kategori_id, $brand_id, $short_description, $description, $price, $discount_price, $status, $slug, $created_at, $updated_at, $created_by, $updated_by, $image, $top_seller;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('helper');
    }

    public function getAll()
    {
        $sql = $this->db->query(
            "select a.id as id,  a.name, b.name as kategori, c.name as brand, a.price, a.discount_price, a.status, a.description, a.short_descriptiona, a.top_seller
            from products a
            inner join master_kategori b on b.id = a.kategori_id
            inner join master_brand c on c.id = a.brand_Id
        ")->result();

        return $sql;
    }

    public function getById($id)
    {
        $data = $this->db->query(
            "select a.id as id,  a.name, b.name as kategori, c.name as brand, a.price, a.discount_price, a.status, a.description, a.short_description, a.image, a.slug, a.kategori_id, a.brand_id, a.top_seller
            from products a
            inner join master_kategori b on b.id = a.kategori_id
            inner join master_brand c on c.id = a.brand_Id
            where a.id = '" . $id . "'
        ")->row();
        return $data;
    }

    public function getBySlug($slug)
    {
        $this->db->where('slug', $slug);
        return $this->db->get($this->_table)->row();
    }

    public function save()
    {
        $success = false;
        $message = 'Data Gagal Disimpan!';
        $product_id = '';

        $date = new DateTime();
        $post = $this->input->post();
        if ($post['isNewRecord'] == 'true') {
            $this->created_at = $date->getTimestamp();

            if (!empty($_FILES['image']['name'])) {
                $helper_upload = $this->helper->upload_image($_FILES['image'], 'product');
                $this->upload->initialize($helper_upload);
                if ($this->upload->do_upload('image')) {
                    $foto = $this->upload->data();
                    $this->image = $foto['file_name'];
                }
            }

            $this->name = $post['name'];
            $this->kategori_id = $post['kategori_id'];
            $this->brand_id = $post['brand_id'];
            $this->short_description = $post['short_desciption'];
            $this->description = $post['long_desciption'];
            $this->price = $post['price'];
            $this->discount_price = $post['discount_price'];
            $this->status = ($post['status'] == 0) ? 1 : $post['status'];
            $this->slug = $this->generate_url_slug($post['name'], 'products');
            $this->top_seller = isset($post['top_seller']) ? $post['top_seller'] : '';
            $this->updated_at = $date->getTimestamp();
            $this->created_by = $this->session->userdata('id');
            $this->updated_by = $this->session->userdata('id');
            $save = $this->db->insert($this->_table, $this);
            if ($save) {
                $product_id = $this->db->insert_id();
                $success = true;
                $message = 'Data Berhasil Disimpan!';
            }
        } else {
            $product = $this->getBySlug($post['slug']);
            $image = '';
            if (isset($product)) {
                if (!empty($_FILES['image']['name'])) {
                    $helper_upload = $this->helper->upload_image($_FILES['image'], 'product');
                    $this->upload->initialize($helper_upload);
                    if ($this->upload->do_upload('image')) {
                        $foto = $this->upload->data();
                        $image = $foto['file_name'];
                    }
                } else {
                    $image = $product->image;
                }
                $data = [
                    'id' => $post['id'],
                    'name' => $post['name'],
                    'kategori_id' => $post['kategori_id'],
                    'brand_id' => $post['brand_id'],
                    'short_description' => $post['short_desciption'],
                    'description' => $post['long_desciption'],
                    'price' => $post['price'],
                    'discount_price' => $post['discount_price'],
                    'status' => ($post['status'] == 0) ? 1 : $post['status'],
                    'slug' => $post['slug'],
                    'top_seller' => isset($post['top_seller']) ? $post['top_seller'] : '',
                    'image' => $image,
                    'created_at' => $product->created_at,
                    'updated_at' => $date->getTimestamp(),
                    'created_by' => $product->created_by,
                    'updated_by' => $this->session->userdata('id'),
                ];
                $save = $this->db->update($this->_table, $data, array('id' => $post['id']));
                if ($save) {
                    $product_id = $product->id;
                    $success = true;
                    $message = 'Data Berhasil Update!';
                }
            } else {
                $success = false;
                $message = 'Product tidak ditemukan!';
            }
        }
        return ['success' => $success, 'message' => $message, 'product_id' => $product_id];
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

}