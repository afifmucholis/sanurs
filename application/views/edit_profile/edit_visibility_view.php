<p>Please choose the information that you want other people than you to see.</p>
<?php
echo form_open('profile/submitVisibility');
?>
<div class="work-menu">
    <div id="col_left">
        Basic Information<br/>
        <?php
        echo form_checkbox('interest', 'interest', $content_edit['interest']);
        echo form_label('Area of Interest');
        echo br(1);
        
        echo form_checkbox('birthdate', 'birthdate', $content_edit['birthdate']);
        echo form_label('Birthdate');
        echo br(2);
        ?>
        Contact Information<br/>
        <?php
        echo form_checkbox('email', 'email', $content_edit['email']);
        echo form_label('Email Address');
        echo br(1);
        
        echo form_checkbox('home_address', 'home_address', $content_edit['home_address']);
        echo form_label('Home Address');
        echo br(1);
        
        echo form_checkbox('home_telephone', 'home_telephone', $content_edit['home_telephone']);
        echo form_label('Home Telephone');
        echo br(1);
        
        echo form_checkbox('handphone', 'handphone', $content_edit['handphone']);
        echo form_label('Handphone');
        echo br(2);
        ?>
        Education<br/>
        <?php
        echo form_checkbox('s1', 's1', $content_edit['S1']);
        echo form_label('Bacelor Degree Information');
        echo br(1);
        
        echo form_checkbox('s2', 's2', $content_edit['S2']);
        echo form_label('Master Degree Information');
        echo br(1);
        
        echo form_checkbox('s3', 's3', $content_edit['S3']);
        echo form_label('Doctorate Degree Information');
        echo br(1);
        ?>
        <!--E-mail address:<br/>
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
        Graduation year: <br/>-->
    </div>
</div>
<div class="work-menu">
    <div id="col_right">
        Work<br/>
        <?php
        echo form_checkbox('work_experience', 'work_experience', $content_edit['work_experience']);
        echo form_label('Work Experience');
        echo br(1);
        
        echo form_checkbox('current_experience', 'current_experience', $content_edit['current_experience']);
        echo form_label('Current Work');
        echo br(2);
        ?>
        <!--Work experience:<br/>
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
        Work Email:<br/>-->
        <?php
        echo form_submit('save', 'Save Changes');
        echo form_close();
        ?>
    </div>
</div>

<div id ="clearboth">
</div>