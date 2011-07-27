<h3 style="font-family: IMPACT; font-size: 30px; color: #565555">Find a Friend - Search Results : 
<!--<p>Your search for people -->
<?php
/*if ($search_name != "") {
    echo 'whose name contains "' . $search_name . '", ';
}
if ($search_year != "") {
    echo 'who graduated in ' . $search_year . ', ';
    echo br(1);
    
}*/
?><!--</p>-->
<?php
$num = $search_total;
echo $num;
if ($num > 1) {
    echo ' results';
} else {
    echo ' result';
}
?></h3>
Category : <br/>
<?php
if ($search_name != "") {
    echo 'name : ' . $search_name;
    echo br(1);
}
if ($search_year != "") {
    echo 'year : ' . $search_year;
    echo br(1);
}
echo 'interest : ' . $interest;
echo br(1);
echo 'major : ' . $major;
echo br(1);
echo br(1);
?>
<div id="show_all_search_results">
    <?php
    $data['search_results'] = $search_results;
    $data['pagination'] = $pagination;
    $this->load->view('friend/list_search_friend_results_view', $data);
    ?>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        bindPagination();
    });
    
    function bindPagination() {
        $('#show_all_search_results')
        .find('#link_pagination a')
        .unbind('click.page')
        .bind('click.page',function(){
            return clickPagination(this);
        });
    }
   
    function clickPagination(val) {
        var offset = $(val).attr('href').split('/');
        var link = '<?php echo site_url('friend/search') ?>';
        var search_name = '<?php echo $search_name ?>';
        var search_year = '<?php echo $search_year ?>';
        var interest = '<?php echo $interest ?>';
        var major = '<?php echo $major ?>';
        
        $.ajax({
            type: 'POST',
            url: link,
            data : {offsetval:offset[offset.length-1], ajax : 1, name : search_name, year: search_year, interest : interest, major : major},
            success: function(msg){
                $('#show_all_search_results').html(msg['text']);
                bindPagination();
            }
        });               
        return false;
    }
</script>