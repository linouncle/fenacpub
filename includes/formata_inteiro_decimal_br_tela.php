<?

/**
 * Comentário sobre o que faz a função
 *
 *@param [tipo de variável do parâmetro] [nome do parâmetro] [comentário sobre o parâmetro]
 * 
 *@return [tipo de variável que a função retorna]
 *
 **/
 
 $numero = number_format($numero, 2, ',','.');
 
 return $numero;
 
/**
 * Formata número inteiro para decimal com duas casas e com separador de milhar
 *
 * @param integer $numero inteiro a ser formatado
 *
 * @return string
 */

function inteiro_decimal_br($numero)
{
    $numero = number_format($numero, 2, ',', '.'); 
    return $numero;
}

?>