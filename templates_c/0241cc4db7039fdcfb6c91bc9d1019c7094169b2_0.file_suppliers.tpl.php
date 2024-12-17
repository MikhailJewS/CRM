<?php
/* Smarty version 5.4.0, created on 2024-11-28 19:35:58
  from 'file:suppliers.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_67489beef27f01_21287481',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0241cc4db7039fdcfb6c91bc9d1019c7094169b2' => 
    array (
      0 => 'suppliers.tpl',
      1 => 1732811757,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67489beef27f01_21287481 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\AppServ\\www\\templates';
echo $_smarty_tpl->getValue('header');?>

<?php echo $_smarty_tpl->getValue('menu');?>

<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function(){
        $(".field-name").click(function(){
            $(this).toggle();
            $(this).next('div').toggle();
        });

        $(".clearfilter").click(function(){
            $("#SETFILTER").val('N');
            $("#list-form").submit();
        });

        $(".clear_field").click(function(){
            $(this).prev('.fs').val('');
            $("#list-form").submit();
        });

        $(".fs").keyup(function(){
            var tut = parseInt($(this).offset().left);
            var tam = parseInt($('.default-infotable').offset().left);
            var to_tut_to_tam = tut-tam;
            $(".popup-filter-s	").attr('style', 'margin-left: '+to_tut_to_tam+'px; display: block;');
        });

        if (getUrlParameter('add')=='y'){
            actSupp('addSupp',0,'yes');
        }

    });

    function submitFilter(){
        $("#list-form").submit();
    }
    function cdivd(e,anim){
        $(e).parent('div').toggle();
        if (anim==1){
            $(e).parent('div').next('div').show('slow');
        }else{
            $(e).parent('div').next('div').toggle();
        }

    }
    function actSupp(act_s,itemid,reload_p = "no"){
        if (!($("#workarea .popup-detail-partner-block").length)){
            $('#workarea').prepend('<div class="popup-detail-partner-block"><!--<img src="<?php echo '<?'; ?>
=$templateFolder;<?php echo '?>'; ?>
/images/l.gif" class="loades-image">--></div><div class="popup-detail-partner-block-bg"></div>');
        }

        /*if ($('tr').hasClass('.string'+itemid+'')){
            var btt = Number($('.string'+itemid+'').offset().top)-50;
        }
        else{
            var btt = -50;
        }
        $('.popup-detail-partner-block').attr('style', 'top: '+btt+'px');*/
        $('.popup-detail-partner-block').load('<?php echo '<?'; ?>
=$templateFolder;<?php echo '?>'; ?>
/loaded.php?type='+act_s+'&i='+itemid+'', function(){
            $('.popup-detail-partner-block').alignCenterScreen();
        });

    }
    function closeActSupp(reload_p = "no"){
        $('.popup-detail-partner-block').hide('slow', function(){
            $('.popup-detail-partner-block').remove();
            if (reload_p=='yes'){
                //console.log(location.pathname.toString());
                location.assign(location.pathname.toString());
            }else if(reload_p=='reload'){
                location.reload(true);
            }

        });
        $('.popup-detail-partner-block-bg').remove();

    }
    $.fn.alignCenterScreen = function() {
        this.css("position", "absolute");
        var ttop = ($(window).height() - this.outerHeight()) / 2 + $(window).scrollTop();
        if(ttop < 120){
            ttop = 220;
        }
        this.css("top", ttop + "px");
        /*this.css("left", ($(window).width() - this.outerWidth()) / 2 + $(window).scrollLeft() + "px");*/
        return this
    };
    function ajaxAct (act_s,id){
        var run_ajax = 0;
        var data_fs =  {};//Object();
        if (act_s=='delSupp'){
            if(window.confirm('Удалить?')){
                run_ajax=1;
                data_fs=data_fs = { type: act_s, id: id }; // Правильный синтаксис для JavaScript
            }
        };
            }
        }
        if (act_s=='addSupp'){
            if (checkInput()){
                run_ajax=1;
                data_fs=$('#addSuppForm').serialize();
                //console.log(data_fs);
                //$('#addSuppForm').submit();
            }
        }
        if (act_s=='editSupp'){
            if (checkInput()){
                run_ajax=1;
                data_fs=$('#editSuppForm').serialize();
                //console.log(data_fs);
                //$('#addSuppForm').submit();
            }
        }
        if (act_s=='addSuppAgent'){
            if (checkInput()){
                run_ajax=1;
                data_fs=$('#addSuppAgentForm').serialize();
                //console.log(data_fs);
                //$('#addSuppForm').submit();
            }
        }
        if (act_s=='delSuppAgent'){
            if(window.confirm('Удалить?')){
                run_ajax=1;
                data_fs={ type:act_s,id:id };
            }
        }
        if (act_s=='editSuppAgent'){
            if (checkInput()){
                run_ajax=1;
                data_fs=$('#editSuppAgentForm').serialize();
                //console.log(data_fs);
                //$('#addSuppForm').submit();
            }
        }
        if (run_ajax==1){
            $.ajax({
                url: "<?php echo '<?'; ?>
=$templateFolder;<?php echo '?>'; ?>
/ajaxAct.php",
                type: "POST",
                data: data_fs,
                error: function() {
                    alert('Ошибка!');
                },
                success: function(data) {
                    if (act_s=='delSupp'){
                        $('.string'+id).hide('slow', function(){
                            $('.string'+id).remove();
                        });
                    }
                    if (act_s=='addSupp'){
                        closeActSupp("yes");
                    }
                    if(act_s=='editSupp'){
                        closeActSupp("reload");
                    }
                    if(act_s=='addSuppAgent'){
                        actSupp('editSuppAgent',id,'yes');
                    }
                    if (act_s=='delSuppAgent'){
                        $('.agentstr'+id).hide('slow', function(){
                            $('.agentstr'+id).remove();
                        });
                    }
                    if(act_s=='editSuppAgent'){
                        actSupp('editSupp',id,'yes');
                    }
                },
                complete: function() {
                    //console.log("<?php echo '<?'; ?>
=$templateFolder;<?php echo '?>'; ?>
/searchINN.php?INN="+INNv);
                }
            });
        }

    }
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };
    function trendDiv(act_d){
        if (act_d=='hide'){
            $('.trend_div').hide('slow');
        }else if (act_d=='show'){
            $('.trend_div').show('slow');
        }

    }
    function checkInput(){
        var err=0;
        var str_warn='';
        $('.control_txt').each(function(){
            if ($.trim($(this).val())==''){
                err=1;
                str_warn=str_warn+$(this).attr('placeholder')+'; ';

            }
        });
        if (err==1){
            alert('Заполните следующие поля: '+str_warn);
            return false;
        }else{
            return true;
        }
        //console.log(str_warn);
    }
    function searchINN(){
        var INNv = $('[name=su_inn]').val().trim();

        if (INNv.length==10 || INNv.length==12){
            //console.log(INNv);
            $.ajax({
                url: "<?php echo '<?'; ?>
=$templateFolder;<?php echo '?>'; ?>
/ajaxAct.php",
                type: "POST",
                data: { type:'searchINN',INN:INNv },
                error: function() {
                    alert('Ошибка!');

                },
                success: function(data) {
                    var dataObj=JSON.parse(data);
                    var arrPredpr=dataObj.suggestions;
                    if (arrPredpr.length>1 && $('[name=su_kpp]').val().length==0){
                        alert ("У компании более одного подразделения, заполните КПП!");
                    }else if (arrPredpr.length==0){
                        alert ('Компания не найдена по ИНН!');
                    }
                    else{
                        arrPredpr.forEach(function(objPredpr, i) {
                            if (objPredpr.data.kpp==$('[name=su_kpp]').val() || (typeof objPredpr.data.kpp == "undefined") || arrPredpr.length==1){
                                $('[name=su_shortname]').attr('value',objPredpr.data.name.short_with_opf);
                                if (typeof objPredpr.data.kpp != "undefined"){
                                    $('[name=su_kpp]').val(objPredpr.data.kpp);
                                }
                                $('[name=su_fullname]').val(objPredpr.data.name.full_with_opf);
                                $('[name=su_address]').val(objPredpr.data.address.data.source);
                                if ($('[name=su_postaddress]').val().length==0){
                                    $('[name=su_postaddress]').val(objPredpr.data.address.data.source);
                                }
                                if ($('[name=su_faktaddress]').val().length==0){
                                    $('[name=su_faktaddress]').val(objPredpr.data.address.data.source);
                                }
                                $('[name=su_ogrn]').val(objPredpr.data.ogrn);
                                if (arrPredpr[0].data.state.status!='ACTIVE'){
                                    alert('Деятельность этой компании прекращена!');
                                    $('[name=su_active]').val('0');
                                    $('[name=su_st_id]').val('4');
                                }else if (arrPredpr[0].data.state.status=='ACTIVE'){
                                    $('[name=su_active]').val('1');
                                }
                                if (typeof arrPredpr[0].data.management != "undefined"){
                                    if(arrPredpr[0].data.management != null){
                                        $('[name=su_bossfullname]').val(arrPredpr[0].data.management.name);
                                        $('[name=su_bosstitle]').val(arrPredpr[0].data.management.post);
                                    }

                                }else{
                                    $('[name=su_bossfullname]').val(objPredpr.data.name.full);
                                    $('[name=su_bosstitle]').val(objPredpr.data.opf.full);
                                }
                            }
                        });
                    }
                },
                complete: function() {
                    //console.log("<?php echo '<?'; ?>
=$templateFolder;<?php echo '?>'; ?>
/searchINN.php?INN="+INNv);
                }
            });
        }else{
            //console.log(INNv.length);
            alert("В ИНН должно быть 10 или 12 цифр");

        }
    };
