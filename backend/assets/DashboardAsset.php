<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

/*Ushbu dizayn dizayner hamda dasturchi  Umdijon Zoxidov  tomonidan yii2 backend qismiga moslandi*/

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/themes/collapsible-menu/materialize.css',
        'css/themes/collapsible-menu/style.css',
        'css/custom/custom.css',
        'vendors/perfect-scrollbar/perfect-scrollbar.css',
        'vendors/jvectormap/jquery-jvectormap.css',
        'vendors/animate-css/animate.css',
        'vendors/jquery.nestable/nestable.css',
        'vendors/flag-icon/css/flag-icon.min.css',
        'vendors/data-tables/css/jquery.dataTables.min.css',
        'css/layouts/page-center.csss',
        'vendors/fullcalendar/css/fullcalendar.min.css',
        'css/plugins/media-hover-effects.css',
        'vendors/magnific-popup/magnific-popup.css',
        'vendors/jquery.nestable/nestable.css',
        'css/main.css',
        'vendors/noUiSlider/nouislider.css',
        'vendors/sweetalert/dist/sweetalert.css',
        'vendors/ionRangeSlider/css/ion.rangeSlider.css',
        'vendors/ionRangeSlider/css/ion.rangeSlider.skinFlat.css',
    ];
    public $js = [
        'js/materialize.js',
        'vendors/prism/prism.js',
        'vendors/angular.min.js',
        'vendors/angular-materialize.js',
        'vendors/perfect-scrollbar/perfect-scrollbar.min.js',
        'vendors/chartjs/chart.min.js',
        'js/plugins.js',
        'js/custom-script.js',
        'js/scripts/angular-ui.js',
        'js/scripts/extra-components-range-slider.js',
        'js/scripts/extra-components-sweetalert.js',
        'vendors/ionRangeSlider/js/ion.rangeSlider.js',
        'js/scripts/form-elements.js',
        'vendors/data-tables/js/jquery.dataTables.min.js',
        'js/scripts/data-tables.js',
        'js/scripts/advance-ui-carousel.js',
        'js/scripts/advance-ui-feature-discovery.js',
        'vendors/fullcalendar/lib/jquery-ui.custom.min.js',
        'vendors/fullcalendar/lib/moment.min.js',
        'vendors/fullcalendar/js/fullcalendar.min.js',
        'js/scripts/fullcalendar-script.js',
        'vendors/masonry.pkgd.min.js',
        'vendors/imagesloaded.pkgd.min.js',
        'vendors/magnific-popup/jquery.magnific-popup.min.js',
        'js/scripts/extra-components-nestable.js',
        'vendors/jquery.nestable/jquery.nestable.js',
        'js/scripts/media-hover-effects.js',
        'js/scripts/media-gallary-page.js',
        'js/scripts/page-item.js',
        'vendors/noUiSlider/nouislider.min.js',
        'js/settings.js',
        'js/scripts/dashboard-ecommerce.js',
        'vendors/sweetalert/dist/sweetalert.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
