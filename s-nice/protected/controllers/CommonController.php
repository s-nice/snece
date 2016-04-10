<?php

class CommonController extends FrontBase {
	
	public function actionContact(){
		
		if(isset($_POST['data'])){
			$data=$_POST['data'];
			$model=new Contact();
			$model->name=$data[0];
			$model->phone=$data[1];
			$model->message=$data[2];
			
			$model->create_time=date('Y-m-d H:i:s');
			
			if($model->save()){
				echo 1;exit();
			}else{
				echo 0;exit();
			}
		}
		
	}
	
	public function actionGetimg(){
		
		if(isset($_POST['data'])){
			$data=$_POST['data'];
			
			$model = new Image();
			$criteria = new CDbCriteria();
			if($data[0]){
				$criteria->addCondition("is_show=1 and pid=$data[0] and id>$data[1]");
			}else{
				$criteria->addCondition("is_show=1 and id>$data[1]");
			}
			$criteria->order = 'orderid ASC';
			$criteria->limit=6;
			$imgs = $model->findAll($criteria);
			
			if(!$imgs){
				echo 0;exit();
			}
			
			$html=array();
			if($imgs){
				foreach($imgs as $one){
					
					$html[]="<div class='item'><div class='animate-box bounceIn animated'>
					<a href='javascript:;' class='image-popup fh5co-board-img' title='$one->title'><img src='http://7xssk6.com2.z0.glb.clouddn.com/$one->img' alt='s-nice'></a>						
					</div>
					<div class='fh5co-desc'>$one->des</div></div>";
				}
				$html[]="<p style='display:none' id='imgid'>$one->id</p>";
			}
			$html = json_encode($html);
			if($html){
				echo $html;exit();
			}else{
				echo 0;exit();
			}
		}
		
	}
	
}