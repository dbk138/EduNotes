<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	 	 
	public function actionLogin() {
		/*	$service = Yii::app()->request->getQuery('service');
				if (isset($service)) {
        $authIdentity = Yii::app()->eauth->getIdentity($service);
        $authIdentity->redirectUrl = Yii::app()->user->returnUrl;
        $authIdentity->cancelUrl = $this->createAbsoluteUrl('user/login');
         
        if ($authIdentity->authenticate()) {
            $identity = new ServiceUserIdentity($authIdentity);
            // Successful login
            if ($identity->authenticate()) {
                Yii::app()->user->login($identity);
                 
                // Special redirect with closing popup window
                $authIdentity->redirect();
            }
            else {
                // Close popup window and redirect to cancelUrl
                $authIdentity->cancel();
            }
        }
         
        // Something went wrong, redirect to login page
        $this->redirect(array('user/login'));
			}
			*/
   
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					$this->lastViset();
					if (strpos(Yii::app()->user->returnUrl,'/index.php')!==false)
						$this->redirect(Yii::app()->getModule('user')->profileUrl);
						//$this->redirect(Yii::app()->controller->module->returnUrl);
					else
						$this->redirect(Yii::app()->user->returnUrl);
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}
	
	public function actionPage($alias) {
		echo "Page is $alias.";
	}

}