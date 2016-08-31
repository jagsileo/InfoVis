<?php

$username = "root";
$password = "";
$host = "localhost";
$database = "test";

$server = mysql_connect($host, $username, $password);
$connection = mysql_select_db($database, $server);

function createTable($newtab, $fromtab, $condition) {
    $sqlj1 = "CREATE TABLE `" . $newtab . "` AS (SELECT * FROM (select ID AS ID, coll_f1 AS source, coll_s1 AS target, count(*) AS value from `" . $fromtab . "`" . $condition . "GROUP BY coll_f1, coll_s1) AS TAB1)";
    $sqlt1 = "ALTER TABLE `" . $newtab . "` MODIFY source varchar(100)";
    $sqlt2 = "ALTER TABLE `" . $newtab . "` MODIFY target varchar(100)";
    $sqlj2 = "INSERT INTO `" . $newtab . "` SELECT ID AS ID, coll_s1, coll_f2, count(*) from `" . $fromtab . "`" . $condition . "GROUP BY coll_s1, coll_f2";
    $sqlj3 = "INSERT INTO `" . $newtab . "` SELECT ID AS ID, coll_f2, coll_s2, count(*) from `" . $fromtab . "`" . $condition . "GROUP BY coll_f2, coll_s2";
    $sqlj4 = "INSERT INTO `" . $newtab . "` SELECT ID AS ID, coll_s2, coll_f3, count(*) from `" . $fromtab . "`" . $condition . "GROUP BY coll_s2, coll_f3";
    $sqlj5 = "INSERT INTO `" . $newtab . "` SELECT ID AS ID, coll_f3, coll_s3, count(*) from `" . $fromtab . "`" . $condition . "GROUP BY coll_f3, coll_s3";
    $sqlj6 = "INSERT INTO `" . $newtab . "` SELECT ID AS ID, coll_s3, coll_f4, count(*) from `" . $fromtab . "`" . $condition . "GROUP BY coll_s3, coll_f4";
    $sqlj7 = "INSERT INTO `" . $newtab . "` SELECT ID AS ID, coll_f4, coll_s4, count(*) from `" . $fromtab . "`" . $condition . "GROUP BY coll_f4, coll_s4";
    $sqlj8 = "INSERT INTO `" . $newtab . "` SELECT ID AS ID, coll_s4, coll_f5, count(*) from `" . $fromtab . "`" . $condition . "GROUP BY coll_s4, coll_f5";
    $sqlj9 = "INSERT INTO `" . $newtab . "` SELECT ID AS ID, coll_f5, coll_s5, count(*) from `" . $fromtab . "`" . $condition . "GROUP BY coll_f5, coll_s5";
    $sqlj10 = "INSERT INTO `" . $newtab . "` SELECT ID AS ID, coll_s5, coll_f6, count(*) from `" . $fromtab . "`" . $condition . "GROUP BY coll_s5, coll_f6";
    $sqlj11 = "INSERT INTO `" . $newtab . "` SELECT ID AS ID, coll_f6, coll_s6, count(*) from `" . $fromtab . "`" . $condition . "GROUP BY coll_f6, coll_s6";
    mysql_query($sqlj1);
    mysql_query($sqlt1);
    mysql_query($sqlt2);
    mysql_query($sqlj2);
    mysql_query($sqlj3);
    mysql_query($sqlj4);
    mysql_query($sqlj5);
    mysql_query($sqlj6);
    mysql_query($sqlj7);
    mysql_query($sqlj8);
    mysql_query($sqlj9);
    mysql_query($sqlj10);
    mysql_query($sqlj11);
}

