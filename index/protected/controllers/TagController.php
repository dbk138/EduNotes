<?php

class TagController extends Controller
{
public function actionJson(){
            header('Cache-Control: no-cache, must-revalidate');
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
            header('Content-type: application/json');
         
            $this->layout = false;
            if(isset($_GET['tag'])){
                 
                $criteria=new CDbCriteria(array(
                    'limit' => 10
                ));
                 
                $criteria->addSearchCondition('name', $_GET['tag']);
         
                $tags = Tag::model()->findAll($criteria);           
         
                $this->render('json', array('tags' => $tags));
            }
        }
}