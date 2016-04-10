<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $model <?php echo $this->getModelClass(); ?> */

<?php
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Update',
);\n";
?>
?>

<div class='col-lg-12 page-title'>
	<h1 class="title pull-left">更新  <?php echo $this->modelClass." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>
	<a class="btn btn-primary pull-right" href="<?php echo "<?php echo Yii::app()->controller->createUrl('admin'); ?>"; ?>">返回</a>
</div>

<div class="col-lg-12">
<?php echo "<?php \$this->renderPartial('_form', array(
	'model'=>\$model,\n)); ?>\n"; ?>
</div>