function createMajTab($newmajor, $finalmajor, $mastertab, $condition, $m1) {
    $chktable = "SHOW TABLES LIKE '"
            . $newmajor . "'";
    $result = mysql_query($chktable);
    if (mysql_num_rows($result) == 0) {
        $sqlm1 = "CREATE TABLE `" . $newmajor . "` AS (SELECT * FROM (select ID AS ID, coll_f1 AS source_college, Major_F1 AS source, Major_S1 AS target, coll_s1 AS destination_college, count(*) AS value from `" . $mastertab . "`" . $condition . "GROUP BY coll_f1, Major_F1, Major_S1, coll_s1) AS TAB1)";
        $sqlmt1 = "ALTER TABLE `" . $newmajor . "` MODIFY source varchar(100)";
        $sqlmt2 = "ALTER TABLE `" . $newmajor . "` MODIFY target varchar(100)";
        $sqlmt3 = "ALTER TABLE `" . $newmajor . "` MODIFY source_college varchar(100)";
        $sqlmt4 = "ALTER TABLE `" . $newmajor . "` MODIFY destination_college varchar(100)";
        $sqlm2 = "INSERT INTO `" . $newmajor . "` SELECT ID AS ID, coll_s1, Major_S1, Major_F2, coll_f2, count(*) from `" . $mastertab . "`" . $condition . "GROUP BY coll_s1, Major_S1, Major_F2, coll_f2";
        $sqlm3 = "INSERT INTO `" . $newmajor . "` SELECT ID AS ID, coll_f2, Major_F2, Major_S2, coll_s2, count(*) from `" . $mastertab . "`" . $condition . "GROUP BY coll_f2, Major_F2, Major_S2, coll_s2";
        $sqlm4 = "INSERT INTO `" . $newmajor . "` SELECT ID AS ID, coll_s2, Major_S2, Major_F3, coll_f3, count(*) from `" . $mastertab . "`" . $condition . "GROUP BY coll_s2, Major_S2, Major_F3, coll_f3";
        $sqlm5 = "INSERT INTO `" . $newmajor . "` SELECT ID AS ID, coll_f3, Major_F3, Major_S3, coll_s3, count(*) from `" . $mastertab . "`" . $condition . "GROUP BY coll_f3, Major_F3, Major_S3, coll_s3";
        $sqlm6 = "INSERT INTO `" . $newmajor . "` SELECT ID AS ID, coll_s3, Major_S3, Major_F4, coll_f4, count(*) from `" . $mastertab . "`" . $condition . "GROUP BY coll_s3, Major_S3, Major_F4, coll_f4";
        $sqlm7 = "INSERT INTO `" . $newmajor . "` SELECT ID AS ID, coll_f4, Major_F4, Major_S4, coll_s4, count(*) from `" . $mastertab . "`" . $condition . "GROUP BY coll_f4, Major_F4, Major_S4, coll_s4";
        $sqlm8 = "INSERT INTO `" . $newmajor . "` SELECT ID AS ID, coll_s4, Major_S4, Major_F5, coll_f5, count(*) from `" . $mastertab . "`" . $condition . "GROUP BY coll_s4, Major_S4, Major_F5, coll_f5";
        $sqlm9 = "INSERT INTO `" . $newmajor . "` SELECT ID AS ID, coll_f5, Major_F5, Major_S5, coll_s5, count(*) from `" . $mastertab . "`" . $condition . "GROUP BY coll_f5, Major_F5, Major_S5, coll_s5";
        $sqlm10 = "INSERT INTO `" . $newmajor . "` SELECT ID AS ID, coll_s5, Major_S5, Major_F6, coll_f6, count(*) from `" . $mastertab . "`" . $condition . "GROUP BY coll_s5, Major_S5, Major_F6, coll_f6";
        $sqlm11 = "INSERT INTO `" . $newmajor . "` SELECT ID AS ID, coll_f6, Major_F6, Major_S6, coll_s6, count(*) from `" . $mastertab . "`" . $condition . "GROUP BY coll_f6, Major_F6, Major_S6, coll_s6";

        mysql_query($sqlm1);
        mysql_query($sqlmt1);
        mysql_query($sqlmt2);
        mysql_query($sqlmt3);
        mysql_query($sqlmt4);
        mysql_query($sqlm2);
        mysql_query($sqlm3);
        mysql_query($sqlm4);
        mysql_query($sqlm5);
        mysql_query($sqlm6);
        mysql_query($sqlm7);
        mysql_query($sqlm8);
        mysql_query($sqlm9);
        mysql_query($sqlm10);
        mysql_query($sqlm11);
    }
    $chktable = "SHOW TABLES LIKE '" . $finalmajor . "'";
    $result = mysql_query($chktable);
    if (mysql_num_rows($result) == 0) {
        $maj = $finalmajor . '_temp';
        $sql = "CREATE TABLE `" . $maj . "` AS (select * from  (
(select * from `" . $newmajor . "` where substr(source_college,1,LOCATE('_',source_college)-1) = '" . $m1 . "' OR 
substr(Destination_college,1,LOCATE('_',destination_college)-1) ='" . $m1 . "')
UNION ALL
(select * from `" . $newmajor . "` where substr(source_college,1,LOCATE('_',source_college)-1) IN  ('GRAD','NE') AND 
substr(Destination_college,1,LOCATE('_',destination_college)-1) IN ('GRAD','NE'))) as tab10);";

        mysql_query($sql);
        $sqltm1 = "ALTER TABLE `" . $maj . "` MODIFY source varchar(100)";
        $sqltm2 = "ALTER TABLE `" . $maj . "` MODIFY source_college varchar(100)";
        $sqltm3 = "ALTER TABLE `" . $maj . "` MODIFY target varchar(100)";
        $sqltm4 = "ALTER TABLE `" . $maj . "` MODIFY destination_college varchar(100)";
        mysql_query($sqltm1);
        mysql_query($sqltm2);
        mysql_query($sqltm3);
        mysql_query($sqltm4);

