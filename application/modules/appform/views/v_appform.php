<div id="wrap" class="nm">
		<div class="wrap">
			<!-- BEGIN header -->
			<div id="header" class="nm np">
				<h1 id="logo" class="fl fnt"><strong class="hidden">Simplex Internet</strong></h1>
                <a href="#" id="admin-page-link" class="fr btn_adminpage">Admin Page</a>
			</div>
			<!-- END header -->
			<!-- BEGIN content -->
            
			<div id="content" class="np ac">
				<!-- BEGIN inner content -->
				<div class="content2">
                    <h2 class="title">Employment Application Form</h2>
                    <p class="np info">Complete the entire application with valid and accurate information pertaining to the required information needed.</p>
                    <!--personal data-->
                    <form method="POST" name="app_form" id="app_form"> <!--form 1-->
                    <div  class="ar" style="width:100%;display:inline-block">
                        <label>Application Type</label>
                        <select name="aa_type" >
                        <option value="" >-- select --</option>
                            <option>Walk in</option>
                            <option>Jobstreet</option>
                            <option>E-mail</option>
                            <option>Referral</option>
                        </select>
                    </div>
                    
                    
                    
                    <div class="al employee_from_wrap" id="personal">
                        <strong class="content_title">Personal Data</strong>

                        <table class="al employee_form" >
                            <colgroup>
                                <col width="235px" />
                                <col width="235px" />
                                <col width="235px" />
                                <col width="235px" />
                            </colgroup>
                            <tr>
                                <td>
                                    <label class="label_name">Position</label>
                                    <div class="app_content">
                                        <select name="aa_ap_idx" class="select_type_4 nm">
                                            <option value="" >-- select --</option>
                                            <?php Appform::get_position_menu(); ?>
                                        </select>
                                    </div>	
                                </td>
                                <td colspan="2">
                                    <label class="label_name">Availability</label>
                                    <div class="app_content">
                                        <input name="aa_availability" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">Expected Salary</label>
                                    <div class="app_content">
                                        <select name="aa_exp_salary" class="select_type_4 nm">
                                            <option value="" >-- select --</option>
                                            <option>10,000 - 15,000</option>
                                            <option>15,000 - 20,000</option>
                                            <option>20,000 - 30,000</option>
                                            <option>above 30,000</option>
                                        </select>
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="label_name">Last Name</label><span class="required">&ast;</span>
                                    <div class="app_content">
                                        <input name="aa_lname" type="text" class="input_type_5 nm" validate="required|email" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">First Name</label><span class="required">&ast;</span>
                                    <div class="app_content">
                                        <input name="aa_fname" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">Middle Name</label><span class="required">&ast;</span>
                                    <div class="app_content">
                                        <input name="aa_mname" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">Nickname</label>
                                    <div class="app_content">
                                        <input name="aa_nname" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <label class="label_name">Address</label><span class="required">&ast;</span>
                                    <div class="app_content">
                                        <input name="aa_address" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="label_name">Home Number</label>
                                    <div class="app_content">
                                        <input name="aa_home_num" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">Mobile Number</label><span class="required">&ast;</span>
                                    <div class="aa_mob_num">
                                        <input name="aa_mob_num" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">E-mail Address 1</label><span class="required">&ast;</span>
                                    <div class="app_content">
                                        <input name="aa_email1" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">E-mail Address 2</label>
                                    <div class="app_content">
                                        <input name="aa_email2" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="label_name">Gender</label>
                                    <div class="app_content ac employee_opt">
                                        <ul class="opt_radio nl np mt10_eapp">
                                            <li><label for="option1">Male</label><input type="radio" class="radio_type_1 np" value="m" name="aa_gender" checked="checked" /></li>
                                            <li><label for="option2">Female</label><input type="radio" class="radio_type_1 np" value="f" name="aa_gender"  /></li>
                                        </ul>
                                    </div>	
                                </td>
                                <td colspan="2">
                                    <label class="label_name">Marital Status</label>
                                    <div class="app_content ac employee_opt">
                                        <ul class="opt_radio nl np mt10_eapp">
                                            <li><label for="option1a">Single</label><input type="radio" value="1" class="radio_type_1 np" name="aa_marital_stat"  checked="checked" /></li>
                                            <li><label for="option2a">Married</label><input type="radio" value="2" class="radio_type_1 np" name="aa_marital_stat"  /></li>
                                            <li><label for="option3a">Widow</label><input type="radio" value="3" class="radio_type_1 np" name="aa_marital_stat"  /></li>
                                            <li><label for="option4a">Separated</label><input type="radio" value="4" class="radio_type_1 np" name="aa_marital_stat"  /></li>
                                        </ul>
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">Date of Birth</label><span class="required">&ast;</span>
                                    <div class="app_content ac employee_opt">
                                        <p class=" np" style="margin:2px 0 0;display:inline-block">
                                            <input name="aa_birthdate" id="aa_birthdate" type="text" value="" class="input_type_3 fl nm" style="height:12px;margin-right:2px !important;"  />
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end personal data-->
                    
                    
                    
                    <!--educational data-->
                    <div class="al employee_from_wrap" id="educational">
                        <strong class="content_title">Educational Background</strong>
                        <table class="al employee_form">
                            <colgroup>
                                <col width="235px" />
                                <col width="235px" />
                                <col width="235px" />
                                <col width="235px" />
                            </colgroup>
                            <tr>
                                <td colspan="2">
                                    <label class="label_name">School</label><span class="required">&ast;</span>
                                    <div class="app_content">
                                        <input name="aa_sch_name" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td colspan="2">
                                    <label class="label_name">Location</label>
                                    <div class="app_content">
                                        <input name="aa_sch_loc" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="label_name">Course</label>
                                    <div class="app_content">
                                        <input name="aa_sch_course" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">Inclusive Dates</label>
                                    <div class="app_content">
                                        <input name="aa_sch_inc_date" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">Year Graduated</label>
                                    <div class="app_content">
                                        <input name="aa_sch_yr_grad" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <label class="label_name">Vocational/Technical/Associate Degree</label>
                                    <div class="app_content">
                                        <input name="aa_sch_voctec" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">Date Completed</label>
                                    <div class="app_content ac employee_opt">
                                        <p class=" np" style="margin:2px 0 0;display:inline-block">
                                            <input name="aa_sch_date_comp" id="aa_sch_date_comp" type="text" value="" class="input_type_3 fl nm" style="height:12px;margin-right:2px !important"  />
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end educational data-->
                    </form><!--end form 1-->
                    
                    
                    
                    <div class="al employee_from_wrap" id="employment">
                        <strong class="content_title">Employment Data</strong><span class="note_mess" >*Please input the 3 most current employment data.</span>
                        <a href="javascript:void(0)"  class="fr btn_small btn_type_3s add_emp_tb"><span>Add Employment</span></a>
                        
                        <!--employment table-->
                        
                        <table  class="al employee_form emp_tb" style="margin-top:10px;border-bottom:2px solid #444;padding-bottom:10px">
                            <colgroup>
                                <col width="235px" />
                                <col width="235px" />
                                <col width="235px" />
                                <col width="235px" />
                            </colgroup>
                            <tr>
                                <td colspan="2">
                                    <label class="label_name">Total Years of Experience</label>
                                    <div class="app_content ac employee_opt">
                                        <ul class="opt_radio nl np">
                                            <li><label  class="mr5">Year</label><input name="emp_yr_ex[]" type="text" class="input_type_3 np" /></li>
                                            <li><label  class="mr5">Month</label><input name="emp_mon_ex[]" type="text" class="input_type_3 np" /></li>
                                        </ul>
                                    </div>	
                                </td>
                                <td colspan="2">
                                    <label class="label_name">Employment Period</label>
                                    <div class="app_content ac employee_opt">
                                        <ul class="opt_radio nl np">
                                            <li><label class="mr5">From</label><input name="emp_from[]" id="emp_from" type="text" class="input_type_3 np" /></li>
                                            <li><label class="mr5">To</label><input name="emp_to[]" id="emp_to" type="text" class="input_type_3 np" /></li>
                                        </ul>
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <label class="label_name">Company</label>
                                    <div class="app_content ">
                                        <input name="emp_company[]" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td>
                                    <label class="label_name">Position</label>
                                    <div class="app_content">
                                        <input name="emp_pos[]" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <label class="label_name">Main Responsibility</label>
                                    <div class="app_content">
                                        <input name="emp_res[]" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="label_name">Contact Number</label>
                                    <div class="app_content">
                                        <input name="emp_con_num[]" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                                <td colspan="3">
                                    <label class="label_name">Address</label>
                                    <div class="app_content">
                                        <input name="emp_address[]" type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label class="label_name">Salary (Monthly Gross)</label>
                                    <div class="app_content ac employee_opt">
                                        <ul class="opt_radio nl np">
                                            <li><label class="mr5">Start</label><input name="emp_sal_start[]" type="text" class="input_type_3 np" /></li>
                                            <li><label class="mr5">Last</label><input name="emp_sal_last[]" type="text" class="input_type_3 np" /></li>
                                        </ul>
                                    </div>	
                                </td>
                                <td colspan="2">
                                    <label class="label_name">Reason for Leaving</label>
                                    <div class="app_content">
                                        <input name="emp_res_leaving[]"type="text" class="input_type_5 nm" />
                                    </div>	
                                </td>
                            </tr>
                        </table>
                        <!--end employment table-->
                        
                       
                        
                        
                    </div>
                    
                    <div class="al employee_from_wrap" id="skills">
                        <strong class="content_title">Skills/Knowledge</strong><span class="note_mess" >*Please input max. 8 additional skills.</span>
                        <a href="javascript:void(0)" class="fr btn_small btn_type_3s add_skills_tb"><span>Add Skills</span></a>
                        <table class="al employee_form" cellpadding="3" id="skills_tb" >
                            <colgroup>
                                <col width="150px" />
                                <col width="235px" />
                                <col width="235px" />
                                <col width="50px" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Software</th>
                                    <th>Years of Experience</th>
                                    <th>Proficiency Level</th>
                                    <th></th>
                                </tr>
                            </thead>
                            
                           <?php Appform::get_skills(); ?>
                          
                        </table>
                      
                    </div>
                    <div class="al employee_from_wrap">
                        <strong class="content_title">Professional and Technical References</strong>
                        <p class="np info">List down individuals with personal knowledge of your skills and work ability</p>
                        <table class="al employee_form" id="references">
                            <colgroup>
                                <col width="200px" />
                                <col width="175px" />
                                <col width="175px" />
                                <col width="200px" />
                                <col width="200px" />
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position/Title</th>
                                    <th>Relationship</th>
                                    <th>Company</th>
                                    <th>Contact Info</th>
                                </tr>
                            </thead>
                            <tr id="reference_1">
                                <td><input type="text" name="ref_name" class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_pos"  class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_rel"  class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_com"  class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_contact"  class="input_type_5 nm" /></td>
                            </tr>
                            <tr id="reference_2">
                                <td><input type="text" name="ref_name" class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_pos" class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_rel" class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_com" class="input_type_5 nm" /></td>
                                <td><input type="text" class="input_type_5 nm" /></td>
                            </tr>
                            <tr id="reference_3">
                                <td><input type="text" name="ref_name" class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_pos" class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_rel" class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_com" class="input_type_5 nm" /></td>
                                <td><input type="text" name="ref_contact" class="input_type_5 nm" /></td>
                            </tr>
                           
                        </table>
                    </div>
                    <p style="font-size:14px">I certify that all the answers given herein are true and complete. In the event of employment, I understand that false or misleading information provided in this application form and/or during my interview(s) may result in the termination of my employment</p>
                    <ul class="control_buttons np nl">
                        <li><a href="#" id="apply_btn" class="btn_small btn_type_3s"><span>Apply</span></a></li>
                        <li><a href="/appform" class="link_1 mt5 fl">Reset Fields</a></li>
                    </ul>
                    </div>
				</div>
				<!-- END inner content -->
			</div>
			<!-- END content -->
            
		</div>
	</div>
    
    
    <div>
   
