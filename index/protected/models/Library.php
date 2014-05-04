<?php

/**
 * This is the model class for table "{{library}}".
 *
 * The followings are the available columns in table '{{library}}':
 * @property integer $id
 * @property integer $category_id
 * @property integer $subject_id
 * @property integer $topic_id
 * @property string $title
 * @property string $body
 * @property string $tags
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property Subject $subject
 * @property Topic $topic
 */
class Library extends EduActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Library the static model class
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
		return '{{library}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, title, body', 'required'),
			array('category_id, subject_id, topic_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>60),
			array('tags', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, subject_id, topic_id, title, body, tags', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
			'topic' => array(self::BELONGS_TO, 'Topic', 'topic_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'subject_id' => 'Subject',
			'topic_id' => 'Topic',
			'title' => 'Title',
			'body' => 'Body',
			'tags' => 'Tags',
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('tags',$this->tags,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}