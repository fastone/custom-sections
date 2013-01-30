<?php
	$pid = $GLOBALS['post_ID'];
	$section = get_post($pid);
	$title = $section->post_title;
	$name  = $section->post_name;
?>
<div id="section-shortcode-display">
		<p>Describe here what the user can do with the shortcode and/or php function..</p>
		<div class="section-shortcode">
			<span id="ection-shortcode">[section id="<?php echo $pid; ?>" title="<?php echo $title; ?>"]</span>
		</div>
		<div class="section-shortcode">
			<span id="ection-shortcode">[section id="<?php echo $pid; ?>" template="basic"]</span>
		</div>
		<div class="section-shortcode">
			<span id="ection-shortcode">[section name="<?php echo $name; ?>" template="basic"]</span>
		</div>
		<div class="section-function">
			<span id="section-function">&lt;?php show_section(<?php echo $pid; ?>, array('title' => '<?php echo $title; ?>')); ?&gt;</span>
		</div>
		<div class="section-function">
			<span id="section-function">&lt;?php show_section(<?php echo $pid; ?>, array('template' => 'basic')); ?&gt;</span>
		</div>
		<div class="section-function">
			<span id="section-function">&lt;?php show_section('<?php echo $name; ?>', array('template' => 'basic')); ?&gt;</span>
		</div>
</div>