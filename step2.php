<div id="ps_dental_admin">
	<div id="main" class="main-risk">
		<div class="content-holder">
			<h1>Your personal Patient Generator widget is ready for use!</h1>
			<div class="step-area">
				<ul class="step-list layout">
					<li style="z-index:3;"><a href="javascript:void(0);">1. Customize</a></li>
					<li class="last active" style="z-index:1;"><a href="javascript:void(0);">2. Complete</a></li>
				</ul>
			</div>
			<div id="twocolumns" class="twocolumns-alt">
				<div class="left-block col same-height-left">
					<section class="main-box">
						<form action=" " class="form-modules"  onsubmit="return false;">
							<h2 class="head">All that left is to cut and paste the following code into an HTML widget within this Wordpress website. For instructions on how to add custom widgets watch this video.</h2>
							<fieldset>
							<div class="row">
								<div class="select-area">
									<div class="select-holder">
										<textarea name="getwidgetcode" id="getwidgetcode"><?php 
													$ps_code='<div id="wi_dental_cont"></div>'."\n".'<script language="javascript" src="'.$siteurlremote.'/ps-dental-widget-js.php?u='.$ps_widgetid.'"></script>';
													echo $ps_code;
										?></textarea>
									</div>
								</div>
							</div>
							</fieldset>
							<h2 class="head">OR </h2>
							<fieldset>
							<div class="row">
								<div class="select-area">
									<div class="select-holder">
										<h2 class="head">
											Paste the following shortcode into the body of your posts
											<br/>
											<code>[ps-dental-widget-code]</code>
											<br/>
											<br/>
											<p>
												<input type="submit" name="" id="btnret" value="Reset Widget"  onclick="location.href='<?=$ps_dwc_plugin_page_url;?>&step=1'"/>
											</p>
											<br/>
											<hr/>
										</h2>
										<h2 class="head">
											How to add the custom widget, watch the video below
										</h2>
										<iframe  width="590" height="300" src="//www.youtube.com/embed/WdF8TeodAdw" frameborder="0" allowfullscreen></iframe>
									</div>
								</div>
							</div>
							</fieldset>
						</form>
					</section>
				</div>
				<aside class="aside alt col">
					<section class="block">
						<div class="ad-holder" id="addwidget">
							<div id="wi_dental_cont"></div>
							<script language="javascript" src="<?=$siteurlremote;?>/ps-dental-widget-js.php?u=<?=$ps_widgetid;?>"></script>
						</div>
					</section>
				</aside>
			</div>
		</div>
	</div>
</div>