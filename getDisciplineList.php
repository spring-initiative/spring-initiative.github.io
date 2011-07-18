<?php

include_once ("lib/function_discipline.inc");

$studentid = getValue($_GET, "studentid");
$year = getValue($_GET, "year", $CurrentYear);

$start = getValue($_GET, "start", 0);
$limit = getValue($_GET, "limit", 30);
$sort = getValue($_GET, "sort", "creation");
$dir = getValue($_GET, "dir", "ASC");

$disciplines = getDiscipline($studentid, $year, $sort, $dir, $start, $limit, $dstatusValues);
$total = getTotalDiscipline($studentid, $year, $dstatusValues);
$results = array("totalCount" => $total, "success" => true, "incidents" => $disciplines);

writeFile(json_encode($results));
echo json_encode($results);

?>
