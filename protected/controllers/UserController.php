<?php

class UserController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    /**
     * register
     */
    public function actionRegister()
    {
        $model=new User;
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-register-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            if($model->validate())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        $this->render('register',array('model'=>$model));
    }

    public function actionRegSubmit()
    {
        //Array ( [User] => Array ( [username] => zzz [password] => 111 ) [yt0] => Submit )
        $form = $_POST['User'];
        $user = new User();
        $user->username = $form['username'];
        $user->password = md5($form['password']);
        $user->login_time = date('Y-m-d H:i:s');
        $user->save();
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}