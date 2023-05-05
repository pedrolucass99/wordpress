<?php
namespace WOPB\blocks;

defined('ABSPATH') || exit;

class Product_Category_1{

    public function __construct() {
        add_action('init', array($this, 'register'));
    }

    public function get_attributes($default = false){

        $attributes = array(
            'blockId' => [
                'type' => 'string',
                'default' => '',
            ],
            'previewId' => [
                'type' => 'string',
                'default' => '',
            ],

            //--------------------------
            //      Query Setting
            //--------------------------
            'queryType' => [
                'type' => 'string',
                'default' => 'regular',
            ],
            'queryCat' => [
                'type' => 'string',
                'default' => '[]',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'queryType','condition'=>'!=','value'=>'regular'],
                        ],
                    ],
                ],
            ],
            'queryNumber' => [
                'type' => 'string',
                'default' => 8,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'queryType','condition'=>'==','value'=>'regular'],
                        ],
                    ],
                ],
            ],

            'readMore' => [
                'type' => 'boolean',
                'default' => false,
            ],

            'productView' => [
                'type' => 'string',
                'default' => 'grid',
            ],
            'columns' => [
                'type' => 'object',
                'default' => (object)['lg' =>'4','sm' =>'2','xs'=>'2'],
                'style' => [
                    (object)[
                         'depends' => [
                             (object)['key'=>'productView','condition'=>'==','value'=>'grid'],
                         ],
                        'selector'=>'{{WOPB}} .wopb-block-items-wrap { grid-template-columns: repeat({{columns}}, 1fr); }'
                    ],
                ],

            ],
            'columnGridGap' => [
                'type' => 'object',
                'default' => (object)['lg' =>'30', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'productView','condition'=>'==','value'=>'grid'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-items-wrap { grid-column-gap: {{columnGridGap}}; }'
                    ],
                ],
            ],

            'rowGap' => [
                'type' => 'object',
                'default' => (object)['lg' =>'30', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'productView','condition'=>'==','value'=>'grid'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-items-wrap { grid-row-gap: {{rowGap}}; }'
                    ],
                ],
            ],
            'columnGap' => [
                'type' => 'object',
                'default' => (object)['lg' =>'10', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'productView','condition'=>'==','value'=>'slide'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-product-blocks-slide .wopb-block-item { padding: {{columnGap}}; box-sizing:border-box; }'
                    ],
                ],
            ],
            'slidesToShow' => [
                'type' => 'object',
                'default' => (object)['lg' =>'4','sm' => '2', 'xs' => '1'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'productView','condition'=>'==','value'=>'slide'],
                        ],
                    ],
                ],
            ],
            'autoPlay' => [
               'type' => 'boolean',
                'default' => true,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'productView','condition'=>'==','value'=>'slide'],
                        ],
                    ],
                ],
            ],
            'showDots' => [
               'type' => 'boolean',
                'default' => true,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'productView','condition'=>'==','value'=>'slide'],
                        ],
                    ],
                ],
            ],
            'showArrows' => [
                'type' => 'boolean',
                'default' => true,
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'productView','condition'=>'==','value'=>'slide'],
                        ],
                    ],
                ],
            ],
            'slideSpeed' => [
                'type' => 'string',
                'default' => '3000',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'productView','condition'=>'==','value'=>'slide'],
                        ],
                    ],
                ],
            ],

            //--------------------------
            //      General Setting
            //--------------------------
            'headingShow' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'showImage' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'titleShow' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'descShow' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'countShow' => [
                'type' => 'boolean',
                'default' => true,
            ],
            'contentAlign' => [
                'type' => 'string',
                'default' => "center",
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentAlign','condition'=>'==','value'=>'left'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-category-content-item { text-align:{{contentAlign}}; } {{WOPB}} .wopb-block-meta {justify-content: flex-start;}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentAlign','condition'=>'==','value'=>'center'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-category-content-item { text-align:{{contentAlign}}; } {{WOPB}} .wopb-block-meta {justify-content: center;}'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentAlign','condition'=>'==','value'=>'right'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-category-content-item { text-align:{{contentAlign}}; } {{WOPB}} .wopb-block-meta {justify-content: flex-end;}'
                    ],
                ],
            ],


            //--------------------------
            //      Arrow Setting
            //--------------------------
            'arrowStyle' => [
                'type' => 'string',
                'default' => 'leftAngle2#rightAngle2',
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                    ],
                ]
            ],
            'arrowSize' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-next svg, {{WOPB}} .slick-prev svg { width:{{arrowSize}}; }'
                    ],
                ]
            ],
            'arrowWidth' => [
                'type' => 'object',
                'default' => (object)['lg' =>'60', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-arrow { width:{{arrowWidth}}; }'
                    ],
                ]
            ],
            'arrowHeight' => [
                'type' => 'object',
                'default' => (object)['lg' =>'60', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-arrow { height:{{arrowHeight}}; } {{WOPB}} .slick-arrow { line-height:{{arrowHeight}}; }'
                    ],
                ]
            ],
            'arrowVartical' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-next { right:{{arrowVartical}}; } {{WOPB}} .slick-prev { left:{{arrowVartical}}; }'
                    ],
                ]
            ],
            'arrowHorizontal' => [
                'type' => 'object',
                'default' => (object)['lg'=>''],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-next, {{WOPB}} .slick-prev { top:{{arrowHorizontal}}; }'
                    ],
                ]
            ],
            'arrowColor' => [
                'type' => 'string',
                'default' => '#ffffff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-arrow:before { color:{{arrowColor}}; } {{WOPB}} .slick-arrow svg { fill:{{arrowColor}}; }'
                    ],
                ],
            ],
            'arrowHoverColor' => [
                'type' => 'string',
                'default' => '#fff',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-arrow:hover:before { color:{{arrowHoverColor}}; } {{WOPB}} .slick-arrow:hover svg { fill:{{arrowHoverColor}}; }'
                    ],
                ],
            ],
            'arrowBg' => [
                'type' => 'string',
                'default' => 'rgba(0,0,0,0.22)',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-arrow { background:{{arrowBg}}; }'
                    ],
                ],
            ],
            'arrowHoverBg' => [
                'type' => 'string',
                'default' => '#ff5845',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-arrow:hover { background:{{arrowHoverBg}}; }'
                    ],
                ],
            ],
            'arrowBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-arrow'
                    ],
                ],
            ],
            'arrowHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-arrow:hover'
                    ],
                ],
            ],
            'arrowRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '50','bottom' => '50', 'left' => '50','right' => '50', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-arrow { border-radius: {{arrowRadius}}; }'
                    ],
                ],
            ],
            'arrowHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '50','bottom' => '50', 'left' => '50','right' => '50', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-arrow:hover{ border-radius: {{arrowHoverRadius}}; }'
                    ],
                ],
            ],
            'arrowShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-arrow'
                    ],
                ],
            ],
            'arrowHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showArrows','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-arrow:hover'
                    ],
                ],
            ],


            //--------------------------
            // Dot Setting/Style
            //--------------------------
            'dotSpace' => [
                'type' => 'object',
                'default' => (object)['lg' =>'4', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-dots { padding: 0 {{dotSpace}}; } {{WOPB}} .slick-dots li button { margin: 0 {{dotSpace}}; }'
                    ],
                ]
            ],
            'dotVartical' => [
                'type' => 'object',
                'default' => (object)['lg' =>'-50', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-dots { bottom:{{dotVartical}}; }'
                    ],
                ]
            ],
            'dotHorizontal' => [
                'type' => 'object',
                'default' => (object)['lg'=>''],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-dots { left:{{dotHorizontal}}; }'
                    ],
                ]
            ],
            'dotWidth' => [
                'type' => 'object',
                'default' => (object)['lg' =>'10', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-dots li button  { width:{{dotWidth}}; }'
                    ],
                ]
            ],
            'dotHeight' => [
                'type' => 'object',
                'default' => (object)['lg' =>'10', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-dots li button  { height:{{dotHeight}}; }'
                    ],
                ]
            ],
            'dotHoverWidth' => [
                'type' => 'object',
                'default' => (object)['lg' =>'16', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-dots li.slick-active button { width:{{dotHoverWidth}}; }'
                    ],
                ]
            ],
            'dotHoverHeight' => [
                'type' => 'object',
                'default' => (object)['lg' =>'16', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector' => '{{WOPB}} .slick-dots li.slick-active button { height:{{dotHoverHeight}}; }'
                    ],
                ]
            ],
            'dotBg' => [
                'type' => 'string',
                'default' => '#f5f5f5',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-dots li button { background:{{dotBg}}; }'
                    ],
                ],
            ],
            'dotHoverBg' => [
                'type' => 'string',
                'default' => '#000',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-dots li button:hover, {{WOPB}} .slick-dots li.slick-active button { background:{{dotHoverBg}}; }'
                    ],
                ],
            ],
            'dotBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-dots li button'
                    ],
                ],
            ],
            'dotHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-dots li button:hover, {{WOPB}} .slick-dots li.slick-active button'
                    ],
                ],
            ],
            'dotRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '50','bottom' => '50','left' => '50','right' => '50', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-dots li button { border-radius: {{dotRadius}}; }'
                    ],
                ],
            ],
            'dotHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '50','bottom' => '50','left' => '50','right' => '50', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-dots li button:hover, {{WOPB}} .slick-dots li.slick-active button { border-radius: {{dotHoverRadius}}; }'
                    ],
                ],
            ],
            'dotShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-dots li button'
                    ],
                ],
            ],
            'dotHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showDots','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .slick-dots li button:hover, {{WOPB}} .slick-dots li.slick-active button'
                    ],
                ],
            ],


            //--------------------------
            //      Heading Setting/Style
            //--------------------------
            'headingText' => [
                'type' => 'string',
                'default' => 'Product Category #1',
            ],
            'headingURL' => [
                'type' => 'string',
                'default' => '',
            ],
            'headingBtnText' => [
                'type' => 'string',
                'default' =>  'View More',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style11'],
                        ],
                    ],
                ],
            ],
            'headingStyle' => [
                'type' => 'string',
                'default' => 'style1',
            ],
            'headingTag' => [
                'type' => 'string',
                'default' => 'h2',
            ],
            'headingAlign' => [
                'type' => 'string',
                'default' =>  'left',
                'style' => [(object)[
                    'selector' => '
                    {{WOPB}} .wopb-heading-inner, {{WOPB}} .wopb-sub-heading-inner{ text-align:{{headingAlign}}; }
                    {{WOPB}} .wopb-heading-filter-in{ display: block; }'
                ]]
            ],
            'headingTypo' => [
                'type' => 'object',
                'default' =>  (object)['openTypography' => 0,'size' => (object)['lg' => '20', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none', 'transform' => '', 'family'=>'','weight'=>''],
                'style' => [(object)['selector' => '{{WOPB}} .wopb-heading-wrap .wopb-heading-inner']]
            ],
            'headingColor' => [
                'type' => 'string',
                'default' =>  '#0e1523',
                'style' => [(object)['selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { color:{{headingColor}}; }']],
            ],
            'headingBorderBottomColor' => [
                'type' => 'string',
                'default' =>  '#0e1523',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style3'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner { border-bottom-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style4'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner { border-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style6'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span:before { background-color: {{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style7'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span:before { background-color: {{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style8'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:after { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style9'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style10'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style13'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner { border-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style14'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style15'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style16'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style17'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style18'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:after { background-color:{{headingBorderBottomColor}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style19'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before { border-color:{{headingBorderBottomColor}}; }'
                    ],
                ],
            ],
            'headingBorderBottomColor2' => [
                'type' => 'string',
                'default' =>  '#e5e5e5',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style8'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before { background-color:{{headingBorderBottomColor2}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style10'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:after { background-color:{{headingBorderBottomColor2}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style14'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:after { background-color:{{headingBorderBottomColor2}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style19'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:after { background-color:{{headingBorderBottomColor2}}; }'
                    ],
                ],
            ],
            'headingBg' => [
                'type' => 'string',
                'default' =>  '#ff5845',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style5'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-style5 .wopb-heading-inner span:before { border-color:{{headingBg}} transparent transparent; } {{WOPB}} .wopb-heading-inner span { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style2'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style3'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style12'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style13'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style18'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner { background-color:{{headingBg}}; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style20'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span:before { border-color:{{headingBg}} transparent transparent; } {{WOPB}} .wopb-heading-inner { background-color:{{headingBg}}; }'
                    ],
                ],
            ],
            'headingBg2' => [
                'type' => 'string',
                'default' =>  '#e5e5e5',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style12'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner { background-color:{{headingBg2}}; }'
                    ],
                ],
            ],
            'headingBtnTypo' => [
                'type' => 'object',
                'default' =>  (object)['openTypography' => 1,'size' => (object)['lg' => '14', 'unit' => 'px'], 'height' => (object)['lg' => '', 'unit' => 'px'],'decoration' => 'none','family'=>''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style11'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-btn'
                    ],
                ],
            ],
            'headingBtnColor' => [
                'type' => 'string',
                'default' =>  '#ff5845',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style11'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-btn { color:{{headingBtnColor}}; } {{WOPB}} .wopb-heading-btn svg { fill:{{headingBtnColor}}; }'
                    ],
                ],
            ],
            'headingBtnHoverColor' => [
                'type' => 'string',
                'default' =>  '#0a31da',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style11'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-btn:hover { color:{{headingBtnHoverColor}}; } {{WOPB}} .wopb-heading-btn:hover svg { fill:{{headingBtnHoverColor}}; }'
                    ],
                ],
            ],
            
            'headingBorder' => [
                'type' => 'string',
                'default' => '3',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style3'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner { border-bottom-width:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style4'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner { border-width:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style6'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span:before { width:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style7'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span:before { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style8'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before, {{WOPB}} .wopb-heading-inner:after { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style9'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style10'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before, {{WOPB}} .wopb-heading-inner:after { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style13'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner { border-width:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style14'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before, {{WOPB}} .wopb-heading-inner:after { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style15'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span:before { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style16'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner span:before { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style17'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:before { height:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style19'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:after { width:{{headingBorder}}px; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style18'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-inner:after { width:{{headingBorder}}px; }'
                    ],
                ],
            ],
            'headingSpacing' => [
                'type' => 'object',
                'default' => (object)['lg'=>30, 'unit'=>'px'],
                'style' => [(object)['selector'=>'{{WOPB}} .wopb-heading-wrap {margin-top:0; margin-bottom:{{headingSpacing}}; }']]
            ],

            'headingRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style2'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style3'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style4'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style5'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style12'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style13'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style18'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner { border-radius:{{headingRadius}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style20'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner { border-radius:{{headingRadius}}; }'
                    ],
                ]
            ],


            'headingPadding' => [
                'type' => 'object',
                'default' => (object)['lg'=>'', 'unit'=>'px'],
                'style' => [
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style2'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style3'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style4'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style5'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style6'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style12'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style13'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style18'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style19'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                    (object)[
                        'depends' => [ 
                            (object)['key'=>'headingStyle','condition'=>'==','value'=>'style20'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-heading-wrap .wopb-heading-inner span { padding:{{headingPadding}}; }'
                    ],
                ]
            ],
            'subHeadingShow' => [
                'type' => 'boolean',
                'default' => false,
            ],
            'subHeadingText' => [
                'type' => 'string',
                'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut sem augue. Sed at felis ut enim dignissim sodales.',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'subHeadingShow','condition'=>'==','value'=>true],
                        ],
                    ],
                ],
            ],
            'subHeadingTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'16', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)[ 'lg'=>'27', 'unit'=>'px'],'decoration'=>'none','transform' => 'capitalize','family'=>'','weight'=>'500'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'subHeadingShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-sub-heading div'
                    ],
                ],
            ],
            'subHeadingColor' => [
                'type' => 'string',
                'default' =>  '#989898',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'subHeadingShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-sub-heading div{ color:{{subHeadingColor}}; }'
                    ],
                ],
            ],
            'subHeadingSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'subHeadingShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} div.wopb-sub-heading-inner{ margin:{{subHeadingSpacing}}; }'
                    ],
                ],
            ],


            //--------------------------
            //  Title Setting/Style
            //--------------------------
            'titleTag' => [
                'type' => 'string',
                'default' => 'h3',
            ],
            'titleFull' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} .wopb-block-title { display: -webkit-box; }'
                    ],
                ],
            ],
            'titleTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography'=>0,'size'=>(object)['lg'=>'18', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)[ 'lg'=>'', 'unit'=>'px'],'decoration'=>'none','transform' => '','family'=>'','weight'=>''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-product-cat-title, {{WOPB}} .wopb-product-cat-title a'
                    ],
                ],
            ],
            'titleColor' => [
                'type' => 'string',
                'default' => '#0e1523',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-product-cat-title a { color:{{titleColor}}; }'
                    ],
                ],
            ],
            'titleHoverColor' => [
                'type' => 'string',
                'default' => '#828282',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-product-cat-title a:hover { color:{{titleHoverColor}}; }'
                    ],
                ],
            ],
            'titlePadding' => [
                'type' => 'object',
                'default' => (object)['lg'=>(object)['top'=>0,'bottom'=>0, 'unit'=>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'titleShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-product-cat-title { padding:{{titlePadding}}; word-wrap: break-word; }'
                    ],
                ],
            ],

            //--------------------------
            // Short Desc Setting/Style
            //--------------------------
            'ShortDescTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'12', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)[ 'lg'=>'20', 'unit'=>'px'],'decoration'=>'none','transform' => 'capitalize','family'=>'','weight'=>''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'descShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-cat-desc'
                    ],
                ],
            ],
            'ShortDescColor' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'descShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-product-cat-desc { color:{{ShortDescColor}}; }'
                    ],
                ],
            ],
            'ShortDescPadding' => [
                'type' => 'object',
                'default' => (object)['lg'=>(object)['top'=>0,'bottom'=>0, 'unit'=>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'descShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-product-cat-desc { padding:{{ShortDescPadding}}; }'
                    ],
                ],
            ],

            //--------------------------
            // Content Wrap Setting/Style
            //--------------------------
            'contentVerticalPosition' => [
                'type' => 'string',
                'default' => 'middlePosition',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentVerticalPosition','condition'=>'==','value'=>'topPosition'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-category-content-topPosition { align-items:flex-start; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentVerticalPosition','condition'=>'==','value'=>'middlePosition'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-category-content-middlePosition { align-items:center; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentVerticalPosition','condition'=>'==','value'=>'bottomPosition'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-category-content-bottomPosition { align-items:flex-end; }'
                    ],
                ]
            ],
            'contentHorizontalPosition' => [
                'type' => 'string',
                'default' => 'centerPosition',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentHorizontalPosition','condition'=>'==','value'=>'leftPosition'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-category-content-leftPosition { justify-content:flex-start; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentHorizontalPosition','condition'=>'==','value'=>'centerPosition'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-category-content-centerPosition { justify-content:center; }'
                    ],
                    (object)[
                        'depends' => [
                            (object)['key'=>'contentHorizontalPosition','condition'=>'==','value'=>'rightPosition'],
                        ],
                        'selector'=>'{{WOPB}} .wopb-category-content-rightPosition { justify-content:flex-end; }'
                    ],
                ]
            ],

            'contenWraptWidth' => [
                'type' => 'object',
                'default' => (object)['lg'=>'100','unit' =>'%'],
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} .wopb-category-content-item  { width:{{contenWraptWidth}}; }'
                    ],
                ]
            ],

            'contenWraptHeight' => [
                'type' => 'object',
                'default' => (object)['lg'=>''],
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} .wopb-category-content-item  { height:{{contenWraptHeight}}; }'
                    ],
                ]
            ],

            'contentWrapBg' => [
                'type' => 'string',
                'default' => '#fff',
                'style' => [
                    (object)[
                        'selector'=>'{{WOPB}} .wopb-category-content-item { background:{{contentWrapBg}}; }'
                    ],
                ],
            ],

            'contentWrapHoverBg' => [
                'type' => 'string',
                'style' => [
                    (object)[
                        'selector'=>'{{WOPB}} .wopb-block-item:hover .wopb-category-content-item { background:{{contentWrapHoverBg}}; }'
                    ],
                ],
            ],

            'contentWrapBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'selector'=>'{{WOPB}} .wopb-category-content-item'
                    ],
                ],
            ],

            'contentWrapHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'selector'=>'{{WOPB}} .wopb-block-item:hover .wopb-category-content-item'
                    ],
                ],
            ],

            'contentWrapRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'left' => '', 'right' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'selector'=>'{{WOPB}} .wopb-category-content-item { border-radius: {{contentWrapRadius}}; }'
                    ],
                ],
            ],

            'contentWrapHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'left' => '', 'right' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'selector'=>'{{WOPB}} .wopb-block-item:hover .wopb-category-content-item { border-radius: {{contentWrapHoverRadius}}; }'
                    ],
                ],
            ],

            'contentWrapShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 0, 'right' => 5, 'bottom' => 15, 'left' => 0],'color' => 'rgba(0,0,0,0.15)'],
                'style' => [
                    (object)[
                        'selector'=>'{{WOPB}} .wopb-category-content-item'
                    ],
                ],
            ],

            'contentWrapHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 0, 'right' => 10, 'bottom' => 25, 'left' => 0],'color' => 'rgba(0,0,0,0.25)'],
                'style' => [
                    (object)[
                        'selector'=>'{{WOPB}} .wopb-block-item:hover .wopb-category-content-item'
                    ],
                ],
            ],

            'contentWrapSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'left'=>'','right'=>'', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'selector'=>'{{WOPB}} .wopb-category-content-item { margin: {{contentWrapSpacing}}; }'
                    ],
                ],
            ],

            'contentWrapPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '20','bottom' => '20', 'left'=>'20','right'=>'20', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'selector'=>'{{WOPB}} .wopb-category-content-item { padding: {{contentWrapPadding}}; box-sizing: content-box;}'
                    ],
                ],
            ],



            //--------------------------
            // Count Setting/Style
            //--------------------------
            'categoryrCountText' => [
                'type' => 'string',
                'default' => 'products',
            ],
            'categoryrCountTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography'=>1,'size'=>(object)['lg'=>'14', 'unit'=>'px'], 'spacing'=>(object)[ 'lg'=>'0', 'unit'=>'px'], 'height'=>(object)[ 'lg'=>'22', 'unit'=>'px'],'decoration'=>'none','transform' => 'capitalize','family'=>'','weight'=>''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'countShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-product-cat-wrap .wopb-category-content-item .wopb-product-cat-count'
                    ],
                ],
            ],
            'categoryrCountColor' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'countShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-product-cat-count { color:{{categoryrCountColor}}; }'
                    ],
                ],
            ],
            'categoryrCountPadding' => [
                'type' => 'object',
                'default' => (object)['lg'=>(object)['top'=>0,'bottom'=>0, 'unit'=>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'countShow','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-product-cat-count { padding:{{categoryrCountPadding}}; }'
                    ],
                ],
            ],

            //--------------------------
            // Image Setting/Style
            //--------------------------
            'imgCrop' => [
                'type' => 'string',
                'default' => 'full',
                'depends' => [(object)['key' => 'showImage','condition' => '==','value' => 'true']]
            ],
            'imgWidth' => [
                'type' => 'object',
                'default' => (object)['lg' =>'100', 'unit' =>'%'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-block-image { width: {{imgWidth}}; }'
                    ],
                ],
            ],
            'imgHeight' => [
                'type' => 'object',
                'default' => (object)['lg' =>'250', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-block-image img , {{WOPB}} .wopb-block-item .wopb-block-image-empty {  height: {{imgHeight}}; }'
                    ],
                ],
            ],
            'imageScale' => [
                'type' => 'string',
                'default' => 'cover',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true]
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-block-image img {object-fit: {{imageScale}};}'
                    ],
                ],
            ],
            'imgAnimation' => [
                'type' => 'string',
                'default' => 'none',
            ],
            'imgGrayScale' => [
                'type' => 'object',
                'default' => (object)['lg' =>'0', 'unit' =>'%'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-image img { filter: grayscale({{imgGrayScale}}); }'
                    ],
                ],
            ],
            'imgHoverGrayScale' => [
                'type' => 'object',
                'default' => (object)['lg' =>'0', 'unit' =>'%'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item:hover .wopb-block-image img { filter: grayscale({{imgHoverGrayScale}}); }'
                    ],
                ],
            ],
            'imgRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-image { border-radius:{{imgRadius}}; }'
                    ],
                ],
            ],
            'imgHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item:hover .wopb-block-image { border-radius:{{imgHoverRadius}}; }'
                    ],
                ],
            ],
            'imgShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-image'
                    ],
                ],
            ],
            'imgHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item:hover .wopb-block-image'
                    ],
                ],
            ],
            'imgMargin' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '0', 'right' => '0', 'bottom' => '0', 'left' => '0', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'showImage','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-block-image { margin: {{imgMargin}}; }'
                    ],
                ],
            ],
         


            //--------------------------
            // Read more Setting/Style
            //--------------------------
            'readMoreText' => [
                'type' => 'string',
                'default' => ''
            ],
            'readMoreTypo' => [
                'type' => 'object',
                'default' => (object)['openTypography' => 1, 'size' => (object)['lg' =>12, 'unit' =>'px'], 'height' => (object)['lg' =>'', 'unit' =>'px'], 'spacing' => (object)['lg' =>1, 'unit' =>'px'], 'transform' => 'uppercase', 'weight' => '400', 'decoration' => 'none','family'=>'' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore a'
                    ],
                ],
            ],
            'readMoreColor' => [
                'type' => 'string',
                'default' => '#0d1523',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore a { color:{{readMoreColor}}; }'
                    ],
                ],
            ],
            'readMoreBgColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0,'type' => 'color', 'color' => ''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore a'
                    ],
                ],
            ],
            'readMoreBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)[ 'top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid' ],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore a'
                    ],
                ],
            ],
            'readMoreRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore a { border-radius:{{readMoreRadius}}; }'
                    ],
                ],
            ],
            'readMoreHoverColor' => [
                'type' => 'string',
                'default' => '#0c32d8',
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore a:hover { color:{{readMoreHoverColor}}; }'
                    ],
                ],
            ],
            'readMoreBgHoverColor' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => ''],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore a:hover'
                    ],
                ],
            ],
            'readMoreHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore a:hover'
                    ],
                ],
            ],
            'readMoreHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore a:hover { border-radius:{{readMoreHoverRadius}}; }'
                    ],
                ],
            ],
            'readMoreSpacing' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => 15,'bottom' => '','left' => '','right' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore { margin:{{readMoreSpacing}}; line-height: unset;}'
                    ],
                ],
            ],
            'readMorePadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '','right' => '', 'unit' =>'px']],
                'style' => [
                    (object)[
                        'depends' => [
                            (object)['key'=>'readMore','condition'=>'==','value'=>true],
                        ],
                        'selector'=>'{{WOPB}} .wopb-block-item .wopb-product-readmore a { padding:{{readMorePadding}}; }'
                    ],
                ],
            ],

            //--------------------------
            //  Wrapper Style
            //--------------------------
            'wrapBg' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#f5f5f5'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper'
                    ],
                ],
            ],
            'wrapBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' =>(object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper'
                    ],
                ],
            ],
            'wrapShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper'
                    ],
                ],
            ],
            'wrapRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper { border-radius:{{wrapRadius}}; }'
                    ],
                ],
            ],
            'wrapHoverBackground' => [
                'type' => 'object',
                'default' => (object)['openColor' => 0, 'type' => 'color', 'color' => '#ff5845'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapHoverBorder' => [
                'type' => 'object',
                'default' => (object)['openBorder'=>0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4','type' => 'solid'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapHoverRadius' => [
                'type' => 'object',
                'default' => (object)['lg' =>'', 'unit' =>'px'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper:hover { border-radius:{{wrapHoverRadius}}; }'
                    ],
                ],
            ],
            'wrapHoverShadow' => [
                'type' => 'object',
                'default' => (object)['openShadow' => 0, 'width' => (object)['top' => 1, 'right' => 1, 'bottom' => 1, 'left' => 1],'color' => '#009fd4'],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper:hover'
                    ],
                ],
            ],
            'wrapMargin' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '', 'unit' =>'px']],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper { margin:{{wrapMargin}}; }'
                    ],
                ],
            ],
            'wrapOuterPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['top' => '','bottom' => '','left' => '', 'right' => '', 'unit' =>'px']],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper { padding:{{wrapOuterPadding}}; }'
                    ],
                ],
            ],
            'wrapInnerPadding' => [
                'type' => 'object',
                'default' => (object)['lg' =>(object)['unit' =>'px']],
                'style' => [
                     (object)[
                        'selector'=>'{{WOPB}} .wopb-block-wrapper { padding:{{wrapInnerPadding}}; }'
                    ],
                ],
            ],
            
            'advanceId' => [
                'type' => 'string',
                'default' => '',
            ],
            'advanceZindex' => [
                'type' => 'string',
                'default' => '',
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} {z-index:{{advanceZindex}};}'
                    ],
                ],
            ],
            'hideExtraLarge' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} {display:none;} .block-editor-block-list__block {{WOPB}} {display:block;}'
                    ],
                ],
            ],
            'hideDesktop' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} {display:none;} .block-editor-block-list__block {{WOPB}} {display:block;}'
                    ],
                ],
            ],
            'hideTablet' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} {display:none;} .block-editor-block-list__block {{WOPB}} {display:block;}'
                    ],
                ],
            ],
            'hideMobile' => [
                'type' => 'boolean',
                'default' => false,
                'style' => [
                    (object)[
                        'selector' => '{{WOPB}} {display:none;} .block-editor-block-list__block {{WOPB}} {display:block;}'
                    ],
                ],
            ],
            'advanceCss' => [
                'type' => 'string',
                'default' => '',
                'style' => [(object)['selector' => '']],
            ]
        );
        
        if( $default ){
            $temp = array();
            foreach ($attributes as $key => $value) {
                if( isset($value['default']) ){
                    $temp[$key] = $value['default'];
                }
            }
            return $temp;
        }else{
            return $attributes;
        }
    }

    public function register() {
        register_block_type( 'product-blocks/product-category-1',
            array(
                'editor_script' => 'wopb-blocks-editor-script',
                'editor_style'  => 'wopb-blocks-editor-css',
                'title' => __('Product Category #1', 'product-blocks'),
                'attributes' => $this->get_attributes(),
                'render_callback' =>  array($this, 'content')
            ));
    }

    public function content($attr, $noAjax = false) {

        if(!$noAjax){
            $paged = is_front_page() ? get_query_var('page') : get_query_var('paged');
            $attr['paged'] = $paged ? $paged : 1;
        }

        $block_name = 'product-category-1';
        $wraper_before = $wraper_after = $post_loop = '';
        $wrapper_main_content = '';
        $image_size = $attr["imgCrop"] ? $attr["imgCrop"] : 'full';

        $slider_attr = wc_implode_html_attributes(
            array(
                'data-slidestoshow'  => wopb_function()->slider_responsive_split($attr['slidesToShow']),
                'data-autoplay'      => esc_attr($attr['autoPlay']),
                'data-slidespeed'    => esc_attr($attr['slideSpeed']),
                'data-showdots'      => esc_attr($attr['showDots']),
                'data-showarrows'    => esc_attr($attr['showArrows'])
            )
        );

        $recent_posts = wopb_function()->get_category_data( json_decode($attr['queryCat']), $attr['queryNumber'], $attr['queryType'] );
    
        if(!empty($recent_posts)){
            
            $wraper_before .= '<div '.($attr['advanceId']?'id="'.esc_attr($attr['advanceId']).'" ':'').' class="wp-block-product-blocks-'.esc_attr($block_name).' wopb-block-'.esc_attr($attr["blockId"]).' '.(isset($attr["className"])?esc_attr($attr["className"]):''). (isset($attr["align"])? ' align' .esc_attr($attr["align"]):'') . '">';
                $wraper_before .= '<div class="wopb-block-wrapper">';

                    if ($attr['headingShow']) {
                        $wraper_before .= '<div class="wopb-heading-filter">';
                            $wraper_before .= '<div class="wopb-heading-filter-in">';
                                include WOPB_PATH.'blocks/template/heading.php';
                            $wraper_before .= '</div>';
                        $wraper_before .= '</div>';
                    }

                    $wraper_before .= '<div class="wopb-wrapper-main-content">';
                        if ( $attr['productView'] == 'slide' ) {
                            $wrapper_main_content .= '<div class="wopb-product-blocks-slide" '.wp_kses_post($slider_attr).'>';
                        } else {
                            $wrapper_main_content .= '<div class="wopb-block-items-wrap wopb-block-row wopb-block-column-'.json_decode(json_encode($attr['columns']), True)['lg'].'">';
                        }

                            foreach ($recent_posts as $value) {
                                $post_loop .= '<div class="wopb-block-item">';
                                    $post_loop .= '<div class="wopb-block-content-wrap">';
                                        if( $attr['showImage'] ){
                                            if( $value['image'] ) {
                                            $post_loop .= '<div class="wopb-block-image wopb-block-image-'.esc_attr($attr['imgAnimation']).'"><a href="'.esc_url($value['url']).'" class="wopb-product-cat-img"><img src='.esc_url($value['image'][$image_size]).' alt='.esc_attr($value['name']).'/></a></div>';
                                            } else {
                                                $post_loop .= '<a href="'.esc_url($value['url']).'" class="wopb-product-cat-img"><div class="wopb-block-image wopb-block-image-empty"></div></a>';
                                            }
                                        }
                                        if( $attr['titleShow'] || $attr['countShow'] || $attr['descShow'] || $attr['readMore']){
                                            $post_loop .= '<div class="wopb-category-content-items wopb-category-content-'.esc_attr($attr['contentVerticalPosition']).' wopb-category-content-'.esc_attr($attr['contentHorizontalPosition']).'">';
                                                $post_loop .= '<div class="wopb-category-content-item">';
                                                    if($attr['titleShow']){
                                                        $post_loop .= '<'.esc_attr($attr['titleTag']).' class="wopb-product-cat-title"><a href='.esc_url($value['url']).'>'.esc_html($value['name']).'</a></'.esc_attr($attr['titleTag']).'>';
                                                    }
                                                    if($attr['countShow']){
                                                        $post_loop .= '<span class="wopb-product-cat-count">'.esc_html($value['count']).' '.( isset($attr['categoryrCountText']) ? esc_html($attr['categoryrCountText']) : esc_html__( 'products', 'product-blocks' ) ).'</span>';
                                                    }
                                                    if($attr['descShow']){
                                                        $post_loop .= '<div class="wopb-product-cat-desc">'.esc_html($value['desc']).'</div>';
                                                    }
                                                    if($attr['readMore']){
                                                        $post_loop .= '<div class="wopb-product-readmore"><a href='.esc_url($value['url']).'>'.($attr['readMoreText'] ? esc_html($attr['readMoreText']) : esc_html__( "Read More", "product-blocks" )).'</a></div>';
                                                    }
                                                $post_loop .= '</div>';
                                            $post_loop .= '</div>';
                                        }
                                    $post_loop .= '</div>';
                                $post_loop .= '</div>';
                            }

                            $wrapper_main_content .= $post_loop;

                        $wrapper_main_content .= '</div>';//wopb-block-items-wrap

                        if ($attr['productView'] == 'slide' && $attr['showArrows']) {
                            include WOPB_PATH.'blocks/template/arrow.php';
                        }

                     $wraper_after .= '</div>';//wopb-wrapper-main-content
                $wraper_after .= '</div>';
            $wraper_after .= '</div>';

            wp_reset_query();
        }

        return $noAjax ? $post_loop : $wraper_before.$wrapper_main_content.$wraper_after;
    }

}