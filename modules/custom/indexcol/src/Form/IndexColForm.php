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
   * Este metodo contruye el formulario usando el api de Drupal 8.
   * El formualrio se construye con dos campos, cada campo raliza un filtro sobre el JSON usando el campo userId o albumId segun corresponda.
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
   * Metodo validateForm se usa para validar la informacion que se envia, si la informacion no es valida retorna un mensaje de advertencia.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('search_post')) <= 0 || $form_state->getValue('search_post') == 0 ) {
      $form_state->setErrorByName('search_post', $this->t('Id value is not valid'));
    }
  }

  /**
   * {@inheritdoc}
   * Se ejecuta cuando la validacion del formulario a sido exitosa, muestra un mensaje informativo.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($this->t('Found results for @id', ['@id' => $form_state->getValue('search_post')]));
  }

  /**
   * Metodo que obtiene todos los Posts y los converite a un arreglo
   */
  public function getListPosts(){
    $post_endpoint = 'https://jsonplaceholder.typicode.com/posts';
    $client = \Drupal::httpClient();
    $response = $client->get($post_endpoint);
    return json_decode($response->getBody());
  }

  /**
   * Metodo que obtiene todos las fotos y los converite a un arreglo
   */
  public function getOrbitElements(){
    $post_endpoint = 'https://jsonplaceholder.typicode.com/photos';
    $client = \Drupal::httpClient();
    $response = $client->get($post_endpoint);
    return json_decode($response->getBody());
  }

  /**
   * Funcion callback que controla el change del elemento del formulario search_post
   * Realiza un filtro sobre el json que retorna el metoodo getListPosts.
   * Finalmente retorna el elemento response del formulario y en su contenido incluye el html del tpl indexcol.html.twig
   */
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

  /**
   * Funcion callback que controla el change del elemento del formulario search_post
   * Realiza un filtro sobre el json que retorna el metoodo getOrbitElements.
   * Finalmente retorna el elemento response del formulario y en su contenido incluye el html del tpl slider.html.twig
   * que contiene el codigo HTML necesario para crear el slider basado en boostrap 4
   */
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
