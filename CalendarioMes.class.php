<?php
// Classe que carrega um calendário do mes de acordo com os parâmetros enviados no método exibe.
// Obs: O código HTML foi baseado nos arquivos php com o nome ano/mes (Ex: 2019/janeiro.php).
Class CalendarioMes {
    static $ano;
    static $mes;

    // método que retorna o nome do mês
    private static function nomeMes($mes) {
		$nome_mes = array(
			1=>'janeiro',
			2=>'fevereiro',
			3=>'março',
			4=>'abril',
			5=>'maio',
			6=>'junho',
			7=>'julho',
			8=>'agosto',
			9=>'setembro',
			10=>'outubro',
			11=>'novembro',
			12=>'dezembro'
        );
        return $nome_mes[intval($mes)];
    }

    // método que exibe o código do início da tabela do calendário.
    private static function exibeInicioTabela() {
?>        
    <table width="305" border="1" bordercolor="#000000"
 cellpadding="4" cellspacing="0" frame="below" rules="rows"
 style="page-break-before: always;">
        <col width="36"> <col width="35"> <col width="35"> <col
 width="35"> <col width="35"> <col width="35"> <col width="35"> <tbody>
          <tr>
            <td colspan="7" width="297" valign="top">
		    <p align="center"><?=utf8_decode(self::nomeMes(self::$mes))?> de <?=self::$ano?></p>
            </td>
          </tr>
          <tr valign="top">
            <td width="36">
            <p>Dom</p>
            </td>
            <td width="35">
            <p>Seg</p>
            </td>
            <td width="35">
            <p>Ter</p>
            </td>
            <td width="35">
            <p>Qua</p>
            </td>
            <td width="35">
            <p>Qui</p>
            </td>
            <td width="35">
            <p>Sex</p>
            </td>
            <td width="35">
            <p>Sab</p>
            </td>
          </tr>
          <tr>
    <?php
    }

    // método que exibe as células com os dias em seus respectivos dias da semana no calendário.
    private static function exibeCelulasDiasSemana() {
        $dia = 1;
        $dia_da_semana = 0;
        $data = date_create(self::$ano . self::$mes . str_pad($dia, 2, '0', STR_PAD_LEFT));
        // laço que percorre todos os dias do mês.
        while ($data!==false && date_format($data, 'm')==self::$mes) {
            // preenche os dias referentes ao mês anterior no calendário.
            for (;$dia_da_semana<date_format($data,'w');$dia_da_semana++) {
                echo "\t\t\t<td width=\"35\" sdval=\"\"></td>";
            }
?>

            <td width="35" sdval=""><a href="/diaadia/diaadia3.php?data=<?=date_format($data, 'd/m/Y')?>"><?=$dia?></a><br></td>
<?php
            $data = date_create(self::$ano . self::$mes . str_pad(++$dia, 2, '0', STR_PAD_LEFT));
            $dia_da_semana++;
            if ($dia_da_semana>6) { 
                echo "\t\t</tr><tr>";
                $dia_da_semana=0; 
            }
        }
?>
<?php
    }

    private static function exibeFimTabela() {
        ?>
              </tr>
                </tbody>
              </table>
              <p style="margin-bottom: 0in;"><br>
              </p>
              </td>
        <?php
    }
        
    // Chama os métodos para construção do código html
    private static function exibeCalendarioHTML() {
        self::exibeInicioTabela();
        self::exibeCelulasDiasSemana();
        self::exibeFimTabela();
    }

    // método de entrada para utilização desta classe
    public static function exibe($ano, $mes) {
        self::$ano = $ano;
        self::$mes = $mes;
        
        self::exibeCalendarioHTML();
    }
}
