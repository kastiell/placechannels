<?php
    $hash1 = $this->hash(10);
    $hash2 = $this->hash(10);
    $count_item = 8;

    if (!function_exists('drawItems')){
        function drawItems($k,$v,$data){
        $str = '';

            $str.='<div class="c-witem ui-state-default">';
            $str.='<div class="item_title">';
            $str.=$k;
            $str.='</div>';
            $name_first_element = '';
            foreach($data as $k2=>$v2){
                $name_first_element = $k;
                break;
            }
            for($i = 0;$i<count($data[$name_first_element]);$i++){
                $str.='<div class="item_val">';
                $str.=$v[$i];
                $str.='</div>';
            }
            $str.='</div>';
            return $str;
        }
    }

?>

<script>
    $(function() {
/*
        var hash = '<?=$hash?>';
        var eul = $(".sortable-ul-"+hash);
        eul.parents('.wmodule').find('.prev').click(function(){decCount(eul);});
        eul.parents('.wmodule').find('.next').click(function(){incCount(eul);});

        eul.sortable({
            update: function(event,ui){ refresh(eul,$(".sortable-ul-"+hash).sortable("toArray")); console.log($(".sortable-ul-"+hash).sortable("toArray"));
                refresh(eul);
            }
        });
        eul.disableSelection();*/
    });

    $(function() {
        var id_sortable_main = 'sortable_<?=$hash1?>';
        //$("#"+id_sortable_main).sortable().disableSelection();
        var id_sortable_double = 'sortable_double_<?=$hash2?>';
        //$("#"+id_sortable_double).sortable().disableSelection();

        $( "#"+id_sortable_main+", #"+id_sortable_double).sortable({
            connectWith: ".consists_sortable"
        }).disableSelection();

        //Hover на строки таблиц для удобства просмотра
        var eul = $('#'+id_sortable_main);
        eul.find('.item_val').hover(function(){
            var i = $(this).index();
            eul.find('.c-witem').each(function(i1){
                $(this).find('.item_val:nth-child('+(i+1)+')').addClass('hover_sortable');
            });
        });

        eul.find('.item_val').mouseout(function(){
            var i = $(this).index();
            eul.find('.item_val').each(function(i){
                $(this).removeClass('hover_sortable');
            });
        });
    });


</script>



<div class="grid wmodule wmodule_table <?=$this->class?>" style="<?=$this->style?>">
    <div class="c-title">
        <?=$this->title?>
        <div class="wrapper_js">
            <div class="sortable_btn" onclick="toggleAlertBlock(this)"></div>
        </div>

    </div>
    <div id="sortable_double_<?=$hash2?>" class="consists_sortable sortable_double float_empt c-top-panel disable">
        <?php
        $i1 = 0;
        foreach($this->data as $k=>$v){
            if($i1>$count_item){
                echo drawItems($k,$v,$this->data);
            }
            $i1++;
        }
        ?>
    </div>
    <div class="c-content_item consists_sortable" id="sortable_<?=$hash1?>">
        <?php
            $i2 = 0;
            foreach($this->data as $k=>$v){
                if($i2<=$count_item){
                    echo drawItems($k,$v,$this->data);
                }
                $i2++;
            }
        ?>
    </div>
</div>