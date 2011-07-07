<p>Please choose the information that you want other people than your year to see.</p>
<?php 
    echo form_open('profile/submitVisibility');
?>
<div id="col_left" style="float: left">
E-mail address:<br/>
Password:<br/>
Re-enter password:<br/>
<br/>
Jenis Kelamin:<br/>
Tempat/Tanggal Lahir (dd-mm-yy):<br/>
Alamat Rumah:<br/>
Telfon Rumah:<br/>
HP:<br/>
Email:<br/>
<br/>
Areas of interest:<br/>
 Business<br/>
 sciences<br/>
 Social studies<br/>
 Arts<br/>
 <br/>
College/ University attended for Bachelor degree: <br/>
Major (s): <br/>
Minor: <br/>
Graduation year: <br/>
 <br/>
College/ University attended for Masters degree: <br/>
Major (s): <br/>
Minor: <br/>
Graduation year: <br/>
 <br/>
College/ University attended for Doctorate degree: <br/>
Major (s): <br/>
Minor: <br/>
Graduation year: <br/>
</div>
<div id="col_right" style="float: right">
Work experience:<br/>
<br/>
Company/ Association:<br/>
Year:<br/>
Position:Nama Kantor:<br/>
Alamat Kantor:<br/>
Nomor telfon Kantor:<br/>
Fax Kantor:<br/>
Work HP:<br/>
Work Email:<br/>
<br/>
Current Work:<br/>
<br/>
Company/ Association:<br/>
Year:<br/>
Position:Nama Kantor:<br/>
Alamat Kantor:<br/>
Nomor telfon Kantor:<br/>
Fax Kantor:<br/>
Work HP:<br/>
Work Email:<br/>
<?php
    $js = 'onClick="prev()"';
    echo form_button('previous','Previous',$js);
    echo form_submit('finisih','Finisih');
    echo form_close();
?>
</div>

<script type="text/javascript">
    function prev() {
       window.location.href = '<?php echo site_url('profile/editWorking');?>';
    }
</script>