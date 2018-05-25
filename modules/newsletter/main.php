<?php

if (!empty($mailchimpApiKey) && !empty($mailchimpListId)) {
	
	$templateTags['newsletter_view'] = '
		<form action="#" class="form form--newsletter wow fadeInUp">
			<h3 class="newsletter__heading">Newsletter</h3>
			<p class="newsletter__subheading">Get latest news and updates from us straight into your inbox!</p>
			<div class="form__group">
				<div class="form__input-grp">
					<input type="email" class="form__control form--newsletter__control newsletter--input" placeholder="Enter your email">
				</div>
				<p class="form--newsletter__msg">&nbsp;</p>
			</div>
		</form>';

}

?>