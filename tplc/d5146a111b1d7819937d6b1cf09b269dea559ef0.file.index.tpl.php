<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-07 12:52:36
         compiled from "/var/www/Back-End-Novaface/view/home/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:571052895547fdae891f624-08398402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5146a111b1d7819937d6b1cf09b269dea559ef0' => 
    array (
      0 => '/var/www/Back-End-Novaface/view/home/index.tpl',
      1 => 1417963952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '571052895547fdae891f624-08398402',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_547fdae89c22e2_02855627',
  'variables' => 
  array (
    'titulo' => 0,
    'HTTP' => 0,
    'retorno' => 0,
    'key' => 0,
    'tipo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_547fdae89c22e2_02855627')) {function content_547fdae89c22e2_02855627($_smarty_tpl) {?><html>
<head>
	<title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/css/bootstrap.min.css" />
	<?php echo '<script'; ?>
 type='text/javascript' src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/js/jquery-2.1.1.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type='text/javascript' src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/js/ajax.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type='text/javascript' src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/js/novaface.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		var URL = "<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
";

		$(document).ready(function(){
			$("#botao_atualizar").hide();
		});
	<?php echo '</script'; ?>
>
</head>
<body>
<div class="xarabas">
	<div class="table-responsive">
		<table class="table table-striped">
			<tr>
				<th>Id</th>
				<th>Nome</th>
				<th>Categoria</th>
				<th>Excluido</th>
				<th>Imagens</th>
				<th>Ação</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['retorno']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['retorno']->value[$_smarty_tpl->tpl_vars['key']->value]['id'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['retorno']->value[$_smarty_tpl->tpl_vars['key']->value]['nome'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['retorno']->value[$_smarty_tpl->tpl_vars['key']->value]['categoria'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['tipo']->value[$_smarty_tpl->tpl_vars['retorno']->value[$_smarty_tpl->tpl_vars['key']->value]['excluir']];?>
</td>
				<td><img src="<?php echo $_smarty_tpl->tpl_vars['HTTP']->value;?>
view/imagens/<?php echo $_smarty_tpl->tpl_vars['tipo']->value[$_smarty_tpl->tpl_vars['retorno']->value[$_smarty_tpl->tpl_vars['key']->value]['excluir']];?>
.png" width="20" height="20"></td>
				<td>
					<button class="btn btn-info  " onclick="NOVA.editar(<?php echo $_smarty_tpl->tpl_vars['retorno']->value[$_smarty_tpl->tpl_vars['key']->value]['id'];?>
);"><span class="glyphicon glyphicon-pencil"></span> Editar</button>
					<button class="btn btn-success " onclick="NOVA.ativar(<?php echo $_smarty_tpl->tpl_vars['retorno']->value[$_smarty_tpl->tpl_vars['key']->value]['id'];?>
);">Ativar</button>
					<button class="btn btn-danger" onclick="NOVA.excluir(<?php echo $_smarty_tpl->tpl_vars['retorno']->value[$_smarty_tpl->tpl_vars['key']->value]['id'];?>
);">Excluir</button>
				</td>
			</tr>
			<?php } ?>
		</table>
	</div>
</div>
<div class="xarabas2">
			<input type="text" name="nome" id="nome_teste" placeholder="digitar o nome" />
			<input type="text" name="categoria" id="categoria" placeholder="digitar a categoria" maxlength="1"/>
			<button class="btn btn-success" id="botao_atualizar" onclick="NOVA.atualizar()">Atualizar</button>
			<button class="btn btn-primary" id="botao_cadastrar" onclick="NOVA.inserir()">Cadastrar</button>
</div>
</body>
</html><?php }} ?>
