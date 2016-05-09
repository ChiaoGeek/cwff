<?php
class IndexAction extends Action {

    public $str; //循环遍历栏目的字符串；
//    ================    
    public function index(){//index tpl display;
		$this->display('login');
    }
 
//    ================

    public function loginVertify(){// login vertify;   	
    	if($_SESSION['vertify'] == md5($_POST['vertify'])) {
            $unm = $_POST['username'];
            $pwd = $_POST['password'];
            if ($unm && $pwd) {
                 $Admin = M("Admin");
                 $get_db_password = $Admin->where('username = "'.$unm.'"')->find();;
                 if ($pwd == $get_db_password['password']){
                    $_SESSION['username'] = $get_db_password['username'];
                    $_SESSION['authority'] = $get_db_password['authority'];
                    $this->success('登录成功','?m=Index&a=adminindex');

                 } else {
                     $this->error('密码错误');  
                 }               
                
            } else {               
                $this->error('用户名或密码不能为空！');
            }
            
   		//
 		}else{
 			$this->error('验证码错误！');
 		}
 		
 		
    }
//    ================
    public function verify(){// vertify code;
    	import('ORG.Util.Image');
    	Image::buildImageVerify(2,1,'png','','22','vertify');
    }
//    ================
    public function adminIndex(){ // admin index UI
        if ($this->checkUser() == 'super') {
            # code...
            switch ($_GET['type_link']) {
                case 'myInfo':
                    # code...
                    $this->displayFun('myInfo');
                    break;
                case '1':
                    # code...
                    $this->displayFun('1');
                    break;         
                case '2':
                    # code...
                    $this->displayFun('2');
                    break; 
                case '3':
                    # code...
                    $this->displayFun('3');
                    break; 
                case 'memberManage':
                    # code...
                    $this->displayFun('memberManage');
                    break; 
                case 'personInfo':
                    # code...
                    $this->displayFun('personInfo');
                    break;                                                                                           
                default :
                    # code...
                    $this->display();
                    break;
            }
        }else{
            $this->error('请登录！','?m=Index&a=index');
        }
        
    }

//    ================  
   public function displayFun($case){    // top menu
        if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
        if ($this->checkUser()) {
            if ($case == 'myInfo') {
                # code...
                $this->display('10');
            }else if($case == '1'){
                # code...
                $this->display('m1');
            }else if($case == '2'){
                # code...
                $this->m2();
                
            }else if($case == 'contentManage'){
                # code...
                $this->display('1');
            }else if($case == '3'){
                # code...
                $this->display('m3');
            }else if($case == 'memberManage'){
                # code...
                $this->display('1');
            }else if($case == 'personInfo'){
                # code...
                $this->display('1');
            }
            
            # code...
        } else {
            # code...
            $this->error('请登录！','?m=Index&a=index');
        }
        


            }  
//    ================ 
    public function defaultpage(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            $this->display(); 
    }
    public function m1_sub1(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            $Data = M('Model'); // 实例化Data数据对象
            import('ORG.Util.Page');// 导入分页类
            $count = $Data->count();// 查询满足要求的总记录数
            $Page  = new Page($count,20);// 实例化分页类 传入总记录数
                // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
            $nowPage = isset($_GET['p'])?$_GET['p']:1;
            $list = $Data->order('id')->page($nowPage.','.$Page->listRows)->select();
            $show       = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('list',$list);// 赋值数据集
            $this->display(); // 输出模板
    }
    public function m1_sub1_add(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            if($_POST['submit'] == '提交'){
                $Articlemodel = M('Model');
                if($Articlemodel->create()){
                    $result = $Articlemodel->add();
                    if($result){
                        $this->success('添加成功','?m=Index&a=m1_sub1_layerclose');
                    }else{
                        $this->error('添加失败','?m=Index&a=m1_sub1_layerclose');
                    }
                } else{
                    $this->error($Articlemodel->getError(),'?m=Index&a=m1_sub1_layerclose');
                }
            }else if($_POST['updata'] == '修改'){
                $Articlemodel = D('Articlemodel');
                if($Articlemodel->create()){
                    $result = $Articlemodel->save();
                    if($result){
                        $this->success('修改成功','?m=Index&a=m1_sub1_layerclose');
                    }else{
                        $this->error('数据和原数据一致','?m=Index&a=m1_sub1_layerclose');
                    }
                } else{
                    $this->error($Articlemodel->getError(),'?m=Index&a=m1_sub1_layerclose');
                }


            }else{
                 if ($_GET['id']) {
                        $Articlemodel = M('Model');
                        $value = $Articlemodel->where('id ="'.$_GET['id'].'"')->find();            
                        $this->assign('value',$value);
                        $this->assign('flag','updata');
                    } else {
                        $this->assign('flag','submit');

                    }
                    $this->display();
            }
        
        }

