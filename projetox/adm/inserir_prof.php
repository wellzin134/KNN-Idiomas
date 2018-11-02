<!DOCTYPE html>
<html>
	<head>
		<title>Inserção de Professores</title>
		<meta charset="UTf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<script>
		function formatar(mascara, documento){
			var i = documento.value.length;
			var saida = mascara.substring(0,1);
			var texto = mascara.substring(i)

			if (texto.substring(0,1) != saida){
				documento.value += texto.substring(0,1);
			}
		}
	</script>
	<body>
		<a href="adm_func.php"><button>Voltar</button></a>
		<h1>Inserindo um Professor:</h1>
		<form name="aluno" action="" method="POST">
			Nome:
			<input type="text" name="nome" placeholder="Insira o nome completo" required="true">
			CPF:
			<input type="text" name="cpf" placeholder="Insira um CPF válido" maxlength="14" required="true" OnKeyPress="formatar('###.###.###-##', this)"><br>
			RG:
			<input type="text" name="rg" placeholder="Insira um RG válido" maxlength="10" required="true" OnKeyPress="formatar('##.###.###', this)">
			Telefone:
			<input type="text" name="tel" maxlength="13" placeholder="xx-xxxxx-xxxx" required="true" OnKeyPress="formatar('##-#####-####', this)"><br>
			Rua:
			<input type="text" name="rua" placeholder="Insira a rua" required="true">
			Número:
			<input type="text" name="num" placeholder="Insira o número"><br>
			Bairro:
			<input type="text" name="bairro" placeholder="Insira o bairro" required="true">
			Cidade:
			<input type="text" name="city" placeholder="Insira a cidade" required="true">
			UF:
			<input type="text" name="uf" maxlength="2" placeholder="Insira o estado" required="true">
			E-mail:
			<input type="text" name="email" placeholder="Insira o e-mail">
			<hr>
			<h4>Informações do Login:</h4>
			Nome de usuário:
			<input type="text" name="login" placeholder="Insira o nome de usuário desejado"><br>
			Senha:
			<input type="password" name="senha" maxlength="16" placeholder="Insira a senha desejado"><br><br>
			<input type="submit" name="inserir" value="INSERIR">
			<input type="reset" name="limpar" value="LIMPAR">
		</form>
	</body>
</html>
<?php
	include("../conexao.php");
	if(isset($_POST['inserir'])){
		$nome = $_POST['nome'];
		$cpf = $_POST['cpf'];
		$rg = $_POST['rg'];
		$telefone = $_POST['tel'];
		$rua = $_POST['rua'];
		$numero = $_POST['num'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['city'];
		$uf = $_POST['uf'];
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		$email = $_POST['email'];
		$priv = prf;

		$query = mysqli_query($conexao,"INSERT INTO professor(nome, cpf, rg, rua, email, telefone, numero, bairro, cidade, estado) VALUES ('$nome','$cpf', '$rg', '$rua', '$email', '$telefone', '$numero', '$bairro', '$cidade', '$uf')");
		$nao = mysqli_query($conexao,"INSERT INTO login(usuario, senha, privilegio, pr) VALUES ('$login', '$senha', '$priv', '$cpf')");
		header("location:inserir_prof.php");
	}
?>