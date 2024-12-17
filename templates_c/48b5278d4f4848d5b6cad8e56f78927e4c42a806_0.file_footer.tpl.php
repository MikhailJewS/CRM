<?php
/* Smarty version 5.4.0, created on 2024-11-27 20:02:46
  from 'file:footer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_674750b64ea1f7_53124762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48b5278d4f4848d5b6cad8e56f78927e4c42a806' => 
    array (
      0 => 'footer.tpl',
      1 => 1726210833,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_674750b64ea1f7_53124762 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\AppServ\\www\\templates';
?></div>
							</div>
						</div>
					</div>
				</div>
	</div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">&copy; 2021-2024<a class="ms-25" href="" target="_blank"></a><span class="d-none d-sm-inline-block"> </span>Управление бизнесом.</span></p>
    </footer>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

<?php echo '<script'; ?>
 id="rendered-js">
let html = document.querySelector('html');

window.addEventListener('unload', () => {
  localStorage.setItem('dark-layout', html.classList.contains('dark-layout') ? 1 : 0);
});

if (localStorage.getItem('dark-layout') == 1) {
  html.classList.add("dark-layout");
}

document.querySelector('.block').addEventListener('click', function () {
  html.classList.toggle("dark-layout");
});
    <?php echo '</script'; ?>
>
    <!-- BEGIN: Vendor JS
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/vendors.min.js"><?php echo '</script'; ?>
>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/charts/apexcharts.min.js"><?php echo '</script'; ?>
>
    <!--<?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/extensions/toastr.min.js"><?php echo '</script'; ?>
>!-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <?php echo '<script'; ?>
 src="/euscu/app-assets/js/core/app-menu.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/js/core/app.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/js/scripts/customizer.min.js"><?php echo '</script'; ?>
>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS
    <?php echo '<script'; ?>
 src="/euscu/app-assets/js/scripts/pages/dashboard-ecommerce.min.js"><?php echo '</script'; ?>
>
    <!-- END: Page JS-->
	<!-- BEGIN: Vendor JS-->
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/vendors.min.js"><?php echo '</script'; ?>
>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/ui/jquery.sticky.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/charts/apexcharts.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/extensions/toastr.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/extensions/moment.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"><?php echo '</script'; ?>
>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <?php echo '<script'; ?>
 src="/euscu/app-assets/js/core/app-menu.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/js/core/app.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/js/scripts/customizer.min.js"><?php echo '</script'; ?>
>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <?php echo '<script'; ?>
 src="/euscu/app-assets/js/scripts/pages/dashboard-analytics.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/euscu/app-assets/js/scripts/pages/app-invoice-list.min.js"><?php echo '</script'; ?>
>
    <!-- END: Page JS-->

    <?php echo '<script'; ?>
>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    <?php echo '</script'; ?>
>

	</body>
</html><?php }
}