//UPDATE SOURCE_COLLEGE
        $sql2 = "UPDATE `" . $maj . "` 
SET target = CONCAT('OTHER',SUBSTR(destination_college,LOCATE('_',destination_college),3))
where substr(destination_college,1,LOCATE('_',destination_college)-1) NOT IN ('" . $m1 . "','NE','GRAD') AND substr(source_college,1,LOCATE('_',source_college)-1) ='" . $m1 . "';";
        mysql_query($sql2);

//UPDATE DESTINATION_COLLEGE
        $sql3 = "UPDATE `" . $maj . "` 
SET Source = CONCAT('OTHER',SUBSTR(source_college,LOCATE('_',source_college),3))
where substr(source_college,1,LOCATE('_',source_college)-1) NOT IN ('" . $m1 . "','NE','GRAD') AND substr(Destination_college,1,LOCATE('_',destination_college)-1) ='" . $m1 . "';";
        mysql_query($sql3);
            
//Create the final major table eg., 2001_ENG
        $sql5 = "CREATE TABLE `" . $finalmajor . "` AS (select * from (SELECT ID, source, target, sum(value) as value from `" . $maj . "` GROUP BY source,target)AS tab3)";
        mysql_query($sql5);
        $sql15t = "ALTER TABLE `" . $finalmajor . "` MODIFY source varchar(100)";
        $sql16t = "ALTER TABLE `" . $finalmajor . "` MODIFY source_college varchar(100)";
        $sql17t = "ALTER TABLE `" . $finalmajor . "` MODIFY target varchar(100)";
        $sql18t = "ALTER TABLE `" . $finalmajor . "` MODIFY destination_college varchar(100)";
        mysql_query($sql15t);
        mysql_query($sql16t);
        mysql_query($sql17t);
        mysql_query($sql18t);
        $sq17 = "ALTER TABLE `" . $finalmajor . "` ADD COLUMN sortIndex INT AFTER value";
        mysql_query($sq17);
        $sq18 = "UPDATE `" . $finalmajor . "` SET sortIndex = 1 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'F1'";
        $sq19 = "UPDATE `" . $finalmajor . "` SET sortIndex = 2 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'S1'";
        $sq20 = "UPDATE `" . $finalmajor . "` SET sortIndex = 3 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'F2'";
        $sq21 = "UPDATE `" . $finalmajor . "` SET sortIndex = 4 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'S2'";
        $sq22 = "UPDATE `" . $finalmajor . "` SET sortIndex = 5 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'F3'";
        $sq23 = "UPDATE `" . $finalmajor . "` SET sortIndex = 6 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'S3'";
        $sq24 = "UPDATE `" . $finalmajor . "` SET sortIndex = 7 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'F4'";
        $sq25 = "UPDATE `" . $finalmajor . "` SET sortIndex = 8 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'S4'";
        $sq26 = "UPDATE `" . $finalmajor . "` SET sortIndex = 9 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'F5'";
        $sq27 = "UPDATE `" . $finalmajor . "` SET sortIndex = 10 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'S5'";
        $sq28 = "UPDATE `" . $finalmajor . "` SET sortIndex = 11 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'F6'";
        $sq29 = "UPDATE `" . $finalmajor . "` SET sortIndex = 12 WHERE substr(source,LOCATE('_',source)+1,LOCATE('_',source)+2) = 'S6'";

        mysql_query($sq18);
        mysql_query($sq19);
        mysql_query($sq20);
        mysql_query($sq21);
        mysql_query($sq22);
        mysql_query($sq23);
        mysql_query($sq24);
        mysql_query($sq25);
        mysql_query($sq26);
        mysql_query($sq27);
        mysql_query($sq28);
        mysql_query($sq29);

        $sql6 = "ALTER TABLE `" . $finalmajor . "` ORDER BY sortIndex, source";
        mysql_query($sql6);
        mysql_query("CREATE TABLE `del_temp` as (SELECT sortIndex as sortIndex FROM `".$finalmajor."` WHERE substr(source,1,LOCATE('_',source)-1) IN ('".$m1."', 'NE', 'OTHER') AND substr(target,1,LOCATE('_',target)-1) = 'GRAD' ORDER by sortIndex LIMIT 1)");       
        mysql_query("DELETE FROM `".$finalmajor."` WHERE sortIndex <= (select sortIndex from `del_temp`) AND substr(source,1,LOCATE('_',source)-1) = 'GRAD' AND substr(target,1,LOCATE('_',target)-1) = 'GRAD'");
        mysql_query("DROP TABLE `del_temp`");
    }
}

