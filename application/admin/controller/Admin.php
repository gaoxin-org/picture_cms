<?php
namespace app\admin\controller;
use think\Controller;
class Admin extends Common
{   
    
    
    public function password()
    {
	    if (request()->isPost()) {
            $data = input('post.');
			$id=session('cms_admin_id');
			$r=db('admin')->where('id',$id)->find();
			if($r['password']!=md5(md5($data['password_o']).$r['encrypt'])){
				$this->error('原密码错误');
				}
			if($data['password_n']!=$data['password_r']){
				$this->error('新密码与重复密码不一致');
				}
			 $encrypt=$this->create_randomstr();
			 $password=md5(md5($data['password_n']).$encrypt);	
			 db('admin')->where('id',$id)->update(['password'=>$password,'encrypt'=>$encrypt]);
			 $this->success('密码修改成功','Login/index');	
			}
	    return $this->fetch();
	}
		
	/*
	 * Create a random string
	 * @author	XEWeb <>
	 * @param $length the length of the string to create
	 * @return $str the string
	 */
	function create_randomstr($length = 6) {
		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
   	
}
