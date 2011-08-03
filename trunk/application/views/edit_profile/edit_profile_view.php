<!--<div style="width: 387px; height: 25px; background-color: #E81592; float: left"></div>-->
<div class="edit_profile_menu">
    <ul class="edit_profile_navigation">
        <li id="edit_basic"><a id="link-menu" href="basic_info" class="ajax-links">BASIC INFO</a></li>
        <li id="edit_location"><a id="link-menu" href="location" class="ajax-links">LOCATION</a></li>
        <li id="edit_education"><a id="link-menu" href="education" class="ajax-links">EDUCATION</a></li>
        <li id="edit_working"><a id="link-menu" href="working" class="ajax-links">WORKING</a></li>
        <li id="edit_visibility"><a id="link-menu" href="visibility" class="ajax-links">VISIBILITY</a></li>
    </ul>
</div>
<div class="clearboth"></div>
<div id="content_edit"></div>

<script type="text/javascript">
    var _isDirty = false;   // cek form input sudah diubah2 atau belum
    var _isSubmitClick = false; // cek apakah tombol submit diklik

    // pengecekan form yang diubah
    function cekIsDirtyForm() {
        $(':input')
        .unbind('change.dirty')
        .bind('change.dirty', function(){
            _isDirty = true;
        });
    }

    // pengecekan form di submit
    function isFormSubmit() {
        $(':input')
        .unbind('click.submit')
        .bind('click.submit', function(){
            _isSubmitClick = true;
        });
    }

    /**** Fungsi untuk edit profile view ****/
    var view_edit;
    // fungsi binding edit_profile awal
    function editProfileReady() {
        // bind sub-navigation event click
        $('a.ajax-links').click(function(){
            var hr = $(this).attr("href");
            if (hr!=view_edit)
                return subNavEditProfileClick(hr);
            else
                return false;
        });
        // load menu awal basic_info
        subNavEditProfileClick('<?php echo $view; ?>');
    }

    // function sub-navigation edit_profile
    function subNavEditProfileClick(link_click) {
        view_edit = link_click;
        var ganti=true;
        if (_isDirty) {
            if (confirm("Are you sure you want to leave this page? You have unsaved changes to your profile.")) {
                _isDirty=false;
            } else {
                ganti = false;
            }
        }
        if (ganti) {
            var link = '<?php echo site_url('profile/edit_'); ?>'+link_click;
            var form_data = {
                ajax: '1'		
            };
            $.ajax({
                url: link,
                type: 'GET',
                data: form_data,
                success: function(msg) {
                    $('#content_edit').html(msg.text);
                    var his = $('#history').html().split(' » ');
                    var his2 = "";
                    var count=0;
                    while (count<his.length-1) {
                        his2+=his[count];count++;
                        his2+=" &raquo; ";
                    }
                    $('#history').html(his2+msg.struktur[2]["label"]);
                    // bind all input change event
                    cekIsDirtyForm();
                    isFormSubmit();
                    if (link_click=='basic_info')
                        basicAjaxReady();
                    if (link_click=='location') {
                        initmap("editlocation");
                    }
                    if (link_click=='working') {
                        workAjaxReady();
                        _WorkFieldBinding();
                    }
                    if (link_click=='education')
                        educationAjaxReady();
                }
            });
        }
        return false;
    }

    /**** Fungsi untuk basic info view ****/
    // fungsi binding untuk basic info view
    function basicAjaxReady() {
        $('#content_edit')
        .find('a.popup_link')
        .unbind('click.upload_img')
        .bind('click.upload_img', function(){
            showPopUpImage();
        });
    }

    function showPopUpImage(){
        id_click =  "#upload_popup";
        //centering with css
        centerPopup();
        //load popup
        loadPopup();
    }

    /**** Fungsi untuk working view ****/
    // fungsi binding untuk work view
    function workAjaxReady() {
        _WorkFieldBinding();
        $('#content_edit')
        .find('a.add_links')
        .unbind('click.add_work')
        .bind('click.add_work', function(){
            addWorkField(); 
        })
        .end()
        .find('input[name=save]')
        .unbind('click.submit_form')
        .bind('click.submit_form', function(){
            // $('#form_work').submit();
        });
        $('.work-menu')
        .find('a.resetfield_links')
        .unbind('click.resetit')
        .bind('click.resetit', function(){
            $('#work_cur input[type!=hidden]').each(
            function(idx, item) {
                $(item).val('');
            }
        );
        });
    }

    // fungsi untuk menambah work field
    function addWorkField() {
        var link = '<?php echo site_url('profile/add_working_field'); ?>';
        var form_data = {
            counter:$('input[name=counter]').val(),
            ajax: '1'		
        };

        $.ajax({
            url: link,
            type: 'POST',
            data: form_data,
            success: function(msg) {
                $('#work_field').append(msg['text']);
                $('input[name=counter]').val(msg['counter']);
                _WorkFieldBinding();
            }
        });
    }
    // fungsi untuk binding event remove field working dan cek dirty field work
    function _WorkFieldBinding() {
        $('#work_field')
        .find('a.remove_links')
        .unbind('click.removeit')
        .bind('click.removeit', function(){
            $(this).parent().remove();
            //$('input[name=counter]').val($('input[name=counter]').val()-1);
        });
        cekIsDirtyForm();
    }

    /**** Fungsi untuk education view ****/
    // fungsi binding untuk education view
    function educationAjaxReady() {
        $('#content_edit')
        .find('#highest_edu')
        .unbind('change.edu')
        .bind('change.edu', function(){
            changeEduField($(this).val());
        })
        .end()
        .find('#in_education')
        .unbind('change.education')
        .bind('change.education', function(){
            showCurrentEducationField($(this).val());
        });
    }

    // fungsi untuk mengganti education field
    function changeEduField(val) {
        if (val=='1') {
            $('#edu_sma_form').attr('style', 'display: inherit');
            $('#edu_d3_form').attr('style', 'display: none');
            $('#edu_s1_form').attr('style', 'display: none');
            $('#edu_s2_form').attr('style', 'display: none');
            $('#edu_s3_form').attr('style', 'display: none');
        } else if (val=='2') {
            $('#edu_sma_form').attr('style', 'display: inherit');
            $('#edu_d3_form').attr('style', 'display: inherit');
            $('#edu_s1_form').attr('style', 'display: none');
            $('#edu_s2_form').attr('style', 'display: none');
            $('#edu_s3_form').attr('style', 'display: none');
        } else if (val=='3') {
            $('#edu_sma_form').attr('style', 'display: inherit');
            $('#edu_s1_form').attr('style', 'display: inherit');
            $('#edu_d3_form').attr('style', 'display: inherit');
            $('#edu_s2_form').attr('style', 'display: none');
            $('#edu_s3_form').attr('style', 'display: none');
        } else if (val=='4') {
            $('#edu_sma_form').attr('style', 'display: inherit');
            $('#edu_s1_form').attr('style', 'display: inherit');
            $('#edu_s2_form').attr('style', 'display: inherit');
            $('#edu_d3_form').attr('style', 'display: inherit');
            $('#edu_s3_form').attr('style', 'display: none');
        } else if (val=='5') {
            $('#edu_sma_form').attr('style', 'display: inherit');
            $('#edu_s1_form').attr('style', 'display: inherit');
            $('#edu_s2_form').attr('style', 'display: inherit');
            $('#edu_s3_form').attr('style', 'display: inherit');
            $('#edu_d3_form').attr('style', 'display: inherit');
        } else if (val=='0') {
            $('#edu_sma_form').attr('style', 'display: none');
            $('#edu_d3_form').attr('style', 'display: none');
            $('#edu_s1_form').attr('style', 'display: none');
            $('#edu_s2_form').attr('style', 'display: none');
            $('#edu_s3_form').attr('style', 'display: none');
        }
    }

    // fungsi untuk menampilkan current education
    function showCurrentEducationField(val) {
        if (val=='no') {
            $('#current_edu').attr('style', 'display: none');
        } else {
            $('#current_edu').attr('style', 'display: inherit');
        }
    }

    window.onbeforeunload = function() {
        if (_isDirty && !_isSubmitClick)
            return 'You have unsaved changes!';
    }

    $(document).ready(function() {
        editProfileReady();
    });
</script>