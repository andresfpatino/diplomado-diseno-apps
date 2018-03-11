
$(document).ready(function() {
	
	setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#222222');
	}, 3000);
	

	$("#miformulario").on("submit",function(e){
		//para evitar que recarge toda la pagina
		e.preventDefault();
		//captura de forma fantastica todos los campos del formulario
		var cadena=new FormData($(this)[0]); //=$(this).serializeArray();
		//ejecuto el ajax para llamar el php por debajo de cuerda
		$.ajax({
			url:"php/insertar.php",   // llamar la url del php
			data:cadena,  // envia todos los campos
			type:"post",  // los envia con metodo post
			processData:false,
			contentType:false
		}).done(function(respuestaphp){   // el php envia la respuesya
			$(".mensaje").fadeIn("slow").delay(3000).fadeOut("slow");
			$("#miformulario").get(0).reset();
		});
	});


	$("#estudiantes").on("submit",function(e){
		//para evitar que recarge toda la pagina
		e.preventDefault();
		//captura de forma fantastica todos los campos del formulario
		var cadena=new FormData($(this)[0]); //=$(this).serializeArray();
		//ejecuto el ajax para llamar el php por debajo de cuerda
		$.ajax({
			url:"insertarE.php",   // llamar la url del php
			data:cadena,  // envia todos los campos
			type:"post",  // los envia con metodo post
			beforeSend:function(){$(".mensaje").html("procesando...");},
			enctype:"multipart/form-data",
			processData:false,
			contentType:false
		}).done(function(respuestaphp){   // el php envia la respuesya
			$(".mensaje").hide();
			$(".mensaje").html(respuestaphp); // se reempaza todo todito hasta el formulario
			$(".mensaje").fadeIn("slow").delay(3000).fadeOut("slow");
			$("#estudiantes").get(0).reset();
		});
	});

	$("#b").on('click',function(){
		
	})

	var n1 = $("#n1").text();
	var n2 = $("#n2").text();
	var n3 = $("#n3").text();
	var n4 = $("#n4").text();

	var total = (parseFloat(n1) + parseFloat(n2) + parseFloat(n3) + parseFloat(n4)) / 4 ;

	$("#nfinal").on('click',function(){
		
		$("#mfinal").html("La nota final es: "+total);
		$("#verde").fadeIn("fast");

	})


	$("#actualizar").on("click",function(event){
		/*event.preventDefault();*/
		var enlace=$(this).attr("href");
		var id=$(this).attr("title");
		var n1 = $("#n1").text();
		var n2 = $("#n2").text();
		var n3 = $("#n3").text();
		var n4 = $("#n4").text();
		$.ajax({
			url:enlace,
			type:"post",
			data:{not1:n1,not2:n2,not3:n3,not4:n4,id:id}
		}).done(function(resphp){
			alert(resphp);
		});
	});

});




$(function(){
	$('#mostrar-menu-secundario').on('click',function(){
		$('.menu-secundario').toggleClass('mostrar-menu-secundario');
	})

});

