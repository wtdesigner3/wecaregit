<?php

require("../inc/function.php");
$id=$_GET["id"];
$datas=mysqli_query($conn,"SELECT * FROM `tbl_division` where id='$id'");
$data=mysqli_fetch_assoc($datas);
?>
<div class="row banner-row" >
<div class="job-close" >
    <span><i class="fa fa-times"></i></span>
</div>
<div class="col-lg-12">
    <div>
        <img src="images/job-banner.png" class="img-fluid">
    </div>
</div>
</div>
<div class="row icon-row">
<div class="col-lg-12">
    <div class="job-icon-div">
        <img src="images/job-icon.png" width="40">
    </div>
</div>
</div>

<div class="row heading-row job-subtitle-wrapper  pl-3  pr-3">
<div class="col-lg-8">
    <div class="job-card-title"><?= $data["title"]; ?></div>
</div>
<div class="col-lg-4  text-right">
    <a class="custom-link font-14" href="#"  data-toggle="modal" onclick="openModal(<?= $brandfetch['id'];?>)" data-target="#exampleModal-<?= $brandfetch['id'];?>">Apply Now</a>
</div>
</div>

<div class="row heading-btm-row job-subtitle-wrapper pl-3  pr-3">
<div class="col-lg-7">
    <div class="company-name"><?= $data["cname"]; ?> <span class="comp-location"><?= $data["loc"]; ?></span></div>
</div>
<div class="col-lg-5 text-right">
    <div class="posted">Posted on: <?= $data["date"]; ?></div>
</div>
</div>
<hr>
<div class="row explain-row job-subtitle-wrapper pl-3  pr-3">
    <div class="col-lg-12">
        <div class="explain-bar">
            <div class="explain-contents">
                <div class="explain-title">Experience</div>
                <div class="explain-subtitle"><?= $data["exp"]; ?></div>
            </div>
            <div class="explain-contents">
                <div class="explain-title">Work Level</div>
                <div class="explain-subtitle"><?= $data["work"]; ?></div>
            </div>
            <div class="explain-contents">
                <div class="explain-title">Employee Type</div>
                <div class="explain-subtitle"><?= $data["emp"]; ?></div>
            </div>
            <div class="explain-contents">
                <div class="explain-title">Offer Salary</div>
                <div class="explain-subtitle"><?= $data["sal"]; ?></div>
            </div>
        </div>
    </div> 
</div>
<hr>
<div class="row overview-row pl-2 pr-5">
<div class="col-lg-12">	
<p><?= $data["des"]; ?></p>
</div>
<script type="text/javascript">
			$(".view-desc").click(function(){
  			$(".job-desc-container").css('right','0%'); 
  			$(".tabs-section").css('opacity','40%');
  			$(".division").css('opacity','40%');
  			$(".header").css('opacity','40%');  
			});

			$(".job-close").click(function(){
  			$(".job-desc-container").css('right','-50%');
  			$(".tabs-section").css('opacity','100%'); 
  			$(".division").css('opacity','100%');
  			$(".header").css('opacity','100%');
			});
 
		</script>
		<script>

    function openModal(id)
    {
        $.ajax({
         type: "GET",
         url: 'modalForm.php',
         data: "id=" + id,
         success: function(data) {
           $('.popUp').html(data);
         }
       });
    }


</script>