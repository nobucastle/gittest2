<?php
require_once '/app/salesforce.php';

#読み込み処理
print_r(Salesforce::read('0010o00002nJtDUMMY'));
echo __DIR__;

/* 成功した場合
Array
(
    [totalSize] => 1
    [done] => 1
    [records] => Array
        (
            [0] => Array
                (
                    [attributes] => Array
                        (
                            [type] => Account
                            [url] => /services/data/v50.0/sobjects/Account/0010o00002nJtDUMMY
                        )

                    [Id] => 0010o00002nJtDUMMY
                    [Name] => test取引先1
                )

        )

)
*/