    public function m1_sub1_delete(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            $Data = M('Model');
            $id = $_GET['id'];
            //判断是否有栏目在使用模块
            $value = $Data->where('id ='.$id)->find();
            $are_using_num = $value['are_using_num'];
            if($are_using_num = 0){
                $result = $Data->where('id ='.$id)->delete(); 
                if($result){
                    $this->success('删除成功');
                }else{
                    $this->success('删除失败');
                }         
            }else{
                $this->success('该模型有栏目在使用，所以不能删除！');
            }              
    }

    public function m1_sub1_layerclose(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            $this->display();
        
    }

    public function m2(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            $Dolumn = M('Column');
            $Model = M('Model');
            $model_result = $Model->order('id')->where('are_using_num > 0')->select();

            //$list = $Data->select();
           // $this->assign('list',$list);
            $this->display('m2');
    }

    public function m2_articlelist(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            $Data = M('Article');
            $condition['entype'] = $entype = $_GET['en_name'];
            $condition['raw_id'] = $raw_id = $_GET['raw_id'];
            $condition['p_id'] = $p_id = $_GET['p_id'];
            $condition['model_type'] = $model_type = $_GET['model_type'];
            import('ORG.Util.Page');// 导入分页类
            $count      = $Data->count();// 查询满足要求的总记录数
            $Page       = new Page($count,22);// 实例化分页类 传入总记录数
                // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
            $nowPage = isset($_GET['p'])?$_GET['p']:1;
            $list = $Data->order('createtime desc')->where($condition)->page($nowPage.','.$Page->listRows)->select();
            $show       = $Page->show();// 分页显示输出
            $this->assign('list',$list);
            $this->assign('show',$show);
            $this->assign('entype',$entype);
            $this->assign('raw_id',$raw_id);
            $this->assign('p_id',$p_id);
            $this->assign('model_type',$model_type);
            $this->assign('zhtype',$_GET['zhtype']);           
            $this->display();
        
    }
    public function m2_add(){//
           if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
           //上传图片
           import('ORG.Net.UploadFile');
           $upload = new UploadFile();// 实例化上传类
           $upload->maxSize  = 3145728 ;// 设置附件上传大小
           $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
           $upload->savePath =  './public/Uploads/thumbs/';// 设置附件上传目录

           if($_POST['submit'] == '提交'){
                $Article = M('Article');
                $Column = M('Column');
                $type = $_POST['zhtype'];
                $array = explode('_', $type);
                $data['zhtype'] = $array[1];
                $data['entype'] = $array[0];
                $data['raw_id'] = $_POST['raw_id'];
                $data['p_id'] = $_POST['p_id'];
                $data['title'] = $_POST['title'];
                $data['author'] = $_POST['author'];               
                $data['content'] = $_POST['content'];
                $data['createtime'] = $_POST['createtime'];
                $data['model_type'] = $_POST['model_type'];
                $data['time'] = 0;
                $upload_result = $upload->upload();
                if($upload_result){
                    $info = $upload->getUploadFileInfo();
                    $data['thumb_name'] = $info[0]['savename'];
                    $data['thumb_path'] = $info[0]['savepath'];
                }else{
                    $this->error($upload->getErrorMsg());
                }
                $result = $Article->add($data);
                    if($result){
                        $this->success('添加成功','?m=Index&a=m1_sub1_layerclose');
                       //$this->success('添加成功','?m=Index&a=m2_articlelist&enname='.$data['entype']);

                       
                    }else{
                        $this->error('添加失败','?m=Index&a=m1_sub1_layerclose');
                    }
                   
            }else if($_POST['updata'] == '修改'){
                    $Article = D('Article');
                    //$Articlemodel = M('Articlemodel');
                    $data['title'] = $_POST['title'];
                    $data['author'] = $_POST['author'];               
                    $data['content'] = $_POST['content'];
                    $data['createtime'] = $_POST['createtime'];
                    if($_FILES['thumb']['name']){
                        $upload_result = $upload->upload();
                        if($upload_result){
                            $info = $upload->getUploadFileInfo();
                            $data['thumb_name'] = $info[0]['savename'];
                            $data['thumb_path'] = $info[0]['savepath'];
                        }else{
                            $this->error($upload->getErrorMsg());
                        }
                    }
                    $result = $Article->where('id = "'.$_POST['id'].'"')->save($data);
                    if($result){
                        $this->success('修改成功','?m=Index&a=m1_sub1_layerclose');
                    }else{
                        $this->error('数据和原数据一致','?m=Index&a=m1_sub1_layerclose');
                    }
               

            }else{
                 if ($_GET['id']) {
                        $Article = M('Article');
                        $value = $Article->where('id ="'.$_GET['id'].'"')->find();            
                        $this->assign('value',$value);
                        $this->assign('flag','updata');
                    } else {
                        $this->assign('flag','submit');

                    }
                    $Column = M('Column');
                    $column_argu['enname'] = $_GET['enname'];
                    $column_argu['raw_id'] = $_GET['raw_id'];
                    $column_argu['p_id'] = $_GET['p_id'];
                    $column_argu['model_type'] = $_GET['model_type'];

                    $select = $Column->where('id='.$column_argu['raw_id'] )->find();
                    $this->assign('select',$select);
                    
                    $this->assign('column_argu',$column_argu);
                    $this->display();
            }
        
    }
    public function m2_add_file(){//
           if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
           //上传图片
           import('ORG.Net.UploadFile');
           $upload = new UploadFile();// 实例化上传类
           $upload->maxSize  = 3145728 ;// 设置附件上传大小
           $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
           $upload->savePath =  './public/Uploads/thumbs/';// 设置附件上传目录

           if($_POST['submit'] == '提交'){
                $Article = M('Article');
                $Column = M('Column');
                $type = $_POST['zhtype'];
                $array = explode('_', $type);
                $data['zhtype'] = $array[1];
                $data['entype'] = $array[0];
                $data['raw_id'] = $_POST['raw_id'];
                $data['p_id'] = $_POST['p_id'];
                $data['title'] = $_POST['title'];
                $data['author'] = $_POST['author'];               
                $data['content'] = $_POST['content'];
                $data['createtime'] = $_POST['createtime'];
                $data['model_type'] = $_POST['model_type'];
                $data['time'] = 0;
                $upload_result = $upload->upload();
                // if($upload_result){
                //     $info = $upload->getUploadFileInfo();
                //     $data['thumb_name'] = $info[0]['savename'];
                //     $data['thumb_path'] = $info[0]['savepath'];
                // }else{
                //     $this->error($upload->getErrorMsg());
                // }
                $result = $Article->add($data);
                    if($result){
                        $this->success('添加成功!','?m=Index&a=m2_add_file&en_name='.$data['entype'].'&raw_id='.$data['raw_id'].'&p_id='.$data['p_id'].'&model_type='.$data['model_type']);
                       //$this->success('添加成功','?m=Index&a=m2_articlelist&enname='.$data['entype']);

                       
                    }else{
                        $this->error('添加失败','?m=Index&a=m2_add_file');
                    }
                   
            }else if($_POST['updata'] == '修改'){
                    $Article = D('Article');
                    //$Articlemodel = M('Articlemodel');
                    $type = $_POST['zhtype'];
                    $array = explode('_', $type);
                    $data_argu['zhtype'] = $array[1];
                    $data_argu['entype'] = $array[0];
                    $data_argu['raw_id'] = $_POST['raw_id'];
                    $data_argu['p_id'] = $_POST['p_id'];
                    $data_argu['model_type'] = $_POST['model_type'];

                    $data['title'] = $_POST['title'];
                    $data['author'] = $_POST['author'];               
                    $data['content'] = $_POST['content'];
                    $data['createtime'] = $_POST['createtime'];
                    if($_FILES['thumb']['name']){
                        $upload_result = $upload->upload();
                        if($upload_result){
                            $info = $upload->getUploadFileInfo();
                            $data['thumb_name'] = $info[0]['savename'];
                            $data['thumb_path'] = $info[0]['savepath'];
                        }else{
                            $this->error($upload->getErrorMsg());
                        }
                    }
                    $result = $Article->where('id = "'.$_POST['id'].'"')->save($data);
                    if($result){
                        $this->success('修改成功','?m=Index&a=m2_add_file&en_name='.$data_argu['entype'].'&raw_id='.$data_argu['raw_id'].'&p_id='.$data_argu['p_id'].'&model_type='.$data_argu['model_type']);
                    }else{
                        $this->error('数据和原数据一致','?m=Index&a=m1_sub1_layerclose');
                    }
               

            }else{               
                    $Column = M('Column');
                    $Article = M('Article');

                    $column_argu['enname'] = $_GET['en_name'];
                    $column_argu['raw_id'] = $_GET['raw_id'];
                    $column_argu['p_id'] = $_GET['p_id'];
                    $column_argu['model_type'] = $_GET['model_type'];

                    $value = $Article->where('model_type = "'.$column_argu['model_type'].'" AND entype = "'.$column_argu['enname'].'" AND raw_id = "'.$column_argu['raw_id'].'"')->find();            
                    $this->assign('value',$value); 
                    if($value){
                        $this->assign('flag','update'); 
                    }else{
                        $this->assign('flag','submit'); 
                    }                                        
                                    
                    $select = $Column->where('id='.$column_argu['raw_id'] )->find();
                    $this->assign('select',$select);                  
                    $this->assign('column_argu',$column_argu);
                    $this->display();
           }
        
    }       public function m2_delete(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            $Data = M('Article');
            $id = $_GET['id'];
            $result = $Data->where('id ='.$id)->delete();
            if($result){
                $this->success('删除成功');

            }else{
                $this->success('删除失败');

            }

        
    }
    public function menu(){
        if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
        $value = $this->loop_menu();
        $value = '<ul id="category_tree" class="filetree  treeview">'.$value.'</ul>';
        $this->assign('menu',$value);
        $this->display();
    }
    public function m3_sub1(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            $Data = M('Column'); // 实例化Data数据对象
            import('ORG.Util.Page');// 导入分页类
            $count = $Data->count();// 查询满足要求的总记录数
            $Page  = new Page($count,20);// 实例化分页类 传入总记录数
                // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
            $nowPage = isset($_GET['p'])?$_GET['p']:1;
            $list = $Data->order('id')->page($nowPage.','.$Page->listRows)->select();
            $show       = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $this->assign('list',$list);// 赋值数据集
            $this->display(); // 输出模板
    } 
    public function m3_sub1_add(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            if($_POST['submit'] == '提交'){
                //把栏目的数据插入数据库
                $Articlemodel = M('Column');
                if($Articlemodel->create()){
                    $result = $Articlemodel->add();
                    if($result){
                        //把提交的栏目内容插入到模型中去
                        $Data = M('Model');
                        $model_type = $_POST['model_type'];
                        $result = $Data->where('name="'.$model_type.'"')->find();
                        $value['are_using_num'] = $result['are_using_num'] + 1;
                        $value['are_using'] = ($result['are_using'])? $result['are_using']."*".$_POST['cn_name']:$_POST['cn_name'];
                        $flag = $Data->where('id='.$result['id'])->save($value);
                        if($flag) $this->success('添加成功','?m=Index&a=m1_sub1_layerclose');
                        else $this->error('Model模型创建失败！');

                    }else{
                        $this->error('添加失败','?m=Index&a=m1_sub1_layerclose');
                    }
                } else{
                    $this->error($Articlemodel->getError(),'?m=Index&a=m1_sub1_layerclose');
                }

            }else if($_POST['updata'] == '修改'){
                $Articlemodel = D('Column');
                $Column = D('Column');
                $Data = M('Model');
                $model_type = $_POST['model_type'];
                $res_column = $Articlemodel->where('id='.$_POST['id'])->find();
                if($Articlemodel->create()){                  
                    //处理当模型类型更改时的情况                                   
                    if($res_column['model_type'] != $model_type){
                        $get_data1 = $Data->where('name="'.$res_column['model_type'].'"')->find();
                        $get_data2 = $Data->where('name="'.$model_type.'"')->find();
                        $value1['are_using_num'] = $get_data1['are_using_num'] - 1;
                        $value2['are_using_num'] = $get_data2['are_using_num'] + 1;
                        $Data->where('name="'.$res_column['model_type'].'"')->save($value1);
                        $Data->where('name="'.$model_type.'"')->save($value2);
                    }
                    $result = $Articlemodel->save();
                    if($result){
                        $this->success('修改成功','?m=Index&a=m1_sub1_layerclose');
                    }else{
                        $this->error('数据和原数据一致','?m=Index&a=m1_sub1_layerclose');
                        }

                } else{
                    $this->error($Articlemodel->getError(),'?m=Index&a=m1_sub1_layerclose');
                }


            }else{
                 $Data = M('Model');
                 $option_value = $Data->field('name')->select();
                 $this->assign('option_value', $option_value);
                 if ($_GET['id']) {
                        $Articlemodel = M('Column');
                        $value = $Articlemodel->where('id ="'.$_GET['id'].'"')->find();            
                        $this->assign('value',$value);
                        $this->assign('flag','updata');
                    } else {
                        $this->assign('flag','submit');

                    }
                    $this->display();
            }
        
        }
    public function m3_sub1_delete(){
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
            $Data = M('Column');
            $Model = M('Model');
            $id = $_GET['id'];
            $value = $Data->where('id ='.$id)->find();
            //判断该栏目下是否有自栏目，如果有其实不能删除
            if(!$Data->where('p_id='.$id)->select()){
                //把Model中的数据减一并且减去are_using中的数据           
                $res_model = $Model->where('name="'.$value['model_type'].'"')->find();
                $array['are_using_num'] = $res_model['are_using_num'] - 1;
                $update = $Model->where('id ='.$res_model['id'])->save($array);
                if($update){
                    $result = $Data->where('id ='.$id)->delete();
                    if($result){
                        $this->success('删除成功');

                    }else{
                        $this->success('删除失败');

                    }
                }else{
                    $this->success('更新Model库时存在失败');
                } 

            }else{
                $this->success('因为该栏目下有自栏目所以不能上删除！');
            }
    }

//    ================ Function area
 
