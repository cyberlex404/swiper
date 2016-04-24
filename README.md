# Swiper
Swiper lib

###Example
Use render array
<pre>
$output =  array(
      'first_para' => array(
          '#type' => 'markup',
          '#markup' => 'A paragraph about some stuff...',
          '#attached' => array(
            'libraries_load' => array(
                array('swiper'),
            ),
          ),
      ),
      'second_para' => array(
          '#items' => array('first item', 'second item', 'third item'),
          '#theme' => 'item_list',
      ),
  );
  </pre>
  or
  <pre>
  libraries_load($name);
  </pre>
