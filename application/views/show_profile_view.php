<div id="col_left" style="float: left">
    <div id="profpic">
        <?php echo $user_data['image'];?>
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/>
    <div id="news">
        Levana is hosting “A Night of Neglect” this Saturday, 8 October 2011. Check it out
    </div>
</div>

<div id="col_right" style="float: right">
    <div id="info">
       <?php $this->load->view('user_info',$user_data);?>
    </div>
    <br/><br/>
    <div id="send_email">
        Send Message to <?php echo $user_data['name'];?><br/>
        <?php
        echo form_open('about_us/contact');
        echo form_label('Email : ','email')."   ";
        echo form_input('Email', '', 'id="email"')."<br/>";
        echo form_label('Subject : ','subject')."  ";
        echo form_input('Subject', '', 'id="subject"')."<br/>";
        $data = array(
                  'name'        => 'isi',
                  'id'          => 'isi',
                  'rows'         => '10',
                  'cols'        => '40'
                );
        echo form_textarea($data)."<br/>";
        echo form_submit('submit', 'Submit', 'id="submit"');
        echo form_close();
        ?>
    </div>
    <?php if ($add_as_friend) {?>
    <div id="add_as_friend">
        <a href="#" class="popup_link">Add as friend</a>
    </div>
    <?php } ?>
</div>
<?php $this->load->view('add_as_friend_form', $user_data); ?>
