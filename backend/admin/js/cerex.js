 
function updateTxtContent(){
    var e = document.getElementById("syn_list");
    var f = e.options[e.selectedIndex].value;    
    alert(f);
    var $newModule = f;
}








$(document).on("ready", inicio);
function inicio()
{
	//AQUI VA EL CODIGO PARA EJECUTAR MI CODIGO
	$("#menu_uno1").on("click",transicion1);
	$("#menu_dos2").on("click",transicion2);
	$("#menu_tres3").on("click",transicion3);
	$("#menu_cuatro4").on("click",transicion4);
	//pagina espanol, idioma para aprender aleman****
	//$("#escolares").hide();
	//$("#universitarios").hide();
	//$("#privados").hide();
	//$("#empresas").hide();
}
function transicion1()
{
	//Object JS/JSON
	var cambiosCSS =
	{
		opacity: 0.2	
	};
	var cambiosPerson =
	{
		opacity: 1,
	};
	$("#menu_dos2").css(cambiosCSS);
	$("#menu_tres3").css(cambiosCSS);
	$("#menu_cuatro4").css(cambiosCSS);
	$("#menu_uno1").css(cambiosPerson);

	$("#escolares").hide();
	$("#universitarios").hide();
	$("#privados").hide();
	$("#empresas").hide();
	$("#escolares").show();
}
function transicion2()
{
	//Object JS/JSON
	var cambiosCSS =
	{
		opacity: 0.2	
	};
	var cambiosPerson =
	{
		opacity: 1,
	};
	$("#menu_uno1").css(cambiosCSS);
	$("#menu_tres3").css(cambiosCSS);
	$("#menu_cuatro4").css(cambiosCSS);
	$("#menu_dos2").css(cambiosPerson);

	$("#escolares").hide();
	$("#universitarios").hide();
	$("#privados").hide();
	$("#empresas").hide();
	$("#universitarios").show();
}
function transicion3()
{
	//Object JS/JSON
	var cambiosCSS =
	{
		opacity: 0.2	
	};
	var cambiosPerson =
	{
		opacity: 1,
	};
	$("#menu_dos2").css(cambiosCSS);
	$("#menu_uno1").css(cambiosCSS);
	$("#menu_cuatro4").css(cambiosCSS);
	$("#menu_tres3").css(cambiosPerson);

	$("#escolares").hide();
	$("#universitarios").hide();
	$("#privados").hide();
	$("#empresas").hide();
	$("#privados").show();
}
function transicion4()
{
	//Object JS/JSON
	var cambiosCSS =
	{
		opacity: 0.2	
	};
	var cambiosPerson =
	{
		opacity: 1,
	};
	$("#menu_dos2").css(cambiosCSS);
	$("#menu_tres3").css(cambiosCSS);
	$("#menu_uno1").css(cambiosCSS);
	$("#menu_cuatro4").css(cambiosPerson);

	$("#escolares").hide();
	$("#universitarios").hide();
	$("#privados").hide();
	$("#empresas").hide();
	$("#empresas").show();
}