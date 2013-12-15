			<div id="social">
<?php
global $lrSocial;

if($lr_social["facebook"]) { ?>
				<a href="https://www.facebook.com/<?php echo $lr_social["facebook"]; ?>/" title="Facebook"><i class="icon-facebook"></i></a>
<?php }
if($lr_social["github"]) { ?>
				<a href="https://github.com/<?php echo $lr_social["github"]; ?>/" title="GitHub"><i class="icon-github"></i></a>
<?php }
if($lr_social["reddit"]) { ?>
				<a href="http://www.reddit.com/user/<?php echo $lr_social["reddit"]; ?>/" title="Reddit"><i class="icon-reddit"></i></a>
<?php }
if($lr_social["gplus"]) { ?>
				<a href="<?php echo $lr_social["gplus"]; ?>" title="Google+"><i class="icon-gplus"></i></a>
<?php }
if($lr_social["linkedin"]) { ?>
				<a href="http://www.linkedin.com/in/<?php echo $lr_social["linkedin"]; ?>/" title="LinkedIn"><i class="icon-linkedin"></i></a>
<?php }
if($lr_social["renren"]) { ?>
				<a href="<?php echo $lr_social["renren"]; ?>" title="Renren"><i class="icon-renren"></i></a>
<?php }
if($lr_social["skype"]) { ?>
				<a href="skype:<?php echo $lr_social["skype"]; ?>" title="Skype"><i class="icon-skype"></i></a>
<?php }
if($lr_social["tumblr"]) { ?>
				<a href="http://<?php echo $lr_social["tumblr"]; ?>.tumblr.com/" title="Tumblr"><i class="icon-tumblr"></i></a>
<?php }
if($lr_social["twitter"]) { ?>
				<a href="https://twitter.com/<?php echo $lr_social["twitter"]; ?>/" title="Twitter"><i class="icon-twitter"></i></a>
<?php }
if($lr_social["weibo"]) { ?>
				<a href="http://weibo.com/<?php echo $lr_social["weibo"]; ?>/" title="Sina Weibo"><i class="icon-weibo"></i></a>
<?php }
if($lr_social["pinterest"]) { ?>
				<a href="https://www.pinterest.com/<?php echo $lr_social["pinterest"]; ?>/" title="Pinterest"><i class="icon-pinterest"></i></a>
<?php }
if($lr_social["lastfm"]) { ?>
				<a href="http://www.last.fm/user/<?php echo $lr_social["lastfm"]; ?>/" title="Last.fm"><i class="icon-lastfm"></i></a>
<?php }
if($lr_social["qq"]) { ?>
				<a href="qq:<?php echo $lr_social["qq"]; ?>" title="QQ"><i class="icon-qq"></i></a>
<?php }
if($lr_social["soundcloud"]) { ?>
				<a href="http://soundcloud.com/<?php echo $lr_social["soundcloud"]; ?>/" title="SoundCloud"><i class="icon-soundcloud"></i></a>
<?php }
if($lr_social["behance"]) { ?>
				<a href="http://www.behance.net/<?php echo $lr_social["behance"]; ?>/" title="Behance"><i class="icon-behance"></i></a>
<?php }
if($lr_social["email"]) { ?>
				<a href="mailto:<?php echo $lr_social["email"]; ?>" title="E-mail"><i class="icon-at"></i></a>
<?php }
?>
			</div>
