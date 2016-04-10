<?php
/**
 * 模板管理
 */

class TemplateController extends AdminBase
{
	//public $layout='//layouts/admin_column';
	
    /**
     * 首页
     */
    public function actionIndex() {
        $templateDir =  Yii::app()->basePath.'/views';
		
        $fileList = XUtils::getDir( $templateDir );
		
        foreach ( (array)$fileList as $key => $file ) 
            $files[] = array( 'fileName' => $file, 'subFileList' => XUtils::getFile( $templateDir .'/'. $file ) );
        $data['fileList'] = $files;
		
        $this->render( 'index', $data );
    }

    /**
     * 编辑
     *
     * @param $id
     */
    public function actionUpdateTpl( $filename ) {
		
        $filename = CHtml::encode(trim( $this->_gets->getParam( 'filename' )));
        $content = trim( $this->_gets->getParam( 'content' ) );
        if ( isset( $_POST['content'] ) ) {
            $fileputcontent = file_put_contents(  Yii::app()->basePath.'/views/'.XUtils::b64decode( $filename ), $content );
            if ( $fileputcontent == true ) {
                //$this->redirect( array ( 'index' ) );
				Yii::app()->user->setFlash('success','修改成功！');
            }
        }
        $data['filename'] = XUtils::b64decode( $filename );
        $data['content'] = htmlspecialchars( file_get_contents(  Yii::app()->basePath.'/views/'.XUtils::b64decode( $filename ) ) );
        $this->render( 'update', $data );

    }


}
