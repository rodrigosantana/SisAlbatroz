$(document).ready(function(){
			$("#esp_pela").hide();
			$("#esp_sup").hide();
			$("#esp_fund").hide();
			$("#arrasto").hide();
			$("#cerco").hide();
			$("#emalhe").hide();
			$("#varaisca").hide();
			$("#linha").hide();
			$("#combo_petrecho").change(function(){
				$("select option:selected").each(function(){
					if($(this).attr("value")=="1"){
						$("#arrasto").show();
						$("#esp_pela").hide();
						$("#esp_sup").hide();
						$("#esp_fund").hide();
						$("#cerco").hide();
						$("#emalhe").hide();
						$("#varaisca").hide();
						$("#linha").hide();
					}
					if($(this).attr("value")=="2"){
						$("#esp_sup").show();
						$("#arrasto").hide();
						$("#esp_pela").hide();
						$("#esp_fund").hide();
						$("#cerco").hide();
						$("#emalhe").hide();
						$("#varaisca").hide();
						$("#linha").hide();
					}
					if($(this).attr("value")=="3"){
						$("#esp_pela").show();
						$("#esp_sup").hide();
						$("#esp_fund").hide();
						$("#arrasto").hide();
						$("#cerco").hide();
						$("#emalhe").hide();
						$("#varaisca").hide();
						$("#linha").hide();
					}
					if($(this).attr("value")=="4"){
						$("#esp_pela").hide();
						$("#esp_sup").hide();
						$("#esp_fund").show();
						$("#arrasto").hide();
						$("#cerco").hide();
						$("#emalhe").hide();
						$("#varaisca").hide();
						$("#linha").hide();
					}
					if($(this).attr("value")=="5"){
						$("#esp_pela").hide();
						$("#esp_sup").hide();
						$("#esp_fund").hide();
						$("#arrasto").hide();
						$("#cerco").hide();
						$("#emalhe").hide();
						$("#varaisca").show();
						$("#linha").hide();
					}
					if($(this).attr("value")=="6"){
						$("#esp_pela").hide();
						$("#esp_sup").hide();
						$("#esp_fund").hide();
						$("#arrasto").hide();
						$("#cerco").hide();
						$("#emalhe").show();
						$("#varaisca").hide();
						$("#linha").hide();
					}
					if($(this).attr("value")=="7"){
						$("#esp_pela").hide();
						$("#esp_sup").hide();
						$("#esp_fund").hide();
						$("#arrasto").hide();
						$("#cerco").hide();
						$("#emalhe").hide();
						$("#varaisca").hide();
						$("#linha").show();
					}
					if($(this).attr("value")=="8"){
						$("#esp_pela").hide();
						$("#esp_sup").hide();
						$("#esp_fund").hide();
						$("#arrasto").hide();
						$("#cerco").show();
						$("#emalhe").hide();
						$("#varaisca").hide();
						$("#linha").hide();
					}
				});	
			})
		});