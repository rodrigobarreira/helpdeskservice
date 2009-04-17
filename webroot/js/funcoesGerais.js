/*****
 *funções para validaçao 
 * usando expressao regular
 *****/
/*
 *	Nome:  ValidaEmail
 *	Função: Verificar se email está no formato correto
 *	parametro: mailValue
 *	retorno: true ou false
 */
function ValidaEmail(mailValue)
{
	//declaraçao da expressao regular
	var email = /^([a-z0-9_\.]{1,}@[a-z0-9_]{3,}\.[a-z]{2,5})(\.[a-z0-9_]{2,})?$/

	//teste
	if (email.test(mailValue))
	{
		//alert("Tudo Ok ");
		return true;
	}
	else
	{
		//alert("Erro");
		return false;
	}
}

/*  
 *	Nome:  ValidaTelFixo
 *	Função: Verificar se telefone está no formato correto
 *	parametro: telValue
 *	retorno: true ou false 
*/
function ValidaTelFixo(telValue)
{

	var tel = /^([^8|9|0][0-9]{6,7})$/;

	if (tel.test(telValue))
	{
		//alert("Tudo Ok ");
		return true;
	}
	else
	{
		//alert("Erro");
		return false;
	}
}
/*
 * 	Nome:  ValidaTel
 *	Função: Verificar se telefone está no formato correto
 *	parametro: telValue
 *	retorno: true ou false
 */
function ValidaTel(telValue)
{
	var tel = /^([0-9]{7,8})$/;

	if (tel.test(telValue))
	{
		//alert("Tudo Ok ");
		return true;
	}
	else
	{
		//alert("Erro");
		return false;
	}
}

/***** 
*funções para verificar formularios
*****/
/*
 * Nome: VerificaVazio
 * Função: Verificar se valor de campo passado no formulario esta nulo
 * parametro: value
 * Retorno: true ou false 
 */
function VerificaVazio(value)
{
	if ((value==null)||(value==""))
	{
		//alert("Vazio");
		return false;
	}
	else
	{
		//alert("tem gente");
		return true;
	}
}