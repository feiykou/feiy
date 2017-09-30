<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {
   
    protected $_validate = array(     
        array('username','require','请填写用户名',1),
        array('password','require','请填写密码',1),
        array('code','require','请填写验证码',1)
    );
    
    
}