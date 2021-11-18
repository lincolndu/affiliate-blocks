<?php

/**
 * AFFILIATE Block Helper.
 *
 * @package AFFILIATE
 */
if (!class_exists('AFFILIATE_Block_Helper')) {

  /**
   * Class AFFILIATE_Block_Helper.
   */
  class AFFILIATE_Block_Helper
  {

    /**
     * Get affiliate-blocks CSS
     *
     * @since 1.4.0
     * @param array  $attr The block attributes.
     * @param string $id The selector ID.
     * @return array The Widget List.
     */
    public static function get_propcons_css($attr, $id)
    {    // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/propsandcons']['attributes'];

      $attr = array_merge($defaults, (array) $attr);

      $selectors = self::get_propcons_selectors($attr);

      $m_selectors = self::get_propcons_mobiletselectors($attr);

      $t_selectors = self::get_propcons_tabletselectors($attr);
      // // @codingStandardsIgnoreEnd

      $desktop = AFFILIATE_Helper::generate_css($selectors, '#affiliate-style-' . $id);

      $tablet = AFFILIATE_Helper::generate_css($t_selectors, '#affiliate-style-' . $id);

      $mobile = AFFILIATE_Helper::generate_css($m_selectors, '#affiliate-style-' . $id);

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );

      return $generated_css;
    }

    public static function get_cta_css($attr, $id)
    {    // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-callto-action']['attributes'];

      $attr = array_merge($defaults, (array) $attr);

      $selectors = self::get_cta_selectors($attr);

      $m_selectors = self::get_cta_mobiletselectors($attr);

      $t_selectors = self::get_cta_tabletselectors($attr);
      // // @codingStandardsIgnoreEnd

      $desktop = AFFILIATE_Helper::generate_css($selectors, '#affiliate-style-' . $id);

      $tablet = AFFILIATE_Helper::generate_css($t_selectors, '#affiliate-style-' . $id);

      $mobile = AFFILIATE_Helper::generate_css($m_selectors, '#affiliate-style-' . $id);

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );

      return $generated_css;
    }

    public static function get_propcons_selectors($attr){
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      $desktop_css = array(
        " .affiliate-procon-inner" => array(
            "box-shadow" => implode('',$boxshadow),
        ),
        " .affiliate-propcon-title" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
        ),
        " .affiliate-list" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeDesktop'], $attr['listfontSizeType']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['listfontStyle']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeight']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacing'], $attr['listletterSpacingType']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['listtextDecoration']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['listtextTransform']),
        ),

        " .affiliate-props-title" => array(
            'background' => AFFILIATE_Helper::get_css_value($attr['propsBgColor']),
        ),
        " .affiliate-const-title" => array(
            'background' => AFFILIATE_Helper::get_css_value($attr['consBgColor']),
        ),

        " .default.affiliate-props-title" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['propsTextColor']),
        ),
        " .default.affiliate-const-title" => array( 
            'color' => AFFILIATE_Helper::get_css_value($attr['consTextColor']),
        ),


        " .style3.affiliate-props-title" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['propsTextColor']),
        ),
        " .style3.affiliate-const-title" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['consTextColor']),
        ),


        " .style1.affiliate-props-title" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['propsTextColor1']),
        ),
        " .style1.affiliate-const-title" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['consTextColor1']),
        ),


        " .style2.affiliate-props-title" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['propsTextColor1']),
        ),
        " .style2.affiliate-const-title" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['consTextColor1']),
        ),


        " .affiliate-props-list li:before" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['propsIconColor']),
        ),
        " .affiliate-cons-list li:before" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['consIconColor']),
        ),
        " .affiliate-props-list li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['propsListColor']),
        ),
        " .affiliate-cons-list li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['consListColor']),
        ),

        " .style1.affiliate-props-list::after,  .style1.affiliate-props-list::before" => array(
          'background-color' => AFFILIATE_Helper::get_css_value($attr['prosBorderColor']),
        ),
        " .style1.affiliate-cons-list::after,  .style1.affiliate-cons-list::before" => array(
          'background-color' => AFFILIATE_Helper::get_css_value($attr['consBorderColor']),
        ),

        " .style2.affiliate-props-list" => array(
          'border-color' => AFFILIATE_Helper::get_css_value($attr['prosBorderColor']),
        ),
        " .style2.affiliate-cons-list" => array(
          'border-color' => AFFILIATE_Helper::get_css_value($attr['consBorderColor']),
        ),


        " .style3.affiliate-props-list ul.affiliate-list" => array(
          'background' => AFFILIATE_Helper::get_css_value($attr['style3ContentProsBg']),
        ),
        " .style3.affiliate-cons-list ul.affiliate-list" => array(
          'background' => AFFILIATE_Helper::get_css_value($attr['style3ContentConsBg']),
        ),

      );

      $desktop_css =  AFFILIATE_Helper::regenerate_stylesheet($desktop_css);

      return $desktop_css;
    }

    public static function get_propcons_tabletselectors($attr){
      $tablet_css = array(
        " .affiliate-propcon-title" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),
        " .affiliate-list" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet'], $attr['listfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet'], $attr['listletterSpacingTypeTablet']),
        ),
      );

      $tablet_css =  AFFILIATE_Helper::regenerate_stylesheet($tablet_css);

      return $tablet_css;
    }
    public static function get_propcons_mobiletselectors($attr){
      $mobile_css = array(
        " .affiliate-propcon-title" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
        ),
        " .affiliate-list" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile'], $attr['listfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile'], $attr['listletterSpacingTypeMobile']),
        ),
      );

      $mobile_css =  AFFILIATE_Helper::regenerate_stylesheet($mobile_css);

      return $mobile_css;
    }

    public static function blocks_propcons_gfont($attr)
    {

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $list_load_google_font = isset($attr['listLoadGoogleFonts']) ? $attr['listLoadGoogleFonts'] : '';
      $list_font_family      = isset($attr['listfontFamily']) ? $attr['listfontFamily'] : '';
      $list_font_weight      = isset($attr['listfontWeight']) ? $attr['listfontWeight'] : '';
      $list_font_subset      = isset($attr['listfontSubset']) ? $attr['listfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($list_load_google_font, $list_font_family, $list_font_weight, $list_font_subset);
    }

    public static function get_comparison_table_css($attr, $id)
    {    // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-comparison-table']['attributes'];

      $attr = array_merge($defaults, (array) $attr);

      $selectors = self::get_comparison_table_deskselectors($attr);

      $m_selectors = self::get_comparison_table_mobselectors($attr);

      $t_selectors = self::get_comparison_table_tabselectors($attr);
      // // @codingStandardsIgnoreEnd

      $desktop = AFFILIATE_Helper::generate_css($selectors, '#affiliate-style-' . $id);

      $tablet = AFFILIATE_Helper::generate_css($t_selectors, '#affiliate-style-' . $id);

      $mobile = AFFILIATE_Helper::generate_css($m_selectors, '#affiliate-style-' . $id);

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );

      return $generated_css;
    }

    public static function get_comparison_table_deskselectors($attr){

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      } 

      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }
      $desktop_css = array(
        " .af-is-custom" => array(
          "width" => AFFILIATE_Helper::get_css_value($attr['btnCustomWidth'],'px'),
        ),
        " .affiliate-cmpr-inner" => array(
            "box-shadow" => implode('',$boxshadow),
        ),
        " .affiliate-compr-btn" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
            //"background" => AFFILIATE_Helper::get_css_value($attr['btnBgColor']),
            "background" => AFFILIATE_Helper::get_css_value($btnBg),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
            'border-style' => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
          ),
          " .affiliate-compr-btn:hover" => array(
            //"background" => AFFILIATE_Helper::get_css_value($attr['btnHoverBgColor']),
            "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
          ),  
          " .affiliate-txtbox-title" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
        ),
        " .affiliate-item-badge" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['badgefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['badgefontSizeDesktop'], $attr['badgefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['badgefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['badgefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['badgelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['badgeletterSpacing'], $attr['badgeletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['badgetextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['badgetextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['badgeTextColor']),
              "background" => AFFILIATE_Helper::get_css_value($attr['badgeBgColor']),
          ),
          " .affiliate-cmpr-readmore" => array(
                'font-family' => AFFILIATE_Helper::get_css_value($attr['readMorefontFamily']),
                'font-size' => AFFILIATE_Helper::get_css_value($attr['readMorefontSizeDesktop'], $attr['readMorefontSizeType']),
                'font-weight' => AFFILIATE_Helper::get_css_value($attr['readMorefontWeight']),
                'font-style' => AFFILIATE_Helper::get_css_value($attr['readMorefontStyle']),
                'line-height' => AFFILIATE_Helper::get_css_value($attr['readMorelineHeight']),
                'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['readMoreletterSpacing'], $attr['readMoreletterSpacingType']),
                'text-decoration' => AFFILIATE_Helper::get_css_value($attr['readMoretextDecoration']),
                'text-transform' => AFFILIATE_Helper::get_css_value($attr['readMoretextTransform']),
                "color" => AFFILIATE_Helper::get_css_value($attr['readMoreTextColor']),
          ),
          " .affiliate-compr-th th" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['thfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeDesktop'], $attr['thfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['thfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['thfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacing'], $attr['thletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['thtextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['thtextTransform']),
              "background" => AFFILIATE_Helper::get_css_value($attr['HBgColor']),
              "color" => AFFILIATE_Helper::get_css_value($attr['HTxtColor']),
        ),
        " .affiliate-compr-cntn .affiliate-col-ct1 li, .affiliate-compr-cntn .affiliate-col-ct2 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['tdTxtColor']),
        ),
        " tr:nth-of-type(odd)" => array(
            "background" => AFFILIATE_Helper::get_css_value($attr['tOddColor']),
        ),
        " tr:nth-of-type(even)" => array(
          "background" => AFFILIATE_Helper::get_css_value($attr['tEvenColor']),
        ),
        " .affiliate-img-rating" => array(
            "color" => AFFILIATE_Helper::get_css_value($attr['itemRatingTextColor']),
            "background" => AFFILIATE_Helper::get_css_value($attr['itemRatingBgColor']),
        ),
      );


    if($attr['btnBg']['openBg'] == 1){
        if($attr['btnBg']['bgType'] == 'gradient'){
          if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
            $desktop_css[" .affiliate-compr-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          } else {
            $desktop_css[" .affiliate-compr-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover']['openBg'] == 1){
        if($attr['btnBgHover']['bgType'] == 'gradient'){
          if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
            $desktop_css[" .affiliate-compr-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          } else {
            $desktop_css[" .affiliate-compr-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  

      $desktop_css =  AFFILIATE_Helper::regenerate_stylesheet($desktop_css);

      return $desktop_css;
    }

    public static function get_comparison_table_tabselectors($attr){
      $tablet_css = array(
        " .affiliate-compr-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
        ),
        " .affiliate-compr-th th" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeTablet'], $attr['thfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacingTablet'], $attr['thletterSpacingTypeTablet']),
        ),

        " .affiliate-compr-cntn .affiliate-col-ct1, .affiliate-compr-cntn .affiliate-col-ct2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),

      );

      $tablet_css =  AFFILIATE_Helper::regenerate_stylesheet($tablet_css);

      return $tablet_css;
    }

    public static function get_comparison_table_mobselectors($attr){
      $mobile_css = array(
        " .affiliate-compr-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
        ),
        " .affiliate-compr-th th" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeMobile'], $attr['thfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacingMobile'], $attr['thletterSpacingTypeMobile']),
        ),
        " .affiliate-compr-cntn .affiliate-col-ct1, .affiliate-compr-cntn .affiliate-col-ct2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
        ),
      );

      $mobile_css =  AFFILIATE_Helper::regenerate_stylesheet($mobile_css);

      return $mobile_css;
    }

    public static function blocks_comparison_table_gfont($attr)
    {

      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $readMore_load_google_font = isset($attr['readMoreLoadGoogleFonts']) ? $attr['readMoreLoadGoogleFonts'] : '';
      $readMore_font_family      = isset($attr['readMorefontFamily']) ? $attr['readMorefontFamily'] : '';
      $readMore_font_weight      = isset($attr['readMorefontWeight']) ? $attr['readMorefontWeight'] : '';
      $readMore_font_subset      = isset($attr['readMorefontSubset']) ? $attr['readMorefontSubset'] : '';

      $badge_load_google_font = isset($attr['badgeLoadGoogleFonts']) ? $attr['badgeLoadGoogleFonts'] : '';
      $badge_font_family      = isset($attr['badgefontFamily']) ? $attr['badgefontFamily'] : '';
      $badge_font_weight      = isset($attr['badgefontWeight']) ? $attr['badgefontWeight'] : '';
      $badge_font_subset      = isset($attr['badgefontSubset']) ? $attr['badgefontSubset'] : '';

      $th_load_google_font = isset($attr['thLoadGoogleFonts']) ? $attr['thLoadGoogleFonts'] : '';
      $th_font_family      = isset($attr['thfontFamily']) ? $attr['thfontFamily'] : '';
      $th_font_weight      = isset($attr['thfontWeight']) ? $attr['thfontWeight'] : '';
      $th_font_subset      = isset($attr['thfontSubset']) ? $attr['thfontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($readMore_load_google_font, $readMore_font_family, $readMore_font_weight, $readMore_font_subset);
      AFFILIATE_Helper::blocks_google_font($badge_load_google_font, $badge_font_family, $badge_font_weight, $badge_font_subset);
      AFFILIATE_Helper::blocks_google_font($th_load_google_font, $th_font_family, $th_font_weight, $th_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
    }

    // CTA Desktop Selector
    public static function get_cta_selectors($attr){

      $background = $bgurl = $bg_position = $bg_repeat = $bg_size = '';
      if($attr['boxBg']['openBg'] == 1){
          if($attr['boxBg']['bgType'] == 'color'){
             $background = $attr['boxBg']['bgDefaultColor']; 
          }
          if($attr['boxBg']['bgType'] == 'image'){
            $background_img = $attr['boxBg']['bgImage']['url']; 
            $bg_position = $attr['boxBg']['bgimgPosition'];
            $bg_repeat = $attr['boxBg']['bgimgRepeat'];
            $bg_size =  $attr['boxBg']['bgimgSize'];
         }
      }

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }

      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      
      $desktop_css = array(
        " .affiliate-cta-overlay" => array(
            'background-color'=> AFFILIATE_Helper::get_css_value($attr['bgOverlay']),
        ),
        " .affiliate-cta-btn-wrapper" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
        ),
        " .affiliate-cta-inner" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['boxPadding']['top'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['right'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['left'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['boxMargin']['top'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['right'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['left'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])),
            "background" => AFFILIATE_Helper::get_css_value($background),
            "background-image" => (isset( $background_img) && isset( $background_img ) ) ? 'url("'.$background_img.'")' : null,
            'background-position'=> AFFILIATE_Helper::get_css_value($bg_position),
            'background-repeat'=> AFFILIATE_Helper::get_css_value($bg_repeat),
            'background-size'=> AFFILIATE_Helper::get_css_value($bg_size),
            'text-align'=> AFFILIATE_Helper::get_css_value($attr['boxAlignment']),
            "box-shadow"=>implode(',',$boxshadow),

            'border-style' => AFFILIATE_Helper::get_css_value($attr['boxBorderType']),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['boxBorderColor']),
            'border-width' => AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])),
            

        ),
        "  .affiliate-cta-inner p.affiliate-cta-title, .affiliate-cta-inner p.affiliate-cta-content" => array(
             'text-align'=> AFFILIATE_Helper::get_css_value($attr['boxAlignment']),
        ),
        " .affiliate-cta-title" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
        ),
        " .affiliate-cta-content" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
        ),

        " .affiliate-cta-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
        ),
        " .affiliate-cta-btn:hover" => array(
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
            "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
        ),

        " .affiliate-bg-icon" => array(
              "color" => AFFILIATE_Helper::get_css_value($attr['BgIconColor']),              
              "font-size" => AFFILIATE_Helper::get_css_value($attr['BgIconSize']), 
            ),


      );
      if($attr['boxBg']['openBg'] == 1){
        if($attr['boxBg']['bgType'] == 'gradient'){
          if ($attr['boxBg']['bgGradient']['type'] == 'linear') {
            $desktop_css[" .affiliate-cta-inner"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['boxBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBg']['bgGradient']['stop'], '%') . ')';
          } else {
            $desktop_css[" .affiliate-cta-inner"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['boxBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBg']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  



      if($attr['btnBg']['openBg'] == 1){
        if($attr['btnBg']['bgType'] == 'gradient'){
          if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
            $desktop_css[" .affiliate-cta-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          } else {
            $desktop_css[" .affiliate-cta-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover']['openBg'] == 1){
        if($attr['btnBgHover']['bgType'] == 'gradient'){
          if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
            $desktop_css[" .affiliate-cta-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          } else {
            $desktop_css[" .affiliate-cta-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  

      $desktop_css =  AFFILIATE_Helper::regenerate_stylesheet($desktop_css);

      return $desktop_css;
    }

    // CTA Mobile Selector
    public static function get_cta_mobiletselectors($attr){
      $mobile_css = array(
        " .affiliate-cta-inner" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])),
          'text-align'=> AFFILIATE_Helper::get_css_value($attr['boxAlignmentMobile']),  
        ),
        " .affiliate-cta-title" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
      ),
        " .affiliate-cta-content" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
        ),
        " .affiliate-cta-btn" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
        ),
      );

      $mobile_css =  AFFILIATE_Helper::regenerate_stylesheet($mobile_css);

      return $mobile_css;
    }

    // CTA Content Selector
    public static function get_cta_tabletselectors($attr){
      
      
      $tablet_css = array(
        " .affiliate-cta-inner" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])),
          'text-align'=> AFFILIATE_Helper::get_css_value($attr['boxAlignmentTablet']),  
        ),
        " .affiliate-cta-title" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
      ),
        " .affiliate-cta-content" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),
        " .affiliate-cta-btn" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
        ),
      );

      $tablet_css =  AFFILIATE_Helper::regenerate_stylesheet($tablet_css);

      return $tablet_css;
    }

    public static function blocks_cta_gfont($attr)
    {

      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
    }

    public static function get_sp_css( $attr, $id ) { 			// @codingStandardsIgnoreStart

      $inset = '';
			$defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-single-product']['attributes'];

			$attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }

      $btnBg2 = '';
      if($attr['btnBg2']['openBg'] == 1){
          if($attr['btnBg2']['bgType'] == 'color'){
             $btnBg2 = $attr['btnBg2']['bgDefaultColor']; 
          }
      } 

      $btnBgHover2 = '';
      if($attr['btnBgHover2']['openBg'] == 1){
          if($attr['btnBgHover2']['bgType'] == 'color'){
             $btnBgHover2 = $attr['btnBgHover2']['bgDefaultColor']; 
          }
      }


      $btnBg3 = '';
      if($attr['btnBg3']['openBg'] == 1){
          if($attr['btnBg3']['bgType'] == 'color'){
             $btnBg3 = $attr['btnBg3']['bgDefaultColor']; 
          }
      } 

      $btnBgHover3 = '';
      if($attr['btnBgHover3']['openBg'] == 1){
          if($attr['btnBgHover3']['bgType'] == 'color'){
             $btnBgHover3 = $attr['btnBgHover3']['bgDefaultColor']; 
          }
      }


			$m_selectors = array();
			$t_selectors = array();

      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

			$selectors = array(
				" .affiliate-sp-wrapper" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['boxPadding']['top'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['right'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['left'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['boxMargin']['top'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['right'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['left'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])),
            'border-style' => AFFILIATE_Helper::get_css_value($attr['boxBorderType']),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['boxBorderColor']),
            'border-width' => AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])),
            "box-shadow"=>implode(',',$boxshadow),
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBackgroundColor']),
          ),
          " .affiliate-sp-image" => array(
              'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])),
          ),
          " .affiliate-sp-image img" => array(
              'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth'],'px'),
          ),
          " .affiliate-list li:before" => array(
              'color' => AFFILIATE_Helper::get_css_value($attr['iconColor']),
          ),
          " .affiliate-sp-title" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignment']),
          ),
          " .affiliate-sp-subtitle" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['subtitlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeDesktop'], $attr['subtitlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['subtitlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['subtitlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacing'], $attr['subtitleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['subtitletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['subtitletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['subtitleTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['subtitleAlignment']),
          ),
          " .affiliate-sp-content li, .affiliate-pr-pcontent" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignment']),
          ),
          " .affiliate-sp-btn" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
          ),
          " .affiliate-sp-btn:hover" => array(
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
              "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
          ),


          " .affiliate-sp-btn.btn2 " => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily2']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop2'], $attr['btnfontSizeType2']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight2']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle2']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight2']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing2'], $attr['btnletterSpacingType2']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration2']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform2']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg2),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor2']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor2']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType2']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])),
          ),
          " .affiliate-sp-btn.btn2:hover" => array(
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor2']),
              "background" => AFFILIATE_Helper::get_css_value($btnBgHover2),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor2']),
          ),



          " .affiliate-sp-btn.btn3 " => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily3']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop3'], $attr['btnfontSizeType3']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight3']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle3']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight3']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing3'], $attr['btnletterSpacingType3']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration3']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform3']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg3),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor3']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor3']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType3']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])),
          ),
          " .affiliate-sp-btn.btn3:hover" => array(
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor3']),
              "background" => AFFILIATE_Helper::get_css_value($btnBgHover3),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor3']),
          ),



         " .affiliate-sp-amzon-price" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['amazonpricefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['amazonpricefontSizeDesktop'], $attr['amazonpricefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['amazonpricefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['amazonpricefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['amazonpricelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['amazonpriceletterSpacing'], $attr['amazonpriceletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['amazonpricetextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['amazonpricetextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['amazonpriceTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['amazonpriceAlignment']),
          ), 


         " .affiliate-sp-amzon-rating" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['amazonratingfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['amazonratingfontSizeDesktop'], $attr['amazonratingfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['amazonratingfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['amazonratingfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['amazonratinglineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['amazonratingletterSpacing'], $attr['amazonratingletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['amazonratingtextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['amazonratingtextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['amazonratingTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['amazonratingAlignment']),
          ), 


			);

			
			$m_selectors = array(
        " .affiliate-sp-wrapper" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])),
        ),
        " .affiliate-sp-image" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])),
        ),
        " .affiliate-sp-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile'],'px'),
        ),
        " .affiliate-sp-title" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignmentMobile']),
        ),
        " .affiliate-sp-subtitle" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeMobile'], $attr['subtitlefontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingMobile'], $attr['subtitleletterSpacingTypeMobile']),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['subtitleAlignmentMobile']),
        ),
        " .affiliate-sp-content li, .affiliate-pr-pcontent" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignmentMobile']),
        ),
        " .affiliate-sp-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
        ),

        " .affiliate-sp-btn.btn2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile2'], $attr['btnfontSizeTypeMobile2']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile2']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile2'], $attr['btnletterSpacingTypeMobile2']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])),
        ),


        " .affiliate-sp-btn.btn3" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile3'], $attr['btnfontSizeTypeMobile3']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile3']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile3'], $attr['btnletterSpacingTypeMobile3']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])),
        ),


        " .affiliate-sp-amzon-price" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['amazonpricefontSizeMobile'], $attr['amazonpricefontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['amazonpricelineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['amazonpriceletterSpacingMobile'], $attr['amazonpriceletterSpacingTypeMobile']),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['amazonpriceAlignmentMobile']),
        ),

        " .affiliate-sp-amzon-rating" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['amazonratingfontSizeMobile'], $attr['amazonratingfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['amazonratinglineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['amazonratingletterSpacingMobile'], $attr['amazonratingletterSpacingTypeMobile']),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['amazonratingAlignmentMobile']),
        ),


			);

			$t_selectors = array(
        " .affiliate-sp-wrapper" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])),
        ),
        " .affiliate-sp-title" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),
        " .affiliate-sp-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])),
        ),
        " .affiliate-sp-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet'],'px'),
        ),
        " .affiliate-sp-subtitle" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeTablet'], $attr['subtitlefontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingTablet'], $attr['subtitleletterSpacingTypeTablet']),
      ),
        " .affiliate-sp-content li, .affiliate-pr-pcontent" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),
        " .affiliate-sp-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
        ),

        " .affiliate-sp-btn.btn2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet2'], $attr['btnfontSizeTypeTablet2']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet2']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet2'], $attr['btnletterSpacingTypeTablet2']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])),
        ),


        " .affiliate-sp-btn.btn3" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet3'], $attr['btnfontSizeTypeTablet3']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet3']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet3'], $attr['btnletterSpacingTypeTablet3']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])),
        ),



        " .affiliate-sp-amzon-price" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['amazonpricefontSizeTablet'], $attr['amazonpricefontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['amazonpricelineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['amazonpriceletterSpacingTablet'], $attr['amazonpriceletterSpacingTypeTablet']),
        ),


        " .affiliate-sp-amzon-rating" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['amazonratingfontSizeTablet'], $attr['amazonratingfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['amazonratinglineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['amazonratingletterSpacingTablet'], $attr['amazonratingletterSpacingTypeTablet']),
        ),

			);


      if($attr['btnBg']['openBg'] == 1){
        if($attr['btnBg']['bgType'] == 'gradient'){
          if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-sp-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-sp-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover']['openBg'] == 1){
        if($attr['btnBgHover']['bgType'] == 'gradient'){
          if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-sp-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-sp-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  



      if($attr['btnBg2']['openBg'] == 1){
        if($attr['btnBg2']['bgType'] == 'gradient'){
          if ($attr['btnBg2']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-sp-btn.btn2"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-sp-btn.btn2"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover2']['openBg'] == 1){
        if($attr['btnBgHover2']['bgType'] == 'gradient'){
          if ($attr['btnBgHover2']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-sp-btn.btn2:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-sp-btn.btn2:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
          }
        }
      }



      if($attr['btnBg3']['openBg'] == 1){
        if($attr['btnBg3']['bgType'] == 'gradient'){
          if ($attr['btnBg3']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-sp-btn.btn3"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-sp-btn.btn3"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover3']['openBg'] == 1){
        if($attr['btnBgHover3']['bgType'] == 'gradient'){
          if ($attr['btnBgHover3']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-sp-btn.btn3:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-sp-btn.btn3:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
          }
        }
      }


			// @codingStandardsIgnoreEnd

      $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
      $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
      $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

			$desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

			$tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

			$mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

			$generated_css = array(
				'desktop' => $desktop,
				'tablet'  => $tablet,
				'mobile'  => $mobile,
			);
			return $generated_css;
    }
    
    public static function blocks_sp_gfont($attr)
    {
      
      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      $subtitle_load_google_font = isset($attr['subtitleLoadGoogleFonts']) ? $attr['subtitleLoadGoogleFonts'] : '';
      $subtitle_font_family      = isset($attr['subtitlefontFamily']) ? $attr['subtitlefontFamily'] : '';
      $subtitle_font_weight      = isset($attr['subtitlefontWeight']) ? $attr['subtitlefontWeight'] : '';
      $subtitle_font_subset      = isset($attr['subtitlefontSubset']) ? $attr['subtitlefontSubset'] : '';


      $amazonprice_load_google_font = isset($attr['amazonpriceLoadGoogleFonts']) ? $attr['amazonpriceLoadGoogleFonts'] : '';
      $amazonprice_font_family      = isset($attr['amazonpricefontFamily']) ? $attr['amazonpricefontFamily'] : '';
      $amazonprice_font_weight      = isset($attr['amazonpricefontWeight']) ? $attr['amazonpricefontWeight'] : '';
      $amazonprice_font_subset      = isset($attr['amazonpricefontSubset']) ? $attr['amazonpricefontSubset'] : '';


      $amazonrating_load_google_font = isset($attr['amazonratingLoadGoogleFonts']) ? $attr['amazonratingLoadGoogleFonts'] : '';
      $amazonrating_font_family      = isset($attr['amazonratingfontFamily']) ? $attr['amazonratingfontFamily'] : '';
      $amazonrating_font_weight      = isset($attr['amazonratingfontWeight']) ? $attr['amazonratingfontWeight'] : '';
      $amazonrating_font_subset      = isset($attr['amazonratingfontSubset']) ? $attr['amazonratingfontSubset'] : '';


      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
      AFFILIATE_Helper::blocks_google_font($subtitle_load_google_font, $subtitle_font_family, $subtitle_font_weight, $subtitle_font_subset);

      AFFILIATE_Helper::blocks_google_font($amazonprice_load_google_font, $amazonprice_font_family, $amazonprice_font_weight, $amazonprice_font_subset);
      AFFILIATE_Helper::blocks_google_font($amazonrating_load_google_font, $amazonrating_font_family, $amazonrating_font_weight, $amazonrating_font_subset);
    }

    public static function get_abnotice_css( $attr, $id ) { 			// @codingStandardsIgnoreStart

      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-notice-box']['attributes'];
      
			$attr = array_merge( $defaults, $attr );

			$m_selectors = array();
      $t_selectors = array();
      
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }


			$selectors = array(
          " .affiliate-notice-inner" => array( 
              "box-shadow"=>implode(',',$boxshadow),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['titleBorderColor']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['titleBorderType']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['titleBorder']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])),
          ),
          " .affiliate-notice-title " => array( 
              "background" => AFFILIATE_Helper::get_css_value($attr['noticeTitleBgColor']),
          ),  

          " .affiliate-notice-title " . $attr['titleTag1']  => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
              
              "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignment']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['titlePadding']['top'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['right'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['left'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['titleMargin']['top'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['right'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['left'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])),
          ),
          " .affiliate-notice-content li:before" => array(
              "color" => AFFILIATE_Helper::get_css_value($attr['iconColor']),
          ),
          " .affiliate-notice-cntn-wrapper" => array(
             "background" => AFFILIATE_Helper::get_css_value($attr['cntnBgColor']),
          ),
          " .affiliate-notice-content, .affiliate-notice-content li" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignment']),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['cntnBorderColor']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['cntnBorderType']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['cntnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['cntnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['cntnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['cntnBorder']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignment']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['cntnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['cntnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['cntnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['cntnPadding']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['cntnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['cntnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['cntnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['cntnMargin']['unit'])),
          ),
			);

			
			$m_selectors = array(
        " .affiliate-notice-title " . $attr['titleTag1'] => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignmentMobile']),
        ),
        " .affiliate-notice-content, .affiliate-notice-content li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignmentMobile']),
        ),
      );

			$t_selectors = array(
       " .affiliate-notice-title " . $attr['titleTag1'] => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),
        " .affiliate-notice-content, .affiliate-notice-content li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),
      );


			// @codingStandardsIgnoreEnd

      $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
      $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
      $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

			$desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

			$tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

			$mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

			$generated_css = array(
				'desktop' => $desktop,
				'tablet'  => $tablet,
				'mobile'  => $mobile,
			);
			return $generated_css;
    }
    
    public static function blocks_abnotice_gfont($attr)
    {
      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
    }

    public static function get_abbutton_css( $attr, $id ) { 			// @codingStandardsIgnoreStart

			$defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-advance-button']['attributes'];

			$attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      } 

			$m_selectors = array();
			$t_selectors = array();

      $boxshadow = array();
        if (!empty($attr['btnShadow']['openShadow']) && $attr['btnShadow']['openShadow'] == 1) {
          if ($attr['btnShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['btnShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnShadow']['color']));
        }
 
			$selectors = array(
          " .affiliate-abbtn" => array(
              "box-shadow" => implode('',$boxshadow),
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
              //"background" => AFFILIATE_Helper::get_css_value($attr['btnBgColor']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['titleBorderColor']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['titleBorderType']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['titleBorder']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignment']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['titlePadding']['top'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['right'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['left'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['titleMargin']['top'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['right'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['left'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])),
          ),
          " .affiliate-abbtn-inner" => array(
              "justify-content" => AFFILIATE_Helper::get_css_value($attr['titleAlignment']),
          ),
          " .affiliate-abbtn:hover" => array(
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextHoverColor']),
              //"background" => AFFILIATE_Helper::get_css_value($attr['btnBgHoverColor']),
              "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['titleBorderHoverColor']),
          ),
        );

			
			$m_selectors = array(
        " .affiliate-abbtn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignmentMobile']),
        ),
      );

			$t_selectors = array(
       " .affiliate-abbtn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),
      );


      if($attr['btnBg']['openBg'] == 1){
        if($attr['btnBg']['bgType'] == 'gradient'){
          if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-abbtn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-abbtn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover']['openBg'] == 1){
        if($attr['btnBgHover']['bgType'] == 'gradient'){
          if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-abbtn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-abbtn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


			// @codingStandardsIgnoreEnd

      $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
      $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
      $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

			$desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

			$tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

			$mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

			$generated_css = array(
				'desktop' => $desktop,
				'tablet'  => $tablet,
				'mobile'  => $mobile,
			);
			return $generated_css;
    }

    public static function blocks_abbutton_gfont($attr)
    {
      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
    }

    public static function get_abnotification_css( $attr, $id ) { 			// @codingStandardsIgnoreStart

			$defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-notification-box']['attributes'];

			$attr = array_merge( $defaults, $attr );

			$m_selectors = array();
      $t_selectors = array();
      
      $boxshadow = array();
        if ($attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

			$selectors = array(
        " .affiliate-notification-inner" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customWidth'], $attr['customWidthType']),
            'box-shadow'=> implode('',$boxshadow),
        ),  
        " .affiliate-notification-content" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
              "background" => AFFILIATE_Helper::get_css_value($attr['cntnBgColor']),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['cntnBorderColor']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['cntnBorderType']),
              "border-width" => AFFILIATE_Helper::get_css_value1($attr['cntnBorder']['top'], AFFILIATE_Helper::get_css_value1($attr['cntnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value1($attr['cntnBorder']['right'], AFFILIATE_Helper::get_css_value1($attr['cntnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value1($attr['cntnBorder']['bottom'], AFFILIATE_Helper::get_css_value1($attr['cntnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value1($attr['cntnBorder']['left'], AFFILIATE_Helper::get_css_value1($attr['cntnBorder']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignment']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['cntnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['cntnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['cntnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['cntnPadding']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['cntnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['cntnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['cntnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['cntnMargin']['unit'])),
            ),

            " .affiliate-notification-content .affiliate-bg-icon" => array(
              "color" => AFFILIATE_Helper::get_css_value($attr['BgIconColor']),              
              "font-size" => AFFILIATE_Helper::get_css_value($attr['BgIconSize']), 
            ),

        );

			
			$m_selectors = array(
        " .affiliate-notification-inner" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customWidthMobile'], $attr['customWidthTypeTablet']),
        ),
        " .affiliate-notification-content" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignmentMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['cntnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['cntnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['cntnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['cntnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['cntnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['cntnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['cntnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['cntnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['cntnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['cntnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['cntnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['cntnMarginMobile']['unit'])),
        ),
      );

			$t_selectors = array(
        " .affiliate-notification-inner" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customWidthTablet'], $attr['customWidthTypeTablet']),
        ),
       " .affiliate-notification-content" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['cntnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['cntnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['cntnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['cntnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['cntnBorderRadius']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['cntnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['cntnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['cntnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['cntnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['cntnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['cntnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['cntnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['cntnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['cntnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['cntnMarginTablet']['unit'])),
          ),
      );


			// @codingStandardsIgnoreEnd

      $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
      $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
      $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

			$desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

			$tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

			$mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

			$generated_css = array(
				'desktop' => $desktop,
				'tablet'  => $tablet,
				'mobile'  => $mobile,
			);
			return $generated_css;
    }
    public static function blocks_abnotification_gfont($attr)
    {
      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
    }

    public static function get_abtoppick_css( $attr, $id ) { // @codingStandardsIgnoreStart
      
      $inset = '';
			$defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-toppick-box']['attributes'];

			$attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }

      $btnBg2 = '';
      if($attr['btnBg2']['openBg'] == 1){
          if($attr['btnBg2']['bgType'] == 'color'){
             $btnBg2 = $attr['btnBg2']['bgDefaultColor']; 
          }
      } 

      $btnBgHover2 = '';
      if($attr['btnBgHover2']['openBg'] == 1){
          if($attr['btnBgHover2']['bgType'] == 'color'){
             $btnBgHover2 = $attr['btnBgHover2']['bgDefaultColor']; 
          }
      }


      $btnBg3 = '';
      if($attr['btnBg3']['openBg'] == 1){
          if($attr['btnBg3']['bgType'] == 'color'){
             $btnBg3 = $attr['btnBg3']['bgDefaultColor']; 
          }
      } 

      $btnBgHover3 = '';
      if($attr['btnBgHover3']['openBg'] == 1){
          if($attr['btnBgHover3']['bgType'] == 'color'){
             $btnBgHover3 = $attr['btnBgHover3']['bgDefaultColor']; 
          }
      }


			$m_selectors = array();
			$t_selectors = array();

      $boxshadow = array();
        if ($attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

			$selectors = array(
        " .affiliate-tipbox" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['topPickfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeDesktop'], $attr['topPickfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['topPickfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['topPickfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacing'], $attr['topPickletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['topPicktextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['topPicktextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['topPickColor']),
            "background" => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
        ),
        " .affiliate-tipbox:after" => array(
              "border-right-color" => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
        ),
        " .affiliate-toppick-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])),
        ),
        " .affiliate-toppick-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth'],'px'),
        ),
        " .affiliate-tipbox-wrapper" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customWidth'], $attr['customWidthType']),
            'padding' => AFFILIATE_Helper::get_css_value($attr['boxPadding']['top'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['right'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['left'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['boxMargin']['top'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['right'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['left'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])),
            'border-style' => AFFILIATE_Helper::get_css_value($attr['boxBorderType']),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
            'border-width' => AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])),
            "box-shadow"=>implode(',',$boxshadow),
          ),
          " .affiliate-tipbox-title" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignment']),
          ),
          " .affiliate-tipbox-subtitle" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['subtitlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeDesktop'], $attr['subtitlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['subtitlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['subtitlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacing'], $attr['subtitleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['subtitletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['subtitletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['subtitleTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['subtitleAlignment']),
          ),
          " .affiliate-tipbox-cntn, .affiliate-tipbox-cntn li" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignment']),
              "flex-direction" => AFFILIATE_Helper::get_css_value($attr['imagePosition']),
          ),
          " .affiliate-tipbox-cntn li:before" => array(
             "color" => AFFILIATE_Helper::get_css_value($attr['iconColor']),
          ),    
          " .affiliate-tipbox-btn" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
          ),
          " .affiliate-tipbox-btn:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
          ),
          " .affiliate-tipbox-btn-wrapper" => array(
              "justify-content" => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
          ),


          " .affiliate-tipbox-btn.btn2" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily2']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop2'], $attr['btnfontSizeType2']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight2']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle2']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight2']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing2'], $attr['btnletterSpacingType2']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration2']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform2']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg2),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor2']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor2']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType2']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment2']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])),
          ),
          " .affiliate-tipbox-btn.btn2:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor2']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover2),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor2']),
          ),




          " .affiliate-tipbox-btn.btn3" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily3']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop3'], $attr['btnfontSizeType3']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight3']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle3']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight3']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing3'], $attr['btnletterSpacingType3']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration3']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform3']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg3),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor3']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor3']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType3']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment3']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])),
          ),
          " .affiliate-tipbox-btn.btn3:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor3']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover3),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor3']),
          ),


			);

			
			$m_selectors = array(
        " .affiliate-tipbox" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeMobile'], $attr['topPickfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacingMobile'], $attr['topPickletterSpacingTypeMobile']),
        ),
        " .affiliate-toppick-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])),
        ),
        " .affiliate-toppick-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile'],'px'),
        ),
        " .affiliate-tipbox-wrapper" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customWidthMobile'], $attr['customWidthTypeMobile']),  
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])),
        ),
        " .affiliate-tipbox-title" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignmentMobile']),
        ),
        " .affiliate-tipbox-subtitle" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeMobile'], $attr['subtitlefontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingMobile'], $attr['subtitleletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['subtitleAlignmentMobile']),
        ),
        " .affiliate-tipbox-cntn, .affiliate-tipbox-cntn li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignmentMobile']),
        ),
        " .affiliate-tipbox-btn" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
        ),

        " .affiliate-tipbox-btn.btn2" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile2'], $attr['btnfontSizeTypeMobile2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile2'], $attr['btnletterSpacingTypeMobile2']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])),
        ),


        " .affiliate-tipbox-btn.btn3" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile3'], $attr['btnfontSizeTypeMobile3']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile3']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile3'], $attr['btnletterSpacingTypeMobile3']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])),
        ),


			);

			$t_selectors = array(
        " .affiliate-tipbox" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeTablet'], $attr['topPickfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacingTablet'], $attr['topPickletterSpacingTypeTablet']),
        ),

        " .affiliate-tipbox-wrapper" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customWidthTablet'], $attr['customWidthTypeTablet']),
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])),
        ),
        " .affiliate-tipbox-title" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),
        " .affiliate-tipbox-subtitle" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeTablet'], $attr['subtitlefontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingTablet'], $attr['subtitleletterSpacingTypeTablet']),
      ),
      " .affiliate-toppick-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])),
        ),
        " .affiliate-toppick-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet'],'px'),
        ),
        " .affiliate-tipbox-cntn, .affiliate-tipbox-cntn li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),
        " .affiliate-tipbox-btn" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
        ),


        " .affiliate-tipbox-btn.btn2" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet2'], $attr['btnfontSizeTypeTablet2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet2'], $attr['btnletterSpacingTypeTablet2']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])),
        ),


        " .affiliate-tipbox-btn.btn3" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet3'], $attr['btnfontSizeTypeTablet3']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet3']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet3'], $attr['btnletterSpacingTypeTablet3']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])),
        ),


			);




      if($attr['btnBg']['openBg'] == 1){
        if($attr['btnBg']['bgType'] == 'gradient'){
          if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-tipbox-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-tipbox-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover']['openBg'] == 1){
        if($attr['btnBgHover']['bgType'] == 'gradient'){
          if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-tipbox-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-tipbox-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  



      if($attr['btnBg2']['openBg'] == 1){
        if($attr['btnBg2']['bgType'] == 'gradient'){
          if ($attr['btnBg2']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-tipbox-btn.btn2"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-tipbox-btn.btn2"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover2']['openBg'] == 1){
        if($attr['btnBgHover2']['bgType'] == 'gradient'){
          if ($attr['btnBgHover2']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-tipbox-btn.btn2:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-tipbox-btn.btn2:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
          }
        }
      }



      if($attr['btnBg3']['openBg'] == 1){
        if($attr['btnBg3']['bgType'] == 'gradient'){
          if ($attr['btnBg3']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-tipbox-btn.btn3"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-tipbox-btn.btn3"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover3']['openBg'] == 1){
        if($attr['btnBgHover3']['bgType'] == 'gradient'){
          if ($attr['btnBgHover3']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-tipbox-btn.btn3:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-tipbox-btn.btn3:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
          }
        }
      }


			// @codingStandardsIgnoreEnd

      $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
      $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
      $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

			$desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

			$tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

			$mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

			$generated_css = array(
				'desktop' => $desktop,
				'tablet'  => $tablet,
				'mobile'  => $mobile,
			);
			return $generated_css;
    }

    public static function blocks_abtoppick_gfont($attr)
    {
      
      $topPick_load_google_font = isset($attr['topBoxLoadGoogleFonts']) ? $attr['topBoxLoadGoogleFonts'] : '';
      $topPick_font_family      = isset($attr['topPickfontFamily']) ? $attr['topPickfontFamily'] : '';
      $topPick_font_weight      = isset($attr['topPickfontWeight']) ? $attr['topPickfontWeight'] : '';
      $topPick_font_subset      = isset($attr['topPickfontSubset']) ? $attr['topPickfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $subtitle_load_google_font = isset($attr['subtitleLoadGoogleFonts']) ? $attr['subtitleLoadGoogleFonts'] : '';
      $subtitle_font_family      = isset($attr['subtitlefontFamily']) ? $attr['subtitlefontFamily'] : '';
      $subtitle_font_weight      = isset($attr['subtitlefontWeight']) ? $attr['subtitlefontWeight'] : '';
      $subtitle_font_subset      = isset($attr['subtitlefontSubset']) ? $attr['subtitlefontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($topPick_load_google_font, $topPick_font_family, $topPick_font_weight, $topPick_font_subset);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
      AFFILIATE_Helper::blocks_google_font($subtitle_load_google_font, $subtitle_font_family, $subtitle_font_weight, $subtitle_font_subset);
    }

    public static function get_abpr_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-product-review']['attributes'];

      $attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }

      $btnBg2 = '';
      if($attr['btnBg2']['openBg'] == 1){
          if($attr['btnBg2']['bgType'] == 'color'){
             $btnBg2 = $attr['btnBg2']['bgDefaultColor']; 
          }
      } 

      $btnBgHover2 = '';
      if($attr['btnBgHover2']['openBg'] == 1){
          if($attr['btnBgHover2']['bgType'] == 'color'){
             $btnBgHover2 = $attr['btnBgHover2']['bgDefaultColor']; 
          }
      }


      $btnBg3 = '';
      if($attr['btnBg3']['openBg'] == 1){
          if($attr['btnBg3']['bgType'] == 'color'){
             $btnBg3 = $attr['btnBg3']['bgDefaultColor']; 
          }
      } 

      $btnBgHover3 = '';
      if($attr['btnBgHover3']['openBg'] == 1){
          if($attr['btnBgHover3']['bgType'] == 'color'){
             $btnBgHover3 = $attr['btnBgHover3']['bgDefaultColor']; 
          }
      }

      
			$m_selectors = array();
      $t_selectors = array();
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      
      $selectors = array(
        " .affiliate-pr-inner" => array(
            "box-shadow"=>implode(',',$boxshadow),
        ),
        " .affiliate-pr-image" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])),
        ),
        " .affiliate-pr-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth'],'px'),
        ),
        " .affiliate-pr-maintitle " .$attr['titleTag1'] => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
      ),
      " .affiliate-pr-inner .affiliate-propcon-title" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['subtitlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeDesktop'], $attr['subtitlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['subtitlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['subtitlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacing'], $attr['subtitleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['subtitletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['subtitletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['subtitleTextColor']),
       ),
      " .affiliate-pr-inner .affiliate-list li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeDesktop'], $attr['listfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['listfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacing'], $attr['listletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['listtextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['listtextTransform']),
        ),
        " .affiliate-pr-btn-wrapper" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
        ),   
      " .affiliate-pr-btn-wrapper .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
        ),
        " .affiliate-progress-text" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['progressfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeDesktop'], $attr['progressfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['progressfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['progressfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacing'], $attr['progressletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['progresstextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['progresstextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['progressTextColor']),
        ),
        " .affiliate-pr-review" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['rateSize'],'px'),
            'color' => AFFILIATE_Helper::get_css_value($attr['rateColor']),
        ),
        " .affiliate-progress-bar" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['progressWidth'],'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor']),
        ),
        " .affiliate-progress" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight'],'px'),
        ),
        " .affiliate-pr-inner .affiliate-props-title" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['propsTextColor']),
        ),
        " .affiliate-pr-inner .affiliate-const-title" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['consTextColor']),
        ),
        " .affiliate-pr-inner .affiliate-props-list li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['propsIconColor']),
        ),
        " .affiliate-pr-inner .affiliate-cons-list li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['consIconColor']),
        ),
        " .affiliate-pr-inner .affiliate-props-list li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['propsListColor']),
      ),
      " .affiliate-pr-inner .affiliate-cons-list li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['consListColor']),
      ),
      " .affiliate-pr-btn-wrapper .affiliate-btn:hover" => array(
          'background' => AFFILIATE_Helper::get_css_value($btnBgHover),
          'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
          'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
      ),
      " .affiliate-pr-maintitle" => array(
          'background' => AFFILIATE_Helper::get_css_value($attr['titleBgColor']),
      ),


      " .affiliate-pr-btn-wrapper .affiliate-btn.btn2" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily2']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop2'], $attr['btnfontSizeType2']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight2']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing2'], $attr['btnletterSpacingType2']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration2']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform2']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg2),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor2']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor2']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType2']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])),
        ),
        " .affiliate-pr-btn-wrapper .affiliate-btn.btn2:hover" => array(
          'background' => AFFILIATE_Helper::get_css_value($btnBgHover2),
          'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor2']),
          'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor2']),
        ),


        " .affiliate-pr-btn-wrapper .affiliate-btn.btn3" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily3']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop3'], $attr['btnfontSizeType3']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight3']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle3']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight3']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing3'], $attr['btnletterSpacingType3']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration3']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform3']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg3),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor3']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor3']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType3']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])),
        ),
        " .affiliate-pr-btn-wrapper .affiliate-btn.btn3:hover" => array(
          'background' => AFFILIATE_Helper::get_css_value($btnBgHover3),
          'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor3']),
          'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor3']),
        ),

    
      );
      
      $m_selectors = array(
        " .affiliate-pr-maintitle " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
        ),
        " .affiliate-pr-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])),
          ),
        " .affiliate-pr-image img" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile'],'px'),
       ),
        " .affiliate-pr-inner .affiliate-propcon-title" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeMobile'], $attr['subtitlefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingMobile'], $attr['subtitleletterSpacingTypeMobile']),
            
        ),
        " .affiliate-pr-inner .affiliate-list li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile'], $attr['listfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile'], $attr['listletterSpacingTypeMobile']),
          ),

        " .affiliate-pr-btn-wrapper .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
          ),
          " .affiliate-progress-text" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeMobile'], $attr['progressfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacingMobile'], $attr['progressletterSpacingTypeMobile']),
          ),


          " .affiliate-pr-btn-wrapper .affiliate-btn.btn2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile2'], $attr['btnfontSizeTypeMobile2']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile2']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile2'], $attr['btnletterSpacingTypeMobile2']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])),
          ),



          " .affiliate-pr-btn-wrapper .affiliate-btn.btn3" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile3'], $attr['btnfontSizeTypeMobile3']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile3']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile3'], $attr['btnletterSpacingTypeMobile3']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])),
          ),


      );

      $t_selectors = array(
        " .affiliate-pr-maintitle " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),
        " .affiliate-pr-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet'],'px'),
        ),
        " .affiliate-pr-inner .affiliate-propcon-title" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeTablet'], $attr['subtitlefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingTablet'], $attr['subtitleletterSpacingTypeTablet']),
            
        ),
        " .affiliate-pr-image" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])),
          ),
        " .affiliate-pr-inner .affiliate-list li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet'], $attr['listfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet'], $attr['listletterSpacingTypeTablet']),
          ),

        " .affiliate-pr-btn-wrapper .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
          ),
          " .affiliate-progress-text" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeTablet'], $attr['progressfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacingTablet'], $attr['progressletterSpacingTypeTablet']),
          ),


          " .affiliate-pr-btn-wrapper .affiliate-btn.btn2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet2'], $attr['btnfontSizeTypeTablet2']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet2']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet2'], $attr['btnletterSpacingTypeTablet2']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])),
          ),



          " .affiliate-pr-btn-wrapper .affiliate-btn.btn3" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet3'], $attr['btnfontSizeTypeTablet3']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet3']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet3'], $attr['btnletterSpacingTypeTablet3']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])),
          ),


      );

        
        if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'gradient'){
            if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'gradient'){
            if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  



        if($attr['btnBg2']['openBg'] == 1){
          if($attr['btnBg2']['bgType'] == 'gradient'){
            if ($attr['btnBg2']['bgGradient']['type'] == 'linear') {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn.btn2"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn.btn2"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover2']['openBg'] == 1){
          if($attr['btnBgHover2']['bgType'] == 'gradient'){
            if ($attr['btnBgHover2']['bgGradient']['type'] == 'linear') {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn.btn2:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn2:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
            }
          }
        }



        if($attr['btnBg3']['openBg'] == 1){
          if($attr['btnBg3']['bgType'] == 'gradient'){
            if ($attr['btnBg3']['bgGradient']['type'] == 'linear') {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn.btn3"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn.btn3"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover3']['openBg'] == 1){
          if($attr['btnBgHover3']['bgType'] == 'gradient'){
            if ($attr['btnBgHover3']['bgGradient']['type'] == 'linear') {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn.btn3:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .affiliate-pr-btn-wrapper .affiliate-btn.btn3:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
            }
          }
        }
    

      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function blocks_abpr_gfont($attr)
    {
      
      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $progress_load_google_font = isset($attr['progressLoadGoogleFonts']) ? $attr['progressLoadGoogleFonts'] : '';
      $progress_font_family      = isset($attr['progressfontFamily']) ? $attr['progressfontFamily'] : '';
      $progress_font_weight      = isset($attr['progressfontWeight']) ? $attr['progressfontWeight'] : '';
      $progress_font_subset      = isset($attr['progressfontSubset']) ? $attr['progressfontSubset'] : '';

      $subtitle_load_google_font = isset($attr['subtitleLoadGoogleFonts']) ? $attr['subtitleLoadGoogleFonts'] : '';
      $subtitle_font_family      = isset($attr['subtitlefontFamily']) ? $attr['subtitlefontFamily'] : '';
      $subtitle_font_weight      = isset($attr['subtitlefontWeight']) ? $attr['subtitlefontWeight'] : '';
      $subtitle_font_subset      = isset($attr['subtitlefontSubset']) ? $attr['subtitlefontSubset'] : '';

      $list_load_google_font = isset($attr['listLoadGoogleFonts']) ? $attr['listLoadGoogleFonts'] : '';
      $list_font_family      = isset($attr['listfontFamily']) ? $attr['listfontFamily'] : '';
      $list_font_weight      = isset($attr['listfontWeight']) ? $attr['listfontWeight'] : '';
      $list_font_subset      = isset($attr['listfontSubset']) ? $attr['listfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($list_load_google_font, $list_font_family, $list_font_weight, $list_font_subset);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($progress_load_google_font, $progress_font_family, $progress_font_weight, $progress_font_subset);
      AFFILIATE_Helper::blocks_google_font($subtitle_load_google_font, $subtitle_font_family, $subtitle_font_weight, $subtitle_font_subset);
    }

    public static function get_toc_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-tableof-content']['attributes'];

      $attr = array_merge( $defaults, $attr );
      
			$m_selectors = array();
      $t_selectors = array();
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      
      $selectors = array(
        " .affiliate-toc-wrap" => array(
            "width" => AFFILIATE_Helper::get_css_value($attr['customWidth'], $attr['customWidthType']),
            "background" => AFFILIATE_Helper::get_css_value($attr['boxBgColor']),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['borderColor']),
            "border-style" => AFFILIATE_Helper::get_css_value($attr['boxBorderType']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['boxBorder']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorder']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorder']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorder']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['boxBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadius']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['boxPadding']['top'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['right'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['left'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['boxMargin']['top'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['right'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['left'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])),
            "box-shadow" => implode('',$boxshadow),
        ),
        " .affiliate-toc-list-wrap" => array(
            "column-count" => AFFILIATE_Helper::get_css_value($attr['numberofColumns']),
        ),
        " .affiliate-toc-title" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
          ),
          " ol.affiliate-toc-list li, ul.affiliate-toc-list li" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
          ),
          " .affiliate-toc-list a" => array(
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
              "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
          ),
          " .affiliate-toc-list a:hover" => array(
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextHoverColor']),
          ), 
          " ol.affiliate-toc-list li:hover, ul.affiliate-toc-list li:hover" => array(
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextHoverColor']),
          ),
        );
      
      $m_selectors = array(
          " .affiliate-toc-wrap" => array(
              "width" => AFFILIATE_Helper::get_css_value($attr['customWidthMobile'], $attr['customWidthTypeMobile']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['boxBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderMobile']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusMobile']['unit'])),
              'padding' => AFFILIATE_Helper::get_css_value($attr['boxPadding']['top'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['right'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['left'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['boxMargin']['top'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['right'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['left'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])),
        ),
        " .affiliate-toc-list-wrap" => array(
           "column-count" => AFFILIATE_Helper::get_css_value($attr['numberofColumnsMobile']),
      ),
        " .affiliate-toc-title" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
        ),
        " .affiliate-toc-list a" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
        ),
      );

      $t_selectors = array(
        " .affiliate-toc-wrap" => array(
            "width" => AFFILIATE_Helper::get_css_value($attr['customWidthTablet'], $attr['customWidthTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['boxBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])),
        ),
        " .affiliate-toc-list-wrap" => array(
            "column-count" => AFFILIATE_Helper::get_css_value($attr['numberofColumnsTablet']),
        ),
        " .affiliate-toc-title" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
          ),
          " .affiliate-toc-list a" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
          ),
      );
      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function blocks_toc_gfont($attr)
    {
      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
    }

    public static function get_starating_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
    
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-star-rating']['attributes'];

      $attr = array_merge( $defaults, $attr );
      
			$m_selectors = array();
      $t_selectors = array();
      
      $selectors = array(
          " .affiliate-star-inner-container" => array(
              "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemt']), 
          ),
          " .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),
          ),

          " .affiliate-star-item:not(:last-child)" => array(
              'padding-right' => AFFILIATE_Helper::get_css_value($attr['itemPadding'], 'px'),
          ),
        );
      
      $m_selectors = array(
        " .affiliate-star-inner-container" => array(
          "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemtMobile']),  
      ),
      " .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),
      ),

      " .affiliate-star-item:not(:last-child)" => array(
          'padding-right' => AFFILIATE_Helper::get_css_value($attr['itemPaddingMobile'], 'px'),
      ),
      );

      $t_selectors = array(
        " .affiliate-star-inner-container" => array(
          "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemtTablet']),  
      ),
      " .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),
      ),

      " .affiliate-star-item:not(:last-child)" => array(
          'padding-right' => AFFILIATE_Helper::get_css_value($attr['itemPaddingTablet'], 'px'),
      ),
      );
      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function get_iconlist_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-icon-list']['attributes'];

      $attr = array_merge( $defaults, $attr );
      

			$m_selectors = array();
      $t_selectors = array();

      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }
      
      $selectors = array(
        " .affiliate-iconlist-inner" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPadding']['top'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['right'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['left'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMargin']['top'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['right'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['left'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])),
          "background"  => AFFILIATE_Helper::get_css_value($attr['bgColor']), 
          "box-shadow" => implode('' ,$boxshadow )
        ),
        " .affiliate-list li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeDesktop'], $attr['listfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['listfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacing'], $attr['listletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['listtextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['listtextTransform']),
            "color"  => AFFILIATE_Helper::get_css_value($attr['listTextColor']),
          ),
          " .affiliate-list" => array(
              "columns"=>AFFILIATE_Helper::get_css_value($attr['numberofColumns']),
          ),
          " .affiliate-list li:before" => array(
              "padding-right"  => AFFILIATE_Helper::get_css_value($attr['iconSpacing'], 'px'),
              "color"  => AFFILIATE_Helper::get_css_value($attr['listIconColor']),
              "font-size"  => AFFILIATE_Helper::get_css_value($attr['iconSize'], 'px'),
          ),
          " .affiliate-list li:not(:last-child)" => array(
                "padding-bottom"  => AFFILIATE_Helper::get_css_value($attr['itemSpacing'],'px'),
          ),
          // " .affiliate-list-img" => array(
          //     "padding-right" => AFFILIATE_Helper::get_css_value($attr['iconSpacing'],'px'),
          // ),
          // " .affiliate-list-img img" => array(
          //     "width" => AFFILIATE_Helper::get_css_value($attr['iconSize'],'px'),
          //     "max-width" => AFFILIATE_Helper::get_css_value($attr['iconSize'],'px'), 
          // ),
          " .aff-list-image > li:before" => array(
              "background-image" => "url('" .AFFILIATE_Helper::get_css_value($attr['image']['url']). "')",
              "margin-right" => AFFILIATE_Helper::get_css_value($attr['iconSpacing'],'px'),
              "height" => AFFILIATE_Helper::get_css_value($attr['iconSize'],'px'), 
              "width" => AFFILIATE_Helper::get_css_value($attr['iconSize'],'px'),
          ),
      );
      
      $m_selectors = array(
        " .affiliate-iconlist-inner" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])),
        ),
        " .affiliate-list-item" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile'], $attr['listfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile'], $attr['listletterSpacingTypeMobile']),
          ),
          " .affiliate-list" => array(
              "columns"=>AFFILIATE_Helper::get_css_value($attr['numberofColumnsMobile']),
          ),
          " .affiliate-list-item:before" => array(
              "padding-right"  => AFFILIATE_Helper::get_css_value($attr['iconSpacingMobile'], 'px'),
              "font-size"  => AFFILIATE_Helper::get_css_value($attr['iconSizeMobile'], 'px'),
          ),
          " .affiliate-list-item:not(:last-child)" => array(
                "padding-bottom"  => AFFILIATE_Helper::get_css_value($attr['itemSpacingMobile'],'px'),
          ),
      );

      $t_selectors = array(
        " .affiliate-iconlist-inner" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])),
        ),
        " .affiliate-list-item" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet'], $attr['listfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet'], $attr['listletterSpacingTypeTablet']),
          ),
          " .affiliate-list" => array(
              "columns"=>AFFILIATE_Helper::get_css_value($attr['numberofColumnsTablet']),
          ),
          " .affiliate-list-item:before" => array(
              "padding-right"  => AFFILIATE_Helper::get_css_value($attr['iconSpacingTablet'], 'px'),
              "font-size"  => AFFILIATE_Helper::get_css_value($attr['iconSizeTablet'], 'px'),
          ),
          " .affiliate-list-item:not(:last-child)" => array(
                "padding-bottom"  => AFFILIATE_Helper::get_css_value($attr['itemSpacingTablet'],'px'),
          ),
      );
      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function blocks_iconlist_gfont($attr)
    {
      
      $list_load_google_font = isset($attr['listLoadGoogleFonts']) ? $attr['listLoadGoogleFonts'] : '';
      $list_font_family      = isset($attr['listfontFamily']) ? $attr['listfontFamily'] : '';
      $list_font_weight      = isset($attr['listfontWeight']) ? $attr['listfontWeight'] : '';
      $list_font_subset      = isset($attr['listfontSubset']) ? $attr['listfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($list_load_google_font, $list_font_family, $list_font_weight, $list_font_subset);
    }

    public static function get_dynamicblock_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-dynamic-block']['attributes'];

      $attr = array_merge( $defaults, $attr );

			$m_selectors = array();
      $t_selectors = array();
  
      $selectors = array(
        " .affiliate-dynamic-inner" => array(
          "background" => AFFILIATE_Helper::get_css_value($attr['bgColor']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['titleBorderColor']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['titleBorderType']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['titleBorder']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['titlePadding']['top'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['right'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['left'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['titleMargin']['top'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['right'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['left'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])),
        ),
      );
      
      $m_selectors = array(
        " .affiliate-dynamic-inner" => array(
          "border-width" => AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['unit'])),
        ),
      );

      $t_selectors = array(
        " .affiliate-dynamic-inner" => array(
            "border-width" => AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['unit'])),
        ),
      );
      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function get_title_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-title-block']['attributes'];

      $attr = array_merge( $defaults, $attr );
      

			$m_selectors = array();
      $t_selectors = array();
  
      $selectors = array(
        " .affiliate-title-inner" => array(
            "border-color" => AFFILIATE_Helper::get_css_value($attr['titleBorderColor']),
            "border-style" => AFFILIATE_Helper::get_css_value($attr['titleBorderType']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['titleBorder']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorder']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadius']['unit'])),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignment']),
            'padding' => AFFILIATE_Helper::get_css_value($attr['titlePadding']['top'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['right'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePadding']['left'], AFFILIATE_Helper::get_css_value($attr['titlePadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['titleMargin']['top'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['right'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMargin']['left'], AFFILIATE_Helper::get_css_value($attr['titleMargin']['unit'])),
            "background" => AFFILIATE_Helper::get_css_value($attr['BackgroundColor']),
        ),


        " .affiliate-title" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),            
        ),

        " .affiliate-title-divider" => array( 
            "border-color" => AFFILIATE_Helper::get_css_value($attr['DividerBorderColor']),            
            "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignment']),
        ),



      );
      
      $m_selectors = array(
        " .affiliate-title-inner" => array(
            "border-width" => AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusMobile']['unit'])),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignmentMobile']),
            'padding' => AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['titlePaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['titleMarginMobile']['unit'])),
            "background" => AFFILIATE_Helper::get_css_value($attr['BackgroundColor']),
        ),


        " .affiliate-title" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
            
        ),


       

      );

      $t_selectors = array(
        " .affiliate-title-inner" => array(
            "border-width" => AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['titleBorderRadiusTablet']['unit'])),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignmentTablet']),
            'padding' => AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['titlePaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['titleMarginTablet']['unit'])),
            "background" => AFFILIATE_Helper::get_css_value($attr['BackgroundColor']),
        ),


        " .affiliate-title" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
            
        ),


        

      );
      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function blocks_title_gfont($attr)
    {
      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
    }


    //@VICKY NEW BLOCKS
    public static function get_coupon1_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-coupon1']['attributes'];

      $attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }
      
      $m_selectors = array();
      $t_selectors = array();
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      
      $selectors = array(
        " .affiliate-coupon-inner" => array(
            "box-shadow"=>implode(',',$boxshadow),
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor']),
        ),

         " .affiliate-coupon-starrating" => array(
              "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemt']), 
          ),
          " .affiliate-coupon-starrating .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),
          ),

        " .affiliate-coupon-imagetop" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['top'], AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['right'], AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['left'], AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['unit'])),
        ),
        " .affiliate-coupon-imagetop img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customTopImgWidth'],'px'),
        ),


        " .affiliate-coupon-image" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])),
        ),
        " .affiliate-coupon-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth'],'px'),
        ),


        " .affiliate-coupon-imagebottom" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['top'], AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['right'], AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['left'], AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['unit'])),
        ),
        " .affiliate-coupon-imagebottom img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customBottomImgWidth'],'px'),
        ),



        " .affiliate-coupon-maintitle " => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
      ),        
      " .affiliate-coupon-inner .affiliate-coupon-content" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['contentfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['contentfontSizeDesktop'], $attr['contentfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['contentfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['contentfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['contentlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['contentletterSpacing'], $attr['contentletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['contenttextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['contenttextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['contentTextColor']),
       ),
      " .affiliate-coupon-inner .affiliate-list.first li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeDesktop'], $attr['listfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['listfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacing'], $attr['listletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['listtextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['listtextTransform']),
        ),
        " .affiliate-coupon-btn-wrapper" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
        ),   
        " .affiliate-coupon-inner .affiliate-list.second li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['list2fontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['list2fontSizeDesktop'], $attr['list2fontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['list2fontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['list2fontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['list2lineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['list2letterSpacing'], $attr['list2letterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['list2textDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['list2textTransform']),
        ),

        " .affiliate-coupon-inner .thirdcol .affiliate-coupon-priceBox1" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['actualPricefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['actualPricefontSizeDesktop'], $attr['actualPricefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['actualPricefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['actualPricefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['actualPricelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['actualPriceletterSpacing'], $attr['actualPriceletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['actualPricetextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['actualPricetextTransform']),
        ),


        " .affiliate-coupon-inner .thirdcol .affiliate-coupon-priceBox2" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['discountPricefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['discountPricefontSizeDesktop'], $attr['discountPricefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['discountPricefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['discountPricefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['discountPricelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['discountPriceletterSpacing'], $attr['discountPriceletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['discountPricetextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['discountPricetextTransform']),
        ),


        " .affiliate-coupon-inner .thirdcol .affiliate-coupon-priceBox3" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['savingPricefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['savingPricefontSizeDesktop'], $attr['savingPricefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['savingPricefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['savingPricefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['savingPricelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['savingPriceletterSpacing'], $attr['savingPriceletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['savingPricetextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['savingPricetextTransform']),
        ),


        " .affiliate-coupon-btn-wrapper" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
        ),   
      " .affiliate-coupon-btn-wrapper .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
        ),
        " .affiliate-progress-text" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['progressfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeDesktop'], $attr['progressfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['progressfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['progressfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacing'], $attr['progressletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['progresstextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['progresstextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['progressTextColor']),
        ),
        " .affiliate-coupon-review" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['rateSize'],'px'),
            'color' => AFFILIATE_Helper::get_css_value($attr['rateColor']),
        ),
        " .affiliate-progress-bar" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['progressWidth'],'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor']),
        ),
        " .affiliate-progress" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight'],'px'),
        ),
        " .affiliate-coupon-inner .affiliate-couponTextColor" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['couponTextColor']),
        ),
        " .affiliate-coupon-inner .affiliate-couponTextColor2" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['couponTextColor2']),
        ),
        " .affiliate-coupon-inner .affiliate-coupon-list-one li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['couponIconColor']),
        ),
        " .affiliate-coupon-inner .affiliate-coupon-list-two li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['couponIconColor2']),
        ),
        " .affiliate-coupon-inner .affiliate-coupon-list-one li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['couponListColor']),
      ),
      " .affiliate-coupon-inner .affiliate-coupon-list-two li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['couponListColor1']),
      ),
      " .affiliate-coupon-btn-wrapper .affiliate-btn:hover" => array(
          'background' => AFFILIATE_Helper::get_css_value($btnBgHover),
          'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
          'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
      ),
     
    
      );
      
      $m_selectors = array(
        " .affiliate-coupon-maintitle " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
        ),

         " .affiliate-coupon-starrating" => array(
          "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemtMobile']),  
      ),
      " .affiliate-coupon-starrating .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),
      ),

        " .affiliate-coupon-imagetop" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['unit'])),
          ),
        " .affiliate-coupon-imagetop img" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customTopImgWidthMobile'],'px'),
       ),


        " .affiliate-coupon-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])),
          ),
        " .affiliate-coupon-image img" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile'],'px'),
       ),

        " .affiliate-coupon-imagebottom" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['unit'])),
          ),
        " .affiliate-coupon-imagebottom img" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customBottomImgWidthMobile'],'px'),
       ),


        " .affiliate-coupon-inner .affiliate-coupon-content" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['contentfontSizeMobile'], $attr['contentfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['contentlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['contentletterSpacingMobile'], $attr['contentletterSpacingTypeMobile']),
            
        ),
        " .affiliate-coupon-inner .affiliate-list.first li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile'], $attr['listfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile'], $attr['listletterSpacingTypeMobile']),
          ),

       	" .affiliate-coupon-inner .affiliate-list.second li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['list2fontSizeMobile'], $attr['list2fontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['list2lineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['list2letterSpacingMobile'], $attr['list2letterSpacingTypeMobile']),
          ),

        " .affiliate-coupon-inner .thirdcol .affiliate-coupon-priceBox1" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['actualPricefontSizeMobile'], $attr['actualPricefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['actualPricelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['actualPriceletterSpacingMobile'], $attr['actualPriceletterSpacingTypeMobile']),
          ),


        " .affiliate-coupon-inner .thirdcol .affiliate-coupon-priceBox2" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['discountPricefontSizeMobile'], $attr['discountPricefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['discountPricelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['discountPriceletterSpacingMobile'], $attr['discountPriceletterSpacingTypeMobile']),
          ),

        " .affiliate-coupon-inner .thirdcol .affiliate-coupon-priceBox3" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['savingPricefontSizeMobile'], $attr['savingPricefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['savingPricelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['savingPriceletterSpacingMobile'], $attr['savingPriceletterSpacingTypeMobile']),
          ),


        " .affiliate-coupon-btn-wrapper .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
          ),
          " .affiliate-progress-text" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeMobile'], $attr['progressfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacingMobile'], $attr['progressletterSpacingTypeMobile']),
          ),
      );

      $t_selectors = array(
        " .affiliate-coupon-maintitle " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),

        " .affiliate-coupon-starrating" => array(
          "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemtTablet']),  
      ),
      " .affiliate-coupon-starrating .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),
      ),

        " .affiliate-coupon-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet'],'px'),
        ),
        " .affiliate-coupon-inner .affiliate-coupon-content" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['contentfontSizeTablet'], $attr['contentfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['contentlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['contentletterSpacingTablet'], $attr['contentletterSpacingTypeTablet']),
            
        ),
        " .affiliate-coupon-image" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])),
          ),


        " .affiliate-coupon-imagetop img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customTopImgWidthTablet'],'px'),
        ),
        " .affiliate-coupon-imagetop" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['unit'])),
          ),


        " .affiliate-coupon-imagebottom img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customBottomImgWidthTablet'],'px'),
        ),
        " .affiliate-coupon-imagebottom" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['unit'])),
          ),


        " .affiliate-coupon-inner .affiliate-list.first li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet'], $attr['listfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet'], $attr['listletterSpacingTypeTablet']),
          ),

        " .affiliate-coupon-inner .affiliate-list.second li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['list2fontSizeTablet'], $attr['list2fontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['list2lineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['list2letterSpacingTablet'], $attr['list2letterSpacingTypeTablet']),
          ),

        " .affiliate-coupon-inner .thirdcol .affiliate-coupon-priceBox1" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['actualPricefontSizeTablet'], $attr['actualPricefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['actualPricelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['actualPriceletterSpacingTablet'], $attr['actualPriceletterSpacingTypeTablet']),
          ),

        " .affiliate-coupon-inner .thirdcol .affiliate-coupon-priceBox2" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['discountPricefontSizeTablet'], $attr['discountPricefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['discountPricelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['discountPriceletterSpacingTablet'], $attr['discountPriceletterSpacingTypeTablet']),
          ),

         " .affiliate-coupon-inner .thirdcol .affiliate-coupon-priceBox3" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['savingPricefontSizeTablet'], $attr['savingPricefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['savingPricelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['savingPriceletterSpacingTablet'], $attr['savingPriceletterSpacingTypeTablet']),
          ),

        " .affiliate-coupon-btn-wrapper .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
          ),
          " .affiliate-progress-text" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeTablet'], $attr['progressfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacingTablet'], $attr['progressletterSpacingTypeTablet']),
          ),
      );

        
        if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'gradient'){
            if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
              $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'gradient'){
            if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
              $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function blocks_coupon1_gfont($attr)
    {
      
      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $progress_load_google_font = isset($attr['progressLoadGoogleFonts']) ? $attr['progressLoadGoogleFonts'] : '';
      $progress_font_family      = isset($attr['progressfontFamily']) ? $attr['progressfontFamily'] : '';
      $progress_font_weight      = isset($attr['progressfontWeight']) ? $attr['progressfontWeight'] : '';
      $progress_font_subset      = isset($attr['progressfontSubset']) ? $attr['progressfontSubset'] : '';

      $content_load_google_font = isset($attr['contentLoadGoogleFonts']) ? $attr['contentLoadGoogleFonts'] : '';
      $content_font_family      = isset($attr['contentfontFamily']) ? $attr['contentfontFamily'] : '';
      $content_font_weight      = isset($attr['contentfontWeight']) ? $attr['contentfontWeight'] : '';
      $content_font_subset      = isset($attr['contentfontSubset']) ? $attr['contentfontSubset'] : '';

      $list_load_google_font = isset($attr['listLoadGoogleFonts']) ? $attr['listLoadGoogleFonts'] : '';
      $list_font_family      = isset($attr['listfontFamily']) ? $attr['listfontFamily'] : '';
      $list_font_weight      = isset($attr['listfontWeight']) ? $attr['listfontWeight'] : '';
      $list_font_subset      = isset($attr['listfontSubset']) ? $attr['listfontSubset'] : '';

      $list2_load_google_font = isset($attr['list2LoadGoogleFonts']) ? $attr['list2LoadGoogleFonts'] : '';
      $list2_font_family      = isset($attr['list2fontFamily']) ? $attr['list2fontFamily'] : '';
      $list2_font_weight      = isset($attr['list2fontWeight']) ? $attr['list2fontWeight'] : '';
      $list2_font_subset      = isset($attr['list2fontSubset']) ? $attr['list2fontSubset'] : '';


      $actualPrice_load_google_font = isset($attr['actualPriceLoadGoogleFonts']) ? $attr['actualPriceLoadGoogleFonts'] : '';
      $actualPrice_font_family      = isset($attr['actualPricefontFamily']) ? $attr['actualPricefontFamily'] : '';
      $actualPrice_font_weight      = isset($attr['actualPricefontWeight']) ? $attr['actualPricefontWeight'] : '';
      $actualPrice_font_subset      = isset($attr['actualPricefontSubset']) ? $attr['actualPricefontSubset'] : '';


      $discountPrice_load_google_font = isset($attr['discountPriceLoadGoogleFonts']) ? $attr['discountPriceLoadGoogleFonts'] : '';
      $discountPrice_font_family      = isset($attr['discountPricefontFamily']) ? $attr['discountPricefontFamily'] : '';
      $discountPrice_font_weight      = isset($attr['discountPricefontWeight']) ? $attr['discountPricefontWeight'] : '';
      $discountPrice_font_subset      = isset($attr['discountPricefontSubset']) ? $attr['discountPricefontSubset'] : '';


      $savingPrice_load_google_font = isset($attr['savingPriceLoadGoogleFonts']) ? $attr['savingPriceLoadGoogleFonts'] : '';
      $savingPrice_font_family      = isset($attr['savingPricefontFamily']) ? $attr['savingPricefontFamily'] : '';
      $savingPrice_font_weight      = isset($attr['savingPricefontWeight']) ? $attr['savingPricefontWeight'] : '';
      $savingPrice_font_subset      = isset($attr['savingPricefontSubset']) ? $attr['savingPricefontSubset'] : '';


      AFFILIATE_Helper::blocks_google_font($list_load_google_font, $list_font_family, $list_font_weight, $list_font_subset);
      AFFILIATE_Helper::blocks_google_font($list2_load_google_font, $list2_font_family, $list2_font_weight, $list2_font_subset);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($progress_load_google_font, $progress_font_family, $progress_font_weight, $progress_font_subset);
      AFFILIATE_Helper::blocks_google_font($content_load_google_font, $content_font_family, $content_font_weight, $content_font_subset);


      AFFILIATE_Helper::blocks_google_font($actualPrice_load_google_font, $actualPrice_font_family, $actualPrice_font_weight, $actualPrice_font_subset);

      AFFILIATE_Helper::blocks_google_font($discountPrice_load_google_font, $discountPrice_font_family, $discountPrice_font_weight, $discountPrice_font_subset);

      AFFILIATE_Helper::blocks_google_font($savingPrice_load_google_font, $savingPrice_font_family, $savingPrice_font_weight, $savingPrice_font_subset);

    }

    public static function get_coupon2_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-coupon2']['attributes'];

      $attr = array_merge( $defaults, $attr );


      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }

      $btnBg2 = '';
      if($attr['btnBg2']['openBg'] == 1){
          if($attr['btnBg2']['bgType'] == 'color'){
             $btnBg2 = $attr['btnBg2']['bgDefaultColor']; 
          }
      } 

      $btnBgHover2 = '';
      if($attr['btnBgHover2']['openBg'] == 1){
          if($attr['btnBgHover2']['bgType'] == 'color'){
             $btnBgHover2 = $attr['btnBgHover2']['bgDefaultColor']; 
          }
      }


      $btnBg3 = '';
      if($attr['btnBg3']['openBg'] == 1){
          if($attr['btnBg3']['bgType'] == 'color'){
             $btnBg3 = $attr['btnBg3']['bgDefaultColor']; 
          }
      } 

      $btnBgHover3 = '';
      if($attr['btnBgHover3']['openBg'] == 1){
          if($attr['btnBgHover3']['bgType'] == 'color'){
             $btnBgHover3 = $attr['btnBgHover3']['bgDefaultColor']; 
          }
      }


      $btnBg4 = '';
      if($attr['btnBg4']['openBg'] == 1){
          if($attr['btnBg4']['bgType'] == 'color'){
             $btnBg4 = $attr['btnBg4']['bgDefaultColor']; 
          }
      } 

      $btnBgHover4 = '';
      if($attr['btnBgHover4']['openBg'] == 1){
          if($attr['btnBgHover4']['bgType'] == 'color'){
             $btnBgHover4 = $attr['btnBgHover4']['bgDefaultColor']; 
          }
      }

      $btnBg5 = '';
      if($attr['btnBg5']['openBg'] == 1){
          if($attr['btnBg5']['bgType'] == 'color'){
             $btnBg5 = $attr['btnBg5']['bgDefaultColor']; 
          }
      } 

      $btnBgHover5 = '';
      if($attr['btnBgHover5']['openBg'] == 1){
          if($attr['btnBgHover5']['bgType'] == 'color'){
             $btnBgHover5 = $attr['btnBgHover5']['bgDefaultColor']; 
          }
      }


      $btnBg6 = '';
      if($attr['btnBg6']['openBg'] == 1){
          if($attr['btnBg6']['bgType'] == 'color'){
             $btnBg6 = $attr['btnBg6']['bgDefaultColor']; 
          }
      } 

      $btnBgHover6 = '';
      if($attr['btnBgHover6']['openBg'] == 1){
          if($attr['btnBgHover6']['bgType'] == 'color'){
             $btnBgHover6 = $attr['btnBgHover6']['bgDefaultColor']; 
          }
      }
  
      $btnBg7 = '';
      if($attr['btnBg7']['openBg'] == 1){
          if($attr['btnBg7']['bgType'] == 'color'){
             $btnBg7 = $attr['btnBg7']['bgDefaultColor']; 
          }
      } 

      $btnBgHover7 = '';
      if($attr['btnBgHover7']['openBg'] == 1){
          if($attr['btnBgHover7']['bgType'] == 'color'){
             $btnBgHover7 = $attr['btnBgHover7']['bgDefaultColor']; 
          }
      }      
      
      $m_selectors = array();
      $t_selectors = array();
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      
      $selectors = array(

        " .affiliate-coupon-inner.style2 .affiliate-block-col" => array(
            "box-shadow"=>implode(',',$boxshadow),
        ),

        " .affiliate-coupon-inner.style2 .affiliate-block-col.box1" => array(
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor1']),
        ),
        " .box1 .affiliate-coupon-starrating1 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSize1'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSize1'], 'px'),
        ),
        " .box1 .affiliate-coupon-image1" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding1']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding1']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding1']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding1']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding1']['unit'])),
        ),
        " .box1 .affiliate-coupon-image1 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth1'],'px'),
        ),
        " .box1 .affiliate-coupon-title1 " => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily1']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop1'], $attr['titlefontSizeType1']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight1']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle1']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight1']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing1'], $attr['titleletterSpacingType1']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration1']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform1']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor1']),
        ),        
        " .box1 .affiliate-list1 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily1']),            
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight1']),
        ),
        " .box1 .affiliate-coupon-btn-wrapper1" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment1']),
        ),   
        
        " .affiliate-coupon-btn-wrapper1" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment1']),
        ),   
        " .box1 .affiliate-coupon-btn-wrapper1 .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily1']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop1'], $attr['btnfontSizeType1']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight1']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle1']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight1']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing1'], $attr['btnletterSpacingType1']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration1']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform1']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor1']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor1']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType1']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder1']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder1']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder1']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder1']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius1']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius1']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius1']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius1']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding1']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding1']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding1']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding1']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin1']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin1']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin1']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin1']['unit'])),
        ),
        " .box1 .affiliate-coupon-btn-wrapper1 .affiliate-btn:hover" => array(
            'background' => AFFILIATE_Helper::get_css_value($btnBgHover),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor1']),
            'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor1']),
        ),     
        " .box1 .affiliate-coupon-list1 li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['listColor1']),
        ),

        " .box1 .affiliate-coupon-list1 li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['listIconColor1']),
        ),


        //Box2
        " .affiliate-coupon-inner.style2 .affiliate-block-col.box2" => array(
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor2']),
        ),
        " .box2 .affiliate-coupon-starrating2 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSize2'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSize2'], 'px'),
        ),
        " .box2 .affiliate-coupon-image2" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding2']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding2']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding2']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding2']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding2']['unit'])),
        ),
        " .box2 .affiliate-coupon-image2 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth2'],'px'),
        ),
        " .box2 .affiliate-coupon-title2 " => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily2']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop2'], $attr['titlefontSizeType2']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight2']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle2']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight2']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing2'], $attr['titleletterSpacingType2']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration2']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform2']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor2']),
        ),        
        " .box2 .affiliate-list2 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily2']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight2']),
        ),
        " .box2 .affiliate-coupon-btn-wrapper2" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment2']),
        ),   
        " .affiliate-coupon-btn-wrapper2" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment2']),
        ),   
        " .box2 .affiliate-coupon-btn-wrapper2 .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily2']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop2'], $attr['btnfontSizeType2']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight2']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing2'], $attr['btnletterSpacingType2']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration2']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform2']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg2),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor2']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor2']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType2']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])),
        ),
        " .box2 .affiliate-coupon-btn-wrapper2 .affiliate-btn:hover" => array(
            'background' => AFFILIATE_Helper::get_css_value($btnBgHover2),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor2']),
            'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor2']),
        ),
        " .box2 .affiliate-coupon-list2 li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['listColor2']),
        ),
        " .box2 .affiliate-coupon-list2 li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['listIconColor2']),
        ),


        //Box3
        " .affiliate-coupon-inner.style2 .affiliate-block-col.box3" => array(
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor3']),
        ),
        " .box3 .affiliate-coupon-starrating3 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSize3'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSize3'], 'px'),
        ),
        " .box3 .affiliate-coupon-image3" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding3']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding3']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding3']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding3']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding3']['unit'])),
        ),
        " .box3 .affiliate-coupon-image3 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth3'],'px'),
        ),
        " .box3 .affiliate-coupon-title3 " => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily3']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop3'], $attr['titlefontSizeType3']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight3']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle3']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight3']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing3'], $attr['titleletterSpacingType3']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration3']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform3']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor3']),
        ),        
        " .box3 .affiliate-list3 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily3']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight3']),
        ),
        " .box3 .affiliate-coupon-btn-wrapper3" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment3']),
        ),   
        
        " .affiliate-coupon-btn-wrapper3" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment3']),
        ),   
        " .box3 .affiliate-coupon-btn-wrapper3 .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily3']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop3'], $attr['btnfontSizeType3']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight3']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle3']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight3']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing3'], $attr['btnletterSpacingType3']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration3']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform3']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg3),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor3']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor3']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType3']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])),
        ),
        " .box3 .affiliate-coupon-btn-wrapper3 .affiliate-btn:hover" => array(
            'background' => AFFILIATE_Helper::get_css_value($btnBgHover3),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor3']),
            'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor3']),
        ),   
        " .box3 .affiliate-coupon-list3 li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['listColor3']),
        ),
        " .box3 .affiliate-coupon-list3 li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['listIconColor3']),
        ),



        //Box4
        " .affiliate-coupon-inner.style2 .affiliate-block-col.box4" => array(
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor4']),
        ),
        " .box4 .affiliate-coupon-starrating4 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSize4'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSize4'], 'px'),
        ),
        " .box4 .affiliate-coupon-image4" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding4']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding4']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding4']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding4']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding4']['unit'])),
        ),
        " .box4 .affiliate-coupon-image4 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth4'],'px'),
        ),
        " .box4 .affiliate-coupon-title4 " => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily4']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop4'], $attr['titlefontSizeType4']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight4']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle4']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight4']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing4'], $attr['titleletterSpacingType4']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration4']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform4']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor4']),
        ),        
        " .box4 .affiliate-list4 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily4']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight4']),
        ),
        " .box4 .affiliate-coupon-btn-wrapper4" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment4']),
        ),   
        
        " .affiliate-coupon-btn-wrapper4" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment4']),
        ),   
        " .box4 .affiliate-coupon-btn-wrapper4 .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily4']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop4'], $attr['btnfontSizeType4']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight4']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle4']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight4']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing4'], $attr['btnletterSpacingType4']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration4']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform4']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg4),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor4']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor4']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType4']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder4']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder4']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder4']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder4']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius4']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius4']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius4']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius4']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding4']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding4']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding4']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding4']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin4']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin4']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin4']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin4']['unit'])),
        ),
        " .box4 .affiliate-coupon-btn-wrapper4 .affiliate-btn:hover" => array(
            'background' => AFFILIATE_Helper::get_css_value($btnBgHover4),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor4']),
            'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor4']),
        ),   
        " .box4 .affiliate-coupon-list4 li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['listColor4']),
        ),
        " .box4 .affiliate-coupon-list4 li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['listIconColor4']),
        ),


        //Box5
        " .affiliate-coupon-inner.style2 .affiliate-block-col.box5" => array(
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor5']),
        ),
        " .box5 .affiliate-coupon-starrating5 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSize5'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSize5'], 'px'),
        ),
        " .box5 .affiliate-coupon-image5" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding5']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding5']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding5']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding5']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding5']['unit'])),
        ),
        " .box5 .affiliate-coupon-image5 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth5'],'px'),
        ),
        " .box5 .affiliate-coupon-title5 " => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily5']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop5'], $attr['titlefontSizeType5']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight5']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle5']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight5']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing5'], $attr['titleletterSpacingType5']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration5']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform5']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor5']),
        ),        
        " .box5 .affiliate-list5 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily5']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight5']),
        ),
        " .box5 .affiliate-coupon-btn-wrapper5" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment5']),
        ),   
        
        " .affiliate-coupon-btn-wrapper5" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment5']),
        ),   
        " .box5 .affiliate-coupon-btn-wrapper5 .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily5']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop5'], $attr['btnfontSizeType5']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight5']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle5']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight5']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing5'], $attr['btnletterSpacingType5']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration5']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform5']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg5),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor5']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor5']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType5']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder5']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder5']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder5']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder5']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius5']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius5']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius5']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius5']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding5']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding5']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding5']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding5']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin5']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin5']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin5']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin5']['unit'])),
        ),
        " .box5 .affiliate-coupon-btn-wrapper5 .affiliate-btn:hover" => array(
            'background' => AFFILIATE_Helper::get_css_value($btnBgHover5),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor5']),
            'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor5']),
        ),   
        " .box5 .affiliate-coupon-list5 li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['listColor5']),
        ),
        " .box5 .affiliate-coupon-list5 li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['listIconColor5']),
        ),



        //Box6
        " .affiliate-coupon-inner.style2 .affiliate-block-col.box6" => array(
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor6']),
        ),
        " .box6 .affiliate-coupon-starrating6 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSize6'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSize6'], 'px'),
        ),
        " .box6 .affiliate-coupon-image6" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding6']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding6']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding6']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding6']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding6']['unit'])),
        ),
        " .box6 .affiliate-coupon-image6 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth6'],'px'),
        ),
        " .box6 .affiliate-coupon-title6 " => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily6']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop6'], $attr['titlefontSizeType6']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight6']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle6']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight6']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing6'], $attr['titleletterSpacingType6']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration6']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform6']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor6']),
        ),        
        " .box6 .affiliate-list6 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily6']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight6']),
        ),
        " .box6 .affiliate-coupon-btn-wrapper6" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment6']),
        ),   
        
        " .affiliate-coupon-btn-wrapper6" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment6']),
        ),   
        " .box6 .affiliate-coupon-btn-wrapper6 .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily6']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop6'], $attr['btnfontSizeType6']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight6']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle6']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight6']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing6'], $attr['btnletterSpacingType6']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration6']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform6']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg6),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor6']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor6']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType6']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder6']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder6']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder6']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder6']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius6']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius6']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius6']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius6']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding6']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding6']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding6']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding6']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin6']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin6']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin6']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin6']['unit'])),
        ),
        " .box6 .affiliate-coupon-btn-wrapper6 .affiliate-btn:hover" => array(
            'background' => AFFILIATE_Helper::get_css_value($btnBgHover6),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor6']),
            'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor6']),
        ),   
        " .box6 .affiliate-coupon-list6 li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['listColor6']),
        ),
        " .box6 .affiliate-coupon-list6 li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['listIconColor6']),
        ),


        //Box7
        " .affiliate-coupon-inner.style2 .affiliate-block-col.box7" => array(
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor7']),
        ),
        " .box7 .affiliate-coupon-starrating7 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSize7'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSize7'], 'px'),
        ),
        " .box7 .affiliate-coupon-image7" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding7']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding7']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding7']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding7']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding7']['unit'])),
        ),
        " .box7 .affiliate-coupon-image7 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth7'],'px'),
        ),
        " .box7 .affiliate-coupon-title7 " => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily7']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop7'], $attr['titlefontSizeType7']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight7']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle7']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight7']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing7'], $attr['titleletterSpacingType7']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration7']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform7']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor7']),
        ),        
        " .box7 .affiliate-list7 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily7']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight7']),
        ),
        " .box7 .affiliate-coupon-btn-wrapper7" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment7']),
        ),   
        
        " .affiliate-coupon-btn-wrapper7" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment7']),
        ),   
        " .box7 .affiliate-coupon-btn-wrapper7 .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily7']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop7'], $attr['btnfontSizeType7']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight7']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle7']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight7']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing7'], $attr['btnletterSpacingType7']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration7']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform7']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg7),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor7']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor7']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType7']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder7']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder7']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder7']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder7']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius7']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius7']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius7']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius7']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding7']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding7']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding7']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding7']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin7']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin7']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin7']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin7']['unit'])),
        ),
        " .box7 .affiliate-coupon-btn-wrapper7 .affiliate-btn:hover" => array(
            'background' => AFFILIATE_Helper::get_css_value($btnBgHover7),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor7']),
            'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor7']),
        ),   
        " .box7 .affiliate-coupon-list7 li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['listColor7']),
        ),
        " .box7 .affiliate-coupon-list7 li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['listIconColor7']),
        ),


    
      );
      
      $m_selectors = array(

        " .box1 .affiliate-coupon-title1 " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile1'], $attr['titlefontSizeTypeMobile1']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile1']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile1'], $attr['titleletterSpacingTypeMobile1']),
        ),
        " .box1 .affiliate-coupon-starrating1 .affiliate-star-item svg" => array(
            "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile1'], 'px'),  
            "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile1'], 'px'),
        ),
        " .box1 .affiliate-coupon-image1" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile1']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile1']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile1']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile1']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile1']['unit'])),
        ),
        " .box1 .affiliate-coupon-image1 img" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile1'],'px'),
        ),
        /*" .box1 .affiliate-list1 li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile1'], $attr['listfontSizeTypeMobile1']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile1']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile1'], $attr['listletterSpacingTypeMobile1']),
        ),*/
        " .box1 .affiliate-coupon-btn-wrapper1 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile1'], $attr['btnfontSizeTypeMobile1']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile1']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile1'], $attr['btnletterSpacingTypeMobile1']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile1']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile1']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile1']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile1']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile1']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile1']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile1']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile1']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile1']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile1']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile1']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile1']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile1']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile1']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile1']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile1']['unit'])),
          ),


          //Box2
          " .box2 .affiliate-coupon-title2 " .$attr['titleTag2'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile2'], $attr['titlefontSizeTypeMobile2']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile2']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile2'], $attr['titleletterSpacingTypeMobile2']),
          ),
          " .box2 .affiliate-coupon-starrating2 .affiliate-star-item svg" => array(
            "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile2'], 'px'),  
            "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile2'], 'px'),
          ),

          " .box2 .affiliate-coupon-image2" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile2']['unit'])),
          ),
          " .box2 .affiliate-coupon-image2 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile2'],'px'),
          ),
          /*" .box2 .affiliate-list2 li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile2'], $attr['listfontSizeTypeMobile2']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile2']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile2'], $attr['listletterSpacingTypeMobile2']),
          ),*/
          " .box2 .affiliate-coupon-btn-wrapper2 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile2'], $attr['btnfontSizeTypeMobile2']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile2']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile2'], $attr['btnletterSpacingTypeMobile2']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])),
          ),


          //Box3
          " .box3 .affiliate-coupon-title3 " .$attr['titleTag3'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile3'], $attr['titlefontSizeTypeMobile3']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile3']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile3'], $attr['titleletterSpacingTypeMobile3']),
          ),
          " .box3 .affiliate-coupon-starrating3 .affiliate-star-item svg" => array(
            "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile3'], 'px'),  
            "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile3'], 'px'),
          ),
          " .box3 .affiliate-coupon-image3" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile3']['unit'])),
          ),
          " .box3 .affiliate-coupon-image3 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile3'],'px'),
          ),
          /*" .box3 .affiliate-list3 li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile3'], $attr['listfontSizeTypeMobile3']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile3']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile3'], $attr['listletterSpacingTypeMobile3']),
          ),*/
          " .box3 .affiliate-coupon-btn-wrapper3 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile3'], $attr['btnfontSizeTypeMobile3']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile3']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile3'], $attr['btnletterSpacingTypeMobile3']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])),
          ),



          //Box4
          " .box4 .affiliate-coupon-title4 " .$attr['titleTag4'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile4'], $attr['titlefontSizeTypeMobile4']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile4']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile4'], $attr['titleletterSpacingTypeMobile4']),
          ),
          " .box4 .affiliate-coupon-starrating4 .affiliate-star-item svg" => array(
            "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile4'], 'px'),  
            "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile4'], 'px'),
          ),
          " .box4 .affiliate-coupon-image4" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile4']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile4']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile4']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile4']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile4']['unit'])),
          ),
          " .box4 .affiliate-coupon-image4 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile4'],'px'),
          ),
          /*" .box4 .affiliate-list4 li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile4'], $attr['listfontSizeTypeMobile4']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile4']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile4'], $attr['listletterSpacingTypeMobile4']),
          ),*/
          " .box4 .affiliate-coupon-btn-wrapper4 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile4'], $attr['btnfontSizeTypeMobile4']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile4']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile4'], $attr['btnletterSpacingTypeMobile4']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile4']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile4']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile4']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile4']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile4']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile4']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile4']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile4']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile4']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile4']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile4']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile4']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile4']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile4']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile4']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile4']['unit'])),
          ),



          //Box5
          " .box5 .affiliate-coupon-title5 " .$attr['titleTag5'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile5'], $attr['titlefontSizeTypeMobile5']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile5']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile5'], $attr['titleletterSpacingTypeMobile5']),
          ),
          " .box5 .affiliate-coupon-starrating5 .affiliate-star-item svg" => array(
            "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile5'], 'px'),  
            "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile5'], 'px'),
          ),
          " .box5 .affiliate-coupon-image5" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile5']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile5']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile5']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile5']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile5']['unit'])),
          ),
          " .box5 .affiliate-coupon-image5 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile5'],'px'),
          ),
          /*" .box5 .affiliate-list5 li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile5'], $attr['listfontSizeTypeMobile5']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile5']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile5'], $attr['listletterSpacingTypeMobile5']),
          ),*/
          " .box5 .affiliate-coupon-btn-wrapper5 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile5'], $attr['btnfontSizeTypeMobile5']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile5']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile5'], $attr['btnletterSpacingTypeMobile5']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile5']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile5']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile5']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile5']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile5']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile5']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile5']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile5']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile5']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile5']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile5']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile5']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile5']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile5']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile5']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile5']['unit'])),
          ),


          //Box6
          " .box6 .affiliate-coupon-title6 " .$attr['titleTag6'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile6'], $attr['titlefontSizeTypeMobile6']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile6']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile6'], $attr['titleletterSpacingTypeMobile6']),
          ),
          " .box6 .affiliate-coupon-starrating6 .affiliate-star-item svg" => array(
            "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile6'], 'px'),  
            "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile6'], 'px'),
          ),
          " .box6 .affiliate-coupon-image6" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile6']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile6']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile6']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile6']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile6']['unit'])),
          ),
          " .box6 .affiliate-coupon-image6 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile6'],'px'),
          ),
          /*" .box6 .affiliate-list6 li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile6'], $attr['listfontSizeTypeMobile6']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile6']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile6'], $attr['listletterSpacingTypeMobile6']),
          ),*/
          " .box6 .affiliate-coupon-btn-wrapper6 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile6'], $attr['btnfontSizeTypeMobile6']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile6']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile6'], $attr['btnletterSpacingTypeMobile6']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile6']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile6']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile6']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile6']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile6']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile6']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile6']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile6']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile6']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile6']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile6']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile6']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile6']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile6']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile6']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile6']['unit'])),
          ),


          //Box7
          " .box7 .affiliate-coupon-title7 " .$attr['titleTag7'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile7'], $attr['titlefontSizeTypeMobile7']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile7']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile7'], $attr['titleletterSpacingTypeMobile7']),
          ),
          " .box7 .affiliate-coupon-starrating7 .affiliate-star-item svg" => array(
            "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile7'], 'px'),  
            "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile7'], 'px'),
          ),
          " .box7 .affiliate-coupon-image7" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile7']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile7']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile7']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile7']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile7']['unit'])),
          ),
          " .box7 .affiliate-coupon-image7 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile7'],'px'),
          ),
          /*" .box7 .affiliate-list7 li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile7'], $attr['listfontSizeTypeMobile7']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile7']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile7'], $attr['listletterSpacingTypeMobile7']),
          ),*/
          " .box7 .affiliate-coupon-btn-wrapper7 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile7'], $attr['btnfontSizeTypeMobile7']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile7']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile7'], $attr['btnletterSpacingTypeMobile7']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile7']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile7']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile7']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile7']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile7']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile7']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile7']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile7']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile7']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile7']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile7']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile7']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile7']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile7']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile7']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile7']['unit'])),
          ),


          
      );

      $t_selectors = array(

        " .box1 .affiliate-coupon-title1 " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet1'], $attr['titlefontSizeTypeTablet1']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet1']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet1'], $attr['titleletterSpacingTypeTablet1']),
        ),
        " .box1 .affiliate-coupon-starrating1 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet1'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet1'], 'px'),
        ),
        " .box1 .affiliate-coupon-image1 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet1'],'px'),
        ),
        " .box1 .affiliate-coupon-image1" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet1']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet1']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet1']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet1']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet1']['unit'])),
          ),
        /*" .box1 .affiliate-list1 li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet1'], $attr['listfontSizeTypeTablet1']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet1']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet1'], $attr['listletterSpacingTypeTablet1']),
        ),*/
        " .box1 .affiliate-coupon-btn-wrapper1 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet1'], $attr['btnfontSizeTypeTablet1']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet1']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet1'], $attr['btnletterSpacingTypeTablet1']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet1']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet1']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet1']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet1']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet1']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet1']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet1']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet1']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet1']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet1']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet1']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet1']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet1']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet1']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet1']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet1']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet1']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet1']['unit'])),
        ),


        //Box2
        " .box2 .affiliate-coupon-title2 " .$attr['titleTag2'] => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet2'], $attr['titlefontSizeTypeTablet2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet2'], $attr['titleletterSpacingTypeTablet2']),
        ),
        " .box2 .affiliate-coupon-starrating2 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet2'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet2'], 'px'),
        ),
        " .box2 .affiliate-coupon-image2 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet2'],'px'),
        ),
        " .box2 .affiliate-coupon-image2" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet2']['unit'])),
        ),
        /*" .box2 .affiliate-list2 li" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet2'], $attr['listfontSizeTypeTablet2']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet2']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet2'], $attr['listletterSpacingTypeTablet2']),
        ),*/
        " .box2 .affiliate-coupon-btn-wrapper2 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet2'], $attr['btnfontSizeTypeTablet2']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet2']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet2'], $attr['btnletterSpacingTypeTablet2']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])),
        ),
        

        //Box3
        " .box3 .affiliate-coupon-title3 " .$attr['titleTag3'] => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet3'], $attr['titlefontSizeTypeTablet3']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet3']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet3'], $attr['titleletterSpacingTypeTablet3']),
        ),
        " .box3 .affiliate-coupon-starrating3 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet3'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet3'], 'px'),
        ),
        " .box3 .affiliate-coupon-image3 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet3'],'px'),
        ),       
        " .box3 .affiliate-coupon-image3" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet3']['unit'])),
        ),
        /*" .box3 .affiliate-list3 li" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet3'], $attr['listfontSizeTypeTablet3']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet3']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet3'], $attr['listletterSpacingTypeTablet3']),
        ),    */
        " .box3 .affiliate-coupon-btn-wrapper3 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet3'], $attr['btnfontSizeTypeTablet3']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet3']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet3'], $attr['btnletterSpacingTypeTablet3']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])),
        ),



        //Box4
        " .box4 .affiliate-coupon-title4 " .$attr['titleTag4'] => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet4'], $attr['titlefontSizeTypeTablet4']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet4']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet4'], $attr['titleletterSpacingTypeTablet4']),
        ),
        " .box4 .affiliate-coupon-starrating4 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet4'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet4'], 'px'),
        ),
        " .box4 .affiliate-coupon-image4 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet4'],'px'),
        ),       
        " .box4 .affiliate-coupon-image4" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet4']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet4']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet4']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet4']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet4']['unit'])),
        ),
        /*" .box4 .affiliate-list4 li" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet4'], $attr['listfontSizeTypeTablet4']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet4']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet4'], $attr['listletterSpacingTypeTablet4']),
        ),    */
        " .box4 .affiliate-coupon-btn-wrapper4 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet4'], $attr['btnfontSizeTypeTablet4']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet4']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet4'], $attr['btnletterSpacingTypeTablet4']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet4']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet4']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet4']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet4']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet4']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet4']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet4']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet4']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet4']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet4']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet4']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet4']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet4']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet4']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet4']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet4']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet4']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet4']['unit'])),
          ),



          //Box5
        " .box5 .affiliate-coupon-title5 " .$attr['titleTag5'] => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet5'], $attr['titlefontSizeTypeTablet5']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet5']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet5'], $attr['titleletterSpacingTypeTablet5']),
        ),
        " .box5 .affiliate-coupon-starrating5 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet5'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet5'], 'px'),
        ),
        " .box5 .affiliate-coupon-image5 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet5'],'px'),
        ),       
        " .box5 .affiliate-coupon-image5" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet5']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet5']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet5']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet5']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet5']['unit'])),
        ),
        /*" .box5 .affiliate-list5 li" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet5'], $attr['listfontSizeTypeTablet5']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet5']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet5'], $attr['listletterSpacingTypeTablet5']),
        ),   */ 
        " .box5 .affiliate-coupon-btn-wrapper5 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet5'], $attr['btnfontSizeTypeTablet5']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet5']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet5'], $attr['btnletterSpacingTypeTablet5']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet5']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet5']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet5']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet5']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet5']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet5']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet5']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet5']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet5']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet5']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet5']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet5']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet5']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet5']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet5']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet5']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet5']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet5']['unit'])),
          ),


          //Box6
        " .box6 .affiliate-coupon-title6 " .$attr['titleTag6'] => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet6'], $attr['titlefontSizeTypeTablet6']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet6']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet6'], $attr['titleletterSpacingTypeTablet6']),
        ),
        " .box6 .affiliate-coupon-starrating6 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet6'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet6'], 'px'),
        ),
        " .box6 .affiliate-coupon-image6 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet6'],'px'),
        ),       
        " .box6 .affiliate-coupon-image6" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet6']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet6']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet6']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet6']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet6']['unit'])),
        ),
        /*" .box6 .affiliate-list6 li" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet6'], $attr['listfontSizeTypeTablet6']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet6']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet6'], $attr['listletterSpacingTypeTablet6']),
        ),    */
        " .box6 .affiliate-coupon-btn-wrapper6 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet6'], $attr['btnfontSizeTypeTablet6']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet6']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet6'], $attr['btnletterSpacingTypeTablet6']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet6']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet6']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet6']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet6']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet6']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet6']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet6']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet6']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet6']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet6']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet6']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet6']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet6']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet6']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet6']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet6']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet6']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet6']['unit'])),
          ),


          //Box7
        " .box7 .affiliate-coupon-title7 " .$attr['titleTag7'] => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet7'], $attr['titlefontSizeTypeTablet7']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet7']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet7'], $attr['titleletterSpacingTypeTablet7']),
        ),
        " .box7 .affiliate-coupon-starrating7 .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet7'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet7'], 'px'),
        ),
        " .box7 .affiliate-coupon-image7 img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet7'],'px'),
        ),       
        " .box7 .affiliate-coupon-image7" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet7']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet7']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet7']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet7']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet7']['unit'])),
        ),
        /*" .box7 .affiliate-list7 li" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet7'], $attr['listfontSizeTypeTablet7']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet7']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet7'], $attr['listletterSpacingTypeTablet7']),
        ),    */
        " .box7 .affiliate-coupon-btn-wrapper7 .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet7'], $attr['btnfontSizeTypeTablet7']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet7']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet7'], $attr['btnletterSpacingTypeTablet7']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet7']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet7']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet7']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet7']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet7']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet7']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet7']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet7']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet7']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet7']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet7']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet7']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet7']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet7']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet7']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet7']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet7']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet7']['unit'])),
          ),


          
      );

      


      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'gradient'){
            if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
              $selectors[" .box1 .affiliate-coupon-btn-wrapper1 .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box1 .affiliate-coupon-btn-wrapper1 .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'gradient'){
            if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
              $selectors[" .box1 .affiliate-coupon-btn-wrapper1 .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box1 .affiliate-coupon-btn-wrapper1 .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  



        if($attr['btnBg2']['openBg'] == 1){
          if($attr['btnBg2']['bgType'] == 'gradient'){
            if ($attr['btnBg2']['bgGradient']['type'] == 'linear') {
              $selectors[" .box2 .affiliate-coupon-btn-wrapper2 .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box2 .affiliate-coupon-btn-wrapper2 .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover2']['openBg'] == 1){
          if($attr['btnBgHover2']['bgType'] == 'gradient'){
            if ($attr['btnBgHover2']['bgGradient']['type'] == 'linear') {
              $selectors[" .box2 .affiliate-coupon-btn-wrapper2 .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box2 .affiliate-coupon-btn-wrapper2 .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
            }
          }
        }



        if($attr['btnBg3']['openBg'] == 1){
          if($attr['btnBg3']['bgType'] == 'gradient'){
            if ($attr['btnBg3']['bgGradient']['type'] == 'linear') {
              $selectors[" .box3 .affiliate-coupon-btn-wrapper3 .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box3 .affiliate-coupon-btn-wrapper3 .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover3']['openBg'] == 1){
          if($attr['btnBgHover3']['bgType'] == 'gradient'){
            if ($attr['btnBgHover3']['bgGradient']['type'] == 'linear') {
              $selectors[" .box3 .affiliate-coupon-btn-wrapper3 .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box3 .affiliate-coupon-btn-wrapper3 .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
            }
          }
        }
      

      if($attr['btnBg4']['openBg'] == 1){
          if($attr['btnBg4']['bgType'] == 'gradient'){
            if ($attr['btnBg4']['bgGradient']['type'] == 'linear') {
              $selectors[" .box4 .affiliate-coupon-btn-wrapper4 .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg4']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg4']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg4']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg4']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg4']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box4 .affiliate-coupon-btn-wrapper4 .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg4']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg4']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg4']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg4']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg4']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover4']['openBg'] == 1){
          if($attr['btnBgHover4']['bgType'] == 'gradient'){
            if ($attr['btnBgHover4']['bgGradient']['type'] == 'linear') {
              $selectors[" .box4 .affiliate-coupon-btn-wrapper4 .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover4']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover4']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover4']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover4']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover4']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box4 .affiliate-coupon-btn-wrapper4 .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover4']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover4']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover4']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover4']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover4']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  



        if($attr['btnBg5']['openBg'] == 1){
          if($attr['btnBg5']['bgType'] == 'gradient'){
            if ($attr['btnBg5']['bgGradient']['type'] == 'linear') {
              $selectors[" .box5 .affiliate-coupon-btn-wrapper5 .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg5']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg5']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg5']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg5']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg5']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box5 .affiliate-coupon-btn-wrapper5 .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg5']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg5']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg5']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg5']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg5']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover5']['openBg'] == 1){
          if($attr['btnBgHover5']['bgType'] == 'gradient'){
            if ($attr['btnBgHover5']['bgGradient']['type'] == 'linear') {
              $selectors[" .box5 .affiliate-coupon-btn-wrapper5 .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover5']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover5']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover5']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover5']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover5']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box5 .affiliate-coupon-btn-wrapper5 .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover5']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover5']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover5']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover5']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover5']['bgGradient']['stop'], '%') . ')';
            }
          }
        }



        if($attr['btnBg6']['openBg'] == 1){
          if($attr['btnBg6']['bgType'] == 'gradient'){
            if ($attr['btnBg6']['bgGradient']['type'] == 'linear') {
              $selectors[" .box6 .affiliate-coupon-btn-wrapper6 .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg6']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg6']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg6']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg6']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg6']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box6 .affiliate-coupon-btn-wrapper6 .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg6']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg6']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg6']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg6']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg6']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover6']['openBg'] == 1){
          if($attr['btnBgHover6']['bgType'] == 'gradient'){
            if ($attr['btnBgHover6']['bgGradient']['type'] == 'linear') {
              $selectors[" .box6 .affiliate-coupon-btn-wrapper6 .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover6']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover6']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover6']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover6']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover6']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box6 .affiliate-coupon-btn-wrapper6 .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover6']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover6']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover6']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover6']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover6']['bgGradient']['stop'], '%') . ')';
            }
          }
        }
    


        if($attr['btnBg7']['openBg'] == 1){
          if($attr['btnBg7']['bgType'] == 'gradient'){
            if ($attr['btnBg7']['bgGradient']['type'] == 'linear') {
              $selectors[" .box7 .affiliate-coupon-btn-wrapper7 .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg7']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg7']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg7']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg7']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg7']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box7 .affiliate-coupon-btn-wrapper7 .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg7']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg7']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg7']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg7']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg7']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover7']['openBg'] == 1){
          if($attr['btnBgHover7']['bgType'] == 'gradient'){
            if ($attr['btnBgHover7']['bgGradient']['type'] == 'linear') {
              $selectors[" .box7 .affiliate-coupon-btn-wrapper7 .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover7']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover7']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover7']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover7']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover7']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .box7 .affiliate-coupon-btn-wrapper7 .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover7']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover7']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover7']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover7']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover7']['bgGradient']['stop'], '%') . ')';
            }
          }
        }



      
      $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
      $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
      $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

      $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

      $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

      $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );
      return $generated_css;
    }

    public static function blocks_coupon2_gfont($attr)
    {
      
      $btn_load_google_font1 = isset($attr['btnLoadGoogleFonts1']) ? $attr['btnLoadGoogleFonts1'] : '';
      $btn_font_family1      = isset($attr['btnfontFamily1']) ? $attr['btnfontFamily1'] : '';
      $btn_font_weight1      = isset($attr['btnfontWeight1']) ? $attr['btnfontWeight1'] : '';
      $btn_font_subset1      = isset($attr['btnfontSubset1']) ? $attr['btnfontSubset1'] : '';

      $title_load_google_font1 = isset($attr['titleLoadGoogleFonts1']) ? $attr['titleLoadGoogleFonts1'] : '';
      $title_font_family1      = isset($attr['titlefontFamily1']) ? $attr['titlefontFamily1'] : '';
      $title_font_weight1      = isset($attr['titlefontWeight1']) ? $attr['titlefontWeight1'] : '';
      $title_font_subset1      = isset($attr['titlefontSubset1']) ? $attr['titlefontSubset1'] : '';

      $list_load_google_font1 = isset($attr['listLoadGoogleFonts1']) ? $attr['listLoadGoogleFonts1'] : '';
      $list_font_family1      = isset($attr['listfontFamily1']) ? $attr['listfontFamily1'] : '';
      $list_font_weight1      = isset($attr['listfontWeight1']) ? $attr['listfontWeight1'] : '';
      $list_font_subset1      = isset($attr['listfontSubset1']) ? $attr['listfontSubset1'] : '';
      

      $btn_load_google_font2 = isset($attr['btnLoadGoogleFonts2']) ? $attr['btnLoadGoogleFonts2'] : '';
      $btn_font_family2      = isset($attr['btnfontFamily2']) ? $attr['btnfontFamily2'] : '';
      $btn_font_weight2      = isset($attr['btnfontWeight2']) ? $attr['btnfontWeight2'] : '';
      $btn_font_subset2      = isset($attr['btnfontSubset2']) ? $attr['btnfontSubset2'] : '';

      $title_load_google_font2 = isset($attr['titleLoadGoogleFonts2']) ? $attr['titleLoadGoogleFonts2'] : '';
      $title_font_family2      = isset($attr['titlefontFamily2']) ? $attr['titlefontFamily2'] : '';
      $title_font_weight2      = isset($attr['titlefontWeight2']) ? $attr['titlefontWeight2'] : '';
      $title_font_subset2      = isset($attr['titlefontSubset2']) ? $attr['titlefontSubset2'] : '';

      $list_load_google_font2 = isset($attr['listLoadGoogleFonts2']) ? $attr['listLoadGoogleFonts2'] : '';
      $list_font_family2      = isset($attr['listfontFamily2']) ? $attr['listfontFamily2'] : '';
      $list_font_weight2      = isset($attr['listfontWeight2']) ? $attr['listfontWeight2'] : '';
      $list_font_subset2      = isset($attr['listfontSubset2']) ? $attr['listfontSubset2'] : '';


      $btn_load_google_font3 = isset($attr['btnLoadGoogleFonts3']) ? $attr['btnLoadGoogleFonts3'] : '';
      $btn_font_family3      = isset($attr['btnfontFamily3']) ? $attr['btnfontFamily3'] : '';
      $btn_font_weight3      = isset($attr['btnfontWeight3']) ? $attr['btnfontWeight3'] : '';
      $btn_font_subset3      = isset($attr['btnfontSubset3']) ? $attr['btnfontSubset3'] : '';

      $title_load_google_font3 = isset($attr['titleLoadGoogleFonts3']) ? $attr['titleLoadGoogleFonts3'] : '';
      $title_font_family3      = isset($attr['titlefontFamily3']) ? $attr['titlefontFamily3'] : '';
      $title_font_weight3      = isset($attr['titlefontWeight3']) ? $attr['titlefontWeight3'] : '';
      $title_font_subset3      = isset($attr['titlefontSubset3']) ? $attr['titlefontSubset3'] : '';

      $list_load_google_font3 = isset($attr['listLoadGoogleFonts3']) ? $attr['listLoadGoogleFonts3'] : '';
      $list_font_family3      = isset($attr['listfontFamily3']) ? $attr['listfontFamily3'] : '';
      $list_font_weight3      = isset($attr['listfontWeight3']) ? $attr['listfontWeight3'] : '';
      $list_font_subset3      = isset($attr['listfontSubset3']) ? $attr['listfontSubset3'] : '';



      $btn_load_google_font4 = isset($attr['btnLoadGoogleFonts4']) ? $attr['btnLoadGoogleFonts4'] : '';
      $btn_font_family4      = isset($attr['btnfontFamily4']) ? $attr['btnfontFamily4'] : '';
      $btn_font_weight4      = isset($attr['btnfontWeight4']) ? $attr['btnfontWeight4'] : '';
      $btn_font_subset4      = isset($attr['btnfontSubset4']) ? $attr['btnfontSubset4'] : '';

      $title_load_google_font4 = isset($attr['titleLoadGoogleFonts4']) ? $attr['titleLoadGoogleFonts4'] : '';
      $title_font_family4      = isset($attr['titlefontFamily4']) ? $attr['titlefontFamily4'] : '';
      $title_font_weight4      = isset($attr['titlefontWeight4']) ? $attr['titlefontWeight4'] : '';
      $title_font_subset4      = isset($attr['titlefontSubset4']) ? $attr['titlefontSubset4'] : '';

      $list_load_google_font4 = isset($attr['listLoadGoogleFonts4']) ? $attr['listLoadGoogleFonts4'] : '';
      $list_font_family4      = isset($attr['listfontFamily4']) ? $attr['listfontFamily4'] : '';
      $list_font_weight4      = isset($attr['listfontWeight4']) ? $attr['listfontWeight4'] : '';
      $list_font_subset4      = isset($attr['listfontSubset4']) ? $attr['listfontSubset4'] : '';



      $btn_load_google_font5 = isset($attr['btnLoadGoogleFonts5']) ? $attr['btnLoadGoogleFonts5'] : '';
      $btn_font_family5      = isset($attr['btnfontFamily5']) ? $attr['btnfontFamily5'] : '';
      $btn_font_weight5      = isset($attr['btnfontWeight5']) ? $attr['btnfontWeight5'] : '';
      $btn_font_subset5      = isset($attr['btnfontSubset5']) ? $attr['btnfontSubset5'] : '';

      $title_load_google_font5 = isset($attr['titleLoadGoogleFonts5']) ? $attr['titleLoadGoogleFonts5'] : '';
      $title_font_family5      = isset($attr['titlefontFamily5']) ? $attr['titlefontFamily5'] : '';
      $title_font_weight5      = isset($attr['titlefontWeight5']) ? $attr['titlefontWeight5'] : '';
      $title_font_subset5      = isset($attr['titlefontSubset5']) ? $attr['titlefontSubset5'] : '';

      $list_load_google_font5 = isset($attr['listLoadGoogleFonts5']) ? $attr['listLoadGoogleFonts5'] : '';
      $list_font_family5      = isset($attr['listfontFamily5']) ? $attr['listfontFamily5'] : '';
      $list_font_weight5      = isset($attr['listfontWeight5']) ? $attr['listfontWeight5'] : '';
      $list_font_subset5      = isset($attr['listfontSubset5']) ? $attr['listfontSubset5'] : '';


      $btn_load_google_font6 = isset($attr['btnLoadGoogleFonts6']) ? $attr['btnLoadGoogleFonts6'] : '';
      $btn_font_family6      = isset($attr['btnfontFamily6']) ? $attr['btnfontFamily6'] : '';
      $btn_font_weight6      = isset($attr['btnfontWeight6']) ? $attr['btnfontWeight6'] : '';
      $btn_font_subset6      = isset($attr['btnfontSubset6']) ? $attr['btnfontSubset6'] : '';

      $title_load_google_font6 = isset($attr['titleLoadGoogleFonts6']) ? $attr['titleLoadGoogleFonts6'] : '';
      $title_font_family6      = isset($attr['titlefontFamily6']) ? $attr['titlefontFamily6'] : '';
      $title_font_weight6      = isset($attr['titlefontWeight6']) ? $attr['titlefontWeight6'] : '';
      $title_font_subset6      = isset($attr['titlefontSubset6']) ? $attr['titlefontSubset6'] : '';

      $list_load_google_font6 = isset($attr['listLoadGoogleFonts6']) ? $attr['listLoadGoogleFonts6'] : '';
      $list_font_family6      = isset($attr['listfontFamily6']) ? $attr['listfontFamily6'] : '';
      $list_font_weight6      = isset($attr['listfontWeight6']) ? $attr['listfontWeight6'] : '';
      $list_font_subset6      = isset($attr['listfontSubset6']) ? $attr['listfontSubset6'] : '';


      $btn_load_google_font7 = isset($attr['btnLoadGoogleFonts7']) ? $attr['btnLoadGoogleFonts7'] : '';
      $btn_font_family7      = isset($attr['btnfontFamily7']) ? $attr['btnfontFamily7'] : '';
      $btn_font_weight7      = isset($attr['btnfontWeight7']) ? $attr['btnfontWeight7'] : '';
      $btn_font_subset7      = isset($attr['btnfontSubset7']) ? $attr['btnfontSubset7'] : '';

      $title_load_google_font7 = isset($attr['titleLoadGoogleFonts7']) ? $attr['titleLoadGoogleFonts7'] : '';
      $title_font_family7      = isset($attr['titlefontFamily7']) ? $attr['titlefontFamily7'] : '';
      $title_font_weight7      = isset($attr['titlefontWeight7']) ? $attr['titlefontWeight7'] : '';
      $title_font_subset7      = isset($attr['titlefontSubset7']) ? $attr['titlefontSubset7'] : '';

      $list_load_google_font7 = isset($attr['listLoadGoogleFonts7']) ? $attr['listLoadGoogleFonts7'] : '';
      $list_font_family7      = isset($attr['listfontFamily7']) ? $attr['listfontFamily7'] : '';
      $list_font_weight7      = isset($attr['listfontWeight7']) ? $attr['listfontWeight7'] : '';
      $list_font_subset7      = isset($attr['listfontSubset7']) ? $attr['listfontSubset7'] : '';


  
      AFFILIATE_Helper::blocks_google_font($list_load_google_font1, $list_font_family1, $list_font_weight1, $list_font_subset1);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font1, $btn_font_family1, $btn_font_weight1, $btn_font_subset1);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font1, $title_font_family1, $title_font_weight1, $title_font_subset1);



      AFFILIATE_Helper::blocks_google_font($list_load_google_font2, $list_font_family2, $list_font_weight2, $list_font_subset2);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font2, $btn_font_family2, $btn_font_weight2, $btn_font_subset2);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font2, $title_font_family2, $title_font_weight2, $title_font_subset2);



      AFFILIATE_Helper::blocks_google_font($list_load_google_font3, $list_font_family3, $list_font_weight3, $list_font_subset3);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font3, $btn_font_family3, $btn_font_weight3, $btn_font_subset3);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font3, $title_font_family3, $title_font_weight3, $title_font_subset3);



      AFFILIATE_Helper::blocks_google_font($list_load_google_font4, $list_font_family4, $list_font_weight4, $list_font_subset4);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font4, $btn_font_family4, $btn_font_weight4, $btn_font_subset4);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font4, $title_font_family4, $title_font_weight4, $title_font_subset4);



      AFFILIATE_Helper::blocks_google_font($list_load_google_font5, $list_font_family5, $list_font_weight5, $list_font_subset5);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font5, $btn_font_family5, $btn_font_weight5, $btn_font_subset5);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font5, $title_font_family5, $title_font_weight5, $title_font_subset5);


      AFFILIATE_Helper::blocks_google_font($list_load_google_font6, $list_font_family6, $list_font_weight6, $list_font_subset6);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font6, $btn_font_family6, $btn_font_weight6, $btn_font_subset6);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font6, $title_font_family6, $title_font_weight6, $title_font_subset6);


      AFFILIATE_Helper::blocks_google_font($list_load_google_font7, $list_font_family7, $list_font_weight7, $list_font_subset7);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font7, $btn_font_family7, $btn_font_weight7, $btn_font_subset7);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font7, $title_font_family7, $title_font_weight7, $title_font_subset7);


      
    }


    public static function get_coupon3_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-coupon3']['attributes'];

      $attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }
      
      $m_selectors = array();
      $t_selectors = array();
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      
      $selectors = array(
        " .affiliate-coupon-inner" => array(
            "box-shadow"=>implode(',',$boxshadow),
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor']),
        ),

         " .affiliate-coupon-starrating" => array(
              "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemt']), 
          ),
          " .affiliate-coupon-starrating .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),
          ),

        " .affiliate-coupon-imagetop" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['top'], AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['right'], AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['left'], AFFILIATE_Helper::get_css_value($attr['imageTopPadding']['unit'])),
        ),
        " .affiliate-coupon-imagetop img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customTopImgWidth'],'px'),
        ),


        " .affiliate-coupon-image" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])),
        ),
        " .affiliate-coupon-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth'],'px'),
        ),


        " .affiliate-coupon-imagebottom" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['top'], AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['right'], AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['left'], AFFILIATE_Helper::get_css_value($attr['imageBottomPadding']['unit'])),
        ),
        " .affiliate-coupon-imagebottom img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customBottomImgWidth'],'px'),
        ),



        " .affiliate-coupon-maintitle " => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
      ),        
      " .affiliate-coupon-inner .affiliate-coupon-content" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['contentfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['contentfontSizeDesktop'], $attr['contentfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['contentfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['contentfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['contentlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['contentletterSpacing'], $attr['contentletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['contenttextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['contenttextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['contentTextColor']),
       ),
      " .affiliate-coupon-inner .affiliate-list.first li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['listfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeDesktop'], $attr['listfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['listfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['listfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacing'], $attr['listletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['listtextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['listtextTransform']),
        ),
        " .affiliate-coupon-btn-wrapper" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
        ),   
        " .affiliate-coupon-inner .affiliate-list.second li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['list2fontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['list2fontSizeDesktop'], $attr['list2fontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['list2fontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['list2fontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['list2lineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['list2letterSpacing'], $attr['list2letterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['list2textDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['list2textTransform']),
        ),


        " .affiliate-coupon-inner .footerpricebox .affiliate-coupon-priceBox1" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['actualPricefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['actualPricefontSizeDesktop'], $attr['actualPricefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['actualPricefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['actualPricefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['actualPricelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['actualPriceletterSpacing'], $attr['actualPriceletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['actualPricetextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['actualPricetextTransform']),
        ),


        " .affiliate-coupon-inner .footerpricebox .affiliate-coupon-priceBox2" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['discountPricefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['discountPricefontSizeDesktop'], $attr['discountPricefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['discountPricefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['discountPricefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['discountPricelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['discountPriceletterSpacing'], $attr['discountPriceletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['discountPricetextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['discountPricetextTransform']),
        ),


        " .affiliate-coupon-inner .footerpricebox .affiliate-coupon-priceBox3" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['savingPricefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['savingPricefontSizeDesktop'], $attr['savingPricefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['savingPricefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['savingPricefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['savingPricelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['savingPriceletterSpacing'], $attr['savingPriceletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['savingPricetextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['savingPricetextTransform']),
        ),


        " .affiliate-coupon-btn-wrapper" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
        ),   
      " .affiliate-coupon-btn-wrapper .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
        ),
        " .affiliate-progress-text" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['progressfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeDesktop'], $attr['progressfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['progressfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['progressfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacing'], $attr['progressletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['progresstextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['progresstextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['progressTextColor']),
        ),
        " .affiliate-coupon-review" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['rateSize'],'px'),
            'color' => AFFILIATE_Helper::get_css_value($attr['rateColor']),
        ),
        " .affiliate-progress-bar" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['progressWidth'],'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor']),
        ),
        " .affiliate-progress" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight'],'px'),
        ),
        " .affiliate-coupon-inner .affiliate-couponTextColor" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['couponTextColor']),
        ),
        " .affiliate-coupon-inner .affiliate-couponTextColor2" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['couponTextColor2']),
        ),
        " .affiliate-coupon-inner .affiliate-coupon-list-one li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['couponIconColor']),
        ),
        " .affiliate-coupon-inner .affiliate-coupon-list-two li:before" => array(
            'color' => AFFILIATE_Helper::get_css_value($attr['couponIconColor2']),
        ),
        " .affiliate-coupon-inner .affiliate-coupon-list-one li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['couponListColor']),
      ),
      " .affiliate-coupon-inner .affiliate-coupon-list-two li" => array(
          'color' => AFFILIATE_Helper::get_css_value($attr['couponListColor1']),
      ),
      " .affiliate-coupon-btn-wrapper .affiliate-btn:hover" => array(
          'background' => AFFILIATE_Helper::get_css_value($btnBgHover),
          'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
          'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
      ),
     
    
      );
      
      $m_selectors = array(
        " .affiliate-coupon-maintitle " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
        ),

         " .affiliate-coupon-starrating" => array(
          "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemtMobile']),  
      ),
      " .affiliate-coupon-starrating .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),
      ),

        " .affiliate-coupon-imagetop" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingMobile']['unit'])),
          ),
        " .affiliate-coupon-imagetop img" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customTopImgWidthMobile'],'px'),
       ),


        " .affiliate-coupon-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])),
          ),
        " .affiliate-coupon-image img" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile'],'px'),
       ),

        " .affiliate-coupon-imagebottom" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingMobile']['unit'])),
          ),
        " .affiliate-coupon-imagebottom img" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customBottomImgWidthMobile'],'px'),
       ),


        " .affiliate-coupon-inner .affiliate-coupon-content" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['contentfontSizeMobile'], $attr['contentfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['contentlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['contentletterSpacingMobile'], $attr['contentletterSpacingTypeMobile']),
            
        ),
        " .affiliate-coupon-inner .affiliate-list.first li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeMobile'], $attr['listfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingMobile'], $attr['listletterSpacingTypeMobile']),
          ),

        " .affiliate-coupon-inner .affiliate-list.second li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['list2fontSizeMobile'], $attr['list2fontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['list2lineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['list2letterSpacingMobile'], $attr['list2letterSpacingTypeMobile']),
          ),

        " .affiliate-coupon-inner .footerpricebox .affiliate-coupon-priceBox1" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['actualPricefontSizeMobile'], $attr['actualPricefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['actualPricelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['actualPriceletterSpacingMobile'], $attr['actualPriceletterSpacingTypeMobile']),
          ),


        " .affiliate-coupon-inner .footerpricebox .affiliate-coupon-priceBox2" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['discountPricefontSizeMobile'], $attr['discountPricefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['discountPricelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['discountPriceletterSpacingMobile'], $attr['discountPriceletterSpacingTypeMobile']),
          ),

        " .affiliate-coupon-inner .footerpricebox .affiliate-coupon-priceBox3" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['savingPricefontSizeMobile'], $attr['savingPricefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['savingPricelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['savingPriceletterSpacingMobile'], $attr['savingPriceletterSpacingTypeMobile']),
          ),

        " .affiliate-coupon-btn-wrapper .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
          ),
          " .affiliate-progress-text" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeMobile'], $attr['progressfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacingMobile'], $attr['progressletterSpacingTypeMobile']),
          ),
      );

      $t_selectors = array(
        " .affiliate-coupon-maintitle " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),

        " .affiliate-coupon-starrating" => array(
          "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemtTablet']),  
      ),
      " .affiliate-coupon-starrating .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),
      ),

        " .affiliate-coupon-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet'],'px'),
        ),
        " .affiliate-coupon-inner .affiliate-coupon-content" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['contentfontSizeTablet'], $attr['contentfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['contentlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['contentletterSpacingTablet'], $attr['contentletterSpacingTypeTablet']),
            
        ),
        " .affiliate-coupon-image" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])),
          ),


        " .affiliate-coupon-imagetop img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customTopImgWidthTablet'],'px'),
        ),
        " .affiliate-coupon-imagetop" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imageTopPaddingTablet']['unit'])),
          ),


        " .affiliate-coupon-imagebottom img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customBottomImgWidthTablet'],'px'),
        ),
        " .affiliate-coupon-imagebottom" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imageBottomPaddingTablet']['unit'])),
          ),


        " .affiliate-coupon-inner .affiliate-list.first li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['listfontSizeTablet'], $attr['listfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['listlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['listletterSpacingTablet'], $attr['listletterSpacingTypeTablet']),
          ),

        " .affiliate-coupon-inner .affiliate-list.second li" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['list2fontSizeTablet'], $attr['list2fontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['list2lineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['list2letterSpacingTablet'], $attr['list2letterSpacingTypeTablet']),
          ),


        " .affiliate-coupon-inner .footerpricebox .affiliate-coupon-priceBox1" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['actualPricefontSizeTablet'], $attr['actualPricefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['actualPricelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['actualPriceletterSpacingTablet'], $attr['actualPriceletterSpacingTypeTablet']),
          ),

        " .affiliate-coupon-inner .footerpricebox .affiliate-coupon-priceBox2" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['discountPricefontSizeTablet'], $attr['discountPricefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['discountPricelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['discountPriceletterSpacingTablet'], $attr['discountPriceletterSpacingTypeTablet']),
          ),

         " .affiliate-coupon-inner .footerpricebox .affiliate-coupon-priceBox3" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['savingPricefontSizeTablet'], $attr['savingPricefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['savingPricelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['savingPriceletterSpacingTablet'], $attr['savingPriceletterSpacingTypeTablet']),
          ),


        " .affiliate-coupon-btn-wrapper .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
          ),
          " .affiliate-progress-text" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeTablet'], $attr['progressfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacingTablet'], $attr['progressletterSpacingTypeTablet']),
          ),
      );


          if($attr['btnBg']['openBg'] == 1){
            if($attr['btnBg']['bgType'] == 'gradient'){
              if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
                $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
              } else {
                $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
              }
            }
          }  


          if($attr['btnBgHover']['openBg'] == 1){
            if($attr['btnBgHover']['bgType'] == 'gradient'){
              if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
                $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
              } else {
                $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
              }
            }
          }  

      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function blocks_coupon3_gfont($attr)
    {
      
      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $progress_load_google_font = isset($attr['progressLoadGoogleFonts']) ? $attr['progressLoadGoogleFonts'] : '';
      $progress_font_family      = isset($attr['progressfontFamily']) ? $attr['progressfontFamily'] : '';
      $progress_font_weight      = isset($attr['progressfontWeight']) ? $attr['progressfontWeight'] : '';
      $progress_font_subset      = isset($attr['progressfontSubset']) ? $attr['progressfontSubset'] : '';

      $content_load_google_font = isset($attr['contentLoadGoogleFonts']) ? $attr['contentLoadGoogleFonts'] : '';
      $content_font_family      = isset($attr['contentfontFamily']) ? $attr['contentfontFamily'] : '';
      $content_font_weight      = isset($attr['contentfontWeight']) ? $attr['contentfontWeight'] : '';
      $content_font_subset      = isset($attr['contentfontSubset']) ? $attr['contentfontSubset'] : '';

      $list_load_google_font = isset($attr['listLoadGoogleFonts']) ? $attr['listLoadGoogleFonts'] : '';
      $list_font_family      = isset($attr['listfontFamily']) ? $attr['listfontFamily'] : '';
      $list_font_weight      = isset($attr['listfontWeight']) ? $attr['listfontWeight'] : '';
      $list_font_subset      = isset($attr['listfontSubset']) ? $attr['listfontSubset'] : '';

      $list2_load_google_font = isset($attr['list2LoadGoogleFonts']) ? $attr['list2LoadGoogleFonts'] : '';
      $list2_font_family      = isset($attr['list2fontFamily']) ? $attr['list2fontFamily'] : '';
      $list2_font_weight      = isset($attr['list2fontWeight']) ? $attr['list2fontWeight'] : '';
      $list2_font_subset      = isset($attr['list2fontSubset']) ? $attr['list2fontSubset'] : '';



      $actualPrice_load_google_font = isset($attr['actualPriceLoadGoogleFonts']) ? $attr['actualPriceLoadGoogleFonts'] : '';
      $actualPrice_font_family      = isset($attr['actualPricefontFamily']) ? $attr['actualPricefontFamily'] : '';
      $actualPrice_font_weight      = isset($attr['actualPricefontWeight']) ? $attr['actualPricefontWeight'] : '';
      $actualPrice_font_subset      = isset($attr['actualPricefontSubset']) ? $attr['actualPricefontSubset'] : '';


      $discountPrice_load_google_font = isset($attr['discountPriceLoadGoogleFonts']) ? $attr['discountPriceLoadGoogleFonts'] : '';
      $discountPrice_font_family      = isset($attr['discountPricefontFamily']) ? $attr['discountPricefontFamily'] : '';
      $discountPrice_font_weight      = isset($attr['discountPricefontWeight']) ? $attr['discountPricefontWeight'] : '';
      $discountPrice_font_subset      = isset($attr['discountPricefontSubset']) ? $attr['discountPricefontSubset'] : '';


      $savingPrice_load_google_font = isset($attr['savingPriceLoadGoogleFonts']) ? $attr['savingPriceLoadGoogleFonts'] : '';
      $savingPrice_font_family      = isset($attr['savingPricefontFamily']) ? $attr['savingPricefontFamily'] : '';
      $savingPrice_font_weight      = isset($attr['savingPricefontWeight']) ? $attr['savingPricefontWeight'] : '';
      $savingPrice_font_subset      = isset($attr['savingPricefontSubset']) ? $attr['savingPricefontSubset'] : '';


      AFFILIATE_Helper::blocks_google_font($list_load_google_font, $list_font_family, $list_font_weight, $list_font_subset);
      AFFILIATE_Helper::blocks_google_font($list2_load_google_font, $list2_font_family, $list2_font_weight, $list2_font_subset);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($progress_load_google_font, $progress_font_family, $progress_font_weight, $progress_font_subset);
      AFFILIATE_Helper::blocks_google_font($content_load_google_font, $content_font_family, $content_font_weight, $content_font_subset);



      AFFILIATE_Helper::blocks_google_font($actualPrice_load_google_font, $actualPrice_font_family, $actualPrice_font_weight, $actualPrice_font_subset);

      AFFILIATE_Helper::blocks_google_font($discountPrice_load_google_font, $discountPrice_font_family, $discountPrice_font_weight, $discountPrice_font_subset);

      AFFILIATE_Helper::blocks_google_font($savingPrice_load_google_font, $savingPrice_font_family, $savingPrice_font_weight, $savingPrice_font_subset);


    }



    public static function get_coupon4_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-coupon4']['attributes'];

      $attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }
      
      $m_selectors = array();
      $t_selectors = array();
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

        $center = 'left';
        if($attr['ratingAlignemt'] == 'flex-start'){
            $center = 'left';
         }
         if($attr['ratingAlignemt'] == 'center'){
            $center = 'center';
         }
         if($attr['ratingAlignemt'] == 'flex-end'){
            $center = 'right';
         }

      
      $selectors = array(

          " .affiliate-coupon-inner .affiliate-coupon-content-wrapper" => array(
             'border-style' => AFFILIATE_Helper::get_css_value($attr['boxBorderType']),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['boxBorderColor']),
            'border-width' => AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])),
            
          ),
 

        " .affiliate-coupon-inner" => array(
            "box-shadow"=>implode(',',$boxshadow),
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor']),
        ),

         " .affiliate-coupon-starrating-outer" => array(
              "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemt']), 
          ),

         

         " .affiliate-coupon-starratingTitle" => array(
              "text-align" => AFFILIATE_Helper::get_css_value($center), 
          ),

          " .affiliate-coupon-starrating .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),
          ),
 

        " .affiliate-coupon-image" => array(
           'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])),
        ),
        " .affiliate-coupon-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth'],'px'),
        ),

 

        " .affiliate-coupon-maintitle " => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
      ),        
      " .affiliate-coupon-inner .affiliate-coupon-content" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['contentfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['contentfontSizeDesktop'], $attr['contentfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['contentfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['contentfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['contentlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['contentletterSpacing'], $attr['contentletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['contenttextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['contenttextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['contentTextColor']),
       ),
      
        " .affiliate-coupon-btn-wrapper" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
        ),   
        

        " .affiliate-coupon-inner .seccol .affiliate-coupon-Verified" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['verifiedfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['verifiedfontSizeDesktop'], $attr['verifiedfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['verifiedfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['verifiedfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['verifiedlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['verifiedletterSpacing'], $attr['verifiedletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['verifiedtextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['verifiedtextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['verifiedColor']),
        ),


        " .affiliate-coupon-inner .seccol .affiliate-coupon-StaffPick" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['staffpickfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['staffpickfontSizeDesktop'], $attr['staffpickfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['staffpickfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['staffpickfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['staffpicklineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['staffpickletterSpacing'], $attr['staffpickletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['staffpicktextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['staffpicktextTransform']),
            "background" => AFFILIATE_Helper::get_css_value($attr['staffpickColor']),
        ),


        " .affiliate-coupon-inner .seccol .affiliate-coupon-PeopleUsed" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['peopleUsedfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['peopleUsedfontSizeDesktop'], $attr['peopleUsedfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['peopleUsedfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['peopleUsedfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['peopleUsedlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['peopleUsedletterSpacing'], $attr['peopleUsedletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['peopleUsedtextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['peopleUsedtextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['peopleUsedColor']),
        ),

        " .affiliate-coupon-inner .seccol .affiliate-coupon-onlyLeft" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['onlyLeftfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['onlyLeftfontSizeDesktop'], $attr['onlyLeftfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['onlyLeftfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['onlyLeftfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['onlyLeftlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['onlyLeftletterSpacing'], $attr['onlyLeftletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['onlyLefttextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['onlyLefttextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['onlyLeftColor']),
        ),

        " .affiliate-coupon-inner .thirdcol .affiliate-coupon-onGoingOffer" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferfontSizeDesktop'], $attr['onGoingOfferfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferletterSpacing'], $attr['onGoingOfferletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['onGoingOffertextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['onGoingOffertextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['onGoingOfferColor']),
        ),


        " .affiliate-coupon-btn-wrapper" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
        ),   
      " .affiliate-coupon-btn-wrapper .affiliate-btn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
        ),
         
         
      " .affiliate-coupon-btn-wrapper .affiliate-btn:hover" => array(
          'background' => AFFILIATE_Helper::get_css_value($btnBgHover),
          'border-color' => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
          'color' => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
      ),
     
    
      );
      
      $m_selectors = array(
        " .affiliate-coupon-maintitle " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
        ),

         " .affiliate-coupon-starrating" => array(
          "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemtMobile']),  
      ),
      " .affiliate-coupon-starrating .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),
      ),

    


        " .affiliate-coupon-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])),
          ),
        " .affiliate-coupon-image img" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile'],'px'),
       ),
 


        " .affiliate-coupon-inner .affiliate-coupon-content" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['contentfontSizeMobile'], $attr['contentfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['contentlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['contentletterSpacingMobile'], $attr['contentletterSpacingTypeMobile']),
            
        ),
        
        " .affiliate-coupon-inner .seccol .affiliate-coupon-Verified" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['verifiedfontSizeMobile'], $attr['verifiedfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['verifiedlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['verifiedletterSpacingMobile'], $attr['verifiedletterSpacingTypeMobile']),
          ),


        " .affiliate-coupon-inner .seccol .affiliate-coupon-onlyLeft" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['onlyLeftfontSizeMobile'], $attr['onlyLeftfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['onlyLeftlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['onlyLeftletterSpacingMobile'], $attr['onlyLeftletterSpacingTypeMobile']),
          ),


        " .affiliate-coupon-inner .seccol .affiliate-coupon-StaffPick" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['staffpickfontSizeMobile'], $attr['staffpickfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['staffpicklineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['staffpickletterSpacingMobile'], $attr['staffpickletterSpacingTypeMobile']),
          ),

        " .affiliate-coupon-inner .seccol .affiliate-coupon-PeopleUsed" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['peopleUsedfontSizeMobile'], $attr['peopleUsedfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['peopleUsedlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['peopleUsedletterSpacingMobile'], $attr['peopleUsedletterSpacingTypeMobile']),
          ),


         " .affiliate-coupon-inner .thirdcol .affiliate-coupon-onGoingOffer" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferfontSizeMobile'], $attr['onGoingOfferfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferlineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferletterSpacingMobile'], $attr['onGoingOfferletterSpacingTypeMobile']),
          ),


        " .affiliate-coupon-btn-wrapper .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
          ),
           
      );

      $t_selectors = array(
        " .affiliate-coupon-maintitle " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),

        " .affiliate-coupon-starrating" => array(
          "justify-content" => AFFILIATE_Helper::get_css_value($attr['ratingAlignemtTablet']),  
      ),
      " .affiliate-coupon-starrating .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),
      ),

        " .affiliate-coupon-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet'],'px'),
        ),
        " .affiliate-coupon-inner .affiliate-coupon-content" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['contentfontSizeTablet'], $attr['contentfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['contentlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['contentletterSpacingTablet'], $attr['contentletterSpacingTypeTablet']),
            
        ),
        " .affiliate-coupon-image" => array(
          'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])),
          ),
 

        " .affiliate-coupon-inner .seccol .affiliate-coupon-Verified" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['verifiedfontSizeTablet'], $attr['verifiedfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['verifiedlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['verifiedletterSpacingTablet'], $attr['verifiedletterSpacingTypeTablet']),
          ),

        " .affiliate-coupon-inner .seccol .affiliate-coupon-StaffPick" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['staffpickfontSizeTablet'], $attr['staffpickfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['staffpicklineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['staffpickletterSpacingTablet'], $attr['staffpickletterSpacingTypeTablet']),
          ),

         " .affiliate-coupon-inner .seccol .affiliate-coupon-PeopleUsed" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['peopleUsedfontSizeTablet'], $attr['peopleUsedfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['peopleUsedlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['peopleUsedletterSpacingTablet'], $attr['peopleUsedletterSpacingTypeTablet']),
          ),

         " .affiliate-coupon-inner .seccol .affiliate-coupon-onlyLeft" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['onlyLeftfontSizeTablet'], $attr['onlyLeftfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['onlyLeftlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['onlyLeftletterSpacingTablet'], $attr['onlyLeftletterSpacingTypeTablet']),
          ),


         " .affiliate-coupon-inner .thirdcol .affiliate-coupon-onGoingOffer" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferfontSizeTablet'], $attr['onGoingOfferfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferlineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['onGoingOfferletterSpacingTablet'], $attr['onGoingOfferletterSpacingTypeTablet']),
          ),

        " .affiliate-coupon-btn-wrapper .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
          ),
           
      );

        
        if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'gradient'){
            if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
              $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


        if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'gradient'){
            if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
              $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
            } else {
              $selectors[" .affiliate-coupon-btn-wrapper .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
            }
          }
        }  


      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function blocks_coupon4_gfont($attr)
    {
      
      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';
 

      $content_load_google_font = isset($attr['contentLoadGoogleFonts']) ? $attr['contentLoadGoogleFonts'] : '';
      $content_font_family      = isset($attr['contentfontFamily']) ? $attr['contentfontFamily'] : '';
      $content_font_weight      = isset($attr['contentfontWeight']) ? $attr['contentfontWeight'] : '';
      $content_font_subset      = isset($attr['contentfontSubset']) ? $attr['contentfontSubset'] : '';
 
      $verified_load_google_font = isset($attr['verifiedLoadGoogleFonts']) ? $attr['verifiedLoadGoogleFonts'] : '';
      $verified_font_family      = isset($attr['verifiedfontFamily']) ? $attr['verifiedfontFamily'] : '';
      $verified_font_weight      = isset($attr['verifiedfontWeight']) ? $attr['verifiedfontWeight'] : '';
      $verified_font_subset      = isset($attr['verifiedfontSubset']) ? $attr['verifiedfontSubset'] : '';


      $staffpick_load_google_font = isset($attr['staffpickLoadGoogleFonts']) ? $attr['staffpickLoadGoogleFonts'] : '';
      $staffpick_font_family      = isset($attr['staffpickfontFamily']) ? $attr['staffpickfontFamily'] : '';
      $staffpick_font_weight      = isset($attr['staffpickfontWeight']) ? $attr['staffpickfontWeight'] : '';
      $staffpick_font_subset      = isset($attr['staffpickfontSubset']) ? $attr['staffpickfontSubset'] : '';


      $peopleUsed_load_google_font = isset($attr['peopleUsedLoadGoogleFonts']) ? $attr['peopleUsedLoadGoogleFonts'] : '';
      $peopleUsed_font_family      = isset($attr['peopleUsedfontFamily']) ? $attr['peopleUsedfontFamily'] : '';
      $peopleUsed_font_weight      = isset($attr['peopleUsedfontWeight']) ? $attr['peopleUsedfontWeight'] : '';
      $peopleUsed_font_subset      = isset($attr['peopleUsedfontSubset']) ? $attr['peopleUsedfontSubset'] : '';

      $onlyLeft_load_google_font = isset($attr['onlyLeftLoadGoogleFonts']) ? $attr['onlyLeftLoadGoogleFonts'] : '';
      $onlyLeft_font_family      = isset($attr['onlyLeftfontFamily']) ? $attr['onlyLeftfontFamily'] : '';
      $onlyLeft_font_weight      = isset($attr['onlyLeftfontWeight']) ? $attr['onlyLeftfontWeight'] : '';
      $onlyLeft_font_subset      = isset($attr['onlyLeftfontSubset']) ? $attr['onlyLeftfontSubset'] : '';


      $onGoingOffer_load_google_font = isset($attr['onGoingOfferLoadGoogleFonts']) ? $attr['onGoingOfferLoadGoogleFonts'] : '';
      $onGoingOffer_font_family      = isset($attr['onGoingOfferfontFamily']) ? $attr['onGoingOfferfontFamily'] : '';
      $onGoingOffer_font_weight      = isset($attr['onGoingOfferfontWeight']) ? $attr['onGoingOfferfontWeight'] : '';
      $onGoingOffer_font_subset      = isset($attr['onGoingOfferfontSubset']) ? $attr['onGoingOfferfontSubset'] : '';


        AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
       
      AFFILIATE_Helper::blocks_google_font($content_load_google_font, $content_font_family, $content_font_weight, $content_font_subset);


      AFFILIATE_Helper::blocks_google_font($verified_load_google_font, $verified_font_family, $verified_font_weight, $verified_font_subset);

      AFFILIATE_Helper::blocks_google_font($staffpick_load_google_font, $staffpick_font_family, $staffpick_font_weight, $staffpick_font_subset);

      AFFILIATE_Helper::blocks_google_font($peopleUsed_load_google_font, $peopleUsed_font_family, $peopleUsed_font_weight, $peopleUsed_font_subset);


      AFFILIATE_Helper::blocks_google_font($onlyLeft_load_google_font, $onlyLeft_font_family, $onlyLeft_font_weight, $onlyLeft_font_subset);

      AFFILIATE_Helper::blocks_google_font($onGoingOffer_load_google_font, $onGoingOffer_font_family, $onGoingOffer_font_weight, $onGoingOffer_font_subset);

    }

    public static function get_ratingbar_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-ratingbar']['attributes'];

      $attr = array_merge( $defaults, $attr );
      
      $m_selectors = array();
      $t_selectors = array();
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      
      $selectors = array(
        " .affiliate-rb-inner" => array(
            "box-shadow"=>implode(',',$boxshadow),
            'background' => AFFILIATE_Helper::get_css_value($attr['mainBgColor']),
        ), 
        " .affiliate-rb-maintitle " .$attr['titleTag1'] => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
      ),
      " .affiliate-rb-inner .affiliate-ratingbar-sub-title" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['subtitlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeDesktop'], $attr['subtitlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['subtitlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['subtitlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacing'], $attr['subtitleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['subtitletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['subtitletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['subtitleTextColor']),
       ),
        " .affiliate-progress-text" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['progressfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeDesktop'], $attr['progressfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['progressfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['progressfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacing'], $attr['progressletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['progresstextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['progresstextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['progressTextColor']),
        ),
       
        " .affiliate-progress-bar" => array(
            'width' => @AFFILIATE_Helper::get_css_value(($attr['progressWidth']*100)/5,'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor']),
        ),
        " .affiliate-progress" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight'],'px'),
        ), 


        //Rating Bar 2        
        " .affiliate-progress-bar1" => array(
            'width' => @AFFILIATE_Helper::get_css_value(($attr['progressWidth1']*100)/5,'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight1'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor1']),
        ),
        " .affiliate-progress1" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight1'],'px'),
        ), 


        //Rating Bar 3 
        " .affiliate-progress-bar2" => array(
            'width' => @AFFILIATE_Helper::get_css_value(($attr['progressWidth2']*100)/5,'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight2'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor2']),
        ),
        " .affiliate-progress2" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight2'],'px'),
        ),


        //Rating Bar 4 
        " .affiliate-progress-bar3" => array(
            'width' => @AFFILIATE_Helper::get_css_value(($attr['progressWidth3']*100)/5,'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight3'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor3']),
        ),
        " .affiliate-progress3" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight3'],'px'),
        ),

        //Rating Bar 5       
        " .affiliate-progress-bar4" => array(
            'width' => @AFFILIATE_Helper::get_css_value(($attr['progressWidth4']*100)/5,'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight4'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor4']),
        ),
        " .affiliate-progress4" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight4'],'px'),
        ),


        //Rating Bar 6       
        " .affiliate-progress-bar5" => array(
            'width' => @AFFILIATE_Helper::get_css_value(($attr['progressWidth5']*100)/5,'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight5'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor5']),
        ),
        " .affiliate-progress5" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight5'],'px'),
        ),


        //Rating Bar 7      
        " .affiliate-progress-bar6" => array(
            'width' => @AFFILIATE_Helper::get_css_value(($attr['progressWidth6']*100)/5,'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight6'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor6']),
        ),
        " .affiliate-progress6" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight6'],'px'),
        ),


        //Rating Bar 8       
        " .affiliate-progress-bar7" => array(
            'width' => @AFFILIATE_Helper::get_css_value(($attr['progressWidth7']*100)/5,'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight7'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor7']),
        ),
        " .affiliate-progress7" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight7'],'px'),
        ),


        //Rating Bar 9       
        " .affiliate-progress-bar8" => array(
            'width' => @AFFILIATE_Helper::get_css_value(($attr['progressWidth8']*100)/5,'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight8'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor8']),
        ),
        " .affiliate-progress8" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight8'],'px'),
        ),


         //Rating Bar 10       
        " .affiliate-progress-bar9" => array(
            'width' => @AFFILIATE_Helper::get_css_value(($attr['progressWidth9']*100)/5,'%'),
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight9'],'px'),
            'background-color' => AFFILIATE_Helper::get_css_value($attr['progressBgColor9']),
        ),
        " .affiliate-progress9" => array(
            'height' => AFFILIATE_Helper::get_css_value($attr['progressHeight9'],'px'),
        ),

      
      );
      
      $m_selectors = array(
        " .affiliate-rb-maintitle " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
        ),
        
        " .affiliate-rb-inner .affiliate-ratingbar-sub-title" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeMobile'], $attr['subtitlefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingMobile'], $attr['subtitleletterSpacingTypeMobile']),
            
        ),
        
          " .affiliate-progress-text" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeMobile'], $attr['progressfontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacingMobile'], $attr['progressletterSpacingTypeMobile']),
          ),
      );

      $t_selectors = array(
        " .affiliate-rb-maintitle " .$attr['titleTag1'] => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),
       
        " .affiliate-rb-inner .affiliate-ratingbar-sub-title" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeTablet'], $attr['subtitlefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingTablet'], $attr['subtitleletterSpacingTypeTablet']),
            
        ),
       
          " .affiliate-progress-text" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['progressfontSizeTablet'], $attr['progressfontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['progresslineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['progressletterSpacingTablet'], $attr['progressletterSpacingTypeTablet']),
          ),
      );
      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function blocks_ratingbar_gfont($attr){

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $progress_load_google_font = isset($attr['progressLoadGoogleFonts']) ? $attr['progressLoadGoogleFonts'] : '';
      $progress_font_family      = isset($attr['progressfontFamily']) ? $attr['progressfontFamily'] : '';
      $progress_font_weight      = isset($attr['progressfontWeight']) ? $attr['progressfontWeight'] : '';
      $progress_font_subset      = isset($attr['progressfontSubset']) ? $attr['progressfontSubset'] : '';

      $subtitle_load_google_font = isset($attr['subtitleLoadGoogleFonts']) ? $attr['subtitleLoadGoogleFonts'] : '';
      $subtitle_font_family      = isset($attr['subtitlefontFamily']) ? $attr['subtitlefontFamily'] : '';
      $subtitle_font_weight      = isset($attr['subtitlefontWeight']) ? $attr['subtitlefontWeight'] : '';
      $subtitle_font_subset      = isset($attr['subtitlefontSubset']) ? $attr['subtitlefontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($progress_load_google_font, $progress_font_family, $progress_font_weight, $progress_font_subset);
      AFFILIATE_Helper::blocks_google_font($subtitle_load_google_font, $subtitle_font_family, $subtitle_font_weight, $subtitle_font_subset);
    }


    public static function get_star_review_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-star-review']['attributes'];

      $attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }
      
      $m_selectors = array();
      $t_selectors = array();
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      
      $selectors = array(
        " .affiliate-starreview-inner" => array(
            "box-shadow"=>implode(',',$boxshadow),
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor']),
        ),

          " .affiliate-starreview-starrating .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),
          ),


           " .affiliate-starreview-footerbox-right .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starsSize'], 'px'),
          ),

        " .affiliate-starreview-maintitle" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
      ),  

        " .affiliate-starreview-subtitle" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['subtitlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeDesktop'], $attr['subtitlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['subtitlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['subtitlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacing'], $attr['subtitleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['subtitletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['subtitletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['subtitleColor']),
      ),  

      " .affiliate-starreview-inner .affiliate-star-item .affiliate-txtbox-title" => array(
            "color" => AFFILIATE_Helper::get_css_value($attr['contentTextColor']),
       ),    



      " .affiliate-abbtn" => array(
          'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
          'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
          'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
          'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
          'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
          "background" => AFFILIATE_Helper::get_css_value($btnBg),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
          "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
      ),
      " .affiliate-abbtn-inner" => array(
          "justify-content" => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
      ),
      " .affiliate-abbtn:hover" => array(
          "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
          "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
          "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
      ),

      
     
    
      );
      
      $m_selectors = array(
        " .affiliate-starreview-maintitle" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
        ),

         " .affiliate-starreview-subtitle" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeMobile'], $attr['subtitlefontSizeTypeMobile']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightMobile']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingMobile'], $attr['subtitleletterSpacingTypeMobile']),
        ),

         
      " .affiliate-starreview-starrating .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),
      ),

      " .affiliate-starreview-footerbox-right .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeMobile'], 'px'),
          ),


      " .affiliate-abbtn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignmentMobile']),
        ),

        
      );

      $t_selectors = array(
        " .affiliate-starreview-maintitle" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),

        " .affiliate-starreview-subtitle" => array(
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeTablet'], $attr['subtitlefontSizeTypeTablet']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightTablet']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingTablet'], $attr['subtitleletterSpacingTypeTablet']),
        ),

      
      " .affiliate-starreview-starrating .affiliate-star-item svg" => array(
          "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),  
          "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),
      ),

      " .affiliate-starreview-footerbox-right .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starsSizeTablet'], 'px'),
          ),

       
       " .affiliate-abbtn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
        ),

        
      );



        if($attr['btnBg']['openBg'] == 1){
            if($attr['btnBg']['bgType'] == 'gradient'){
              if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
                $selectors[" .affiliate-abbtn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
              } else {
                $selectors[" .affiliate-abbtn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
              }
            }
          }  


          if($attr['btnBgHover']['openBg'] == 1){
            if($attr['btnBgHover']['bgType'] == 'gradient'){
              if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
                $selectors[" .affiliate-abbtn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
              } else {
                $selectors[" .affiliate-abbtn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
              }
            }
          }  


      
        $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
        $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
        $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

        $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

        $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

        $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

        $generated_css = array(
          'desktop' => $desktop,
          'tablet'  => $tablet,
          'mobile'  => $mobile,
        );
        return $generated_css;
    }

    public static function blocks_star_review_gfont($attr)
    {
      
      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $content_load_google_font = isset($attr['contentLoadGoogleFonts']) ? $attr['contentLoadGoogleFonts'] : '';
      $content_font_family      = isset($attr['contentfontFamily']) ? $attr['contentfontFamily'] : '';
      $content_font_weight      = isset($attr['contentfontWeight']) ? $attr['contentfontWeight'] : '';
      $content_font_subset      = isset($attr['contentfontSubset']) ? $attr['contentfontSubset'] : '';


      $subtitle_load_google_font = isset($attr['subtitleLoadGoogleFonts']) ? $attr['subtitleLoadGoogleFonts'] : '';
      $subtitle_font_family      = isset($attr['subtitlefontFamily']) ? $attr['subtitlefontFamily'] : '';
      $subtitle_font_weight      = isset($attr['subtitlefontWeight']) ? $attr['subtitlefontWeight'] : '';
      $subtitle_font_subset      = isset($attr['subtitlefontSubset']) ? $attr['subtitlefontSubset'] : '';

      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($subtitle_load_google_font, $subtitle_font_family, $subtitle_font_weight, $subtitle_font_subset);
      AFFILIATE_Helper::blocks_google_font($content_load_google_font, $content_font_family, $content_font_weight, $content_font_subset);


      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);

    }




    public static function get_product_table_1_table_css($attr, $id)
    {    // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-product-table-1']['attributes'];

      $attr = array_merge($defaults, (array) $attr);

      $selectors = self::get_product_table_1_table_deskselectors($attr);

      $m_selectors = self::get_product_table_1_table_mobselectors($attr);

      $t_selectors = self::get_product_table_1_table_tabselectors($attr);
      // // @codingStandardsIgnoreEnd

      $desktop = AFFILIATE_Helper::generate_css($selectors, '#affiliate-style-' . $id);

      $tablet = AFFILIATE_Helper::generate_css($t_selectors, '#affiliate-style-' . $id);

      $mobile = AFFILIATE_Helper::generate_css($m_selectors, '#affiliate-style-' . $id);

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );

      return $generated_css;
    }

    public static function get_product_table_1_table_deskselectors($attr){
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }


        $btnBg = '';
        if($attr['btnBg']['openBg'] == 1){
            if($attr['btnBg']['bgType'] == 'color'){
               $btnBg = $attr['btnBg']['bgDefaultColor']; 
            }
        } 

        $btnBgHover = '';
        if($attr['btnBgHover']['openBg'] == 1){
            if($attr['btnBgHover']['bgType'] == 'color'){
               $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
            }
        }

      $desktop_css = array(
        " .af-is-custom" => array(
          "width" => AFFILIATE_Helper::get_css_value($attr['btnCustomWidth'],'px'),
        ),
        " .affiliate-producttable1-inner" => array(
            "box-shadow" => implode('',$boxshadow),
        ),
        " .affiliate-producttable1-btn" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
            "background" => AFFILIATE_Helper::get_css_value($btnBg),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
          ),
          " .affiliate-producttable1-btn:hover" => array(
            "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
          ),  
          " .affiliate-txtbox-title" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
        ),
        " .affiliate-item-badge" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['badgefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['badgefontSizeDesktop'], $attr['badgefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['badgefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['badgefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['badgelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['badgeletterSpacing'], $attr['badgeletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['badgetextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['badgetextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['badgeTextColor']),
              "background" => AFFILIATE_Helper::get_css_value($attr['badgeBgColor']),
          ),
          " .affiliate-producttable1-readmore" => array(
                'font-family' => AFFILIATE_Helper::get_css_value($attr['readMorefontFamily']),
                'font-size' => AFFILIATE_Helper::get_css_value($attr['readMorefontSizeDesktop'], $attr['readMorefontSizeType']),
                'font-weight' => AFFILIATE_Helper::get_css_value($attr['readMorefontWeight']),
                'font-style' => AFFILIATE_Helper::get_css_value($attr['readMorefontStyle']),
                'line-height' => AFFILIATE_Helper::get_css_value($attr['readMorelineHeight']),
                'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['readMoreletterSpacing'], $attr['readMoreletterSpacingType']),
                'text-decoration' => AFFILIATE_Helper::get_css_value($attr['readMoretextDecoration']),
                'text-transform' => AFFILIATE_Helper::get_css_value($attr['readMoretextTransform']),
                "color" => AFFILIATE_Helper::get_css_value($attr['readMoreTextColor']),
          ),
          " .affiliate-producttable1-th th" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['thfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeDesktop'], $attr['thfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['thfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['thfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacing'], $attr['thletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['thtextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['thtextTransform']),
              "background" => AFFILIATE_Helper::get_css_value($attr['HBgColor']),
              "color" => AFFILIATE_Helper::get_css_value($attr['HTxtColor']),
        ),
        " .affiliate-producttable1-cntn .affiliate-col-ct1 li, .affiliate-producttable1-cntn .affiliate-col-ct2 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['tdTxtColor']),
        ),
        " tr:nth-of-type(odd)" => array(
            "background" => AFFILIATE_Helper::get_css_value($attr['tOddColor']),
        ),
        " tr:nth-of-type(even)" => array(
          "background" => AFFILIATE_Helper::get_css_value($attr['tEvenColor']),
        ),
        " .affiliate-img-rating" => array(
            "color" => AFFILIATE_Helper::get_css_value($attr['itemRatingTextColor']), 
        ),

        " .affiliate-rating-circle .progress .progress-bar" => array( 
            "border-color" => AFFILIATE_Helper::get_css_value($attr['itemRatingBgColor']),
            "color" => AFFILIATE_Helper::get_css_value($attr['itemRatingBgColor']),
        ),

      );


      if($attr['btnBg']['openBg'] == 1){
            if($attr['btnBg']['bgType'] == 'gradient'){
              if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
                $desktop_css[" .affiliate-producttable1-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
              } else {
                $desktop_css[" .affiliate-producttable1-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
              }
            }
          }  


          if($attr['btnBgHover']['openBg'] == 1){
            if($attr['btnBgHover']['bgType'] == 'gradient'){
              if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
                $desktop_css[" .affiliate-producttable1-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
              } else {
                $desktop_css[" .affiliate-producttable1-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
              }
            }
          } 


      $desktop_css =  AFFILIATE_Helper::regenerate_stylesheet($desktop_css);

      return $desktop_css;
    }

    public static function get_product_table_1_table_tabselectors($attr){
      $tablet_css = array(
        " .affiliate-producttable1-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
        ),
        " .affiliate-producttable1-th th" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeTablet'], $attr['thfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacingTablet'], $attr['thletterSpacingTypeTablet']),
        ),

        " .affiliate-producttable1-cntn .affiliate-col-ct1, .affiliate-producttable1-cntn .affiliate-col-ct2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),

      );

      $tablet_css =  AFFILIATE_Helper::regenerate_stylesheet($tablet_css);

      return $tablet_css;
    }

    public static function get_product_table_1_table_mobselectors($attr){
      $mobile_css = array(
        " .affiliate-producttable1-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
        ),
        " .affiliate-producttable1-th th" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeMobile'], $attr['thfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacingMobile'], $attr['thletterSpacingTypeMobile']),
        ),
        " .affiliate-producttable1-cntn .affiliate-col-ct1, .affiliate-producttable1-cntn .affiliate-col-ct2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
        ),
      );

      $mobile_css =  AFFILIATE_Helper::regenerate_stylesheet($mobile_css);

      return $mobile_css;
    }

    public static function blocks_product_table_1_table_gfont($attr)
    {

      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $readMore_load_google_font = isset($attr['readMoreLoadGoogleFonts']) ? $attr['readMoreLoadGoogleFonts'] : '';
      $readMore_font_family      = isset($attr['readMorefontFamily']) ? $attr['readMorefontFamily'] : '';
      $readMore_font_weight      = isset($attr['readMorefontWeight']) ? $attr['readMorefontWeight'] : '';
      $readMore_font_subset      = isset($attr['readMorefontSubset']) ? $attr['readMorefontSubset'] : '';

      $badge_load_google_font = isset($attr['badgeLoadGoogleFonts']) ? $attr['badgeLoadGoogleFonts'] : '';
      $badge_font_family      = isset($attr['badgefontFamily']) ? $attr['badgefontFamily'] : '';
      $badge_font_weight      = isset($attr['badgefontWeight']) ? $attr['badgefontWeight'] : '';
      $badge_font_subset      = isset($attr['badgefontSubset']) ? $attr['badgefontSubset'] : '';

      $th_load_google_font = isset($attr['thLoadGoogleFonts']) ? $attr['thLoadGoogleFonts'] : '';
      $th_font_family      = isset($attr['thfontFamily']) ? $attr['thfontFamily'] : '';
      $th_font_weight      = isset($attr['thfontWeight']) ? $attr['thfontWeight'] : '';
      $th_font_subset      = isset($attr['thfontSubset']) ? $attr['thfontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($readMore_load_google_font, $readMore_font_family, $readMore_font_weight, $readMore_font_subset);
      AFFILIATE_Helper::blocks_google_font($badge_load_google_font, $badge_font_family, $badge_font_weight, $badge_font_subset);
      AFFILIATE_Helper::blocks_google_font($th_load_google_font, $th_font_family, $th_font_weight, $th_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
    }



    public static function get_product_table_2_table_css($attr, $id)
    {    // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-product-table-2']['attributes'];

      $attr = array_merge($defaults, (array) $attr);

      $selectors = self::get_product_table_2_table_deskselectors($attr); 

      $m_selectors = self::get_product_table_2_table_mobselectors($attr);

      $t_selectors = self::get_product_table_2_table_tabselectors($attr);
      // // @codingStandardsIgnoreEnd

      $desktop = AFFILIATE_Helper::generate_css($selectors, '#affiliate-style-' . $id);

      $tablet = AFFILIATE_Helper::generate_css($t_selectors, '#affiliate-style-' . $id);

      $mobile = AFFILIATE_Helper::generate_css($m_selectors, '#affiliate-style-' . $id);

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );

      return $generated_css;
    }

    public static function get_product_table_2_table_deskselectors($attr){

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }


      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }
      $desktop_css = array(
        " .af-is-custom" => array(
          "width" => AFFILIATE_Helper::get_css_value($attr['btnCustomWidth'],'px'),
        ),
        " .affiliate-producttable2-inner" => array(
            "box-shadow" => implode('',$boxshadow),
        ),
        " .affiliate-producttable2-btn" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
            "background" => AFFILIATE_Helper::get_css_value($btnBg),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
          ),
          " .affiliate-producttable2-btn:hover" => array(
            "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
          ),  
          " .affiliate-txtbox-title" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
        ),
        " .affiliate-producttable2-inner .affiliate-col-rank" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['badgefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['badgefontSizeDesktop'], $attr['badgefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['badgefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['badgefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['badgelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['badgeletterSpacing'], $attr['badgeletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['badgetextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['badgetextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['badgeTextColor']),
              "background" => AFFILIATE_Helper::get_css_value($attr['badgeBgColor']),
          ),

          " .affiliate-producttable2-inner .affiliate-item-badge" => array(
              "background" => AFFILIATE_Helper::get_css_value($attr['badgeBgColor']),
              'font-family' => AFFILIATE_Helper::get_css_value($attr['badgefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['badgefontSizeDesktop'], $attr['badgefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['badgefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['badgefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['badgelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['badgeletterSpacing'], $attr['badgeletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['badgetextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['badgetextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['badgeTextColor']),
          ),

          " .affiliate-producttable2-readmore" => array(
                'font-family' => AFFILIATE_Helper::get_css_value($attr['readMorefontFamily']),
                'font-size' => AFFILIATE_Helper::get_css_value($attr['readMorefontSizeDesktop'], $attr['readMorefontSizeType']),
                'font-weight' => AFFILIATE_Helper::get_css_value($attr['readMorefontWeight']),
                'font-style' => AFFILIATE_Helper::get_css_value($attr['readMorefontStyle']),
                'line-height' => AFFILIATE_Helper::get_css_value($attr['readMorelineHeight']),
                'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['readMoreletterSpacing'], $attr['readMoreletterSpacingType']),
                'text-decoration' => AFFILIATE_Helper::get_css_value($attr['readMoretextDecoration']),
                'text-transform' => AFFILIATE_Helper::get_css_value($attr['readMoretextTransform']),
                "color" => AFFILIATE_Helper::get_css_value($attr['readMoreTextColor']),
          ),
          " .affiliate-producttable2-th th" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['thfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeDesktop'], $attr['thfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['thfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['thfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacing'], $attr['thletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['thtextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['thtextTransform']),
              "background" => AFFILIATE_Helper::get_css_value($attr['HBgColor']),
              "color" => AFFILIATE_Helper::get_css_value($attr['HTxtColor']),
        ),
        " .affiliate-producttable2-cntn .affiliate-col-ct1 li, .affiliate-producttable2-cntn .affiliate-col-ct2 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['tdTxtColor']),
        ),
        " tr:nth-of-type(odd)" => array(
            "background" => AFFILIATE_Helper::get_css_value($attr['tOddColor']),
        ),
        " tr:nth-of-type(even)" => array(
          "background" => AFFILIATE_Helper::get_css_value($attr['tEvenColor']),
        ),
        " .affiliate-img-rating" => array(
            "color" => AFFILIATE_Helper::get_css_value($attr['itemRatingTextColor']), 
        ),

        " .progress2 .progress-bar2" => array( 
            "background" => AFFILIATE_Helper::get_css_value($attr['itemRatingBgColor']),
        ),

      );

      
      if($attr['btnBg']['openBg'] == 1){
            if($attr['btnBg']['bgType'] == 'gradient'){
              if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
                $desktop_css[" .affiliate-producttable2-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
              } else {
                $desktop_css[" .affiliate-producttable2-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
              }
            }
          }  


          if($attr['btnBgHover']['openBg'] == 1){
            if($attr['btnBgHover']['bgType'] == 'gradient'){
              if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
                $desktop_css[" .affiliate-producttable2-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
              } else {
                $desktop_css[" .affiliate-producttable2-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
              }
            }
          } 


      $desktop_css =  AFFILIATE_Helper::regenerate_stylesheet($desktop_css);

      return $desktop_css;
    }

    public static function get_product_table_2_table_tabselectors($attr){
      $tablet_css = array(
        " .affiliate-producttable2-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
        ),
        " .affiliate-producttable2-th th" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeTablet'], $attr['thfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacingTablet'], $attr['thletterSpacingTypeTablet']),
        ),

        " .affiliate-producttable2-cntn .affiliate-col-ct1, .affiliate-producttable2-cntn .affiliate-col-ct2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),

      );

      $tablet_css =  AFFILIATE_Helper::regenerate_stylesheet($tablet_css);

      return $tablet_css;
    }

    public static function get_product_table_2_table_mobselectors($attr){
      $mobile_css = array(
        " .affiliate-producttable2-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
        ),
        " .affiliate-producttable2-th th" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeMobile'], $attr['thfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacingMobile'], $attr['thletterSpacingTypeMobile']),
        ),
        " .affiliate-producttable2-cntn .affiliate-col-ct1, .affiliate-producttable2-cntn .affiliate-col-ct2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
        ),
      );

      $mobile_css =  AFFILIATE_Helper::regenerate_stylesheet($mobile_css);

      return $mobile_css;
    }

    public static function blocks_product_table_2_table_gfont($attr)
    {

      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $readMore_load_google_font = isset($attr['readMoreLoadGoogleFonts']) ? $attr['readMoreLoadGoogleFonts'] : '';
      $readMore_font_family      = isset($attr['readMorefontFamily']) ? $attr['readMorefontFamily'] : '';
      $readMore_font_weight      = isset($attr['readMorefontWeight']) ? $attr['readMorefontWeight'] : '';
      $readMore_font_subset      = isset($attr['readMorefontSubset']) ? $attr['readMorefontSubset'] : '';

      $badge_load_google_font = isset($attr['badgeLoadGoogleFonts']) ? $attr['badgeLoadGoogleFonts'] : '';
      $badge_font_family      = isset($attr['badgefontFamily']) ? $attr['badgefontFamily'] : '';
      $badge_font_weight      = isset($attr['badgefontWeight']) ? $attr['badgefontWeight'] : '';
      $badge_font_subset      = isset($attr['badgefontSubset']) ? $attr['badgefontSubset'] : '';

      $th_load_google_font = isset($attr['thLoadGoogleFonts']) ? $attr['thLoadGoogleFonts'] : '';
      $th_font_family      = isset($attr['thfontFamily']) ? $attr['thfontFamily'] : '';
      $th_font_weight      = isset($attr['thfontWeight']) ? $attr['thfontWeight'] : '';
      $th_font_subset      = isset($attr['thfontSubset']) ? $attr['thfontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($readMore_load_google_font, $readMore_font_family, $readMore_font_weight, $readMore_font_subset);
      AFFILIATE_Helper::blocks_google_font($badge_load_google_font, $badge_font_family, $badge_font_weight, $badge_font_subset);
      AFFILIATE_Helper::blocks_google_font($th_load_google_font, $th_font_family, $th_font_weight, $th_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
    }  



    public static function get_product_table_3_table_css($attr, $id)
    {    // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-product-table-3']['attributes'];

      $attr = array_merge($defaults, (array) $attr);

      $selectors = self::get_product_table_3_table_deskselectors($attr); 

      $m_selectors = self::get_product_table_3_table_mobselectors($attr);

      $t_selectors = self::get_product_table_3_table_tabselectors($attr);
      // // @codingStandardsIgnoreEnd

      $desktop = AFFILIATE_Helper::generate_css($selectors, '#affiliate-style-' . $id);

      $tablet = AFFILIATE_Helper::generate_css($t_selectors, '#affiliate-style-' . $id);

      $mobile = AFFILIATE_Helper::generate_css($m_selectors, '#affiliate-style-' . $id);

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );

      return $generated_css;
    }

    public static function get_product_table_3_table_deskselectors($attr){

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }

      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }
      $desktop_css = array(
        " .af-is-custom" => array(
          "width" => AFFILIATE_Helper::get_css_value($attr['btnCustomWidth'],'px'),
        ),
        " .affiliate-producttable3-inner" => array(
            "box-shadow" => implode('',$boxshadow),
        ),
        " .affiliate-producttable3-btn" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
            "background" => AFFILIATE_Helper::get_css_value($btnBg),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
          ),
          " .affiliate-producttable3-btn:hover" => array(
            "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
          ),  
          " .affiliate-txtbox-title" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
        ),
        " .affiliate-producttable3-inner .affiliate-item-badge" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['badgefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['badgefontSizeDesktop'], $attr['badgefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['badgefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['badgefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['badgelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['badgeletterSpacing'], $attr['badgeletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['badgetextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['badgetextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['badgeTextColor']),
              "background" => AFFILIATE_Helper::get_css_value($attr['badgeBgColor']),
          ),

        " .affiliate-producttable3-inner .affiliate-item-badge" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['badgefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['badgefontSizeDesktop'], $attr['badgefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['badgefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['badgefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['badgelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['badgeletterSpacing'], $attr['badgeletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['badgetextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['badgetextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['badgeTextColor']),
              "background" => AFFILIATE_Helper::get_css_value($attr['badgeBgColor']),
          ),

          " .affiliate-producttable3-readmore" => array(
                'font-family' => AFFILIATE_Helper::get_css_value($attr['readMorefontFamily']),
                'font-size' => AFFILIATE_Helper::get_css_value($attr['readMorefontSizeDesktop'], $attr['readMorefontSizeType']),
                'font-weight' => AFFILIATE_Helper::get_css_value($attr['readMorefontWeight']),
                'font-style' => AFFILIATE_Helper::get_css_value($attr['readMorefontStyle']),
                'line-height' => AFFILIATE_Helper::get_css_value($attr['readMorelineHeight']),
                'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['readMoreletterSpacing'], $attr['readMoreletterSpacingType']),
                'text-decoration' => AFFILIATE_Helper::get_css_value($attr['readMoretextDecoration']),
                'text-transform' => AFFILIATE_Helper::get_css_value($attr['readMoretextTransform']),
                "color" => AFFILIATE_Helper::get_css_value($attr['readMoreTextColor']),
          ),
          " .affiliate-producttable3-th th" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['thfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeDesktop'], $attr['thfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['thfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['thfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacing'], $attr['thletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['thtextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['thtextTransform']),
              "background" => AFFILIATE_Helper::get_css_value($attr['HBgColor']),
              "color" => AFFILIATE_Helper::get_css_value($attr['HTxtColor']),
        ),
        " .affiliate-producttable3-cntn .affiliate-col-ct1 li, .affiliate-producttable3-cntn .affiliate-col-ct2 li" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['tdTxtColor']),
        ),
        " tr:nth-of-type(odd)" => array(
            "background" => AFFILIATE_Helper::get_css_value($attr['tOddColor']),
        ),
        " tr:nth-of-type(even)" => array(
          "background" => AFFILIATE_Helper::get_css_value($attr['tEvenColor']),
        ),
        " .affiliate-img-rating" => array(
            "color" => AFFILIATE_Helper::get_css_value($attr['itemRatingTextColor']), 
        ),

        " .progress3 .progress-bar3" => array( 
            "background" => AFFILIATE_Helper::get_css_value($attr['itemRatingBgColor']),
        ),

      );


      if($attr['btnBg']['openBg'] == 1){
            if($attr['btnBg']['bgType'] == 'gradient'){
              if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
                $desktop_css[" .affiliate-producttable3-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
              } else {
                $desktop_css[" .affiliate-producttable3-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
              }
            }
          }  


          if($attr['btnBgHover']['openBg'] == 1){
            if($attr['btnBgHover']['bgType'] == 'gradient'){
              if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
                $desktop_css[" .affiliate-producttable3-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
              } else {
                $desktop_css[" .affiliate-producttable3-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
              }
            }
          } 

      $desktop_css =  AFFILIATE_Helper::regenerate_stylesheet($desktop_css);

      return $desktop_css;
    }

    public static function get_product_table_3_table_tabselectors($attr){
      $tablet_css = array(
        " .affiliate-producttable3-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
        ),
        " .affiliate-producttable3-th th" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeTablet'], $attr['thfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacingTablet'], $attr['thletterSpacingTypeTablet']),
        ),

        " .affiliate-producttable3-cntn .affiliate-col-ct1, .affiliate-producttable3-cntn .affiliate-col-ct2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),

      );

      $tablet_css =  AFFILIATE_Helper::regenerate_stylesheet($tablet_css);

      return $tablet_css;
    }

    public static function get_product_table_3_table_mobselectors($attr){
      $mobile_css = array(
        " .affiliate-producttable3-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
        ),
        " .affiliate-producttable3-th th" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['thfontSizeMobile'], $attr['thfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['thlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['thletterSpacingMobile'], $attr['thletterSpacingTypeMobile']),
        ),
        " .affiliate-producttable3-cntn .affiliate-col-ct1, .affiliate-producttable3-cntn .affiliate-col-ct2" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
        ),
      );

      $mobile_css =  AFFILIATE_Helper::regenerate_stylesheet($mobile_css);

      return $mobile_css;
    }

    public static function blocks_product_table_3_table_gfont($attr)
    {

      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $readMore_load_google_font = isset($attr['readMoreLoadGoogleFonts']) ? $attr['readMoreLoadGoogleFonts'] : '';
      $readMore_font_family      = isset($attr['readMorefontFamily']) ? $attr['readMorefontFamily'] : '';
      $readMore_font_weight      = isset($attr['readMorefontWeight']) ? $attr['readMorefontWeight'] : '';
      $readMore_font_subset      = isset($attr['readMorefontSubset']) ? $attr['readMorefontSubset'] : '';

      $badge_load_google_font = isset($attr['badgeLoadGoogleFonts']) ? $attr['badgeLoadGoogleFonts'] : '';
      $badge_font_family      = isset($attr['badgefontFamily']) ? $attr['badgefontFamily'] : '';
      $badge_font_weight      = isset($attr['badgefontWeight']) ? $attr['badgefontWeight'] : '';
      $badge_font_subset      = isset($attr['badgefontSubset']) ? $attr['badgefontSubset'] : '';

      $th_load_google_font = isset($attr['thLoadGoogleFonts']) ? $attr['thLoadGoogleFonts'] : '';
      $th_font_family      = isset($attr['thfontFamily']) ? $attr['thfontFamily'] : '';
      $th_font_weight      = isset($attr['thfontWeight']) ? $attr['thfontWeight'] : '';
      $th_font_subset      = isset($attr['thfontSubset']) ? $attr['thfontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($readMore_load_google_font, $readMore_font_family, $readMore_font_weight, $readMore_font_subset);
      AFFILIATE_Helper::blocks_google_font($badge_load_google_font, $badge_font_family, $badge_font_weight, $badge_font_subset);
      AFFILIATE_Helper::blocks_google_font($th_load_google_font, $th_font_family, $th_font_weight, $th_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
    }  



    public static function get_abtoppickspecs_css( $attr, $id ) { // @codingStandardsIgnoreStart
      
      $inset = '';
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-top-pick-specs']['attributes'];

      $attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }

      $btnBg2 = '';
      if($attr['btnBg2']['openBg'] == 1){
          if($attr['btnBg2']['bgType'] == 'color'){
             $btnBg2 = $attr['btnBg2']['bgDefaultColor']; 
          }
      } 

      $btnBgHover2 = '';
      if($attr['btnBgHover2']['openBg'] == 1){
          if($attr['btnBgHover2']['bgType'] == 'color'){
             $btnBgHover2 = $attr['btnBgHover2']['bgDefaultColor']; 
          }
      }


      $btnBg3 = '';
      if($attr['btnBg3']['openBg'] == 1){
          if($attr['btnBg3']['bgType'] == 'color'){
             $btnBg3 = $attr['btnBg3']['bgDefaultColor']; 
          }
      } 

      $btnBgHover3 = '';
      if($attr['btnBgHover3']['openBg'] == 1){
          if($attr['btnBgHover3']['bgType'] == 'color'){
             $btnBgHover3 = $attr['btnBgHover3']['bgDefaultColor']; 
          }
      }

      $m_selectors = array();
      $t_selectors = array();

      $boxshadow = array();
        if ($attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      $selectors = array(
        " .affiliate-toppickspecs" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['topPickfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeDesktop'], $attr['topPickfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['topPickfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['topPickfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacing'], $attr['topPickletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['topPicktextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['topPicktextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['topPickColor']),
            "background" => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
        ),
        " .affiliate-toppickspecs:after" => array(
              "border-right-color" => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
        ),
        " .affiliate-toppickspecs-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])),
        ),
        " .affiliate-toppickspecs-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth'],'px'),
        ),
        " .affiliate-toppickspecs-wrapper" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customWidth'], $attr['customWidthType']),
            'padding' => AFFILIATE_Helper::get_css_value($attr['boxPadding']['top'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['right'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['left'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['boxMargin']['top'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['right'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['left'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])),
            'border-style' => AFFILIATE_Helper::get_css_value($attr['boxBorderType']),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
            'border-width' => AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])),
            "box-shadow"=>implode(',',$boxshadow),
          ),
          " .affiliate-toppickspecs-title" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignment']),
          ),
          " .affiliate-toppickspecs-subtitle" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['subtitlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeDesktop'], $attr['subtitlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['subtitlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['subtitlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacing'], $attr['subtitleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['subtitletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['subtitletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['subtitleTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['subtitleAlignment']),
          ),
          " .affiliate-toppickspecs-cntn, .affiliate-toppickspecs-cntn li" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignment']),
              "flex-direction" => AFFILIATE_Helper::get_css_value($attr['imagePosition']),
          ),
          " .affiliate-toppickspecs-cntn li:before" => array(
             "color" => AFFILIATE_Helper::get_css_value($attr['iconColor']),
          ),    
          " .affiliate-toppickspecs-btn" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
          ),
          " .affiliate-toppickspecs-btn:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
          ),
          " .affiliate-toppickspecs-btn-wrapper" => array(
              "justify-content" => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
          ),


          " .affiliate-toppickspecs-btn.btn2" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily2']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop2'], $attr['btnfontSizeType2']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight2']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle2']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight2']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing2'], $attr['btnletterSpacingType2']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration2']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform2']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg2),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor2']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor2']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType2']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment2']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])),
          ),
          " .affiliate-toppickspecs-btn.btn2:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor2']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover2),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor2']),
          ),




          " .affiliate-toppickspecs-btn.btn3" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily3']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop3'], $attr['btnfontSizeType3']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight3']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle3']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight3']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing3'], $attr['btnletterSpacingType3']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration3']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform3']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg3),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor3']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor3']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType3']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment3']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])),
          ),
          " .affiliate-toppickspecs-btn.btn3:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor3']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover3),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor3']),
          ),


      );

      
      $m_selectors = array(
        " .affiliate-toppickspecs" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeMobile'], $attr['topPickfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacingMobile'], $attr['topPickletterSpacingTypeMobile']),
        ),
        " .affiliate-toppickspecs-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])),
        ),
        " .affiliate-toppickspecs-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile'],'px'),
        ),
        " .affiliate-toppickspecs-wrapper" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customWidthMobile'], $attr['customWidthTypeMobile']),  
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])),
        ),
        " .affiliate-toppickspecs-title" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignmentMobile']),
        ),
        " .affiliate-toppickspecs-subtitle" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeMobile'], $attr['subtitlefontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingMobile'], $attr['subtitleletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['subtitleAlignmentMobile']),
        ),
        " .affiliate-toppickspecs-cntn, .affiliate-toppickspecs-cntn li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignmentMobile']),
        ),
        " .affiliate-toppickspecs-btn" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
        ),

        " .affiliate-toppickspecs-btn.btn2" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile2'], $attr['btnfontSizeTypeMobile2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile2'], $attr['btnletterSpacingTypeMobile2']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])),
        ),


        " .affiliate-toppickspecs-btn.btn3" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile3'], $attr['btnfontSizeTypeMobile3']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile3']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile3'], $attr['btnletterSpacingTypeMobile3']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])),
        ),


      );

      $t_selectors = array(
        " .affiliate-toppickspecs" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeTablet'], $attr['topPickfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacingTablet'], $attr['topPickletterSpacingTypeTablet']),
        ),

        " .affiliate-toppickspecs-wrapper" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customWidthTablet'], $attr['customWidthTypeTablet']),
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])),
        ),
        " .affiliate-toppickspecs-title" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),
        " .affiliate-toppickspecs-subtitle" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeTablet'], $attr['subtitlefontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingTablet'], $attr['subtitleletterSpacingTypeTablet']),
      ),
      " .affiliate-toppickspecs-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])),
        ),
        " .affiliate-toppickspecs-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet'],'px'),
        ),
        " .affiliate-toppickspecs-cntn, .affiliate-toppickspecs-cntn li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),
        " .affiliate-toppickspecs-btn" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
        ),


        " .affiliate-toppickspecs-btn.btn2" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet2'], $attr['btnfontSizeTypeTablet2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet2'], $attr['btnletterSpacingTypeTablet2']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])),
        ),


        " .affiliate-toppickspecs-btn.btn3" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet3'], $attr['btnfontSizeTypeTablet3']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet3']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet3'], $attr['btnletterSpacingTypeTablet3']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])),
        ),


      );


      if($attr['btnBg']['openBg'] == 1){
        if($attr['btnBg']['bgType'] == 'gradient'){
          if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-toppickspecs-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-toppickspecs-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover']['openBg'] == 1){
        if($attr['btnBgHover']['bgType'] == 'gradient'){
          if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-toppickspecs-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-toppickspecs-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  



      if($attr['btnBg2']['openBg'] == 1){
        if($attr['btnBg2']['bgType'] == 'gradient'){
          if ($attr['btnBg2']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-toppickspecs-btn.btn2"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-toppickspecs-btn.btn2"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover2']['openBg'] == 1){
        if($attr['btnBgHover2']['bgType'] == 'gradient'){
          if ($attr['btnBgHover2']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-toppickspecs-btn.btn2:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-toppickspecs-btn.btn2:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
          }
        }
      }



      if($attr['btnBg3']['openBg'] == 1){
        if($attr['btnBg3']['bgType'] == 'gradient'){
          if ($attr['btnBg3']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-toppickspecs-btn.btn3"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-toppickspecs-btn.btn3"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover3']['openBg'] == 1){
        if($attr['btnBgHover3']['bgType'] == 'gradient'){
          if ($attr['btnBgHover3']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-toppickspecs-btn.btn3:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-toppickspecs-btn.btn3:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
          }
        }
      }


      // @codingStandardsIgnoreEnd

      $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
      $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
      $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

      $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

      $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

      $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );
      return $generated_css;
    }

    public static function blocks_abtoppickspecs_gfont($attr)
    {
      
      $topPick_load_google_font = isset($attr['topBoxLoadGoogleFonts']) ? $attr['topBoxLoadGoogleFonts'] : '';
      $topPick_font_family      = isset($attr['topPickfontFamily']) ? $attr['topPickfontFamily'] : '';
      $topPick_font_weight      = isset($attr['topPickfontWeight']) ? $attr['topPickfontWeight'] : '';
      $topPick_font_subset      = isset($attr['topPickfontSubset']) ? $attr['topPickfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $subtitle_load_google_font = isset($attr['subtitleLoadGoogleFonts']) ? $attr['subtitleLoadGoogleFonts'] : '';
      $subtitle_font_family      = isset($attr['subtitlefontFamily']) ? $attr['subtitlefontFamily'] : '';
      $subtitle_font_weight      = isset($attr['subtitlefontWeight']) ? $attr['subtitlefontWeight'] : '';
      $subtitle_font_subset      = isset($attr['subtitlefontSubset']) ? $attr['subtitlefontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($topPick_load_google_font, $topPick_font_family, $topPick_font_weight, $topPick_font_subset);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
      AFFILIATE_Helper::blocks_google_font($subtitle_load_google_font, $subtitle_font_family, $subtitle_font_weight, $subtitle_font_subset);
    }



    public static function get_absingleproductproscons_css( $attr, $id ) { // @codingStandardsIgnoreStart
      
      $inset = '';
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-single-product-pros-cons']['attributes'];

      $attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }

      $btnBg2 = '';
      if($attr['btnBg2']['openBg'] == 1){
          if($attr['btnBg2']['bgType'] == 'color'){
             $btnBg2 = $attr['btnBg2']['bgDefaultColor']; 
          }
      } 

      $btnBgHover2 = '';
      if($attr['btnBgHover2']['openBg'] == 1){
          if($attr['btnBgHover2']['bgType'] == 'color'){
             $btnBgHover2 = $attr['btnBgHover2']['bgDefaultColor']; 
          }
      }


      $btnBg3 = '';
      if($attr['btnBg3']['openBg'] == 1){
          if($attr['btnBg3']['bgType'] == 'color'){
             $btnBg3 = $attr['btnBg3']['bgDefaultColor']; 
          }
      } 

      $btnBgHover3 = '';
      if($attr['btnBgHover3']['openBg'] == 1){
          if($attr['btnBgHover3']['bgType'] == 'color'){
             $btnBgHover3 = $attr['btnBgHover3']['bgDefaultColor']; 
          }
      }

      $m_selectors = array();
      $t_selectors = array();

      $boxshadow = array();
        if ($attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      $selectors = array(
        " .affiliate-singleproductproscons" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['topPickfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeDesktop'], $attr['topPickfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['topPickfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['topPickfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacing'], $attr['topPickletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['topPicktextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['topPicktextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['topPickColor']),
            "background" => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
        ),
        " .affiliate-singleproductproscons:after" => array(
              "border-right-color" => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
        ),
        " .affiliate-singleproductproscons-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])),
        ),
        " .affiliate-singleproductproscons-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth'],'px'),
        ),
        " .affiliate-singleproductproscons-wrapper" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customWidth'], $attr['customWidthType']),
            'padding' => AFFILIATE_Helper::get_css_value($attr['boxPadding']['top'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['right'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['left'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['boxMargin']['top'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['right'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['left'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])),
            'border-style' => AFFILIATE_Helper::get_css_value($attr['boxBorderType']),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
            'border-width' => AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])),
            "box-shadow"=>implode(',',$boxshadow),
          ),
          " .affiliate-singleproductproscons-title" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignment']),
          ),
          " .affiliate-singleproductproscons-subtitle" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['subtitlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeDesktop'], $attr['subtitlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['subtitlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['subtitlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacing'], $attr['subtitleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['subtitletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['subtitletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['subtitleTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['subtitleAlignment']),
          ),
          " .affiliate-singleproductproscons-cntn, .affiliate-singleproductproscons-cntn li" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignment']),
              "flex-direction" => AFFILIATE_Helper::get_css_value($attr['imagePosition']),
          ),
          " .affiliate-singleproductproscons-cntn li:before" => array(
             "color" => AFFILIATE_Helper::get_css_value($attr['iconColor']),
          ),  

          " .affiliate-singleproductproscons-cntn2, .affiliate-singleproductproscons-cntn2 li" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignment']),
              "flex-direction" => AFFILIATE_Helper::get_css_value($attr['imagePosition']),
          ),
          " .affiliate-singleproductproscons-cntn2 li:before" => array(
             "color" => AFFILIATE_Helper::get_css_value($attr['iconColor2']),
          ),  

          " .affiliate-singleproductproscons-btn" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
          ),
          " .affiliate-singleproductproscons-btn:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
          ),
          " .affiliate-singleproductproscons-btn-wrapper" => array(
              "justify-content" => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
          ),


          " .affiliate-singleproductproscons-btn.btn2" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily2']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop2'], $attr['btnfontSizeType2']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight2']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle2']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight2']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing2'], $attr['btnletterSpacingType2']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration2']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform2']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg2),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor2']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor2']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType2']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment2']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])),
          ),
          " .affiliate-singleproductproscons-btn.btn2:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor2']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover2),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor2']),
          ),




          " .affiliate-singleproductproscons-btn.btn3" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily3']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop3'], $attr['btnfontSizeType3']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight3']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle3']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight3']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing3'], $attr['btnletterSpacingType3']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration3']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform3']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg3),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor3']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor3']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType3']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment3']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])),
          ),
          " .affiliate-singleproductproscons-btn.btn3:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor3']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover3),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor3']),
          ),


      );

      
      $m_selectors = array(
        " .affiliate-singleproductproscons" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeMobile'], $attr['topPickfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacingMobile'], $attr['topPickletterSpacingTypeMobile']),
        ),
        " .affiliate-singleproductproscons-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])),
        ),
        " .affiliate-singleproductproscons-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile'],'px'),
        ),
        " .affiliate-singleproductproscons-wrapper" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customWidthMobile'], $attr['customWidthTypeMobile']),  
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])),
        ),
        " .affiliate-singleproductproscons-title" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignmentMobile']),
        ),
        " .affiliate-singleproductproscons-subtitle" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeMobile'], $attr['subtitlefontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingMobile'], $attr['subtitleletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['subtitleAlignmentMobile']),
        ),
        " .affiliate-singleproductproscons-cntn, .affiliate-singleproductproscons-cntn li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignmentMobile']),
        ),
         " .affiliate-singleproductproscons-cntn2, .affiliate-singleproductproscons-cntn2 li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignmentMobile']),
        ),
        " .affiliate-singleproductproscons-btn" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
        ),

        " .affiliate-singleproductproscons-btn.btn2" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile2'], $attr['btnfontSizeTypeMobile2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile2'], $attr['btnletterSpacingTypeMobile2']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])),
        ),


        " .affiliate-singleproductproscons-btn.btn3" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile3'], $attr['btnfontSizeTypeMobile3']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile3']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile3'], $attr['btnletterSpacingTypeMobile3']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])),
        ),


      );

      $t_selectors = array(
        " .affiliate-singleproductproscons" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeTablet'], $attr['topPickfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacingTablet'], $attr['topPickletterSpacingTypeTablet']),
        ),

        " .affiliate-singleproductproscons-wrapper" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customWidthTablet'], $attr['customWidthTypeTablet']),
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])),
        ),
        " .affiliate-singleproductproscons-title" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),
        " .affiliate-singleproductproscons-subtitle" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeTablet'], $attr['subtitlefontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingTablet'], $attr['subtitleletterSpacingTypeTablet']),
      ),
      " .affiliate-singleproductproscons-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])),
        ),
        " .affiliate-singleproductproscons-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet'],'px'),
        ),
        " .affiliate-singleproductproscons-cntn, .affiliate-singleproductproscons-cntn li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),
        " .affiliate-singleproductproscons-cntn2, .affiliate-singleproductproscons-cntn2 li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),
        " .affiliate-singleproductproscons-btn" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
        ),


        " .affiliate-singleproductproscons-btn.btn2" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet2'], $attr['btnfontSizeTypeTablet2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet2'], $attr['btnletterSpacingTypeTablet2']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])),
        ),


        " .affiliate-singleproductproscons-btn.btn3" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet3'], $attr['btnfontSizeTypeTablet3']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet3']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet3'], $attr['btnletterSpacingTypeTablet3']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])),
        ),


      );

      
      if($attr['btnBg']['openBg'] == 1){
        if($attr['btnBg']['bgType'] == 'gradient'){
          if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductproscons-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductproscons-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover']['openBg'] == 1){
        if($attr['btnBgHover']['bgType'] == 'gradient'){
          if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductproscons-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductproscons-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  



      if($attr['btnBg2']['openBg'] == 1){
        if($attr['btnBg2']['bgType'] == 'gradient'){
          if ($attr['btnBg2']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductproscons-btn.btn2"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductproscons-btn.btn2"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover2']['openBg'] == 1){
        if($attr['btnBgHover2']['bgType'] == 'gradient'){
          if ($attr['btnBgHover2']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductproscons-btn.btn2:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductproscons-btn.btn2:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
          }
        }
      }



      if($attr['btnBg3']['openBg'] == 1){
        if($attr['btnBg3']['bgType'] == 'gradient'){
          if ($attr['btnBg3']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductproscons-btn.btn3"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductproscons-btn.btn3"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover3']['openBg'] == 1){
        if($attr['btnBgHover3']['bgType'] == 'gradient'){
          if ($attr['btnBgHover3']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductproscons-btn.btn3:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductproscons-btn.btn3:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
          }
        }
      }


      // @codingStandardsIgnoreEnd

      $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
      $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
      $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

      $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

      $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

      $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );
      return $generated_css;
    }

    public static function blocks_absingleproductproscons_gfont($attr)
    {
      
      $topPick_load_google_font = isset($attr['topBoxLoadGoogleFonts']) ? $attr['topBoxLoadGoogleFonts'] : '';
      $topPick_font_family      = isset($attr['topPickfontFamily']) ? $attr['topPickfontFamily'] : '';
      $topPick_font_weight      = isset($attr['topPickfontWeight']) ? $attr['topPickfontWeight'] : '';
      $topPick_font_subset      = isset($attr['topPickfontSubset']) ? $attr['topPickfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $subtitle_load_google_font = isset($attr['subtitleLoadGoogleFonts']) ? $attr['subtitleLoadGoogleFonts'] : '';
      $subtitle_font_family      = isset($attr['subtitlefontFamily']) ? $attr['subtitlefontFamily'] : '';
      $subtitle_font_weight      = isset($attr['subtitlefontWeight']) ? $attr['subtitlefontWeight'] : '';
      $subtitle_font_subset      = isset($attr['subtitlefontSubset']) ? $attr['subtitlefontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($topPick_load_google_font, $topPick_font_family, $topPick_font_weight, $topPick_font_subset);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
      AFFILIATE_Helper::blocks_google_font($subtitle_load_google_font, $subtitle_font_family, $subtitle_font_weight, $subtitle_font_subset);
    }



    public static function get_absingleproductspecs_css( $attr, $id ) { // @codingStandardsIgnoreStart
      
      $inset = '';
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-single-product-specs']['attributes'];

      $attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }

      $btnBg2 = '';
      if($attr['btnBg2']['openBg'] == 1){
          if($attr['btnBg2']['bgType'] == 'color'){
             $btnBg2 = $attr['btnBg2']['bgDefaultColor']; 
          }
      } 

      $btnBgHover2 = '';
      if($attr['btnBgHover2']['openBg'] == 1){
          if($attr['btnBgHover2']['bgType'] == 'color'){
             $btnBgHover2 = $attr['btnBgHover2']['bgDefaultColor']; 
          }
      }


      $btnBg3 = '';
      if($attr['btnBg3']['openBg'] == 1){
          if($attr['btnBg3']['bgType'] == 'color'){
             $btnBg3 = $attr['btnBg3']['bgDefaultColor']; 
          }
      } 

      $btnBgHover3 = '';
      if($attr['btnBgHover3']['openBg'] == 1){
          if($attr['btnBgHover3']['bgType'] == 'color'){
             $btnBgHover3 = $attr['btnBgHover3']['bgDefaultColor']; 
          }
      }

      $m_selectors = array();
      $t_selectors = array();

      $boxshadow = array();
        if ($attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      $selectors = array(
        " .affiliate-singleproductspecs" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['topPickfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeDesktop'], $attr['topPickfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['topPickfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['topPickfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacing'], $attr['topPickletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['topPicktextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['topPicktextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['topPickColor']),
            "background" => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
        ),
        " .affiliate-singleproductspecs:after" => array(
              "border-right-color" => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
        ),
        " .affiliate-singleproductspecs-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePadding']['top'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['right'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePadding']['left'], AFFILIATE_Helper::get_css_value($attr['imagePadding']['unit'])),
        ),
        " .affiliate-singleproductspecs-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidth'],'px'),
        ),
        " .affiliate-singleproductspecs-wrapper" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customWidth'], $attr['customWidthType']),
            'padding' => AFFILIATE_Helper::get_css_value($attr['boxPadding']['top'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['right'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPadding']['left'], AFFILIATE_Helper::get_css_value($attr['boxPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['boxMargin']['top'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['right'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMargin']['left'], AFFILIATE_Helper::get_css_value($attr['boxMargin']['unit'])),
            'border-style' => AFFILIATE_Helper::get_css_value($attr['boxBorderType']),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['topPickBgColor']),
            'border-width' => AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])),
            "box-shadow"=>implode(',',$boxshadow),
          ),
          " .affiliate-singleproductspecs-title" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignment']),
          ),
          " .affiliate-singleproductspecs-subtitle" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['subtitlefontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeDesktop'], $attr['subtitlefontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['subtitlefontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['subtitlefontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacing'], $attr['subtitleletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['subtitletextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['subtitletextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['subtitleTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['subtitleAlignment']),
          ),
          " .affiliate-singleproductspecs-cntn, .affiliate-singleproductspecs-cntn li" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['cntnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeDesktop'], $attr['cntnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['cntnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['cntnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacing'], $attr['cntnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['cntntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['cntntextTransform']),
              "color" => AFFILIATE_Helper::get_css_value($attr['cntnTextColor']),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignment']),
              "flex-direction" => AFFILIATE_Helper::get_css_value($attr['imagePosition']),
          ),
          " .affiliate-singleproductspecs-cntn li:before" => array(
             "color" => AFFILIATE_Helper::get_css_value($attr['iconColor']),
          ),    
          " .affiliate-singleproductspecs-btn" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
          ),
          " .affiliate-singleproductspecs-btn:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
          ),
          " .affiliate-singleproductspecs-btn-wrapper" => array(
              "justify-content" => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
          ),


          " .affiliate-singleproductspecs-btn.btn2" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily2']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop2'], $attr['btnfontSizeType2']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight2']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle2']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight2']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing2'], $attr['btnletterSpacingType2']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration2']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform2']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg2),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor2']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor2']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType2']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder2']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius2']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment2']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding2']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin2']['unit'])),
          ),
          " .affiliate-singleproductspecs-btn.btn2:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor2']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover2),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor2']),
          ),




          " .affiliate-singleproductspecs-btn.btn3" => array(
              'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily3']),
              'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop3'], $attr['btnfontSizeType3']),
              'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight3']),
              'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle3']),
              'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight3']),
              'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing3'], $attr['btnletterSpacingType3']),
              'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration3']),
              'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform3']),
              "background" => AFFILIATE_Helper::get_css_value($btnBg3),
              "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor3']),
              "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor3']),
              "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType3']),
              "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder3']['unit'])),
              "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius3']['unit'])),
              "text-align" => AFFILIATE_Helper::get_css_value($attr['btnAlignment3']),
              'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding3']['unit'])),
              'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin3']['unit'])),
          ),
          " .affiliate-singleproductspecs-btn.btn3:hover" => array(
                "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor3']),
                "background" => AFFILIATE_Helper::get_css_value($btnBgHover3),
                "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor3']),
          ),


      );

      
      $m_selectors = array(
        " .affiliate-singleproductspecs" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeMobile'], $attr['topPickfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacingMobile'], $attr['topPickletterSpacingTypeMobile']),
        ),
        " .affiliate-singleproductspecs-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingMobile']['unit'])),
        ),
        " .affiliate-singleproductspecs-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthMobile'],'px'),
        ),
        " .affiliate-singleproductspecs-wrapper" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customWidthMobile'], $attr['customWidthTypeMobile']),  
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginMobile']['unit'])),
        ),
        " .affiliate-singleproductspecs-title" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['titleAlignmentMobile']),
        ),
        " .affiliate-singleproductspecs-subtitle" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeMobile'], $attr['subtitlefontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingMobile'], $attr['subtitleletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['subtitleAlignmentMobile']),
        ),
        " .affiliate-singleproductspecs-cntn, .affiliate-singleproductspecs-cntn li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeMobile'], $attr['cntnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingMobile'], $attr['cntnletterSpacingTypeMobile']),
          "text-align" => AFFILIATE_Helper::get_css_value($attr['cntnAlignmentMobile']),
        ),
        " .affiliate-singleproductspecs-btn" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
        ),

        " .affiliate-singleproductspecs-btn.btn2" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile2'], $attr['btnfontSizeTypeMobile2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile2'], $attr['btnletterSpacingTypeMobile2']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile2']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile2']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile2']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile2']['unit'])),
        ),


        " .affiliate-singleproductspecs-btn.btn3" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile3'], $attr['btnfontSizeTypeMobile3']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile3']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile3'], $attr['btnletterSpacingTypeMobile3']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile3']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile3']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile3']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile3']['unit'])),
        ),


      );

      $t_selectors = array(
        " .affiliate-singleproductspecs" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['topPickfontSizeTablet'], $attr['topPickfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['topPicklineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['topPickletterSpacingTablet'], $attr['topPickletterSpacingTypeTablet']),
        ),

        " .affiliate-singleproductspecs-wrapper" => array(
          'width' => AFFILIATE_Helper::get_css_value($attr['customWidthTablet'], $attr['customWidthTypeTablet']),
          'padding' => AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['boxMarginTablet']['unit'])),
        ),
        " .affiliate-singleproductspecs-title" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
        ),
        " .affiliate-singleproductspecs-subtitle" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['subtitlefontSizeTablet'], $attr['subtitlefontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['subtitlelineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['subtitleletterSpacingTablet'], $attr['subtitleletterSpacingTypeTablet']),
      ),
      " .affiliate-singleproductspecs-image" => array(
            'padding' => AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['imagePaddingTablet']['unit'])),
        ),
        " .affiliate-singleproductspecs-image img" => array(
            'width' => AFFILIATE_Helper::get_css_value($attr['customImgWidthTablet'],'px'),
        ),
        " .affiliate-singleproductspecs-cntn, .affiliate-singleproductspecs-cntn li" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['cntnfontSizeTablet'], $attr['cntnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['cntnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['cntnletterSpacingTablet'], $attr['cntnletterSpacingTypeTablet']),
        ),
        " .affiliate-singleproductspecs-btn" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
        ),


        " .affiliate-singleproductspecs-btn.btn2" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet2'], $attr['btnfontSizeTypeTablet2']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet2']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet2'], $attr['btnletterSpacingTypeTablet2']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet2']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet2']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet2']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet2']['unit'])),
        ),


        " .affiliate-singleproductspecs-btn.btn3" => array(
          'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet3'], $attr['btnfontSizeTypeTablet3']),
          'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet3']),
          'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet3'], $attr['btnletterSpacingTypeTablet3']),
          "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet3']['unit'])),
          "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet3']['unit'])),
          'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet3']['unit'])),
          'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet3']['unit'])),
        ),


      );


      if($attr['btnBg']['openBg'] == 1){
        if($attr['btnBg']['bgType'] == 'gradient'){
          if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductspecs-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductspecs-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover']['openBg'] == 1){
        if($attr['btnBgHover']['bgType'] == 'gradient'){
          if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductspecs-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductspecs-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  



      if($attr['btnBg2']['openBg'] == 1){
        if($attr['btnBg2']['bgType'] == 'gradient'){
          if ($attr['btnBg2']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductspecs-btn.btn2"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductspecs-btn.btn2"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg2']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover2']['openBg'] == 1){
        if($attr['btnBgHover2']['bgType'] == 'gradient'){
          if ($attr['btnBgHover2']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductspecs-btn.btn2:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductspecs-btn.btn2:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover2']['bgGradient']['stop'], '%') . ')';
          }
        }
      }



      if($attr['btnBg3']['openBg'] == 1){
        if($attr['btnBg3']['bgType'] == 'gradient'){
          if ($attr['btnBg3']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductspecs-btn.btn3"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductspecs-btn.btn3"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg3']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover3']['openBg'] == 1){
        if($attr['btnBgHover3']['bgType'] == 'gradient'){
          if ($attr['btnBgHover3']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-singleproductspecs-btn.btn3:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-singleproductspecs-btn.btn3:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover3']['bgGradient']['stop'], '%') . ')';
          }
        }
      }


      // @codingStandardsIgnoreEnd

      $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);
      $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
      $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

      $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );

      $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );

      $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );
      return $generated_css;
    }

    public static function blocks_absingleproductspecs_gfont($attr)
    {
      
      $topPick_load_google_font = isset($attr['topBoxLoadGoogleFonts']) ? $attr['topBoxLoadGoogleFonts'] : '';
      $topPick_font_family      = isset($attr['topPickfontFamily']) ? $attr['topPickfontFamily'] : '';
      $topPick_font_weight      = isset($attr['topPickfontWeight']) ? $attr['topPickfontWeight'] : '';
      $topPick_font_subset      = isset($attr['topPickfontSubset']) ? $attr['topPickfontSubset'] : '';

      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $subtitle_load_google_font = isset($attr['subtitleLoadGoogleFonts']) ? $attr['subtitleLoadGoogleFonts'] : '';
      $subtitle_font_family      = isset($attr['subtitlefontFamily']) ? $attr['subtitlefontFamily'] : '';
      $subtitle_font_weight      = isset($attr['subtitlefontWeight']) ? $attr['subtitlefontWeight'] : '';
      $subtitle_font_subset      = isset($attr['subtitlefontSubset']) ? $attr['subtitlefontSubset'] : '';

      $cntn_load_google_font = isset($attr['cntnLoadGoogleFonts']) ? $attr['cntnLoadGoogleFonts'] : '';
      $cntn_font_family      = isset($attr['cntnfontFamily']) ? $attr['cntnfontFamily'] : '';
      $cntn_font_weight      = isset($attr['cntnfontWeight']) ? $attr['cntnfontWeight'] : '';
      $cntn_font_subset      = isset($attr['cntnfontSubset']) ? $attr['cntnfontSubset'] : '';

      $btn_load_google_font = isset($attr['btnLoadGoogleFonts']) ? $attr['btnLoadGoogleFonts'] : '';
      $btn_font_family      = isset($attr['btnfontFamily']) ? $attr['btnfontFamily'] : '';
      $btn_font_weight      = isset($attr['btnfontWeight']) ? $attr['btnfontWeight'] : '';
      $btn_font_subset      = isset($attr['btnfontSubset']) ? $attr['btnfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($topPick_load_google_font, $topPick_font_family, $topPick_font_weight, $topPick_font_subset);
      AFFILIATE_Helper::blocks_google_font($btn_load_google_font, $btn_font_family, $btn_font_weight, $btn_font_subset);
      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($cntn_load_google_font, $cntn_font_family, $cntn_font_weight, $cntn_font_subset);
      AFFILIATE_Helper::blocks_google_font($subtitle_load_google_font, $subtitle_font_family, $subtitle_font_weight, $subtitle_font_subset);
    }



    public static function get_key_points_css( $attr, $id ) {
      // @codingStandardsIgnoreStart
      $defaults = AFFILIATE_Helper::$block_list['affiliate-blocks/ab-key-points']['attributes'];

      $attr = array_merge( $defaults, $attr );

      $btnBg = '';
      if($attr['btnBg']['openBg'] == 1){
          if($attr['btnBg']['bgType'] == 'color'){
             $btnBg = $attr['btnBg']['bgDefaultColor']; 
          }
      } 

      $btnBgHover = '';
      if($attr['btnBgHover']['openBg'] == 1){
          if($attr['btnBgHover']['bgType'] == 'color'){
             $btnBgHover = $attr['btnBgHover']['bgDefaultColor']; 
          }
      }
      
      $m_selectors = array();
      $t_selectors = array();
      $boxshadow = array();
        if (!empty($attr['boxShadow']['openShadow']) && $attr['boxShadow']['openShadow'] == 1) {
          if ($attr['boxShadow']['inset'] === 0) {
            $inset = '';
          } else {
            $inset = $attr['boxShadow']['inset'];
          }
          $boxshadow = array(AFFILIATE_Helper::get_css_value($inset) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['horizontal'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['vertical'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['blur'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['spread'], 'px') . ' ' . AFFILIATE_Helper::get_css_value($attr['boxShadow']['color']));
        }

      
      $selectors = array(
          " .affiliate-keypoints-inner" => array(
            "box-shadow"=>implode(',',$boxshadow),
            "background"=>AFFILIATE_Helper::get_css_value($attr['boxBgColor']),

            'border-style' => AFFILIATE_Helper::get_css_value($attr['boxBorderType']),
            'border-color' => AFFILIATE_Helper::get_css_value($attr['boxBorderColor']),
            'border-width' => AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['top'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['right'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['bottom'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['left'], AFFILIATE_Helper::get_css_value($attr['boxBorderWidth']['unit'])),

          ),

          " .affiliate-keypoints-titleText" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['titlefontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeDesktop'], $attr['titlefontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['titlefontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['titlefontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacing'], $attr['titleletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['titletextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['titletextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['titleTextColor']),
          ),  

          " .affiliate-keypoints-inner .affiliate-keypoints-row .affiliate-keypoints-label" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['kpLabelfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['kpLabelfontSizeDesktop'], $attr['kpLabelfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['kpLabelfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['kpLabelfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['kpLabellineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['kpLabelletterSpacing'], $attr['kpLabelletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['kpLabeltextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['kpLabeltextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['kpLabelColor']),
          ),  

          
          " .affiliate-keypoints-inner .affiliate-keypoints-row .affiliate-keypoints-content" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['kpContentfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['kpContentfontSizeDesktop'], $attr['kpContentfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['kpContentfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['kpContentfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['kpContentlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['kpContentletterSpacing'], $attr['kpContentletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['kpContenttextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['kpContenttextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['kpContentColor']),
          ),  

          " .affiliate-keypoints-inner .affiliate-keypoints-starrating .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starRatingSize'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starRatingSize'], 'px'),
              "color" => AFFILIATE_Helper::get_css_value($attr['starRatingColor']),
          ),

          " .affiliate-keypoints-btn-wrapper" => array(
            'justify-content' => AFFILIATE_Helper::get_css_value($attr['btnAlignment']),
          ),   

          " .affiliate-keypoints-btn-wrapper .affiliate-btn" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['btnfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeDesktop'], $attr['btnfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['btnfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['btnfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacing'], $attr['btnletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['btntextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['btntextTransform']),
            "background" => AFFILIATE_Helper::get_css_value($btnBg),
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextColor']),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderColor']),
            "border-style" => AFFILIATE_Helper::get_css_value($attr['btnBorderType']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorder']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorder']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorder']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadius']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPadding']['top'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['right'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPadding']['left'], AFFILIATE_Helper::get_css_value($attr['btnPadding']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMargin']['top'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['right'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMargin']['left'], AFFILIATE_Helper::get_css_value($attr['btnMargin']['unit'])),
          ),


          " .affiliate-keypoints-btn-wrapper .affiliate-btn:hover" => array(
            "background" => AFFILIATE_Helper::get_css_value($btnBgHover),
            "color" => AFFILIATE_Helper::get_css_value($attr['btnTextHoverColor']),
            "border-color" => AFFILIATE_Helper::get_css_value($attr['btnBorderHoverColor']),             
          ),

          " .affiliate-keypoints-footercol" => array(
            'font-family' => AFFILIATE_Helper::get_css_value($attr['extraContentfontFamily']),
            'font-size' => AFFILIATE_Helper::get_css_value($attr['extraContentfontSizeDesktop'], $attr['extraContentfontSizeType']),
            'font-weight' => AFFILIATE_Helper::get_css_value($attr['extraContentfontWeight']),
            'font-style' => AFFILIATE_Helper::get_css_value($attr['extraContentfontStyle']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['extraContentlineHeight']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['extraContentletterSpacing'], $attr['extraContentletterSpacingType']),
            'text-decoration' => AFFILIATE_Helper::get_css_value($attr['extraContenttextDecoration']),
            'text-transform' => AFFILIATE_Helper::get_css_value($attr['extraContenttextTransform']),
            "color" => AFFILIATE_Helper::get_css_value($attr['extraContentTextColor']),
          ),  
      );

      $t_selectors = array(

          " .affiliate-keypoints-titleText" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeTablet'], $attr['titlefontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingTablet'], $attr['titleletterSpacingTypeTablet']),
          ),

          " .affiliate-keypoints-inner .affiliate-keypoints-row .affiliate-keypoints-label" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['kpLabelfontSizeTablet'], $attr['kpLabelfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['kpLabellineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['kpLabelletterSpacingTablet'], $attr['kpLabelletterSpacingTypeTablet']),
          ),

          " .affiliate-keypoints-inner .affiliate-keypoints-row .affiliate-keypoints-content" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['kpContentfontSizeTablet'], $attr['kpContentfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['kpContentlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['kpContentletterSpacingTablet'], $attr['kpContentletterSpacingTypeTablet']),
          ),    

          " .affiliate-keypoints-inner .affiliate-keypoints-starrating .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starRatingSizeTablet'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starRatingSizeTablet'], 'px'),
          ),

          " .affiliate-keypoints-btn-wrapper .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeTablet'], $attr['btnfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingTablet'], $attr['btnletterSpacingTypeTablet']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderTablet']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusTablet']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingTablet']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginTablet']['unit'])),
          ),

          " .affiliate-keypoints-footercol" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['extraContentfontSizeTablet'], $attr['extraContentfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['extraContentlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['extraContentletterSpacingTablet'], $attr['extraContentletterSpacingTypeTablet']),
          ),
      );
      
      $m_selectors = array(

          " .affiliate-keypoints-titleText" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['titlefontSizeMobile'], $attr['titlefontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['titlelineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['titleletterSpacingMobile'], $attr['titleletterSpacingTypeMobile']),
          ),

          " .affiliate-keypoints-inner .affiliate-keypoints-row .affiliate-keypoints-label" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['kpLabelfontSizeMobile'], $attr['kpLabelfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['kpLabellineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['kpLabelletterSpacingMobile'], $attr['kpLabelletterSpacingTypeMobile']),
          ),

          " .affiliate-keypoints-inner .affiliate-keypoints-row .affiliate-keypoints-content" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['kpContentfontSizeMobile'], $attr['kpContentfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['kpContentlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['kpContentletterSpacingMobile'], $attr['kpContentletterSpacingTypeMobile']),
          ),
          
          " .affiliate-keypoints-inner .affiliate-keypoints-starrating .affiliate-star-item svg" => array(
              "height" => AFFILIATE_Helper::get_css_value($attr['starRatingSizeMobile'], 'px'),  
              "width" => AFFILIATE_Helper::get_css_value($attr['starRatingSizeMobile'], 'px'),
          ),

          " .affiliate-keypoints-btn-wrapper .affiliate-btn" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['btnfontSizeMobile'], $attr['btnfontSizeTypeMobile']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['btnlineHeightMobile']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['btnletterSpacingMobile'], $attr['btnletterSpacingTypeMobile']),
            "border-width" => AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderMobile']['unit'])),
            "border-radius" => AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnBorderRadiusMobile']['unit'])),
            'padding' => AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnPaddingMobile']['unit'])),
            'margin' => AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['top'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['right'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['bottom'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['left'], AFFILIATE_Helper::get_css_value($attr['btnMarginMobile']['unit'])),
          ),

          " .affiliate-keypoints-footercol" => array(
            'font-size' => AFFILIATE_Helper::get_css_value($attr['extraContentfontSizeTablet'], $attr['extraContentfontSizeTypeTablet']),
            'line-height' => AFFILIATE_Helper::get_css_value($attr['extraContentlineHeightTablet']),
            'letter-spacing' => AFFILIATE_Helper::get_css_value($attr['extraContentletterSpacingTablet'], $attr['extraContentletterSpacingTypeTablet']),
          ),

      );

      
      if($attr['btnBg']['openBg'] == 1){
        if($attr['btnBg']['bgType'] == 'gradient'){
          if ($attr['btnBg']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-keypoints-btn-wrapper .affiliate-btn"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-keypoints-btn-wrapper .affiliate-btn"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBg']['bgGradient']['stop'], '%') . ')';
          }
        }
      }  


      if($attr['btnBgHover']['openBg'] == 1){
        if($attr['btnBgHover']['bgType'] == 'gradient'){
          if ($attr['btnBgHover']['bgGradient']['type'] == 'linear') {
            $selectors[" .affiliate-keypoints-btn-wrapper .affiliate-btn:hover"]["background"] = 'linear-gradient(' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['direction'], 'deg,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          } else {
            $selectors[" .affiliate-keypoints-btn-wrapper .affiliate-btn:hover"]["background"] = 'radial-gradient( circle at ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['radial'], ',') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color1']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['start'], '%,') . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['color2']) . ' ' . AFFILIATE_Helper::get_css_value($attr['btnBgHover']['bgGradient']['stop'], '%') . ')';
          }
        }
      } 

      
      $regenerate_d = AFFILIATE_Helper::regenerate_stylesheet($selectors);      
      $regenerate_t = AFFILIATE_Helper::regenerate_stylesheet($t_selectors);
      $regenerate_m = AFFILIATE_Helper::regenerate_stylesheet($m_selectors);

      $desktop = AFFILIATE_Helper::generate_css( $regenerate_d, '#affiliate-style-' . $id );
      $tablet = AFFILIATE_Helper::generate_css( $regenerate_t, '#affiliate-style-' . $id );
      $mobile = AFFILIATE_Helper::generate_css( $regenerate_m, '#affiliate-style-' . $id );

      $generated_css = array(
        'desktop' => $desktop,
        'tablet'  => $tablet,
        'mobile'  => $mobile,
      );
      return $generated_css;
    }

    public static function blocks_key_points_gfont($attr)
    {
      
      $title_load_google_font = isset($attr['titleLoadGoogleFonts']) ? $attr['titleLoadGoogleFonts'] : '';
      $title_font_family      = isset($attr['titlefontFamily']) ? $attr['titlefontFamily'] : '';
      $title_font_weight      = isset($attr['titlefontWeight']) ? $attr['titlefontWeight'] : '';
      $title_font_subset      = isset($attr['titlefontSubset']) ? $attr['titlefontSubset'] : '';

      $kpLabel_load_google_font = isset($attr['kpLabelLoadGoogleFonts']) ? $attr['kpLabelLoadGoogleFonts'] : '';
      $kpLabel_font_family      = isset($attr['kpLabelfontFamily']) ? $attr['kpLabelfontFamily'] : '';
      $kpLabel_font_weight      = isset($attr['kpLabelfontWeight']) ? $attr['kpLabelfontWeight'] : '';
      $kpLabel_font_subset      = isset($attr['kpLabelfontSubset']) ? $attr['kpLabelfontSubset'] : '';

      $kpContent_load_google_font = isset($attr['kpContentLoadGoogleFonts']) ? $attr['kpContentLoadGoogleFonts'] : '';
      $kpContent_font_family      = isset($attr['kpContentfontFamily']) ? $attr['kpContentfontFamily'] : '';
      $kpContent_font_weight      = isset($attr['kpContentfontWeight']) ? $attr['kpContentfontWeight'] : '';
      $kpContent_font_subset      = isset($attr['kpContentfontSubset']) ? $attr['kpContentfontSubset'] : '';

      $extraContent_load_google_font = isset($attr['extraContentLoadGoogleFonts']) ? $attr['extraContentLoadGoogleFonts'] : '';
      $extraContent_font_family      = isset($attr['extraContentfontFamily']) ? $attr['extraContentfontFamily'] : '';
      $extraContent_font_weight      = isset($attr['extraContentfontWeight']) ? $attr['extraContentfontWeight'] : '';
      $extraContent_font_subset      = isset($attr['extraContentfontSubset']) ? $attr['extraContentfontSubset'] : '';

      AFFILIATE_Helper::blocks_google_font($title_load_google_font, $title_font_family, $title_font_weight, $title_font_subset);
      AFFILIATE_Helper::blocks_google_font($kpLabel_load_google_font, $kpLabel_font_family, $kpLabel_font_weight, $kpLabel_font_subset);
      AFFILIATE_Helper::blocks_google_font($kpContent_load_google_font, $kpContent_font_family, $kpContent_font_weight, $kpContent_font_subset);
      AFFILIATE_Helper::blocks_google_font($extraContent_load_google_font, $extraContent_font_family, $extraContent_font_weight, $extraContent_font_subset);
    }



  }
}
