<?php
/* Classe em PHP que gera um calendario com o nome dos meses de todos os anos desde o ano enviado 
	criando uma tabela identica a que existia inclusive nos links que chamavam os arquivos que 
	exibia os meses. Neste ponto foi criado um arquivo que gera os calendarios mensais (calendario_mes.php)
	que será utilizado caso o arquivo php referente àquele ano/mes (Ex: 2019/janeiro.php) não exista.
*/
Class CalendarioAnosMeses {

	private static $data_atual; // data atual do servidor
	private static $ano_inicio; // ano enviado como parâmetro para o métido estático exibeDesde.
	
	// método que retorna um array com um array contendo valores mes e nome_mes ( ex: 'mes'=> 01, 'nome_mes'=>'janeiro' )para cada mes do ano enviado
	// obs: só inclui os meses até o mes atual
	private static function mesesDoAno($ano) {
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

		$meses = array();
		// percorre os meses do ano, no atual exibe somente até o mes atual
		for ($mes=1;
				($ano!=self::$data_atual->format('Y') and $mes<=12) or ($ano==self::$data_atual->format('Y') and $mes<=self::$data_atual->format('m')); 
				$mes++) {
			$meses[]= array('mes' => $mes, 'nome_mes' => utf8_decode($nome_mes[$mes]));
		}	
		return $meses;
		
	}
	// método que abre a tabela no formato do arquivo existente (index.php.sav2019-01-07)
	private static function exibeInicioTabela($ano) {
?>
	<p>
		<br>
		<b><font size="4" style="font-size: 16pt;">dia-a-dia <?=$ano?><br>
		<br>
	</p>
	<table width="500" border="0" cellpadding="0" cellspacing="0">	
		<tbody>
			<tr valign="top">
<?php			
	}
	// método que exibe a celula do mes (link com o nome do mes) na tabela no formato do arquivo existente (index.php.sav2019-01-07)
	private static function exibeCelula($ano, $array_mes) {
?>
				<td width="30%">
					<p align="center">
						<?php
						$file = "$ano/" . str_replace(utf8_decode('ç'), 'c', $array_mes['nome_mes']) . ".php";
						if (file_exists($file)===true) {
							echo "<a href=\"$ano/" . str_replace(utf8_decode('ç'), 'c', $array_mes['nome_mes']) . ".php\">{$array_mes['nome_mes']}</a>";
						}  else {
							echo "<a href=\"calendario_mes.php?ano=$ano&mes=" . str_pad($array_mes['mes'], 2, '0', STR_PAD_LEFT) ." \">{$array_mes['nome_mes']}</a>";
						}
						?>
						
					</p>
				</td>
<?php

	}

	// método que fecha a tabela no formato do arquivo existente (index.php.sav2019-01-07)
	private static function exibeFimTabela() {
?>
			</tr>
		</tbody>
	</table> 
<?php
	}

	// método que exibe as celulas dos meses na tabela no formato do arquivo existente (index.php.sav2019-01-07)
	private static function exibeCelulasMeses($ano) {
			$coluna=0;
			foreach(self::mesesDoAno($ano) as $array_mes) {
				if ($coluna>=3) { // número de colunas a ser exibido.
					echo "</tr>";
					echo "<tr valign=\"top\">";
					$coluna = 0;
				}
				self::exibeCelula($ano, $array_mes);
				$coluna++;
			}
	}
	
	// método que chama os métodos internos para a criação da tabela.
	private static function exibeHTML($ano) {
			self::exibeInicioTabela($ano);
			self::exibeCelulasMeses($ano);
			self::exibeFimTabela();
	}
	
	// método chamado para uso da classe.
	public static function exibeDesde($ano_inicio) {
		self::$data_atual = new DateTime();
		
		// percorre todos os anos desde do ano atual até o ano enviado como parametro
		for ($ano = self::$data_atual->format('Y'); $ano>=$ano_inicio; $ano--) { 
			self::ExibeHTML($ano);
		}
	}
}
?>
