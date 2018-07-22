<?php
/**
 * @file
 * Contains \Drupal\indexcol\Controller\ArtistController.
 */
namespace Drupal\indexcol\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;

class ArtistController extends ControllerBase{

  public function content($id) {
    $end_point_albums  = 'https://api.spotify.com/v1/artists/{id}/albums';
    $end_point_related_artists  = 'https://api.spotify.com/v1/artists/{id}/related-artists';
    $end_point_top_tracks  = 'https://api.spotify.com/v1/artists/{id}/top-tracks?country=ES';
    $end_point  = 'https://api.spotify.com/v1/artists/{id}';
    $artist = '';
    $tracks = '';
    $authorization = json_decode(\Drupal::state()->get('spotify_authorization'));

    if($authorization->access_token){
      $client = \Drupal::httpClient();
      $response = $client->get(str_replace('{id}',$id,$end_point), [
        'headers' => [
          'Authorization'=>'Bearer ' . $authorization->access_token
        ],
      ]);

      $data = $response->getBody()->getContents();
      $artist = json_decode($data);

      $response = $client->get(str_replace('{id}',$id,$end_point_top_tracks), [
        'headers' => [
          'Authorization'=>'Bearer ' . $authorization->access_token
        ],
      ]);

      $data = $response->getBody()->getContents();
      $tracks = json_decode($data);
      
      return [
         '#theme' => 'artist',
         '#artist' => $artist,
         '#tracks' => $tracks->tracks
      ];
    }

    return $this->redirect('bits.content');

  }

}
