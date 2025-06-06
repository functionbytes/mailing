<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

<!-- jQuery -->
<script type="text/javascript" src="{{ asset('core/js/jquery-3.6.4.min.js') }}"></script>

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="{{ asset('core/bootstrap/css/bootstrap.min.css') }}">
<script type="text/javascript" src="{{ asset('core/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Select2 -->
<link rel="stylesheet" type="text/css" href="{{ asset('core/select2/css/select2.min.css') }}">
<script type="text/javascript" src="{{ asset('core/select2/js/select2.min.js') }}"></script>

<!-- Validate -->
<script type="text/javascript" src="{{ asset('core/validate/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('core/js/validate.js') }}"></script>
{{--<script type="text/javascript" src="{{ route('Controller@jquery_validate_locale') }}"></script>--}}

<!-- Numeric -->
<script type="text/javascript" src="{{ asset('core/numeric/jquery.numeric.min.js') }}"></script>

<!-- Tooltip -->
<link rel="stylesheet" href="{{ asset('core/tooltipster/css/tooltipster.bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('core/tooltipster/css/plugins/tooltipster/sideTip/themes/tooltipster-sideTip-light.min.css') }}">
<script type="text/javascript" src="{{ asset('core/tooltipster/js/tooltipster.bundle.min.js') }}"></script>

<!-- Google icon -->
<link href="{{ asset('core/css/google-font-icon.css') }}?v=2" rel="stylesheet">

<!-- Autofill -->
<link rel="stylesheet" type="text/css" href="{{ asset('core/css/autofill.css') }}">
<script type="text/javascript" src="{{ asset('core/js/autofill.js') }}"></script>

<!-- Theme -->
<link rel="stylesheet" type="text/css" href="{{ asset('core/css/dark.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('core/css/menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('core/css/app.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('core/css/responsive.css') }}">

<!-- Custom css -->
<link rel="stylesheet" type="text/css" href="{{ asset('custom.css') }}">

<script type="text/javascript" src="{{ asset('core/js/functions.js') }}"></script>

<script type="text/javascript" src="{{ asset('core/js/link.js') }}"></script>
<script type="text/javascript" src="{{ asset('core/js/box.js') }}"></script>
<script type="text/javascript" src="{{ asset('core/js/popup.js') }}"></script>
<script type="text/javascript" src="{{ asset('core/js/sidebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('core/js/list.js') }}"></script>
<script type="text/javascript" src="{{ asset('core/js/anotify.js') }}"></script>
<script type="text/javascript" src="{{ asset('core/js/dialog.js') }}"></script>
<script type="text/javascript" src="{{ asset('core/js/iframe_modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('core/js/search.js') }}"></script>
<script type="text/javascript" src="{{ asset('core/js/image_popup.js') }}"></script>

<script type="text/javascript" src="{{ asset('core/js/app.js') }}"></script>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
    });

</script>
