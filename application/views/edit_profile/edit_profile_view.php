<div id="left" style="float: left">
    <div id="link">
        <a href="basic_info" class="ajax-links">Basic Info</a>
        <a href="location" class="ajax-links">Location</a>
        <a href="education" class="ajax-links">Education</a>
        <a href="working" class="ajax-links">Working</a>
        <a href="visibility" class="ajax-links">Visibility</a>
    </div>
</div>
<div id="clearboth"></div>

<div id="content_edit">
</div>

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
// fungsi binding edit_profile awal
function editProfileReady() {
    // bind sub-navigation event click
    $('a.ajax-links').click(function(){
            return subNavEditProfileClick($(this).attr("href"));
      });
    // load menu awal basic_info
    //subNavEditProfileClick('education');
    subNavEditProfileClick('basic_info');
}

// function sub-navigation edit_profile
function subNavEditProfileClick(link_click) {
    var ganti=true;
    if (_isDirty) {
        if (confirm("Are you sure you want to leave this page? You have unsaved changes to your profile.")) {
            _isDirty=false;
        } else {
            ganti = false;
        }
    }
    if (ganti) {
        var link = '<?php echo site_url('profile/edit_');?>'+link_click;
        var form_data = {
                ajax: '1'		
        };
        $.ajax({
                url: link,
                type: 'GET',
                data: form_data,
                success: function(msg) {
                   $('#content_edit').html(msg.text);
                   var his = $('#history').html().split('/');
                   var his2 = "";
                   var count=0;
                   while (count<his.length-1) {
                       his2+=his[count];count++;
                       his2+="/";
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
}

// fungsi untuk menambah work field
function addWorkField() {
    var link = '<?php echo site_url('profile/add_working_field');?>';
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
            $('input[name=counter]').val($('input[name=counter]').val()-1);
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
        });
}

// fungsi untuk mengganti education field
function changeEduField(val) {
    if (val=='1') {
        $("#edu_d3").attr('style', 'display: none');
        $("#edu_s1").attr('style', 'display: none');
        $("#edu_s2").attr('style', 'display: none');
        $("#edu_s3").attr('style', 'display: none');
    } else if (val=='2') {
        $("#edu_d3").attr('style', 'display: inherit');
        $("#edu_s1").attr('style', 'display: none');
        $("#edu_s2").attr('style', 'display: none');
        $("#edu_s3").attr('style', 'display: none');
    } else if (val=='3') {
        $("#edu_d3").attr('style', 'display: none');
        $("#edu_s1").attr('style', 'display: inherit');
        $("#edu_s2").attr('style', 'display: none');
        $("#edu_s3").attr('style', 'display: none');
    } else if (val=='4') {
        $("#edu_d3").attr('style', 'display: none');
        $("#edu_s1").attr('style', 'display: inherit');
        $("#edu_s2").attr('style', 'display: inherit');
        $("#edu_s3").attr('style', 'display: none');
    } else if (val=='5') {
        $("#edu_d3").attr('style', 'display: none');
        $("#edu_s1").attr('style', 'display: inherit');
        $("#edu_s2").attr('style', 'display: inherit');
        $("#edu_s3").attr('style', 'display: inherit');
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