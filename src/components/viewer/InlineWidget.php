<?php
namespace brucebnu\widgets\components\viewer;

use yii\base\Widget;
use yii\helpers\Json;

/*
<?= \brucebnu\widgets\components\viewer\InlineWidget::widget(['urls' => $urls]); ?>
echo \brucebnu\widgets\viewer\Viewer::widget([
    'options' => [
        'button' => false,
        'inline' => true,
        'url' => 'data-original',
        'minWidth' => 250,
        'minHeight' => 490,
    ],
    'urls' => [$url],
    'style'=> [
        'width'=>200,
        'height'=>200
    ],
]);
*/

class InlineWidget extends Widget
{
    public $options = [
        'inline' => true,
        'url' => 'data-original',
        'zoomRatio' => 1
    ];
    public $urls = [
        'https://xxx.com/01-xxx.jpg',
        'https://xxx.com/02-xxx.jpg',
        'https://xxx.com/03-xxx.jpg',
        'https://xxx.com/04-xxx.jpg',
    ];
    public $style = [];

    public function run()
    {
        $html = '<div id="invoice_galley_img">'."\n";
        $html .= '<ul class="pictures" id="dowebok">'."\n";
        foreach ($this->urls as $key => $value) {
            $html .= '<li>';
            $html .= '<img data-original="';
            $html .= $value['original'] . '" ';
            $html .= 'src= "';
            $html .= $value['thumbnail'] . '" ';
            $html .= 'alt="invoice" >';
            $html .= '</li>'."\n";
        }
        $html .= '</ul></div>';
        $this->registerClientScript();
        return $html;
    }

    protected function registerClientScript()
    {
        $options = Json::htmlEncode($this->options);
        $script = 'viewer = new Viewer(document.getElementById("invoice_galley_img")';
        $script .= ',' . $options;
        $script .= ');';
//        $script = <<< JS
//    window.addEventListener("DOMContentLoaded", function () {
//      var invoice_galley_img = document.getElementById("invoice_galley_img");
//      var viewer = new Viewer(invoice_galley_img, {
//        inline: true,
//        url: 'data-original',
//        toolbar: {
//          oneToOne: true,
//
//          prev: function() {
//            viewer.prev(true);
//          },
//
//          play: true,
//
//          next: function() {
//            viewer.next(true);
//          },
//
//          download: function() {
//            const a = document.createElement('a');
//
//            a.href = viewer.image.src;
//            a.download = viewer.image.alt;
//            document.body.appendChild(a);
//            a.click();
//            document.body.removeChild(a);
//          },
//        },
//      });
//    });
//JS;
        // $script = "$('#dowebok').viewer( ";
        // $script .= $options;
        // $script .= ')';
        $view = $this->getView();
        Asset::register($this->view);
        $view->registerJs($script);

        $style = <<< CSS
.pictures {
      list-style: none;
      margin: 0;
      max-width: 30rem;
      padding: 0;
    }

    .pictures > li {
      border: 1px solid transparent;
      float: left;
      height: calc(100% / 3);
      margin: 0 -1px -1px 0;
      overflow: hidden;
      width: calc(100% / 3);
    }

    .pictures > li > img {
      cursor: zoom-in;
      width: 100%;
    }

    .viewer-download {
      color: #fff;
      font-family: FontAwesome, serif;
      font-size: 0.75rem;
      line-height: 1.5rem;
      text-align: center;
    }

    .viewer-download::before {
      content: "\f019";
    }
CSS;
        $view->registerCss($style);
    }
}