<?php
/* Smarty version 5.4.0, created on 2024-11-28 04:44:53
  from 'file:login.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_6747cb15612a93_39221416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ecc5afc5d2b452210e90d5cbb3a3c1966af8a4c' => 
    array (
      0 => 'login.tpl',
      1 => 1732648779,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6747cb15612a93_39221416 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\AppServ\\www\\templates';
echo $_smarty_tpl->getValue('header');?>

<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo--><a class="brand-logo" href="#">
                            <h2 class="brand-text text-primary ms-1">Eusc</h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                            <img class="img-fluid" src="/templates/auth/images/login-v2.svg" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
						
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                
								<h2 class="card-title fw-bold mb-1">Вход</h2>
                                <p class="card-text mb-2">Пожалуйста введите логин и пароль</p>
								<!-- Вывод сообщения об ошибке -->
                                <?php if ($_smarty_tpl->getValue('error')) {?>
                                    <div class="error-message">
                                        <p><?php echo $_smarty_tpl->getValue('error');?>
</p>
                                    </div>
                                <?php }?>
								<!-- Форма для логина и пароля -->
								<form action="index.php?action=login" method="post">
									<table width="95%">
										<tr>
											<td colspan="2">
												Логин:<br>
												<input class="form-control" type="text" name="username" id="username" maxlength="50" value="" size="17">
											</td>
										</tr>
										<tr>
											<td colspan="2">
											Пароль:<br>
											<input class="form-control" type="password" name="password" maxlength="255" size="17" autocomplete="off">
											</td>
										</tr>
                                        <input type="hidden" name="csrf_token" value="<?php echo $_smarty_tpl->getValue('csrf_token');?>
"> <!-- Токен CSRF -->
										<tr>
											<td colspan="2"><input class="btn btn-primary w-100" type="submit" name="Login" value="Войти"></td>
										</tr>
									</table>
								</form>
                            </div>
                        </div>
                        <!-- /Login-->							
                    </div>
                </div>
            </div>
        </div>
    </div><?php }
}
