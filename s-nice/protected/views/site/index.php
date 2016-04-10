<?php $this->pageTitle = ''; ?>
<div id="fh5co-board" data-columns>
	<?php foreach ($imgs as $one) { ?>
	<div class="item">
		<div class="animate-box">
			<a href="<?php echo 'http://7xssk6.com2.z0.glb.clouddn.com/'.$one->img; ?>" class="image-popup fh5co-board-img" title="<?php echo $one->title; ?>"><img src="<?php echo 'http://7xssk6.com2.z0.glb.clouddn.com/'.$one->img; ?>" alt="s-nice"></a>
		</div>
		<div class="fh5co-desc"><?php echo $one->des; ?></div>
	</div>
	<?php } ?>
	<p style="display:none" id="imgid"><?php echo $one->id; ?></p>
	
</div>

<p style="display:none" id="pid"><?php echo $pid; ?></p>
<div id="more" class="col-md-12 text-center">
	<button class="button post-append" title="点击加载更多">点击加载更多</>
</div>