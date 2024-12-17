</div>
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

<script id="rendered-js">
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
    </script>
    <!-- BEGIN: Vendor JS
    <script src="/euscu/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS
    <script src="/euscu/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <!--<script src="/euscu/app-assets/vendors/js/extensions/toastr.min.js"></script>!-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/euscu/app-assets/js/core/app-menu.min.js"></script>
    <script src="/euscu/app-assets/js/core/app.min.js"></script>
    <script src="/euscu/app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS
    <script src="/euscu/app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
    <!-- END: Page JS-->
	<!-- BEGIN: Vendor JS-->
    <script src="/euscu/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="/euscu/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="/euscu/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="/euscu/app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="/euscu/app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="/euscu/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="/euscu/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="/euscu/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="/euscu/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="/euscu/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="/euscu/app-assets/js/core/app-menu.min.js"></script>
    <script src="/euscu/app-assets/js/core/app.min.js"></script>
    <script src="/euscu/app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="/euscu/app-assets/js/scripts/pages/dashboard-analytics.min.js"></script>
    <script src="/euscu/app-assets/js/scripts/pages/app-invoice-list.min.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>

	</body>
</html>