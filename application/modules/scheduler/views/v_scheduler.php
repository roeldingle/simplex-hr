<div id="side" class="nm np">

    <!--top sidebar-->
    <div class="side_box mb10">
       <p class="user_account ac">
       <span>Super admin </span>
       <span class="username_login"><?php echo $this->session->userdata('userid');?></span>
       
       </p>
       <p class="ac"><a class="link_1 " href="http://phmanqa.dev.com/dashboard/myaccount">My Account</a></p>
       <p class="np nm center"><a href="javascript:void(0);"  class="btn btn_type_3 logout_link"><span>Logout</span></a></p>
    </div>    
    
    <!--mid sidebar-->
    <div id="datepicker"></div>
    
    <!--bottom sidebar-->
    <div id="activity-box" class="side_box mt10">
        <p class="ac">
            <span>No activity for this day</span>
        </p>
    </div>
    
</div>