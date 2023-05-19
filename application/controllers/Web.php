<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('products/products_model');
        $this->load->model('products/Productstoreonline_model');
        $this->load->model('blog/blogs_model');
    }

    public function index($error = NULL)
    {
        $company = $this->db->query("select * from company_profile")->row();
        $clients = $this->db->query("select * from clients where status = 2")->result();
        $services = $this->db->query("select * from services where status = 2")->result();
        $branchs = $this->db->query("select * from master_branch_store")->result();
        $about = $this->db->query("select * from about")->row();
        $images = $this->db->query("select * from master_image")->result();
        $galerys = $this->db->query("select * from galery where status = 2")->result();
        $menus = $this->db->query("
                  select a.name as menu, a.slug as slug_menu, a.level, a.link, a.type, b.content, b.flag, b.status, b.flag_desc, b.desc
                  from menu a
                  inner join settings b on a.slug = b.slug
                  where a.type = 4
                  ")->result();
        $section = [];
        foreach ($menus as $item) {
            $section[$item->slug_menu]['slug'] = $item->slug_menu;
            $section[$item->slug_menu]['content'] = $item->content;
            $section[$item->slug_menu]['desc'] = $item->desc;
            $section[$item->slug_menu]['menu'] = $item->menu;
            $section[$item->slug_menu]['status'] = $item->status;
            $section[$item->slug_menu]['flag'] = $item->flag;
            $section[$item->slug_menu]['flag_desc'] = $item->flag_desc;
        }

        $img = [];
        foreach ($images as $item){
            $img[$item->type]['type'] = $item->type;
            $img[$item->type]['name'] = $item->name;
            $img[$item->type]['title'] = $item->title;
            $img[$item->type]['size_image'] = $item->size_image;
            $img[$item->type]['description'] = $item->description;
            $img[$item->type]['image'] = $item->image;

        }


        $data['breadcrumbs'][] = ['label' => 'Dashboard', 'active' => 'active'];
        $data['company'] = $company;
        $data['clients'] = $clients;
        $data['services'] = $services;
        $data['branchs'] = $branchs;
        $data['about'] = $about;
        $data['menus'] = $menus;
        $data['section'] = $section;
        $data['image'] = $img;
        $data['galerys'] = $galerys;
        $data['col_lg'] = ceil((12 / count($clients)));
        $data['col_lg_branch'] = ceil((12 / count($branchs)));
        $this->load->view('layouts-frontend/main_layout', $data);
    }

    public function contact($error = NULL)
    {
        $stores = $this->db->query("select * from master_branch_store")->result();
        $company = $this->db->query("select * from company_profile")->row();

        $data['error'] = $error;
        $data['title'] = 'Contact Us';
        $data['stores'] = $stores;
        $data['company'] = $company;
        $data['breadcrumbs'][] = ['label' => 'Contact Us', 'active' => 'active'];
        $this->load->view('layouts-web/main_contact-us', $data);
    }

    public function brands($slug = null, $error = null)
    {
        $products = '';
        $menu = $this->db->query("select * from menu WHERE slug = 'product' ")->row();
        $menuKat = $this->db->query("select * from menu WHERE slug = 'shop' ")->row();
        $kategori = $this->db->query("select * from menu where parent_id = '" . $menuKat->id . "' ")->result();
        $brands = $this->db->query("select * from menu WHERE parent_id = '" . $menu->id . "' ")->result();
        $imageHeader = $this->db->query("select * from master_image WHERE type = 4 ")->row();
        if (isset($menu)) {
            $isSlug = $this->db->query("select * from master_brand where slug = '" . $slug . "' ")->row();
            $products = $this->db->query("select * from products where brand_id = '" . $isSlug->id . "' and status = 2")->result();
        }

        $data['error'] = $error;
        $data['title'] = isset($menu) ? $menu->name : '';
        $data['kategori'] = $kategori;
        $data['brands'] = $brands;
        $data['products'] = $products;
        $data['imageHeader'] = $imageHeader;
        $data['breadcrumbs'][] = ['label' => isset($menu) ? $menu->name : '', 'active' => 'active'];
        $this->load->view('layouts-web/main_products_layout', $data);
    }

    public function shops($slug = null, $error = null)
    {
        $products = '';
        $menu = $this->db->query("select * from menu WHERE slug = 'shop' ")->row();
        $kategori = $this->db->query("select * from menu where parent_id = '" . $menu->id . "' ")->result();
        $brands = $this->db->query("select * from menu WHERE slug = 'product' ")->result();
        $imageHeader = $this->db->query("select * from master_image WHERE type = 3 ")->row();

        if (isset($menu)) {
            $isSlug = $this->db->query("select * from master_kategori where slug = '" . $slug . "' ")->row();
            $products = $this->db->query("select * from products where kategori_id = '" . $isSlug->id . "' and status = 2")->result();
        }

        $data['error'] = $error;
        $data['title'] = isset($menu) ? $menu->name : '';
        $data['kategori'] = $kategori;
        $data['brands'] = $brands;
        $data['products'] = $products;
        $data['imageHeader'] = $imageHeader;
        $data['breadcrumbs'][] = ['label' => isset($menu) ? $menu->name : '', 'active' => 'active'];
        $this->load->view('layouts-web/main_products_layout', $data);
    }

    public function productDetail($slug)
    {
        $product = $this->products_model->getBySlug($slug);
        if (isset($product)) {
            $details = $this->db->query("select * from product_store_online where product_id = '" . $product->id . "' order by store_name asc")->result();

            $relatedProduct = $this->db->query("select * from products where kategori_id = '" . $product->kategori_id . "' and id != '" . $product->id . "' and status = 2  limit 5  ")->result();
            $kategori = $this->db->query("select * from master_kategori where id = '" . $product->kategori_id . "'")->row();
            $data['breadcrumbs'][] = ['label' => 'Home', 'url' => base_url('web/index')];
            $data['breadcrumbs'][] = ['label' => $product->name, 'active' => 'active'];
            $data['model'] = $this->products_model->getById($product->id);
            $data['details'] = $details;
            $data['relateds'] = $relatedProduct;
            $data['kategori'] = (isset($kategori)) ? $kategori->name : '-';
            $data['error_code'] = 404;
            $this->load->view('layouts-web/main_product_detail_layout', $data);
        } else {
            $data['title'] = 'Product Not Found';
            $data['error_code'] = 404;
            $this->load->view('layouts-web/main_page_not_found', $data);
        }
    }

    public function blogs($error = null)
    {
        $model = $this->blogs_model->getAllByStatus();
        $artikel = [];
        foreach ($model as $ind => $item) {

            $short = $this->substrwords($item->content, 400);
            $artikel[$ind]['title'] = $item->title;
            $artikel[$ind]['slug'] = $item->slug;
            $artikel[$ind]['short'] = $short;
            $artikel[$ind]['image'] = $item->image;
            $artikel[$ind]['content'] = $item->content;
            $artikel[$ind]['created_by'] = $item->created_by;
            $artikel[$ind]['created_at'] = date('d M Y', $item->created_at);
        }
        $data['error'] = $error;
        $data['title'] = 'Blogs';
        $data['data'] = $artikel;
        $data['breadcrumbs'][] = ['label' => 'Blogs', 'active' => 'active'];
        $this->load->view('layouts-web/main_blogs', $data);
    }

    public function blogArticle($slug)
    {
        $model = '';
        $article = $this->blogs_model->getBySlug($slug);
        if (isset($article)) {
            $model = $this->blogs_model->getById($article->id);
        }

        $data['title'] = 'Article';
        $data['data'] = $model;
        $data['breadcrumbs'][] = ['label' => 'Blogs', 'url' => base_url('web/blogs')];
        $data['breadcrumbs'][] = ['label' => 'Article', 'active' => 'active'];
        $this->load->view('layouts-web/main_blog_article', $data);
    }

    function substrwords($text, $maxchar, $end = '...')
    {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);
            $output = '';
            $i = 0;
            while (1) {
                $length = strlen($output) + strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } else {
            $output = $text;
        }
        return $output;
    }


}