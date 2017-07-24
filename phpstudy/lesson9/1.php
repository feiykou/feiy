<?php
    /*
     * private  protected  public
     * 以上三种权限，在内部都可以访问
     *   
     *              在类内部                               在外部                             在子类   
     * public        可以                                      可以                                  可以
     * protected     可以                                      不能                                  可以
     * private       可以                                      不能                                   不能
     * 
     * 公共的public：都可以使用
     * 受保护的protected：在类内部和子类可以使用，外部不可以使用
     * 私有的private：只有在内部才能使用
     * 
     * 
     */
    
    class Person{
        public $smarty = "60";
        protected $money = "100W";
        private $age = 20;
        
        function live($str,$attr){
            echo "{$str}致良知，格物{$this->$attr}<br>";
        }
    };
    
    $person = new Person();
    //如果字符串中有变量，需要使用{}包裹，字符串需要用双引号
    //public在外部
    echo "<br>public在外部{$person->smarty}<br>";
    //public在类内部
    $person->live("<br>public在类内部","smarty");
    
    
    //echo "<br>protected在外部{$person->money}"; //无法获取
    //protected在类内部
    $person->live("<br>protected在类内部","money"); //内部可以获取
    
    
    
    //Person子类
    class male extends Person{
        function protectSale(){
            echo "protected{$this->money}";
        }
        
        function privateSale(){
            echo "privateSale{$this->age}";
        }
    }
    $male = new male();
    //public
    echo "<br>public在子类中{$male->smarty}<br>";
    //protected  注意：不能用实例化的子类去调用父类protected的变量
    $male->protectSale();
    //private
//     $male->privateSale();//无法访问
//     echo "<br>protected在子类中{$male->money}<br>";
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

