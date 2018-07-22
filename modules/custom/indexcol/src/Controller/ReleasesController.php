<?php
/**
 * @file
 * Contains \Drupal\indexcol\Controller\ReleasesController.
 */
namespace Drupal\indexcol\Controller;

use Drupal\Core\Controller\ControllerBase;

class ReleasesController extends ControllerBase{

  public function content() {
    $end_point = 'https://api.spotify.com/v1/browse/new-releases?country=CO&limit=10&offset=0';
    $releases = '';
    $authorization = json_decode(\Drupal::state()->get('spotify_authorization'));
    if($authorization->access_token){
      $client = \Drupal::httpClient();
      $response = $client->get($end_point, [
        'headers' => [
          'Authorization'=>'Bearer ' . $authorization->access_token
        ],
      ]);

      $data = $response->getBody()->getContents();
      $releases = json_decode($data);
      return [
         '#theme' => 'releases',
         '#releases' => $releases,
      ];
    }

    return $this->redirect('bits.content');
  }
}
