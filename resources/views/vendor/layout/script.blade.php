<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('dashboard/js/core/popper.min.js')}}"></script>
<script src="{{asset('dashboard/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('dashboard/js/plugins/smooth-scrollbar.min.js')}}"></script>
<!-- Kanban scripts -->
<script src="{{asset('dashboard/js/plugins/dragula/dragula.min.js')}}"></script>
<script src="{{asset('dashboard/js/plugins/jkanban/jkanban.js')}}"></script>
<script src="{{asset('dashboard/js/plugins/choices.min.js')}}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const toast = Swal.mixin({
        toast: true,
        position: "{{ app()->getLocale()=='ar'?'top-end':'top-start' }}",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
</script>
@include('sweetalert::alert')
<script src="{{asset('dashboard/js/soft-ui-dashboard.min.js?v=1.1.1')}}"></script>
@vite('resources/apps/create-product.js')
@stack('script')