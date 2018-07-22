<?php

namespace Drupal\indexcol\Form;


use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements Indexcol form.
 */
class IndexColForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'indexcol_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {


    $posts = $this->getListPosts();
    $ids = array(0=>'--select--');
    $ids_posts = array_unique(array_map( function ($posts){
        return $posts->userId;
    }, $posts));


    foreach( $ids_posts as $key => $id){
      $ids[$id] = $id;
    }


    $form['search_post'] = [
        '#type' => 'select',
        '#title' => 'Search by id',
        '#options' => $ids,
        '#ajax' => [
          'callback' => [$this, 'searchById'],
          'event' => 'change',
          'wrapper' => 'response',
        ],
      ];

      $form['show_slide'] = [
          '#type' => 'select',
          '#options' => $ids,
          '#title' => 'Show Slide by id',
          // '#submit' => array(array($this, 'searchById')),
          '#ajax' => [
            'callback' => [$this, 'showOrbit'],
            'wrapper' => 'response',
            'effect' => 'fade',
          ],
        ];

    $form['response'] = [
        '#type' => 'container',
        '#attributes' => ['id' => 'response'],
        '#markup' => '<div></div>'
      ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('search_post')) <= 0 || $form_state->getValue('search_post') == 0 ) {
      $form_state->setErrorByName('search_post', $this->t('Id value is not valid'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($this->t('Found results for @id', ['@id' => $form_state->getValue('search_post')]));
  }

  public function getListPosts(){
    $post_endpoint = 'https://jsonplaceholder.typicode.com/posts';
    $client = \Drupal::httpClient();
    $response = $client->get($post_endpoint);
    return json_decode($response->getBody());
  }

  public function getOrbitElements(){
    $post_endpoint = 'https://jsonplaceholder.typicode.com/photos';
    $client = \Drupal::httpClient();
    $response = $client->get($post_endpoint);
    return json_decode($response->getBody());
  }


  public function searchById(array &$form, FormStateInterface $form_state){
    $selected_id = $form_state->getValue('search_post');
    $posts = $this->getListPosts();
    foreach ($posts as $key => $post) {
      if( $post->userId == $selected_id) $results[] = $post;
    }


    $twig = \Drupal::service('twig');
    $template = $twig->loadTemplate(drupal_get_path('module', 'indexcol') . '/templates/indexcol.html.twig');
    $html = $template->render(['results'=> $results]);

    $form['response']['#markup'] = $html;

    return $form['response'];

  }

  function showOrbit(array &$form, FormStateInterface $form_state){
    $photos = $this->getOrbitElements();
    $selected_id = $form_state->getValue('search_post');
    foreach ($photos as $key => $photo) {
      if( $photo->albumId == $selected_id) $results[] = $photo;
    }

    $twig = \Drupal::service('twig');
    $template = $twig->loadTemplate(drupal_get_path('module', 'indexcol') . '/templates/slider.html.twig');
    $html = $template->render(['photos'=> $results]);

    $form['response']['#markup'] = $html;

    return $form['response'];
  }

}
