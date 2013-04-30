

					<!-- BEGIN inner content -->
					<div class="content np" style="width:99%;display:inline-block">
						
						<div class="al search_02">
						<form action="" method="GET">
                        <h2>Application</h2>
							<div class="holder_2">
								<label>Search</label>
								<input type="text" value="<?php echo $get_name;?>" class="input_type_2" name="name"  />
							</div>
							<div class="holder">
								<label>Period :</label>
								<input type="text" value="<?php echo $defaults['from_date'];?>" class="input_type_3" name="date_from" id="period_from" />
								
							</div>
							<div class="holder">
								<span class="mr10">&ndash;</span>
								<input type="text" value="<?php echo $defaults['to_date'];?>" class="input_type_3" name="date_to" id="period_to" />
								
								
							</div>
							<br /> <br />
							<div class="holder_2">
								<label>Position</label>
								<select class="select_type_1 nm np" id="select1" name="position">
                                <option value="all">--select--</option>
										<?php Admin::get_position_menu(); ?>
								</select>
								<!--<a href="javascript:void(0);" class="btn_small btn_type_2s ml10 search_btn"><span>Search</span></a>-->
                                <input type="submit" value="Submit" />
							</div>
							
							
						</form>
					</div>
					<div class="show_rows ar">
						
							<label>Show Rows</label>
                            <!--
							<select>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
							</select>-->
                            <?php
                               $this->app->show_rows(5,array(5,10,20,30));
                            ?>
						
					</div>
                    <!--
					<ul class="sort_view nl np" style="width:auto;">
						<li class="active all">
						<a href="#">All (#)</a>
						</li>
						<li class="">
						<span class="statTab" style="margin-right:2px;background:#FDFF72;"></span>
						<a href="#">Developer(#)</a>
						</li>
						<li class="">
						<span class="statTab" style="margin-right:2px;background:#DDF5D5"></span>
						<a href="#">Designer (#)</a>
						</li>
						<li class="">
						<span class="statTab" style="margin-right:2px;background:#CB8AFF"></span>
						<a href="#"> (#)</a>
						</li>
						<li class="">
						<span class="statTab" style="margin-right:2px;background:#C5C5C5"></span>
						<a href="#">(#)</a>
						</li>
					</ul>
                    -->
					
					<table id="applicant_list" border="0" cellspacing="0" cellpadding="0" class="table_02" >
						<colgroup>
							<col width="60" />
							<col width="80" />
							<col />
							<col width="250" />
							<col width="150" />
							<col width="250" />
						</colgroup>
						<thead>
							<tr>
								<th><input type="checkbox" class="check_all" id="0" /></th>
								<th>No.</th>
								<th><a href="#" >Applicant's Name</a></th>
								<th><a href="#" >Position</a></th>
								<th><a href="#" >Referral</a></th>
								<th class="last">Date Applied</th>
							</tr>
						</thead>
						<tbody>
							<?php echo $db_table_rows;?>
						</tbody>
					</table>
                    <p>
                    <a href="javascript:void(0)" class="fl btn_small btn_type_3s delete_btn"><span>Delete</span></a>
                    
                    </p>
                    <div id="pager"><?php echo $get_pagination;?></div>                    
					</div>
					<!-- END inner content -->
			