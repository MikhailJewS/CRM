<?php
/* Smarty version 5.4.0, created on 2024-11-28 17:01:48
  from 'file:confirm_code.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_674877cc3dfc02_39694413',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '62952f2fb41876250385c113877982520f37ee8d' => 
    array (
      0 => 'confirm_code.tpl',
      1 => 1725961040,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_674877cc3dfc02_39694413 (\Smarty\Template $_smarty_tpl) {
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
                              <img class="img-fluid" src="/templates/auth/images/login-v2.svg" alt="Login V2" />
                            </div>
                        </div>
                        <!-- /Left Text-->
						
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Подтверждение кода</h2>
                                <p class="card-text mb-2">Пожалуйста, проверьте вашу электронную почту. Мы отправили вам код подтверждения.</p>
								<?php if ($_smarty_tpl->getValue('error')) {?>
									<div class="error"><?php echo $_smarty_tpl->getValue('error');?>
</div>
								<?php }?>
                                <form class="auth-login-form mt-2" action="index.php?action=confirmCode" method="POST" name="docode">
                                    <div class="mb-1">
                                        <label class="form-label" for="login-email">Код</label>
                                        <input class="form-control" id="code" name="code" type="text" placeholder="" aria-describedby="login-email" autofocus="" tabindex="1" />
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="4" type="submit">Вход</button>
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
