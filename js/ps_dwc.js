
	function isValidEmailAddress(emailAddress) {
		 var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		 return pattern.test(emailAddress);
	}
	function setResult(data)
	{
		if(data.status=='error')
		{
			alert(data.msg);
		}
		else
		{
			ps_userid=data.info.userid;
			ps_widgetid=data.info.widgetid;
			jQuery.ajax({
				type:   "POST",
				url:    ajaxurl,
				data:   "action=setuserinfo&userid="+ps_userid+"&widgetid="+ps_widgetid,
				dataType: 'json',
				success: function(data){
					location.href=ps_dwc_plugin_page_url+"&step=2";
				},
				error: function(html){
				}
			});
		}
	}
	function submitformReg()
	{
		var ps_uname=jQuery('#ps_uname1').val();
		var ps_email=jQuery('#ps_email').val();
		var ps_zip=jQuery('#ps_zip').val();
		var ps_role=jQuery('#ps_role').val();
		if(ps_uname=="")
			alert("Please enter username.");
		else if(ps_email=='')
			alert("Please enter email.");
		else if(!isValidEmailAddress(ps_email))
			alert("Please enter valid email.");
		else if(ps_zip=='')
			alert("Please enter zip code.");
		else if(ps_role=='no')
			alert("Please select role.");
		else
		{
			jQuery.ajax({
				type:   "POST",
				url:    siteurlremote+'/ps-ajax-plugin.php',
				data:   "action=getuserwidgetsignup&uname="+ps_uname+"&uemail="+ps_email+"&uzip="+ps_zip+"&urole="+ps_role,
				dataType: 'jsonp',
				jsonp: 'callback',
				jsonpCallback: 'setResult',
				success: function(html){
				},
				error: function(html){
				}
			});
		}
	}
	function submitform()
	{
		var ps_uname=jQuery('#ps_uname').val();
		var ps_pwd=jQuery('#ps_pwd').val();
		if(ps_uname=="")
			alert("Please enter username.");
		else if(ps_pwd=="")
			alert("Please enter password.");
		else
		{
			jQuery.ajax({
				type:   "POST",
				url:    siteurlremote+'/ps-ajax-plugin.php',
				data:   "action=getuserwidget&uname="+ps_uname+"&pwd="+ps_pwd,
				dataType: 'jsonp',
				jsonp: 'callback',
				jsonpCallback: 'setResult',
				success: function(html){
				},
				error: function(html){
				}
			});
		}
	}
	function displayWidget()
	{
		var totalamount=0,totaltest=0,checkedstr='',re='',ps_color='';
		ps_color=jQuery('#ps_widget_color').val();
		jQuery('.chkwidget').each(function(){
			if(jQuery(this).is(':checked')==false)
			{}
			else
				checkedstr+=jQuery(this).val()+',';
		});
		if(checkedstr=='')
			checkedstr="1,";
		var script = document.createElement("script");script.type = "text/javascript";script.language="javascript";
		script.src= siteurlremote+'/ps-dental-widget-js.php?u='+default_widget_key+'&d=1&color='+ps_color+'&size=280&o='+checkedstr;
		document.getElementsByTagName("head")[0].appendChild(script);
	}
	function setWidgetResult(data)
	{
		if(data.status=='error')
			alert(data.msg);
		else
		{
			var ps_userid=data.user_id;
			var ps_widgetid=data.widget_id;	
			var ps_widgetcolor=data.widget_color;						
			jQuery.ajax({
				type:   "POST",
				url:    ajaxurl,
				data:   "action=setwidgetinfo&userid="+ps_userid+"&widgetcolor="+ps_widgetcolor+"&widgetid="+ps_widgetid,
				dataType: 'json',
				success: function(data){
					jQuery('#ps_loading_div img').hide();
					location.href=ps_dwc_plugin_page_url+"&j="+data.widgetid+"&step=4";
				},
				error: function(html){
				}
			});	
		}
	}
	/*function setuserinfo()
	{
		jQuery.ajax({
			type:   "POST",
			url:    ajaxurl,
			data:   "action=setuserinfo&userid="+ps_userid+"&widgetid="+ps_widgetid,
			dataType: 'json',
			//jsonp: 'callback',
			//jsonpCallback: 'setResult',
			success: function(data){
				//console.log(ps_dwc_plugin_page_url+"&step=2");
				location.href=ps_dwc_plugin_page_url+"&step=2";
			},
			error: function(html){
				//alert("error");
			}
		});
	}*/
	
	
	jQuery(document).ready(function(){
		if(ps_dwc_step==1)
		{
			displayWidget();
			jQuery('.chkwidget').bind("click", function(){
				var totalamount=0,totaltest=0,checkedstr='',re='',ps_color='';
				ps_color=jQuery('#ps_widget_color').val();
				jQuery('.chkwidget').each(function(){
					if(jQuery(this).is(':checked')==false)
					{}
					else
						checkedstr+=jQuery(this).val()+',';
				});
				if(checkedstr=='')
					checkedstr="1,";
				var script = document.createElement("script");script.type = "text/javascript";script.language="javascript";
				script.src= siteurlremote+'/ps-dental-widget-main-js.php?u='+default_widget_key+'&d=1&color='+ps_color+'&size=280&o='+checkedstr;
				document.getElementsByTagName("head")[0].appendChild(script);
			});
			jQuery('#ps_widget_color').bind('change',function(){
				var checkedstr='',ps_color='',re='';
				ps_color=jQuery(this).val();
				jQuery('.chkwidget').each(function(){
					if(jQuery(this).is(':checked')==false)
					{}
					else
						checkedstr+=jQuery(this).val()+',';
				});
				if(checkedstr=='')
					checkedstr="1,";
				var script = document.createElement("script");script.type = "text/javascript";script.language="javascript";
				script.src= siteurlremote+'/ps-dental-widget-main-js.php?u='+default_widget_key+'&d=1&color='+ps_color+'&size=280&o='+checkedstr;
				document.getElementsByTagName("head")[0].appendChild(script);
			});
			jQuery('#saveandcontinue').live('click',function(){
				var totalamount=0,totaltest=0,checkedstr='',re='',ps_color='',widgetdisplay=0;
				jQuery('#ps_loading_div img').show();
				ps_color=jQuery('#ps_widget_color').val();
				jQuery('.chkwidget').each(function(){
					if(jQuery(this).is(':checked')==false)
					{}
					else
						checkedstr+=jQuery(this).val()+',';
				});
				if(checkedstr=='')
					checkedstr="1,";

				if(jQuery('#check-7').is(':checked')==true)
					widgetdisplay=1;
				jQuery.ajax({
					type:   "POST",
					url:    siteurlremote+'/ps-ajax-plugin.php',
					data:   "action=insertwidget&widget_color="+ps_color+"&cat="+checkedstr+"&widget_display="+widgetdisplay+"&userid="+ps_userid,
					dataType: 'jsonp',
					jsonp: 'callback',
					jsonpCallback: 'setWidgetResult',
					success: function(html){
					},
					error: function(html){
					}
				});		
			});
		}
		else
		{
			jQuery('.anc_regdiv').bind('click',function(){
				jQuery('.regdiv').show();
				jQuery('.logdiv').hide();
			});
			jQuery('.anc_logdiv').bind('click',function(){
				jQuery('.logdiv').show();
				jQuery('.regdiv').hide();
			});
		}
	});