<?php

require('auth.php');

ini_set('display_errors', false);

error_reporting(-1);

// set_error_handler(function($errno, $errstr, $errfile, $errline, $errcontext) {
    // error was suppressed with the @-operator
    // if (0 === error_reporting()) {
        // return false;
    // }

    // throw new Exception('Błąd przy generowaniu pliku pdf.');
// });

try {

  require '../vendor/autoload.php';
   
  function out($f, $params = false) {
    ob_start();
    include $f;
    return ob_get_clean(); 
  }

  $template = '../wzory/';
  $name = '('.date('d.m.Y H.i.s.').gettimeofday()['usec'].').pdf';
  switch ((isset($_GET['t']))?$_GET['t']:NULL) {
    case 'pomontazowe':
      $template .= 'pomontazowe.php';
      $name = 'Protokół prac pomontażowych '.$name;
      break;
    default:
      $template .= 'test.php';
      break;
  }

  $mpdf = new \Mpdf\Mpdf([
      'fontDir' => array_merge((new Mpdf\Config\ConfigVariables())->getDefaults()['fontDir'], [
          __DIR__ . '/fonts',
      ]),
      'fontdata' => (new Mpdf\Config\FontVariables())->getDefaults()['fontdata'] + [
          'lato' => [
              'R' => 'Lato-Regular.ttf'
          ],
          'latolight' => [
              'R' => 'Lato-Light.ttf'
          ]
      ],
    'mode' => 's',
      'default_font' => 'robotothin',
    'setAutoTopMargin' => 'pad',
    'setAutoBottomMargin' => 'pad',
    'margin_left' => 10,
    'margin_right' => 10,
    'margin_top' => 5,
    'margin_bottom' => 5,
    'margin_header' => 10,
    'margin_footer' => 4,
    'useActiveForms' => true
  ]);

  $mpdf->showImageErrors = true;

  $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on'?'https':'http')."://{$_SERVER['HTTP_HOST']}/{$template}";

  $mpdf->SetHTMLHeader(out('../wzory/header.php'));
  $mpdf->SetHTMLFooter(out('../wzory/footer.php'));
  $mpdf->img_dpi = 150;
  $mpdf->useSubstitutions = true;
  $mpdf->setBasePath($url);
  $mpdf->WriteHTML(out($template));
  
  $pdfUrl = 'dokumenty/'.$name;
  $mpdf->Output($pdfUrl, \Mpdf\Output\Destination::FILE);

  echo json_encode(array(
    'pdfUrl' => (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on'?'https':'http')."://{$_SERVER['HTTP_HOST']}/{$pdfUrl}",
    'ok' => true
  ));
} catch (Exception $e) {
  echo json_encode(array(
    'message' => $e->getMessage(),
    'ok' => false
  ));
}
