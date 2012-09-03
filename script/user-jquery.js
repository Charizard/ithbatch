// JavaScript Document
$(document).ready(function(){
			$("#footer").ready(function(){
				var homeheight=$("#base").outerHeight()+$("#wholecontent").outerHeight()+$("#pagenavigation").outerHeight();
				var resized=homeheight+40;
				$(".border").css({'height':resized});
				$(".page").css({'height':resized});
			});
			$("#home").click(function(){
				var homeheight=$("#homepage").outerHeight();
				var resized=homeheight+40;
				$(".border").css({'height':resized});
				$(".page").css({'height':resized});
			});
			$("#members").click(function(){
				var homeheight=$("#memberspage").outerHeight();
				var resized=homeheight+40;
				$(".border").css({'height':resized});
				$(".page").css({'height':resized});
			});
			$("#about").click(function(){
				var homeheight=$("#aboutpage").outerHeight();
				var resized=homeheight+40;
				$(".border").css({'height':resized});
				$(".page").css({'height':resized});
			});
			$("#contact").click(function(){
				var homeheight=$("#contactpage").outerHeight();
				var resized=homeheight+40;
				$(".border").css({'height':resized});
				$(".page").css({'height':resized});
			});
			$("#fbusername a").click(function(){
					if($("#dropdown").css("visibility")=='hidden'){
						$("#fbusername").css({
									'backgroundColor':'white'
						});
						$("#fbusername a").css({
									'color':'#3A579A'
						});
						$("#dropdown").css({
									'visibility':'visible'
						});
					}
					else
					{
						$("#fbusername a").css({
									'color':'#FFF'
						});
						$("#fbusername").css({
									'backgroundColor':'transparent'
						});
						$("#dropdown").css({
									'visibility':'hidden'
						});
					}
			});
});