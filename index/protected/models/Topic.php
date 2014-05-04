<?php

/**
 * This is the model class for table "{{topic}}".
 *
 * The followings are the available columns in table '{{topic}}':
 * @property integer $id
 * @property integer $category_id
 * @property integer $subject_id
 * @property string $topic
 * @property string $tags
 *
 * The followings are the available model relations:
 * @property Course[] $courses
 * @property Subject $subject
 * @property Category $category
 * @property Video[] $videos
 */
class Topic extends CActiveRecord
{

	private $_oldTags;	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Topic the static model class
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
		return '{{topic}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, subject_id, topic', 'required'),
			array('category_id, subject_id', 'numerical', 'integerOnly'=>true),
			array('topic', 'length', 'max'=>40),
			array('tags', 'match', 'pattern'=>'/^[\w\s,]+$/', 'message'=>'Tags can only contain word characters.'),
			array('tags', 'normalizeTags'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, subject_id, topic', 'safe', 'on'=>'search'),
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
			'courses' => array(self::HAS_MANY, 'Course', 'topic_id'),
			'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'videos' => array(self::HAS_MANY, 'Video', 'topic_id'),
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
			'topic' => 'Topic',
			'tags' => 'Tags',
		);
	}
	
	/**
	 * @return array a list of links that point to the topic list filtered by every tag of this topic
	 */
	public function getTagLinks()
	{
		$links=array();
		foreach(Tag::string2array($this->tags) as $tag)
			$links[]=CHtml::link(CHtml::encode($tag), array('topic/index', 'tag'=>$tag));
		return $links;
	}
	
	/**
	 * Normalizes the user-entered tags.
	 */
	public function normalizeTags($attribute,$params)
	{
		$this->tags=Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}
	
	/**
	 * This is invoked when a record is populated with data from a find() call.
	 */
	protected function afterFind()
	{
		parent::afterFind();
		$this->_oldTags=$this->tags;
	}
	
		/**
	 * This is invoked after the record is saved.
	 */
	protected function afterSave()
	{
		parent::afterSave();
		Tag::model()->updateFrequency($this->_oldTags, $this->tags);
	}

	/**
	 * This is invoked after the record is deleted.
	 */
	protected function afterDelete()
	{
		parent::afterDelete();
		//Comment::model()->deleteAll('post_id='.$this->id);
		Tag::model()->updateFrequency($this->tags, '');
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
		$criteria->compare('topic',$this->topic,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}