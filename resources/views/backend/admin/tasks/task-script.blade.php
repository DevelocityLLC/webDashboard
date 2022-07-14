
 <script>
    $(document).ready(function () {
        $('#branch_id').on('change', function () {
            var branch_id = $(this).val();
            if (branch_id) {
                $.ajax({
                    url: "{{ URL::to('admin/user-section') }}/" + branch_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#section_id').empty();
                        $('#section_id').append('<option selected disabled > -- Select a Branches --</option>');
                        $.each(data, function (key, value) {
                            $('#section_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                    ,
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>



<script>
    $(document).ready(function () {
        $('#section_id').on('change', function () {
            var section_id = $(this).val();
            if (section_id) {
                $.ajax({
                    url: "{{ URL::to('admin/task-users') }}/" + section_id
                    , type: "GET"
                    , dataType: "json"
                    , success: function (data) {
                        $('#user_id').empty();
                        $('#user_id').append('<option selected disabled > -- Select a Users --</option>');
                        $.each(data, function (key, value) {
                            $('#user_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                    ,
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

</script>
