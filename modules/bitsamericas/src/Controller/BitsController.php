<?php
/**
 * @file
 * Contains \Drupal\bitsamericas\Controller\BitsController.
 */
namespace Drupal\bitsamericas\Controller;

use Drupal\Core\Controller\ControllerBase;

class BitsController extends ControllerBase{

  public function content() {

    $authentication_params = array(
      'client_id' => '366426de773243b6b429568267c85c3c',
      'response_type' => 'code',
      'redirect_uri' => 'http://drupal.bitsamericas/callback',
      'scope' => 'user-read-private user-read-email',
      'state' => '123',
    );

    $url = 'https://accounts.spotify.com/authorize' . '?' . http_build_query($authentication_params);

    return [
       '#theme' => 'start-session',
       '#url_login' => $url,
    ];
  }
}
