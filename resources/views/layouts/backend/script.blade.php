<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{  asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{  asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{  asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{  asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{  asset('assets/js/widgets.bundle.js')}}"></script>
<script src="{{  asset('assets/js/custom/widgets.js')}}"></script>
<script src="{{  asset('assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{  asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
        
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<script>

   $(document).ready( function () {
       $('#datatable').DataTable({ 
            language: {
                    "lengthMenu": "{{__('admin.show')}} _MENU_ {{__('admin.entries')}}",
                    "zeroRecords": "{{ __('admin.no_data')}}",
                    "info": "{{ __('admin.info')}}",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "{{__('admin.search')}}:",
                    "oPaginate" :{"sPrevious":"{{__('admin.previous')}}", "sNext":"{{__('admin.next')}}"}
                },
            dom: 'Blfrtip',
            buttons: [
                    {
                    extend: "copyHtml5",
                    text: "{{ __('admin.copy')}}",
                    },
                    {
                    extend: "excel",
                    text: "{{ __('admin.excel')}}",
                    },
                    {
                    extend: "csvHtml5",
                    text: "{{ __('admin.csv')}}",
                    },
                                
                    {
                    extend: "pdfHtml5",
                    text: "{{ __('admin.pdf')}}",
                    },
                                
                    {
                    extend: "print",
                    text: "{{ __('admin.print')}}",
                    },
            ],
        
    });
   });
function append_notification_notifications(msg) {
    /*
    if (msg.count_unseen_notifications > 0) {
        $('#dropdown-notifications-icon').fadeIn(0);
        $('#dropdown-notifications-icon').text(msg.count_unseen_notifications);
    } else {
        $('#dropdown-notifications-icon').fadeOut(0);
    }*/

    $('#kt_topbar_notifications_1').empty();
    $('#kt_topbar_notifications_1').append(msg.response.task_notifications);

    $('#kt_topbar_notifications_2').empty();
    $('#kt_topbar_notifications_2').append(msg.response.req_notifications);
}
function get_notifications() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'GET',
        url: '/notifications/ajax',
        success: function (data) {
            /*
            if (data.alert) {
                var audio = new Audio('{{asset("assets/sounds/notification.wav")}}');
                audio.play();
            }*/
            append_notification_notifications(data.notifications.response);

        }
    });
}

function get_nots() {
    setTimeout(function () {
        get_notifications();
        get_nots();
    }, 5000);
}
get_nots();

const checkbox = document.getElementById('kt_user_menu_dark_mode_toggle')
var locale = document.getElementsByTagName("html")[0].getAttribute("lang");

checkbox.addEventListener('change', (event) => {

    if (event.currentTarget.checked) {
        localStorage.setItem("dark-mode", "set");
        if(locale == 'en')
            addLinkStyleElement('/assets/css/style.dark.bundle.ltr.css');
        else
            addLinkStyleElement('/assets/css/style.dark.bundle.rtl.css');

    } else {
        localStorage.removeItem("dark-mode");
        if(locale == 'en')
            addLinkStyleElement('/assets/css/style.bundle.css');
        else
            addLinkStyleElement('/assets/css/style.bundle.rtl.css');
   }

});

function isDark() {
  return localStorage.getItem("dark-mode");
}
function addLinkStyleElement(href){
    var link = document.createElement('link');
    link.type   = 'text/css';
    link.rel    = 'stylesheet';
    link.href   = href;
    document.head.appendChild(link);
}

if(isDark()){
    checkbox.checked  = true;
    if(locale == 'en')
        addLinkStyleElement('/assets/css/style.dark.bundle.ltr.css');
    else
        addLinkStyleElement('/assets/css/style.dark.bundle.rtl.css');
}

</script>
@yield('script')
