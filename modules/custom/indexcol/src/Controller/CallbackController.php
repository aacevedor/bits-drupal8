<?php
/**
 * @file
 * Contains \Drupal\indexcol\Controller\Ca,,backController.
 */
namespace Drupal\indexcol\Controller;

use Drupal\Core\Controller\ControllerBase;

class CallbackController extends ControllerBase{

  public function content() {
    $end_point = 'https://api.spotify.com/v1/browse/new-releases?country=CO&limit=10&offset=0';
    $end_point_refresh = 'https://accounts.spotify.com/api/token';
    $token = '';
    $code = '';
    $releases = '';
    $host = \Drupal::request()->getHost();

    if( \Drupal::request()->query->get('code') ){
      $client = \Drupal::httpClient();
      $code = \Drupal::request()->query->get('code');
      $options = [
        'headers' => [
          'Content-Type'=> 'application/x-www-form-urlencoded',
        ],
        'form_params' => [
          'grant_type' => 'authorization_code',
          'code'=> $code,
          'redirect_uri' => 'http://'.$host.'/callback',
          'client_id'=>'366426de773243b6b429568267c85c3c',
          'client_secret'=>'d0f58910a4a64e49bcba5317596ad478',
        ]
      ];
      $response = $client->post($end_point_refresh, $options);
      \Drupal::state()->set('spotify_authorization', $response->getBody()->getContents());
      // $data = \Drupal::state()->get('my_data', 'bar');
      return $this->redirect('bits.releases');
    }
  }
}
