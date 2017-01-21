<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller
{
	protected $indexCate;
    protected function _initialize()
    {
		$this->seo=db('system')->where('id',1)->find();
		$cate_db = db('category');
		/*栏目详情start*/
		$cate_infos =$cate_db ->where('pid', 0)->order('catid')->select();
// 		dump($cate_infos);
		if (!$cate_infos) {
			$this->error('栏目不存在');
		}
		$this->categorys =array();
		foreach ($cate_infos as $cate){
			$temp['p_name']=$cate['catname'];
			$temp['url']=$cate['url'];
			/*子栏目start*/
			$cate['sub']=$cate_db->where('pid', $cate['catid'])->order('catid')->limit(10)->select();
			$this->categorys[]=$cate;
			$subid =array();
			foreach ($cate['sub'] as $su){
				$subid[]=$su['catid'];
			}
			$temp['subid']=$subid;
			$this->indexCate[]=$temp;
		}
// 		dump($categorys);
		$this->assign('categorys', new_html_entity_decode($this->categorys));
		
		}
}
