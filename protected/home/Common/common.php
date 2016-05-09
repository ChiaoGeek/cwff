<?php 
    //字符串截取
    function sub_string($start,$encoding,$string,$length){
        
        import('ORG.Util.SubString');// 导入分页类
        $StringSub  = new StringSub();// 实例化分页类 传入总记录数
        return $StringSub->subtractString($start,$encoding,$string,$length);

    }
 ?>