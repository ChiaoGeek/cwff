<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public $nav;
    public function index(){
        $value = $this->loop_menu();
        $value = '<ul class="sf-menu" id="example">'.$value.'</ul>';
        $this->assign('menu',$value);        
        $this->display(); 
	}

    public function article_list(){  

        $condition['entype'] = $_GET['entype'];
        $condition['model_type'] = $_GET['model_type'];
        $condition['raw_id'] = $_GET['raw_id'];

        $list_tpl =$_GET['list_tpl'];

        $menu = $this->loop_menu();
        $menu = '<ul class="sf-menu" id="example">'.$menu.'</ul>';
        $this->assign('menu',$menu);

        $Article = M('Article');
        $Column = M('Column');
        $value = $Article->where($condition)->select();

        $get_article_tpl = $Column->where('id ='.$condition['raw_id'])->find();
        $article_model = $get_article_tpl['article_type'];
        $navgation = $this->get_navigation($condition['raw_id']);
        $this->assign('list', $value);
        $this->assign('navgation', $navgation);
        $this->assign('article_model', $article_model);
        //print_r($value)

        $this->display($list_tpl); 
        
    }
    public function article(){  

        $id = $_GET['id'];
        $article_type =$_GET['article_type'];

        $menu = $this->loop_menu();
        $menu = '<ul class="sf-menu" id="example">'.$menu.'</ul>';
        $this->assign('menu',$menu);

        $Article = M('Article');
        $value = $Article->where('id = '.$id)->find();
        $navgation = $this->get_navigation($value['raw_id']);
        $this->assign('navgation', $navgation);
        $this->assign('value', $value);
        //print_r($value)

        $this->display($article_type); 
        
    }

    public function menu(){
        $value = $this->loop_menu();
        $value = '<ul class="sf-menu" id="example">'.$value.'</ul>';
        $this->assign('menu',$value);
        $this->display();
    }
    //菜单读取
    public function loop_menu($p_id = 0) { 
        $Model = M('Model');
        $Column = M('Column');
        $Article = M('Article');
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

                $condition['raw_id'] = $column_result_pid[$i]['id'];
                $condition['entype'] = $column_result_pid[$i]['en_name'];
                $condition['model_type'] = $model_type;


                if($just_li_type) {//该栏目有子栏目
                    # code...
                    $this->str .='<li class="parent"><a href="#">'.$column_result_pid[$i]['cn_name'].'</a><ul class="sun">';
                    $this->loop_menu($column_result_pid[$i]['id']);
                    $this->str .='</ul></li>';

                } else if(!$just_li_type && $model_type == 'list_model') {
                    # code...
                    $this->str .='<li><a href="?m=Index&a=article_list&entype='.$column_result_pid[$i]['en_name'].'&model_type='.$model_type.'&raw_id='.$column_result_pid[$i]['id'].'&list_tpl='.$column_result_pid[$i]['model_type'].'">'.$column_result_pid[$i]['cn_name'].'</a></li>';
                    $this->loop_menu($column_result_pid[$i]['id']);
                }else if(!$just_li_type && $model_type == 'article_model'){
                    $get_id = $Article->where($condition)->find();
                    $this->str .='<li><a href="?m=Index&a=article&id='.$get_id['id'].'&article_type='.$column_result_pid[$i]['model_type'].'">'.$column_result_pid[$i]['cn_name'].'</a></li>';
                    $this->loop_menu($column_result_pid[$i]['id']);
                }
                
            }
            //$this->str .="</ul>";

        }
        return $this->str;

    } 

    public function get_navigation($raw_id){
        $Column = M('Column');
        $value = $Column->where('id='.$raw_id)->find();
        if($value){
            $this->get_navigation($value['p_id']);
            $this->nav .= '<span>/</span> <a href="#">'.$value['cn_name'].'</a>';
            
        }
        return $this->nav;

    }


  
}