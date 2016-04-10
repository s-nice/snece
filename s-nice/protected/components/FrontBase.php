<?php
/**
 * 控制器基类，前台控制器必须继承此类
 * 
 */

class FrontBase extends Controller
{
    public $layout = '//layouts/main';
    
    protected $_seoTitle;
    protected $_seoKeyword;
    protected $_seoDes;
	protected $_seoScode;
	
    /**
	 * 初始化
	 * @see CController::init()
	 */
    public function init ()
    {
		$site = Site::model()->find();
		
		$this->_seoTitle = $site->title;
        $this->_seoKeyword = $site->keyword;
        $this->_seoDes = $site->des;
		$this->_seoScode = $site->code;
        if($site->status == 0){
            self::_closed($site->remark);
		}
		
		
	}

    /**
     * 关闭状态
     */
    protected function _closed($message){
        $this->render('/site/close', array('message'=>$message));
        exit();
    }
}