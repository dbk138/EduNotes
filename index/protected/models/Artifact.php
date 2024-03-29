<?php

/**
 * This is the model class for table "{{artifact}}".
 *
 * The followings are the available columns in table '{{artifact}}':
 * @property integer $id
 * @property string $url
  * @property string $title
 * @property string $description
 * @property integer $subject_id
 * @property integer $rating_id
 * @property integer $category_id
 * @property integer $topic_id
 * @property integer $user_id
 * @property integer $create_user_id
 * @property string $create_time
 * @property integer $update_user_id
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property Subject $subject
 * @property Rating $rating
 * @property Topic $topic
 * @property Category $category
 * @property User $user
 */
class Artifact extends EduActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Artifact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{artifact}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, title, description, subject_id, category_id, user_id, create_user_id, create_time, update_user_id, update_time', 'required'),
			array('subject_id, rating_id, category_id, topic_id, user_id, create_user_id, update_user_id', 'numerical', 'integerOnly'=>true),
			array('url', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, url, description, subject_id, rating_id, category_id, topic_id, user_id, create_user_id, create_time, update_user_id, update_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
			'rating' => array(self::BELONGS_TO, 'Rating', 'rating_id'),
			'topic' => array(self::BELONGS_TO, 'Topic', 'topic_id'),
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'url' => 'URL',
			'title' => 'Title',
			'description' => 'Description',
			'subject_id' => 'Subject',
			'rating_id' => 'Rating',
			'category_id' => 'Category',
			'topic_id' => 'Topic',
			'user_id' => 'User',
			'create_user_id' => 'Create User',
			'create_time' => 'Create Time',
			'update_user_id' => 'Update User',
			'update_time' => 'Update Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('rating_id',$this->rating_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('create_user_id',$this->create_user_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_user_id',$this->update_user_id);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}