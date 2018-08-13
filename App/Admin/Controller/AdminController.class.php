<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class AdminController extends Controller {


    public function index(){//首页
		self::checkLogin();
		$data['usercount']=M('uinfomation')->count();
		$data['bookcount']=M('books')->count();
		$data['commentcount']=M('comment')->count();
		$data['digestcount']=M('digest')->count();
		$this->assign('data',$data);

		$this->display();
    }

	public function userInfo(){//用户信息管理
		self::checkLogin();
		$count=M('uinfomation')->count();
		$Page=new \Think\Page($count,8);
		$Page->setConfig('header','共%TOTAL_ROW%条');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('link','indexpagenumb');
		$Page->setConfig('theme','%HEADER% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
		$show=$Page->show();
		$this->assign('page',$show);
		$list=M('uinfomation')->limit($Page->firstRow.','.$Page->listRows)->select();
		//var_dump($list);
		$this->assign('list',$list);
		$this->display();
	}


	public function userInfoUpdate(){//用户信息修改
		self::checkLogin();
		$Model=M('uinfomation');
		$data['UserId']  = I('id');
		//echo I('id');
		$list=$Model->where('userid='.I('id'))->select();
		//var_dump($list);
		$this->assign('list',$list);
		$this->display();
	}

	public function userInfoSave(){//用户信息修改保存
	self::checkLogin();
	$Model=M('uinfomation');
	$data['Name']=I('name');
	if(I('password')){
		$data['Password']=I('password');
	}
	$tag=$Model->where('userid='.I('id'))->save($data); // 根据条件保存修改的数据
	if($tag){
		if(I('sta')==1){
			$this->success('修改成功',U('Admin/authorInfo'));
		}else{
			$this->success('修改成功',U('Admin/userInfo'));
		}

	}else{
		if(I('sta')==1){
			$this->success('修改成功',U('Admin/authorInfoUpdate'));
		}else{
			$this->error('失败',U('Admin/userInfoUpdate'),0);
		}
	}

	}

	public function udel(){
	self::checkLogin();
	self::delFunc('uinfomation',I('post.id'));
	}

	public function bdel(){//图书删除
	self::checkLogin();
	self::delFunc('books',I('post.id'));
	}
	public function adel(){//作者
	self::checkLogin();
	self::delFunc('uinfomation',I('post.id'));
	}

	public function cdel(){//作者
	self::checkLogin();
	self::delFunc('comment',I('post.id'));
	}

	public function delFunc($dbn,$id){
		$Model=M($dbn);
		$c=$Model->delete($id);
		if($c){
		echo '1';
		}else{
			echo '0';
		}
	}


	public function authorInfo(){//作者信息管理
		self::checkLogin();
		$uin=M('uinfomation');
		//$author=$uin->join('books ON uinfomation.userid = books.userid')->limit($Page->firstRow.','.$Page->listRows)->select();
		$bok1=$uin->join('books ON uinfomation.userid = books.userid')->group('books.userid')->select();
		$count=count($bok1);
		$Page=new \Think\Page($count,5);
		$Page->setConfig('header','共%TOTAL_ROW%条');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('link','indexpagenumb');
		$Page->setConfig('theme','%HEADER% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
		$show=$Page->show();
		$bok=$uin->join('books ON uinfomation.userid = books.userid')->group('books.userid')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		//var_dump($bok);
		$this->assign('list',$bok);
		$this->display();
	}

	public function authorInfoUpdate(){//用户信息修改
		self::checkLogin();
		$Model=M('uinfomation');
		$data['UserId']  = I('id');
		//echo I('id');
		$list=$Model->field('userid,name')->where('userid='.I('id'))->select();
		//var_dump($list);
		$this->assign('list',$list);
		$this->display();
	}

	public function bookInfo(){//图书信息管理
		self::checkLogin();
		$books=M('books');
		$bok1=$books->join('left join uinfomation on  books.userid = uinfomation.userid')->where('status=1')->select();
		$count=count($bok1);
		$Page=new \Think\Page($count,5);
		$Page->setConfig('header','共%TOTAL_ROW%条');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('link','indexpagenumb');
		$Page->setConfig('theme','%HEADER% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
		$show=$Page->show();
		$bok=$books->join('left join uinfomation on  books.userid = uinfomation.userid')->where('status=1')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('list',$bok);
		$this->display();
	}

	public function booksInfoSave(){//图书信息修改保存
        self::checkLogin();
        $Model=M('books');
				$data['BookName']=I('bookName');
				$data['Status']=I('status');
        $data['Introduction']=I('introduction');
        $tag=$Model->where('bid='.I('id'))->save($data); // 根据条件保存修改的数据
        if($tag){
            $this->success('修改成功',U('Admin/bookInfo'));
        }else{
            $this->error('失败',U('Admin/bookInfoUpdate'),0);
        }
    }

	public function bookInfoUpdate(){//图书信息修改
        self::checkLogin();
        $Model=M('books');
        $list=$Model->where('bid='.I('id'))->select();
        //ar_dump($list);
        $this->assign('list',$list);
        $this->display();
    }


	public function booksCheck(){//图书审核
		self::checkLogin();
		$books=M('books');
		$count=count($books->join('left join uinfomation on  books.userid = uinfomation.userid')->where('Status=0')->select());
		$Page=new \Think\Page($count,5);
		$Page->setConfig('header','共%TOTAL_ROW%条');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('link','indexpagenumb');
		$Page->setConfig('theme','%HEADER% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
		$show=$Page->show();
		$bok=$books->join('left join uinfomation on  books.userid = uinfomation.userid')->where('Status=0')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('list',$bok);
		$this->display();
	}

	public function booksDoCheck(){//图书审核判断
		$books=M('books');
		$data['Status']=I('status');
		//$data['Password']=md5(I('password'));
		$tag=$books->where('bid='.I('id'))->save($data); // 根据条件保存修改的数据
		if($tag){
			$this->success('审核成功',U('Admin/Admin/booksCheck'),1);
		}else{
			$this->error('失败',U('Admin/Admin/booksCheck'),1);
		}
	}

	public function bookRead(){
		self::checkLogin();
		$bid=I('bid');
		$list=M('books')->field('content,bid,bookName')->where('bid='.$bid)->select();
		$this->assign('book',$list);
		$this->display();
	}

	public function reportAudit(){//评论审核
		self::checkLogin();
		$Model=M('comment');
		$com1=$Model->join('left join uinfomation on  comment.uid = uinfomation.userid')->where('status=1')->select();
		$count=count($com1);
		$Page=new \Think\Page($count,5);
		$Page->setConfig('header','共%TOTAL_ROW%条');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('link','indexpagenumb');
		$Page->setConfig('theme','%HEADER% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE%');
		$show=$Page->show();
		$com=$Model->join('left join uinfomation on  comment.uid = uinfomation.userid')->where('status=1')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('list',$com);
		$this->display();
	}
	//评论审核结果
	public function reportJu(){
		self::checkLogin();
		$Model=M('comment');
		$data['status']=I('status');
		$tag=$Model->where('commentid='.I('id'))->save($data); //根据条件保存修改的数据
		if($tag){
			$this->success('审核成功',U('Admin/Admin/reportAudit'),1);
		}else{
			$this->error('失败',U('Admin/Admin/reportAudit'),1);
		}
	}

	//返回作者所有的书
	public function test(){
		$book=M('books')->field('userid,bookName')->where('userid='.I('id'))->select();
		$this->ajaxReturn($book);
	}


	public function upload(){//上传
		self::checkLogin();
		//上传配置
    $upload = new \Think\Upload();
    $upload->maxSize  = 3145728;
    $upload->exts  = array('jpg','gif','txt','png');
    $upload->rootPath  =    './Uploads/' ;
    $upload->savePath   =    '';
    $upload->saveName =  array('uniqid','');
    $upload->autoSub = true;
    $upload->subName = array('date','Ymd');
    $info = $upload->upload();
    if(!$info){
        $this->error($upload->getError());
    }else{
        $model = M('books');
        foreach($info  as $file){
            $data['UserID']  =  I('UserID');
            $data['BookName'] = I('BookName');
            $data['Introduction'] = I('Introduction');
            $data['Content'] = I('editorValue');
            $data['Imagesrc']  =$file['savepath'].$file['savename'];
            $data['Status'] = 1;
            $data['PublishedTime']   =date('Y-m-d H:i:s');
            $tag=$model->add($data);
			if($tag){
				$this->success('上传成功',U('Admin/Admin/index'),1);
				}else{
				$this->error('上传失败',U('Admin/Admin/bookUpload'),1);
				}
        }
    }
	}
//书摘评论排行
	public function rank(){
		self::checkLogin();
		//评论排行
		$bok=M('books')->field('books.bid,books.bookname,count(*) as num')
		->join('comment ON books.bid = comment.bid')->group('comment.bid')->order('num desc');
		$this->assign('list',$bok->limit('10')->select());
		//书摘排行
		$digest=M('digest')->field('digest.bookid,books.bookname,count(*) as num')
		->join('books ON digest.bookid = books.bid')->group('books.bid')->order('num desc');
		$this->assign('digest',$digest->limit('10')->select());
		$this->display();
	}

//年月排行
	public function rank2(){
		self::checkLogin();
		$startmonth = date('Y-m-d H:i:s',time()- 30*24*60*60);
		$startyear = date('Y-m-d H:i:s',time()- 365*24*60*60);
		$end = date('Y-m-d H:i:s',time());
		$datamonth['PublishedTime']=array('between',array($startmonth,$end));
		$datayear['PublishedTime']=array('between',array($startyear,$end));
		$mon=M('books')->field('books.bid,books.bookname,count(*) as num')->join('comment ON books.bid = comment.bid')->where($datamonth)->group('comment.bid')->order('num desc')->limit('10')->select();
		$yea=M('books')->field('books.bid,books.bookname,count(*) as num')->join('comment ON books.bid = comment.bid')->where($datayear)->group('comment.bid')->order('num desc')->limit('10')->select();
		$this->assign('list',$mon);
		//var_dump($yea);
		$this->assign('digest',$yea);
		$this->display();
	}


	public function login(){
		$this->display();
	}

	public function doLogin(){//登陆
		$model=M('admin');
		$data['username']  = I('UserName');
		$sele=$model->where($data)->find();
		//echo I('Password');
		//var_dump($sele) ;
		if($sele['password'] ===I('Password')){
			session('user.username',$data['username']);

			$this->success('登陆成功',U('Admin/Admin/index'),1);

		}else{
			$this->error('账号或密码错误',U('Admin/Admin/login'),1);
		}
	}

	public function checkLogin(){
		if(!session('user.username')){
			$this->error('请登陆',U('Admin/Admin/login'),1);
		}
	}


	public function login_out(){
		self::checkLogin();
		session_destroy();
		$this->success('退出登陆成功',U('Admin/login'));
	}

}