$q = "";
$m = "";
$gender = "";
$ethn = "";
$state = "";
//Fetch the Cohort/Major
if (isset($_POST['cohort']) == TRUE) {
    $q = $_POST['cohort'];
}
if (isset($_POST['major']) == TRUE) {
    $m = $_POST['major'];
}
if (isset($_POST['gender']) == TRUE) {
    $gender = $_POST['gender'];
}
if (isset($_POST['ethn']) == TRUE) {
    $ethn = $_POST['ethn'];
}
if (isset($_POST['state']) == TRUE) {
    $state = $_POST['state'];
}


if (($gender !== "") AND ( $ethn !== "") AND ( $state !== "")) {
    $where = "where SEXENT = '" . $gender . "' and race_ethn_desc_IPEDS = '" . $ethn . "' and tuition_IO = '" . $state . "'";
    $coll = $q . "_college" . "_" . $gender . "_" . $ethn . "_" . $state;
    $all_coll = "_college" . "_" . $gender . "_" . $ethn . "_" . $state;
    $major = $q . '_Major' . "_" . $gender . "_" . $ethn . "_" . $state;
    $major_all = '_Major' . "_" . $gender . "_" . $ethn . "_" . $state;
    $fin_maj = $q . '_' . $m . "_" . $gender . "_" . $ethn . "_" . $state;
    $all_maj = "_" . $m . "_" . $gender . "_" . $ethn . "_" . $state;
} else if (($gender !== "") AND ( $ethn !== "") AND ( $state === "")) {
    $where = "where SEXENT = '" . $gender . "' and race_ethn_desc_IPEDS = '" . $ethn . "'";
    $coll = $q . "_college" . "_" . $gender . "_" . $ethn;
    $all_coll = "_college" . "_" . $gender . "_" . $ethn;
    $major = $q . '_Major' . "_" . $gender . "_" . $ethn;
    $major_all = '_Major' . "_" . $gender . "_" . $ethn;
    $fin_maj = $q . '_' . $m . "_" . $gender . "_" . $ethn;
    $all_maj = "_" . $m . "_" . $gender . "_" . $ethn;
} else if (($gender !== "") AND ( $state !== "") AND ( $ethn === "")) {
    $where = "where SEXENT = '" . $gender . "' and tuition_IO = '" . $state . "'";
    $coll = $q . "_college" . "_" . $gender . "_" . $state;
    $all_coll = "_college" . "_" . $gender . "_" . $state;
    $major = $q . "_Major" . "_" . $gender . "_" . $state;
    $major_all = "_Major" . "_" . $gender . "_" . $state;
    $fin_maj = $q . '_' . $m . "_" . $gender . "_" . $state;
    $all_maj = "_" . $m . "_" . $gender . "_" . $state;
} else if (($gender === "") AND ( $ethn !== "" ) AND ( $state !== "" )) {
    $where = "where race_ethn_desc_IPEDS = '" . $ethn . "' and tuition_IO = '" . $state . "'";
    $coll = $q . "_college" . "_" . $state . "_" . $ethn;
    $all_coll = "_college" . "_" . $state . "_" . $ethn;
    $major = $q . "_Major" . "_" . $state . "_" . $ethn;
    $major_all = "_Major" . "_" . $state . "_" . $ethn;
    $fin_maj = $q . '_' . $m . "_" . $state . "_" . $ethn;
    $all_maj = "_" . $m . "_" . $state . "_" . $ethn;
} else if (($gender !== "" ) AND ( $ethn === "") AND ( $state === "" )) {
    $where = "where SEXENT = '" . $gender . "'";
    $coll = $q . "_college" . "_" . $gender;
    $all_coll = "_college" . "_" . $gender;
    $major = $q . "_Major" . "_" . $gender;
    $major_all = "_Major" . "_" . $gender;
    $fin_maj = $q . '_' . $m . "_" . $gender;
    $all_maj = "_" . $m . "_" . $gender;
} else if (($gender === "") AND ( $ethn !== "") AND ( $state === "")) {
    $where = "where race_ethn_desc_IPEDS = '" . $ethn . "'";
    $coll = $q . "_college" . "_" . $ethn;
    $all_coll = "_college" . "_" . $ethn;
    $major = $q . "_Major" . "_" . $ethn;
    $fin_maj = $q . '_' . $m . "_" . $ethn;
    $all_maj = "_" . $m . "_" . $ethn;
} else if (($gender === "") AND ( $ethn === "") AND ( $state !== "")) {
    $where = "where tuition_IO = '" . $state . "'";
    $coll = $q . "_college" . "_" . $state;
    $all_coll = "_college" . "_" . $state;
    $major = $q . "_Major" . "_" . $state;
    $fin_maj = $q . '_' . $m . "_" . $state;
    $all_maj = '_' . $m . "_" . $state;
} elseif (($gender === "") AND ( $ethn === "" ) AND ( $state === "")) {
    $where = "";
    $coll = $q . "_college";
    $all_coll = "_college";
    $major = $q . "_Major";
    $fin_maj = $q . '_' . $m;
    $all_maj = '_' . $m;
}

