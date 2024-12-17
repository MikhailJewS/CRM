{$header}
{$menu}


<table cellpadding="0" cellspacing="0" border="0" class="default-infotable partners" style="width-min: 1880; width: 100% !important; table-layout: fixed;">
  <form id="list-form" action="" method="post">
    <input type="hidden" id="SETFILTER" name="SETFILTER" value="Y">
    <input type="hidden" id="move" name="move" value="{$smarty.post.move}">
    <input type="hidden" id="applymove" name="applymove" value="">
    <input type="submit" class="popup-filter-s" value="Показать" style="display: none;">
    
    <thead class="thead-t">
      <tr class="fixed-pane" style="width: 1780px">
        <td class="td-1">№</td>
        <td class="td-2">
          <div class="field-name" {if strlen($arResult["FILTER_VALUES"]["FIELDS"]["NAME"]) > 0}style="display: none;"{/if}>
            <div class="review-search">Наименование<span class="restart-field"></span></div>
          </div>
          <div class="field-search" {if strlen($arResult["FILTER_VALUES"]["FIELDS"]["NAME"]) > 0}style="display: block;"{/if}>
            <input autocomplete="off" name="subFilter[FIELDS][NAME]" value="{$arResult.FILTER_VALUES.FIELDS.NAME}" class="fs {if strlen($arResult["FILTER_VALUES"]["FIELDS"]["NAME"]) > 0}active-fs{/if}" placeholder="Наименование" type="text">
            {if strlen($arResult["FILTER_VALUES"]["FIELDS"]["NAME"]) > 0}
              <div class="clear_field"></div>
            {/if}
          </div>
        </td>

        {if $USER->IsAdmin() && $arParams["IBLOCK_ID"] == 7 || 
            $USER->GetID() == 7 && $arParams["IBLOCK_ID"] == 7 || 
            (in_array(9, $USER->GetUserGroup($USER->GetID())) && $arParams["IBLOCK_ID"] == 7) || 
            (in_array(13, $USER->GetUserGroup($USER->GetID())) && $arParams["IBLOCK_ID"] == 7) || 
            (in_array(14, $USER->GetUserGroup($USER->GetID())) && $arParams["IBLOCK_ID"] == 7) || 
            in_array(19, $USER->GetUserGroup($USER->GetID())) || 
            in_array(24, $USER->GetUserGroup($USER->GetID()))}

          <td class="td-8">
            <div class="field-name" style="background: none; {if strlen($arResult["FILTER_VALUES"]["PROPERTIES"]["UF_MANAGER"]) > 0}display: none;{/if}">
              <div class="review-search">Менеджер<span class="restart-field"></span></div>
            </div>
            <div class="field-search" {if strlen($arResult["FILTER_VALUES"]["PROPERTIES"]["UF_MANAGER"]) > 0}style="display: block;"{/if}>
              <select id="mlk" class="select-fs" onchange="submitFilter()" name="subFilter[PROPERTIES][UF_MANAGER]">
                <option value="">Любой</option>
                <option value="-1" {if $arResult["FILTER_VALUES"]["PROPERTIES"]["UF_MANAGER"] == -1}selected="selected"{/if}>Не установлен</option>
                {foreach $arResult["MANAGERS_LIST"] as $managerId => $managerName}
                  {if $managerId != 1 && $managerId != 12}
                    <option value="{$managerId}" {if $managerId == $arResult["FILTER_VALUES"]["PROPERTIES"]["UF_MANAGER"]}selected="selected"{/if} {if $arResult["MANAGERS_ACTIVE"][$managerId]=='N'}style="font-style: italic;"{/if}>{$managerName}</option>
                  {/if}
                {/foreach}
              </select>
            </div>
          </td>
        {/if}

        <td class="td-3">
          <div class="field-name" {if strlen($arResult["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0}style="display: none;"{/if}>
            <div class="review-search">Контактное лицо<span class="restart-field"></span></div>
          </div>
          <div class="field-search" {if strlen($arResult["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0}style="display: block;"{/if}>
            <input autocomplete="off" name="subFilter[PROPERTIES][UF_FACE]" value="{$arResult.FILTER_VALUES.PROPERTIES.UF_FACE}" class="fs {if strlen($arResult["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0}active-fs{/if}" placeholder="Контактное лицо" type="text">
            {if strlen($arResult["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0}
              <div class="clear_field"></div>
            {/if}
          </div>
        </td>

        <td class="td-4">
          <div class="field-name" {if strlen($arResult["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0}style="display: none;"{/if}>
            <div class="review-search">Контактное лицо<span class="restart-field"></span></div>
          </div>
          <div class="field-search" {if strlen($arResult["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0}style="display: block;"{/if}>
            <input autocomplete="off" name="subFilter[PROPERTIES][UF_FACE]" value="{$arResult.FILTER_VALUES.PROPERTIES.UF_FACE}" class="fs {if strlen($arResult["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0}active-fs{/if}" placeholder="Контактное лицо" type="text">
            {if strlen($arResult["FILTER_VALUES"]["PROPERTIES"]["UF_FACE"]) > 0}
              <div class="clear_field"></div>
            {/if}
          </div>
        </td>

        <!-- Продолжайте код, добавляя оставшиеся столбцы и элементы -->
      </tr>
    </thead>
  </form>
</table>

{$footer}