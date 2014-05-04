<?php

/**
 * This is the model class for table "{{note}}".
 *
 * The followings are the available columns in table '{{note}}':
 * @property integer $id
 * @property string $note
 * @property integer $category_id
 * @property integer $subject_id
 * @property integer $topic_id
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Category $category
 * @property Subject $subject
 * @property Topic $topic
 */
class Note extends EduActiveRecord
{

	private $_oldTags;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Note the static model class
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
		return '{{note}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('note, category_id, subject_id, user_id', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			//array('tags', 'match', 'pattern'=>'/^[\w\s,]+$/', 'message'=>'Tags can only contain word characters.'),
			//array('tags', 'normalizeTags'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, note, category, subject, category_id, subject_id, topic_id, user_id', 'safe', 'on'=>'search'),
		);
	}
	
	
	public function behaviors() {
		return array(
			'tags' => array(
				'class' => 'application.behaviors.model.taggable.ETaggableBehavior',
				// Table where tags are stored
				'tagTable' => 'tbl_tag',
				// Cross-table that stores tag-model connections.
				// By default it's your_model_tableTag
				'tagBindingTable' => 'tbl_note_tag',
				// Foreign key in cross-table.
				// By default it's your_model_tableId
				'modelTableFk' => 'note_id',
				// Tag table PK field
				'tagTablePk' => 'id',
				// Tag name field
				'tagTableName' => 'name',
				// Tag counter field
				// if null (default) does not write tag counts to DB
				'tagTableCount' => 'frequency',
				// Tag binding table tag ID
				'tagBindingTableTagId' => 'tag_id',
				// Caching component ID. If false don't use cache.
				// Defaults to false.
				//'cacheID' => 'cache',
	 
				// Save nonexisting tags.
				// When false, throws exception when saving nonexisting tag.
				'createTagsAutomatically' => true,
	 
				// Default tag selection criteria
				//'scope' => array(
					//'condition' => ' t.user_id = :user_id ',
					//'params' => array( ':user_id' => Yii::app()->user->id ),
				//),
	 
				// Values to insert to tag table on adding tag
				//'insertValues' => array(
					//'user_id' => Yii::app()->user->id,
				//),
        )
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
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
			'note' => 'Note',
			'category_id' => 'Category',
			'subject_id' => 'Subject',
			'topic_id' => 'Topic',
			'user_id' => 'User',
			'tags' => 'Tags',
		);
	}
	
	/**
	 * @return array a list of links that point to the topic list filtered by every tag of this topic
	 
	public function getTagLinks()
	{
		$links=array();
		foreach(Tag::string2array($this->tags) as $tag)
			$links[]=CHtml::link(CHtml::encode($tag), array('note/index', 'tag'=>$tag));
		return $links;
	}
	*/
	/**
	 * Normalizes the user-entered tags.
	 
	public function normalizeTags($attribute,$params)
	{
		$this->tags=Tag::array2string(array_unique(Tag::string2array($this->tags)));
	}
	*/
	/**
	 * This is invoked when a record is populated with data from a find() call.
	
	protected function afterFind()
	{
		parent::afterFind();
		$this->_oldTags=$this->tags;
	}
	 */
	/**
	 * This is invoked after the record is saved.
	 
	protected function afterSave()
	{
		parent::afterSave();
		Tag::model()->updateFrequency($this->_oldTags, $this->tags);
	}
	*/
	/**
	 * This is invoked after the record is deleted.
	
	protected function afterDelete()
	{
		parent::afterDelete();
		//Comment::model()->deleteAll('post_id='.$this->id);
		Tag::model()->updateFrequency($this->tags, '');
	}
	 */
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
		$criteria->compare('note',$this->note,true);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('subject_id',$this->subject_id);
		$criteria->compare('topic_id',$this->topic_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}