//if cohort is selected 
//$chktable = "SELECT count(*) FROM information_schema WHERE TABLE_NAME = '".$coll."'";

$chktable = "SHOW TABLES LIKE '" . $coll . "'";
$result = mysql_query($chktable);
if (mysql_num_rows($result) == 0) {

    $master = $q . "_master";
//Create Cohort_College eg 2001_College
    createTable($coll, $master, $where);
}
//If only Cohort is selected and Major = ALL, return college view
if (($m == 'ALL') && ( $q !== 'ALL' )) {
    $query = mysql_query("SELECT source, target, value FROM `" . $coll . "`");
} else if (($q == 'ALL') && ($m == 'ALL' )) {
//$all_coll = "ALL_college";
    $all_coll_f = "ALL" . $all_coll;

    $chktable = "SHOW TABLES LIKE '" . $all_coll_f . "'";
    $result = mysql_query($chktable);
    if (mysql_num_rows($result) == 0) {

        $coll_tab = "2001" . $all_coll;
        $chktable = "SHOW TABLES LIKE '" . $coll_tab . "'";
        $result = mysql_query($chktable);
        if (mysql_num_rows($result) !== 0) {
            $all_1 = "CREATE TABLE `" . $all_coll_f . "` AS (SELECT * FROM `" . $coll_tab . "`)";
        } else {
            $master = '2001_master';
            createTable($coll_tab, $master, $where);
            $all_1 = "CREATE TABLE `" . $all_coll_f . "` AS (SELECT * FROM `" . $coll_tab . "`)";
        }

        $coll_tab = "2002" . $all_coll;
        $chktable = "SHOW TABLES LIKE '" . $coll_tab . "'";
        $result = mysql_query($chktable);
        if (mysql_num_rows($result) !== 0) {
            $all_2 = "INSERT INTO `" . $all_coll_f . "` (SELECT * FROM `" . $coll_tab . "`)";
        } else {
            $master = '2002_master';
            createTable($coll_tab, $master, $where);
            $all_2 = "INSERT INTO `" . $all_coll_f . "` (SELECT * FROM `" . $coll_tab . "`)";
        }

        $coll_tab = "2003" . $all_coll;
        $chktable = "SHOW TABLES LIKE '" . $coll_tab . "'";
        $result = mysql_query($chktable);
        if (mysql_num_rows($result) !== 0) {
            $all_3 = "INSERT INTO `" . $all_coll_f . "` (SELECT * FROM `" . $coll_tab . "`)";
        } else {
            $master = '2003_master';
            createTable($coll_tab, $master, $where);
            $all_3 = "INSERT INTO `" . $all_coll_f . "` (SELECT * FROM `" . $coll_tab . "`)";
        }

        $coll_tab = "2004" . $all_coll;
        $chktable = "SHOW TABLES LIKE '" . $coll_tab . "'";
        $result = mysql_query($chktable);
        if (mysql_num_rows($result) !== 0) {
            $all_4 = "INSERT INTO `" . $all_coll_f . "` (SELECT * FROM `" . $coll_tab . "`)";
        } else {
            $master = '2004_master';
            createTable($coll_tab, $master, $where);
            $all_4 = "INSERT INTO `" . $all_coll_f . "` (SELECT * FROM `" . $coll_tab . "`)";
        }

        $coll_tab = "2005" . $all_coll;
        $chktable = "SHOW TABLES LIKE '" . $coll_tab . "'";
        $result = mysql_query($chktable);
        if (mysql_num_rows($result) !== 0) {
            $all_5 = "INSERT INTO `" . $all_coll_f . "` (SELECT * FROM `" . $coll_tab . "`)";
        } else {
            $master = '2005_master';
            createTable($coll_tab, $master, $where);
            $all_5 = "INSERT INTO `" . $all_coll_f . "` (SELECT * FROM `" . $coll_tab . "`)";
        }
        mysql_query($all_1);
        mysql_query($all_2);
        mysql_query($all_3);
        mysql_query($all_4);
        mysql_query($all_5);
    }
    $query = mysql_query("SELECT * FROM `" . $all_coll_f . "`");
} else if ($m !== 'ALL') {
    if ($q != 'ALL') {
        $master = $q . "_master";
        createMajTab($major, $fin_maj, $master, $where, $m);

        $sql4 = "SELECT source, target, value FROM `" . $fin_maj . "`";
//Return Major view major not equal to ALL
        $query = mysql_query($sql4);
    } else if ($q == 'ALL') {
        $all_major = "ALL" . $all_maj;

        $chktable = "SHOW TABLES LIKE '" . $all_major . "'";
        $result = mysql_query($chktable);
        if (mysql_num_rows($result) == 0) {

            $tab = "2001" . $all_maj;
            $chktable = "SHOW TABLES LIKE '" . $tab . "'";
            $result = mysql_query($chktable);
            if (mysql_num_rows($result) !== 0) {
                $all_m1 = "CREATE TABLE `" . $all_major . "` AS (SELECT * FROM `" . $tab . "`)";
            } else {
                $major = "2001" . $major_all;
                $master = "2001_master";
                createMajTab($major, $tab, $master, $where, $m);
                $all_m1 = "CREATE TABLE `" . $all_major . "` AS (SELECT * FROM `" . $tab . "`)";
            }

            $tab = "2002" . $all_maj;
            $chktable = "SHOW TABLES LIKE '" . $tab . "'";
            $result = mysql_query($chktable);
            if (mysql_num_rows($result) !== 0) {
                $all_m2 = "INSERT INTO `" . $all_major . "` (SELECT * FROM `" . $tab . "`)";
            } else {
                $major = "2002" . $major_all;
                $master = "2002_master";
                createMajTab($major, $tab, $master, $where, $m);
                $all_m2 = "INSERT INTO `" . $all_major . "` (SELECT * FROM `" . $tab . "`)";
            }

            $tab = "2003" . $all_maj;
            $chktable = "SHOW TABLES LIKE '" . $tab . "'";
            $result = mysql_query($chktable);
            if (mysql_num_rows($result) !== 0) {
                $all_m3 = "INSERT INTO `" . $all_major . "` (SELECT * FROM `" . $tab . "`)";
            } else {
                $major = "2003" . $major_all;
                $master = "2003_master";
                createMajTab($major, $tab, $master, $where, $m);
                $all_m3 = "INSERT INTO `" . $all_major . "` (SELECT * FROM `" . $tab . "`)";
            }

            $tab = "2004" . $all_maj;
            $chktable = "SHOW TABLES LIKE '" . $tab . "'";
            $result = mysql_query($chktable);
            if (mysql_num_rows($result) !== 0) {
                $all_m4 = "INSERT INTO `" . $all_major . "` (SELECT * FROM `" . $tab . "`)";
            } else {
                $major = "2004" . $major_all;
                $master = "2004_master";
                createMajTab($major, $tab, $master, $where, $m);
                $all_m4 = "INSERT INTO `" . $all_major . "` (SELECT * FROM `" . $tab . "`)";
            }

            $tab = "2005" . $all_maj;
            $chktable = "SHOW TABLES LIKE '" . $tab . "'";
            $result = mysql_query($chktable);
            if (mysql_num_rows($result) !== 0) {
                $all_m5 = "INSERT INTO `" . $all_major . "` (SELECT * FROM `" . $tab . "`)";
            } else {
                $major = "2005" . $major_all;
                $master = "2005_master";
                createMajTab($major, $tab, $master, $where, $m);
                $all_m5 = "INSERT INTO `" . $all_major . "` (SELECT * FROM `" . $tab . "`)";
            }

            mysql_query($all_m1);
            mysql_query($all_m2);
            mysql_query($all_m3);
            mysql_query($all_m4);
            mysql_query($all_m5);
        }
        $query = mysql_query("SELECT * FROM `" . $all_major . "`");
    }
}

if (!$query) {
    echo mysql_error();
    die;
}

$data = array();

for ($x = 0; $x < mysql_num_rows($query); $x++) {
    $data[] = mysql_fetch_assoc($query);
}

echo json_encode($data);

mysql_close($server);
?>