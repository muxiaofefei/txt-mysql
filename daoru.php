<?php 
//禁用错误报告
error_reporting(0);

require_once('conn.php');

function print_r_br($array){
//换行输出数组内容
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password); //连接数据库
mysql_query("set names 'utf8'"); //数据库输出编码
mysql_select_db($mysql_database); //打开数据库

$file = fopen("qingcheng.txt", "r"); //打开文档

//将txt文档内容逐行输出
while(!feof($file))   
{   
    $arr = split(' ' , fgets($file)); //将txt文档内容按“ ”空格进行拆分成一个数组
    $n = count($arr); //统计数组的元素
    
    //判断数组第一个元素是否是数字型 若不是 则说明 上条评论未结束
    if(!is_numeric($arr[0])){

        print_r_br($arr);//打印异常评论
        
        //循环数组拼接内容
        foreach($arr as $key){
            $xiacont = $xiacont." ".$key;
        }

        //获取数据库最大的id值
        $get_table_status_sql = "SHOW TABLE STATUS LIKE 'qingcheng'";
        $result = mysql_query($get_table_status_sql);
        $table_status = mysql_fetch_array($result);
        // echo $table_status['Auto_increment']; // 这个就是自增值
        $lastid = $table_status['Auto_increment'] - 1; //获取数据表当前最大id值

        $sql1 ="select * from qingcheng where Id = $lastid"; //SQL语句 查询指定id内容
        $result = mysql_query($sql1,$conn); //查询
        $row = mysql_fetch_array($result); //返回查询结果

        $qiancontent = $row['content']; //获取上一条插入的评论内容
        $newcontent = $qiancontent . $xiacont; //将异常评论数据进行拼接
        
        $xiacont = ""; //清空前一条记录

        echo $lastid;
        echo "------";
        echo $newcontent;

        //更新记录集
        $sql2 = "update qingcheng set content = '$newcontent' where Id = $lastid";
        mysql_query($sql2,$conn);
    }
    else
    {   
        print_r_br($arr);//打印正常评论

        //判断评论中有没有空格 如果存在则将评论进行拼接
        if($n>6)
        {
            for($i=6;$i<$n;$i++)
            {
                $arr[5] = $arr[5]." ".$arr[$i];
            }
        }

        echo $arr[5];
        echo "<br>";
        echo "<hr>";
        //插入正常评论
        $sql = "insert into qingcheng (userid,username,userico,pubtime,zanshu,content) values ('$arr[0]','$arr[1]','$arr[2]','$arr[3]','$arr[4]','$arr[5]')";
        mysql_query($sql);
    }
} 

mysql_close(); //关闭MySQL连接

fclose($file); //关闭文档




echo "*********************************************************";
 ?>