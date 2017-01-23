<?php
namespace app\index\controller;
use think\Controller;
class Index extends Common
{
    public function index()
    {   
    	$cate_db = db('category');
		$seo=seo($this->seo['title'],$this->seo['keywords'],$this->seo['description']);
		$this->assign('seo',$seo);
// 		dump($this->indexCate);
		$article_db = db('article');
		//主页显示列表
		foreach ($this->indexCate as &$p){
			if($p['subid']){
				$p['sub']=$article_db->where('catid','in' ,$p['subid'])->limit(20)->select();	
			}
		}
// 		dump($this->indexCate);
		/* 轮播图图*/
		$scroll_db = db('scroll');
		$scroll_list = $scroll_db->where('status', 0)->limit(10)->select();
		$this->assign('scroll_list', $scroll_list);
		$this->assign('indexCate', new_html_entity_decode($this->indexCate));
		return $this->fetch();
		}
}
