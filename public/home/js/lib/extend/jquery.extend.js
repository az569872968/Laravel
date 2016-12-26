jQuery.extend({
	
	/*
	 * @Hint
	 * @param title String
	 * @param contentTxt String
	 * @param cancel String
	 * @param confirm String
	 */
	Sh_Hint:function(options,callback){
		
		var defaults = {
			title:"确认信息",
			contentTxt:"【温馨提示】请仔细确认当前信息。",
			cancel:"取消",
			confirm:"确定"
		}
		
		var settings = $.extend({}, defaults, options);
		
		var html = 
		'<div class="Hint-wrap active">'+
			'<div class="Hint-background"></div><!--./Hint-background-->'+
			'<div class="Hint-box">'+
				'<div class="Hint-header">'+
					'<span>'+settings.title+'</span>'+
					'<a href="javascript:;" class="Hint-close-btn"><img src="images/common/Hint-close-btn.png"/></a>'+
				'</div>'+
				'<div class="Hint-content">'+
					''+settings.contentTxt+''+
				'</div>'+
				'<div class="Hint-footer">'+
					'<div class="Hint-btn-group tc">'+
						'<a href="javascript:;" class="Hint-btn Hint-btn-cancel">'+settings.cancel+'</a>'+
						'<a href="javascript:;" class="Hint-btn Hint-btn-confirm">'+settings.confirm+'</a>'+
					'</div>'+
				'</div>'+
			'</div><!--./Hint-box-->'+
		'</div><!--./Hint-wrap-->';
		
		if($('.Hint-wrap').length == 0){
			$('body').append(html);
		}else{
			$.Sh_Hint_show();
		}
		
		$('.Hint-btn-cancel').click(function(){
			return callback(false);
		});
		
		$('.Hint-btn-confirm').click(function(){
			return callback(true);
		});
		
		$(".Hint-close-btn").click(function(){
			return callback(false);
		})
	},
	Sh_Hint_close:function(){
		$('.Hint-wrap').removeClass('active');
	},
	Sh_Hint_show:function(){
		$('.Hint-wrap').addClass('active');
	}
});