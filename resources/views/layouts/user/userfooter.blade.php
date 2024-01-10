<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2021<a
                class="ms-25" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a><span
                class="d-none d-sm-inline-block">, All rights Reserved</span></span><span
            class="float-md-end d-none d-md-block">Hand-crafted & Made with<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->


<script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
{{-- <script src="{{ asset('build/assets/app-36377bdc.js') }}"></script> --}}
<!-- BEGIN Vendor JS -->

<!-- BEGIN: Page Vendor JS -->
<script defer src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script defer src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
<script defer src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js') }}"></script>
<script defer src="{{ asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js') }}"></script>
<!-- END: Page Vendor JS -->
<script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<!-- BEGIN: Theme JS -->
<script defer src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
<script defer src="{{ asset('app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS -->

<!-- BEGIN: Page JS -->
{{-- <script defer src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script> --}}
<!-- END: Page JS -->

<!-- END: Page JS-->

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
@livewireScripts
</body>
<!-- END: Body-->

</html>