   public function checkUser(){ // assign session and judge the authority ;
        if ($_SESSION['username'] && $_SESSION['authority']) {
            # code...
            if ($_SESSION['authority'] == 'super') {
                # code...
                $login = 'super';
            } else if($_SESSION['authority'] == 'general'){
                # code...
                $login = 'general';
            }
            

        } else {
            $login = false;
        }
        return $login;
    }

    public function loop_menu($p_id = 0) { 
        if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
        $Model = M('Model');
        $Column = M('Column');
        $column_result_pid = $Column->order('id')->where("p_id = ".$p_id)->select();
        if($column_result_pid){
            //$this->str .= '<ul id="category_tree" class="filetree  treeview">';
            for($i=0; $i<count($column_result_pid); $i++){
                
                //$this->str .= "<li>";
                //判断栏目级别以便相应样式的选择
                $just_li_type = $Column->where("p_id = ".$column_result_pid[$i]['id'])->select();
                //print_r($just_li_type);
                $model_type = $column_result_pid[$i]['model_type'];
                //echo $model_type;
                $model_type = $Model->where('name ="'.$model_type.'"')->find();
                $model_type = $model_type['model_type'];

                if($just_li_type) {//该栏目有子栏目
                    # code...
                    $this->str .='<li id="'.$column_result_pid[$i]['id'].'" class="collapsable"><span class="folder">'.$column_result_pid[$i]['cn_name'].'</span><ul>';
                    $this->loop_menu($column_result_pid[$i]['id']);
                    $this->str .='</ul></li>';

                } else if(!$just_li_type && $model_type == 'list_model') {
                    # code...
                    $this->str .='<li id="'.$column_result_pid[$i]['id'].'" ><span class=""><a target="right" href="?m=Index&a=m2_articlelist"><img src="__ROOT__/public/images/admin/add_content.gif" alt="添加"></a><a href="?m=Index&a=m2_articlelist&en_name='.$column_result_pid[$i]['en_name'].'&raw_id='.$column_result_pid[$i]['id'].'&p_id='.$column_result_pid[$i]['p_id'].'&model_type=list_model&zhtype='.$column_result_pid[$i]['cn_name'].'" target="right" onclick="open_list(this)">
                        '.$column_result_pid[$i]['cn_name'].'</a></span></li>';
                    $this->loop_menu($column_result_pid[$i]['id']);
                }else if(!$just_li_type && $model_type == 'article_model'){
                    $this->str .='<li id="'.$column_result_pid[$i]['id'].'"><span class="file"><a href="?m=Index&a=m2_add_file&en_name='.$column_result_pid[$i]['en_name'].'&raw_id='.$column_result_pid[$i]['id'].'&p_id='.$column_result_pid[$i]['p_id'].'&model_type=article_model" target="right" onclick="open_list(this)" class="">'.$column_result_pid[$i]['cn_name'].'</a></span></li>';
                    $this->loop_menu($column_result_pid[$i]['id']);
                }
                
            }
            //$this->str .="</ul>";

        }
        return $this->str;

    } 

//    ================  
   public function currentPosition(){ // the content of current position ;
            if(!$this->checkUser()){$this->error('请登录！','?m=Index&a=index');}
        $this->display();
    }  
//    =================
   public function checkData($table, $condition_array){ // 检查数据是否存在 ;
            $Data = M($table);
            if($Data->where($condition_array)->find()){
                return true;
            }else{
                return false;
            }
    }  
}