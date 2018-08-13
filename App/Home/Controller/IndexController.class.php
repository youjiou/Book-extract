<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function index(){
       $model = M('books');
        $list1 = $model->join('RIGHT JOIN uinfomation ON books.UserID = uinfomation.UserID')->where('status = 1')->order("bid desc")->limit(8)->select();
        $this->assign('list1',$list1);
        $this->assign('uid',session('uid'));
        $this->assign('username', session('username'));

        $bok=M('books')->field('books.bid,books.bookname,count(*) as num')//评论排行
        ->join('comment ON books.bid = comment.bid')->group('comment.bid')->order('num desc');
        $this->assign('comment',$bok->limit('10')->select());
        $digest=M('digest')->field('digest.bookid,books.bookname,count(*) as num')//书摘排行
        ->join('books ON digest.bookid = books.bid')->group('books.bid')->order('num desc');
        $this->assign('digest',$digest->limit('10')->select());

        $this->display();
    }


    //搜索
    public function search(){
        $model  = M('books');
        $key =$_POST['keys'];
        if(!$key) {
            $this->error("请输入关键字！","index",3);
        }
        $data['BookName'] =  ['like',"%".$key."%"];//模糊查询
        $data['Status']  = 1;
        $res = $model->where($data)->select();

        if($res){
            $count = $model->where($data)->count();// 查询满足要求的总记录数
            $Page = new \Think\Page($count,5);//实例化分页，
            $Page ->setConfig('header',共%TOTAL_ROW%条);
            $Page ->setConfig('prev','上一页');
            $Page ->setConfig('next','下一页');
            $show = $Page->show();//分页显示输出
            $list = $model->where($data)->limit($Page->firstRow.','.$Page->listRows)->where($data)->select();
            $this->assign('uid',session('uid'));
            $this->assign('username', session('username'));
            $this->assign('list',$list);
            $this->assign('page',$show);
            $this->display();
        }else{
            $this->error("当前没有你要的书籍,即将返回首页!","index",3);
        }

    }

    //书的封面
    public function book(){
        $Model =M('books');
        $list = $Model->join('RIGHT JOIN uinfomation ON books.UserID = uinfomation.UserID')->where("bid =".$_GET['bid'])->select();
        $Model2 =M('digest');
        $list1 = $Model2->join('RIGHT JOIN uinfomation ON digest.UserID = uinfomation.UserID')->where("BookId =".$_GET['bid'])->select();
        $Model3 = M('comment');
        $list3 = $Model3->join('RIGHT JOIN uinfomation ON comment.UID = uinfomation.UserID')->where("BID =".$_GET['bid'])->select();
        $this->assign('bid',$_GET['bid']);
        $this->assign('list3',$list3);
        $this->assign('list1',$list1);
        $this->assign('uid',session('uid'));
        $this->assign('username', session('username'));
        $this->assign('list',$list);
        $this->display();
    }


    public function mine(){
        $model1 = M('uinfomation');
        $model2 =M('digest');
        $list  = $model1->where('userid ='.session('uid'))->select();
        $count = $model2->where('userid ='.session('uid'))->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,2);//实例化分页
        $Page ->setConfig('header',共%TOTAL_ROW%条留言);
        $Page ->setConfig('prev','上一页');
        $Page ->setConfig('next','下一页');
        $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%<div id="pageTips">共 %TOTAL_PAGE% 页 ( %TOTAL_ROW% 条信息)</div>');
        $show = $Page->show();//分页显示输出
        //  进行分页数据查询 注意limit方法的参数要使用Page类的属性，$firstRow;进行参数
        $list2 = $model2->limit($Page->firstRow.','.$Page->listRows)->order('DigestID  desc')->where('userid ='.session('uid'))->select();
        $model3 =M('books');
        $list3 =$model3->where('userid ='.session('uid'))->select();
        $this->assign('list3', $list3);
        $this->assign('list', $list);
        $this->assign('list2', $list2);
        $this->assign('page',$show);  //分页数据
        $this->assign('uid',session('uid'));
        $this->assign('username', session('username'));
        if(IS_AJAX){          //判断绑定的数据是否有被点击
            $html = $this->fetch('mypage'); //渲染
            $this->ajaxReturn($html);
        }
        else{
            $this->display();
        }
    }




    //上传
    public function upload()
    {
        $upload = new \Think\Upload();
        $upload->maxSize  = 3145728;
        $upload->exts  = array('jpg','png','gif');
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
                $data['UserID']  =  session('uid');
                $data['BookName'] = $_POST['bookname'];
                $data['Introduction'] =  $_POST['instroction'];
                $data['Content'] =  I('editorValue');
                $data['Imagesrc']  =$file['savepath'].$file['savename'];
                $data['Status'] = 0; //未审核
                $data['PublishedTime']   =date('Y-m-d H:i:s');
                $model->add($data);
            }
            $this->success("上传成功请稍等,作品待管理员审核可供人观看","mine",5);
        }

    }


   public function read(){
       $model = M('books');
       $res = $model->join('RIGHT JOIN uinfomation ON books.UserID = uinfomation.UserID')->where('bid ='.$_GET['bid'])->select();
       $this->assign("list",$res);
       $this->assign('id',$_GET['bid']);
       $this->assign("username",session('username'));
       $this->display();
   }



    public function share(){
        //ajax 方式
        $m = M('digest');
        $data['UserId']   =session('uid');
        $data['BookId']  = $_POST['id'];
        $data['Content'] =   $_POST['content'];
        $data['PubishedTime']   =date('Y-m-d H:i:s');
        $res = $m->add($data);
        if($res){
            $arr =array(
                "info"=>"分享书摘成功!（每日只可分享3次)" ,
                "code"=>"200"
            );
        }else {
            $arr = array(
                "info" => "分享书摘失败！",
                "code" => "400"
            );
        }
        $this->ajaxReturn($arr);
    }


    //发表留言
   public function publish(){
   //   echo $_GET['bid'];
       $model = M('comment');
       $data['BID'] =   $_POST['bid'];
       $data['UID'] = session('uid');
       $data['Message'] = $_POST['content'];
       $data['Publishedtime'] =  date('Y-m-d H:i:s');
       $res = $model->add($data);
     if($res){
         $arr =array(
             "info"=>"评论成功" ,
             "code"=>"200"
         );
     }else {
         $arr = array(
             "info" => "评论失败，请联系管理员！",
             "code" => "400"
         );
     }
       $this->ajaxReturn($arr);

   }


    //修改用户名不是账号名
    public function amend(){
        $data['Name'] = $_POST['newname'];
        $model =M('uinfomation');
        $res = $model->where("UserID =".session('uid'))->save($data);
        if($res){
            $this->success("修改成功，请稍等","mine",3);
        }else{
            $this->success("修改失败，请检查字段","mine",3);
        }

    }


    public function statux($a){
        if($a==0) {  return "审核中";  }
        else if($a==1)  {  return "审核通过"; }
        else   {return "审核不通过";}
    }



    public function rank(){
        $bok=M('books')->field('books.bid,books.bookname,count(*) as num')//评论排行
        ->join('comment ON books.bid = comment.bid')->where('Status=1')->group('comment.bid')->order('num desc');
        $this->assign('list',$bok->limit('10')->select());
        $digest=M('digest')->field('digest.bookid,books.bookname,count(*) as num')//书摘排行
        ->join('books ON digest.bookid = books.bid')->where('Status=1')->group('books.bid')->order('num desc');
        $this->assign('digest',$digest->limit('10')->select());
    }

    public function rank2(){
        $startmonth = date('Y-m-d H:i:s',time()- 30*24*60*60);
        $startyear = date('Y-m-d H:i:s',time()- 365*24*60*60);
        $end = date('Y-m-d H:i:s',time());
        $datamonth['PublishedTime']=array('between',array($startmonth,$end));
        $datayear['PublishedTime']=array('between',array($startyear,$end));
				$datayear['Status']=1;
				$datamonth['Status']=1;
        $mon=M('books')->field('books.bid,books.bookname,count(*) as num')->join('comment ON books.bid = comment.bid')->group('comment.bid')->where($datamonth)->order('num desc')->limit('10')->select();
        $yea=M('books')->field('books.bid,books.bookname,count(*) as num')->join('comment ON books.bid = comment.bid')->group('comment.bid')->where($datayear)->order('num desc')->limit('10')->select();

        $this->assign('list',$mon);

        //var_dump($yea);
        $this->assign('digest',$yea);
    }



}