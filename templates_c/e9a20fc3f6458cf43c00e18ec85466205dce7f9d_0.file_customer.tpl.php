<?php
/* Smarty version 5.4.0, created on 2024-11-28 17:06:42
  from 'file:customer.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.0',
  'unifunc' => 'content_674878f291d5c6_34583566',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9a20fc3f6458cf43c00e18ec85466205dce7f9d' => 
    array (
      0 => 'customer.tpl',
      1 => 1728706512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_674878f291d5c6_34583566 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\AppServ\\www\\templates';
echo $_smarty_tpl->getValue('header');?>

<?php echo $_smarty_tpl->getValue('menu');?>



<table cellpadding="0" cellspacing="0" border="0" class="default-infotable partners" style="width-min: 1880; width: 100% !important; table-layout: fixed;">
  <form id="list-form" action="" method="post">
    <input type="hidden" id="SETFILTER" name="SETFILTER" value="Y">
    <input type="hidden" id="move" name="move" value="<?php echo $_POST['move'];?>
">
    <input type="hidden" id="applymove" name="applymove" value="">
    <input type="submit" class="popup-filter-s" value="Показать" style="display: none;">
    
    <thead class="thead-t">
      <tr class="fixed-pane" style="width: 1780px">
        <td class="td-1">№</td>
        <td class="td-2">
          <div class="field-name" <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["FIELDS"]["NAME"]) > 0) {?>style="display: none;"<?php }?>>
            <div class="review-search">Наименование<span class="restart-field"></span></div>
          </div>
          <div class="field-search" <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["FIELDS"]["NAME"]) > 0) {?>style="display: block;"<?php }?>>
            <input autocomplete="off" name="subFilter[FIELDS][NAME]" value="<?php echo $_smarty_tpl->getValue('arResult')['FILTER_VALUES']['FIELDS']['NAME'];?>
" class="fs <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["FIELDS"]["NAME"]) > 0) {?>active-fs<?php }?>" placeholder="Наименование" type="text">
            <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["FIELDS"]["NAME"]) > 0) {?>
              <div class="clear_field"></div>
            <?php }?>
          </div>
        </td>

        <?php if ($_smarty_tpl->getValue('USER')->IsAdmin() && $_smarty_tpl->getValue('arParams')["IBLOCK_ID"] == 7 || $_smarty_tpl->getValue('USER')->GetID() == 7 && $_smarty_tpl->getValue('arParams')["IBLOCK_ID"] == 7 || ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')(9,$_smarty_tpl->getValue('USER')->GetUserGroup($_smarty_tpl->getValue('USER')->GetID())) && $_smarty_tpl->getValue('arParams')["IBLOCK_ID"] == 7) || ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')(13,$_smarty_tpl->getValue('USER')->GetUserGroup($_smarty_tpl->getValue('USER')->GetID())) && $_smarty_tpl->getValue('arParams')["IBLOCK_ID"] == 7) || ($_smarty_tpl->getSmarty()->getModifierCallback('in_array')(14,$_smarty_tpl->getValue('USER')->GetUserGroup($_smarty_tpl->getValue('USER')->GetID())) && $_smarty_tpl->getValue('arParams')["IBLOCK_ID"] == 7) || $_smarty_tpl->getSmarty()->getModifierCallback('in_array')(19,$_smarty_tpl->getValue('USER')->GetUserGroup($_smarty_tpl->getValue('USER')->GetID())) || $_smarty_tpl->getSmarty()->getModifierCallback('in_array')(24,$_smarty_tpl->getValue('USER')->GetUserGroup($_smarty_tpl->getValue('USER')->GetID()))) {?>

          <td class="td-8">
            <div class="field-name" style="background: none; <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_MANAGER"]) > 0) {?>display: none;<?php }?>">
              <div class="review-search">Менеджер<span class="restart-field"></span></div>
            </div>
            <div class="field-search" <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_MANAGER"]) > 0) {?>style="display: block;"<?php }?>>
              <select id="mlk" class="select-fs" onchange="submitFilter()" name="subFilter[PROPERTIES][UF_MANAGER]">
                <option value="">Любой</option>
                <option value="-1" <?php if ($_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_MANAGER"] == -1) {?>selected="selected"<?php }?>>Не установлен</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('arResult')["MANAGERS_LIST"], 'managerName', false, 'managerId');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('managerId')->value => $_smarty_tpl->getVariable('managerName')->value) {
$foreach0DoElse = false;
?>
                  <?php if ($_smarty_tpl->getValue('managerId') != 1 && $_smarty_tpl->getValue('managerId') != 12) {?>
                    <option value="<?php echo $_smarty_tpl->getValue('managerId');?>
" <?php if ($_smarty_tpl->getValue('managerId') == $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_MANAGER"]) {?>selected="selected"<?php }?> <?php if ($_smarty_tpl->getValue('arResult')["MANAGERS_ACTIVE"][$_smarty_tpl->getValue('managerId')] == 'N') {?>style="font-style: italic;"<?php }?>><?php echo $_smarty_tpl->getValue('managerName');?>
</option>
                  <?php }?>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
              </select>
            </div>
          </td>
        <?php }?>

        <td class="td-3">
          <div class="field-name" <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0) {?>style="display: none;"<?php }?>>
            <div class="review-search">Контактное лицо<span class="restart-field"></span></div>
          </div>
          <div class="field-search" <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0) {?>style="display: block;"<?php }?>>
            <input autocomplete="off" name="subFilter[PROPERTIES][UF_FACE]" value="<?php echo $_smarty_tpl->getValue('arResult')['FILTER_VALUES']['PROPERTIES']['UF_FACE'];?>
" class="fs <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0) {?>active-fs<?php }?>" placeholder="Контактное лицо" type="text">
            <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0) {?>
              <div class="clear_field"></div>
            <?php }?>
          </div>
        </td>

        <td class="td-4">
          <div class="field-name" <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0) {?>style="display: none;"<?php }?>>
            <div class="review-search">Контактное лицо<span class="restart-field"></span></div>
          </div>
          <div class="field-search" <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0) {?>style="display: block;"<?php }?>>
            <input autocomplete="off" name="subFilter[PROPERTIES][UF_FACE]" value="<?php echo $_smarty_tpl->getValue('arResult')['FILTER_VALUES']['PROPERTIES']['UF_FACE'];?>
" class="fs <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0) {?>active-fs<?php }?>" placeholder="Контактное лицо" type="text">
            <?php if (strlen((string) $_smarty_tpl->getValue('arResult')["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0) {?>
              <div class="clear_field"></div>
            <?php }?>
          </div>
        </td>

        <!-- Продолжайте код, добавляя оставшиеся столбцы и элементы -->
      </tr>
    </thead>
  </form>
</table>

<?php echo $_smarty_tpl->getValue('footer');
}
}
