<?php

function getCategoryStaticList($staticLisCategorytName) {
    $listCategoryQuery = "SELECT id AS _value, "
            . " title AS _key "
            . " FROM tm_categoriesjob";
    $staticListCollection = Database::getAll($listCategoryQuery);

    $htmlTemplate = "<select name=$staticLisCategorytName class = input>";
    foreach ($staticListCollection as $key => $value) {
        $categoryKey = $value['_key'];
        $categoryValue = $value['_value'];
        $htmlTemplate .= "<option value=$categoryValue>$categoryKey</option>";
    }
    $htmlTemplate .= "</option>";

    echo $htmlTemplate;
}