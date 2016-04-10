<?php

/**
 * 公共类
 */
class Common {
	
	public static function getads($pid) {
		
		$model = new Ad();
		$criteria = new CDbCriteria();
		$criteria->addCondition("is_show=1 and pid=$pid");
		$criteria->order = 'orderid ASC';
		$ads = $model->findAll($criteria);
		
		return $ads;
	}
	
	public static function getad($id) {
		
		$ad = Ad::model()->find('id=:id',array('id'=>$id));
		
		return $ad;
	}
	
	public static function getcat($pid) {
		
		$model = new Category();
		$criteria = new CDbCriteria();
		$criteria->addCondition("is_show=1 and pid=$pid");
		$criteria->order = 'orderid ASC';
		$cat = $model->findAll($criteria);
		
		return $cat;
	}
	
}