<?php echo '</script'; ?>
>
<?php if ($_smarty_tpl->getValue('arResult')['SUPP']) {?>
    <h2>Поставщики</h2>
    <table cellpadding="0" cellspacing="0" border="0" class="default-infotable suppliers" style="width: 1440px !important;table-layout: fixed;">
        <thead>
        <tr class="fixed-pane" style="width: 1440px">
            <th class="td-1">№</th>
            <th class="td-2">
                <div class="field-name" <?php if ((null !== ($_smarty_tpl->getValue('arResult')['FILTER_VALUES']['su_name'] ?? null))) {?>style="display: none;"><?php }?>
                    <div class="review-search">Наименование<span class="restart-field"></span></div>
                </div>
                <div class="field-search" <?php if ((null !== ($_smarty_tpl->getValue('arResult')['FILTER_VALUES']['su_name'] ?? null))) {?>style="display: block;"<?php }?>>
                    <input autocomplete="off" name="subFilter[input][su_name]" value="<?php echo (null !== ($_smarty_tpl->getValue('arResult')['FILTER_VALUES']['su_name'] ?? null));?>
" class="fs  <?php if ((null !== ($_smarty_tpl->getValue('arResult')['FILTER_VALUES']['su_name'] ?? null))) {?> active-fs<?php }?>" placeholder="Наименование" type="text">
                    <?php if ((null !== ($_smarty_tpl->getValue('arResult')['FILTER_VALUES']['su_name'] ?? null))) {?>
                    <div class="clear_field"></div>
                     <?php }?>
                </div>
            </th>
            <th>
            <th class="td-3">
                <div class="field-name" <?php if ((null !== ($_smarty_tpl->getValue('arResult')['FILTER_VALUES']['sa_name'] ?? null))) {?>style="display: none;"><?php }?>
                <div class="review-search">Контактное лицо<span class="restart-field"></span></div>
                </div>
                <div class="field-search" <?php if ((null !== ($_smarty_tpl->getValue('arResult')['FILTER_VALUES']['sa_name'] ?? null))) {?>style="display: block;"<?php }?>>
                <input autocomplete="off" name="subFilter[input][sa_name]" value="<?php echo (null !== ($_smarty_tpl->getValue('arResult')['FILTER_VALUES']['sa_name'] ?? null));?>
" class="fs <?php if ((null !== ($_smarty_tpl->getValue('arResult')['FILTER_VALUES']['sa_name'] ?? null))) {?> active-fs<?php }?>" placeholder="Контактное лицо" type="text">
                    <?php if ((null !== ($_smarty_tpl->getValue('arResult')['FILTER_VALUES']['sa_name'] ?? null))) {?>
                        <div class="clear_field"></div>
                    <?php }?>
                </div>
            </th>
            </th>
            <th>Телефон</th>
            <th>E-mail</th>
            <th>ИНН</th>
            <th>Тип</th>
            <th>Направление</th>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arResult')['SUPP'], 'supplier');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('supplier')->value) {
$foreach0DoElse = false;
?>
            <tr>
                <td> </td>
                <td><a href="javascript:void(0);" onclick="actSupp('viewSupp', <?php echo $_smarty_tpl->getValue('supplier')['su_id'];?>
)"><?php echo $_smarty_tpl->getValue('supplier')['su_name'];?>
</a></td>
                <td>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('supplier')['AGENT'], 'agent');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('agent')->value) {
$foreach1DoElse = false;
?>
                        <?php echo $_smarty_tpl->getValue('agent')['sa_name'];?>
<br>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </td>
                <td>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('supplier')['AGENT'], 'agent');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('agent')->value) {
$foreach2DoElse = false;
?>
                        <?php if ($_smarty_tpl->getValue('agent')['sa_phone']) {?>
                            <?php echo $_smarty_tpl->getValue('agent')['sa_phone'];?>
<br>
                        <?php }?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </td>
                <td>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('supplier')['AGENT'], 'agent');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('agent')->value) {
$foreach3DoElse = false;
?>
                        <?php if ($_smarty_tpl->getValue('agent')['sa_email']) {?>
                            <a href="mailto:<?php echo $_smarty_tpl->getValue('agent')['sa_email'];?>
"><?php echo $_smarty_tpl->getValue('agent')['sa_email'];?>
</a><br>
                        <?php }?>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </td>
                <td><?php echo $_smarty_tpl->getValue('supplier')['su_inn'];?>
</td>
                <td><?php echo $_smarty_tpl->getValue('arResult')['TYPE'][$_smarty_tpl->getValue('supplier')['su_st_id']]['st_name'];?>
</td>
                <td>
                    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('supplier')['CATALOG'], 'catalog');
$foreach4DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('catalog')->value) {
$foreach4DoElse = false;
?>
                        <?php echo $_smarty_tpl->getValue('catalog')['dc_name'];?>
<br>
                    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </td>
            </tr>
        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
<?php }
echo $_smarty_tpl->getValue('footer');
}
}
