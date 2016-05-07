<?php error_reporting(7);
/*
 * 连接数据库
 * @return resource
 */
function connect(){
    $link=mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("连接数据库失败Error:".mysql_errno().":".mysql_error());
    mysql_set_charset(DB_CHARSET);
    mysql_select_db(DB_DBNAME) or die("指定数据库打开失败");
    return $link;
    
}

/**
 * 插入一条记录
 * @param string $table
 * @param array $array
 * @return number
 */
function insert($table,$array){
    $keys=join(",", array_keys($array));
    $vals="'".join("','", array_values($array))."'";
    $sql="insert {$table}($keys) values({$vals})";
    // print_r($sql);
    mysql_query($sql);
    return mysql_insert_id();
}


/**
 * 更新一条记录
 * @param string $table
 * @param array $array
 * @param string $where
 * @return number
 */
function update($table,$array,$where=NULL){
    
    foreach ($array as $key=>$val) {
        if ($str == null) {
            $sep="";
        }else{
            $sep=",";
        }
        $str.=$sep.$key."='".$val."'";
        
    }
    $sql="update {$table} set {$str}".($where==null?null:" where ".$where);
    // echo $sql;
    mysql_query($sql);
    return mysql_affected_rows();
}

/**
 * 删除一条记录
 * @param string $table
 * @param string $where
 * @return number
 */
function delete($table,$where=NULL){
    $where=$where==null?null:" where ".$where;
    $sql="delete from {$table}{$where}";
    mysql_query($sql);
    return mysql_affected_rows();
}

/**
 * 得到指定的一条记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchOne($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
//     print_r($result);
    $row=mysql_fetch_array($result,$result_type);
    
    return $row;
}

/**
 * 得到所有记录
 * @param string $sql
 * @param string $result_type
 * @return multitype:
 */
function fetchAll($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    if ($result === false) {
        // var_dump(mysql_error());
    } else {
        while (@$row = mysql_fetch_array($result, $result_type)) {
            $rows[] = $row;
        }
    }
    return $rows;
}

/**
 * 得到结果集中的记录条数
 * @param unknown $sql
 * @return number
 */
function getResultNumber($sql){
    
    $result=mysql_query($sql);
//     print_r($sql);
    if($result === false) {
        //var_dump(mysql_error());
    }
    else {
        $row = mysql_num_rows($result);
    }
    
    return $row;
}