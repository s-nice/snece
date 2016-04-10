<?php $this->pageTitle = ''; ?>
<div class="col-md-8 col-md-offset-2">
	<h2>留言</h2>
	<div class="fh5co-spacer fh5co-spacer-sm"></div>
	<form action="#">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<input name="name" type="text" class="form-control" placeholder="称呼">
				</div>
			</div>
			
			<div class="col-md-12">
				<div class="form-group">
					<input name="phone" type="text" class="form-control" placeholder="联系方式">
				</div>
				<div class="form-group">
					<textarea name="message" id="message" cols="30" class="form-control" rows="10" placeholder="留言"></textarea>
				</div>
				<div class="form-group">
					<input onclick="contact();return false;" type="submit" class="btn btn-primary" value="发送">
				</div>
			</div>
		</div>
	</form>

</div>

<script>
function contact(){
	var name=$("input[name='name']").val();
	
	var phone=$("input[name='phone']").val();
	
	var message=$("#message").val();
	
	if (name==""){
		alert('请填写称呼！');
		$("input[name='name']").focus();
		return false;
	}
	if (phone==""){
		phone='---';
	}
	
	if (message==""){
		alert('请填写留言！');
		$("#message").focus();
		return false;
	}

	var data=new Array();
	data[0]=name;
	data[1]=phone;
	data[2]=message;

	$.post('/common/contact', {'data': data}, function(data) {

		if(data==1){
			alert('发送成功！');

			$("input[name='name']").val('');
			$("input[name='phone']").val('');
			$("#message").val('');

		}else{
			alert('发送失败！');
		}

	});
}
</script>