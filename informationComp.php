	<?php
			$query='SELECT quote_id,quote,source,favorite FROM quotes ORDER BY  quote_id  DESC';
								if($r=mysql_query($query))
								{  
									$sql=mysql_query("select * from quotes" ); 
									//echo "select * from quotes limit " . ($i-1)*2 . ",2";
									//echo $i;
	?>
									 <table id="InformationTable" >
										<tr class="tableTitle" >                                        <th width="10%" >序号</th> 
											<th width="60%" >信息</th> 
											<th width="20%">来源</th>
										</tr>
											
	<?php
											while($roww=mysql_fetch_assoc($sql))
											{ 
												 $row=mysql_fetch_array($r); 
											//while($row=mysql_fetch_assoc($sql)){ ?> 
													 <tr>
														<td width="10%" ><?php echo $row['quote_id'];?></td> 
									   					<td width="75%">
														
<style>
.zxx_text_overflow{width:28em; height:1.3em; overflow:hidden; zoom:1;}
.zxx_text_overflow .text_con{float:left; height:1.3em; margin-right:3em; overflow:hidden;}
.zxx_text_overflow .text_dotted{width:3em; height:1.31em; float:right; margin-top:-1.3em;}
</style>									
<div class="zxx_text_overflow" >
	<div class="zxx_con overflowellipsis" style="text-align:left; width:100%" >
		<a class="ap" href="./onlyRead_quote.php?id=<?php echo $row['quote_id']?>"><?php echo $row['quote'];?></a>
	</div>
	<div class="zxx_dotted" >…</div>
</div>														
														
														
														</td> 
														<td width="15%" class="overflowellipsis" ><?php echo $row['source'];?></td> 
														
													  <!--   						
														if($row['favorite']==1)
														{
															print'<strong>favorite</strong>';
														} -->
													 </tr> 
												 
																		 
	<?php                                  }
	?>
									   </table>
	
					
	<?php   	              }
							  else{
								echo 'found none ';
							  }
	?>