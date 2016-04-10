<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8" />
        <title>s-nice</title>
		
        <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon" />
		
		<link href="/assets/css/adminlogin.css" rel="stylesheet" type="text/css"/>
		
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body>
        
            <div id="login" class="login loginpage">
                <h1>s-nice</h1>

				<?php
				$form = $this->beginWidget('CActiveForm', array(
					'id' => 'login-form',
					'enableClientValidation' => true,
					'clientOptions' => array(
						'validateOnSubmit' => true,
					),
				));
				?>
				
				<div class="form-group">
					<?php echo $form->labelEx($model,'账号：', array('for'=>'username') ); ?>
					<?php echo $form->textField($model,'username', array('class'=>'input') ); ?>
					<?php echo $form->error($model,'username', array('class'=>'tipText tipError'), true ); ?>
				</div>
				<div class="form-group">
					<?php echo $form->labelEx($model,'密码：', array('for'=>'user_pass') ); ?>
					<?php echo $form->passwordField($model,'password', array('class'=>'input') ); ?>
					<?php echo $form->error($model,'password', array('class'=>'tipText tipError'), false); ?>
				</div>
				
				<p class="submit">
					<input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary btn-block" value="登录">
				</p>
				
				<?php $this->endWidget(); ?>
				
            </div>
		
    </body>
</html>



