add_action('wp_enqueue_scripts', function () 
{
	wp_enqueue_style('ct-flexy-styles');
}, 100);
	
// Add custom slider Shortcode
function create_channelSlider() 
{
	$img_url = get_site_url().'/wp-content/uploads/2023/03/';
    $arr = array(
				array(
				'image' => $img_url.'sbs-1.webp',
				'link' => array('en' => '2654', 'au'=> '2894', 'ca' => '2895', 'nz' => '2896', 'uk' => '2896'),
				'title' => 'SBS'
				),
				array(
				'image' => $img_url.'pbs.webp',
				'link' => array('en' => '2942', 'au'=> '4692', 'ca' => '3014', 'nz' => '3171', 'uk' => '3172'),
				'title' => 'PBS'
				),
				array(
				'image' => $img_url.'nbc.webp',
				'link' => array('en' => '700', 'au'=> '1142', 'ca' => '1143', 'nz' => '1154', 'uk' => '1158'),
				'title' => 'NBC'
				),
				array(
				'image' => $img_url.'lifetime.webp',
				'link' => array('en' => '710', 'au'=> '1367', 'ca' => '1368', 'nz' => '1378', 'uk' => '1383'),
				'title' => 'Lifetime'
				),
				
				array(
				'image' => $img_url.'itex.webp',
				'link' => array('en' => '707', 'au'=> '1350', 'ca' => '1351', 'nz' => '1361', 'uk' => '1366'),
				'title' => 'itvx'
				),
				
				array(
				'image' => $img_url.'hgt.webp',
				'link' => array('en' => '709', 'au'=> '1316', 'ca' => '1317', 'nz' => '1327', 'uk' => '1332'),
				'title' => 'HGTV'
				),
				
				array(
				'image' => $img_url.'hallmark-1.webp',
				'link' => array('en' => '713', 'au'=> '1299', 'ca' => '1300', 'nz' => '1310', 'uk' => '1315'),
				'title' => 'Hallmark'
				),
				
				array(
				'image' => $img_url.'fubo.webp',
				'link' => array('en' => '2939', 'au'=> '3181', 'ca' => '3316', 'nz' => '3317', 'uk' => '3318'),
				'title' => 'Fubotv'
				),
			
				array(
				'image' => $img_url.'freeform.webp',
				'link' => array('en' => '2731', 'au'=> '2847', 'ca' => '2848', 'nz' => '2849', 'uk' => '2850'),
				'title' => 'Freeform'
				)
		);
	
$html = '' ;
$my_current_lang = ICL_LANGUAGE_CODE;
// if ($my_current_lang != "uk") {
$html = '
<div class="flexy-container OTT_Guides" data-flexy="no" data-autoplay="2">
		<div class="flexy">
			<div class="flexy-view" data-flexy-view="boxed">
				<div class="flexy-items ">

';
$slides = '';

foreach($arr as $k => $a)
{
	$anchor = '';
	
	// Check if the link for the current language exists
    if (isset($a['link'][$my_current_lang]) && !empty($a['link'][$my_current_lang])) {
        $anchor = $a['link'][$my_current_lang];
    }

    // Generate the anchor link based on the retrieved ID
    $anchor_link = '';
    if (!empty($anchor)) {
        $anchor_link = get_category_link($anchor);
    }

	$html .= '
				
					<div>
						<a class="ct-image-container" href="' . $anchor_link . '" data-width="1300" data-height="500" title="'. $a['title'] .'" target="_blank">
							<img width="300" height="115" src="' . $a['image'] . '" class="attachment-medium size-medium wp-post-image" alt="'. $a['title'] .'" decoding="async" loading="lazy"  />
							<noscript>
								<img width="300" height="115" src="' . $a['image'] . '" class="attachment-medium size-medium wp-post-image" alt="'. $a['title'] .'" decoding="async" loading="lazy"  />
							</noscript>
						</a>
					</div>
			
	';
}

$html .= '	


</div>
	<span class="flexy-arrow-prev">
			<svg width="16" height="10" viewBox="0 0 16 10">
				<path
					d="M15.3 4.3h-13l2.8-3c.3-.3.3-.7 0-1-.3-.3-.6-.3-.9 0l-4 4.2-.2.2v.6c0 .1.1.2.2.2l4 4.2c.3.4.6.4.9 0 .3-.3.3-.7 0-1l-2.8-3h13c.2 0 .4-.1.5-.2s.2-.3.2-.5-.1-.4-.2-.5c-.1-.1-.3-.2-.5-.2z" />
			</svg>
		</span>
		<span class="flexy-arrow-next">
			<svg width="16" height="10" viewBox="0 0 16 10">
				<path
					d="M.2 4.5c-.1.1-.2.3-.2.5s.1.4.2.5c.1.1.3.2.5.2h13l-2.8 3c-.3.3-.3.7 0 1 .3.3.6.3.9 0l4-4.2.2-.2V5v-.3c0-.1-.1-.2-.2-.2l-4-4.2c-.3-.4-.6-.4-.9 0-.3.3-.3.7 0 1l2.8 3H.7c-.2 0-.4.1-.5.2z" />
			</svg>
		</span>

</div>
</div>
</div>



';
// }
    return $html;
}
add_shortcode('channelSlider', 'create_channelSlider');
// Add custom slider Shortcode
