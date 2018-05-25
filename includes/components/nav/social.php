<?php

$socialIconsSql = runQuery("SELECT `url`,
    `title`,
    `icon_cls`,
    `rank`,
    `is_external`
	FROM `social_links`
	WHERE `icon_cls` != ''
	AND `url` != ''
	AND `is_active` = '".FLAG_YES."'
	ORDER BY `rank`" );


$socialLinksView = '';

while ($arrSocialLink = mysql_fetch_assoc($socialIconsSql)) {

	$socialLinksView .= '<li class="social__item">
		<a href="'.$arrSocialLink['url'].'" title="'.$arrSocialLink['title'].'" class="social__link" target="_blank">
			<i class="'.$arrSocialLink['icon_cls'].'"></i>
		</a>
	</li>';

}

if (!empty($socialLinksView)) {
	
	$socialLinksView = '<div class="social">
		<ul class="social__list">'.$socialLinksView.'</ul>
	</div>';

}

$templateTags['social_links'] = $socialLinksView;

?>