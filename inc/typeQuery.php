<?php

require(__DIR__.'/db.php');

$typeList = array();

$sql = '
    SELECT *
    FROM type
    WHERE footer_order != 0
    ORDER BY footer_order
    LIMIT 5
';

$stmt = $pdo->query($sql);

$typeList = $stmt->fetchAll(PDO::FETCH_ASSOC);
