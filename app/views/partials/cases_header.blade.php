<?php
$key = array_search($case,$pages);
	if($key==0) {
		$prev = $pages[count($pages)-1];
	} else {
		$prev = $pages[$key-1];
	}
	if($key==count($pages)-1) {
		$next = $pages[0];
	} else {
		$next = $pages[$key+1];
	}
?>
<div class="case_nav">
	<div class="controls">
		<div class="control_button animated fadeInRight" id="home"><a href="{{ URL::to('/') }}"><i class="icon-home"></i></a>
		</div>
		<div class="control_button animated fadeInRight" id="previous"><a href="{{URL::to($prev)}}"></a>
		</div> 
		<div class="control_button animated fadeInRight" id="next"><a href="{{URL::to($next)}}"></a>
		</div>
	</div>
</div>