</div>


<!--hidden div for refferal-->
<div id="refferal_dialog" style="display:none;">
<form id="referral_form">
					<p>You can refer to us friends or colleages who might have interest in applying in our company, or you can just skip this process</p>
					<div class="fl mt10 al employee_from_wrap" style="display:inline-block">
						<table class="mr10 fl al employee_form refferal_tb" border="0" >
							<colgroup>
								<col width="100px" />
								<col width="200px" />
							</colgroup>
							<tr>
								<th>Name</th>
								<td><input type="text" class="input_type_5 nm" name="refferal_name[]" /></td>
							</tr>
							<tr>
								<th>Contact #</th>
								<td><input type="text" class="input_type_5 nm" name="refferal_contact_num[]" /></td>
							</tr>
							<tr>
								<th>Email Add:</th>
								<td><input type="text" class="input_type_5 nm" name="refferal_email[]" /></td>
							</tr>
							<tr>
								<th>Position</th>
								<td><select class="select_type_4" name="refferal_position[]">
                                <option value="">--select--</option>
                                 <?php Appform::get_position_menu(); ?>
                                </select></td>
							</tr>
						</table>
						<table class="mr10 fl al employee_form refferal_tb" border="0">
							<colgroup>
								<col width="100px" />
								<col width="200px" />
							</colgroup>
							<tr>
								<th>Name</th>
								<td><input type="text" class="input_type_5 nm" name="refferal_name[]" /></td>
							</tr>
							<tr>
								<th>Contact #</th>
								<td><input type="text" class="input_type_5 nm" name="refferal_contact_num[]" /></td>
							</tr>
							<tr>
								<th>Email Add:</th>
								<td><input type="text" class="input_type_5 nm" name="refferal_email[]" /></td>
							</tr>
							<tr>
								<th>Position</th>
								<td><select class="select_type_4" name="refferal_position[]">
                                <option value="">--select--</option>
                                 <?php Appform::get_position_menu(); ?>
                                </select></td>
							</tr>
						</table>
						<table class="mr10 fl al employee_form refferal_tb" border="0">
							<colgroup>
								<col width="100px" />
								<col width="200px" />
							</colgroup>
							<tr>
								<th>Name</th>
								<td><input type="text" class="input_type_5 nm" name="refferal_name[]" /></td>
							</tr>
							<tr>
								<th>Contact #</th>
								<td><input type="text" class="input_type_5 nm" name="refferal_contact_num[]" /></td>
							</tr>
							<tr>
								<th>Email Add:</th>
								<td><input type="text" class="input_type_5 nm" name="refferal_email[]" /></td>
							</tr>
							<tr>
								<th>Position</th>
								<td><select class="select_type_4" name="refferal_position[]">
                                <option value="">--select--</option>
                                 <?php Appform::get_position_menu(); ?>
                                </select></td>
							</tr>
						</table>
						
					</div>
					<ul class="control_buttons np nl">
						<li><a href="#" class="btn_small btn_type_3s" id="submit_ref_btn"><span>Submit</span></a></li>
						<li><a href="#" class="link_1 mt5 fl" id="skip_ref_btn" >Skip</a></li>
					</ul>
                </form>
</div>