<h3>Sign Up</h3>
<p>Welcome to our online community! Signing up is the first step to start connecting, attending and making events, and  get better deals!</p>
<p>Please choose the last level of education achieved in St. Ursula</p>
<div id="divjenjang">
    <?php
    $jenjang = array(
        '-' => '-',
        'tk' => 'TK',
        'sd' => 'SD',
        'smp' => 'SMP',
        'sma' => 'SMA',
    );
    echo form_label('Select last level education : ', 'jenjang');
    $js = 'id="jenjang" onChange="showTahun();"';
    echo form_dropdown('jenjang', $jenjang, '-', $js);
    echo br(1);
    ?>
</div>
<div id="divtahun" style="display: none;">
    <?php
    $opsi = array(
        'id' => 'label_tahun',
    );
    echo form_label('Select graduation year : ', 'tahun', $opsi);
    $tahun = array(
        '-' => '-'
    );
    $js = 'id="tahun"" onChange="showNama();"';
    echo form_dropdown('tahun', $tahun, '-', $js);
    ?>
</div>

<div id="name">
</div>

<script type="text/javascript">
    function showTahun() {
        if ($("#jenjang").val()!='-') {
            var link = 'sign_up/daftar_tahun';
            var form_data = {
                jenjang:$("#jenjang").val(),
                ajax: '1'		
            };

            $.ajax({
                url: link,
                type: 'GET',
                data: form_data,
                success: function(msg) {
                    $('#divtahun').attr('style', 'display:inherit;');
                    $('#tahun').empty();
                    var str="";
                    for (var i=0;i<msg.size;i++) {
                        str +="<option value='"+msg.tahun[i]+"'>"+msg.tahun[i]+"</option>";
                    }
                    $('#tahun').append(str);
                }
            });
        } else {
            $('#divtahun').attr('style', 'display:none');
            $('#name').html("");
        }
    }
    
    function showNama(){
        var link = 'sign_up/daftar_nama';
        var form_data = {
            jenjang:$("#jenjang").val(),
            tahun:$("#tahun").val(),
            ajax: '1'		
	};
        
	$.ajax({
            url: link,
            type: 'GET',
            data: form_data,
            success: function(msg) {
                $("#name").html(msg);
            }
        });
    }
</script>
