<script language=JavaScript>
	hoje = new Date()
	dia = hoje.getDate()
	dias = hoje.getDay()
	mes = hoje.getMonth()
	function y2k(number) {
		return (number < 1000) ? number + 1900 : number;
	}
	wyear = y2k(hoje.getYear())
	ano = hoje.getYear()
	if (dia < 10)
		dia = '0' + dia
	function CriaArray (n) {
		this.length = n }
	NomeDia = new CriaArray(7)
	NomeDia[0] = 'Domingo'
	NomeDia[1] = 'Segunda-feira'
	NomeDia[2] = 'Terça-feira'
	NomeDia[3] = 'Quarta-feira'
	NomeDia[4] = 'Quinta-feira'
	NomeDia[5] = 'Sexta-feira'
	NomeDia[6] = 'Sábado'
	NomeMes = new CriaArray(12)
	NomeMes[0] = 'Janeiro'
	NomeMes[1] = 'Fevereiro'
	NomeMes[2] = 'Março'
	NomeMes[3] = 'Abril'
	NomeMes[4] = 'Maio'
	NomeMes[5] = 'Junho'
	NomeMes[6] = 'Julho'
	NomeMes[7] = 'Agosto'
	NomeMes[8] = 'Setembro'
	NomeMes[9] = 'Outubro'
	NomeMes[10] = 'Novembro'
	NomeMes[11] = 'Dezembro'
</script>


<script>document.write (NomeDia[dias] + ', ' + dia + ' de ' + NomeMes[mes] + ' de ' + wyear)</script>