{$header}
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
                                {if $error}
                                    <div class="error-message">
                                        <p>{$error}</p>
                                    </div>
                                {/if}
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
                                        <input type="hidden" name="csrf_token" value="{$csrf_token}"> <!-- Токен CSRF -->
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
    </div>