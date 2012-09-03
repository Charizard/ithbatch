// JavaScript Document
$(document).ready(function(){
			$(".submitbutton").mousedown(function(){
				$(this).css({
					'-moz-box-shadow':    '0px 0px 0px 0px #FFF',
  					'-webkit-box-shadow': '0px 0px 0px 0px #FFF',
  					'box-shadow':         '0px 0px 0px 0px #FFF'
				});
			});
			$(".submitbutton").mouseup(function(){
				$(this).css({
					'-moz-box-shadow':    '1px 1px 10px 1px #999',
  					'-webkit-box-shadow': '1px 1px 10px 1px #999',
  					'box-shadow':         '1px 1px 10px 1px #999'
				});
			});
		});