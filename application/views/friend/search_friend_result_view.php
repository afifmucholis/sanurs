<div id="title-menu">Find a Friend - Search Results : 
    <?php
    $num = $search_total;
    echo $num;
    if ($num > 1) {
        $res = ' results';
    } else {
        $res = ' result';
    }
    echo $res;
    ?></div>
<p>Your search for people <?php
if ($search_name != "" || $search_year != "" || $interest != "all" || $major != "all") {
    echo 'who';
    if ($search_name != "") {
        echo 'se name contains <b>"' . $search_name . '"</b> ';
        if ($search_year != "" || $interest != "all" || $major != "all") {
            echo 'and';
        }
    }
    if ($search_year != "") {
        echo ' graduated in <b>"'.$search_year.'"</b> ';
        if ($interest!="all" || $major!="all") {
            echo 'and';
        }
    }
    if ($interest != "all") {
        echo ' has interest in <b>"'.$interest.'"</b> ';
        if ($major != "all") {
            echo 'and';
        }
    }
    if ($major != "all") {
        echo ' has major in <b>"'.$major.'"</b> ';
    }
}
echo 'has matches <b>'.$num.'</b> '.$res;
?></p>
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