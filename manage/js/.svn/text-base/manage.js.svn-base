$(function(){
	$('tbody tr').mouseover(function(){
		$(this).removeClass('RowStyle');
		$(this).addClass('AlternatingRowStyle');
	}).mouseout(function(){
		$(this).addClass('RowStyle');
		$(this).removeClass('AlternatingRowStyle');
	})
	
	$("#checkall").click(function(){
		if (this.checked){
			$("input."+this.value).attr("checked","checked");
		}else{
			$("input."+this.value).attr("checked","");
		}
	})
})