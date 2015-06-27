<?php
class Page {  
    public $total;  //全部条数，从数据库取出  
    public $prePage=2; //每页的条数  
    protected $curr= 1; //默认当前页码  
    public function __construct($total,$prePage='') 
	{  
        $this->total = $total; //把总条目信息放在total属性  
          if ($prePage > 0) 
		  {  
            $this->prePage = $prePage;   //把每页数量放在perPage属性  
          }  
  
        //计算当前页码  
		  if (isset($_GET['page']) && ($_GET['page'] + 0) > 0) 
		  {  
			$this->curr = $_GET['page'] + 0;  
		  }  
	}//构造函数
  
    //主体函数  
    public function showPage() {  
        if ($this->total <=0) 
		{  
            return ''; //如果总条目<=0 直接返回空字符串  
        }  
        $cnt = ceil($this->total / $this->prePage); //算总页数，进一取整  
        //echo "alert(".$this->total.")";
        //echo "alert(".$cnt.")";
        //根据当前页，算上一页，下一页  
        //最终生成的URL里边必然有page=N  
        $url = $_SERVER['REQUEST_URI'];  
        $parse = parse_url($url); //把URL分析结果放在数组里  
        //print_r($parse);  
        //保证参数里边有page  
		if (!isset($parse['query'])) 
		{  
            $parse['query'] = 'page=' .$this->curr;  
        }  
        //把query字符串分析成数组，再次确保有page选项  
        parse_str($parse['query'],$parms);  
        if (!array_key_exists('page', $parms)) 
		{  
            $parms['page'] = $this->curr;  
        }  
  
        //上边四种情况都测试一遍，page参数都能生成  
        //print_r($parms);  
  
        //判断除了page之外，还有没有其他参数  
  
        if (count($parms) == 1) 
		{  
            $url = $parse['path'] . '?';  
        } 
	    else 
		{  
            unset($parms['page']);  
            $url = $parse['path'] . '?' . http_build_query($parms) . '&';  
        }  
  
        //echo $url  
        $prev = $this->curr - 1;  
        $next = $this->curr + 1;  
  
        //首页  
        $indexLink = '<a class="pageNum" href="' . $url .'page=' . 1 . '" style="line-height:1;">首页&nbsp;&nbsp;</a>';  
		
        
        //上一页  
        if ($prev < 1) 
		{  
            $prevLink = '';  
        }
	    else
	    {  
            $prevLink = '<a class="pageNum" href="' . $url .'page=' . $prev . '" style="line-height:1;">上一页&nbsp;&nbsp;</a>';  
        }  
  
        //下一页  
        if ($next > $cnt) 
		{  
            $nextLink = '';  
        }
	    else 
		{  
            $nextLink = '<a class="pageNum" href="' . $url .'page=' . $next . '" style="line-height:1;">&nbsp;&nbsp;下一页&nbsp;&nbsp;</a>';  
        }  
        //尾页  
        $lastLink = '<a class="pageNum" href="' . $url .'page=' . $cnt . '" style="line-height:1;">&nbsp;&nbsp;尾页&nbsp;&nbsp;</a>';  
  
        //echo $indexLink.'  '.$prevLink.'  '.$nextLink .'  '.$lastLink;  
        //上一页，1 2 3 4 5 下一页  
  
        $start = $this->curr - (5-1)/2; //计算左侧开始的页码  
        $end = $this->curr + (5-1)/2;    //计算右侧开始的页码   5控制输出的的个数 
          
        //如果左侧的页面，已经小于1，则把小于1 的部分补到右侧  
        if ($start < 1) 
		{  
            $end += (1 - $start);  
            $start = 1; //修改start = 1  
          
            if ($end > $cnt) 
			{  
                $end  = $cnt;  
            }  
        }  
  
        //把右侧超出的部分，补到左边  
        if ($end > $cnt) 
		{  
            $start -= ($end - $cnt);  
            $end = $cnt;  
  
            if ($start < 1) 
			{  
                $start = 1;  
            }  
			
        }  

        //循环出页码数  
        $pageStr = '';  
     //判断页数是否合理，且是否处于当前页
	    for ($i=$start; $i <= $end ;$i++)
	    {   
            if ($i== $this->curr)
			 {  
                $pageStr .= $i;  
               // $pageStr .= '<a class="pageOn" href="' . $url . 'page=' . $i . '">' . $i . '</a>'  
				continue;					
	         }  
          $pageStr .= '<a class="pageNum" style="line-height:1;" href="' . $url . 'page=' . $i . '">' .'&nbsp;&nbsp;'. $i . '&nbsp;&nbsp;</a>';
        }

?>




<?php

			$query='SELECT quote_id,quote,source,favorite FROM quotes ORDER BY  quote_id  DESC';

		
		
		
		
		
		
				if($r=mysql_query($query))
			    {  	

			   // echo "处于第".$this->curr."祝输出顺利</br>";
               // echo $query." limit " . ($this->curr-1)*$this->prePage . ",".$this->curr*$this->prePage ."";
				$sql=mysql_query($query." limit " . ($this->curr-1)*$this->prePage . ",".$this->curr*$this->prePage ."");
				//echo "</br>".($this->curr-1)*$this->prePage."and".$this->curr*$this->prePage."</br>";
				//echo $sql;
?>
				 
<?php
						$count=mysql_num_rows($sql);
				/*		echo "****".$count."****";
						
						$roww=mysql_fetch_assoc($sql)
						echo 
						echo mysql_fetch_assoc($sql);
						echo mysql_fetch_assoc($sql);
						echo "sssssssssssssssssss";*/
						//echo "******************";
						//echo $count;
						//echo "******************";
						//for($i=0;$i<$count;$i++)
						for($i=0;$i<$this->prePage;$i++)//结果集中取得一行作为关联数组
						{ 
							//echo "HI!!!\n";
							$row = mysql_fetch_assoc($sql);
						    //$row=mysql_fetch_array($tmp); //函数从结果集中取得一行作为关联数组，或数字数组，或二者兼有
						//while($row=mysql_fetch_assoc($sql)){ 
?>



					<tr> 
									<td width="10%" ><?php echo $row['quote_id'];?></td> 
									<td width="75%">
																		
<div class="zxx_text_overflow" >
	<div class="zxx_con overflowellipsis" style="text-align:left;width:100%;">
		<a href="./onlyRead_quote.php?id=<?php echo $row['quote_id']?>"><?php echo $row['quote'];?></a>
	</div>
	<div class="zxx_dotted" >…</div>
</div>
									
									
									</td> 
									<td width="15%" class="overflowellipsis"><?php echo $row['source'];?></td> 
					</tr> 
<?php                   }
?>

<?php

                 }
		
		
		
		
		
		
		
		
		
		
?>
</table> 

<?php
        return $indexLink.$prevLink.$pageStr.$nextLink.$lastLink;  
   }//showpage  
}//class
?>