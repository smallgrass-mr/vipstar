<?php

namespace app\index\controller;

use addons\wechat\model\WechatCaptcha;
use app\common\controller\Frontend;
use app\common\library\Ems;
use app\common\library\Sms;
use app\common\model\Attachment;
use app\common\model\InformationType;
use think\Config;
use think\Cookie;
use think\Hook;
use think\Session;
use think\Validate;

/**
 * 信息中心
 */
class Information extends Frontend
{
    protected $layout = 'default';
    protected $noNeedLogin = ['login', 'register', 'third','index'];
    protected $noNeedRight = ['*'];

    public function _initialize()
    {
        parent::_initialize();
        $auth = $this->auth;

        if (!Config::get('fastadmin.usercenter')) {
            $this->error(__('User center already closed'));
        }

        //监听注册登录退出的事件
        Hook::add('user_login_successed', function ($user) use ($auth) {
            $expire = input('post.keeplogin') ? 30 * 86400 : 0;
            Cookie::set('uid', $user->id, $expire);
            Cookie::set('token', $auth->getToken(), $expire);
        });
        Hook::add('user_register_successed', function ($user) use ($auth) {
            Cookie::set('uid', $user->id);
            Cookie::set('token', $auth->getToken());
        });
        Hook::add('user_delete_successed', function ($user) use ($auth) {
            Cookie::delete('uid');
            Cookie::delete('token');
        });
        Hook::add('user_logout_successed', function ($user) use ($auth) {
            Cookie::delete('uid');
            Cookie::delete('token');
        });
    }

    /**
     * 信息列表
     */
    public function index()
    {
        $limit = $this->request->request('limit', '');
        $search = $this->request->request('search', '');
        $type = $this->request->request('type', '');
        $limit = !empty($limit) ? $limit:10;
        $where['switch']=['=',1];
        if(!empty($search)){
            $where['title'] = ['like','%'.$search.'%'];
        }
        if(!empty($type)){
            $where['category_id'] = ['=',$type];
        }
        $list = \app\common\model\Information::getPageList('*',$where,'sort desc',$limit);
        if(!$list->isEmpty()){
            foreach ($list as $key =>$value){
                $list[$key]['nickname'] = \app\admin\model\User::getValue('nickname',['id'=>$value['user_id']]);
            }
        }
        $typedata = InformationType::getAll('*',['switch'=>1]);
        $this->assign('typedata',$typedata);
        $this->assign('list',$list->toArray());
       return $this->view->fetch();
    }

    /**
     * 详情
     */
    public function  info()
    {
        $id = $limit = $this->request->request('id', '');
        $info = \app\common\model\Information::getOne('*',['id'=>$id])->toArray();
        if(!empty($info)){
            $info['nickname'] = \app\admin\model\User::getValue('nickname',['id'=>$info['user_id']]);
        }
        $this->assign('info',$info);
        return $this->view->fetch();
    }

    /**
     * 上传共享资料
     */
    public function share()
    {
        if($this->request->isPost()){
            $data = $this->request->post();
            if (empty($data['type'])) {
                $this->error('请选择分类！');
            }
            if (empty($data['title'])) {
                $this->error('标题不能为空！');
            }
            if(empty($data['wechat']) && empty($data['qq'] && empty($data['email']) && empty($data['phone'])) ){
                $this->error('联系方式不能为空！');
            }
            if(empty($data['price'])){
                $this->error('价格不能为空！');
            }
            $user =  $this->auth->getUser()->toArray() ;
            $create['user_id'] = $user['id'];
            $create['title'] = $data['title'];
            $create['category_id'] = $data['type'];
            $create['wechat'] = $data['wechat'];
            $create['price'] = $data['price'];
            $create['content'] = $data['content'];
            $create['qq'] = $data['qq'];
            $create['email'] = $data['email'];
            $create['switch'] = 1;
            $create['update_time'] = date('Y-m-d H:i:s',time());
            $create['create_time'] = date('Y-m-d H:i:s',time());
            $res = \app\common\model\Information::create($create);
                $this->success('发布成功', 'index');
            if (!empty($res)) {

            } else {
                $this->error($this->auth->getError());
            }
        }
        $typedata = InformationType::getAll('*',['switch'=>1],'sort desc');
        $this->assign('typedata',$typedata);
        return $this->view->fetch();
    }

}
