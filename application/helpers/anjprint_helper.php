<?php


    function render($page_name, $data = null)
    {
        $this->load->view('parts/header', $data);
        $this->load->view($page_name, $data);
        $this->load->view('parts/footer',$data);
    }

function rcopy($from, $to)
{
    if (file_exists($to)) {
        rrmdir($to);
    }
    if (is_dir($from)) {
        mkdir($to, 0777, true);
        $files = scandir($from);
        foreach ($files as $file) {
            if ($file != "." && $file != "..") {
                rcopy($from . DIRECTORY_SEPARATOR . $file, $to . DIRECTORY_SEPARATOR . $file);
            }
        }
    } else if (file_exists($from)) {
        copy($from, $to);
        chmod($to, 0777);
    }
}

function getAdminPaginationConfig($total_rows,$per_page,$base_url=null){
    $config['base_url'] = ($base_url)? $base_url : base_url(uri_string());
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page;
    $config['page_query_string'] = TRUE;
    $config['full_tag_open'] = '<ul class="pagination pagination-md pull-left">';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</li></a>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    return $config;
}

function buildTree1(array $elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as $element) {
        if ($element['sub_for'] == $parentId) {
            $children = buildTree1($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }
    return $branch;
}


        