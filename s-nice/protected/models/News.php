<?php

/**
 * This is the model class for table "{{News}}".
 *
 * The followings are the available columns in table '{{News}}':
 * @property string $id
 * @property string $pid
 * @property string $title
 * @property string $img
 * @property string $brief
 * @property string $content
 * @property string $source
 * @property integer $is_show
 * @property string $orderid
 * @property string $views
 * @property string $create_uid
 * @property string $create_time
 * @property string $update_time
 */
class News extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, title, content, create_uid, create_time, news_date', 'required'),
			array('is_show, orderid', 'numerical', 'integerOnly'=>true),
			array('pid, create_uid', 'length', 'max'=>6),
			array('title, img', 'length', 'max'=>150),
			array('source', 'length', 'max'=>120),
			array('orderid, create_time', 'length', 'max'=>11),
			array('views', 'length', 'max'=>10),
			array('brief, update_time, img, orderid', 'safe'),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pid, title, img, brief, content, source, is_show, orderid, views, create_uid, create_time, update_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pid' => '分类',
			'title' => '标题',
			'img' => '配图',
			'brief' => '简介',
			'content' => '内容',
			'source' => '来源',
			'is_show' => '是否显示',
			'orderid' => '排序',
			'views' => '浏览数',
			'create_uid' => '创建者',
			'create_time' => '创建时间',
			'update_time' => '更新时间',
			'news_date' => '日期',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('brief',$this->brief,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('orderid',$this->orderid,true);
		$criteria->compare('views',$this->views,true);
		$criteria->compare('create_uid',$this->create_uid,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getImgs ( $c='')
	{
		$pattern = "/<[img|IMG].*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
		preg_match_all($pattern, $c, $match);
		
		return $match[0];
	}
	
}
