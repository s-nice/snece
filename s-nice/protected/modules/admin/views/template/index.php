<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'模板管理',
);
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">模板管理</h1>
</div>

<div class="col-lg-12">
<table class="content_list">
  <form method="post" action="<?php echo $this->createUrl('batch',array('command'=>'delete'))?>" name="cpform" >
    <tr class="tb_header">
      <th style="padding:0 0 0 32px">名称</th>
      <th width="50%">操作</th>
    </tr>
    <?php foreach ((array)$fileList as $row):?>
    <?php if ($row['fileName']!="layouts") {?>
    <tr class="tb_list1">
      <td class="tb_title" colspan="2"><img src="<?php echo Yii::app()->baseUrl; ?>/assets/images/folder.gif" align="absmiddle" /> <?php echo $row['fileName']?> </td>
    </tr>
    <?php foreach ((array)$row['subFileList'] as $subrow):?>
    <tr class="tb_list">
      <td style="padding:0 0 0 34px"><?php echo $subrow?></td>
      <td><a href="<?php echo  $this->createUrl('updateTpl',array('filename'=>XUtils::b64encode($row['fileName'].'/'.$subrow)))?>"><img src="<?php echo Yii::app()->baseUrl; ?>/assets/images/update.png" align="absmiddle" style="" /> 编辑</a>&nbsp;&nbsp;<a href="/static/admin/images/delete.png" align="absmiddle" /></a></td>
    </tr>
    <?php endforeach;?>
    <?php } ?>
    <?php endforeach;?>
  </form>
</table>
</div>
