	<nav class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-light navbar-shadow menu-border" data-nav="brand-center" >
		<div class="navbar-container d-flex content">
			<div class="bookmark-wrapper d-flex align-items-center">
			  <ul class="nav navbar-nav d-xl-none">
				<li class="nav-item"><a class="nav-link menu-toggle" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu ficon"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a></li>
			  </ul>
			  <ul class="nav navbar-nav bookmark-icons">
				
			  </ul>
			</div>
		<ul class="nav navbar-nav align-items-center ms-auto">
		  <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon ficon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg></a></li>
		  <li class="nav-item dropdown dropdown-notification me-25">
								
				<a class="nav-link alerts" href="javascript: void(0);" data-bs-toggle="dropdown">
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" 
						viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
						stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell ficon">
						<path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
						<path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
					</svg>
					<span class="badge rounded-pill bg-primary badge-up">0</span>
				</a>
									
			<ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
				 
			</ul>
		  </li>
		  <li class="nav-item dropdown dropdown-user">
					<a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="user-nav d-sm-flex d-none">
							<span class="user-name fw-bolder"><?=$arUser["LAST_NAME"];?></span>
							<span class="user-status"><?=$arUser["NAME"];?></span>
						</div>
						<span class="avatar"><img class="round" src="<?=$uph;?>" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
					</a>
					<div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
						{if $USER->IsAdmin() || in_array(24, $USER->GetUserGroup($USER->GetID()))}
									
						<a class="dropdown-item" href="/partners/?a=y"><i class="me-50" data-feather="home"></i>Добавить контрагента</a>
									<a class="dropdown-item" href="/suppliers/?add=y"><i class="me-50" data-feather="package"></i>Добавить поставщика</a>
									<a class="dropdown-item" href="/organizer/?add-task=y"><i class="me-50" data-feather="edit"></i>Добавить задачу</a>
									<a class="dropdown-item" href="/payments/?action=add"><i class="me-50" data-feather="edit"></i>Добавить поступл-е (₽)</a>
									<a class="dropdown-item" href="/calculation/add/"><i class="me-50" data-feather="edit"></i>Добавить заказ</a>
									<a class="dropdown-item" href="/otgruzki/?ao=y"><i class="me-50" data-feather="edit"></i>Добавить отгрузку</a>								
								{elseif $USER->isModerator()}
								<?elseif(isModerator()):?>
									<a class="dropdown-item" href="/partners/?a=y"><i class="me-50" data-feather="home"></i>Добавить контрагента</a>
									<a class="dropdown-item" href="/suppliers/?add=y"><i class="me-50" data-feather="package"></i>Добавить поставщика</a>

									<a class="dropdown-item" href="/organizer/?add-task=y"><i class="me-50" data-feather="edit"></i>Добавить задачу</a>
									<a class="dropdown-item" href="/calculation/add/"><i class="me-50" data-feather="edit"></i>Добавить заказ</a>								
									<a class="dropdown-item" href="/otgruzki/?ao=y"><i class="me-50" data-feather="edit"></i>Добавить отгрузку</a>
								{elseif ($USER->GetID() == 7)}
								<?elseif($USER->GetID() == 7):?>
									<a class="dropdown-item" href="/partners/?a=y"><i class="me-50" data-feather="home"></i>Добавить контрагента</a>
									<a class="dropdown-item" href="/suppliers/?add=y"><i class="me-50" data-feather="package"></i>Добавить поставщика</a>
									<a class="dropdown-item" href="/calculation/add/"><i class="me-50" data-feather="edit"></i>Добавить заказ</a>
									 <a class="dropdown-item" href="/otgruzki/?ao=y"><i class="me-50" data-feather="edit"></i>Добавить отгрузку</a>
									<a class="dropdown-item" href="/organizer/add-remind/"><i class="me-50" data-feather="edit"></i>Добавить напоминание</a>
								{elseif ($USER->GetID() == 43)}
								<?elseif($USER->GetID() == 43):?>
									<a class="dropdown-item" href="/suppliers/?add=y"><i class="me-50" data-feather="package"></i>Добавить поставщика</a>
									<a class="dropdown-item" href="/organizer/?add-task=y"><i class="me-50" data-feather="edit"></i>Добавить задачу</a>
								<?elseif (in_array(7,$USER->GetUserGroup($USER->GetID()))):?>
									<a class="dropdown-item" href="/suppliers/?add=y">Добавить поставщика</a>	
								{elseif ($USER->GetID() == 93)}
								<?elseif($USER->GetID() == 93):?>
									<a class="dropdown-item" href="/otgruzki/?ao=y"><i class="me-50" data-feather="edit"></i>Добавить отгрузку</a>							    
								{elseif (in_array(array(9,13,14),$USER->GetUserGroup($USER->GetID())))}
								<?elseif (in_array(array(9,13,14),$USER->GetUserGroup($USER->GetID()))):?>
									<a class="dropdown-item" href="/calculation/add/"><i class="me-50" data-feather="edit"></i>Добавить заказ</a>
									<a class="dropdown-item" href="/otgruzki/?ao=y"><i class="me-50" data-feather="edit"></i>Добавить отгрузку</a>
									<a class="dropdown-item" href="/partners/?a=y"><i class="me-50" data-feather="home"></i>Добавить контрагента</a>
								{elseif (in_array(8,$USER->GetUserGroup($USER->GetID())))}
								<?elseif (in_array(8,$USER->GetUserGroup($USER->GetID()))):?>
									<a class="dropdown-item" href="/calculation/add/"><i class="me-50" data-feather="edit"></i>Добавить заказ</a>
									<a class="dropdown-item" href="/otgruzki/?ao=y"><i class="me-50" data-feather="edit"></i>Добавить отгрузку</a>
									<a class="dropdown-item" href="/partners/?a=y"><i class="me-50" data-feather="home"></i>Добавить контрагента</a>
								{elseif (in_array(15,$USER->GetUserGroup($USER->GetID())))}
								<?elseif (in_array(15,$USER->GetUserGroup($USER->GetID()))):?>
									<a class="dropdown-item" href="/payments/?action=add"><i class="me-50" data-feather="edit"></i>Добавить поступл-е (₽)</a>	
								{elseif (in_array(19,$USER->GetUserGroup($USER->GetID())))}
								<?elseif (in_array(19,$USER->GetUserGroup($USER->GetID()))):?>						    
									<a class="dropdown-item" href="/partners/?a=y"><i class="me-50" data-feather="home"></i>Добавить контрагента</a>
								<?endif;?>
									<a class="dropdown-item" href="/organizer/?add-remind=y"><i class="me-50" data-feather="edit"></i>Добавить напоминание</a>
								{elseif ($USER->GetID() == 93)}
								<?if($USER->GetID() == 93):?>
									<a class="dropdown-item" href="/otgruzki/?ao=y"><i class="me-50" data-feather="edit"></i>Добавить отгрузку</a>	
								{/if}
								<?endif;?>	
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="/"><i class="me-50" data-feather="settings"></i>Настройки</a>
						<a class="dropdown-item" href="../../help/"><i class="me-50" data-feather="help-circle"></i>FAQ</a>
						<a class="dropdown-item" href="http://localhost/index.php?action=logout" onclick="$('#exitform').submit(); $('body').html('');"><i class="me-50" data-feather="power"></i>Выйти</a>
					</div>
				</li>
			</ul>
		</div>					
    </nav>
	
	
	<!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
      <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
          </ul>
        </div>
        <div class="shadow-bottom"></div>
		
		
        <!-- Horizontal menu content-->
        <div class="navbar-container main-menu-content" data-menu="menu-container">
          
            <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
					
						<li class="nav-item  {$active}" data-menu="">
							
							<a class="nav-link d-flex align-items-center" data-bs-toggle="" href="/index.php?action=customers"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users me-50"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>Покупатели</a>
						</li>
						<li class="mainmenu-separator nav-item" data-menu=""></li>					
						<li class="nav-item  {$active}" data-menu="">
							
							<a class="nav-link d-flex align-items-center" data-bs-toggle="" href="/index.php?action=suppliers"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck me-50"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>Поставщики</a>
						</li>
						<li class="mainmenu-separator nav-item" data-menu=""></li>					
						<li class="nav-item  {$active}" data-menu="">
							
							<a class="nav-link d-flex align-items-center" data-bs-toggle="" href="index.php?action=price"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text me-50"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>Прайс</a>
						</li>
						<li class="mainmenu-separator nav-item" data-menu=""></li>					
						<li class="nav-item  {$active}" data-menu="">
							
							<a class="nav-link d-flex align-items-center" data-bs-toggle="" href="index.php?action=storage"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package me-50"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>Склад</a>
						</li>
						<li class="mainmenu-separator nav-item" data-menu=""></li>					
						<li class="nav-item   {$active}" data-menu="">
							
							<a class="nav-link d-flex align-items-center" data-bs-toggle="" href="index.php?action=orders"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart me-50"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>Заказы</a>
						</li>
						<li class="mainmenu-separator nav-item" data-menu=""></li>					
						<li class="nav-item  {$active}" data-menu="">
							
							<a class="nav-link d-flex align-items-center" data-bs-toggle="" href="index.php?action=shipmentSchedule"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock me-50"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>График отгрузок</a>
						</li>
						<li class="mainmenu-separator nav-item" data-menu=""></li>					
						<li class="nav-item  {$active}" data-menu="">
							
							<a class="nav-link d-flex align-items-center" data-bs-toggle="" href="index.php?action=receipts"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase me-50"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>Поступления (₽)</a>
						</li>
						<li class="mainmenu-separator nav-item" data-menu=""></li>					
						<li class="nav-item  {$active}" data-menu="">
							
							<a class="nav-link d-flex align-items-center" data-bs-toggle="" href="index.php?action=bonus"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift me-50"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>Премия</a>
						</li>
						 
</ul>
			
        </div>
      </div>
    </div>
	
	<div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
	
	