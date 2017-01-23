<?php
namespace app\index\controller;

use think\Controller;
class Category extends Common
{
    public function show()
    {
        $catid = input('catid');
        if (!$catid) {
            $this->error('参数错误');
        }
        $cate_db = db('category');
        /*栏目详情start*/
        $cate_info = $cate_db->where('catid', $catid)->find();

        if (!$cate_info) {
            $this->error('栏目不存在');
        }

        $this->assign('category', new_html_entity_decode($cate_info));
        /*栏目详情end*/
        /*子栏目start*/
        $subcate = $cate_db->where('pid', $catid)->limit(10)->select();
//         dump($subcate);
        /*子栏目end*/
        /*同级栏目start*/
        $samecate = $cate_db->where('pid', get_catpid($catid))->limit(10)->select();
        /*同级栏目end*/
        if (empty($subcate)) {
            $subcate = $samecate;
        }
        $this->assign('subcate', $subcate);
        $this->assign('samecate', $samecate);
        
        /* 轮播图图*/
        $scroll_db = db('scroll');
        $scroll_list =$scroll_db->where(['catid' => $catid])->where('status', 0)->limit(10);
//         dump($scroll_list);
        $this->assign('scroll_list', $scroll_list);
        /*文章列表start*/
        $article_db = db('article');
        if ($cate_info['ispart'] == 1) {
        $article_list = $article_db->where('catid', 'in', catid_str($subcate[0]['catid']))->where('status', 0)->order('listorder desc,id desc')->paginate(20);
        }else{
        	$article_list = $article_db->where('catid', 'in', catid_str($catid))->where('status', 0)->order('listorder desc,id desc')->paginate(20);
        	 
        }
//         dump($article_list);

        $page = $article_list->render();
        $this->assign('article_list', $article_list);
        $this->assign('page', $page);
        /*文章列表end*/
        /*seo start*/
        $seo = seo($cate_info['catname'] . '-' . $this->seo['title'], $cate_info['keywords'], $cate_info['description']);
        $this->assign('seo', $seo);
        /*seo end*/
        /*模板start*/
        if ($cate_info['ispart'] == 1) {
            $template = str_replace('.html', '', $cate_info['category']);
            return $this->fetch($template);
        } else {
            $template = str_replace('.html', '', $cate_info['list']);
            return $this->fetch($template);
        }
        /*模板end*/
    }
}