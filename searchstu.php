<?php
session_start();
error_reporting(0);
require_once("connect.php");
if(!isset($_SESSSION["siteuser"]) && empty($_SESSION["siteuser"]))
{
header("location:login.php");
}
?>
					
			<!--[if !IE]>start content bottom<![endif]-->
			<div id="content_bottom">
			
			<div class="inner">
				
				<!--[if !IE]>start info<![endif]-->
				<div id="info">
					
					
					
					
					
					
					<!--[if !IE]>start section<![endif]-->
					<div class="section">
						
						
						
						<!--[if !IE]>start section inner <![endif]-->
						<div class="section_inner">
					 
					  	
						<!--[if !IE]>start forms<![endif]-->
						<form style="width:900px;" class="search_form general_form" onsubmit="searchstufunc();return false;">
							<!--[if !IE]>start fieldset<![endif]-->
							<fieldset>
								<!--[if !IE]>start forms<![endif]-->
								<div class="forms">
								<!--[if !IE]>start row<![endif]-->
								<div class="row" >
									<center>
									<label style="text-align:right;margin-left:150px;width:auto;">Enter Student ID Number:</label>
									<div class="inputs">
										<span class="input_wrapper"><input class="text" name="stuid" id="stuid" placeholder="Student ID" type="text" maxlength="7" /></span>	<span class="button blue_button search_button"><span style="cursor:pointer;" onclick="searchstufunc()"><span><em><span class="button_ico"></span>Search</em></span></span></span>
									
									</div>
									</center>
								</div>
								<!--[if !IE]>end row<![endif]-->
								
								
								
								</div>
							</fieldset>
							
							
						</form>
						
					<div style="background-image:url('img/Logobg.jpg');width:900px;margin-top:40px;background:#fff;border:1px ridge #eee;" class="search_form general_form">
					<div  id="mainview"  style="background:url('img/Logobg.jpg') no-repeat center;">
						<center><br><br><h3>Student Details Will be displayed here...</h3><br><br><br><br><br><br></center>
						
						</div>
					</div>
					
					</div>
					</div>
					<!--[if !IE]>end section<![endif]-->
					
					
					
					
					
				
				
			</div>
			<!--[if !IE]>end content bottom<![endif]-->
			</div>
			
