<div id="ps_dental_admin">
	<div id="main" class="main-risk">
		<div class="content-holder">
			<h1>Select your widgets features!</h1>
			<div class="step-area">
				<ul class="step-list layout">
					<li class="active" style="z-index:3;"><a href="javascript:void(0);">1. Customize</a></li>
					<li class="last" style="z-index:1;"><a href="javascript:void(0);">2. Complete</a></li>
				</ul>
			</div>
			<div id="twocolumns" class="twocolumns-alt">
				<div class="left-block col same-height-left">
					<section class="main-box">
						<h2 class="head">Select the modules below that you would like to appear on your widget. Then rank them in the order you would like them to appear.</h2>
						<form action=" " id="form3" method="post">
							<input type="hidden" name="widgetcontinue" id="widgetselect" />
							<input type="hidden" name="widgetcolor" id="widgetselect2" />
							<input type="hidden" name="widget_disp" id="widgetdisplay" />
							<input type="hidden" name="saveandcontinue"id="saveandcontinue" />
						</form>
						<form action=" " class="form-modules" method="post" onsubmit="return false;" id="widgetform">
							<fieldset>
							<div class="row">
								<div class="select-area">
									<input type="checkbox" name="widfirst" id="check-1" checked="checked" disabled="disabled" value="1" class="chkwidget chkwidget1" />
									<strong class="title">Cavity Risk Assessment</strong> </div>
									<p>If people are looking for a dentist then they likely don't have one. This application allows your potential patients to get a reasonable understanding of their likelihood of cavity development. Then outlines options for them to seek relief. The Cavity Risk Assessment helps put your patients at ease while gathering lifestyle information that can help you before their first 	appointment. </p>
							</div>
							<div class="row">
								<div class="select-area">
									<input type="checkbox" name="widsecond" id="check-2" value="2" class="chkwidget chkwidget1" />
									<strong class="title">Gum Disease Risk</strong> </div>
									<p>Most potential patients aren't aware of the risks of allowing gum disease to develop. Like the Cavity Risk Assessment, the Gum Disease Risk assessment gathers information about your potential patients and informs them about steps they can take and options they have for treatment. This information is forwarded to you before their first appointment so you'll have some preliminary information before they even show up.</p>
							</div>
							<div class="row">
								<div class="select-area">
									<input type="checkbox" name="widthird" id="check-3" value="3" class="chkwidget chkwidget1" />
									<strong class="title">Oral Health Profile</strong> </div>
									<p>The Oral Health Profile takes all of the information that your potential patients enter to create an overall picture of their oral health. This information is provided to you and it's also saved in a format for your patients to access. This is a great way for your patients to keep you informed and also track their own oral health progress as you help them improve it.</p>
							</div>
							<div class="row">
								<div class="select-area">
									<input type="checkbox" name="widfourth" id="check-4" value="4" class="chkwidget chkwidget1" />
									<strong class="title">Dental Directory</strong> </div>
									<p>We take the information gathered in the patient profiles and match them with the closest, most appropriate care. Make sure that all of your services are listed so that we can offer them to the people who most need them. Have you got unique office hours? List them! Have you got bilingual staff members?  They are more important then ever so make sure you list every language spoken in your office!</p>
							</div>
							<div class="row">
								<div class="select-area">
									<input type="checkbox" name="widfifth" id="check-5" value="5" class="chkwidget chkwidget1" />
									<strong class="title">Cost Calculator</strong> </div>
									<p>One of the biggest barriers between you and your potential patients is the perceived high cost of dental care. Our Cost Calculator allows people to get an estimate of the costs they are facing given their conditions. You're not bound by the figures that we give them. This is more of a guide to what they can expect. When patients realize that dental care is within their financial grasp then we will direct them to you for an appointment.</p>
							</div>
							
							<div class="row">
								<div class="select-area list">
									<p>
										<input type="checkbox" name="widsevan" id="check-7" class="newcheckedbox"  />
										Add this Patient Generator to my Dental Optimizer web page. <a href="javascript:void(0);">Business Booster</a> package required 
									</p>
								</div>
							</div>
							<div class="row submit">
								<input type="submit" name="saveandcontinue" id="saveandcontinue" value="Save & Continue">
								<div id="ps_loading_div" style="float:right;padding-top:8px;padding-right:5px;display:block;height:27px;">
									<img style="display:none;"  src="<?=$ps_dwc_plugin_url;?>/images/loading4.gif">
								</div>
								<div style="clear:both;"></div>
							</div>
							</fieldset>
						</form>
					</section>
				</div>
				<aside class="aside alt col">
					<section class="block">
						<h2 class="head">Pick a Color</h2>
						<form action=" " method="post" id="colorform" class="form-color">
							<fieldset>
							<select name="widgetcol" id="ps_widget_color" class="chkwidget1">
								<option value="green">Green</option>
								<option value="blue">Blue</option>
								<option value="grey">Grey</option>
							</select>
							</fieldset>
						</form>
					</section>
					<section class="block">
						<div class="ad-holder" id="addwidget">
							<div id="wi_dental_cont"></div>
						</div>
					</section>
					<section class="block block-hide">
						<header class="heading">
							<h3>Get More Patients</h3>
						</header>
						<div class="video-holder"> <a href="javascript:void(0);">
							<img src="<?=$ps_dwc_plugin_url;?>/images/patientgen.jpg" alt="" width="312" height="191" >
							</a> </div>
						<p>The Patient Generator widget is the quickest, easiest way to take your website from a boring online brochure to an interactive, educational, patient-generating-machine. Imagine... people visit your website, Facebook page or dental directory listing, take an interactive cavity or gum disease risk assessment and your email inbox fills up with new patients eager to schedule an appointment.</p>
					</section>
				</aside>
			</div>
		</div>
	</div>
</div>