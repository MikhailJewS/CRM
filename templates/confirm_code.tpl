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
                              <img class="img-fluid" src="/templates/auth/images/login-v2.svg" alt="Login V2" />
                            </div>
                        </div>
                        <!-- /Left Text-->
						
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title fw-bold mb-1">Подтверждение кода</h2>
                                <p class="card-text mb-2">Пожалуйста, проверьте вашу электронную почту. Мы отправили вам код подтверждения.</p>
								{if $error}
									<div class="error">{$error}</div>
								{/if}
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
    </div>