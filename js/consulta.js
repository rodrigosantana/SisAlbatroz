$(document).ready(function(){
	        $("select#barco").attr("disabled","disabled");
	        $("select#cruz").attr("disabled","disabled");
	        $("select#obser").change(function(){
	            $("select#barco").attr("disabled","disabled");
	            $("select#barco").html("<option>Aguarde...</option>");
	            var id = $("select#obser option:selected").attr('value');
	            $.post("select_barco.php", {id:id}, function(data){
	                $("select#barco").removeAttr("disabled");
	                $("select#barco").html(data);
	                $("select#barco").change(function(){
	                $("select#cruz").attr("disabled","disabled");
	                $("select#cruz").html("<option>Aguarde...</option>");
	                var id2 = $("select#barco option:selected").attr('value');
	                var id1 = $("select#obser option:selected").attr('value');
	                $.post("select_cruz.php", {id2:id2, id1:id1}, function(data){
	                    $("select#cruz").removeAttr("disabled");
	                    $("select#cruz").html(data);
	                    });
	                });
	            });
	        });
	    });