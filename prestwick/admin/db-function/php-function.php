<?php
    require("db-connection.php");

	function domain_url(){
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on'){
			$url="https";
		}
		else{
			$url="http";
		}
		$url.="://".$_SERVER['HTTP_HOST']."/JMCKDS/prestwick/";
		return $url;  
    }	 
    // mysqli real escape string
    function get_safe_value($conn, $postVal){
        if($postVal != ""){
            $postVal = trim($postVal);
            return mysqli_real_escape_string($conn, $postVal);
        }
    }

    /*######################## Common Insert Fun. ###################################*/	
    function common_insert($conn, $table, $cols)
    {
        //$cols=array("filed1"=>'one',"filed2"=>'two',"filed3"=>'three');
        $fields=array_keys($cols);
        //print_r($fields);
        $insert="INSERT INTO ".$table."(`".implode("`,`",$fields)."`) VALUES('".implode("','",$cols)."')";
        $query_insert=mysqli_query($conn, $insert);
        return $query_insert;
    }

    /*######################## Common Select Tabel Select Fun. ###################################*/	
    function commonSelect_table($conn, $table,$cols,$where_clause=''){
        $whereSQL="";
        $field_array=explode("^",$cols);
        $comma_seperated_fields=implode(",",$field_array);
        //print_r($data);
        if(!empty($where_clause)){
            if(substr(strtoupper(trim($where_clause)),0,5)!='WHERE'){
                // $whereSQL=" WHERE ".$where_clause;
                $whereSQL=" ".$where_clause;
            }
            else{
                $whereSQL=" ".$where_clause;
            }
        }		
            $sql = "SELECT ".$comma_seperated_fields." FROM ".$table.$whereSQL;		
            $query_select=mysqli_query($conn,  $sql); 
            return $query_select;
    }

    /*################## Common Update Tabel Function ######################*/
    function common_update($conn, $table, $cols, $where_clause=''){
        //$cols=array("page_name"=>'index2');
        $whereSQL='';
        /*$fields=explode('^', $cols);
        echo $comma_seperated_fields=implode("`,`",$fields);*/
        if(!empty($where_clause)){
            if(substr(strtoupper(trim($where_clause)),0,5)!="WHERE"){
                $whereSQL=" WHERE ".$where_clause;
            }
            else{
                $whereSQL=" ".$where_clause;
            }
        }
        $update="UPDATE ".$table." set ";
        $sets=array();
        foreach($cols as $columns => $values){
            $sets[]="`".$columns."`='".$values."'";			
        }
        //print_r($sets[0]);
        $update.=implode(', ', $sets);
        $update.=$whereSQL;
        $query_update=mysqli_query($conn,  $update);
        return $query_update;
    }
    /*-------------------- Common delet function -----------------*/
    function commnon_del($conn, $table,$where_clause=''){
        $whereSQL='';
        if($where_clause!=''){
            if(substr(strtoupper(trim($where_clause)),0,5)!='WHERE'){
                $whereSQL=" WHERE ".$where_clause;
            }
            else{
                $whereSQL=" ".$where_clause;
            }
        }
        $del="DELETE FROM ".$table.$whereSQL;
        $del_query=mysqli_query($conn, $del);
        return $del_query;
    }

    $root = domain_url();

?>